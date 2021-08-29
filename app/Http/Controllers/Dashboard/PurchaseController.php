<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
use Illuminate\Http\Request;
use PDF;

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
}
