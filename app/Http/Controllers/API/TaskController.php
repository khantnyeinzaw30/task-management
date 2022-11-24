<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // return task data
    public function getTasks()
    {
        $tasks = Task::select('tasks.*', 'projects.name as project_name')
            ->leftJoin('projects', 'tasks.project_id', 'projects.id')
            ->orderBy('due_date')
            ->get();
        return response()->json(['tasks' => $tasks]);
    }

    // change task status by employee user
    public function changeTaskStatus(Request $request)
    {
        logger($request->all());
        // Task::where('id', $request->taskId)->update([
        //     'assigned_status' => $request->taskStatus
        // ]);
    }
}
