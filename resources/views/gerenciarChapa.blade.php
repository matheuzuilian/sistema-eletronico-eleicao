@extends('layout')
@section('title', 'Gerenciar Chapas')
@section('content')
    <section id="conteudo" class="container">
        <div>
            <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
            <a href="{{ route('adicionarChapa') }}" class="btn btn-primary mb-2">Adicionar Chapa</a>
        </div>

        @if (session('sucesso'))
            <div class="alert alert-success">{{ session('sucesso') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Lista de Chapas</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Diretor</th>
                            <th>Coordenador 1</th>
                            <th>Coordenador 2</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chapas as $chapa)
                            <tr>
                                <td>{{ $chapa->numero }}</td>
                                <td>{{ $chapa->diretor->pessoa->nome }}</td>
                                <td>{{ $chapa->coordenador1->pessoa->nome }}</td>
                                <td>{{ $chapa->coordenador2->pessoa->nome }}</td>
                                <td>
                                    <a href="{{ route('editarChapa', ['id' => $chapa->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('excluirChapa', ['id' => $chapa->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta chapa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhuma chapa cadastrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection