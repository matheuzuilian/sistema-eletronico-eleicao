    @extends('layout')
    @section('title', 'Adicionar Candidato')
    @section('content')
        <section id="conteudo" class="container">
            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card">
                        <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                            Adicionar Candidato
                        </div>
                        <div class="card-body" style="background-color:#d3d3d3;">
                            <div class="offset-2 col-8">
                                <form action="{{ route('gerenciarCandidato') }}" method="GET">
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="cargo" class="form-label">Cargo</label>
                                                <input type="text" name="cargo" class="form-control" id="cargo" readonly>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="cargoPretendido" class="form-label">Cargo Pretendido</label>
                                                <input type="text" name="cargoPretendido" class="form-control"
                                                    id="cargoPretendido" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="proposta" class="form-label">Proposta</label>
                                        <textarea name="proposta" class="form-control" id="proposta" rows="3"
                                            readonly></textarea>
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