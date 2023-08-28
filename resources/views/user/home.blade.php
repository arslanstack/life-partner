@extends('layouts.userpanel')
@section('content')
@php 
$userdata = ProfileData(Auth::id());
@endphp
<div class="write-post-area">
    <div class="write-area">
        <img src="{{asset('uploads/' . ($userdata->profile_image ?? 'avatar.jpg'))}}" style="width: 40px; height: 40px; border-radius: 100%;" alt="">
        <textarea placeholder="What's on your mind, {{($userdata->first_name ?? 'First Name') }}"></textarea>
    </div>
    <div class="submit-area">
        <!-- Static at the moment -->
        <div class="left">
            <a href="#" class="upload-btn">
                <i class="fas fa-paperclip"></i>
            </a>
            <div class="select-area">
                <select class="nice-select select-bar">
                    <option value="">Public</option>
                    <option value="">Friends</option>
                    <option value="">Only me</option>
                </select>
            </div>

        </div>
        <div class="right">
            <a href="#" class="custom-button">
                Post
            </a>
        </div>
    </div>
</div>

        <!-- Static at the moment -->
<div class="profile-single-post">
    <div class="p-s-p-header-area">
        <div class="img">
        <img src="{{asset('uploads/' . ($userdata->profile_image ?? 'avatar.jpg'))}}" style="width: 40px; height: 40px; border-radius: 100%;" alt="">
            <div class="active-online"></div>
        </div>
        <h6 class="name">
        {{($userdata->first_name ?? 'First Name') . ' ' . ($userdata->last_name ?? 'Last Name')}}
        </h6>
        <span class="is-varify">
            <i class="fas fa-check"></i>
        </span>
        <span class="usewrname">
        {{$userdata->username}}
        </span>
        <span class="post-time">
            . 19h
        </span>
    </div>
    <div class="p-s-p-content">
        <p>
            Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Nam vel porta felis.
        </p>
        <img src="assets/images/profile/s-p-img1.jpg" alt="">
    </div>
    <div class="p-s-p-content-footer">
        <div class="left">
            <a href="#" class="comment">Comment</a>
            <a href="#" class="link"><i class="far fa-star"></i></a>
        </div>
        <div class="right">
            <a href="#" class="link"><i class="far fa-star"></i></a>
            <select class="nice-select select-bar">
                <option value="">ALL</option>
                <option value="">NEW</option>
                <option value="">OLD</option>
                <option value="">POPULAR</option>
            </select>
        </div>
    </div>
</div>
@endsection