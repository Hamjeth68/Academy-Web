<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 2</title>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <div>
                <a href="{{ url('/') }}" class="logo mr-auto"><img src={{ asset('img/acedemy.png') }} alt=""></a>
            </div>
        </div>
        {{-- <div id="company">
            <h2 class="name">Company Name</h2>
            <div>455 Foggy Heights, AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
        </div> --}}
    </header>
    <main>
        <table class="table-auto-w-full">
            <thead>
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
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
