<?php

namespace App\Http\Controllers;

use App\Models\AssignedTo;
use App\Models\Employee;
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
        $tasks = Task::select('id', 'name')->get();
        $employees = Employee::select('employees.employee_code', 'users.name as employee_name')
            ->leftJoin('users', 'employees.user_id', 'users.id')
            ->get();
        // dd($tasks->toArray(), $employees->toArray());
        return view('task.assign_to', compact('employees', 'tasks'));
    }

    // create task
    public function createTask(Request $request)
    {
        $this->validateTask($request);
        $data = $this->addTaskData($request);
        Task::create($data);
        return back()->with(['taskCreated' => 'A task was added to the project!']);
    }

    //  assign task
    public function assignTask(Request $request)
    {
        $this->validateAssignTaskAndUsers($request);
        $data = ['employee_code' => $request->employeeCode, 'task_id' => $request->taskId];
        // dd($request->all(), $data);
        AssignedTo::create($data);
        return redirect()->route('admin.home');
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

    // assign task validation
    private function validateAssignTaskAndUsers($request)
    {
        Validator::make($request->all(), [
            'taskId' => 'required|unique:assigned_tos,task_id',
            'employeeCode' => 'required'
        ], [
            'taskId.unique' => 'This task has already been assigned to another employee!',
            'taskId.required' => 'Task name is required',
            'employeeCode.required' => 'Employee Name is required!'
        ])->validate();
    }
}
