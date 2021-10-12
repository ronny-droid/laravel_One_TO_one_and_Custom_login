<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CompanieController;
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
    return view('auth.login');
});
Route::post('auth/save',[MainController::class,'save'])->name('auth.save');

Route::post('auth/check',[MainController::class,'check'])->name('auth.check');

Route::get('auth/logout',[MainController::class,'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('/auth/login',[MainController::class,'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');
    Route::get('admin/dashboard',[MainController::class,'dashboard'])->name('auth.dashboard');
    Route::get('admin/setting',[MainController::class,'setting'])->name('admin/setting');
    Route::get('admin/profile',[MainController::class,'setting'])->name('admin/profile');
    Route::get('admin/staff',[MainController::class,'setting'])->name('admin/staff');
});


Route::get('/',[CompanieController::class,'index'])->name('index');

Route::post('/',[CompanieController::class,'create'])->name('create');

Route::get('crud/edit/{id}',[CompanieController::class,'edit'])->name('edit');

Route::put('crud/edit/{id}',[CompanieController::class,'update'])->name('update');

Route::get('delete/{id}',[CompanieController::class,'destroy'])->name('delete');