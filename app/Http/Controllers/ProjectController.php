<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    // project manager home page
    public function homeView()
    {
        $projects = Project::select('*')->get();
        $isDoneCount = count(Project::where('is_done', true)->get());
        return view('project.index', compact('projects', 'isDoneCount'));
    }

    // create project
    public function create(Request $request)
    {
        $this->validation($request, null);
        $data = $this->changeDataFormat($request);
        Project::create($data);
        return back(302);
    }

    // update view
    public function updateView($id)
    {
        $dataToUpdate = Project::where('id', $id)->first();
        $projects = Project::get();
        return view('project.update', compact('projects', 'dataToUpdate'));
    }

    // update project
    public function update(Request $request, $id)
    {
        $this->validation($request, $id);
        $data = $this->changeDataFormat($request);
        Project::where('id', $id)->update($data);
        return redirect()->route('admin.home');
    }

    // delete project data
    public function delete($id)
    {
        Project::where('id', $id)->delete();
        return redirect()->route('admin.home');
    }

    // change data format to array
    public function changeDataFormat($request)
    {
        return [
            'name' => $request->projectName,
            'description' => $request->projectDescription
        ];
    }

    // validate user request
    private function validation($request, $id)
    {
        Validator::make($request->all(), [
            'projectName' => 'required|unique:projects,name,' . $id,
            'projectDescription' => 'required'
        ], [
            'required' => 'Please fill :attribute',
            'unique' => 'Project already exists!'
        ])->validate();
    }
}
