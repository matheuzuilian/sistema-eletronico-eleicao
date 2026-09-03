@extends('layout')
@section('title', 'Adicionar Candidato')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Adicionar Candidato
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
                            <form action="{{ route('adicionarCandidato.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome') }}">
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" name="cpf" class="form-control" id="cpf" maxlength="11"
                                                value="{{ old('cpf') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" class="form-control" id="data_nascimento"
                                        value="{{ old('data_nascimento') }}">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="cargo" class="form-label">Cargo Pretendido</label>
                                            <select name="cargo" id="cargo" class="form-control">
                                                <option value="">Selecione um cargo</option>
                                                <option value="Diretor" {{ old('cargo') == 'Diretor' ? 'selected' : '' }}>
                                                    Diretor
                                                </option>
                                                <option value="Coordenador" {{ old('cargo') == 'Coordenador' ? 'selected' : '' }}>
                                                    Coordenador
                                                </option>
                                            </select>
                                        </div>
                                    </div>
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