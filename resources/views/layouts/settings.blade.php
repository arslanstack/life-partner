<!DOCTYPE html>
<html lang="en">
<!-- Layout for all sorts of user side settings -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="assets/css/dark.css"> -->

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

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

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img src="assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
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
                        <a href="/profileSettings" {{ request()->is('*Settings') ? "class=active" : '' }}>Settings</a>
                    </li>
                    @else
                    <li>
                        <a href="/login">Sign in</a>
                    </li>
                    @endif
                    <li class="user-profile">
                        <a href="#">
                            @auth
                            <!-- if user authenticated show profile picture else show static avatar -->
                            <img style="width: 40px; height: 40px; border-radius: 100%;" src="{{asset('uploads/' . ($userdata->profile_image ?? 'avatar.jpg'))}}" alt="">
                            @else
                            <img style="width: 40px; height: 40px; border-radius: 100%;" src="assets/images/user-demo.png" alt="">
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

            </div>
        </div>
    </header>

    <!-- ==========Header-Section========== -->

    <!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area profile-bc-area">
        <div class="container">
            <div class="content">
                <h2 class="title extra-padding">
                    Settings
                </h2>
            </div>
        </div>
    </section>
    <!-- ==========Breadcrumb-Section========== -->


    <!-- ========= Profile Section Start -->

    <section class="user-setting-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span>Your Settings</span>
                                    <div class="t-icon">
                                        <i class="fas fa-plus"></i>
                                        <i class="fas fa-minus"></i>
                                    </div>
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul class="links">

                                        <li>
                                            <!-- class="active" -->
                                            <a href="profileSettings" {{ request()->route()->getName() === 'profileSettings' ? "class=active" : '' }}>Profile Settings</a>
                                        </li>
                                        <li>
                                            <a href="securitySettings" {{ request()->route()->getName() === 'securitySettings' ? "class=active" : '' }}>Security Settings</a>
                                        </li>
                                        <li>
                                            <a href="privacySettings" {{ request()->route()->getName() === 'privacySettings' ? "class=active" : '' }}>Privacy Settings</a>
                                        </li>
                                        <li>
                                            <a href="preferencesSettings" {{ request()->route()->getName() === 'preferencesSettings' ? "class=active" : '' }}>Notification Preferences</a>
                                        </li>
                                        <li>
                                            <a href="subscriptionSettings" {{ request()->route()->getName() === 'subscriptionSettings' ? "class=active" : '' }}>Subscriptions and Payments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </section>

    <!-- ========= Profile Section Start -->

    <!-- ========= account deletion confirmation Modal -->


    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delModalLabel">Confirm Account Deletion</h5>
                </div>
                <div class="modal-body">
                    <form action="delAccount" method="POST">
                        @csrf
                        <p class="text-danger text-center bg-light"><strong>Once deleted you cannot recover your account!</strong></p>
                        <p>Enter your email address to confirm deletion of your account.</p>
                        <small class="text-danger fw-bold text-center d-none" id="errorDel">Please enter email associated with this account.</small>
                        <input type="email" id="confirmEmail" placeholder="Your Account Email">
                </div>
                <div class="modal-footer">
                    <button type="submit" id="delBtn" class="d-none">Save changes</button>
                    <button onclick="return validateDel()" class="custom-button">Confirm Deletion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <img class="shape1" src="assets/images/footer/f-shape.png" alt="">
        <img class="shape2" src="assets/images/footer/flower01.png" alt="">
        <img class="shape3" src="assets/images/footer/right-shape.png" alt="">
        <div class="newslater-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="newslater-container">
                            <div class="newslater-wrapper">
                                <div class="icon">
                                    <img src="assets/images/footer/n-icon.png" alt="">
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
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/heandline.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/viewport.jquery.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/main.js"></script>


    <script>
        // Validate Account Email upon deletion confirmation
        function validateDel() {
            var actualEmail = "{{Auth()->user()->email}}";
            // actual email fetched from laravel sessions of authenticated user
            var email = document.getElementById('confirmEmail').value;
            if (email == actualEmail) {
                document.getElementById('delBtn').click();
                return true;
            } else {
                document.getElementById('errorDel').classList.remove('d-none');
                return false;
            }
        }
    </script>
</body>

</html>