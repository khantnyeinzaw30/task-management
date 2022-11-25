<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AssignedTo;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // return task data
    public function getAssignedTasks($employee_code)
    {
        $tasks = AssignedTo::select('tasks.*', 'projects.name as project_name')
            ->where('assigned_tos.employee_code', $employee_code)
            ->leftJoin('tasks', 'assigned_tos.task_id', 'tasks.id')
            ->leftjoin('projects', 'tasks.project_id', 'projects.id')
            ->get();
        // logger($tasks);
        return response()->json(['tasks' => $tasks]);
    }

    // get a specific task details
    public function getTaskDetails($id)
    {
        $task = Task::select('tasks.*', 'projects.name as project_name')
            ->leftJoin('projects', 'tasks.project_id', 'projects.id')
            ->where('tasks.id', $id)
            ->first();
        return response()->json(['task' => $task]);
    }

    // change task status by employee user
    public function changeTaskStatus(Request $request)
    {
        Task::where('id', $request->taskId)->update([
            'assigned_status' => $request->taskStatus
        ]);
        $task_status = Task::where('id', $request->taskId)->pluck('assigned_status')->first();
        return response()->json([
            'status' => 'success',
            'assigned_status' => $task_status
        ], 200);
    }
}
