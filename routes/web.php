<?php

use App\Models\Footer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
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

    /*
        |--------------------------------------------------------------------------|
        |                            Supplier All Routes                             |
        |--------------------------------------------------------------------------|
        */
    Route::group(['prefix' => 'suppliers', 'as' => 'supplier.'], function () {

        Route::controller(SupplierController::class)->group(function () {
            Route::get('/view', 'supplierView')->name('view');
            Route::get('/add', 'supplierAdd')->name('add');
            Route::post('/store', 'supplierStore')->name('store');
            Route::get('/edit/{id}', 'supplierEdit')->name('edit');
            Route::post('/update', 'supplierUpdate')->name('update');
            Route::get('/delete/{id}', 'supplierDelete')->name('delete');
        });
    });

    /*
        |--------------------------------------------------------------------------|
        |                            Customer All Routes                             |
        |--------------------------------------------------------------------------|
        */
    Route::group(['prefix' => 'customers', 'as' => 'customer.'], function () {

        Route::controller(CustomerController::class)->group(function () {
            Route::get('/view', 'customerView')->name('view');
            Route::get('/add', 'customerAdd')->name('add');
            Route::post('/store', 'customerStore')->name('store');
            Route::get('/edit/{id}', 'customerEdit')->name('edit');
            Route::post('/update', 'customerUpdate')->name('update');
            Route::get('/delete/{id}', 'customerDelete')->name('delete');
        });
    });

    /*
            |--------------------------------------------------------------------------|
            |                            Unit All Routes                               |
            |--------------------------------------------------------------------------|
            */

    Route::group(['prefix' => 'units', 'as' => 'unit.'], function () {

        Route::controller(UnitController::class)->group(function () {
            Route::get('/view', 'unitView')->name('view');
            Route::get('/add', 'unitAdd')->name('add');
            Route::post('/store', 'unitStore')->name('store');
            Route::get('/edit/{id}', 'unitEdit')->name('edit');
            Route::post('/update', 'unitUpdate')->name('update');
            Route::get('/delete/{id}', 'unitDelete')->name('delete');
        });
    });
    /*
            |--------------------------------------------------------------------------|
            |                            Category All Routes                           |
            |--------------------------------------------------------------------------|
            */
    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/view', 'categoryView')->name('view');
            Route::get('/add', 'categoryAdd')->name('add');
            Route::post('/store', 'categoryStore')->name('store');
            Route::get('/edit/{id}', 'categoryEdit')->name('edit');
            Route::post('/update', 'categoryUpdate')->name('update');
            Route::get('/delete/{id}', 'categoryDelete')->name('delete');
        });
    });

    /*
            |--------------------------------------------------------------------------|
            |                            Product All Routes                            |
            |--------------------------------------------------------------------------|
            */
    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {

        Route::controller(ProductController::class)->group(function () {
            Route::get('/view', 'productView')->name('view');
            Route::get('/add', 'productAdd')->name('add');
            Route::post('/store', 'productStore')->name('store');
            Route::get('/edit/{id}', 'productEdit')->name('edit');
            Route::post('/update', 'productUpdate')->name('update');
            Route::get('/delete/{id}', 'productDelete')->name('delete');
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
