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

    public $user;
    public function index()
    {
        $user = User::where('user_type', '1')->get();
        return view('dashboard.users', [
            'user' => $user,
        ]);
    }

     public function adminUsers()
     {
         $user = User::whereIn('user_type', ['2','3'])->get();
         return view('dashboard.profile', [
             'users' => $user,
         ]);
     }

    public function createPDF()
    {
        // retreive all records from db
        $data = User::all();


        // share data to view
        view()->share('users', $data);
        $pdf = PDF::loadView('pdf_view2', $data)->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true])->setPaper('A4', 'Landscape');

        // download PDF file with download metho
        return $pdf->download('pdf_file.pdf');
    }

    public function updateAdminPassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find((int) $id);

        $user->password = Hash::make($request->input('password'));

        $user->update();

        $request->session()->flush();

        return Redirect::to('/stdlogin')->with('success', 'Password Updated Successfully');


    }

    public function createAdminUser(Request $request) {

        $verification_code = (string) \Illuminate\Support\Str::uuid();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($request->type == '2') {
            $user_type_name = 'Admin';
        }elseif ($request->type == '3') {
            $user_type_name = 'Coordinator';
        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'verification_code' => $verification_code,
            'user_type' => $request->type,
            'user_type_name' => $user_type_name,
        ]);

        return Redirect::to('/dashboard/profile')->with('success', 'User created successfully.');
    }

    public function editAdminUser(Request $request, $id){

        $user = User::find((int) $id);

        if($request->type == '2') {
            $user_type_name = 'Admin';
        }elseif ($request->type == '3') {
            $user_type_name = 'Coordinator';
        }

        $user->name = $request->input('name');
        $user->phone = $request->input('email');
        $user->user_type = $request->input('type');
        $user->user_type_name = $user_type_name;


        if($user->update()){
            return back()->with('success', 'Details Updated Successfully');
        }else {
            return back()->with('error', 'Details not Updated');
        }
    }

    public function updateUserPassword(Request $request, $id) {

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find((int) $id);

        $user->password = Hash::make($request->input('password'));

        $user->update();

        return Redirect::to('/dashboard/profile')->with('success', 'password updated successfully.');
    }
}
