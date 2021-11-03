<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () { return view('welcome');});
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::post('dashboard', [CustomAuthController::class, 'dashboard'])->name('search');
Route::get('sign-in', [CustomAuthController::class, 'index'])->name('login');
Route::get('sign-up', [CustomAuthController::class, 'register'])->name('register');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

