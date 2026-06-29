    @extends('layout')
    @section('title', 'Gerenciar Candidato')
    @section('content')
        <section id="conteudo" class="container">
            <div>
                <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
                <a href="{{ route('adicionarCandidato') }}" class="btn btn-primary mb-2">Adicionar Candidato</a>
            </div>
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Lista de Candidatos</h3>
                </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cargo Atual</th>
                                <th>Cargo Pretendido</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>João Silva</td>
                                <td>Professor</td>
                                <td>Diretor</td>
                                <td>
                                    <a href="{{ route('editarCandidato', ['id' => 1]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirCandidato', ['id' => 1]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Maria Souza</td>
                                <td>Técnica Administrativa</td>
                                <td>Vice-Diretora</td>
                                <td>
                                    <a href="{{ route('editarCandidato', ['id' => 2]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirCandidato', ['id' => 2]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Carlos Oliveira</td>
                                <td>Professor</td>
                                <td>Coordenador</td>
                                <td>
                                    <a href="{{ route('editarCandidato', ['id' => 3]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirCandidato', ['id' => 3]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>


        </section>

    @endsection
