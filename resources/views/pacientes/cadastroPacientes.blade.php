@extends('dashboard.corpo')

@section('title', 'Cadastro de Paciente')

@section('content')

    <body>
        <form method="post" action="{{ route('storePaciente') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" @if(!@empty($id))
                
           value="{{$id}}"@endif/>

            <br>
            <div class="container">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Cadastro Paciente</h5>
                        </div>
                        <div class="card-body">
                           
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nomePaciente">Nome</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="nomePaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control"  @if(!@empty($pacientes))
                
                                            value="{{$pacientes->nomePaciente}}"@endif id="nomePaciente" name="nomePaciente" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="dNascimentoPaciente">Data de Nascimento</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="dNascimentoPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="date" class="form-control"  @if(!@empty($pacientes))
                
                                            value="{{$pacientes->dNascimentoPaciente}}"@endif id="dNascimentoPaciente" name="dNascimentoPaciente" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="sexoPaciente">Sexo</label>
                                    <div class="col-sm-10">
                                        <select name="sexoPaciente" id="sexoPaciente" class="select2 form-select" data-allow-clear="true" required>
                                            <option value="">Selecione</option>
                                            <option value="Masculino" @if(!@empty($pacientes) && $pacientes->sexoPaciente == 'Masculino') selected @endif>Masculino</option>
                                            <option value="Feminino" @if(!@empty($pacientes) && $pacientes->sexoPaciente == 'Feminino') selected @endif>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="telefonePaciente">Telefone</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="telefonePaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control telefone"maxlength="16" @if(!@empty($pacientes))
                                            value="{{$pacientes->telefonePaciente}}"@endif id="telefonePaciente" name="telefonePaciente" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cpfPaciente">CPF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cpfPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control  cpf" maxlength="14" @if(!@empty($pacientes))
                                            value="{{$pacientes->cpfPaciente}}"@endif  id="cpfPaciente" name="cpfPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="susPaciente">SUS</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="susPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($pacientes))
                                            value="{{$pacientes->susPaciente}}"@endif id="susPaciente" name="susPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="enderecoPaciente">Endereço</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="enderecoPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($pacientes))
                                            value="{{$pacientes->enderecoPaciente}}"@endif id="enderecoPaciente" name="enderecoPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cepPaciente">CEP</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cepPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control cep" maxlength="10" @if(!@empty($pacientes))
                                            value="{{$pacientes->cepPaciente}}"@endif id="cepPaciente" name="cepPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="maePaciente">Nome Mãe</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="maePaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($pacientes))
                                            value="{{$pacientes->maePaciente}}"@endif id="maePaciente" name="maePaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="paiPaciente">Nome Pai</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="paiPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($pacientes))
                                            value="{{$pacientes->paiPaciente}}"@endif id="paiPaciente" name="paiPaciente"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="checkboxes">Paciente faz parte deste Postinho</label>
                                    <div class="col-sm-10">
                                        <!-- Checkbox 1 -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="postinho" name="postinho" value="1" 
                                            @if(!@empty($pacientes) && $pacientes->postinho) checked @endif>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label" for="checkboxes">Passar o paciente para Escuta Inicial</label>
                                    <div class="col-sm-10">
                                        <!-- Checkbox 1 -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="escuta" name="escuta" value="1" 
                                            @if(!@empty($pacientes) && $pacientes->escuta) checked @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
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
