<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sales Report</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<style>
    .companyhead {
        justify-content: right;
        line-height: 1px;
        text-align: end;
    }

    hr.top {
        border: 2px solid #6c757d;
        border-radius: 10px;
    }

    hr.hr-text {
        position: relative;
        border: none;
        height: 2px;
        background: #999;
        margin-top: 4rem;
        width: 75%;
    }

    hr.hr-text::before {
        content: attr(data-content);
        display: inline-block;
        background: #1d5d94;
        font-weight: bold;
        font-size: 0.85rem;
        color: #ffffff;
        border-radius: 30rem;
        padding: 0.2rem 2rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="col-lg-10 col-md-9 float-left mt-2">
                <a href="{{ url('/') }}" class="logo mr-auto ml-3"><img src={{ asset('img/acedemy.png') }}
                        alt=""></a>
            </div>
            <div class="col-lg-10 col-md-9 d-inline-block companyhead mt-2 mr-1">
                <h3 class=""><strong>Safe Enviro Academy</strong></h3><br>
                <h5 class="">69/66 Hatton Garden,Fifth Floor Suites 23, <br>
                    London EC1N 8LE</h5><br>
                <p class="">SafeEnviro@gmail.com</p>
            </div>
        </div>

        <hr class="top">
        <main>
            <table class="table-auto-w-full col-lg-12 mt-4">
                <thead style="background: #8bf14c">
                    <tr>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Purchase ID</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Course</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Student Name</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Ref</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Price</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex-items-center">Purchase Date</div>
                        </th>
                    </tr>
                </thead>

                <body>
                    @foreach ($course_purchased as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->product->p_title }}</td>
                            <td class="border px-4 py-2">{{ isset($item->student->name) ? $item->student->name : '' }}
                            </td>
                            <td class="border px-4 py-2">{{ $item->reference_number }}</td>
                            <td class="border px-4 py-2">{{ $item->product->p_amount }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </body>
            </table>

            <div class="mb-4">
                <h6 class=" text-uppercase"></h6>
                <!-- Gradient divider -->
                <hr data-content="Monthly sales" class="hr-text">
            </div>
            {{-- @foreach ($data as $item) --}}
            <div class="jumbotron jumbotron-fluid" style="border-radius: 6rem; background: #8bf14c">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <h1 class="display-4 text-center"><strong>Monthly Sales</strong></h1>
                        <h2 class="text-center">for Month {{ $month }} {{ $year }}</h2>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="row">
                            <div class="card mr-2" style="width: 20rem; border-radius: 20px; background: #1d5d94;
    color: #fff;">
                                <div class="card-body">
                                    <h4 class="card-title">Total Sales</h4>
                                    <h3 class="card-subtitle mb-2 float-right">
                                        <strong>{{ $totalcost }}</strong>
                                    </h3>
                                </div>
                            </div>
                            {{-- <div class="card mr-2" style="width: 20rem;border-radius: 20px; background: #1d5d94;
    color: #fff;">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Course Purchased</h4>
                                        <h3 class="card-subtitle mb-2 float-right"><strong>35</strong></h3>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </main>

        <footer class="text-center">
            <strong>Invoice was created on a computer and is valid without the signature and seal.</strong>
        </footer>

    </div>
</body>

</html>
