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

Route::get('/verifyUser/{uuid}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUserAccount'])->name('verify-user');

Route::get('/home-two', [App\Http\Controllers\PageController::class, 'coursePage']);
Route::get('/lawma1', [App\Http\Controllers\PageController::class, 'courseLawmaPage']);


Route::get('/why1', function () {
    return view('why');
});

Route::get('/web', function () {
    return view('webinars');
});

Route::get('/contact1', function () {
    return view('contact');
});

Route::get('/news1', function () {
    return view('news');
});

Route::get('/commitment1', function () {
    return view('commitment');
});

Route::get('/support1', function () {
    return view('support');
});

Route::get('/business1', function () {
    return view('business');
});

Route::get('/partnership1', function () {
    return view('partnership');
});

Route::get('/Research1', function () {
    return view('Research');
});

Route::get('/donate1', function () {
    return view('donate');
});

Route::get('/Volunteer1', function () {
    return view('Volunteer');
});

Route::get('/payhere1', function () {
    return view('payhere');
});

Route::get('/book-now', function () {
    return view('booknow');
});

Route::get('/personal-development', function () {
    return view('personaldevelopment');
});

Route::get('/inspiring-student', function () {
    return view('inspiringstudent');
});

//dd(\Illuminate\Support\Facades\Session::all());

//dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //products
    Route::get('/dashboard/products', [App\Http\Controllers\Dashboard\ProductController::class, 'index']);
    Route::post('/dashboard/products-add', [App\Http\Controllers\Dashboard\ProductController::class, 'createProduct']);
    Route::get('/products/pdf', [App\Http\Controllers\Dashboard\ProductController::class, 'createPDF']);
    Route::put('/products/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'updateProduct'])->name('edit.products');
    Route::delete('/products/delete{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'deletePrdoct'])->name('delete.product');



    //currency
    Route::get('/dashboard/currency', [App\Http\Controllers\Dashboard\CurrencyRateController::class, 'index']);

    //purchases
    Route::get('/dashboard/purchased', [App\Http\Controllers\Dashboard\PurchaseController::class, 'index']);
    Route::get('/purchases/pdf', [App\Http\Controllers\Dashboard\PurchaseController::class, 'createPDF']);
    Route::get('/users/pdf', [App\Http\Controllers\Dashboard\UserController::class, 'createPDF']);
    // Route::get('/purchases/sales', [App\Http\Controllers\Dashboard\PurchaseController::class, 'getMonthluSum']);
    Route::get('/product/sales', [App\Http\Controllers\Dashboard\PurchaseController::class, 'getMonthlySum']);
    Route::get('/search', [App\Http\Controllers\Dashboard\PurchaseController::class, 'search']);


    //uses
    Route::get('/dashboard/users', [App\Http\Controllers\Dashboard\UserController::class, 'index']);
    // Route::get('/dashboard/profile', [App\Http\Controllers\Dashboard\UserController::class, 'profile']);
    Route::get('/users/pdf', [App\Http\Controllers\Dashboard\UserController::class, 'createPDF']);
    Route::post('/admin/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'updateAdminPassword'])->name('admin.update');


    Route::get('/dashboard/profile',[App\Http\Controllers\Dashboard\UserController::class, 'adminUsers']);
    Route::post('/createUser', [App\Http\Controllers\Dashboard\UserController::class, 'createAdminUser']);
    Route::post('/editUser/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'editAdminUser']);
    Route::post('/editUserPassword/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'updateUserPassword']);


});

//student auth pages
Route::middleware('auth')->group(function () {

    Route::get('/stdEdit/{id}', [App\Http\Controllers\Auth\LoginController::class, 'editStudent']);
    Route::post('/stdUpdate/{id}', [App\Http\Controllers\Auth\LoginController::class, 'updateStudent']);
    Route::post('/stdUpdatePassword/{id}', [App\Http\Controllers\Auth\LoginController::class, 'updateStudentPassword']);

    Route::get('/enroll', [App\Http\Controllers\ProductController::class, 'index'])->middleware('student');
    Route::get('/addtocart/{id}', [App\Http\Controllers\ProductController::class, 'getAddToCart']);
    Route::get('/removeProduct/{id}', [App\Http\Controllers\ProductController::class, 'removeProduct']);
    Route::get('/cart', [App\Http\Controllers\ProductController::class, 'getCart']);
    Route::get('/clearCart', [App\Http\Controllers\ProductController::class, 'clearSessionCart']);

    Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'checkout']);
    Route::post('checkout', [App\Http\Controllers\CheckoutController::class, 'afterpayment'])->name('credit-card');

    Route::get('/afterCheckout', [App\Http\Controllers\ProductController::class, 'checkOut']);

});
