@extends('dashboard.corpo')

@section('title', 'Visualização de Prontuário')

@section('content')

<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Informações do Paciente, Médico e Enfermeira</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label">Paciente:</label>
                            <p>{{ $prontuario->nomePaciente }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Médico:</label>
                            <p>{{ $prontuario->nomeMedico }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Enfermeira:</label>
                            <p>{{ $prontuario->nomeEnfermeira }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Outras Informações</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label">Diagnóstico:</label>
                            <p>{{ $prontuario->diagnostico }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Remédios em Uso:</label>
                            <p>{{ $prontuario->remedios }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Tratamento:</label>
                            <p>{{ $prontuario->tratamento }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">História Progressa:</label>
                            <p>{{ $prontuario->historia }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Antecedentes:</label>
                            <p>{{ $prontuario->antecedentes }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Exame Físico:</label>
                            <p>{{ $prontuario->exameFisico }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Local Exames:</label>
                            <p>{{ $prontuario->localExames }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Exames:</label>
                            <p>{{ $prontuario->exames }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('listagemProntuario') }}" class="btn btn-primary float-end">Voltar</a>
            </div>
        </div>
    </div>

@endsection
