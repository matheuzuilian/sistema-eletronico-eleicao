@extends('layout')
@section('title', 'Gerenciar Candidato')
@section('content')
    <section id="conteudo" class="container">
        <div>
            <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
            <a href="{{ route('adicionarCandidato') }}" class="btn btn-primary mb-2">Adicionar Candidato</a>
        </div>

        @if (session('sucesso'))
            <div class="alert alert-success">{{ session('sucesso') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Lista de Candidatos</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo Pretendido</th>
                            <th>Escola</th>
                            <th>Ações</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($candidatos as $candidato)
                            <tr>
                                <td>{{ $candidato->pessoa->nome }}</td>
                                <td>{{ $candidato->cargo }}</td>
                                <td>{{ $candidato->escola->nome }}</td>
                                <td>
                                    <a href="{{ route('editarCandidato', ['id' => $candidato->id]) }}"
                                        class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('excluirCandidato', ['id' => $candidato->id]) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este candidato?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Nenhum candidato cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection