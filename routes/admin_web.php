<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PyramidController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\AgentController;
use App\Http\Controllers\admin\HomePageController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SettingController;


Route::get('/pyramid',[PyramidController::class,'index']);
Route::get('/chart',[PyramidController::class,'chart']);
Route::get('/',[HomePageController::class,'index']);
Route::get('/scholarship/{id}',[HomePageController::class,'scholarship']);
Route::get('/all-scholarship',[HomePageController::class,'all_scholarship']);
Route::get('/about',[HomePageController::class,'about_us']);
Route::get('/contact',[HomePageController::class,'contact_us']);

Route::prefix("admin")->group(function() {
    Route::get('/',[AuthController::class,'setup']);
    Route::get('/dashboard',[ProfileController::class,'dashboard']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/switch-login/{id}',[AuthController::class,'switch_login']);
    Route::get('/forgot-password',[AuthController::class,'forgot_setup']);
    Route::post('/forgot-password',[AuthController::class,'forgot_password']);

    Route::get('/reset-password/{token}',[AuthController::class,'reset_password_setup']);
    Route::post('/reset-password',[AuthController::class,'change_password']);
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/profile',[ProfileController::class,'setup'])->name('profile');
        Route::post('/profile/update-profile',[ProfileController::class,'update_profile']);
        Route::post('/profile/update-password',[ProfileController::class,'update_password']);
        Route::post('/profile/checkEmail',[ProfileController::class,'checkEmail'])->name('checkEmail');
        Route::post('/profile/avatar-remove',[ProfileController::class,'remove']);

        Route::match(['get','post'],'/admins',[AdminsController::class,'index']);
        Route::get('/admin/setup/{id}',[AdminsController::class,'setup']);
        Route::get('/admin/setup',[AdminsController::class,'setup']);
        Route::post('/admin/commit',[AdminsController::class,'commit']);
        Route::post('/admin/delete', [AdminsController::class, 'delete']);

        Route::match(['get','post'],'/agent',[AgentController::class,'index']);
        Route::get('/agent/setup/{id}',[AgentController::class,'setup']);
        Route::get('/agent/setup',[AgentController::class,'setup']);
        Route::post('/agent/commit',[AgentController::class,'commit']);
        Route::post('/agent/delete', [AgentController::class, 'delete']);
        Route::post('/agent/invite-admin',[AgentController::class,'invite_admin']);
        Route::post('/agent/check-email',[AgentController::class,'check_email']);
        Route::post('/agent/admin-delete', [AgentController::class, 'invite_admin_delete']);

        Route::prefix('/students')->controller(StudentController::class)->group(function() {
            Route::match(['get','post'],'/', 'index');
            Route::get('/setup','setup');
            Route::get('/setup/{id}','setup');
            Route::post('/commit','commit');
            Route::post('/delete','delete');
            Route::post('/checkEmail','checkEmail');
            Route::get('/document/{id}','document');
			Route::post('/document-upload/{id}','document_upload');
			Route::post('/document-preview','document_preview');
			Route::get('/document-delete/{id}','document_delete');
            Route::get('/student-document/{id}','student_document');

        });
        Route::prefix('/setting')->controller(SettingController::class)->group(function() {
            Route::get('/university-logo','university_logo');
			Route::post('/university-logo-upload','university_logo_upload');
			Route::post('/university-logo-preview','university_logo_preview');
			Route::get('/university-logo-delete/{id}','university_logo_delete');
            Route::match(['get','post'],'/scholarship', 'scholarship');
            Route::get('/setup-scholarship','setup_scholarship');
            Route::get('/setup-scholarship/{id}','setup_scholarship');
            Route::post('/commit-scholarship','commit_scholarship');
            Route::post('/delete-scholarship', 'delete_scholarship');
            Route::get('/feedback','feedback');
            // Route::get('/feedback/{id}','feedback');
            Route::post('/commit-feedback','commit_feedback');
            Route::get('/notice','notice');
            // Route::get('/notice/{id}','notice');
            Route::post('/commit-notice','commit_notice');
            Route::match(['get','post'],'/about-us', 'about_us');
            Route::get('/setup-about-us','setup_about_us');
            Route::get('/setup-about-us/{id}','setup_about_us');
            Route::post('/commit-about-us','commit_about_us');
            Route::post('/delete-about-us', 'delete_about_us');
            Route::get('/social-handles', 'social_handles');
            Route::post('/commit-social-handles','commit_social_handles');

        });

    });
});
