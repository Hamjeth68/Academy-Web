@extends('layouts.dashboard.app')

@section('content')
    <h2 class="font-weight-bolder mb-3">Students</h2>
    {{-- <a href="{{ url('/users/pdf') }}">
        <button type="submit" class="btn btn-primary">
            {{ __('Export PDF') }}
        </button>
    </a> --}}
    <table class="table-auto-w-full" style="width: 100%; overflow-x:auto; overflow-y: auto;">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center mb-3" style="float: right">
            <form type="get" action="{{ url('/dashboard/users') }}">
                @csrf
                <div class="row">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input name="query" type="search" class="form-control" placeholder="Type here...">
                        <button type="submit" class="btn btn-outline-dark my-2 my-sm-0" onclick="nav()">Search</button>
                    </div>
                </div>
            </form>
            <a href="{{url('/dashboard/users')}}" style="margin-left: 10px"><button class="btn btn-primary mb-0 ml-3"><i class="fa fa-refresh"></i></button></a>
        </div>
        <thead>
            <tr>
                <th class="px-4 py-2">
                    <div class="flex-items-center">ID</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Name</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Email</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Phone</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Address</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Profession/<br>
                        Occupation</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">State</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">Created at</div>
                </th>
            </tr>
        </thead>

        <body>
            @foreach ($user as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->email }}</td>
                            <td class="border px-4 py-2">{{ $item->phone }}</td>
                            <td class="border px-4 py-2">{{ $item->address }}</td>
                            <td class="border px-4 py-2">{{ $item->profession_occupation }}</td>
                            <td class="border px-4 py-2">{{ $item->state }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
        </body>
    </table>
@endsection
