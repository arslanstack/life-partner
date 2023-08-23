@extends('layouts.main')
@section('content')

<!-- ==========Banner-Section========== -->
<section class="banner-section">
    <img class="img1 wow fadeInLeft" src="assets/images/banner/aimg1.png" alt="">
    <img class="img2 wow fadeInRight" src="assets/images/banner/aimg2.png" alt="">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <h1 class="main-title wow fadeInLeft">
                    Find Love
                    Your Life
                </h1>
                <div class="join-now-box wow fadeInUp">
                    <div class="single-option">
                        <p class="title">
                            I am a :
                        </p>
                        <div class="option">
                            <div class="s-input mr-3">
                                <input type="radio" name="gender" id="male"><label for="male">Male</label>
                            </div>
                            <div class="s-input">
                                <input type="radio" name="gender" id="female"><label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="single-option gender">
                        <p class="title">
                            Seeking a :
                        </p>
                        <div class="option">
                            <div class="s-input mr-4">
                                <input type="radio" name="seeking" id="males"><label for="males">Man</label>
                            </div>
                            <div class="s-input">
                                <input type="radio" name="seeking" id="females"><label for="females">Woman</label>
                            </div>
                        </div>
                    </div>
                    <div class="single-option age">
                        <p class="title">
                            Ages :
                        </p>
                        <div class="option">
                            <div class="s-input mr-3">
                                <select class="select-bar">
                                    <option value="">18</option>
                                    <option value="">20</option>
                                    <option value="">24</option>
                                </select>
                            </div>
                            <div class="separator">
                                -
                            </div>
                            <div class="s-input ml-3">
                                <select class="select-bar">
                                    <option value="">30</option>
                                    <option value="">35</option>
                                    <option value="">40</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="single-option last">
                        <p class="title">
                            Country :
                        </p>
                        <div class="option">
                            <div class="s-input mr-3">
                                <select class="select-bar">
                                    <option>Select Country</option>
                                    <option value="">India</option>
                                    <option value="">Japan</option>
                                    <option value="">England</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="joun-button">
                        <a href="/register" class="custom-button">Join Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Feature-Section========== -->
<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-feature wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon">
                        <img src="assets/images/feature/icon01.png" alt="">
                    </div>
                    <h4>
                        100% Verifide
                    </h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-feature wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon">
                        <img src="assets/images/feature/icon02.png" alt="">
                    </div>
                    <h4>
                        Most Secure
                    </h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-feature wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon">
                        <img src="assets/images/feature/icon03.png" alt="">
                    </div>
                    <h4>
                        100% Privacy
                    </h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-feature wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="assets/images/feature/icon04.png" alt="">
                    </div>
                    <h4>
                        Smart Matching
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Feature-Section========== -->

<!-- ==========Start-Flirting-Section========== -->
<section class="flirting-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    <div class="section-header">
                        <h6 class="sub-title extra-padding wow fadeInUp">
                            Meet New People Today!
                        </h6>
                        <h2 class="title extra-padding wow fadeInUp">
                            Start Flirting
                        </h2>
                        <p>
                            In our modern day and age dating apps have become an
                            integral part of our lives. They allow you to check the profile of singles living near
                            you, to chat with them, to meet them and maybe to fall in love.
                        </p>
                        <br>
                        <p>
                            If you’re searching for a simple dating app with free features
                            allowing to meet singles, you’re in good hands with Pairko. With Pairko you get all you
                            need from a mobile dating app, which presents you thousands of users through your
                            smartphone in a very pleasant experience.
                        </p>
                    </div>

                    <a href="/register" class="custom-button">Seek Your Partner</a>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="img">
                    <img class="bg-shape" src="assets/images/flirting/circle.png" alt="">
                    <img src="assets/images/flirting/illutration.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Start-Flirting-Section========== -->

<!-- ==========How it work Section========== -->
<section class="how-it-work-section">
    <img class="shape1" src="assets/images/h-it-w/circle-shape.png" alt="">
    <img class="shape2" src="assets/images/h-it-w/bird.png" alt="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="content">
                    <div class="section-header">
                        <h6 class="sub-title extra-padding wow fadeInUp">
                            Meet New People Today!
                        </h6>
                        <h2 class="title wow fadeInUp">
                            How Does It Work?
                        </h2>
                        <p class="text wow fadeInUp">
                            You’re just 3 steps away from a great date
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-work-box wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon">
                        <img src="assets/images/h-it-w/icon1.png" alt="">
                        <div class="number">
                            01
                        </div>
                    </div>
                    <h4 class="title">
                        Tell us who you are!
                    </h4>
                    <a href="/register" class="custom-button">Join Now !</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-work-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon">
                        <img src="assets/images/h-it-w/icon2.png" alt="">
                        <div class="number">
                            02
                        </div>
                    </div>
                    <h4 class="title">
                        Find the right person
                    </h4>
                    <a href="/register" class="custom-button">Join Now !</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-work-box wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon">
                        <img src="assets/images/h-it-w/icon3.png" alt="">
                        <div class="number">
                            03
                        </div>
                    </div>
                    <h4 class="title">
                        Start Dating
                    </h4>
                    <a href="/register" class="custom-button">Join Now !</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========How it work Section========== -->

<!-- ==========Statistics-Section========== -->
<section class="statistics-section">
    <div class="container">
        <div class="statistics-wrapper">
            <div class="row mb--20">
                <div class="col-md-4 col-sm-6">
                    <div class="stat-item wow fadeInUp" data-wow-delay="0.1s">
                        <div class="icon">
                            <img src="assets/images/statistics/stat01.png" alt="">
                        </div>
                        <div class="stat-content">
                            <h3 class="counter-item"><span class=" odometer" data-odometer-final="350"></span>M</h3>
                            <span class="info">Tickets Booked</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="assets/images/statistics/stat02.png" alt="">
                        </div>
                        <div class="stat-content">
                            <h3 class="counter-item"><span class=" odometer" data-odometer-final="447"></span>M</h3>
                            <span class="info">Usefull Sessions</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-item wow fadeInUp" data-wow-delay="0.3s">
                        <div class="icon">
                            <img src="assets/images/statistics/stat03.png" alt="">
                        </div>
                        <div class="stat-content">
                            <h3 class="counter-item"><span class=" odometer" data-odometer-final="60"></span>M</h3>
                            <span class="info">Talented Speakers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Statistics-Section========== -->

<!-- ==========Join-now-Section========== -->
<section class="join-now-section">
    <img class="shape1" src="assets/images/join/heartshape.png" alt="">
    <img class="shape2" src="assets/images/join/img.png" alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    <div class="section-header white-color">
                        <h2 class="title wow fadeInUp">
                            Best Ways to Find Your
                            True Sole Mate
                        </h2>
                    </div>

                    <a href="/register" class="custom-button">Join Now !</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Join-now-Section========== -->

<!-- ==========Features-Section========== -->
<section class="feature-section extra-feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="content">
                    <div class="section-header">
                        <h6 class="sub-title wow fadeInUp">
                            An Exhaustive List Of
                        </h6>
                        <h2 class="title extra-padding wow fadeInUp">
                            Amazing Features
                        </h2>
                        <p class="text">
                            To find meaningful connections, dates, and life partners.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-area">
        <div class="left-image">
            <div class="offer">
                <div class="offer-inner-content">
                    <span class="fs">START NOW FOR</span>
                    <h2>
                        FREE
                    </h2>
                    <span class="ss">7 DAY TRIAL</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5">
                    <div class="feature-lists">
                        <div class="single-feature-list wow fadeInUp" data-wow-delay="0.1s">
                            <div class="icon">
                                <img src="assets/images/feature/i1.png" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    Simple to use
                                </h4>
                                <p>
                                    Simple steps to follow to have a matching
                                    connection.
                                </p>
                            </div>
                        </div>
                        <div class="single-feature-list wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon">
                                <img src="assets/images/feature/i2.png" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    Smart Matching
                                </h4>
                                <p>
                                    Simple steps to follow to have a matching
                                    connection.
                                </p>
                            </div>
                        </div>
                        <div class="single-feature-list wow fadeInUp" data-wow-delay="0.3s">
                            <div class="icon">
                                <img src="assets/images/feature/i3.png" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    Filter very fast
                                </h4>
                                <p>
                                    Simple steps to follow to have a matching
                                    connection.
                                </p>
                            </div>
                        </div>
                        <div class="single-feature-list wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon">
                                <img src="assets/images/feature/i4.png" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    Cool community
                                </h4>
                                <p>
                                    Simple steps to follow to have a matching
                                    connection.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Features-Section========== -->

<!-- ==========Latest-Registered-Section========== -->
<section class="latest-registered-section">
    <img class="shape" src="assets/images/registered/shape.png" alt="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="content">
                    <div class="section-header">
                        <h6 class="sub-title extra-padding wow fadeInUp">
                            Latest Registered
                        </h6>
                        <h2 class="title wow fadeInUp">
                            Members
                        </h2>
                        <p class="text">
                            if you have been looking for the someone
                            special of your life for long, then your
                            search ends here
                        </p>
                    </div>
                    <a href="#/register" class="custom-button">Join Now !</a>
                </div>
            </div>
            <div class="col-xl-6 align-self-center">
                <div class="registered-slider owl-carousel">
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p1.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p2.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p3.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p4.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p5.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                    <div class="single-slider">
                        <div class="img">
                            <img src="assets/images/registered/p1.png" alt="">
                        </div>
                        <div class="inner-content">
                            <h4 class="name">
                                Dana Miles
                            </h4>
                            <p>
                                25 Years Old
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Latest-Registered-Section========== -->

<!-- ==========Success-Stories-Section========== -->
<section class="sucess-stories-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="content">
                    <div class="section-header">
                        <h6 class="sub-title wow fadeInUp">
                            Love in faith
                        </h6>
                        <h2 class="title wow fadeInUp">
                            Success Stories
                        </h2>
                        <p class="text wow fadeInUp">
                            Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor
                            mattis ullamcorper urna. Cras quis elementum
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-story-box wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img">
                        <img src="assets/images/sucess/img1.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="author">
                            <img src="assets/images/sucess/p1.png" alt="">
                            <span></span>
                        </div>
                        <h4 class="title">
                            Love horoscope for Cancer
                            There will be...
                        </h4>
                        <p class="date">
                            December 10, 2021
                        </p>
                    </div>
                    <div class="box-footer">
                        <div class="left">
                            <ul class="box-social-links">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right">
                            <a href="#">
                                Read More<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-story-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="img">
                        <img src="assets/images/sucess/img2.png" alt="">
                    </div>
                    <div class="content">
                        <div class="author">
                            <img src="assets/images/sucess/p2.png" alt="">
                            <span></span>
                        </div>
                        <h4 class="title">
                            ‘love at first sight’ is all
                            about initial attraction...
                        </h4>
                        <p class="date">
                            December 11, 2021
                        </p>
                    </div>
                    <div class="box-footer">
                        <div class="left">
                            <ul class="box-social-links">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right">
                            <a href="#">
                                Read More<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-story-box wow fadeInUp" data-wow-delay="0.3s">
                    <div class="img">
                        <img src="assets/images/sucess/img3.png" alt="">
                    </div>
                    <div class="content">
                        <div class="author">
                            <img src="assets/images/sucess/p3.png" alt="">
                            <span></span>
                        </div>
                        <h4 class="title">
                            What women actually
                            want to feel on their...
                        </h4>
                        <p class="date">
                            December 14, 2021
                        </p>
                    </div>
                    <div class="box-footer">
                        <div class="left">
                            <ul class="box-social-links">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right">
                            <a href="#">
                                Read More<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Success-Stories-Section========== -->
@endsection