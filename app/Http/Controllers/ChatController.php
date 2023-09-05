<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageEvent;

class ChatController extends Controller
{
    public function index($username)
    {
        $user = User::findOrFail(Auth::user()->id);
        $chatee = null;
        $chatCount = null;
        $chatMessages = null;
        if ($username == 0) {
            $chats = User::whereHas('sentChats', function ($query) use ($user) {
                $query->where('receiver_id', Auth::user()->id);
            })
                ->orWhereHas('receivedChats', function ($query) use ($user) {
                    $query->where('sender_id', Auth::user()->id);
                })
                ->get();
            return view('user.chat', compact(['chats', 'chatee', 'chatCount', 'chatMessages']));
        } else {
            // $chatee = user where username = $username 
            $chatee = User::where('username', '=', $username)->firstOrFail();
            $initialContacts = User::where('id', '=', $chatee->id)->get();
            $additionalContacts = User::whereHas('sentChats', function ($query) use ($user) {
                $query->where('receiver_id', Auth::user()->id);
            })
                ->orWhereHas('receivedChats', function ($query) use ($user) {
                    $query->where('sender_id', Auth::user()->id);
                })
                ->get();
            $chats = $initialContacts->merge($additionalContacts);
            $chatMessages = Chat::whereIn('sender_id', [$user->id, $chatee->id])
                ->whereIn('receiver_id', [$user->id, $chatee->id])
                ->orderBy('created_at')
                ->get();
            readAll(Auth::user()->id, $chatee->id);
            $chatCount = totalChatCount(Auth::user()->id, $chatee->id);
            return view('user.chat', compact(['chats', 'chatee', 'chatCount', 'chatMessages']));
        }
        return view('user.chat', compact(['chats', 'chatee', 'chatCount', 'chatMessages']));
    }

    public function getChatMessages($authUserId, $extraId)
    {
        $chatMessages = Chat::whereIn('sender_id', [$authUserId, $extraId])
            ->whereIn('receiver_id', [$authUserId, $extraId])
            ->orderBy('created_at')
            ->get();
        $chatCount = totalChatCount(Auth::user()->id, $extraId);

        readAll(Auth::user()->id, $extraId);

        return response()->json(['chatMessages' => $chatMessages, "chatCount" => $chatCount]);
    }

    public function saveChat(Request $request)
    {
        try {
            $chat = Chat::create([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message
            ]);
            $chatCount = totalChatCount(Auth::user()->id, $request->receiver_id);
            // push chatCount to $chat
            $chat->chatCount = $chatCount;
            // coverting $chat to json

            event(new MessageEvent($chat));

            readAll(Auth::user()->id, $request->receiver_id);

            return response()->json(['success' => true, 'message' => $chat]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function countTotal($me, $you)
    {
        $chatCount = totalChatCount(Auth::user()->id, $you);

        readAll(Auth::user()->id, $you);

        return response()->json(['chatCount' => $chatCount]);
    }
}
