<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function getUserChatContacts($userId)
    {
        $user = User::findOrFail($userId);

        $chatContacts = User::whereHas('sentChats', function ($query) use ($user) {
            $query->where('receiver_id', $user->id);
        })
            ->orWhereHas('receivedChats', function ($query) use ($user) {
                $query->where('sender_id', $user->id);
            })
            ->get();

        return response()->json($chatContacts);
    }

    public function getChatMessages($authUserId, $extraId)
    {
        $chatMessages = Chat::whereIn('sender_id', [$authUserId, $extraId])
            ->whereIn('receiver_id', [$authUserId, $extraId])
            ->orderBy('created_at')
            ->get();

        return response()->json($chatMessages);
    }

    public function sendChat(Request $request){
        dd($request->all());
    }
}
