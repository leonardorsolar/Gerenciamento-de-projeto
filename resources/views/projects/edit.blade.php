@extends('layouts.app')

@section('content')


<div class="list-group-item">

    <form method="POST" action="{{$project->path()}}" class="container" style="padding-top:40px">

        @csrf
        @method('PATCH')

            <h1 class="mb-3">Editar Projetos</h1>

            <form>
            <div class="form-group">
                    
                    <div class="form-group">
                            <label class="label" for="title" >Título</label>
                            <input 
                            class="form-control" 
                            type="text" 
                            name="title" 
                            placeholder="título"
                            required
                            value="{{$project->title}}">
                    </div>

                    <div class="form-group">
                            <label class="label" for="description" >Descrição</label>
                            
                            <textarea
                             class="form-control"
                            name="description"
                            rows="3" 
                            required>{{$project->description}}</textarea>
                        </div>

        
                <button type="submit" class="btn btn-primary">Atualizar Projeto</button>


        
            </div>
            

            <a href="{{$project->path()}}">Cancelar</a>

    </form>
</div>



    @endsection


