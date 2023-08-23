<!DOCTYPE html>
<html lang="en">
<!-- Authentication Layout -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e24fe634b6.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/odometer.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="../../assets/css/dark.css"> -->

    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">

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



    <!-- ========== Login & Registation Section ========== -->
    <section class="log-reg">
        <div class="top-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <a href="/" class="backto-home"><i class="fas fa-chevron-left"></i> Back to life partner</a>
                    </div>
                    <div class="col-lg-7 ">
                        <div class="logo">
                            <img src="../../assets/images/logo2.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="image image-log">
                </div>
                <div class="col-lg-7">
                    <div class="log-reg-inner">
                        <div class="section-header inloginp">
                            <h2 class="title">
                                Welcome to Life Partner
                            </h2>
                        </div>
                        <div class="main-content inloginp">
                            @yield('content')
                            <!-- Page content according to login, signup, recover account etc pages -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Login & Registation Section ========== -->




    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/modernizr-3.6.0.min.js"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/heandline.js"></script>
    <script src="../../assets/js/isotope.pkgd.min.js"></script>
    <script src="../../assets/js/magnific-popup.min.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/wow.min.js"></script>
    <script src="../../assets/js/countdown.min.js"></script>
    <script src="../../assets/js/odometer.min.js"></script>
    <script src="../../assets/js/viewport.jquery.js"></script>
    <script src="../../assets/js/nice-select.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>


<!-- Mirrored from pixner.net/peyamba/peyamba/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 13:45:16 GMT -->

</html>