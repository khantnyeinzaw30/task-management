<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

Route::redirect('/', '/user/login');
Route::middleware('redirectIfLogin')->group(function () {
    Route::get('/user/login', [AuthController::class, 'loginView'])->name('auth.login');
    Route::get('/user/register', [AuthController::class, 'registerView'])->name('auth.register');
});

// 404 error
Route::get('auth/failed', [AuthController::class, 'authFailedView'])->name('auth.failed')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'manager_auth'])->group(function () {
    // manager or admin profile management
    Route::get('/home', [ProjectController::class, 'homeView'])->name('admin.home');
    Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::get('/settings', [UserController::class, 'settings'])->name('admin.settings');
    Route::post('/edit/profile', [UserController::class, 'editProfile'])->name('admin.editProfile');
    Route::post('/change/password', [UserController::class, 'changePassword'])->name('admin.changePassword');
    // project
    Route::prefix('projects')->group(function () {
        Route::post('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::get('/update/{id}', [ProjectController::class, 'updateView'])->name('project.updatePage');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::get('delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
    });
    // employee
    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    });
    // assign task to employees
    Route::get('/assign/task', [TaskController::class, 'index'])->name('task.index');
});
