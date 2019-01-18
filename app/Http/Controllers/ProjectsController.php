<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsController extends Controller
{
    //

    public function index()
    {

            // recupero todos os projetos no banco
    $projects= Project::all();

    //
    return view ('projects.index', compact('projects'));

    }

    public function store()
    {

        // insert no banco persist
    Project::create(request(['title','description']));

    // redirect
    return redirect ('projects');
        
    }

}
