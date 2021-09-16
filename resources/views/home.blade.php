@extends('layouts.app')

@section('content')
<style>
    #topbar {
        background: #90e434;
        height: 35px;
        font-size: 14px;
        transition: all 0.5s;
        color: #000000;
    }
    .nav-menu > ul > li > a:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #90e434;
        visibility: hidden;
        width: 0px;
        transition: all 0.3s ease-in-out 0s;
    }

    .nav-menu .drop-down ul a:hover, .nav-menu .drop-down ul .active > a, .nav-menu .drop-down ul li:hover > a {
        color: #90e434;
    }

    @media (max-width: 992px) {
        #header {
            padding: 15px;
            top: 1rem;
        }
        #header .logo {
            font-size: 28px;
        }

        #topbar {
            background: #90e434;
            height: 30px;
            font-size: 14px;
            transition: all 0.5s;
            color: #000000;
        }

        .searchtype {
            margin-top: 2px;
        }

        button.mobile-nav-toggle.d-lg-none {
            top: 2rem;
        }
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
        <h1>Your Future <span>Remastered</span>
        </h1>
{{--        <h2>Join Our Postgraduate Webinars</h2>--}}
        <div class="d-flex justify-content-center mt-3">
            @if(auth()->check() && auth()->user()->user_type !== '1' || (!auth()->check()))
            <a href="{{ url('/stdlogin') }}" class="btn-get-started">Enroll Now</a>
{{--            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>--}}
            @else
            <a href="{{ url('/enroll') }}" class="btn-get-started">Enroll Now</a>
            @endif
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-4 col-lg-4 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100" style="width: 16rem">
                        <div class="icon"><img class="Card-img" src={{ asset('img/Path-3.png') }} alt=""></div>
                        <h4 class="title"><a href="{{ url('home-two') }}">Our Courses</a></h4>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><img class="Card-img" src={{ asset('img/Group-6.png') }} alt=""></div>
                        <h4 class="title"><a href="">Order a Prospectus</a></h4>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><img class="Card-img"  src={{ asset('img/business-and-trade.png') }} alt=""></div>
                        <h4 class="title"><a href="">Campus Tour</a></h4>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Featured Services Section -->

{{--    <!-- ======= About Section ======= -->--}}
{{--    <section id="about" class="about section-bg">--}}
{{--        <div class="container" data-aos="fade-up">--}}

{{--            <div class="section-title">--}}
{{--                <h3>Our<span> Gallery</span></h3>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="100">--}}
{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-4.png') }}"--}}
{{--                    class="w-100 shadow-2-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}

{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-10.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="100">--}}
{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-6.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}

{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-7.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="100">--}}
{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-8.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}

{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-12.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="100">--}}
{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-5.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}

{{--                <img--}}
{{--                    src="{{ asset('img/NoPath-11.png') }}"--}}
{{--                    class="w-100 shadow-1-strong rounded mb-4"--}}
{{--                    alt=""--}}
{{--                    style="border: 2px solid #fff;"--}}
{{--                />--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}
{{--    </section><!-- End About Section -->--}}

    <!-- ======= Skills Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="section-title mb-5">
                <h3>Academy<span> Ranking</span></h3>
            </div>

            <div class="row">
{{--                <div class="col-lg-0 col-md-0"></div>--}}
                <div class="col-md-4 col-lg-2 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0 rankbox">
                    <div class="icon-box ranktext" data-aos="fade-up" data-aos-delay="100">
                        <p class="card-text"><strong>Ranked 2nd</strong> in the UK for teaching in the Young University Rankings 2020</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0 rankbox">
                    <div class="icon-box ranktext" data-aos="fade-up" data-aos-delay="200" >
                        <p class="card-text">The only UK University in QS World University Rankings <strong>Top 50 Under 50</strong> 2021</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0 rankbox">
                    <div class="icon-box ranktext" data-aos="fade-up" data-aos-delay="300">
                        <p class="card-text">A climb of <strong>8 places</strong> in The Times / Sunday Times Good University Guide 2021</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0 rankbox">
                    <div class="icon-box ranktext" data-aos="fade-up" data-aos-delay="300">
                        <p class="card-text"><strong>"Amongst the world's top universities"</strong> in 13 subject areas in the QS World University Rankings by Subject 2021</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0 rankbox">
                    <div class="icon-box ranktext" data-aos="fade-up" data-aos-delay="300">
                        <p class="card-text"><strong>Ranked 1st</strong> in the UK for teaching in the Young University Rankings 2022</p>
                    </div>
                </div>
{{--                <div class="col-lg-0 col-md-0"></div>--}}
            </div>
        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="section-title mb-5">
                <h3>Our 2025<span> Vision</span></h3>
            </div>

            <div class="row mb-5">
                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box rounded-circle visiontext" data-aos="fade-up" data-aos-delay="100">
                        <img class="Card-img mb-4" src={{ asset('img/presentation.png') }} alt="">
                        <p class="card-text visionbox"><strong>Education & Enterprise</strong></p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box rounded-circle visiontext " data-aos="fade-up" data-aos-delay="200" >
                        <img class="Card-img mb-4" src={{ asset('img/light-bulb.png') }} alt="">
                        <p class="card-text visionbox"><strong>Research and Innovation</strong></p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box rounded-circle visiontext" data-aos="fade-up" data-aos-delay="300">
                        <img class="Card-img mb-4" src={{ asset('img/users-group.png') }} alt="">
                        <p class="card-text visionbox"><strong>People and Cluture</strong></p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box rounded-circle visiontext" data-aos="fade-up" data-aos-delay="300">
                        <img class="Card-img mb-4" src={{ asset('img/hand-shake.png') }} alt="">
                        <p class="card-text visionbox"><strong>Partnerships and Place</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Counts Section -->
</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@endsection
