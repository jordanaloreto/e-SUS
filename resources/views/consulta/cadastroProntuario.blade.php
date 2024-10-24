@extends('dashboard.corpo')

@section('title', 'Cadastro de Escuta Inicial')

@section('content')

    <body>
        <form method="post" action="{{ route('storeProntuario') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id"
                @if (!@empty($id)) value="{{ $id }}" @endif />

            <br>
            <div class="container">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Cadastro Prontuário</h5>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="pacienteSelecionado">Paciente</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="pacienteSelecionado" name="pacienteSelecionado">
                                        <option value="" disabled {{ $pacienteSelecionado ? '' : 'selected' }}>Selecione um paciente</option> 
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}" 
                                                {{ isset($pacienteSelecionado) && $pacienteSelecionado->id == $paciente->id ? 'selected' : '' }}>
                                                {{ $paciente->nomePaciente }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="medicoSelecionado">Médico</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="medicoSelecionado" name="medicoSelecionado">
                                        <option value="" disabled {{ $medicoSelecionado ? '' : 'selected' }}>Selecione um médico</option>
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}" 
                                                {{ isset($medicoSelecionado) && $medicoSelecionado->id == $medico->id ? 'selected' : '' }}>
                                                {{ $medico->nomeMedico }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="enfermeiraSelecionado">Enfermeira</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="enfermeiraSelecionado" name="enfermeiraSelecionado">
                                        <option value="" disabled {{ $enfermeiraSelecionada ? '' : 'selected' }}>Selecione uma enfermeira</option>
                                        @foreach ($enfermeiras as $enfermeira)
                                            <option value="{{ $enfermeira->id }}" 
                                                {{ isset($enfermeiraSelecionada) && $enfermeiraSelecionada->id == $enfermeira->id ? 'selected' : '' }}>
                                                {{ $enfermeira->nomeEnfermeira }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="diagnostico">Diagnóstico</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="diagnostico" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control diagnostico" 
                                            @if (!@empty($prontuario)) value="{{ $prontuario->diagnostico }}" @endif
                                            id="diagnostico" name="diagnostico" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="remedios">Remédios em Uso</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="remedios" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->remedios }}" @endif
                                            id="remedios" name="remedios" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tratamento">Tratamento</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="tratamento" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control tratamento" 
                                            @if (!@empty($prontuario)) value="{{ $prontuario->tratamento }}" @endif
                                            id="tratamento" name="tratamento" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="historia">História Progressa</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="historia" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->historia }}" @endif
                                            id="historia" name="historia" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="antecedentes">Antecedentes</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="antecedentes" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->antecedentes }}" @endif
                                            id="antecedentes" name="antecedentes" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="exameFisico">Exame Físico</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="exameFisico" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->exameFisico }}" @endif
                                            id="exameFisico" name="exameFisico" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="localExames">Local Exames</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="localExames" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->localExames }}" @endif
                                            id="localExames" name="localExames" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="exames">Exames</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="exames" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->exames }}" @endif
                                            id="exames" name="exames" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="queixa">Queixa Principal</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="queixa" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->queixa }}" @endif
                                            id="queixa" name="queixa" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="conduta">Conduta</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="conduta" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($prontuario)) value="{{ $prontuario->conduta }}" @endif
                                            id="conduta" name="conduta" />
                                    </div>
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


    </body>

@endsection
