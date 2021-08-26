<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/stdlogin', [App\Http\Controllers\auth\LoginController::class, 'showLogin']);
Route::post('/stdlogin', [App\Http\Controllers\auth\LoginController::class, 'studentLogin'])->name('studentLogin');
//Route::get('/stdlogout', [App\Http\Controllers\auth\LoginController::class, 'Logout'])->name('logout');


Route::get('/home-two',function(){
return view('home2');
});

Route::get('/why1',function(){
return view('why');
});

Route::get('/web',function(){
return view('webinars');
});

Route::get('/contact1',function(){
return view('contact');
});

Route::get('/lawma1',function(){
return view('lawma');
});


Route::get('/news1',function(){
return view('news');
});

Route::get('/commitment1',function(){
return view('commitment');
});

Route::get('/support1',function(){
return view('support');
});

Route::get('/business1',function(){
return view('business');
});

Route::get('/partnership1',function(){
return view('partnership');
});

Route::get('/Research1',function(){
return view('Research');
});

Route::get('/donate1',function(){
 return view('donate');
});

Route::get('/Volunteer1',function(){
return view('Volunteer');
 });

Route::get('/payhere1',function(){
 return view('payhere');
});

Route::get('/book-now',function(){
 return view('booknow');
});

Route::get('/personal-development',function(){
    return view('personaldevelopment');
});

Route::get('/inspiring-student',function(){
    return view('inspiringstudent');
});

//dd(\Illuminate\Support\Facades\Session::all());

//dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/products',function(){
        return view('dashboard.products');
    });
    Route::get('/dashboard/currency',function(){
        return view('dashboard.currency');
    });
    Route::get('/dashboard/purchased',function(){
        return view('dashboard.purchased');
    });
    Route::get('/dashboard/users',function(){
        return view('dashboard.users');
    });
    Route::get('/dashboard/profile',function(){
        return view('dashboard.profile');
    });

});



