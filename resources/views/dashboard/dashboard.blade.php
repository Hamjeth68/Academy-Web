@extends('layouts.dashboard.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> --}}
    <div class="container mt-2">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Monthly Sales Report</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/purchases/pdf') }}">Export to PDF</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Student Registration Report</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/users/pdf') }}">Export to PDF</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Products Stats
                </div>
                <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
            </div>
        </div> --}}
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Course Purchased
                </div>

            <div class="card-body" align="center">
                <canvas id="myPieChart">

                </canvas>
            </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Monthly Purchases
                </div>
                <div class="card-body">
                    <canvas id="myBarChart">

                    </canvas></div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var _ydata = JSON.parse('{!! json_encode($months) !!}');
        var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');

    </script>
    <script type="text/javascript">
        var _ldata = JSON.parse('{!! json_encode($courses) !!}');
        var _cdata = JSON.parse('{!! json_encode($count) !!}');

    </script>

    {{-- {{ dd($product_id) }} --}}
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script>

@endsection
