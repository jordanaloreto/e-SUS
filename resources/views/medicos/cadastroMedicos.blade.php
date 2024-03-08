@extends('dashboard.corpo')

@section('title', 'Cadastro de Paciente')

@section('content')

    <body>
        <form method="post" action="{{ route('storeMedico') }}" enctype="multipart/form-data">
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
                                    <label class="col-sm-2 col-form-label" for="nomeMedico">Nome</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="nomeMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control"  @if(!@empty($medicos))
                
                                            value="{{$medicos->nomeMedico}}"@endif id="nomeMedico" name="nomeMedico"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="sexoMedico">Sexo</label>
                                    <div class="col-sm-10">
                                      <select  @if(!@empty($medicos))
                                      value="{{$medicos->sexoMedico}}"@endif name="sexoMedico" id="sexoMedico" class="select2 form-select" data-allow-clear="true">
                                        <option value="">Selecione</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                      </select>
                                    </div>
                                  </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cpfMedico">CPF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cpfMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control  cpf" @if(!@empty($medicos))
                                            value="{{$medicos->cpfMedico}}"@endif  id="cpfMedico" name="cpfMedico"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="telefoneMedico">Telefone</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="telefoneMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control telefone" @if(!@empty($medicos))
                                            value="{{$medicos->telefoneMedico}}"@endif id="telefoneMedico" name="telefoneMedico"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="enderecoMedico">Endereço</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="enderecoMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($medicos))
                                            value="{{$medicos->enderecoMedico}}"@endif id="enderecoMedico" name="enderecoMedico"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cepMedico">CEP</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cepMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control cep" @if(!@empty($medicos))
                                            value="{{$medicos->cepMedico}}"@endif id="cepMedico" name="cepMedico"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="maeMedico">Nome Mãe</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="maeMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($medicos))
                                            value="{{$medicos->maeMedico}}"@endif id="maeMedico" name="maeMedico"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="paiMedico">Nome Pai</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="paiMedico" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($medicos))
                                            value="{{$medicos->paiMedico}}"@endif id="paiMedico" name="paiMedico"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="crm">CRM/UF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="crm" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($medicos))
                                            value="{{$medicos->crm}}"@endif id="crm" name="crm"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="dn">DN</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="dn" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($medicos))
                                            value="{{$medicos->dn}}"@endif id="dn" name="dn"/>
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
