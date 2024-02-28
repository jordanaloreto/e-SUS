@extends('dashboard.corpo')

@section('title', 'Cadastro de Paciente')

@section('content')

    <body>
        <form method="post" action="{{ route('storePaciente') }}" enctype="multipart/form-data">
            @csrf
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
                                            <input type="text" class="form-control" id="nomePaciente" name="nomePaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="dNascimentoPaciente">Data de Nascimento</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="dNascimentoPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="date" class="form-control" id="dNascimentoPaciente" name="dNascimentoPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="sexoPaciente">Sexo</label>
                                    <div class="col-sm-10">
                                      <select name="sexoPaciente" id="sexoPaciente" class="select2 form-select" data-allow-clear="true">
                                        <option value="">Selecione</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                      </select>
                                    </div>
                                  </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cpfPaciente">CPF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cpfPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control  cpf" id="cpfPaciente" name="cpfPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="susPaciente">SUS</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="susPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" id="susPaciente" name="susPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="telefonePaciente">Telefone</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="telefonePaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control telefone" id="telefonePaciente" name="telefonePaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="enderecoPaciente">Endereço</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="enderecoPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" id="enderecoPaciente" name="enderecoPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cepPaciente">CEP</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cepPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control cep" id="cepPaciente" name="cepPaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="maePaciente">Nome Mãe</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="maePaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" id="maePaciente" name="maePaciente"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="paiPaciente">Nome Pai</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="paiPaciente" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" id="paiPaciente" name="paiPaciente"/>
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
