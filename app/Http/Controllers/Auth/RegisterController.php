<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $verification_code = (string) \Illuminate\Support\Str::uuid();

        Mail::send('verify-email-template', ['name'=>$data['name'], 'email' => $data['email'], 'uuid' =>$verification_code], function ($message) use ($data) {
            $message->to($data['email'])->subject('Student Account Verification');
        });

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'profession_occupation' => $data['profession_occupation'],
            'date' => $data['date'],
            'state' => $data['state'],
            'verification_code' => $verification_code,
            'user_type' => '1',
            'user_type_name' => 'Student',
        ]);
    }

    public function studentRegister(Request $request) {
//        dd($request->all());

        $year = Carbon::now()->year;

        $before = $year - 16;

        $after = $year - 90;

        $before_date = Carbon::create($before, 01, 01)->toDateString();

        $after_date = Carbon::create($after, 01, 01)->toDateString();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date' => ['before:'.$before_date , 'after:'.$after_date],
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return Redirect::to('/stdlogin')->with('success', 'Account Created successfully, Please Verify Your Email');

    }

    public function verifyUserAccount($verificationCode) {

        $user = User::where('verification_code', $verificationCode)->first();

        if($user != null) {
            $user->email_verified_at = now();
            $user->save();

            $admin_email = ['safe.envirouk@gmail.com'];

            Mail::send('admin-email-template', ['name'=> $user->name, 'email' => $user->email,'phone_number' => $user->phone,
                'state' => $user->state,'profession_occupation' => $user->profession_occupation,'address' => $user->address,'dob' => $user->date], function ($message) use ($admin_email) {
                $message->to($admin_email)->subject('Student Account Created');
            });
            return redirect('/stdlogin')->with('success', 'Account Verified successfully.');
        }

        return redirect('/stdlogin')->with('error', 'Account Not Verified.');

    }
}
