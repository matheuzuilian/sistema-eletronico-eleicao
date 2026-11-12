@extends('layout')
@section('title', 'Fim da Votação')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Fim da Votação
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
                            <form action="{{ route('fimVotacao.store') }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja encerrar a votação desta escola?');">
                                @csrf

                                <div class="mb-3">
                                    <label for="escola_id" class="form-label">Escola</label>
                                    <select name="escola_id" class="form-control" id="escola_id" required>
                                        <option value="">Selecione</option>
                                        @foreach ($escolas as $escola)
                                            <option value="{{ $escola->id }}" {{ old('escola_id') == $escola->id ? 'selected' : '' }}>
                                                {{ $escola->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex flex-column align-items-start">
                                    <button type="submit" class="btn btn-danger">Encerrar Votação</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection