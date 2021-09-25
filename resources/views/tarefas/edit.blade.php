@extends('layouts.admin')

@section('title', 'Edição de tarefas')
    
@section('content')
    <h1>Edição</h1>
    
    @if (session('warning'))
            @component('components.alert')
                {{ session('warning') }}
            @endcomponent
    @endif

    <form method="post">
        @csrf
                @method('PUT')
 
            <label for="titulo">Título</label>
                
            <input type="text" name="titulo" id="titulo" value="{{ $data->titulo }}">
        
            <label for="resolvido">Resolvido?</label>
            <input type="text" name="resolvido" id="resolvido" value="{{ $data->resolvido }}">

            <button type="submit">Atualizar</button>
    </form>
    
@endsection


