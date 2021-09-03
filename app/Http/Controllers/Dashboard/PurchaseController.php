<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function index()
    {
        $course_purchased = CoursePurchased::all();

        return view('dashboard.purchased', [
            'course_purchased' => $course_purchased,
        ]);
    }

    public function createPDF()
    {
        $data = [];
        // retreive all records from db
        $course_purchased = CoursePurchased::all();

        $monthName = Carbon::now()->monthName;
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $posts = CoursePurchased::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=',   $month)
            ->get();
        // $data = array('course_purchased' => $course_purchased, 'year' => $year, 'month' => $month, '');
        // $totalcost = collect($posts['items']->product->p_amount)->sum();
        // dd($totalcost);
        $toatlData = [];
        $totalcost = 0;
        foreach ($posts as $post) {
            $toatlData = array(
                $totalcost += $post->product->p_amount,
                // return $totalcost
            );
        }

        // dd($posts);

        $data = array('course_purchased' => $course_purchased, 'year' => $year, 'month' => $monthName, 'totalcost' => $totalcost);

        //        return view('pdf_view3')->with(['course_purchased' => $data, 'year' => $year, 'month' => $monthName, 'totalcost' => $totalcost]);
        // share data to view
        view()->share('course_purchased', $data);

        $pdf = PDF::loadView('pdf_view3', $data)->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true])->setPaper('A4', 'Landscape');

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function getMonthlySum(Carbon $date)
    {
        $year = $date->year;
        $month = $date->month;
        $posts = CoursePurchased::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=',   $month)
            ->get();
        // $totalcost = collect($posts['items']->product->p_amount)->sum();
        // dd($totalcost);
        $data = [];
        $totalcost = 0;
        foreach ($posts as $post) {
            $data = array(
                $totalcost += $post->product->p_amount,
                // 'courses'=>$post->product->p_name,
            );
        }
        dd($totalcost);
        return $data;
        // dd($data);
    }

    public function search()
    {
        $search_text = $_GET['query'];

        $course_purchased = CoursePurchased::all();

        foreach ($course_purchased as $item) {
            $item  = CoursePurchased::where('reference_number', 'LIKE', '%' . $search_text . '%')->with('p_title')->get();
        }
        return view('dashboard.search', compact('course_purchased'));
    }
}
