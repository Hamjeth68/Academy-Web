<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sales Report</title>
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
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
    .page-break {
        page-break-after: always;
    }

</style>

<body>
<header class="clearfix">
    <div id="logo">
        <div>
            <a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('img/acedemy.png') }}" style="height: 5rem;"></a>
            <div id="company" style="text-align: right; margin-top: -100px;">
                <h2 class="name" style="line-height: 1px">Safe Enviro Academy</h2>
                <div>69/66 Hatton Garden,Fifth Floor Suites 23, <br>London EC1N 8LE</div>
                <div>SafeEnviro@gmail.com</div>
            </div>
        </div>
    </div>
</header>
        <hr class="top">
        <main>
            <table class="table-auto-w-full" style="width: 100%">
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
                            <td class="border px-4 py-2">{{ isset($item->id) ? $item->id : '' }}</td>
                            <td class="border px-4 py-2">{{ isset($item->product_id) ? (isset($item->product->p_title ) ? $item->product->p_title  : '') : '' }}</td>
                            <td class="border px-4 py-2">{{ isset($item->student_id) ? (isset($item->student->name) ? $item->student->name : '') : '' }}
                            </td>
                            <td class="border px-4 py-2">{{ isset($item->reference_number ) ? $item->reference_number  : '' }}</td>
                            <td class="border px-4 py-2">{{ isset($item->product_id) ? (isset($item->product->p_amount) ? $item->product->p_amount  : '') : '' }}</td>
                            <td class="border px-4 py-2">{{ isset($item->created_at) ? $item->created_at : '' }}</td>
                        </tr>
                    @endforeach
                </body>
            </table>

                <!-- Gradient divider -->
                <hr class="hr-text">
            <div class="page-break"></div>

            <div class="jumbotron jumbotron-fluid" style="border-radius: 2rem; background: #8bf14c; padding-bottom: 2rem">
                <div class="row">
                    <div class="col-lg-5 col-md-5" style="text-align: center">
                        <h1 class="display-4 text-center"><strong>Monthly Sales</strong></h1>
                        <h2 class="text-center">for Month {{ $month }} {{ $year }}</h2>
                    </div>
                    <div class="col-lg-7 col-md-7" style="text-align: center">
                        <div class="row">
                            <div class="card mr-2" style="width: 20%; border-radius: 20px; background: #1d5d94; color: #fff; text-align: center; margin-left: 26rem">
                                <div class="card-body">
                                    <h3 class="card-title" style="margin-top: 1rem">Total Sales</h3>
                                    <h1 class="card-subtitle">
                                        <strong>£ {{ $totalcost }}</strong>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<footer class="text-center" style="text-align: center; margin-top: 2rem">
    <strong>Invoice was created on a computer and is valid without the signature and seal.</strong>
</footer>

</body>

</html>
