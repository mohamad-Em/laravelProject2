<?php

use App\Http\Controllers\admin\AdminWebController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
Route::namespace('admin') ->group(function(){
    Route::get('index',[AdminWebController::class,'index'])->name('index');
    Route::post('loginAdmin',[AdminWebController::class,'loginAdmin'])->name('loginAdmin');
});
Route::group(['namespace' => 'admin', 'middleware' => 'Admin'],function(){
    Route::get('dashboard',[AdminWebController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[AdminWebController::class,'logout'])->name('logout');
    Route::get('myProfile',[AdminWebController::class,'myProfile'])->name('myProfile');
    Route::get('allemployees',[AdminWebController::class,'employees'])->name('employees');
    Route::get('edit/{ID}',[AdminWebController::class,'edit'])->name('edit');
    Route::post('update/{ID}',[AdminWebController::class,'update'])->name('update');
    Route::get('sections',[AdminWebController::class,'sections'])->name('sections');
    Route::get('view/{sectionID}',[AdminWebController::class,'view'])->name('view');
    Route::get('deleteSections/{ID}',[AdminWebController::class,'deleteSections'])->name('deleteSections');
    Route::get('acvtive/{ID}',[AdminWebController::class,'acvtive'])->name('acvtive');
    Route::get('unActive/{ID}',[AdminWebController::class,'unActive'])->name('unActive');
    Route::get('deleteEmployee/{ID}',[AdminWebController::class,'deleteEmployee'])->name('deleteEmployee');
    Route::get('viewExperience/{ID}',[AdminWebController::class,'viewExperience'])->name('viewExperience');
    Route::get('viewEmployee/{ID}',[AdminWebController::class,'viewEmployee'])->name('viewEmployee');
    Route::get('DeleEmployee/{ID}',[AdminWebController::class,'DeleEmployee'])->name('DeleEmployee');
    Route::get('message/{ID}',[AdminWebController::class,'message'])->name('message');
    Route::post('saveMessage',[AdminWebController::class,'saveMessage'])->name('saveMessage');

});

