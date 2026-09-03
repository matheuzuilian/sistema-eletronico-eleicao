@extends('layout')

@section('title', 'Escolha da Chapa')

@section('content')

<section id="conteudo" class="container mt-5">

    <a href="{{ route('login') }}" class="btn btn-secondary mb-4">
        Sair
    </a>

    @forelse ($chapas as $chapa)
        <div class="row mb-4">
            <div class="offset-md-2 col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:#14ae5c;">
                        <h5 class="mb-0">Chapa {{ $chapa->nome }}</h5>
                    </div>

                    <div class="card-body" style="background-color:#d3d3d3;">
                        <div class="row">

                            <div class="col-md-4 text-center mb-3">
                                <img src="{{ asset('images/candidato.png') }}"
                                     alt="Diretor"
                                     class="img-fluid rounded-circle"
                                     style="width:120px; height:120px; object-fit:cover;">
                                <h6 class="mt-2 mb-0">Diretor</h6>
                                <strong>{{ $chapa->diretor->pessoa->nome }}</strong>
                            </div>

                            <div class="col-md-4 text-center mb-3">
                                <img src="{{ asset('images/candidato.png') }}"
                                     alt="Coordenador"
                                     class="img-fluid rounded-circle"
                                     style="width:120px; height:120px; object-fit:cover;">
                                <h6 class="mt-2 mb-0">Coordenador</h6>
                                <strong>{{ $chapa->coordenador1->pessoa->nome }}</strong>
                            </div>

                            <div class="col-md-4 text-center mb-3">
                                <img src="{{ asset('images/candidato.png') }}"
                                     alt="Coordenador"
                                     class="img-fluid rounded-circle"
                                     style="width:120px; height:120px; object-fit:cover;">
                                <h6 class="mt-2 mb-0">Coordenador</h6>
                                <strong>{{ $chapa->coordenador2->pessoa->nome }}</strong>
                            </div>

                        </div>

                        <form action="{{ route('confirmarVotoChapa') }}" method="POST" class="text-center mt-3">
                            @csrf
                            <input type="hidden" name="chapa_id" value="{{ $chapa->id }}">
                            <button type="submit" class="btn btn-primary">
                                Escolher
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            Nenhuma chapa cadastrada para esta eleição.
        </div>
    @endforelse

</section>

@endsection