@extends('layout')
@section('title', 'Editar Chapa')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Editar Chapa
                    </div>
                    <div class="card-body" style="background-color:#d3d3d3;">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="offset-2 col-8">
                            <form action="{{ route('editarChapa.update', ['id' => $chapa->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome da Chapa</label>
                                            <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome', $chapa->nome) }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="eleicao_id" class="form-label">Eleição</label>
                                            <select name="eleicao_id" class="form-control" id="eleicao_id">
                                                @foreach ($eleicoes as $eleicao)
                                                    <option value="{{ $eleicao->id }}" {{ old('eleicao_id', $chapa->eleicao_id) == $eleicao->id ? 'selected' : '' }}>
                                                        {{ $eleicao->escola->nome ?? 'Eleição' }} #{{ $eleicao->id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="diretor_id" class="form-label">Diretor</label>
                                    <select name="diretor_id" class="form-control" id="diretor_id">
                                        @foreach ($diretores as $candidato)
                                            <option value="{{ $candidato->id }}" {{ old('diretor_id', $chapa->diretor_id) == $candidato->id ? 'selected' : '' }}>
                                                {{ $candidato->pessoa->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="coordenador1_id" class="form-label">Coordenador 1</label>
                                    <select name="coordenador1_id" class="form-control" id="coordenador1_id">
                                        @foreach ($coordenadores as $candidato)
                                            <option value="{{ $candidato->id }}" {{ old('coordenador1_id', $chapa->coordenador1_id) == $candidato->id ? 'selected' : '' }}>
                                                {{ $candidato->pessoa->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="coordenador2_id" class="form-label">Coordenador 2</label>
                                    <select name="coordenador2_id" class="form-control" id="coordenador2_id">
                                        @foreach ($coordenadores as $candidato)
                                            <option value="{{ $candidato->id }}" {{ old('coordenador2_id', $chapa->coordenador2_id) == $candidato->id ? 'selected' : '' }}>
                                                {{ $candidato->pessoa->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex flex-column align-items-start">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection