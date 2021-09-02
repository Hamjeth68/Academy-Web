<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Products Report</title>
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">--}}

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
        <table class="">
            <thead style="background: #8bf14c">
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Title</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Name</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Description</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Price</div>
                    </th>
                </tr>
            </thead>

            <body>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">{{ $product->p_title }}</td>
                        <td class="border px-4 py-2">{{ $product->p_name }}</td>
                        <td class="border px-4 py-2"> {!! $product->p_description !!}</td>
                        <td class="border px-4 py-2">{{ $product->p_amount }}</td>
                    </tr>
                @endforeach
            </body>
        </table>


    </main>

    <footer class="text-center" style="text-align: center; margin-top: 2rem">
        <strong>Invoice was created on a computer and is valid without the signature and seal.</strong>
    </footer>

</body>

</html>
