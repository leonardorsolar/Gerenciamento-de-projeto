@extends('layouts.app')

@section('content')



    <link rel="stylesheet" type="text/css "href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">


<body>

    <form method="POST" action="/projects" class="container" style="padding-top:40px">

        @csrf

            <h1 class="heading is-1">Criando o Projeto</h1>

        <div class="field">
            <label class="label" for="title" >Título</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="título"></div>
        
        </div>

        <div class="field">
                <label class="label" for="description" >Descrição</label>
    
                <div class="control">
                    <input class="textarea" name="description"></div>
            
        </div>
    
        <div class="field">

            <div class="control"><button type="submit" class="button is-link">Criar Projeto</button></div>
            <a href="/projects">Cancelar</a>

    </form>


    @endsection

