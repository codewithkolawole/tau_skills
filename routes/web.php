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

  //-------------------------------------------------------------------------------

  Route::get('/about', [App\Http\Controllers\Admin\AdminController::class, 'about'])->name('admin.about');
  Route::get('/history', [App\Http\Controllers\Admin\AdminController::class, 'history'])->name('admin.history');
  Route::get('/mission', [App\Http\Controllers\Admin\AdminController::class, 'mission'])->name('admin.mission');
  Route::get('/vision', [App\Http\Controllers\Admin\AdminController::class, 'vision'])->name('admin.vision');
  Route::get('/campus', [App\Http\Controllers\Admin\AdminController::class, 'campus'])->name('admin.campus');
  Route::get('/project', [App\Http\Controllers\Admin\AdminController::class, 'project'])->name('admin.project');
  Route::get('/gallery', [App\Http\Controllers\Admin\AdminController::class, 'gallery'])->name('admin.gallery');
  Route::get('/contact', [App\Http\Controllers\Admin\AAdminController::class, 'contact'])->name('admin.contact');
  Route::get('/feedback', [App\Http\Controllers\Admin\AdminController::class, 'feedback'])->name('admin.feedback');
  Route::get('/apply', [App\Http\Controllers\Admin\AdminController::class, 'apply'])->name('admin.apply');
  Route::get('/program-management', [App\Http\Controllers\Admin\AdminController::class, 'programManagement'])->name('admin.programManagement');
  Route::get('/certificate-management', [App\Http\Controllers\Admin\AdminController::class, 'certificateManagement'])->name('admin.certificateManagement');
  Route::get('/students', [App\Http\Controllers\Admin\AdminController::class, 'students'])->name('admin.students');
  Route::get('/instructor', [App\Http\Controllers\Admin\AdminController::class, 'instructor'])->name('admin.instructor');
  Route::get('/admission', [App\Http\Controllers\Admin\AdminController::class, 'admission'])->name('admin.admission');



  //---------------------------------------------------------------------------------------

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');