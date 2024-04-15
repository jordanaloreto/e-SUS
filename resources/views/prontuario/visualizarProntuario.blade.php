@extends('dashboard.corpo')

@section('title', 'Visualização de Prontuário')

@section('content')

    <body>
        <form method="post" action="{{ route('editarProntuario', ['id' => $prontuario->id]) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id"
                value="{{ $prontuario->id }}" />

            <br>
            <div class="container">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Visualização de Prontuário</h5>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="pacienteSelecionado">Paciente</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->nomePaciente }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="medicoSelecionado">Médico</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->nomeMedico }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="enfermeiraSelecionado">Enfermeira</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->nomeEnfermeira }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="diagnostico">Diagnóstico</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->diagnostico }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="remedios">Remédios em Uso</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->remedios }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tratamento">Tratamento</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->tratamento }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="historia">História Progressa</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->historia }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="antecedentes">Antecedentes</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->antecedentes }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="exameFisico">Exame Físico</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->exameFisico }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="localExames">Local Exames</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->localExames }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="exames">Exames</label>
                                <div class="col-sm-10">
                                    <p>{{ $prontuario->exames }}</p>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <!-- Botão para voltar -->
                                    <a href="{{ route('listagemProntuario') }}" class="btn btn-primary">Voltar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>

@endsection
