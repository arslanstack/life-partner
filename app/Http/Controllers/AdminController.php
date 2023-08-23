<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfileChangeLog;

class AdminController extends Controller
{



    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::guard('web')->check()) {
                return redirect()->route('home'); // Redirect to user home if a user is authenticated
            }

            if (Auth::guard('admin')->check()) {
                return redirect()->route('admin.home'); // Redirect to admin home if an admin is authenticated
            }

            return $next($request);
        })->only('showLoginForm');
    }
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        // if normal user authenticated then redirect to user home
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }
        // if admin authenticated then redirect to admin home
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            session(['admin' => Auth::guard('admin')->user()]);
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid credentials');
        }
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 1) { // Assuming 1 is for Super Admin
            return redirect()->route('admin.home'); // Replace with your admin dashboard route
        }

        return redirect('/admin'); // Redirect to a default page
    }
    protected function attemptLogin(Request $request)
    {
        return Auth::guard('admin')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function userManagement()
    {
        // fetch all users data and pass to view
        $users = User::get();
        return view('admin.userManagement', ['users' => $users]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function getUserDetails($userId)
    {
        $user = User::where('unique_id', $userId)->firstOrFail(); // Assuming 'unique_id' is the field to identify users

        return view('admin.user-details', ['user' => $user]);
    }
    public function unblockUser(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail(); // Assuming 'unique_id' is the field to identify users
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User unblocked successfully');
    }
    public function blockUser(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail(); // Assuming 'unique_id' is the field to identify users
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'User Blocked successfully');
    }
    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail(); // Assuming 'unique_id' is the field to identify users
        $user->delete();
        $users = User::get();
        return redirect()->route('admin.userManagement')->with('success', 'User Deleted successfully');
    }

    public function approvals()
    {
        $changeLogs = ProfileChangeLog::where('status','pending')->latest()->get();
        // dd($changeLogs);
        return view('admin.approvals', ['changeLogs' => $changeLogs]);
    }
    public function getApprovalDetails($userId)
    {
        // fetch ProfileChangeLog where id is userId
        $changeLog = ProfileChangeLog::where('id', $userId)->firstOrFail();
        // dd($changeLog); 
        $user = User::where('id', $changeLog->user_id)->firstOrFail();
        // dd($user);
        $profileData = json_decode($changeLog->profile_data);
        // dd($profileData);
        return view('admin.approval_details', ['user' => $user, 'profileData' => $profileData, 'changeLog' => $changeLog]);
    }

    public function approveChange(Request $request)
    {
        $changeLog = ProfileChangeLog::where('id', $request->id)->firstOrFail();
        $profileData = json_decode($changeLog->profile_data);
        $user = User::where('id', $changeLog->user_id)->firstOrFail();
        // capturing old profile data
        $oldProfileData = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'age' => $user->age,
            'profile_image' => $user->profile_image,
            'email' => $user->email,
            'username' => $user->username,
            'child' => $user->child,
            'marital_status' => $user->marital_status,
            'gender' => $user->gender,
            'dob' => $user->dob,
            'about_me' => $user->about_me,
            'address' => $user->address,
            'height' => $user->height,
            'weight' => $user->weight,
            'body_type' => $user->body_type,
            'city' => $user->city,
            'state' => $user->state,
            'zipcode' => $user->zipcode,
            'country' => $user->country,
            'latitude' => $user->latitude,
            'longitude' => $user->longitude,
        ];
        // update user data
        $user->first_name = $profileData->first_name;
        $user->last_name = $profileData->last_name;
        $user->username = $profileData->username;
        $user->age = $profileData->age;
        $user->profile_image = $profileData->profile_image;
        $user->email = $profileData->email;
        $user->child = $profileData->child;
        $user->marital_status = $profileData->marital_status;
        $user->gender = $profileData->gender;
        $user->dob = $profileData->dob;
        $user->about_me = $profileData->about_me;
        $user->address = $profileData->address;
        $user->height = $profileData->height;
        $user->weight = $profileData->weight;
        $user->body_type = $profileData->body_type;
        $user->city = $profileData->city;
        $user->state = $profileData->state;
        $user->zipcode = $profileData->zipcode;
        $user->country = $profileData->country;
        $user->latitude = $profileData->latitude;
        $user->longitude = $profileData->longitude;
        $user->save();

        // change status of profilechangelog to approved
        $changeLog->status = 'approved';
        $changeLog->profile_data = json_encode($oldProfileData);
        $changeLog->save();

        $changeLog = ProfileChangeLog::where('id', $request->id)->firstOrFail();
        $user = User::where('id', $changeLog->user_id)->firstOrFail();
        // return view admin.approved with success, $user and $changeLog
        return view('admin.approved', ['user' => $user, 'changeLog' => $changeLog])->with('success', 'Change Approved successfully');
        // return view('admin.approved')->with('success', 'Change Approved successfully');
        // return redirect()->back()->with('success', 'Change Approved successfully');
    }
    public function rejectChange(Request $request)
    {
        // change status of profilechangelog to rejecetd
        $changeLog = ProfileChangeLog::where('id', $request->id)->firstOrFail();
        $changeLog->status = 'rejected';
        $changeLog->save();
        return redirect()->back()->with('success', 'Change Rejected successfully');
    }
}
