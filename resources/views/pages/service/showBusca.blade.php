@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.service.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see update your details and manage your account'),
        'class' => 'col-lg-7'
    ])   
  
    <div class="col-xl-12 order-xl-1 mt--7">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="my-0">@php if ($providers['nomeFantasia'] == '') { $providers['nomeFantasia'] = $providers['razaoSocial'];} @endphp {{ $providers['nomeFantasia'] }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('provider.store') }}" autocomplete="off">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">@lang('Provider information')</h6>
                    <input type="hidden" name="nomeFantasia" value="{{ $providers['nomeFantasia'] }}" >

                    <div class="pl-lg-4">
                        <div class="row">
                            
                          <div class="col-4 form-group{{ $errors->has('razaoSocial') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-razaoSocial">@lang('Razao Social')</label>
                              <input type="text" disabled name="razaoSocial" id="input-razaoSocial" size="50px" class="form-control form-control-alternative{{ $errors->has('razaoSocial') ? ' is-invalid' : '' }}" value="{{ $providers['razaoSocial'] }}" required autofocus>
                              <input type="hidden" name="razaoSocial" value="{{ $providers['razaoSocial'] }}" >
                              @if ($errors->has('razaoSocial'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('razaoSocial') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="col-3 form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-cnpj">@lang('CNPJ')</label>
                            <input type="text" name="cnpj" disabled id="input-cnpj" class="cnpj form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" value="{{ $providers['cnpj'] }}" required>
                            <input type="hidden" name="cnpj" value="{{ $providers['cnpj'] }}" >

                            @if ($errors->has('cnpj'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cnpj') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-telefone">@lang('Phone')</label>
                              <input type="telefone" name="telefone" id="input-telefone" class="telefone form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" value="{{ $providers['telefone'] }}" required>

                              @if ($errors->has('telefone'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('telefone') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('matrizFilial') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="matrizFilial">@lang('Matriz ou  Filial')</label>
                              <input type="text" disabled name="matrizFilial" id="input-matrizFilial" class="form-control form-control-alternative{{ $errors->has('matrizFilial') ? ' is-invalid' : '' }}" value="{{ $providers['matrizFilial'] }}" required>
                              <input type="hidden" name="matrizFilial" value="{{ $providers['matrizFilial'] }}" >

                              @if ($errors->has('matrizFilial'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('matrizFilial') }}</strong>
                                  </span>
                              @endif
                          </div>

                        </div>

                        <div class="row">
                            
                          <div class="col-4 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-email">@lang('Email')</label>
                              <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $providers['email'] }}" >
                              <input type="hidden" name="email" value="{{ $providers['email'] }}" >
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="col-3 form-group{{ $errors->has('dataFundacao') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-dataFundacao">@lang('Fundation date')</label>
                            <input type="data" name="dataFundacao" disabled id="input-dataFundacao" class="form-control form-control-alternative{{ $errors->has('dataFundacao') ? ' is-invalid' : '' }}" value="{{ $providers['dataFundacao'] }}" required>
                            <input type="hidden" name="dataFundacao" value="{{ $providers['dataFundacao'] }}" >
                            @if ($errors->has('dataFundacao'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dataFundacao') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('mei') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="mei">@lang('MEI')</label>
                            <input type="hidden" name="mei" value="{{ $providers['mei'] }}" >
                            <select disabled name="mei" id="mei"class="form-control form-control-alternative{{ $errors->has('mei') ? ' is-invalid' : '' }}" required>
                                @if ($providers['mei'] == '' )
                                    <option value='{{ $providers['mei'] }}' selected>Não</option>
                                    @else
                                    <option value='True'>Sim</option>
                                @endif
                            </select>

                                @if ($errors->has('mei'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mei') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('porte') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-porte">@lang('Porte')</label>
                              <input disabled type="text" name="porte" id="input-porte" class="form-control form-control-alternative{{ $errors->has('porte') ? ' is-invalid' : '' }}" value="{{ $providers['porte'] }}" required>
                              <input type="hidden" name="porte" value="{{ $providers['porte'] }}" >
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
                              <input type="hidden" name="simplesNacional" value="{{ $providers['simplesNacional'] }}" >
                              <select name="simplesNacional" disabled id="simplesNacional"class="form-control form-control-alternative{{ $errors->has('simplesNacional') ? ' is-invalid' : '' }}" required>
                                  @if ($providers['simplesNacional'] == true )
                                      <option value='{{ $providers['simplesNacional'] }}' selected>Sim</option>
                                      @else
                                      <option value='false'>Não</option>
                                  @endif
                              </select>

                                  @if ($errors->has('simplesNacional'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('simplesNacional') }}</strong>
                                      </span>
                                  @endif
                          </div>
                          <div class="col-1 form-group{{ $errors->has('situacao') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-situacao">@lang('Status')</label>
                            <input disabled type="text" name="situacao" id="input-situacao" class="form-control form-control-alternative{{ $errors->has('situacao') ? ' is-invalid' : '' }}" value="{{ $providers['situacao'] }}" required>
                            <input type="hidden" name="situacao" value="{{ $providers['situacao'] }}" >
                            @if ($errors->has('situacao'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('situacao') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="col-3 form-group{{ $errors->has('estado_id') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-state">@lang('State')</label>
                              <input type="hidden" name="estado_id" value="{{ $providers['estado_id'] }}" >
                              <select disabled name="estado_id" id="estado_id"class="form-control form-control-alternative{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" required>
                                  <option value=''>Selecione</option>
                                  @foreach ($estados as $estado )
                                      @if($estado->id == $providers['estado_id'])
                                      <option value='{{ $estado->id }}' selected>{{ $estado->nome }}</option>
                                      @endif
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
                              <input type="hidden" name="cidade_id" value="{{ $providers['cidade_id'] }}" >
                              <select disabled name="cidade_id" id="cidade_id"class="form-control form-control-alternative{{ $errors->has('cidade_id') ? ' is-invalid' : '' }}" required>
                                  <option value="">Selecione</option>
                                  
                              <script>
                                

                                  // Get the pacient citys selected
                                  $(document).ready(function () 
                                  {
                                      var input_cidade_id = "<?php echo $providers['cidade_id']; ?>";
                                      var id_estado = "<?php echo $providers['estado_id']; ?>";
                                      console.log(id_estado);
                                      showCidades(); //Calling the function to display data.
                                      /* Display the data table from the database */
                                      function showCidades()
                                      {
                                          $.ajax(
                                              {
                                                  type: "GET",
                                                  url: "/cidades_show/"+id_estado,
                                                  dataType: "json",
                                                  success: function (response) 
                                                  {
                                                      console.log(input_cidade_id);
                                                      $('#cidade_id').html("");
                                                      $.each(response.cidades, function (key, cidade) 
                                                      { 
                                                        
                                                          if(input_cidade_id == cidade.id)
                                                          {
                                                              $('#cidade_id').append
                                                              (
                                                                  
                                                                  '<option value='+cidade.id+' selected>'+cidade.nome+'</option>'
                                                              );
                                                          }else
                                                          {
                                                              $('#cidade_id').append
                                                              (
                                                                  
                                                                  '<option value='+cidade.id+'>'+cidade.nome+'</option>'
                                                              );
                                                          }
                                                      });
                                                  }
                                              });
                                      }
                                  })

      

                              </script>
                              </select>

                              @if ($errors->has('city_id'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors -> first('city_id') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-cep">@lang('Cep')</label>
                              <input type="hidden" name="cep" value="{{ $providers['cep'] }}" >
                              <input disabled type="text" name="cep" id="input-cep" value="{{ $providers['cep'] }}" class="cep form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" required>

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
                              <input type="hidden" name="endereco" value="{{ $providers['endereco'] }}" >
                              <input disabled type="text" name="endereco" id="input-endereco" value="{{ $providers['endereco'] }}" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" required>

                              @if ($errors->has('endereco'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('endereco') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-numero">@lang('Number')</label>
                              <input type="hidden" name="numero" value="{{ $providers['numero'] }}" >
                              <input disabled type="text" name="numero" id="input-numero" value="{{ $providers['numero'] }}" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" required>

                              @if ($errors->has('numero'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('numero') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="col-2 form-group{{ $errors->has('complemento') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input-complemento">@lang('Complemento')</label>
                              <input type="hidden" name="complemento" value="{{ $providers['complemento'] }}" >
                              <input type="text" name="complemento" id="input-complemento" value="{{ $providers['complemento'] }}" class="form-control form-control-alternative{{ $errors->has('complemento') ? ' is-invalid' : '' }}" >

                              @if ($errors->has('complemento'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('complemento') }}</strong>
                                  </span>
                              @endif
                          </div>
                          
                                
                        </div>

                          <div class="text-center">
                              <button type="submit" class="btn btn-success mt-4">@lang('Save')</button>
                              {{-- <a href="/anaminese/create" class="btn btn-info mt-4">@lang('Next')</a> --}}
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>        
        @include('layouts.footers.auth')

         <script>
            $(document).ready(function(){
               $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
               $('.telefone').mask('(00) 0000-0000');
               $('.cep').mask('00000-000');
            });
        </script>
</div>
  
   
@endsection











