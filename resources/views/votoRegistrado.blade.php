@extends('layout')
@section('title', 'Voto Registrado')
@section('content')
    <section id="conteudo" class="container">
        <div class="row mt-5">
            <div class="offset-2 col-8">
                <div class="container">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        <h5 align="center">Voto Registrado</h5>
                    </div>
                    <div class="card mb-5" style="background-color:#d3d3d3;">
                        <div class="row align-items-center">

                            <div class="col-md-4">
                                <img src="{{ asset('images/certo.png') }}" alt="Tudo Certo"
                                    class="img-fluid d-block mx-auto">

                            </div>
                            <div class="col-md-8">
                                <h3>Voto Registrado com Sucesso!</h3>
                                <p>Obrigado por participar da eleição.</p>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('login') }}" class="btn btn-primary">Encerrar Sessão</a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection