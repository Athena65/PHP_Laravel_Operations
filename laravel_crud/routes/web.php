<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Models\Kullanici;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('companies',CompanyController::class);
Route::resource('users',UserController::class);
Route::get('my-notification/{type}','CompanyController@myNotiffication');
Route::get('kullanicis/store/company',[UserController::class,'store'])->name('storeCompany');
