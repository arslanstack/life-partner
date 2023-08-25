<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class MembersController extends Controller
{
    public function index()
    {
        // Get all users except the authenticated user and those who have status 0 (blocked)
        // $users = User::where('id', '!=', Auth::id())->where('status', '!=', 0)->paginate(9);
        return view('user.members');
    }
    public function getUsers(Request $request)
    {


        $users = User::where('id', '!=', Auth::id())->where('status', '!=', 0)->paginate(9);

        if ($request->ajax()) {

            $cardsHtml = view('user.member_card', ['users' => $users])->render();

            // Problem/Bug/Issue is from this line onwards and returning 500 error
            $paginationHtml = $this->buildPaginationHtml($users);


            return response()->json(['cardsHtml' => $cardsHtml, 'paginationHtml' => $paginationHtml]);
        }

        return view('user.member_card', ['users' => $users]);
    }
    public function buildPaginationHtml($users)
    {
        $currentPage = $users->currentPage();
        $lastPage = $users->lastPage();
        $startPage = max($currentPage - 2, 1);
        $endPage = min($currentPage + 2, $lastPage);

        $paginationHtml = '<div class="pagination-area text-center">';
        $paginationHtml .= '<a href="' . $users->previousPageUrl() . '"><i class="fas fa-angle-double-left"></i></a>';

        if ($startPage > 1) {
            $paginationHtml .= '<a href="' . route('getUsers', ['page' => 1]) . '">1</a>';
            if ($startPage > 2) {
                $paginationHtml .= '<span class="dots">...</span>';
            }
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            $activeClass = ($i == $currentPage) ? 'active' : '';
            $paginationHtml .= '<a href="' . route('getUsers', ['page' => $i]) . '" class="' . $activeClass . '">' . $i . '</a>';
        }

        if ($endPage < $lastPage) {
            if ($endPage < $lastPage - 1) {
                $paginationHtml .= '<span class="dots">...</span>';
            }
            $paginationHtml .= '<a href="' . route('getUsers', ['page' => $lastPage]) . '">' . $lastPage . '</a>';
        }

        $paginationHtml .= '<a href="' . $users->nextPageUrl() . '"><i class="fas fa-angle-double-right"></i></a>';
        $paginationHtml .= '</div>';

        return $paginationHtml;
    }
    public function buildSearchPaginationHtml($users)
    {
        $currentPage = $users->currentPage();
        $lastPage = $users->lastPage();
        $startPage = max($currentPage - 2, 1);
        $endPage = min($currentPage + 2, $lastPage);

        $paginationHtml = '<div class="search-pagination-area text-center">';
        $paginationHtml .= '<a href="' . $users->previousPageUrl() . '"><i class="fas fa-angle-double-left"></i></a>';

        if ($startPage > 1) {
            $paginationHtml .= '<a href="' . route('search', ['page' => 1]) . '">1</a>';
            if ($startPage > 2) {
                $paginationHtml .= '<span class="dots">...</span>';
            }
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            $activeClass = ($i == $currentPage) ? 'active' : '';
            $paginationHtml .= '<a href="' . route('search', ['page' => $i]) . '" class="' . $activeClass . '">' . $i . '</a>';
        }

        if ($endPage < $lastPage) {
            if ($endPage < $lastPage - 1) {
                $paginationHtml .= '<span class="dots">...</span>';
            }
            $paginationHtml .= '<a href="' . route('search', ['page' => $lastPage]) . '">' . $lastPage . '</a>';
        }

        $paginationHtml .= '<a href="' . $users->nextPageUrl() . '"><i class="fas fa-angle-double-right"></i></a>';
        $paginationHtml .= '</div>';
        return $paginationHtml;
    }


    public function loadSearchCards(Request $request)
    {
        $searchParams = $request->input('searchParams', []);
        $age = $minAge = $maxAge =  $maxHeight = $minHeight = $maxWeight = $minWeight = $maxChildren = $minChildren = $lng = $lat = $distance =  $height = $weight =  $children =  $searchByLocation = null;
        $bodyTypeMap = [
            "Small" => 0,
            "Average" => 1,
            "Aethletic" => 2,
            "Large" => 3,
        ];
        $query = User::query()
            ->where('id', '!=', Auth::id()) // Excluding the authenticated user
            ->where('status', '!=', 0); // Excluding blocked users
        // return response()->json(['searchParams' => $searchParams]);
        // Iterate through the array of parameters
        foreach ($searchParams as $param) {
            $name = $param['name'];
            $value = $param['value'];

            if ($name === 'interestedin') {
                $query->where('iam', $value);
            } elseif ($name === 'Small') {
                if ($value) {
                    $selectedBodyTypes[] = $bodyTypeMap[$name];
                }
            } elseif ($name === 'Average') {
                if ($value) {
                    $selectedBodyTypes[] = $bodyTypeMap[$name];
                }
            } elseif ($name === 'Aethletic') {
                $selectedBodyTypes[] = $bodyTypeMap[$name];
            } elseif ($name === 'Large') {
                $selectedBodyTypes[] = $bodyTypeMap[$name];
            } elseif ($name === 'age') {
                $age = true;
            } elseif ($name === 'minAge') {
                $minAge = $value;
            } elseif ($name === 'maxAge') {
                $maxAge = $value;
            } elseif ($name === 'minHeight') {
                $minHeight = $value;
            } elseif ($name === 'maxHeight') {
                $maxHeight = $value;
            } elseif ($name === 'minWeight') {
                $minWeight = $value;
            } elseif ($name === 'maxWeight') {
                $maxWeight = $value;
            } elseif ($name === 'minChildren') {
                $minChildren = $value;
            } elseif ($name === 'maxChildren') {
                $maxChildren = $value;
            } elseif ($name === 'longitude') {
                $lng = $value;
            } elseif ($name === 'latitude') {
                $lat = $value;
            } elseif ($name === 'distance') {
                $distance = $value;
            } elseif ($name === 'height') {
                $height = true;
            } elseif ($name === 'weight') {
                $weight = true;
            } elseif ($name === 'children') {
                $children = true;
            } elseif ($name === 'searchByLocation') {
                $searchByLocation = true;
            }
        }
        if (!empty($selectedBodyTypes)) {
            $query->whereIn('body_type', $selectedBodyTypes);
        }
        if ($age) {
            $query->whereBetween('age', [$minAge, $maxAge]);
        }
        if ($height) {
            $query->whereBetween('height', [$minHeight, $maxHeight]);
        }
        if ($weight) {
            $query->whereBetween('weight', [$minWeight, $maxWeight]);
        }
        if ($children) {
            $query->whereBetween('child', [$minChildren, $maxChildren]);
        }
        if ($searchByLocation) {

            $locationBorders = distanceCalculator($lat,$lng , $distance);
            $query->whereBetween('latitude', [$locationBorders['lat_min'], $locationBorders['lat_max']])
                ->whereBetween('longitude', [$locationBorders['lng_min'], $locationBorders['lng_max']]);
        }
        // $sqlQuery = $query->toSql();
        // $bindings = $query->getBindings();

        // // Replace the placeholders with actual values
        // foreach ($bindings as $binding) {
        //     $value = is_numeric($binding) ? $binding : "'" . $binding . "'";
        //     $sqlQuery = preg_replace('/\?/', $value, $sqlQuery, 1);
        // }
        // return response()->json(['sqlQuery' => $sqlQuery]);
        $users = $query->paginate(9);

        if ($request->ajax()) {
            $cardsHtml = view('user.member_card', ['users' => $users])->render();
            $paginationHtml = $this->buildSearchPaginationHtml($users);
            return response()->json(['cardsHtml' => $cardsHtml, 'paginationHtml' => $paginationHtml]);
        }

        return view('user.member_card', ['users' => $users]);
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


    public function search(Request $request)
    {

        // dd($request->all());
        // dd($request->all());
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

            $cardsHtml = view('user.member_card', ['users' => $users])->render();
            $paginationHtml = $this->buildSearchPaginationHtml($users);
            return response()->json(['cardsHtml' => $cardsHtml, 'paginationHtml' => $paginationHtml]);
        }

        return view('user.member_card', ['users' => $users]);
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
