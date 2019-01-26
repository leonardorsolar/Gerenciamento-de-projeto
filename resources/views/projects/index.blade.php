@extends('layouts.app')

@section('content')

<div class="flex items-center mb-3" >
        <!-- <h1 class="mr-auto">Gerenciamento de Projetos</h1>  -->

        <a href="/projects/create">Novos Projetos</a>

</div>

 

    <ul>
    
        @forelse ($projects as $project)

            <li>
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>
            @empty

            <li>No projects yet.</li>

        @endforelse

    </ul>



@endsection