<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserFundTransferController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\OTPController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', [AuthLoginController::class,"loginView"]);

Route::get('/login', [AuthLoginController::class,"loginView"])->name("login");
Route::post('/do-login', [AuthLoginController::class,"doLogin"]);

Route::get('/register', [AuthLoginController::class,"registerView"])->name("register");
Route::post('/do-register', [AuthLoginController::class,"doRegister"]);


Route::get('/logout', [AuthLoginController::class,"logout"])->name("logout");

Route::get('/login/twofaauth', [OTPController::class,"twofaactive"])->name("login.twofaauth");
Route::post('/login/twofaauth', [OTPController::class,"dotwoauth"])->name('login.dotwoauth');

Route::get('/login/twofaotp', [OTPController::class,"show"])->name("login.twofaotp");
Route::post('/login/twofaotp', [OTPController::class,"check"])->name("login.dotwofaotp");


//aefeee0670f29ca2c43bd12c2687d770



//Role : Admin [ Route Admin]
Route::middleware(['auth', 'role:admin'])->group(function()
{
	Route::get('/admin/home', [AdminController::class, 'index'])->name("admin.home");
	Route::get('/admin/userlist', [AdminController::class, 'manageusers'])->name("admin.userlist");
	Route::get('/admin/useradd', [AdminController::class, 'create'])->name("admin.useradd");
	Route::post('/admin/douseradd', [AdminController::class, 'store'])->name("admin.douseradd");
	Route::get('/admin/showuserFullDetails/{id}/{accnum}', [AdminController::class, 'showuserFullDetails'])->name("admin.showuserFullDetails");
});

//Role : User [ Route User]
Route::middleware(['auth', 'role:user'])->group(function()
{
	Route::get('/user/home', [UserFundTransferController::class, 'index'])->name("user.home");
	Route::get('/user/fund_history', [UserFundTransferController::class, 'fundhistory'])->name("user.fund_history");
	Route::get('/user/makefund_transfer', [UserFundTransferController::class, 'makefundtransfer'])->name("user.makefund_transfer");
	Route::post('/user/domakefundtransfer', [UserFundTransferController::class, 'domakefundtransfer'])->name("user.domakefundtransfer");
	Route::get('/user/getcurrenyConvert/{rid}/{sid}/{tamount}', [UserFundTransferController::class, 'getcurrenyConvert'])->name("user.getcurrenyConvert");
});