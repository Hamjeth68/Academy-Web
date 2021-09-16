@extends('layouts.app')

@section('content')

<style>
    .custom-green-bg,
    .btn-custom-green {
        background-color: #90e434;
        border-color: #90e434;
        color: #fff;
    }

    .btn-custom-blue {
        background-color: #204371;
        border-color: #204371;
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

    .custom-btn {
        width: 100%;
        font-size: 20px;
    }

    span.greentitle {
        color: #90e434;
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
        <h1 class="text-uppercase mb-2">Courses</h1>
        <h2 class="text-white">The course you choose will be at the heart </br> of your university experience</h2>
{{--        <div class="d-flex justify-content-center">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="text" class="form-control" id="custom-search-main-input" placeholder="Find your course" aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
{{--                    <div class="input-group-append" data-aos="flip-up">--}}
{{--                        <button class="btn btn-outline-secondary custom-green-bg pl-5 pr-5" type="button">Search</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</section><!-- End Hero -->

<main id="main">
    <section>
        <div class="section-title pt-3">
            <h3>Our<span> Courses</span></h3>
        </div>

        <div class="row pt-5 mr-0 ml-0">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 text-center" style="padding: 50px; padding-top:10px" data-aos="fade-down" data-aos-delay="300">
                <div class="text-on-image-con">
                    <img src="{{asset('image/'.$product->image)}}" style="" class="img-fluid" alt="" srcset="">
                    <div class="text-con">
                        <h4><span class="greentitle">{{ $product->p_title }}</span></h4>
                        {{-- <p>At SafeEnviro academy we offer the highest quality of academic  and professional experience in the Waste</p>--}}
                    </div>
                </div>
                <div class="btn-con mt-2" data-aos="flip-up">
                    <button class="btn btn-lg btn-custom-green custom-btn" data-toggle="modal" data-target="#course-{{ $product->id }}">View Course</button>
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
                                    <a href="{{ url('/stdlogin') }}" type="button" class="btn btn-primary">Enroll Now</a>
                                @else
                                    <a href="{{ url('/enroll') }}" type="button" class="btn btn-primary">Enroll Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </section>
    <!-- modal -->

</main><!-- End #main -->

@endsection

<script>
    //first
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount").style.display = 'none';
        document.getElementById("forex-amount").addEventListener("h1", calculator);
        document.getElementById("forex-rate").addEventListener("change", ChangeCurrency);

        function calculator() {
            let basecurrency = document.getElementById("base").value;
            let amount = document.getElementById("forex-amount").innerHTML;
            let rate = document.getElementById("forex-rate").value;

            if (rate == "select") {
                document.getElementById("forex-ugx").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount").style.display = 'none';
                    document.getElementById("forex-amount").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount").style.display = 'none';
                    document.getElementById("forex-newamount").style.display = 'inline';
                    document.getElementById("forex-newamount").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency() {
            let basecurrency = document.getElementById("base").value;
            let rate = document.getElementById("forex-rate").value;
            let amount = document.getElementById("forex-amount").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount").style.display = 'none';
                document.getElementById("forex-amount").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount").style.display = 'inline';
                document.getElementById("forex-newamount").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});


    });
</script>

<script>
    //second
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount-2").style.display = 'inline';
        document.getElementById("forex-amount-2").addEventListener("h1", calculator_2);
        document.getElementById("forex-rate-2").addEventListener("change", ChangeCurrency_2);

        function calculator_2() {
            let basecurrency = document.getElementById("base-2").value;
            let amount = document.getElementById("forex-amount-2").innerHTML;
            let rate = document.getElementById("forex-rate-2").value;

            if (rate == "select") {
                document.getElementById("forex-ugx-2").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount-2").style.display = 'none';
                    document.getElementById("forex-amount-2").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount-2").style.display = 'none';
                    document.getElementById("forex-newamount-2").style.display = 'inline';
                    document.getElementById("forex-newamount-2").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency_2() {
            let basecurrency = document.getElementById("base-2").value;
            let rate = document.getElementById("forex-rate-2").value;
            let amount = document.getElementById("forex-amount-2").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount-2").style.display = 'none';
                document.getElementById("forex-amount-2").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount-2").style.display = 'inline';
                document.getElementById("forex-newamount-2").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount-2").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});

    });
</script>

<script>
    //third
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount-3").style.display = 'inline';
        document.getElementById("forex-amount-3").addEventListener("h1", calculator_3);
        document.getElementById("forex-rate-3").addEventListener("change", ChangeCurrency_3);

        function calculator_3() {
            let basecurrency = document.getElementById("base-3").value;
            let amount = document.getElementById("forex-amount-3").innerHTML;
            let rate = document.getElementById("forex-rate-3").value;

            if (rate == "select") {
                document.getElementById("forex-ugx-3").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount-3").style.display = 'none';
                    document.getElementById("forex-amount-3").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount-3").style.display = 'none';
                    document.getElementById("forex-newamount-3").style.display = 'inline';
                    document.getElementById("forex-newamount-3").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency_3() {
            let basecurrency = document.getElementById("base-3").value;
            let rate = document.getElementById("forex-rate-3").value;
            let amount = document.getElementById("forex-amount-3").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount-3").style.display = 'none';
                document.getElementById("forex-amount-3").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount-3").style.display = 'inline';
                document.getElementById("forex-newamount-3").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount-3").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});

    });
</script>

<script>
    //fourth
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount-4").style.display = 'inline';
        document.getElementById("forex-amount-4").addEventListener("h1", calculator_4);
        document.getElementById("forex-rate-4").addEventListener("change", ChangeCurrency_4);

        function calculator_4() {
            let basecurrency = document.getElementById("base-4").value;
            let amount = document.getElementById("forex-amount-4").innerHTML;
            let rate = document.getElementById("forex-rate-4").value;

            if (rate == "select") {
                document.getElementById("forex-ugx-4").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount-4").style.display = 'none';
                    document.getElementById("forex-amount-4").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount-4").style.display = 'none';
                    document.getElementById("forex-newamount-4").style.display = 'inline';
                    document.getElementById("forex-newamount-4").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency_4() {
            let basecurrency = document.getElementById("base-4").value;
            let rate = document.getElementById("forex-rate-4").value;
            let amount = document.getElementById("forex-amount-4").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount-4").style.display = 'none';
                document.getElementById("forex-amount-4").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount-4").style.display = 'inline';
                document.getElementById("forex-newamount-4").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount-4").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});

    });
</script>

<script>
    //fifth
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount-5").style.display = 'inline';
        document.getElementById("forex-amount-5").addEventListener("h1", calculator_5);
        document.getElementById("forex-rate-5").addEventListener("change", ChangeCurrency_5);

        function calculator_5() {
            let basecurrency = document.getElementById("base-5").value;
            let amount = document.getElementById("forex-amount-5").innerHTML;
            let rate = document.getElementById("forex-rate-5").value;

            if (rate == "select") {
                document.getElementById("forex-ugx-5").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount-5").style.display = 'none';
                    document.getElementById("forex-amount-5").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount-5").style.display = 'none';
                    document.getElementById("forex-newamount-5").style.display = 'inline';
                    document.getElementById("forex-newamount-5").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency_5() {
            let basecurrency = document.getElementById("base-5").value;
            let rate = document.getElementById("forex-rate-5").value;
            let amount = document.getElementById("forex-amount-5").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount-5").style.display = 'none';
                document.getElementById("forex-amount-5").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount-5").style.display = 'inline';
                document.getElementById("forex-newamount-5").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount-5").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});

    });
</script>

<script>
    //sixth
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById("forex-newamount-6").style.display = 'inline';
        document.getElementById("forex-amount-6").addEventListener("h1", calculator_6);
        document.getElementById("forex-rate-6").addEventListener("change", ChangeCurrency_6);

        function calculator_6() {
            let basecurrency = document.getElementById("base-6").value;
            let amount = document.getElementById("forex-amount-6").innerHTML;
            let rate = document.getElementById("forex-rate-6").value;

            if (rate == "select") {
                document.getElementById("forex-ugx-4").setAttribute("placeholder", "please select currency");
            } else {

                if (basecurrency === rate) {
                    document.getElementById("forex-newamount-6").style.display = 'none';
                    document.getElementById("forex-amount-6").style.display = 'inline';
                } else {
                    let compute = amount * rate;
                    document.getElementById("forex-amount-6").style.display = 'none';
                    document.getElementById("forex-newamount-6").style.display = 'inline';
                    document.getElementById("forex-newamount-6").innerHTML = compute.toFixed(2);
                }
            }
        }

        function ChangeCurrency_6() {
            let basecurrency = document.getElementById("base-6").value;
            let rate = document.getElementById("forex-rate-6").value;
            let amount = document.getElementById("forex-amount-6").innerHTML;

            if (basecurrency === rate) {

                document.getElementById("forex-newamount-6").style.display = 'none';
                document.getElementById("forex-amount-6").style.display = 'inline';

            } else {

                let compute = rate * amount;
                document.getElementById("forex-newamount-6").style.display = 'inline';
                document.getElementById("forex-newamount-6").innerHTML = compute.toFixed(2);
                document.getElementById("forex-amount-6").style.display = 'none';

            }

        }

        let menu = document.querySelectorAll('select');
        M.FormSelect.init(menu, {});

    });
</script>
