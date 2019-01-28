@extends('layouts.app')

@section('content')


<body>

<div class="list-group-item">

    <form method="POST" action="/projects" class="container" style="padding-top:40px">

        @csrf

            <h1 class="mb-3">Criando o Projeto</h1>

            <form>
            <div class="form-group">
                    
                    <div class="form-group">
                            <label class="label" for="title" >Título</label>
                            <input class="form-control" type="text" name="title" placeholder="título">
                    </div>

                    <div class="form-group">
                            <label class="label" for="description" >Descrição</label>
                            
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
        
            <button type="submit" class="btn btn-primary">Criar Projeto</button></div>
            <a href="/projects">Cancelar</a>

    </form>
</div>

    @endsection

