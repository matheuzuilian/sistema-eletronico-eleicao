
    @extends('layout')
    @section('title', 'Gerar Relatório')
    @section('content')
        <section id="conteudo" class="container">
            <div>
                <a href="{{ route('opcaoAdm') }}" class="btn btn-danger mb-2">Voltar</a>
                <a href="{{ route('login') }}" class="btn btn-primary mb-2">Sair</a>
            </div>
            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card">
                        <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                            Gerar Relatório
                        </div>
                        <div class="card-body" style="background-color:#d3d3d3;">
                            <div class="offset-2 col-8">
                                <form action="{{ route('opcaoAdm') }}" method="GET">
                                    <div class="mb-3">
                                        <label for="escola" class="form-label">Escola</label>
                                        <input type="text" name="escola" class="form-control" id="escola" readonly>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Data</label>
                                            <input type="date" name="data" class="form-control" id="data" readonly>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-start">
                                        <button type="submit" class="btn btn-primary ">Gerar Relatório</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
