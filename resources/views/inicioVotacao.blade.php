    @extends('layout')
    @section('title', 'Inicio de Votação')
    @section('content')
        <section id="conteudo" class="container">
            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card">
                        <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                            Início da Votação
                        </div>
                        <div class="card-body" style="background-color:#d3d3d3;">
                            <div class="offset-2 col-8">
                                <form action="{{ route('opcaoAdm') }}" method="GET">
                                    <div class="mb-3">
                                        <label for="escola" class="form-label">Escola</label>
                                        <input type="text" name="escola" class="form-control" id="escola" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="data" class="form-label">Data</label>
                                                <input type="date" name="data" class="form-control" id="data" readonly>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="hora" class="form-label">Hora</label>
                                                <input type="text" name="hora" class="form-control" id="hora" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-start">
                                        <button type="submit" class="btn btn-primary ">Iniciar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
