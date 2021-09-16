@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: "Lato", sans-serif !important;
    }

    #hero h1 {
        margin: 0;
        font-size: 48px;
        font-weight: 700;
        line-height: 56px;
        color: #ffff;
        font-family: "Lato", sans-serif;
    }

    #hero h2 {
        color: #ffff;
        margin: 5px 0 30px 0;
        font-size: 24px;
        font-weight: 400;
        font-family: "Lato", sans-serif;
    }

    .nav-menu > ul > li > a:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #f4772e;
        visibility: hidden;
        width: 0px;
        transition: all 0.3s ease-in-out 0s;
    }

    .nav-menu .drop-down ul a:hover, .nav-menu .drop-down ul .active > a, .nav-menu .drop-down ul li:hover > a {
        color: #f4772e;
    }

    #hero {
        width: 100%;
        height: 125vh;
        background: url("../img/lama-cover-image.jpg") top left;
        background-size: cover;
        position: relative;
        margin-top: -100px;
    }

    #hero h1 span {
        color: #f4772e;
    }

    section {
        padding: 45px 0;
        overflow: hidden;
    }

    #featured-services p {
        line-height: 1.8rem;
        font-weight: 500;
        padding: 15px;
        font-size: 20px;
    }

    button.btn.btn-primary.btn-lg {
        background: #f4772e;
        border-color: #ffff;
    }

    .section-title h3 span {
        color: #f4772e;
        font-family: "Lato", sans-serif;
    }

    img.w-100.shadow-1-strong.rounded.mb-4.gpic.aos-init.aos-animate:hover {
        filter: brightness(80%);
    }

    /*img.w-100.shadow-1-strong.rounded.mb-4.gpic {*/
    /*    border: 3px solid #f4772e;*/
    /*}*/

    #footer .footer-top .footer-links ul a:hover {
        text-decoration: none;
        color: #f4772e;
    }

    .back-to-top i {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        background: #f4772e;
        color: #fff;
        transition: all 0.4s;
    }

    #preloader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #f4772e;
        border-top-color: #e2eefd;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;

    }

    .featured-services .title-lawma {
        font-weight: 800;
        margin-bottom: 15px;
        font-size: 30px;
        font-family: "Lato", sans-serif;
    }

    .featured-services p.lawma-para {
        line-height: 1.5rem !important;
        font-weight: 500 !important;
        padding: 0px !important;
        font-size: 15px !important;
    }

    .custom-green-bg,
    .btn-custom-green {
        background-color: #f4772e;
        border-color: #f4772e;
        color: #fff;
    }

    #custom-search-main-input {
        height: calc(2.3em + .75rem + 2px);
    }

    .text-on-image-con {
        position: relative;
    }

    .text-on-image-con .text-con {
        position: absolute;
        width: 100%;
        bottom: 0px;
        /*left: 1%;*/
        padding: 10px;
    }

    .text-on-image-con .text-con p,
    .text-on-image-con .text-con h4 {
        color: #fff;
    }

    .custom-btn{
        width:100%;
        font-size: 20px;
    }

    span.greentitle {
        color: #f4772e;
    }

    .text-on-image-con {
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    }

    button.btn.btn-lg.btn-custom-green.custom-btn {
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    }

    select {
        border: none;
        font-size: 2.4rem;
        font-weight: 700;
        font-family: "Roboto", sans-serif;
        margin-top: -4px;
        outline: none;
    }
</style>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
        <h1>Welcome to <span>LAWMA Academy</span>
        </h1>
        <h2>A Home of Waste Management Education</h2>
    </div>
</section><!-- End Hero -->

<main id="main">

    <section id="featured-services" class="featured-services">
        <div class="section-title pt-3">
            <h3>Our<span> Courses</span></h3>
        </div>

        <div class="row pt-5 mr-0 ml-0">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-4 text-center" style="padding: 50px; padding-top:10px" data-aos="fade-down" data-aos-delay="300">
                    <div class="text-on-image-con">
                        <img src="{{asset('image/'.$product->image)}}" style="" class="img-fluid" alt="" srcset="">
                        <div class="text-con">
                            <h4>{{ $product->p_title }}<span class="greentitle"></span></h4>
                            {{-- <p>At SafeEnviro academy we offer the highest quality of academic  and professional experience in the Waste</p>--}}
                        </div>
                    </div>
                    <div class="btn-con mt-2" data-aos="flip-up">
                        <button class="btn btn-lg btn-custom-green custom-btn" data-toggle="modal" data-target="#course-{{ $product->id }}">View Course</button>
                        {{-- <a href="{{ url('book-now') }}"><button class="btn btn-lg btn-custom-blue custom-btn ml-1 float-right">Pay Here</button></a>--}}
                    </div>

                </div>

                <div class="modal fade" id="course-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">{{$product->p_title}}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Description</h4>
                                <p>
                                    {!! $product->p_description !!}
                                </p>
                                <div class="row col-lg-6 col-md-auto float-right">
                                    <h1 class="d-inline float-right px-1 ">Fee:</h1>
                                    {{--                                                <select id="forex-rate" name="rate" class="d-inline float-right total" >--}}
                                    {{--                                                    @foreach($rates as $rate)--}}
                                    {{--                                                        <option value="{{ $rate->id }}" id="base" name="{{$rate->code}}" class="cur"--}}
                                    {{--                                                                {{ \Illuminate\Support\Facades\Session::get('currency') === $rate->id ? 'selected' : '' }} }}>{{ $rate->symbol }}</option>--}}
                                    {{--                                                    @endforeach--}}
                                    {{--                                                </select>--}}
                                    <h1 class="float-right px-1" id="forex-amount">£ {{number_format($product->p_amount,2)}}</h1>
                                    <h1 class="float-right" id="forex-newamount"></h1>
                                </div>
                            </div>
                            <div class="modal-footer col-lg-12">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                @if(auth()->check() && auth()->user()->user_type !== '1' || (!auth()->check()))
                                    <a href="{{ url('/stdlogin') }}" class="btn-get-started">Enroll Now</a>
                                @else
                                    <a href="{{ url('/enroll') }}" class="btn-get-started">Enroll Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </section>

    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-auto"></div>
                <div class="d-flex justify-content-center align-content-center text-center">
                    <a href="https://www.lawmaacademy.com/" class="logo mr-auto"><img src={{ asset('img/lawmaimages/logo.png') }} alt="" style="width: 70%;"></a>
                </div>
                <div class="col-auto"></div>
            </div>

            <div class="row mt-4">
                <div class="">
                    <p class="text-black-100">
                        LAWMA Academy is an educational platform for literacy improvement and career development in waste management. We offer credible hands-on waste management tutelage and programs to all stakeholders in waste management businesses including organisations, professionals, facility managers, students and other public and private entities.
                        <br></br>
                        LAWMA Academy provides the citadel for learning, knowledge exchange, networking, and expertise development for design, adoption and implementation of sustainable waste management solutions.
                        <br></br>
                        LAWMA Academy is therefore the knowledge hub of waste management.
                        As the name implies, this training will cover special areas of interest in waste management as waste management processes are more advanced than just collection, transportation and disposal at landfills.
                        It comprises different areas like Resource Recovery & Waste Management, Smarter Solutions for Segregation & Logistics, Fleet Management, Waste Recycling, waste PSP models, Waste Financing, Waste Audits, Forensic Waste Analysis, Waste to wealth etc.
                        This training will improve participants skills in waste management, promote efficiency and afford participants the opportunity to translate what they have learnt to innovative business ideas that will make them financially independent, solve waste management problems and create employment which will help boost the economy.
                        This training will engage key stakeholders from environmental consultants, professionals who work in the waste management sector or on waste management infrastructural projects, project managers, administrators, coordinators and other professionals who work on community based projects.
                        Trainings will be designed for interested applicants in special area of interest in waste management on need assessment.

                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="https://www.lawmaacademy.com/"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-arrow-circle-right mr-2"></i>Visit LAWMA Academy</button></a>
                </div>
            </div>

        </div>
    </section>
    <!-- End Featured Services Section -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="flip-left" data-aos-delay="100">
                        <div class="icon"><img class="Card-lawimg" src={{ asset('img/portal/Training.jpg') }} alt="" style="margin-left: -15px;"></div>
                        <h3 class="title-lawma">Training & Workshop</h3>
                        <p class="lawma-para">Delivering a range of waste and resource management solutions</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="flip-left" data-aos-delay="200">
                        <div class="icon"><img class="Card-lawimg" src={{ asset('img/portal/Consultant.jpg') }} alt="" style="margin-left: -15px;"></div>
                        <h3 class="title-lawma">Consulting</h3>
                        <p class="lawma-para">Multi-disciplinary consultancy specializing in the areas of environment, waste management, planning, engineering and logistics</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="flip-left" data-aos-delay="300">
                        <div class="icon"><img class="Card-lawimg"  src={{ asset('img/portal/Career.jpg') }} alt="" style="margin-left: -15px;"></div>
                        <h3 class="title-lawma">Career Support</h3>
                        <p class="lawma-para">Planning a career! Once you got it your higher education qualification could open up plenty of career options</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center text-center mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="flip-left" data-aos-delay="300">
                        <div class="icon"><img class="Card-lawimg"  src={{ asset('img/portal/International.png') }} alt="" style="margin-left: -15px;"></div>
                        <h3 class="title-lawma">International Recognition</h3>
                        <p class="lawma-para">Become a Chartered Waste professional.  Our international qualifications offer learners great opportunities for career development</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h3>Our<span> Gallery</span></h3>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <a href="{{ asset('img/lawmanewimages/g-1.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-1.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-2.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-2.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-3.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-3.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-14.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-14.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-15.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-15.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-21.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-21.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-22.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-22.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>
                </div>

                <div class="col-lg-3 mb-4 mb-lg-0" >
                    <a href="{{ asset('img/lawmanewimages/g-4.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-4.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-5.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-5.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-6.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-6.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-16.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-16.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-17.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-17.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-20.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-20.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>
                </div>

                <div class="col-lg-3 mb-4 mb-lg-0">
                    <a href="{{ asset('img/lawmanewimages/g-7.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-7.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-8.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-8.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-9.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-9.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-10.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-10.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-23.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-23.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-24.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-24.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>
                </div>

                <div class="col-lg-3 mb-4 mb-lg-0" >
                    <a href="{{ asset('img/lawmanewimages/g-11.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-11.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-12.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-12.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-13.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-13.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-18.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-18.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-19.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-19.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-25.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-25.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                    <a href="{{ asset('img/lawmanewimages/g-26.jpeg') }}" class="lightbox" data-fancybox="'gallery1">
                        <img
                            src="{{ asset('img/lawmanewimages/g-26.jpeg') }}"
                            class="w-100 shadow-1-strong rounded mb-4 gpic"
                            alt=""
                            data-aos="zoom-out-down"
                        />
                    </a>

                </div>
            </div>
        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@endsection


