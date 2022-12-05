<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\QrController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('welcome');
});

Route::prefix(LaravelLocalization::setLocale())->group(function(){
Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('meals', MealController::class);
    Route::resource('menus',  MenuController::class);
    Route::resource('qrs',  QrController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
});

Route::view('not_allowed', 'not_allowed');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[SiteController::Class, 'index'])->name('site.index');
