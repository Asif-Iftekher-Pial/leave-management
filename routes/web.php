<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LeaveManageController;
use App\Http\Controllers\Employee\AuthController;
use App\Http\Controllers\Employee\LeaveRequestController;
use Illuminate\Support\Facades\Route;

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
//admin login 
Route::get('login',[AdminAuthController::class,'index'])->name('admin.login');
Route::post('login-submit',[AdminAuthController::class,'submit'])->name('login.submit');


Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
   
    //Employee
    Route::resource('employee',EmployeeController::class);
    Route::get('status/{id}/{status}',[EmployeeController::class,'block_user'])->name('employee.status');

    //Leave Manage
    Route::resource('leave-request-manage',LeaveManageController::class);
});


Route::group(['middleware' => 'auth'],function(){
    //Dashboard
    Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
});


//employee auth
//registration
Route::get('employee-registration',[AuthController::class,'registration'])->name('registration');
Route::post('employee-registration-submit',[AuthController::class,'store'])->name('employee.register.submit');
Route::get('employee-login',[AuthController::class,'index'])->name('login');
Route::post('employee-login-submit',[AuthController::class,'submit'])->name('employee.login.submit');
Route::get('block',[AuthController::class,'block'])->name('block');

Route::group(['prefix' => 'employee','middleware' => ['auth','block']],function(){
    //Leave Request
    Route::resource('employee-leave-request',LeaveRequestController::class);

});

