@extends('dashboard.corpo')

@section('title', 'Cadastro de Enfermeiras')

@section('content')

    <body>
        <form method="post" action="{{ route('storeEnfermeira') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" @if(!@empty($id))
                
           value="{{$id}}"@endif/>

            <br>
            <div class="container">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Cadastro Enfermeiras</h5>
                        </div>
                        <div class="card-body">
                           
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nomeEnfermeira">Nome</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="nomeEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control"  @if(!@empty($enfermeiras))
                
                                            value="{{$enfermeiras->nomeEnfermeira}}"@endif id="nomeEnfermeira" name="nomeEnfermeira" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="dNascimentoEnfermeira">Data de Nascimento</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="dNascimentoEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="date" class="form-control"  @if(!@empty($enfermeiras))
                
                                            value="{{$enfermeiras->dNascimentoEnfermeira}}"@endif id="dNascimentoEnfermeira" name="dNascimentoEnfermeira" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="sexoEnfermeira">Sexo</label>
                                    <div class="col-sm-10">
                                        <select name="sexoEnfermeira" id="sexoEnfermeira" class="select2 form-select" data-allow-clear="true" required>
                                            <option value="">Selecione</option>
                                            <option value="Masculino" @if(!@empty($enfermeiras) && $enfermeiras->sexoEnfermeira == 'Masculino') selected @endif>Masculino</option>
                                            <option value="Feminino" @if(!@empty($enfermeiras) && $enfermeiras->sexoEnfermeira == 'Feminino') selected @endif>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="telefoneEnfermeira">Telefone</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="telefoneEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control telefone" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->telefoneEnfermeira}}"@endif id="telefoneEnfermeira" name="telefoneEnfermeira" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="corem">COREM/UF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="corem" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->corem}}"@endif id="corem" name="corem" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cpfEnfermeira">CPF</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cpfEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control  cpf" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->cpfEnfermeira}}"@endif  id="cpfEnfermeira" name="cpfEnfermeira"/>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="enderecoEnfermeira">Endereço</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="enderecoEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->enderecoEnfermeira}}"@endif id="enderecoEnfermeira" name="enderecoEnfermeira"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="cepEnfermeira">CEP</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="cepEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control cep" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->cepEnfermeira}}"@endif id="cepEnfermeira" name="cepEnfermeira"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="maeEnfermeira">Nome Mãe</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="maeEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->maeEnfermeira}}"@endif id="maeEnfermeira" name="maeEnfermeira"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="paiEnfermeira">Nome Pai</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="paiEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->paiEnfermeira}}"@endif id="paiEnfermeira" name="paiEnfermeira"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="dnEnfermeira">DN</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="dnEnfermeira" class="input-group-text"><i
                                                    ></i></span>
                                            <input type="text" class="form-control" @if(!@empty($enfermeiras))
                                            value="{{$enfermeiras->dnEnfermeira}}"@endif id="dnEnfermeira" name="dnEnfermeira"/>
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
