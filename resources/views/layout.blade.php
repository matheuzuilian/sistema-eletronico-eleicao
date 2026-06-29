<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Eleições')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
            <section id="topo" class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center"
                style="background-color:#14ae5c; height: 100px; color:#ffffff">
                <h3 class="m-0">Sistema de Eleições Escolares</h3>
            </div>
        </div>
    </section>

    </header>

    <!-- Conteúdo da página -->
    <main>
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer>
       
    <section id="rodape" class="container">
        <div class="row">
            <div class="col-12 mt-4" style="background-color:#14ae5c; height: 70px;">
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

        
    </footer>

</body>
</html>