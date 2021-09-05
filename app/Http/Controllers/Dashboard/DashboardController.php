<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
// use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{

    public function index()
    {

        return view('dashboard.dashboard');
    }

    public function dataSets()
    {
        $data = CoursePurchased::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });
        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }
        return view('dashboard.dashboard', ['data' => $data, 'months' => $months, 'monthCount' => $monthCount]);

        
    }
}
