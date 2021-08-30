<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;


class UserController extends Controller
{


    public function index()
    {
        $user = User::all();

        return view('dashboard.users', [
            'user' => $user,
        ]);
    }

    public function createPDF()
    {
        // retreive all records from db
        $data = User::all();

        // share data to view
        view()->share('user', $data);
        $pdf = PDF::loadView('pdf_view3', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
