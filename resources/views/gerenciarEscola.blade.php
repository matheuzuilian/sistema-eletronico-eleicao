@extends('layout')
@section('title', 'Gerenciar Escolas')
@section('content')
    <section id="conteudo" class="container">
        <div>
            <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
            <a href="{{ route('adicionarEscola') }}" class="btn btn-primary mb-2">Adicionar Escola</a>
        </div>

        @if (session('sucesso'))
            <div class="alert alert-success">{{ session('sucesso') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Lista de Escolas</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($escolas as $escola)
                            <tr>
                                <td>{{ $escola->nome }}</td>
                                <td>{{ $escola->cidade }}</td>
                                <td>{{ $escola->estado }}</td>
                                <td>
                                    <a href="{{ route('editarEscola', ['id' => $escola->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('excluirEscola', ['id' => $escola->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta escola?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhuma escola cadastrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection