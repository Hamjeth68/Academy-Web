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
    </header>
    <main>
        <table class="table-auto-w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Purchase ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Course</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex-items-center">Studnt Name</div>
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
                @foreach ($purchases as $item)
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
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
