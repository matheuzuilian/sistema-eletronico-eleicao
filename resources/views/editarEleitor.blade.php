@extends('layout')
@section('title', 'Editar Eleitor')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Editar Eleitor
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
                            <form action="{{ route('editarEleitor.update', ['id' => $eleitor->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome', $eleitor->pessoa->nome) }}">
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" name="cpf" class="form-control" id="cpf" maxlength="11" value="{{ old('cpf', $eleitor->pessoa->cpf) }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="matricula" class="form-label">Matrícula</label>
                                            <input type="text" name="matricula" class="form-control" id="matricula" value="{{ old('matricula', $eleitor->matricula) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $eleitor->pessoa->email) }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                                            <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" value="{{ old('dataNascimento', $eleitor->pessoa->data_nascimento->format('Y-m-d')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo</label>
                                            <select name="tipo" class="form-control" id="tipo">
                                                <option value="">Selecione</option>
                                                <option value="professor" {{ old('tipo', $eleitor->tipo) == 'professor' ? 'selected' : '' }}>Professor</option>
                                                <option value="aluno" {{ old('tipo', $eleitor->tipo) == 'aluno' ? 'selected' : '' }}>Aluno</option>
                                                <option value="responsavel" {{ old('tipo', $eleitor->tipo) == 'responsavel' ? 'selected' : '' }}>Responsável</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="escola_id" class="form-label">Escola</label>
                                            <select name="escola_id" class="form-control" id="escola_id">
                                                <option value="">Selecione</option>
                                                @foreach ($escolas as $escola)
                                                    <option value="{{ $escola->id }}" {{ old('escola_id', $eleitor->escola_id) == $escola->id ? 'selected' : '' }}>
                                                        {{ $escola->nome }}
                                                    </option>
                                                @endforeach
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