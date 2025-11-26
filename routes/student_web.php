<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student\AuthController;
use App\Http\Controllers\student\ProfileController;

Route::prefix("student")->group(function(){
    Route::get('/',[AuthController::class,'index']);
    Route::get('/dashboard',[ProfileController::class,'dashboard']);
    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/register/{agent_code?}',[AuthController::class,'register']);
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
    Route::get('/document',[ProfileController::class,'document']);
    Route::post('/document-upload/{id}',[ProfileController::class,'document_upload']);
    Route::post('/document-preview',[ProfileController::class,'document_preview']);
    Route::get('/document-delete/{id}',[ProfileController::class,'document_delete']);
    Route::get('/student-letter',[ProfileController::class,'student_letter']);

});