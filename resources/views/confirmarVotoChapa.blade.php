@extends('layout')

@section('title', 'Confirmar Voto')

@section('content')

<section id="conteudo" class="container mt-5">

    <a href="{{ route('login') }}" class="btn btn-secondary mb-4">
        Sair
    </a>

    <div class="row">
        <div class="offset-md-2 col-md-8">

            <div class="card">
                <div class="card-header text-white text-center" style="background-color:#14ae5c;">
                    <h5 class="mb-0">Confirmar Voto</h5>
                </div>

                <div class="card-body" style="background-color:#d3d3d3;">

                    <h4 class="text-center mb-4">Chapa {{ $chapa->numero }}</h4>

                    <div class="row">

                        <div class="col-md-4 text-center mb-3">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Diretor"
                                 class="img-fluid rounded-circle"
                                 style="width:150px; height:150px; object-fit:cover;">
                            <h6 class="mt-2 mb-0">Diretor</h6>
                            <strong>{{ $chapa->diretor->pessoa->nome }}</strong>
                        </div>

                        <div class="col-md-4 text-center mb-3">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Coordenador"
                                 class="img-fluid rounded-circle"
                                 style="width:150px; height:150px; object-fit:cover;">
                            <h6 class="mt-2 mb-0">Coordenador</h6>
                            <strong>{{ $chapa->coordenador1->pessoa->nome }}</strong>
                        </div>

                        <div class="col-md-4 text-center mb-3">
                            <img src="{{ asset('images/candidato.png') }}"
                                 alt="Coordenador"
                                 class="img-fluid rounded-circle"
                                 style="width:150px; height:150px; object-fit:cover;">
                            <h6 class="mt-2 mb-0">Coordenador</h6>
                            <strong>{{ $chapa->coordenador2->pessoa->nome }}</strong>
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('escolhaChapa') }}" class="btn btn-secondary me-2">
                            Voltar
                        </a>

                        <form action="{{ route('registrarVoto') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Confirmar Voto
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</section>

@endsection