<?php

use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\VisitController;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DriverController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\NotificationEmailController;


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

// Route::get('/', function () {
//     // return view('welcome');
//     return redirect('/login');
// });
Route::redirect('/', '/login');

Auth::routes([
    'verify' => True, 
]);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::fallback(function () {
    return("Wrong URL");
    });

    Route::controller(UserDetailController::class)->group( function(){
        Route::get('/completeprofile', 'completeProfile')->name('complete.profile');
        Route::get('/userdashboard', 'userdash')->name('user.dashboard');
        Route::post('/store_user_details', 'store')->name('store.userDetails');
    });
    
    
    // Route for Driver_update
    Route::prefix('profile')->group( function() {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/setting/{id}', 'editsetting')->name('setting-profile');
            Route::get('/edit/{user_id}', 'editprofile')->name('edit-profile');
            Route::post('/update/{id}', 'update')->name('update-profile');
        });
    });
   
    // reset password
    Route::post('/change-password/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');
    // for Notification
    Route::post('/toggleNotification', [NotificationController::class, 'toggleNotification'])->name('notification');

    
    // Route for Dispatcher
    Route::prefix('dispatcher')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list', [UserController::class, 'dispatcherpage'])->name('dispatcher');
            Route::post('/add/{id}', 'add')->name('dispatcheradd');
            Route::post('/deletecarrier', 'delete')->name('deleteuser');
            Route::post('/fetchdata',  'fetchdata')->name('fetchdata');
            Route::post('/edit', 'edit')->name('edituser');
        });
    });

    
    // Serching 
    // Route::post('/dispatcher/search', [UserController::class, 'searchData'])->name('search');
    Route::match(['get', 'post'], '/dispatcher/search', [UserController::class, 'searchData'])->name('search');

    // routes/web.php

    Route::get('/visit/{id}', [VisitController::class, 'visituser'])->name('visit');
    Route::get('/visitlogin', function () {
     return view('auth.login');
    });


});

    


//Admin Routes +++++
// Route::middleware(['auth:admin'])->group(function () {
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// })

// send Notification to user email whith name email and random create password ,create MailNotificationController amd UserNotification with route using mailtrap laravel 10




