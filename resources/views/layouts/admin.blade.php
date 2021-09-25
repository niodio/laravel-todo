<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Laravel 1</title>


  <link rel="stylesheet" href="{{ URL::asset('/') }}css/app.css" />.


        <!--- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--- bootstrap -->
</head>
<body class="bg-dark text-light">
    <header>
    <!--- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">ToDo List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('tarefas.list')}}">Listar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tarefas.add')}}">Criar</a>
                </li>
                
            </ul>
            <!--<form class="form-inline my-2 my-lg-0" method="POST" >
    
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            -->
        </div>
    </nav>
    <!--- end nav -->
</header>

    <main class="d-flex justify-content-center align-items-center mt-4" >
        <div class="" style="height: 75vh">
            @yield('content')
        </div>
    </main>

    
    
    <hr>


    <footer>
        <!--- footer -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        &copy; Copyright - Todos os direitos reservados
                    </p>
                </div>
            </div>
        </div>
        <!--- end footer -->

    </footer>
    
</body>
</html>