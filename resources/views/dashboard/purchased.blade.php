@extends('layouts.dashboard.app')

@section('content')
    <a href="{{ url('/products/pdf') }}">
        <button type="submit" class="btn btn-primary">
            {{ __('Export PDF') }}
        </button>
    </a>
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
                    <td class="border px-4 py-2">{{ isset($item->student->name) ? $item->student->name : '' }}</td>
                    <td class="border px-4 py-2">{{ $item->reference_number }}</td>
                    <td class="border px-4 py-2">{{ $item->product->p_amount }}</td>
                    <td class="border px-4 py-2">{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </body>
    </table>
@endsection
{{-- <script>
    $.ajaxSetup({
        headers: {
            'XSRF-TOKEN': $('meta[name="XSRF-TOKEN"]').attr('content')
        }
    });
</script> --}}
