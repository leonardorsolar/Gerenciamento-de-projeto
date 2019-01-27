@extends('layouts.app')

@section('content')

<header class="flex items-center mb-4" >

        <div class="flex justify-between items-end w-full">
                <h2 class="text-grey text-sm font-normal">Meus Projetos</h2>
    
                <a href="/projects/create" class="btn btn-primary ">Novo Projeto</a>
            </div>

</header>

<main class="lg:flex lg:flex-wrap -mx-2">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            @include ('projects.card')
        </div>
        @empty
            <div>Não existe projeto cadastrado.</div>
        @endforelse
</main>

@endsection

