<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <link rel="stylesheet" href="./../assets/css/slidersandbtns.css">
    <!-- <link rel="stylesheet" href="./../assets/css/dark.css"> -->
    <script>
        var send_end = "{{Auth::id()}}";
        console.log(send_end);
        var rec_end = null;
        var rec_name;
        var allUsers = [];
    </script>
    <link rel="shortcut icon" href="./../assets/images/favicon.png" type="image/x-icon">

    <title>Life Partner - Dating Website</title>


</head>

<body>
    {{changeStatus(Auth::id())}}
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
                    <li>
                        <a href="/chat" {{ request()->is('chat*') ? "class=active" : 'hidden' }}>Chat</a>
                    </li>
                    <li>
                        <a href="/members" {{ request()->route()->getName() === 'members' ? "class=active" : '' }} >Members</a>
                    </li>
                    <li>
                        <a href="/home" onclick="localStorage.clear();" class="">Home</a>
                    </li>

                    @if(Auth::check())
                    <li>
                        <a href="/profile" onclick="localStorage.clear();">Profile</a>
                    </li>
                    @else
                    <li>
                        <a href="/login">Sign in</a>
                    </li>
                    @endif
                    <li class="separator">
                        <span>|</span>
                    </li>
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
                                <a href="{{ url('/profileSettings') }}" onclick="localStorage.clear();">Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); localStorage.clear();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @else
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
    @yield('content')

    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <img class="shape1" src="./../assets/images/footer/f-shape.png" alt="">
        <img class="shape2" src="./../assets/images/footer/flower01.png" alt="">
        <img class="shape3" src="./../assets/images/footer/right-shape.png" alt="">
        <div class="newslater-section">
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
                            <a href="#">Life Partner</a>
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="./../assets/js/plugins.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <script src="./../assets/js/modernizr-3.6.0.min.js"></script>



</body>

</html>