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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
  Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

  // Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
  // Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);

  Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
  Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.email');
  Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
  Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm']);
  
  Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home')->middleware(['auth:admin']);

  Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'admins'])->name('admins')->middleware(['auth:admin']);
  Route::post('/addAdmin', [App\Http\Controllers\Admin\AdminController::class, 'addAdmin'])->name('addAdmin')->middleware(['auth:admin']);
  Route::post('/updateAdmin', [App\Http\Controllers\Admin\AdminController::class, 'updateAdmin'])->name('updateAdmin')->middleware(['auth:admin']);
  Route::post('/deleteAdmin', [App\Http\Controllers\Admin\AdminController::class, 'deleteAdmin'])->name('deleteAdmin')->middleware(['auth:admin']);

  Route::get('/history', [App\Http\Controllers\Admin\AdminController::class, 'history'])->name('history')->middleware(['auth:admin']);
  Route::get('/gallery', [App\Http\Controllers\Admin\AdminController::class, 'gallery'])->name('gallery')->middleware(['auth:admin']);
  Route::get('/value', [App\Http\Controllers\Admin\AdminController::class, 'value'])->name('value')->middleware(['auth:admin']);
  Route::get('/mission', [App\Http\Controllers\Admin\AdminController::class, 'mission'])->name('mission')->middleware(['auth:admin']);
  Route::get('/vision', [App\Http\Controllers\Admin\AdminController::class, 'vision'])->name('vision')->middleware(['auth:admin']);
  Route::get('/about', [App\Http\Controllers\Admin\AdminController::class, 'about'])->name('about')->middleware(['auth:admin']);
  Route::get('/studentFeedbacks', [App\Http\Controllers\Admin\AdminController::class, 'studentFeedbacks'])->name('studentFeedbacks')->middleware(['auth:admin']);
  



  //---------------------------------------------------------------------------------------

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');