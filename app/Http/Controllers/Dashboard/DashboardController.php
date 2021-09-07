<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

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
        $dataPie = DB::table('course_purchased')
            ->select(
                DB::raw('product_id as product_id'),
                DB::raw('count(*) as number')
            )
            ->groupBy('product_id')
            ->get();
        $array[] = ['product_id', 'Number'];
        foreach ($dataPie as $key => $value) {
            $array[++$key] = [$value->product_id, $value->number];
            // $tData = count($data);
        }

        return view('dashboard.dashboard', ['data' => $data, 'months' => $months, 'monthCount' => $monthCount, 'product_id' => json_encode($array)]);
    }

    public function totalProducts()
    {
        // $totalCourses = Product::all();
        // $getTotal = count($totalCourses);
        $data = DB::table('course_purchased')
            ->select(
                DB::raw('product_id as product_id'),
                DB::raw('count(*) as number')
            )
            ->groupBy('product_id')
            ->get();
        $array[] = ['product_id', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->product_id, $value->number];
            // $tData = count($data);
        }

        // dd($array);

        // foreach ($data as $item) {
        //     $totalUnits = Count($item->$data);
        // }

        // $totalUnits = Count($data);
        // return view('dashboard.dashboard')->with('product_id', json_encode($array));


        // $coursr_purchased = CoursePurchased::all();
        // $p_id = CoursePurchased::where('product_id', 1, 2, 3, 4, 5, 6, 7, 8);
        // $p_id_count = [];
        // $p_id_count = count($p_id);
        // dd($p_id_count);
    }
}
