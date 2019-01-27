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
    //$projects= Project::all();
    $projects= auth()->user()->projects;
    //
    return view ('projects.index', compact('projects'));

    }

    public function show(Project $project)
    {

    // $project = Project::findOrFail(request('project'));
    //an_authenticated_cannot_view_the_projects_of_others()
    //if (auth()->id() != $project->owner_id) {
        //if (auth()->user()->isNot($project->owner)) {   
        //abort(403); }
        $this->authorize('update', $project);
    
    
    return view('projects.show', compact('project'));

    }

    public function create()
    {

    return view('projects.create');

    }

    public function store()
    {

        // validate
        //Se o atributo required estiver presente, o campo deve conter um valor quando o formulário for enviado.
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'required',
            //'owner_id' => 'required',
            'notes' => 'min:3'
            ]);

            //dd($attributes);
            //$attributes ['owner_id'] = auth()->id();

            $project = auth()->user()->projects()->create($attributes);

        // persist = insert no banco = passar o método a ser persistido como parametro
    //Project::create($attributes);

    // redirect
    return redirect($project->path());
        
    }

    /**
     * Update the project.
     *
     * @param  Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project)
    {
        $this->authorize('update', $project);
        

        $project->update(request(['notes']));

        return redirect($project->path());
    }

}
