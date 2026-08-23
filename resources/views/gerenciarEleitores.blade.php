@extends('layout')
@section('title', 'Gerenciar Eleitores')
@section('content')
    <section id="conteudo" class="container">
        <div>
            <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
            <a href="{{ route('adicionarEleitor') }}" class="btn btn-primary mb-2">Adicionar Eleitor</a>
        </div>

        @if (session('sucesso'))
            <div class="alert alert-success">{{ session('sucesso') }}</div>
        @endif

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
                        @forelse ($eleitores as $eleitor)
                            <tr>
                                <td>{{ $eleitor->pessoa->nome }}</td>
                                <td>{{ $eleitor->pessoa->cpf }}</td>
                                <td>{{ $eleitor->matricula ?? '—' }}</td>
                                <td>{{ $eleitor->pessoa->email }}</td>
                                <td>{{ $eleitor->pessoa->data_nascimento->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('editarEleitor', ['id' => $eleitor->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('excluirEleitor', ['id' => $eleitor->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este eleitor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum eleitor cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>


    </section>

@endsection