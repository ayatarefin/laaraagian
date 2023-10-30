<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\sharkController;
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

//___Login & Logout___//

Route::get('/', function (){
    return view('home');
})->name('homelog')->middleware('auth');

Route::get('/home', function (){
    return view('home');
});

Route::get('/logout',function(){
    Auth::logout();
    return redirect()->route('login');
});


//___verify Account___//

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('resent-email',[sharkController::class,'resend'])->name('verification.resend');

Route::get('/email/verify/{id}/{hash}',function(EmailVerificationRequest $request){
    $request->fulfill();
    return redirect('/');
})->middleware(['auth','signed'])->name('verification.verify');

Route::get('/home/purchase', [sharkController::class, 'purchase'])->name('purchase.item')->middleware('verified');


//___reset password___//

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//__class CRUD__//

Route::resource('classes', ClassController::class);

//__Students CRUD__//

Route::resource('students', StudentController::class);
