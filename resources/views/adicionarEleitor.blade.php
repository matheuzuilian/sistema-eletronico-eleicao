
    @extends('layout')
    @section('title', 'Adicionar Eleitor')
    @section('content')
        <section id="conteudo" class="container">
            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card">
                        <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                            Adicionar Eleitor
                        </div>
                        <div class="card-body" style="background-color:#d3d3d3;">
                            <div class="offset-2 col-8">
                                <form action="{{ route('gerenciarEleitores') }}" method="GET">
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="cpf" class="form-label">CPF</label>
                                                <input type="text" name="cpf" class="form-control" id="cpf" readonly>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="matricula" class="form-label">Matrícula</label>
                                                <input type="text" name="matricula" class="form-control" id="matricula" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" name="email" class="form-control" id="email" readonly>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                                                <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-start">
                                        <button type="submit" class="btn btn-primary ">Salvar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
