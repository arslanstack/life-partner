@extends('layouts.othersView')
@section('content')
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
                    {{($user->first_name ?? '') . ' ' . ($user->last_name ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Username
                </span>
                <span>
                    {{($user->username)}}
                </span>
            </li>
            <!-- <li>
                <span>
                    Email
                </span>
                <span>
                    {{($user->email)}}
                </span>
            </li> -->
            <!-- <li>
                <span>
                    Birthday
                </span>
                <span>
                    {{($user->dob ?? '')}}
                </span>
            </li> -->
            <li>
                <span>
                    Gender
                </span>
                <span>
                    @if($user->gender == '0')
                    Man
                    @elseif($user->gender == '1')
                    Women
                    @elseif($user->gender == '2')
                    Transgender
                    @endif
                </span>
            </li>
            <li>
                <span>
                    I am a
                </span>
                <span>
                    {{($user->iam ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Looking for a
                </span>
                <span>
                    {{($user->interestedin ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Financial Support
                </span>
                <span>
                    @if($user->financial_support == '0')
                    Willing to give
                    @elseif($user->financial_support == '1')
                    Willing to receive
                    @endif
                </span>
            </li>
            <li>
                <span>
                    Marital Status
                </span>
                <span>
                    @if($user->marital_status == '0')
                    Single
                    @elseif($user->marital_status == '1')
                    Married
                    @endif
                </span>
            </li>

            <li>
                <span>
                    Childern
                </span>
                <span>
                    @if($user->child == '0')
                    None
                    @elseif($user->child  == '8')
                    7+
                    @else 
                    {{$user->child}}
                    @endif
                </span>
            </li>
            <li>
                <span>
                    Country
                </span>
                <span>
                    {{($user->country ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    City
                </span>
                <span>
                    {{($user->city ?? '')}}
                </span>
            </li>
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
                    {{($user->height ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Weight
                </span>
                <span>
                    {{($user->weight ?? '')}}
                </span>
            </li>
            <li>
                <span>
                    Body Type
                </span>
                <span>
                    @if($user->body_type == '0')
                    Small
                    @elseif($user->body_type == '1')
                    Average
                    @elseif($user->body_type == '2')
                    Athletic
                    @elseif($user->body_type == '3')
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
            {{($user->about_me ?? '')}}
        </p>
    </div>
</div>
@endsection