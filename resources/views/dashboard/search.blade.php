@extends('layouts.dashboard.app')

@section('content')

    <table class="table-auto-w-full">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <form type="get" action="{{ url('/search') }}">
                <div row>
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input name="query" type="search" class="form-control" placeholder="Type here...">
                        <button type="submit" class="btn btn-outline-dark my-2 my-sm-0">Search</button>
                    </div>
                </div>
            </form>
        </div>
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
