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

    public function show(Project $project)
    {

    // $project = Project::findOrFail(request('project'));
    
    //
    
    return view ('projects.show', compact('project'));

    }

    public function store()
    {

        // validate
        //Se o atributo required estiver presente, o campo deve conter um valor quando o formulário for enviado.
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'required'
            //'owner_id' => 'required'
            ]);

            //dd($attributes);
            //$attributes ['owner_id'] = auth()->id();

            auth()->user()->projects()->create($attributes);

        // persist = insert no banco = passar o método a ser persistido como parametro
    //Project::create($attributes);

    // redirect
    return redirect('/projects');
        
    }

}
