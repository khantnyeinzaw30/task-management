<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    // task index page
    public function index()
    {
        $projects = Project::select('id', 'name')->get();
        $tasks = Task::select('tasks.*', 'projects.name as project_name')
            ->leftJoin('projects', 'tasks.project_id', 'projects.id')
            ->orderBy('tasks.created_at')
            ->get();
        return view('task.index', compact('projects', 'tasks'));
    }

    // assign task page
    public function assignTaskView()
    {
        return view('task.assign_to');
    }

    // create task
    public function createTask(Request $request)
    {
        $this->validateTask($request);
        $data = $this->addTaskData($request);
        Task::create($data);
        return back()->with(['taskCreated' => 'A task was added to the project!']);
    }

    // add task data to an array
    private function addTaskData($request)
    {
        return [
            'name' => $request->taskName,
            'description' => $request->taskDescription,
            'priority' => $request->taskPriority,
            'project_id' => $request->taskProjectId,
            'due_date' => $request->taskDueDate
        ];
    }

    // task validation process
    private function validateTask($request)
    {
        Validator::make($request->all(), [
            'taskName' => 'required',
            'taskPriority' => 'required',
            'taskProjectId' => 'required',
            'taskDueDate' => 'required'
        ], [
            'taskProjectId.required' => 'Please choose in which project this task will participate!'
        ])->validate();
    }
}
