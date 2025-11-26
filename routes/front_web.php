<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ProfileController;

// Route::get('/', function () {
//     // return redirect('/portal');
//     return "Landing page will goes here";
// });

Route::prefix("agent")->group(function(){
    Route::get('/',[AuthController::class,'index']);
    Route::match(['get','post'],'/dashboard', [ProfileController::class,'dashboard']);
    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/commit-register',[AuthController::class,'commit_register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::post('/checkEmail',[AuthController::class,'checkEmail']);

    Route::get('/forgot-password',[AuthController::class,'forgot_setup']);
    Route::post('/forgot-password',[AuthController::class,'forgot_password']);

    Route::get('/reset-password/{token}',[AuthController::class,'reset_password_setup']);
    Route::post('/reset-password',[AuthController::class,'change_password']);

    Route::get('/activate-account/{token}',[AuthController::class,'activate_account_setup']);
    Route::post('/activate-account',[AuthController::class,'store_password']);

    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/profile/setup',[ProfileController::class,'setup']);
    Route::post('/profile/update-profile',[ProfileController::class,'update_profile']);
    Route::post('/profile/update-password',[ProfileController::class,'update_password']);
    Route::post('/profile/checkEmail',[ProfileController::class,'checkEmail']);
    Route::post('/login-attempt',[AuthController::class,'login_attempt']);
    Route::post('/profile/avatar-remove',[ProfileController::class,'remove']);
    Route::get('/profile/student-document/{id}',[ProfileController::class,'student_document']);


});
