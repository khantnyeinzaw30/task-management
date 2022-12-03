<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // get projects
    public function getProjects()
    {
        $projects = Project::get();
        return response()->json(['projects' => $projects]);
    }

    // mark project done
    public function markProjectDone(Request $request)
    {
        Project::where('id', $request->projectId)->update([
            'is_done' => $request->isDone
        ]);
    }
}
