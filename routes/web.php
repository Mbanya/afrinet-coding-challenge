<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::view('/','index')
    ->middleware('auth')
    ->name('index');

Route::view('/tasks','task.index')
    ->middleware('auth')
    ->name('task');

Route::resource('companies',CompanyController::class)->except('destroy');
Route::post('/deleteCompany',[CompanyController::class,'deleteCompany']);
Route::resource('employees',EmployeeController::class)->except('destroy');
Route::post('/deleteEmployee',[EmployeeController::class,'deleteEmployee']);
Auth::routes(['register' => false,]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
