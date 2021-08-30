@extends('layouts.dashboard.app')

@section('content')
    <h2 class="font-weight-bolder mb-3">Currency</h2>
    <table class="table-auto-w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">
                    <div class="flex-items-center">name</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">code</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">symbol</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">exchange_rate</div>
                </th>
                {{-- <th class="px-4 py-2">
                Actions
            </th> --}}
            </tr>
        </thead>

        <body>
            @foreach ($currencyrate as $currency)
                <tr>
                    <td class="border px-4 py-2">{{ $currency->name }}</td>
                    <td class="border px-4 py-2">{{ $currency->code }}</td>
                    <td class="border px-4 py-2">{{ $currency->symbol }}</td>
                    <td class="border px-4 py-2">{{ $currency->exchange_rate }}</td>
                </tr>
            @endforeach
        </body>
    </table>
@endsection
