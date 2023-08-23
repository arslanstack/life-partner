<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\ProfileChangeLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function profileSettings()
    {
        return view('user.profileSettings');
    }
    public function security()
    {
        return view('user.security');
    }
    public function privacy()
    {
        return view('user.privacy');
    }
    public function preferences()
    {
        return view('user.preferences');
    }
    public function subscription()
    {
        return view('user.subscription');
    }



    public function editProfile(Request $request)
    {
        $user = Auth::user();
        // Validate unique username
        $uniqueUsernameRule = 'unique:users,username,' . $user->id;
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255', $uniqueUsernameRule],
            'email' => ['required', 'string', 'max:255'],
        ]);
        // upload image if in request
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/', $filename);
        } else {
            $filename = $user->profile_image;
        }

        // calculate age in years from date of birth using carbon
        $dob = $request->input('dob');
        $age = \Carbon\Carbon::parse($dob)->age;

        $profileData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $age,
            'profile_image' => $filename,
            'email' => $request->email,
            'username' => $request->username,
            'child' => $request->child,
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'about_me' => $request->about_me,
            'address' => $request->address,
            'height' => $request->height,
            'weight' => $request->weight,
            'body_type' => $request->body_type,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        ProfileChangeLog::create([
            'user_id' => $user->id,
            'profile_data' => json_encode($profileData),
        ]);
        return back()->with('success', 'Profile information sent for admin approval.');
    }
















    public function changePassword(Request $request)
    {
        $user = Auth::user();
        // validate $request->password === $request->c_password
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return back()->with('success', 'Password updated successfully.');
    }
    public function changePrivacy(Request $request)
    {

        // validate and update
        $user = Auth::user();
        $user->privacy_status = $request->input('privacy_status');
        $user->show_last_login = $request->input('show_last_login');
        $user->block_male_msg = $request->input('block_male_msg');
        $user->block_female_msg = $request->input('block_female_msg');
        $user->block_trans_msg = $request->input('block_trans_msg');

        $user->save();
        return back()->with('success', 'Privacy settings updated successfully.');
    }

    public function changePreferences(Request $request)
    {

        // validate and update
        $user = Auth::user();
        $user->block_all_email = $request->input('block_all_email');
        $user->block_money_making_opp_email = $request->input('block_money_making_opp_email');
        $user->block_local_event_meet_up_email = $request->input('block_local_event_meet_up_email');
        $user->block_like_favorite_email = $request->input('block_like_favorite_email');
        $user->save();
        return back()->with('success', 'Notification Preferences updated successfully.');
    }
}
