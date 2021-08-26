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
                    We are an academy within the community and we have a direct impact on the local economy, the safety and security, the upkeep and sustainability of our surrounds, infrastructure, attractiveness and the uplifting and improving on general conditions.
                    We know that everyday kindnesses, courtesy, respect, tolerance and care towards everyone in our community can make a positive and lasting difference in our society and on the environment.
                    We are environmentally conscious and committed to sustainable growth; greening and earth-friendly initiatives which give back positively to the planet rather than have a harmful impact. More than this, we know that the actions we do today have a ripple effect and impacts on our future.
                </p>
            </div>
        </div>


    </div>

</section>

@endsection
