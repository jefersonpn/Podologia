@extends('layouts.app')

@section('content')
    @include('pages.product.partials.header')

    <div class="container-fluid mt--7">
        <div class="row pb-5">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">

                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Products Register')</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">@lang('Category')</h6>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-4 form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">@lang('CNPJ')</label>
                                        <input type="text" name="cnpj" id="cnpj" class="cnpj form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" placeholder="00.000.000/0000-00" required autofocus>

                                        @if ($errors->has('cnpj'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cnpj') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 mt-2">
                                    <button type="submit" class="btn btn-success mt-4">@lang('Search')</button>
                                    </div>
                                </div>
                                <hr class="my-4"/>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Mannual Provider Register')</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">@lang('Manual Provider Register')</h6>
                            <div class="pl-lg-4">
                                <div class="row">

                                    <div class="col-3 form-group{{ $errors->has('nomeFantasia') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nomeFantasia">@lang('Nome Fantasia')</label>
                                        <input type="text" name="nomeFantasia" id="input-nomeFantasia" size="50px" class="form-control form-control-alternative{{ $errors->has('nomeFantasia') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('nomeFantasia'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nomeFantasia') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-3 form-group{{ $errors->has('razaoSocial') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-razaoSocial">@lang('Razao Social')</label>
                                        <input type="text" name="razaoSocial" id="input-razaoSocial" size="50px" class="form-control form-control-alternative{{ $errors->has('razaoSocial') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('razaoSocial'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('razaoSocial') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-3 form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cnpj">@lang('CNPJ')</label>
                                        <input type="text" name="cnpj" id="input-cnpj" class="cnpj form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('cnpj'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cnpj') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-2 form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-telefone">@lang('Phone')</label>
                                        <input type="telefone" name="telefone" id="input-telefone" class="telefone form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('telefone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('telefone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-2 form-group{{ $errors->has('matrizFilial') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="matrizFilial">@lang('Matriz ou  Filial')</label>
                                        <select name="matrizFilial" id="matrizFilial"class="form-control form-control-alternative{{ $errors->has('matrizFilial') ? ' is-invalid' : '' }}" required>
                                            <option value='' selected>Selecione</option>
                                            <option value='MATRIZ'>Matriz</option>
                                            <option value='FILIAL'>Filial</option>
                                        </select>
                                    </div>

                                    <div class="col-3 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">@lang('Email')</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-2 form-group{{ $errors->has('dataFundacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dataFundacao">@lang('Fundation date')</label>
                                        <input type="data" name="dataFundacao" id="input-dataFundacao" class=" data form-control form-control-alternative{{ $errors->has('dataFundacao') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('dataFundacao'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dataFundacao') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-2 form-group{{ $errors->has('mei') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="mei">@lang('MEI')</label>
                                        <select name="mei" id="mei"class="form-control form-control-alternative{{ $errors->has('mei') ? ' is-invalid' : '' }}" required>
                                            <option value='' selected>Selecione</option>
                                            <option value=''>Não</option>
                                            <option value='true'>Sim</option>
                                        </select>

                                            @if ($errors->has('mei'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mei') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="col-2 form-group{{ $errors->has('porte') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-porte">@lang('Porte')</label>
                                        <select name="porte" id="porte"class="form-control form-control-alternative{{ $errors->has('porte') ? ' is-invalid' : '' }}" required>
                                            <option value='' selected>Selecione</option>
                                            <option value='Grande'>Grande</option>
                                            <option value='Medio'>Médio</option>
                                            <option value='Pequeno'>Pequeno</option>
                                        </select>
                                        @if ($errors->has('porte'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('porte') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <hr class="my-4"/>

                                <div class="row">

                                    <div class="col-2 form-group{{ $errors->has('simplesNacional') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="simplesNacional">@lang('Simples Nacional')</label>
                                        <select name="simplesNacional" id="simplesNacional"class="form-control form-control-alternative{{ $errors->has('simplesNacional') ? ' is-invalid' : '' }}" required>
                                                <option value='' selected >Selecione</option>
                                                <option value='1'>Sim</option>
                                                <option value='0'>Não</option>

                                        </select>

                                            @if ($errors->has('simplesNacional'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('simplesNacional') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-1 form-group{{ $errors->has('situacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-situacao">@lang('Status')</label>
                                        <select name="situacao" id="situacao"class="form-control form-control-alternative{{ $errors->has('situacao') ? ' is-invalid' : '' }}" required>
                                                <option value='' selected >Selecione</option>
                                                <option value='ATIVA'>ATIVA</option>
                                                <option value='DESATIVADA'>DESATIVADA</option>

                                        </select>
                                    </div>
                                    <div class="col-3 form-group{{ $errors->has('estado_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-state">@lang('State')</label>
                                        <select name="estado_id" id="estado_id"class="form-control form-control-alternative{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" required>
                                            <option value=''>Selecione</option>
                                            @foreach ($estados as $estado )
                                            <option value='{{ $estado->id }}'>{{ $estado->nome }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('estado_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('estado_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-3 form-group{{ $errors->has('cidade_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city_id">@lang('City')</label>
                                        <select name="cidade_id" id="cidade_id"class="form-control form-control-alternative{{ $errors->has('cidade_id') ? ' is-invalid' : '' }}" required>
                                            <option value="">Selecione</option>
                                        </select>

                                        @if ($errors->has('cidade_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors -> first('cidade_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-2 form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cep">@lang('Cep')</label>
                                        <input type="text" name="cep" id="input-cep" class="cep form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('cep'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-7 form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-endereco">@lang('Address')</label>
                                        <input type="text" name="endereco" id="input-endereco" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('endereco'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('endereco') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-2 form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-numero">@lang('Number')</label>
                                        <input type="text" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('numero'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-2 form-group{{ $errors->has('complemento') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-complemento">@lang('Complemento')</label>
                                        <input type="text" name="complemento" id="input-complemento" class="form-control form-control-alternative{{ $errors->has('complemento') ? ' is-invalid' : '' }}" >
                                        @if ($errors->has('complemento'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('complemento') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-4 form-group">
                                        <button type="submit" class="btn btn-success mt-4">@lang('Save')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}

                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
        <script>
            $(document).ready(function(){
               $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
               $('.telefone').mask('(00) 0000-0000');
               $('.cep').mask('00000-000');
               $('.data').mask('00/00/0000');
            });
        </script>

    </div>

@endsection









