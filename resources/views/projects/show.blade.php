@extends('layouts.app')

@section('content')

<header class="flex items-center mb-4 pb-2">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects" class="text-grey text-sm font-normal no-underline hover:underline">Meu Projeto</a>
                / {{ $project->title }}
            </p>

            <a href="{{ $project->path().'/edit' }}" class="btn btn-primary">Edit Project</a>
        </div>
    </header>

    <main>
            
            <div class="lg:flex -mx-3">
                    <div class="lg:w-3/4 px-3 mb-6">
                                <div class="mb-8">
                                    <h2 class="text-lg text-grey font-normal mb-3">Tarefas</h2>
                
                   {{-- tasks --}}
                   @foreach ($project->tasks as $task)
                   <div class="bg-white p-4 rounded-lg  mb-3"> 
                       {{-- $task->path = $project->path() . '/tasks/' . $task->id --}}
                       <form method="POST" action="{{ $task->path() }}">
                            @method('PATCH')
                            @csrf

                            <div class="flex">
                            <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                            <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </div>

                        </form>
                </div>     
               @endforeach

               <div class="bg-white p-4 rounded-lg mb-3">
                            
                    <form action="{{$project->path() . '/tasks'}}" method="POST">
                     @csrf
                             <input placeholder="Adicionar uma nova tarefa" class="w-full" name="body"> 
                        </form>
                     </div>
                
                 </div>
                    
                    <div>
                        <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
                    
                                {{-- general notes --}}
                                <form method="POST" action="{{ $project->path() }}">
                                        @csrf
                                        @method('PATCH')
                
                                        <textarea
                                            name="notes"
                                            class="card w-full mb-4"
                                            style="min-height: 200px"
                                            placeholder="Deseja anotar algo?"
                                        >{{ $project->notes }}</textarea>
                
                                        <button type="submit" class="btn btn-primary">Save</button>
                                </form> 
                    </div>
                </div> 

                <div class="lg:w-1/4 px-3 px-3">
                       
                                @include ('projects.card')
                         
            </div>
 
        </main>

@endsection