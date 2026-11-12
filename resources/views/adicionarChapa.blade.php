@extends('layout')
@section('title', 'Adicionar Chapa')
@section('content')
    <section id="conteudo" class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-header" style="background-color:#14ae5c;color:#ffffff">
                        Adicionar Chapa
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
                            <form action="{{ route('adicionarChapa.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome da Chapa</label>
                                            <input type="text" name="nome" class="form-control" id="nome"
                                                value="{{ old('nome') }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="escola_id" class="form-label">Escola</label>
                                            <select name="escola_id" class="form-control" id="escola_id">
                                                <option value="">Selecione</option>
                                                @foreach ($escolas as $escola)
                                                    <option value="{{ $escola->id }}" {{ old('escola_id') == $escola->id ? 'selected' : '' }}>
                                                        {{ $escola->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="diretor_id" class="form-label">Diretor</label>
                                    <select name="diretor_id" class="form-control" id="diretor_id">
                                        <option value="">Selecione a eleição primeiro</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="coordenador1_id" class="form-label">Coordenador 1</label>
                                    <select name="coordenador1_id" class="form-control" id="coordenador1_id">
                                        <option value="">Selecione a eleição primeiro</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="coordenador2_id" class="form-label">Coordenador 2</label>
                                    <select name="coordenador2_id" class="form-control" id="coordenador2_id">
                                        <option value="">Selecione a eleição primeiro</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const escolaSelect = document.getElementById('escola_id');
            const selects = {
                diretor: document.getElementById('diretor_id'),
                coordenador1: document.getElementById('coordenador1_id'),
                coordenador2: document.getElementById('coordenador2_id'),
            };
            // valores antigos, para manter a seleção quando a validação falha
            const antigos = {
                diretor: '{{ old('diretor_id') }}',
                coordenador1: '{{ old('coordenador1_id') }}',
                coordenador2: '{{ old('coordenador2_id') }}',
            };

            function preencher(select, candidatos, selecionado, vazio = 'Selecione') {
                select.innerHTML = `<option value="">${vazio}</option>`;
                candidatos.forEach(c => {
                    const opt = document.createElement('option');
                    opt.value = c.id;
                    opt.textContent = c.nome;
                    if (String(c.id) === String(selecionado)) opt.selected = true;
                    select.appendChild(opt);
                });
            }

            async function carregar(escolaId, manterAntigos) {
                if (!escolaId) {
                    Object.values(selects).forEach(s => preencher(s, [], '', 'Selecione a escola primeiro'));
                    return;
                }

                const resp = await fetch(`{{ url('/escolas') }}/${escolaId}/candidatos`, {
                    headers: { 'Accept': 'application/json' }
                });
                const candidatos = await resp.json();

                const diretores = candidatos.filter(c => c.cargo === 'diretor');
                const coordenadores = candidatos.filter(c => c.cargo === 'coordenador');

                preencher(selects.diretor, diretores, manterAntigos ? antigos.diretor : '');
                preencher(selects.coordenador1, coordenadores, manterAntigos ? antigos.coordenador1 : '');
                preencher(selects.coordenador2, coordenadores, manterAntigos ? antigos.coordenador2 : '');
            }

            escolaSelect.addEventListener('change', () => carregar(escolaSelect.value, false));

            // se voltou de um erro de validação, recarrega já com a escola escolhida
            if (escolaSelect.value) carregar(escolaSelect.value, true);
        });
    </script>
@endsection