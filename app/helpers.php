<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use app\Models\Admin;
use App\Models\ProfileChangeLog;


if (!function_exists('countUsers')) {
    function countUsers()
    {
        return User::count();
    }
}
if (!function_exists('checkPendingApproval')) {
    function ProfileData($userID)
    {
        $userdata = ProfileChangeLog::where('user_id', $userID)->latest()->first();
        if ($userdata) {
            if ($userdata->status == 'pending') {
                $userdata = json_decode($userdata->profile_data);
                return $userdata;
            } else {
                $userdata = User::find($userID);
                return $userdata;
            }
        } else {
            $userdata = User::find($userID);
            return $userdata;
        }
    }
}
if (!function_exists('isPending')) {
    function isPending($userID)
    {
        $userdata = ProfileChangeLog::where('user_id', $userID)->latest()->first();
        if ($userdata) {
            if ($userdata->status == 'pending') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
if (!function_exists('userImage')) {
    function userImage($userID)
    {
        $userImage = User::find($userID)->profile_image;
        if ($userImage) {
            return $userImage;
        } else {
            return 'avatar.jpg';
        }
    }
}
if (!function_exists('userName')) {
    function userName($userID)
    {
        $userName = User::find($userID)->first_name . ' ' . User::find($userID)->last_name;
        if ($userName) {
            return $userName;
        } else {
            return 'John Doe';
        }
    }
}
if (!function_exists('userEmail')) {
    function userEmail($userID)
    {
        $userEmail = User::find($userID)->email;
        return $userEmail;
    }
}
if (!function_exists('distanceCalculator')) {
    function distanceCalculator($lat, $long, $distance)
    {
        $latitude = $lat;
        $longitude = $long;
        $distance = $distance;
        $radius = 6371; // Earth's radius in kilometers

        $latRadians = deg2rad($latitude);
        $lngRadians = deg2rad($longitude);

        $angularDistance = $distance / $radius;

        $latMin = rad2deg($latRadians - $angularDistance);
        $latMax = rad2deg($latRadians + $angularDistance);
        $lngMin = rad2deg($lngRadians - $angularDistance / cos($latRadians));
        $lngMax = rad2deg($lngRadians + $angularDistance / cos($latRadians));
        return [
            'lat_min' => $latMin,
            'lat_max' => $latMax,
            'lng_min' => $lngMin,
            'lng_max' => $lngMax,
        ];
    }
}
if (!function_exists('debug_to_console')) {
    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Laravel Debug Objects: " . $output . "' );</script>";
    }
}
