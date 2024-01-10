<?php

use App\Models\Footer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;

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

// Apatoto ei route ta use kora jabe na. karon ei route ta amra auth.php file a use korechi. 

// Ei Route e Amra Auth Middleware use korechi. Auth Middleware use korle jodi kono user login na thake tahole oi user ke login page a pathiye dibe.
// Route::get('/', function () {
//     return view('frontend.index');
// })->name('home');
/*
|--------------------------------------------------------------------------|
|                            Admin  All Routes                             |
|--------------------------------------------------------------------------|
*/

Route::middleware(['auth'])->group(function () {

    // Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/change/password', 'change_password')->name('change.password');
        Route::post('/pass/update/password', 'update_password')->name('update.password');

        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'edit_profile')->name('edit.profile');
        Route::post('/store/profile', 'store_profile')->name('store.profile');
    });
    // });
    Route::group(['prefix' => 'suppliers', 'as' => 'supplier.'], function () {

        Route::controller(SupplierController::class)->group(function () {
            Route::get('/all', 'supplierView')->name('view');
            Route::get('/add', 'supplierAdd')->name('add');
        });
    });
});

/*
|--------------------------------------------------------------------------|
|                             Dashboard All Routes                         |
|--------------------------------------------------------------------------|
*/

Route::get('/dashboard', function () {
    return view('admin.index');
    //added 'auth' and 'verified' middleware
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';