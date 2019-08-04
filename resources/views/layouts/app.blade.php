<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c11537631.js"></script>

    <title>Desafio - Send4</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-brand text-light">Desafio - Send4</div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 mt-4">
                <ul class="list-group">
                <li class="list-group-item"><a class="text-dark" href="/contatos">Todos os Contatos</a></li>
                </ul>
            </div>
    @yield('conteudo')
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>

