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

        $group = CoursePurchased::with(['product'])->get();

        $chart_data = [];
        $chart_count = [];
        $group->groupBy('product_id')->each(function ($item) use (&$chart_data, &$chart_count)
        {
            array_push($chart_data, [
               $item->first()->product->p_name,
            ]);

            array_push($chart_count, [
                $item->count(),
            ]);
        });

        return view('dashboard.dashboard', ['data' => $data, 'months' => $months, 'monthCount' => $monthCount, 'courses' => $chart_data, 'count' => $chart_count]);
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
