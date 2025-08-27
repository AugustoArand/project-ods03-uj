<!-- resources/views/auth/onboarding.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Complete seu Perfil - Bem-vindo ao LibertAR!</h5>
                </div>

                <div class="card-body">
                    <p class="text-muted mb-4">Precisamos de algumas informações para personalizar sua experiência.</p>

                    <form method="POST" action="{{ route('onboarding.store') }}">
                        @csrf

                        <!-- Seção: Hábito de Fumar -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2">Sobre seu hábito de fumar</h6>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cigarros_por_dia_inicial" class="form-label">
                                        Cigarros por dia *
                                    </label>
                                    <input type="number" class="form-control"
                                           id="cigarros_por_dia_inicial" name="cigarros_por_dia_inicial"
                                           required min="1" max="100" value="{{ old('cigarros_por_dia_inicial') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tempo_fumando_anos" class="form-label">
                                        Tempo fumando (anos) *
                                    </label>
                                    <input type="number" class="form-control"
                                           id="tempo_fumando_anos" name="tempo_fumando_anos"
                                           required min="0" max="80" value="{{ old('tempo_fumando_anos') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Seção: Atividade Física -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2">Atividade Física</h6>

                            <div class="mb-3">
                                <label class="form-label">Pratica atividade física? *</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="pratica_atividade_fisica" id="atividade_sim"
                                               value="1" {{ old('pratica_atividade_fisica') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="atividade_sim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="pratica_atividade_fisica" id="atividade_nao"
                                               value="0" {{ old('pratica_atividade_fisica') == '0' ? 'checked' : 'checked' }}>
                                        <label class="form-check-label" for="atividade_nao">Não</label>
                                    </div>
                                </div>
                            </div>

                            <div id="atividade_fisica_campos" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="frequencia_semanal_exercicio" class="form-label">
                                            Dias por semana
                                        </label>
                                        <input type="number" class="form-control"
                                               id="frequencia_semanal_exercicio" name="frequencia_semanal_exercicio"
                                               min="1" max="7" value="{{ old('frequencia_semanal_exercicio') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tempo_exercicio_minutos" class="form-label">
                                            Minutos por sessão
                                        </label>
                                        <input type="number" class="form-control"
                                               id="tempo_exercicio_minutos" name="tempo_exercicio_minutos"
                                               min="1" value="{{ old('tempo_exercicio_minutos') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue com os outros campos... -->

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Completar Cadastro e Começar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const atividadeSim = document.getElementById('atividade_sim');
    const atividadeNao = document.getElementById('atividade_nao');
    const camposAtividade = document.getElementById('atividade_fisica_campos');

    function toggleCamposAtividade() {
        camposAtividade.style.display = atividadeSim.checked ? 'block' : 'none';
    }

    atividadeSim.addEventListener('change', toggleCamposAtividade);
    atividadeNao.addEventListener('change', toggleCamposAtividade);

    // Inicializar estado
    toggleCamposAtividade();
});
</script>
@endsection
