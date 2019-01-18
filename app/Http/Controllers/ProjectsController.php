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

        // validate
        //Se o atributo required estiver presente, o campo deve conter um valor quando o formulário for enviado.
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);

        // insert no banco persist
    Project::create($attributes);

    // redirect
    return redirect ('projects');
        
    }

}
