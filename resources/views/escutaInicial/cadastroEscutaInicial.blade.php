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
                                        <span id="peso" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control peso" maxlength="6"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->peso }}" @endif
                                            id="peso" name="peso" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="glicemia">Glicemia</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="glicemia" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control  cpf"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->glicemia }}" @endif
                                            id="glicemia" name="glicemia" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="altura">Altura</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="altura" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control altura" maxlength="4"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->altura }}" @endif
                                            id="altura" name="altura" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="fc">FC</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="fc" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->fc }}" @endif
                                            id="fc" name="fc" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="fr">FR</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="fr" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->fr }}" @endif
                                            id="fr" name="fr" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="problema">Problema</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="problema" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->problema }}" @endif
                                            id="problema" name="problema" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="risco">Risco</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="risco" class="input-group-text"><i></i></span>
                                        <input type="text" class="form-control"
                                            @if (!@empty($escutaInicial)) value="{{ $escutaInicial->risco }}" @endif
                                            id="risco" name="risco" />
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
