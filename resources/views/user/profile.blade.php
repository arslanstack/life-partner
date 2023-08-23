@extends('layouts.userpanel')

@section('content')


@php 
$userdata = ProfileData(Auth::id());
@endphp
<div class="info-box">
    <div class="header">
        <h4 class="title">
            Personal Details
        </h4>
    </div>
    <div class="content">
        <ul class="infolist">
            <li>
                <span>
                    Name
                </span>
                <span>
                    {{($userdata['first_name'] ?? '') . ' ' . ($userdata['last_name'] ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Username
                </span>
                <span>
                    {{$userdata['username']}}
                </span>
            </li>
            <li>
                <span>
                    Email
                </span>
                <span>
                    {{(Auth::user()->email)}}
                </span>
            </li>
            <li>
                <span>
                    Birthday
                </span>
                <span>
                    {{$userdata['dob']}}
                </span>
            </li>
            <li>
                <span>
                    Gender
                </span>
                <span>
                    @if($userdata['gender'] == '0')
                    Man
                    @elseif($userdata['gender'] == '1')
                    Women
                    @elseif($userdata['gender'] == '2')
                    Transgender
                    @endif
                </span>
            </li>
            <li>
                <span>
                    I am a
                </span>
                <span>
                    {{(Auth()->user()->iam ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Looking for a
                </span>
                <span>
                    {{(Auth()->user()->interestedin ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Financial Support
                </span>
                <span>
                    @if(Auth()->user()->financial_support == '0')
                    Willing to give
                    @elseif(Auth()->user()->financial_support == '1')
                    Willing to receive
                    @endif
                </span>
            </li>
            <li>
                <span>
                    Marital Status
                </span>
                <span>
                    @if($userdata['marital_status'] == '0')
                    Single
                    @elseif($userdata['marital_status'] == '1')
                    Married
                    @endif
                </span>
            </li>

            <li>
                <span>
                    Childern
                </span>
                <span>
                    @if($userdata['child'] == '0')
                    No
                    @elseif($userdata['child'] == '1')
                    Yes
                    @endif
                </span>
            </li>
            <!-- <li>
                <span>
                    Country
                </span>
                <span>
                    {{($profile->country ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    City
                </span>
                <span>
                    {{($profile->city ?? '')}}
                </span>
            </li> -->
        </ul>
    </div>
</div>
<div class="info-box">
    <div class="header">
        <h4 class="title">
            Physical Details
        </h4>
    </div>
    <div class="content">
        <ul class="infolist">
            <li>
                <span>
                    Height
                </span>
                <span>
                    {{($userdata['height'] ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Weight
                </span>
                <span>
                    {{($userdata['weight'] ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Body Type
                </span>
                <span>
                    @if($userdata['body_type'] == '0')
                    Small
                    @elseif($userdata['body_type'] == '1')
                    Average
                    @elseif($userdata['body_type'] == '2')
                    Athletic
                    @elseif($userdata['body_type'] == '3')
                    Large
                    @endif
                </span>
            </li>
        </ul>
    </div>
</div>
<div class="info-box">
    <div class="header">
        <h4 class="title">
            About Me
        </h4>
    </div>
    <div class="content">
        <p class="text">
        {{($userdata['about_me'] ?? '')}}
        </p>
    </div>
</div>
@endsection