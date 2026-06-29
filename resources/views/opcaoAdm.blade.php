
    @extends('layout')
    @section('title', 'Opções do Administrador')
    @section('content')
        <section id="conteudo" class="container">
            <div>
                <a href="{{ route('login') }}" class="btn btn-danger mb-2">Sair</a>
                <a href="{{ route('inicioVotacao') }}" class="btn btn-primary mb-2">Iniciar Votação</a>
            </div>

            <div class="row mt-5">

                <div class="col-md-4 mb-4">
                    <a href="{{ route('gerenciarCandidato') }}" class="text-decoration-none text-dark">
                        <div class="card h-100" style="background-color:#d3d3d3;">
                            <img src="images/adicionarcandidato.png" alt="Adicionar Candidato"
                                class="img-candidato mx-auto d-block">
                            <h4 class="text-center mt-2">Adicionar Candidato</h4>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="{{ route('relatorio') }}" class="text-decoration-none text-dark">
                        <div class="card h-100" style="background-color:#d3d3d3;">
                            <img src="images/relatorio.png" alt="Relatório" class="img-candidato mx-auto d-block">
                            <h4 class="text-center mt-2">Relatório</h4>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="{{ route('gerenciarEleitores') }}" class="text-decoration-none text-dark">
                        <div class="card h-100" style="background-color:#d3d3d3;">
                            <img src="images/eleitor.png" alt="Gerenciar Eleitores" class="img-candidato mx-auto d-block">
                            <h4 class="text-center mt-2">Gerenciar Eleitores</h4>
                        </div>
                    </a>
                </div>

            </div>
        </section>

    @endsection
