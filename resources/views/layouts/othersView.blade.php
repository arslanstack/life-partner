<!DOCTYPE html>
<html lang="en">
<!-- Layout for user side home, profile, panel -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/all.min.css">
    <link rel="stylesheet" href="./../assets/css/animate.css">
    <link rel="stylesheet" href="./../assets/css/flaticon.css">
    <link rel="stylesheet" href="./../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./../assets/css/odometer.css">
    <link rel="stylesheet" href="./../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./../assets/css/nice-select.css">
    <link rel="stylesheet" href="./../assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
    <link rel="stylesheet" href="./../assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="./../assets/css/dark.css"> -->

    <link rel="shortcut icon" href="./../assets/images/favicon.png" type="image/x-icon">

    <title>Life Partner - Dating Website</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->
    {{changeStatus(Auth::id())}}
    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img src="./../assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <!-- Commented nabar items for later use -->
                    <li>
                        <a href="/members" {{ request()->route()->getName() === 'members' ? "class=active" : '' }}>Members</a>
                    </li>
                    <li>
                        <a href="/home" {{ request()->route()->getName() === 'home' ? "class=active" : '' }}>Home</a>
                    </li>

                    @if(Auth::check())
                    <li>
                        <a href="/profile" {{ request()->route()->getName() === 'profile' ? "class=active" : '' }}>Profile</a>
                    </li>
                    <li>
                        <a href="/profileSettings" {{ request()->route()->getName() === '*Settings' ? "class=active" : '' }}>Settings</a>
                    </li>
                    @else
                    <li>
                        <a href="/login">Sign in</a>
                    </li>
                    @endif

                    <li class="user-profile">
                        <a href="#">
                            @auth
                            <img style="width: 40px; height: 40px; border-radius: 100%;" src="{{asset('uploads/' . (Auth::user()->profile_image ?? 'avatar.jpg'))}}" alt="">
                            @else
                            <img style="width: 40px; height: 40px; border-radius: 100%;" src="./../assets/images/user-demo.png" alt="">
                            @endauth
                        </a>
                        <ul class="submenu">
                            @if (Route::has('login'))
                            @auth
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <!-- show login option -->
                            <li>
                                <a href="{{ route('login') }}">Log in</a>
                            </li>

                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">Register</a>

                            </li>
                            @endif
                            @endauth
                            @endif
                        </ul>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <div class="search-overlay">
        <div class="close"><i class="fas fa-times"></i></div>
        <form action="#">
            <input type="text" placeholder="Write what you want..">
        </form>
    </div>
    <!-- ==========Header-Section========== -->

    <!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area profile-bc-area">
        <div class="container">
            <div class="content">
                <h2 class="title extra-padding">
                    {{ request()->route()->getName() === 'home' ? "Home" : (request()->route()->getName() === 'profile' ? "Profile" : '') }}
                </h2>

            </div>
        </div>
    </section>
    <!-- ==========Breadcrumb-Section========== -->

    <!-- ========= Profile Section Start -->
    <section class="profile-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7">
                    <div class="left-profile-area">
                        <div class="profile-about-box">
                            <div class="top-bg"></div>
                            <div class="p-inner-content">
                                <div class="profile-img">
                                    <img src="{{asset('uploads/' . ($user->profile_image ?? 'avatar.jpg'))}}" style="width: 120px; height: 120px; border-radius: 100%;" alt="">
                                    <div class="active-online"></div>
                                </div>
                                <h5 class="name">
                                    {{($user->first_name ?? 'First Name') . ' ' . ($user->last_name ?? 'Last Name')}}
                                </h5>
                                <ul class="p-b-meta-one">
                                    <li>
                                        <span>
                                            {{($user->age ?? 'Your Age')}}
                                        </span>
                                    </li>
                                    <li>
                                        <span> <i class="fas fa-map-marker-alt"></i>{{($user->city ?? 'City')}}, {{($user->country ?? 'Country')}}</span>
                                    </li>
                                </ul>
                                <div class="p-b-meta-two">
                                    <div class="right">
                                        <a href="profileSettings" class="custom-button">
                                            <i class="fas fa-envelope"></i> Message
                                        </a>
                                    </div>
                                    <div class="right">
                                        <a href="profileSettings" class="custom-button">
                                            <i class="fas fa-heart"></i> Favouritize
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Static at the moment -->
                        <!-- <div class="profile-meta-box">
                            <ul class="p-m-b">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#usermessage">
                                        <i class="far fa-envelope"></i>
                                        <div class="number">04</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#usernotification">
                                        <i class="far fa-bell"></i>
                                        <div class="number">04</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="profileSettings">
                                        <i class="fas fa-cogs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="profile-uplodate-photo">
                            <h4 class="p-u-p-header">
                                <i class="fas fa-camera"></i> 21 Upload Photos
                            </h4>
                            <div class="p-u-p-list">
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up1.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up1.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up2.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up2.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up3.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up3.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up4.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up4.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up5.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up5.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-col">
                                    <div class="img">
                                        <img src="./../assets/images/profile/up6.jpg" alt="">
                                        <div class="overlay">
                                            <a href="./../assets/images/profile/up6.jpg" class="img-popup"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="profile-main-content">
                        <ul class="top-menu">
                            <li>
                                <!-- Active List Item according to current route -->
                                <a href="home" {{ request()->route()->getName() === 'home' ? "class=active" : '' }}>
                                    Activity
                                </a>
                            </li>
                            <li>

                                <a href="profile" {{ request()->route()->getName() === 'profile' ? "class=active" : '' }}>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Friends
                                    <div class="num">04</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Groups
                                    <div class="num">14</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Media
                                    <div class="num">47</div>
                                </a>
                            </li>
                        </ul>
                        @yield('content')
                        <!-- Page content according to route Home, Profile etc -->
                    </div>
                </div>


                <!-- Static at the moment -->
                <div class="col-xl-3 col-lg-5 col-md-7">
                    <div class="profile-aside-area">
                        <div class="other-profile">
                            <div class="o-p-header">
                                <h6 class="title">
                                    You may like
                                </h6>
                            </div>
                            <div class="o-p-content">
                                <div class="p-u-p-list-slider owl-carousel">
                                    <div class="slider-item">
                                        <div class="p-u-p-list">
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img1.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img2.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img3.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img4.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img5.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img6.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img7.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img8.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="p-u-p-list">
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img1.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img2.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img3.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img4.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img5.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img6.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img7.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="my-col">
                                                <div class="img">
                                                    <img src="./../assets/images/profile/op-img8.png" alt="">
                                                    <a href="single-profile.html" class=""><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="chat-request">
                            <div class="c-r-heading">
                                <h6 class="title">
                                    <i class="far fa-comments"></i> Chat Request
                                </h6>
                            </div>
                            <div class="c-r-content">
                                <div class="c-r-content-list">
                                    <div class="single-c-r">
                                        <div class="left">
                                            <img src="./../assets/images/profile/c-r-img1.png" alt="">
                                            <div class="active-online"></div>
                                        </div>
                                        <div class="right">
                                            <h4 class="title">
                                                laura maria
                                            </h4>
                                            <p>
                                                true love is...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-c-r">
                                        <div class="left">
                                            <img src="./../assets/images/profile/c-r-img2.png" alt="">
                                            <div class="active-online"></div>
                                        </div>
                                        <div class="right">
                                            <h4 class="title">
                                                laura maria
                                            </h4>
                                            <p>
                                                true love is...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-c-r">
                                        <div class="left">
                                            <img src="./../assets/images/profile/c-r-img3.png" alt="">
                                            <div class="active-online"></div>
                                        </div>
                                        <div class="right">
                                            <h4 class="title">
                                                laura maria
                                            </h4>
                                            <p>
                                                true love is...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="load-more">
                                    load More
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========= Profile Section Start -->

    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <img class="shape1" src="./../assets/images/footer/f-shape.png" alt="">
        <img class="shape2" src="./../assets/images/footer/flower01.png" alt="">
        <img class="shape3" src="./../assets/images/footer/right-shape.png" alt="">
        <div class="newslater-section">

            <!-- Static at the moment -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="newslater-container">
                            <div class="newslater-wrapper">
                                <div class="icon">
                                    <img src="./../assets/images/footer/n-icon.png" alt="">
                                </div>
                                <p class="text">Sign up to recieve a monthly email on the latest news!</p>
                                <form class="newslater-form">
                                    <input type="text" placeholder="Your Email Address">
                                    <button type="submit">
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-links">
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="hr">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="link-wrapper one">
                            <h4 class="f-l-title">
                                Our Information
                            </h4>
                            <ul class="f-solial-links">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Customer Reviews
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Success Stories
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Business License
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="link-wrapper two">
                            <h4 class="f-l-title">
                                My Account
                            </h4>
                            <ul class="f-solial-links">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Manage Account
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Safety Tips
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Account Varification
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Safety & Security
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Membership Level
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="link-wrapper three">
                            <h4 class="f-l-title">
                                help center
                            </h4>
                            <ul class="f-solial-links">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Help centre
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i>Quick Start Guide
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i>Tutorials
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i>Associate Blog
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="link-wrapper four">
                            <h4 class="f-l-title">
                                legal
                            </h4>
                            <ul class="f-solial-links">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Privacy policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> End User Agreements
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Refund Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Cookie policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-angle-double-right"></i> Report abuse
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="hr2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="copyr-text">
                            <span>
                                Copyright © 2023.All Rights Reserved By
                            </span>
                            <a href="/">Life Partner</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="footer-social-links">
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==========Newslater-Section========== -->
    <!-- User Message Modal -->
    <div class="modal fade" id="usermessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <div id="mycontainer">
                        <aside>
                            <header>
                                <input type="text" placeholder="search">
                            </header>
                            <ul>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status orange"></span>
                                            offline
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_02.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_03.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status orange"></span>
                                            offline
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_05.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status orange"></span>
                                            offline
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_06.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_07.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_08.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_09.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg" alt="">
                                    <div>
                                        <h2>Prénom Nom</h2>
                                        <h3>
                                            <span class="status orange"></span>
                                            offline
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <main>
                            <header>
                                <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                                <div>
                                    <h2>Vincent Porter</h2>
                                    <h3>already 1902 messages</h3>
                                </div>
                            </header>
                            <ul id="chat">
                                <li class="you">
                                    <div class="entete">
                                        <span class="status green"></span>
                                        <h2>Vincent</h2>
                                        <h3>10:12AM, Today</h3>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                </li>
                                <li class="me">
                                    <div class="entete">
                                        <h3>10:12AM, Today</h3>
                                        <h2>Vincent</h2>
                                        <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                </li>
                                <li class="me">
                                    <div class="entete">
                                        <h3>10:12AM, Today</h3>
                                        <h2>Vincent</h2>
                                        <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        OK
                                    </div>
                                </li>
                                <li class="you">
                                    <div class="entete">
                                        <span class="status green"></span>
                                        <h2>Vincent</h2>
                                        <h3>10:12AM, Today</h3>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                </li>
                                <li class="me">
                                    <div class="entete">
                                        <h3>10:12AM, Today</h3>
                                        <h2>Vincent</h2>
                                        <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                </li>
                                <li class="me">
                                    <div class="entete">
                                        <h3>10:12AM, Today</h3>
                                        <h2>Vincent</h2>
                                        <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        OK
                                    </div>
                                </li>
                            </ul>
                            <footer>
                                <textarea placeholder="Type your message"></textarea>
                                <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
                                <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
                                <a href="#">Send</a>
                            </footer>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal  fade" id="usernotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="header-area">
                        <h4>
                            Notifications
                        </h4>
                        <div class="links">
                            <a href="#">Mak all as Read</a>
                            <a href="#">Settings</a>
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="single-list">
                            <div class="img">
                                <img src="./../assets/images/n1.png" alt="">
                                <span class="active"></span>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h5>
                                        Ann Perry posted a comment on your <a href="#">status update</a>
                                    </h5>
                                    <span>
                                        2 minutes ago
                                    </span>
                                </div>
                                <div class="right">
                                    <i class="far fa-clone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-list">
                            <div class="img">
                                <img src="./../assets/images/n2.png" alt="">
                                <span class="active"></span>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h5>
                                        Shelia Gutierrez left a like reaction on your <a href="#">status update</a>
                                    </h5>
                                    <span>
                                        2 minutes ago
                                    </span>
                                </div>
                                <div class="right">
                                    <i class="far fa-clone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-list">
                            <div class="img">
                                <img src="./../assets/images/n3.png" alt="">
                                <span class="active"></span>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h5>
                                        Sabrina Weber posted a comment on your <a href="#">photo</a>
                                    </h5>
                                    <span>
                                        2 minutes ago
                                    </span>
                                </div>
                                <div class="right">
                                    <i class="far fa-clone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="view-all-link">View all Notifications</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./../assets/js/jquery-3.3.1.min.js"></script>
    <script src="./../assets/js/modernizr-3.6.0.min.js"></script>
    <script src="./../assets/js/plugins.js"></script>
    <script src="./../assets/js/bootstrap.min.js"></script>
    <script src="./../assets/js/heandline.js"></script>
    <script src="./../assets/js/isotope.pkgd.min.js"></script>
    <script src="./../assets/js/magnific-popup.min.js"></script>
    <script src="./../assets/js/owl.carousel.min.js"></script>
    <script src="./../assets/js/wow.min.js"></script>
    <script src="./../assets/js/countdown.min.js"></script>
    <script src="./../assets/js/odometer.min.js"></script>
    <script src="./../assets/js/viewport.jquery.js"></script>
    <script src="./../assets/js/nice-select.js"></script>
    <script src="./../assets/js/main.js"></script>
</body>

</html>