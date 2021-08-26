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
        left: 1%;
    }

    .text-on-image-con .text-con p,
    .text-on-image-con .text-con h4 {
        color: #fff;
    }
    .custom-btn{
        width:48%;
        font-size: 14px;
    }
</style>

<section id="pagehead" class="about">
    <div class="container" data-aos="">

        <div class="section-title">
            <h3>Social Responsibility, Sustainability,<span> Corporate identity</span></h3>
        </div>

        <div class="row mt-4">
            <div class="">
                <p class="text-black-100">
                    If you are a business or organisation of any size within the private, public or third sectors, based locally, nationally or internationally and would like to access academic expertise and specialist knowledge to drive your business idea or project forward, a Partnership with SafeEnviro could help you achieve the results you need.</p>
            </div>
        </div>


    </div>

</section>



@endsection
