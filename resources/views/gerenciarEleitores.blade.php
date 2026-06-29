
    @extends('layout')
    @section('title', 'Gerenciar Eleitores')
    @section('content')
        <section id="conteudo" class="container">
            <div>
                <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
                <a href="{{ route('adicionarEleitor') }}" class="btn btn-primary mb-2">Adicionar Eleitor</a>
            </div>
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Lista de Eleitores</h3>
                </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Matrícula</th>
                                <th>E-mail</th>
                                <th>Data de Nascimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>João Silva</td>
                                <td>123.456.789-00</td>
                                <td>123456</td>
                                <td>joao.silva@email.com</td>
                                <td>01-01-1990</td>
                                <td>
                                    <a href="{{ route('editarEleitor', ['id' => 1]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirEleitor', ['id' => 1]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Maria Souza</td>
                                <td>987.654.321-00</td>
                                <td>654321</td>
                                <td>maria.souza@email.com</td>
                                <td>15-05-1992</td>
                                <td>
                                    <a href="{{ route('editarEleitor', ['id' => 2]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirEleitor', ['id' => 2]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Carlos Oliveira</td>
                                <td>456.789.123-00</td>
                                <td>987654</td>
                                <td>carlos.oliveira@email.com</td>
                                <td>20-10-1985</td>
                                <td>
                                    <a href="{{ route('editarEleitor', ['id' => 3]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('excluirEleitor', ['id' => 3]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>


        </section>

    @endsection
