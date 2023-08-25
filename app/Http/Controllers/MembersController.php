<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class MembersController extends Controller
{
    public function index(Request $request)
    {
        // Get all users except the authenticated user and those who have status 0 (blocked)
        $users = User::where('id', '!=', Auth::id())->where('status', '!=', 0)->paginate(9);
        if ($request->ajax()) {
            $view = view('user.member_card', compact('users'))->render();
            return response()->json(['html' => $view]);
        }
        return view('user.members', ['users' => $users]);
    }
    public function search(Request $request)
    {
        $query = User::query()
            ->where('id', '!=', Auth::id()) // Excluding the authenticated user
            ->where('status', '!=', 0); // Excluding blocked users

        // Filtering based on interestedin
        if ($request->interestedin) {
            $query->where('iam', $request->interestedin);
        }
        // Filtering based on bodyType
        $bodyTypeMap = [
            "Small" => 0,
            "Average" => 1,
            "Aethletic" => 2,
            "Large" => 3,
        ];

        $selectedBodyTypes = [];

        foreach ($bodyTypeMap as $bodyTypeName => $bodyTypeValue) {
            if ($request->has($bodyTypeName)) {
                $selectedBodyTypes[] = $bodyTypeValue;
            }
        }

        if (!empty($selectedBodyTypes)) {
            $query->whereIn('body_type', $selectedBodyTypes);
        }


        // Filtering based on age
        if ($request->age) {
            $query->whereBetween('age', [$request->minAge, $request->maxAge]);
        }

        // Filtering based on height
        if ($request->height) {
            $query->whereBetween('height', [$request->minHeight, $request->maxHeight]);
        }

        // Filtering based on weight
        if ($request->weight) {
            $query->whereBetween('weight', [$request->minWeight, $request->maxWeight]);
        }

        // Filtering based on children
        if ($request->children) {
            $query->whereBetween('child', [$request->minChildren, $request->maxChildren]);
        }

        // Filtering based on location
        if ($request->searchByLocation) {
            // making bounding box using helper function
            $locationBorders = distanceCalculator($request->latitude, $request->longitude, $request->distance);
            $query->whereBetween('latitude', [$locationBorders['lat_min'], $locationBorders['lat_max']])
                ->whereBetween('longitude', [$locationBorders['lng_min'], $locationBorders['lng_max']]);
        }
        $users = $query->paginate(9);

        if ($request->ajax()) {
            if($request->session()->has('currentPage')){
                $page = $request->session()->get('currentPage') + 1;
                $request->session()->put('currentPage', $page);
            }
            $users = $query->paginate(9, ['*'], 'page', $request->session()->get('currentPage'));
            $view = view('user.member_card', compact('users'))->render();
            return response()->json(['html' => $view]);
        }
        $request->session()->put('currentPage', 1);
        return view('user.members', ['users' => $users]);
    }

    public function sortActive()
    {
        // Get all users except the authenticated user and those who have status 0 where last_login latest
        $users = User::where('id', '!=', Auth::id())->where('status', '!=', 0)->orderBy('last_login', 'desc')->paginate(9);
        return view('user.members', ['users' => $users]);
    }
    public function sortNew()
    {
        // Get all users except the authenticated user and those who have status 0 where created latest
        $users = User::where('id', '!=', Auth::id())->where('status', '!=', 0)->orderBy('created_at', 'desc')->paginate(9);
        return view('user.members', ['users' => $users]);
    }
    public function getMember(Request $request)
    {
        if ($request->username == Auth::user()->username) {
            return redirect()->route('profile');
        }
        $user = User::where('username', $request->username)->first();
        return view('user.memberProfile', ['user' => $user]);
    }
}
