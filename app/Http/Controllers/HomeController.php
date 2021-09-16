<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function testView()
    {
        return view('test');
    }

    public function contactUsEmail(Request $request){

        $status = null;
        $data = $request->all();

        if(auth()->check()){
            $status = 'Registered User '.auth()->user()->user_type_name.' Id: '.auth()->user()->id;
        }else{
            $status = 'Unregistered User';
        }

        try {
            $admin_email = ['admin@lawma.academy'];


            Mail::send('contact-us-email', ['name'=>$data['txtName'], 'email' => $data['txtEmail'], 'phone' =>$data['txtPhone'], 'msg' =>$data['txtMsg'], 'status' =>$status], function ($message) use ($admin_email) {
                $message->to($admin_email)->subject('Contact us information');
            });

            return Redirect::to('contact-us')->with('success', 'Record submitted Successfully');


        } catch(\Exception $e){
            return back()->with('error', $e);
        }

    }
}
