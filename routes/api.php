<?php

use App\Http\Controllers\API\EmployeeAuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [EmployeeAuthController::class, 'login']);
Route::post('/register', [EmployeeAuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/assigned-tasks', [TaskController::class, 'getAssignedTasks']);
    Route::post('/change/task_status', [TaskController::class, 'changeTaskStatus']);
    Route::get('/task-details/{id}', [TaskController::class, 'getTaskDetails']);
    Route::get('/projects', [ProjectController::class, 'getProjects']);
    Route::post('/project/mark_done', [ProjectController::class, 'markProjectDone']);
});
