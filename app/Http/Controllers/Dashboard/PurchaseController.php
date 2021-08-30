<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use DateTime;

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
        // retreive all records from db
        $data = CoursePurchased::all();

        // share data to view
        view()->share('course_purchased', $data);

        $pdf = PDF::loadView('pdf_view2', $data);

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
        // dd($data);
    }
}
