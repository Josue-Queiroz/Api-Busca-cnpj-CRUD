@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => __('Nova empresa'),
    'description' => __('Insira dos os campos abaixo para finalizar o novo cadastro!'),
    'class' => 'col-lg-12'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('enterprise.add.show') }}" autocomplete="off">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">

                                <div class="nav-wrapper">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item" id="nav-1">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                                data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                                aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                                    class="ni ni-badge mr-2"></i>Dados <i class="ni ni-bold-right mr-2"> </i></a>
                                        </li>
                                        <li class="nav-item" id="nav-2">
                                            <a class="nav-link mb-sm-3 mb-md-0 disabled" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false"><i class="ni ni-pin-3 mr-2"></i>Endereço <i class="ni ni-bold-right mr-2"> </i></a>
                                        </li>
                                        <li class="nav-item" id="nav-3">
                                            <a class="nav-link mb-sm-3 mb-md-0 disabled" id="tabs-icons-text-3-tab" data-toggle="tab"
                                                href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                                aria-selected="false"><i class="ni ni-tag mr-2"></i>Atividades</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                                aria-labelledby="tabs-icons-text-1-tab">
                                                <label for="cnpj">CNPJ*</label>
                                                <input class="cnpj form-control form-control-alternative" name="cnpj"
                                                    onblur="pesquisacnpj(this.value);" id="cnpj" required type="text"
                                                    value="{{ old('cnpj') }}">
                                                <br />
                                                <label for="razao_social">Razão Social*</label>
                                                <input class="form-control form-control-alternative" name="razao_social"
                                                    id="razao_social" type="text" required
                                                    value="{{ old('razao_social') }}">
                                                <br />
                                                <label for="name">Nome Fantasia</label>
                                                <input class="form-control form-control-alternative" name="name" id="name"
                                                    type="text" value="{{ old('name') }}">
                                                <br />
                                                <label for="email">E-mail*</label>
                                                <input class="form-control form-control-alternative" name="email" id="email"
                                                    type="email" value="{{ old('email') }}" required>
                                                <br />
                                                <label for="inscricao_municipal">Inscrição Municipal*</label>
                                                <input class="form-control form-control-alternative"
                                                    name="inscricao_municipal" id="inscricao_municipal" type="text" required
                                                    value="{{ old('inscricao_municipal') }}">
                                                <br />
                                                <label for="inscricao_estadual">Inscrição Estadual</label>
                                                <input class="form-control form-control-alternative"
                                                    name="inscricao_estadual" id="inscricao_estadual" type="text"
                                                    value="{{ old('inscricao_estadual') }}">

                                            </div>

                                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                                aria-labelledby="tabs-icons-text-2-tab">

                                                <label for="cep">CEP*</label>
                                                <input class="form-control form-control-alternative" name="cep" id="cep"
                                                    type="text" required value="{{ old('cep') }}"
                                                    onblur="pesquisacep(this.value);">
                                                <br />
                                                <label for="cidade">Cidade*</label>
                                                <input class="form-control form-control-alternative" name="cidade"
                                                    id="cidade" type="text" required value="{{ old('cidade') }}">
                                                <br />
                                                <label for="logradouro">Logradouro*</label>
                                                <input class="form-control form-control-alternative" name="Logradouro"
                                                    id="rua" type="text" required value="{{ old('Logradouro') }}">
                                                <br />
                                                <label for="numero">Número*</label>
                                                <input class="form-control form-control-alternative" name="number"
                                                    id="numero" type="text" required value="{{ old('number') }}">
                                                <br />
                                                <label for="telefone">Telefone*</label>
                                                <input class="form-control form-control-alternative" name="phone"
                                                    id="phone" required type="text" required value="{{ old('phone') }}">
                                                <br />
                                                <label for="complemento">Complemento</label>
                                                <input class="form-control form-control-alternative" name="complemento"
                                                    id="complemento" type="text" value="{{ old('complemento') }}">
                                                <br />
                                                <label for="bairro">Bairro*</label>
                                                <input class="form-control form-control-alternative" name="bairro"
                                                    id="bairro" type="text" required value="{{ old('bairro') }}">
                                                <br />
                                                <label for="uf">Estado*</label>
                                                <select class="form-control form-control-alternative" name="uf" id="uf"
                                                    required>
                                                    <option value="AC">Acre</option>
                                                    <option value="AL">Alagoas</option>
                                                    <option value="AP">Amapá</option>
                                                    <option value="AM">Amazonas</option>
                                                    <option value="BA">Bahia</option>
                                                    <option value="CE">Ceará</option>
                                                    <option value="DF">Distrito Federal</option>
                                                    <option value="ES">Espírito Santo</option>
                                                    <option value="GO">Goiás</option>
                                                    <option value="MA">Maranhão</option>
                                                    <option value="MT">Mato Grosso</option>
                                                    <option value="MS">Mato Grosso do Sul</option>
                                                    <option value="MG">Minas Gerais</option>
                                                    <option value="PA">Pará</option>
                                                    <option value="PB">Paraíba</option>
                                                    <option value="PR">Paraná</option>
                                                    <option value="PE">Pernambuco</option>
                                                    <option value="PI">Piauí</option>
                                                    <option value="RJ">Rio de Janeiro</option>
                                                    <option value="RN">Rio Grande do Norte</option>
                                                    <option value="RS">Rio Grande do Sul</option>
                                                    <option value="RO">Rondônia</option>
                                                    <option value="RR">Roraima</option>
                                                    <option value="SC">Santa Catarina</option>
                                                    <option value="SP">São Paulo</option>
                                                    <option value="SE">Sergipe</option>
                                                    <option value="TO">Tocantins</option>
                                                </select>
                                            </div>

                                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                                aria-labelledby="tabs-icons-text-3-tab">

                                                <label for="segmento">Seguimento*</label>
                                                <div class="row text-center">
                                                    <div class="col-md-4 custom-control custom-radio mb-3">
                                                        <input name="segmento" value="Produto" class="custom-control-input"
                                                            id="customRadio1" type="radio">
                                                        <label class="custom-control-label"
                                                            for="customRadio1">Produto</label>
                                                    </div>

                                                    <div class="col-md-4 custom-control custom-radio mb-3">
                                                        <input name="segmento" value="Serviço" class="custom-control-input"
                                                            id="customRadio2" type="radio">
                                                        <label class="custom-control-label"
                                                            for="customRadio2">Serviço</label>
                                                    </div>

                                                    <div class="col-md-4 custom-control custom-radio mb-3">
                                                        <input name="segmento" value="Produto e Serviço"
                                                            class="custom-control-input" id="customRadio3" type="radio">
                                                        <label class="custom-control-label" for="customRadio3">Produto e
                                                            Serviço</label>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit"
                                                        class="btn btn-success mt-4">{{ __('Cadastrar') }}</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
