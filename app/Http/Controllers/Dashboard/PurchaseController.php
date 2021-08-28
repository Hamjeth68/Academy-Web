<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchased;
use Illuminate\Http\Request;


class PurchaseController extends Controller
{
    public function index()
    {
        $data = CoursePurchased::all();
        dd($data);
        return view('dashboard.purchased', compact('course_purchased'));
    }
}
