<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // task index page
    public function index()
    {
        return view('task.index');
    }
}
