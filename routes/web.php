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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/gallery', [App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('/courses', [App\Http\Controllers\PageController::class, 'courses'])->name('courses');
Route::get('/courseDetails/{slug}', [App\Http\Controllers\PageController::class, 'courseDetails'])->name('courseDetails');



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

  Route::get('/siteGlobalSetting', [App\Http\Controllers\Admin\AdminController::class, 'siteGlobalSetting'])->middleware(['auth:admin']);
  Route::post('/updateSiteGlobalSetting', [App\Http\Controllers\Admin\AdminController::class, 'updateSiteGlobalSetting'])->middleware(['auth:admin']);


  Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'admins'])->name('admins')->middleware(['auth:admin']);
  Route::post('/addAdmin', [App\Http\Controllers\Admin\AdminController::class, 'addAdmin'])->name('addAdmin')->middleware(['auth:admin']);
  Route::post('/updateAdmin', [App\Http\Controllers\Admin\AdminController::class, 'updateAdmin'])->name('updateAdmin')->middleware(['auth:admin']);
  Route::post('/deleteAdmin', [App\Http\Controllers\Admin\AdminController::class, 'deleteAdmin'])->name('deleteAdmin')->middleware(['auth:admin']);

  Route::get('/gallery', [App\Http\Controllers\Admin\AdminController::class, 'gallery'])->name('gallery')->middleware(['auth:admin']);
  Route::get('/value', [App\Http\Controllers\Admin\AdminController::class, 'value'])->name('value')->middleware(['auth:admin']);
  Route::get('/mission', [App\Http\Controllers\Admin\AdminController::class, 'mission'])->name('mission')->middleware(['auth:admin']);
  Route::get('/vision', [App\Http\Controllers\Admin\AdminController::class, 'vision'])->name('vision')->middleware(['auth:admin']);
  
  Route::get('/about', [App\Http\Controllers\Admin\AdminController::class, 'about'])->name('about')->middleware(['auth:admin']);
  Route::post('/updateAbout', [App\Http\Controllers\Admin\AdminController::class, 'updateAbout'])->name('updateAbout')->middleware(['auth:admin']);

  Route::get('/studentFeedbacks', [App\Http\Controllers\Admin\AdminController::class, 'studentFeedbacks'])->name('studentFeedbacks')->middleware(['auth:admin']);
  Route::get('/programManagement', [App\Http\Controllers\Admin\AdminController::class, 'programManagement'])->name('programManagement')->middleware(['auth:admin']);
  Route::get('/updateProgram', [App\Http\Controllers\Admin\AdminController::class, 'updateProgram'])->name('updateProgram')->middleware(['auth:admin']);


  Route::get('/mission', [App\Http\Controllers\Admin\AdminController::class, 'mission'])->name('mission')->middleware(['auth:admin']);
  Route::get('/updateMission', [App\Http\Controllers\Admin\AdminController::class, 'updateMission'])->name('updateMission')->middleware(['auth:admin']);

  Route::get('/instructor', [App\Http\Controllers\Admin\AdminController::class, 'instructor'])->name('instructor')->middleware(['auth:admin']);
  Route::post('/editInstructor', [App\Http\Controllers\Admin\AdminController::class, 'editInstructor'])->name('editInstructor')->middleware(['auth:admin']);
  Route::post('/addInstructor', [App\Http\Controllers\Admin\AdminController::class, 'addInstructor'])->name('addInstructor')->middleware(['auth:admin']);
  Route::post('/deleteInstructor', [App\Http\Controllers\Admin\AdminController::class, 'deleteInstructor'])->name('deleteInstructor')->middleware(['auth:admin']);



  Route::post('/addFeedback', [App\Http\Controllers\Admin\AdminController::class, 'addFeedback'])->name('addFeedback')->middleware(['auth:admin']);
  Route::post('/deleteFeedback', [App\Http\Controllers\Admin\AdminController::class, 'deleteFeedback'])->name('deleteFeedback')->middleware(['auth:admin']);
  Route::post('/editFeedback', [App\Http\Controllers\Admin\AdminController::class, 'editFeedback'])->name('editFeedback')->middleware(['auth:admin']);



  
  Route::post('/addMission', [App\Http\Controllers\Admin\AdminController::class, 'addMission'])->name('addMission')->middleware(['auth:admin']);
  Route::post('/deleteMission', [App\Http\Controllers\Admin\AdminController::class, 'deleteMission'])->name('deleteFeedback')->middleware(['auth:admin']);
  Route::post('/editMission', [App\Http\Controllers\Admin\AdminController::class, 'editMission'])->name('editMission')->middleware(['auth:admin']);


  Route::post('/addVision', [App\Http\Controllers\Admin\AdminController::class, 'addVision'])->name('addVision')->middleware(['auth:admin']);
  Route::post('/deleteVision', [App\Http\Controllers\Admin\AdminController::class, 'deleteVision'])->name('deleteVision')->middleware(['auth:admin']);
  Route::post('/editVision', [App\Http\Controllers\Admin\AdminController::class, 'editVision'])->name('editVision')->middleware(['auth:admin']);
 
 
  Route::get('/history', [App\Http\Controllers\Admin\AdminController::class, 'history'])->name('history')->middleware(['auth:admin']);
  Route::post('/updateHistory', [App\Http\Controllers\Admin\AdminController::class, 'updateHistory'])->name('updateHistory')->middleware(['auth:admin']);


  Route::post('/addGallery', [App\Http\Controllers\Admin\AdminController::class, 'addGallery'])->name('addGallery')->middleware(['auth:admin']);
  Route::post('/deleteGallery', [App\Http\Controllers\Admin\AdminController::class, 'deleteGallery'])->name('deleteGallery')->middleware(['auth:admin']);
  Route::post('/editGallery', [App\Http\Controllers\Admin\AdminController::class, 'editGallery'])->name('editGallery')->middleware(['auth:admin']);


  Route::post('/addProgram', [App\Http\Controllers\Admin\AdminController::class, 'addProgram'])->name('addProgram')->middleware(['auth:admin']);
  Route::post('/deleteProgram', [App\Http\Controllers\Admin\AdminController::class, 'deleteProgram'])->name('deleteProgram')->middleware(['auth:admin']);
  Route::post('/editProgram', [App\Http\Controllers\Admin\AdminController::class, 'editProgram'])->name('editProgram')->middleware(['auth:admin']);
  
  Route::get('/contact', [App\Http\Controllers\Admin\AdminController::class, 'contact'])->name('contact')->middleware(['auth:admin']);
  Route::post('/updateContact', [App\Http\Controllers\Admin\AdminController::class, 'updateContact'])->name('updateContact')->middleware(['auth:admin']);
  Route::get('/slider', [App\Http\Controllers\Admin\AdminController::class, 'slider'])->name('slider')->middleware(['auth:admin']);
  Route::post('/addSlider', [App\Http\Controllers\Admin\AdminController::class, 'addSlider'])->name('addSlider')->middleware(['auth:admin']);
  Route::post('/deleteSlider', [App\Http\Controllers\Admin\AdminController::class, 'deleteSlider'])->name('deleteSlider')->middleware(['auth:admin']);



  //---------------------------------------------------------------------------------------

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');