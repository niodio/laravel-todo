    @extends('layouts.admin')

    @section('title', 'Adição de tarefas')
        
    @section('content')
        <h1>Adição</h1>

        @if ($errors->any())
            @component('components.alert')
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            @endcomponent
        @endif

        <form method="post">
            @csrf
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" >
            
                <button type="submit">Adicionar</button>

        </form>
        
    @endsection