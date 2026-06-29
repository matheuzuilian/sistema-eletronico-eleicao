
@extends('layout')
@section('title', 'Login')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Autenticação do Eleitor
                    </div>
                    <div class="card-body" style="background-color:#d3d3d3;">
                        <div class="offset-2 col-8">
                            <form action="{{ route('escolhaDiretor') }}" method="GET">
                                <div class="mb-3">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Senha</label>
                                    <input type="text" name="senha" class="form-control" id="senha" readonly>
                                </div>
                                
                                <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('loginAdm') }}" class="btn btn-link">Acessar área do Administrador</a>
                                <button type="submit" class="btn btn-primary ">Acessar</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

        @endsection
