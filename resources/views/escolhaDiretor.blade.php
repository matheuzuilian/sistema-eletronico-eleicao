@extends('layout')

@section('title', 'Escolha do Diretor')

@section('content')

<section id="conteudo" class="container mt-5">

    <a href="{{ route('login') }}" class="btn btn-secondary mb-4">
        Sair
    </a>

    <div class="row mb-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:#14ae5c;">
                    <h5 class="mb-0">Escolha do Diretor</h5>
                </div>

                <div class="card-body" style="background-color:#d3d3d3;">
                    <div class="row align-items-center">

                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Diretor"
                                 class="img-fluid rounded-circle"
                                 style="width:180px; height:180px; object-fit:cover;">
                        </div>

                        <div class="col-md-8">
                            <h3>Nome do Diretor</h3>
                            <p>Proposta do Diretor</p>

                            <a href="{{ route('confirmarVotoDiretor') }}"
                               class="btn btn-primary mt-3">
                                Escolher
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:#14ae5c;">
                    <h5 class="mb-0">Escolha do Diretor</h5>
                </div>

                <div class="card-body" style="background-color:#d3d3d3;">
                    <div class="row align-items-center">

                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Diretor"
                                 class="img-fluid rounded-circle"
                                 style="width:180px; height:180px; object-fit:cover;">
                        </div>

                        <div class="col-md-8">
                            <h3>Nome do Diretor</h3>
                            <p>Proposta do Diretor</p>

                            <a href="{{ route('confirmarVotoDiretor') }}"
                               class="btn btn-primary mt-3">
                                Escolher
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:#14ae5c;">
                    <h5 class="mb-0">Escolha do Diretor</h5>
                </div>

                <div class="card-body" style="background-color:#d3d3d3;">
                    <div class="row align-items-center">

                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Diretor"
                                 class="img-fluid rounded-circle"
                                 style="width:180px; height:180px; object-fit:cover;">
                        </div>

                        <div class="col-md-8">
                            <h3>Nome do Diretor</h3>
                            <p>Proposta do Diretor</p>

                            <a href="{{ route('confirmarVotoDiretor') }}"
                               class="btn btn-primary mt-3">
                                Escolher
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection