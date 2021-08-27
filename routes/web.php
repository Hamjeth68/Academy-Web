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
Route::get('/test-view', [App\Http\Controllers\HomeController::class, 'testView'])->name('test.view');

Route::get('/stdlogin', [App\Http\Controllers\Auth\LoginController::class, 'showLogin']);
Route::post('/stdlogin', [App\Http\Controllers\Auth\LoginController::class, 'studentLogin'])->name('studentLogin');

Route::get('/stdregister', [App\Http\Controllers\Auth\RegisterController::class, 'showRegister']);
Route::post('/stdregister', [App\Http\Controllers\Auth\RegisterController::class, 'studentRegister'])->name('studentRegister');
//Route::get('/stdlogout', [App\Http\Controllers\auth\LoginController::class, 'Logout'])->name('logout');

Route::get('/verifyUser/{uuid}', [App\Http\Controllers\Auth\RegisterController::class,'verifyUserAccount'])->name('verify-user');

Route::get('/home-two', [App\Http\Controllers\PageController::class, 'coursePage']);
Route::get('/lawma1', [App\Http\Controllers\PageController::class, 'courseLawmaPage']);


Route::get('/why1',function(){
return view('why');
});

Route::get('/web',function(){
return view('webinars');
});

Route::get('/contact1',function(){
return view('contact');
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
    Route::post('/products-add', [App\Http\Controllers\Dashboard\ProductController::class, 'createProduct']);

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

//student auth pages
Route::middleware('auth')->group(function () {

    Route::get('/stdEdit/{id}', [App\Http\Controllers\Auth\LoginController::class,'editStudent']);
    Route::post('/stdUpdate/{id}', [App\Http\Controllers\Auth\LoginController::class,'updateStudent']);
    Route::post('/stdUpdatePassword/{id}', [App\Http\Controllers\Auth\LoginController::class,'updateStudentPassword']);

    Route::get('/enroll', [App\Http\Controllers\ProductController::class,'index'])->middleware('student');
    Route::get('/addtocart/{id}', [App\Http\Controllers\ProductController::class,'getAddToCart']);
    Route::get('/removeProduct/{id}', [App\Http\Controllers\ProductController::class,'removeProduct']);
    Route::get('/cart', [App\Http\Controllers\ProductController::class,'getCart']);
    Route::get('/clearCart', [App\Http\Controllers\ProductController::class,'clearSessionCart']);

    Route::get('checkout',[App\Http\Controllers\CheckoutController::class, 'checkout']);
    Route::post('checkout',[App\Http\Controllers\CheckoutController::class,'afterpayment'])->name('credit-card');

    Route::get('/afterCheckout', [App\Http\Controllers\ProductController::class,'checkOut']);


});



