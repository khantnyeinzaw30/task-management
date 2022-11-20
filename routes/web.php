<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/user/login');
Route::middleware('redirectIfLogin')->group(function () {
    Route::get('/user/login', [AuthController::class, 'loginView'])->name('auth.login');
    Route::get('/user/register', [AuthController::class, 'registerView'])->name('auth.register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [ProjectController::class, 'homeView'])->name('admin.home');
    // project data crud
    Route::prefix('projects')->group(function () {
        Route::post('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::get('/update/{id}', [ProjectController::class, 'updateView'])->name('project.updatePage');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::get('delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
    });
    // task data crud
    Route::prefix('employees', [EmployeeController::class, 'index'])->name('employee.index');
});
