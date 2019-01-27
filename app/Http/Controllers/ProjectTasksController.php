<?php

namespace App\Http\Controllers;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    //
    public function store(Project $project)
    {

        if (auth()->user()->isNot($project->owner)){
            abort(403);
        }
        //$this->authorize('update', $project);

        request()->validate(['body' => 'required']);
        
        $project->addTask(request('body'));

        return redirect($project->path());
    }
}
