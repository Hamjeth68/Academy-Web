<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


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
        $pdf = PDF::loadView('pdf_view2', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function updateAdminPassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = User::find((int) $id);

        $admin->password = Hash::make($request->input('password'));

        $admin->update();

        $request->session()->flush();

        return Redirect::to('/stdlogin')->with('success', 'Password Updated Successfully');
    }
}
