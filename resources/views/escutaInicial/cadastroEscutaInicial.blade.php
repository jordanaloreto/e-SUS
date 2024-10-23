@extends('dashboard.corpo')

@section('title', 'Cadastro de Escuta Inicial')

@section('content')

    <body>
        <form method="post" action="{{ route('storeEscutaInicial') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id"
                @if (!@empty($id)) value="{{ $id }}" @endif />

            <br>
            <div class="container">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Cadastro Escuta Inicial</h5>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="pacienteSelecionado">Paciente</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="pacienteSelecionado" name="pacienteSelecionado">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->nomePaciente }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="medicoSelecionado">Médico</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="medicoSelecionado" name="medicoSelecionado">
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}">{{ $medico->nomeMedico }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="enfermeiraSelecionado">Enfermeira</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="enfermeiraSelecionado" name="enfermeiraSelecionado">
                                        @foreach ($enfermeiras as $enfermeira)
                                            <option value="{{ $enfermeira->id }}">{{ $enfermeira->nomeEnfermeira }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="peso">Peso</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control peso" id="peso" maxlength="6"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->peso }}" @endif
                                            id="peso" name="peso" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="altura">Altura</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control altura" id="altura" maxlength="4"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->altura }}" @endif
                                            id="altura" name="altura" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="imc">IMC</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control imc id="imc"" 
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->imc }}" @endif
                                            id="imc" name="imc" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="glicemia">Glicemia</label>
                                <div class="col-sm-10">
                                    <select name="glicemia" id="glicemia" class="select2 form-select" data-allow-clear="true" required>
                                        <option value="">Selecione</option>
                                        <option value="Não especificado" @if(!@empty($escutaInicial) && $escutaInicial->glicemia == 'Não especificado') selected @endif>Não especificado</option>
                                        <option value="Jejum" @if(!@empty($escutaInicial) && $escutaInicial->glicemia == 'Jejum') selected @endif>Jejum</option>
                                        <option value="pré-prandial" @if(!@empty($escutaInicial) && $escutaInicial->glicemia == 'pré-prandial') selected @endif>pré-prandial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="temperatura">Temperatura</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control temperatura" id="temperatura" maxlength="4"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->temperatura }}" @endif
                                            id="temperatura" name="temperatura" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="fc">FC</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control" id="fc"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->fc }}" @endif
                                            id="fc" name="fc" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="fr">FR</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control" id="fr" 
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->fr }}" @endif
                                            id="fr" name="fr" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="sat">SAT</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span  class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control" id="sat"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->sat }}" @endif
                                            id="sat" name="sat" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="problema">Problema</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control" id="problema"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->problema }}" @endif
                                            id="problema" name="problema" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="risco">Risco</label>
                                <div class="col-sm-10">
                                    <select name="risco" id="risco" class="select2 form-select" data-allow-clear="true" required>
                                        <option value="">Selecione</option>
                                        <option value="Azul" @if(!@empty($escutaInicial) && $escutaInicial->risco == 'Azul') selected @endif>Azul</option>
                                        <option value="Verde" @if(!@empty($escutaInicial) && $escutaInicial->risco == 'Verde') selected @endif>Verde</option>
                                        <option value="Amarelo" @if(!@empty($escutaInicial) && $escutaInicial->risco == 'Amarelo') selected @endif>Amarelo</option>
                                        <option value="Vermelho" @if(!@empty($escutaInicial) && $escutaInicial->risco == 'Vermelho') selected @endif>Vermelho</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                // Função para calcular o IMC
                function calcularIMC() {
                    // Captura os valores e remove espaços em branco
                    var peso = $('#peso').val().trim().replace('.', '').replace(',', '.');  // Remove separador de milhar, troca vírgula por ponto
                    var altura = $('#altura').val().trim().replace(',', '.');  // Troca vírgula por ponto
                    console.log('peso:', peso);
                    console.log('altura:', altura);
                    // Verifica se os valores estão vazios
                    if (peso === '' || altura === '') {
                        console.log('Campos de peso ou altura estão vazios');
                        $('#imc').val('');  // Limpa o campo IMC se os valores forem inválidos
                        return;
                    }
        
                    // Converte os valores para números
                    peso = parseFloat(peso);
                    altura = parseFloat(altura);
        
                    // Verifica se a conversão foi bem-sucedida
                    console.log('peso:', peso);
                    console.log('altura:', altura);
        
                    if (!isNaN(peso) && !isNaN(altura) && altura > 0) {
                        var imc = peso / (altura * altura);  // Calcula o IMC
                        $('#imc').val(imc.toFixed(2));  // Define o valor do campo IMC com duas casas decimais
                        console.log('imc:', imc);
                    } else {
                        $('#imc').val('');  // Limpa o campo IMC se os valores forem inválidos
                        console.log('Valores inválidos para peso ou altura');
                    }
                }
        
                // Recalcula o IMC toda vez que o valor do peso ou da altura mudar
                $('#peso, #altura').on('input', function() {
                    calcularIMC();
                });
        
                // Aplica as máscaras aos campos
                $('.altura').mask('0.00', {
                    reverse: true
                });
                $('.peso').mask('000.00', {
                    reverse: true
                });
            });
        </script>
        
        

    </body>

@endsection
