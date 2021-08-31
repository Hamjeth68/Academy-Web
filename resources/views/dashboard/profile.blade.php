@extends('layouts.dashboard.app')

@section('content')
    <h2 class="font-weight-bolder mb-3">Profile</h2>
    @foreach ($user as $item)
        <form action="{{ route('admin.update', $item->id) }}" class="contact100-form validate-form" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email Address"
                            value="{{ old('p_title', $item->email) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success">Change</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>
    @endforeach
@endsection
