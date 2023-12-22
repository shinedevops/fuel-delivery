<?php

use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes([
    'verify' => True,
]);


Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/completeprofile', [UserDetailController::class, 'completeProfile'])->name('complete.profile');
    Route::get('/userdashboard', [UserDetailController::class, 'userdash'])->name('user.dashboard');
    Route::post('/store_user_details', [UserDetailController::class, 'store'])->name('store.userDetails');

    Route::get('setting/profile/{id}', [ProfileController::class, 'editsetting'])->name('setting-profile');
    Route::get('edit/profile/{user_id}', [ProfileController::class, 'editprofile'])->name('edit-profile');
    Route::post('update/profile/{id}', [ProfileController::class, 'update'])->name('updateProfile');
});



//Admin Routes +++++
// Route::middleware(['auth:admin'])->group(function () {
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// });




