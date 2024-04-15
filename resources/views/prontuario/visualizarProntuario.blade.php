@extends('dashboard.corpo')

@section('title', 'Visualização de Prontuário')

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Visualização de Prontuário</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Paciente</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->nomePaciente }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Médico</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->nomeMedico }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Enfermeira</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->nomeEnfermeira }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Diagnóstico</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->diagnostico }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Remédios em Uso</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->remedios }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tratamento</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->tratamento }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">História Progressa</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->historia }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Antecedentes</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->antecedentes }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Exame Físico</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->exameFisico }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Local Exames</label>
                    <div class="col-sm-10">
                        <p>{{ $prontuario->localExames }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Exames</label>
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

@endsection
