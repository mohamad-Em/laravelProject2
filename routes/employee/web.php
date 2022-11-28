<?php

use App\Http\Controllers\employee\EmployeeWebController;
use Illuminate\Support\Facades\Route;
Route::namespace('employee')->group(function(){
    Route::get('login',[EmployeeWebController::class,'login'])->name('login');
    Route::post('loginEmployee',[EmployeeWebController::class,'loginEmployee'])->name('loginEmployee');
    Route::get('sign-up',[EmployeeWebController::class,'signUp'])->name('sign-up');
    Route::post('saveEmp',[EmployeeWebController::class,'saveEmp'])->name('saveEmp');
});
Route::group(['namespace' => 'employee','middleware' => 'Emp'],function(){
    Route::get('dashEmp',[EmployeeWebController::class,'dashEmp'])->name('dashEmp');
    Route::get('empProfile',[EmployeeWebController::class,'empProfile'])->name('empProfile');
    Route::get('editEmp/{ID}',[EmployeeWebController::class,'editEmp'])->name('editEmp');
    Route::post('updateEmp/{ID}',[EmployeeWebController::class,'updateEmp'])->name('updateEmp');
    Route::get('experience/{ID}',[EmployeeWebController::class,'experience'])->name('experience');
    Route::post('saveExperience',[EmployeeWebController::class,'saveExperience'])->name('saveExperience');
    Route::get('logoutEmp',[EmployeeWebController::class,'logout'])->name('logoutEmp');

});

