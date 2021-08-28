@extends('layouts.dashboard.app')

@section('content')
<div class="container-fluid py-4">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
        </tr>
        </thead>
    </table>
</div>
@endsection
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


