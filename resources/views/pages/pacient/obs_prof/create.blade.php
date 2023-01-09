@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.pacient.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see update your details and manage your account'),
        'class' => 'col-lg-7'
    ])   

<div class="container-fluid mt--7">
{{-- @dd($obsProfs) --}}
@if(isset($obsProfs))
  @foreach($obsProfs as $obsProf)
    @foreach ($pacients as $pacient )
    {{-- Perfusoes added list --}}
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row pb-3 ">
                        <h3>@lang('Perfusion List')</h3>
                    </div>

                    @forelse ($pesperfusoes as $pe_perfusao)
                        <div id="list_perfusoes_btnDelete" class="row">
                            <form method="post" action="{{ route('peperfusao.delete') }}">
                                @csrf
                                @method('DELETE')
                                
                                <input type="hidden"  name="pe_perfusao_id"  value="{{ $pe_perfusao->id }}">
                                <button type="submit" class="btn btn-danger btn-sm my-1">x</button>
                                @if($pe_perfusao->desc == "Normal")
                                    <span class="badge badge-success my-1">{{ $pe_perfusao->desc }}, {{ $pe_perfusao->lado }}</span>
                                @else
                                    <span class="badge badge-warning my-1">{{ $pe_perfusao->desc }}, {{ $pe_perfusao->lado }}</span>
                                @endif
                            </form>
                        </div>
                    @empty
                        <div class="row">
                            <span class="badge badge-success my-1 ">@lang('Empty List')</span>
                        </div>
                    @endforelse
                   
                </div>
            </div>
    {{-- End list --}}
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            {{-- Header and Pacient name --}}
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">@lang('Professional Notes')</h3>
                </div>
                <div class="py-4">
                    <h3 class="text-muted">{{ $pacient->name }} {{ $pacient->surname }}</h3>
                </div>
            </div>
            {{-- End Header and Pacient name --}}
            {{-- Perfusoes form --}}
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>     
            
                <form method="POST" id="form_perfusao" action="{{ route('peperfusao.store', $obsProf->id ) }}"> 
                    <div class="row">
                        @csrf
                        
                        <div class="col-4 form-group">
                            <input type="hidden" id="pacient_id" name="pacient_id" value="{{ $pacient->id }}">
                            <label class="" for="perfusao_id">@lang('Perfusion')</label>
                            <select name="perfusao_id" id="perfusao_id" class="form-control form-control-alternative{{ $errors->has('perfusao_id') ? ' is-invalid' : '' }}" required>
                                <option value="">@lang('Select')</option>
                                @foreach ($perfusoes as $perfusao )
                                <option value="{{ $perfusao->id }}">{{ $perfusao->desc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4 form-group">
                            <label class="" for="">@lang('Feets')</label>
                            <select name="pe_id" id="pe_id" class="form-control form-control-alternative{{ $errors->has('pe_id') ? ' is-invalid' : '' }}" required>
                                <option value="">@lang('Select')</option>
                                @foreach ($pes as $pe )
                                <option value="{{ $pe->id }}">{{ $pe->lado }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2 form-group" style="padding-top: 35px;">
                            <button class="btn btn-success" id="button_add_perfusao"  type="submit">@lang('Add')</button>
                        </div>
                    </div>
                </form>
            {{-- End Perfusao form --}}
                    
                    
                <hr class="my-4"/>
                
                <form method="post" action="{{ route('obsProf.update', $obsProf->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- @dd($pacient->id) --}}
                        <input type="hidden" id="pacient_id" name="pacient_id" value="{{ $pacient->id }}">
                    
                        <div class="col-4 form-group{{ $errors->has('pressaoPD') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-pressaoPD">@lang('Pressão Pé Dir.')<h6>Segundos</h6></label>
                            <input type="text" name="pressaoPD" id="input-pressaoPD" class="form-control form-control-alternative{{ $errors->has('pressaoPD') ? ' is-invalid' : '' }}" value="{{ $obsProf->pressaoPD }}" required>
                            
                            @if ($errors->has('pressaoPD'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pressaoPD') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-4 form-group{{ $errors->has('pressaoPE') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-pressaoPE">@lang('Pressão Pé Esq.')<h6>Segundos</h6></label>
                            <input type="text" name="pressaoPE" id="input-pressaoPE" class="form-control form-control-alternative{{ $errors->has('pressaoPE') ? ' is-invalid' : '' }}" value="{{ $obsProf->pressaoPE }}" required>
                            @if ($errors->has('pressaoPE'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pressaoPE') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 form-group{{ $errors->has('monofilamentoPD') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-monofilamentoPD">@lang('Right foot monofilament test PD')</label>
                            <input type="text" name="monofilamentoPD" id="input-monofilamentoPD" class="form-control form-control-alternative{{ $errors->has('monofilamentoPD') ? ' is-invalid' : '' }}" value="{{ $obsProf->monofilamentoPD }}" required>
                            
                            @if ($errors->has('monofilamentoPD'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('monofilamentoPD') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-6 form-group{{ $errors->has('monofilamentoPE') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-monofilamentoPE">@lang('Left foot monofilament test PE')</label>
                            <input type="text" name="monofilamentoPE" id="input-monofilamentoPE" class="form-control form-control-alternative{{ $errors->has('monofilamentoPE') ? ' is-invalid' : '' }}" value="{{ $obsProf->monofilamentoPE }}" required>
                            @if ($errors->has('monofilamentoPE'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('monofilamentoPE') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 form-group{{ $errors->has('dermatologicasPD') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-dermatologicasPD">@lang('Dermatological Pathology PD')</label>
                            <input type="text" name="dermatologicasPD" id="input-dermatologicasPD" class="form-control form-control-alternative{{ $errors->has('dermatologicasPD') ? ' is-invalid' : '' }}" value="{{ $obsProf->dermatologicasPD }}" required>
                            
                            @if ($errors->has('dermatologicasPD'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dermatologicasPD') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-6 form-group{{ $errors->has('dermatologicasPE') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-dermatologicasPE">@lang('Dermatological Pathology PE')</label>
                            <input type="text" name="dermatologicasPE" id="input-dermatologicasPE" class="form-control form-control-alternative{{ $errors->has('dermatologicasPE') ? ' is-invalid' : '' }}" value="{{ $obsProf->dermatologicasPE }}" required>
                            @if ($errors->has('dermatologicasPE'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dermatologicasPE') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-6 form-group{{ $errors->has('ungueaisPD') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-ungueaisPD">@lang('Nail Pathology PD')</label>
                            <input type="text" name="ungueaisPD" id="input-ungueaisPD" class="form-control form-control-alternative{{ $errors->has('ungueaisPD') ? ' is-invalid' : '' }}" value="{{ $obsProf->ungueaisPD }}" required>
                            
                            @if ($errors->has('ungueaisPD'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ungueaisPD') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-6 form-group{{ $errors->has('ungueaisPE') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-ungueaisPE">@lang('Nail Pathology PE')</label>
                            <input type="text" name="ungueaisPE" id="input-patologiaUngueaisPE" class="form-control form-control-alternative{{ $errors->has('ungueaisPE') ? ' is-invalid' : '' }}" value="{{ $obsProf->ungueaisPE }}" required>
                            @if ($errors->has('ungueaisPE'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ungueaisPE') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="procedimentoProf">@lang('Professional Procedure')</label>
                        <input  class="form-control" type="textarea" name="procedimentoProf" id="procedimentoProf" rows="4" cols="8" value="{{ $obsProf->procedimentoProf }}">
                    </div>

                    <hr class="my-4"/>                                

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">@lang('Update')</button>
                    </div>
                
                </form>
                
            </div>  
        </div>
    </div>
    </div>
    @endforeach
  @endforeach
@else
  @foreach ($pacients as $pacient )
  {{-- Perfusoes added list --}}
  <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row pb-3 ">
                        <h3>@lang('Perfusion List')</h3>
                    </div>

                    @forelse ($pesperfusoes as $pe_perfusao)
                        <div id="list_perfusoes_btnDelete" class="row">
                            <form method="post" action="{{ route('peperfusao.delete') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden"  name="pe_perfusao_id"  value="{{ $pe_perfusao->id }}">
                                <button type="submit" class="btn btn-danger btn-sm my-1">x</button>
                                @if($pe_perfusao->desc == "Normal")
                                    <span class="badge badge-success my-1">{{ $pe_perfusao->desc }}, {{ $pe_perfusao->lado }}</span>
                                @else
                                    <span class="badge badge-warning my-1">{{ $pe_perfusao->desc }}, {{ $pe_perfusao->lado }}</span>
                                @endif
                            </form>
                        </div>
                    @empty
                        <div class="row">
                            <span class="badge badge-success my-1 ">@lang('Empty List')</span>
                        </div>
                    @endforelse
                
                </div>
            </div>
            {{-- End list --}}
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                {{-- Header and Pacient name --}}
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">@lang('Professional Notes')</h3>
                    </div>
                    <div class="py-4">
                        <h3 class="text-muted">{{ $pacient->name }} {{ $pacient->surname }}</h3>
                    </div>
                </div>
                {{-- End Header and Pacient name --}}
                {{-- Perfusoes form --}}
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>     
                
                    <form method="POST" id="form_perfusao" action="{{ route('peperfusao.store') }}"> {{--  --}}
                        <div class="row">
                            @csrf
                            
                            <div class="col-4 form-group">
                            <input type="hidden" id="pacient_id" name="pacient_id" value="{{ $pacient->id }}">
                                <label class="" for="perfusao_id">@lang('Perfusion')</label>
                                <select name="perfusao_id" id="perfusao_id" class="form-control form-control-alternative{{ $errors->has('perfusao_id') ? ' is-invalid' : '' }}" required>
                                    <option value="">@lang('Select')</option>
                                    @foreach ($perfusoes as $perfusao )
                                    <option value="{{ $perfusao->id }}">{{ $perfusao->desc }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 form-group">
                                <label class="" for="">@lang('Feets')</label>
                                <select name="pe_id" id="pe_id" class="form-control form-control-alternative{{ $errors->has('pe_id') ? ' is-invalid' : '' }}" required>
                                    <option value="">@lang('Select')</option>
                                    @foreach ($pes as $pe )
                                    <option value="{{ $pe->id }}">{{ $pe->lado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-2 form-group" style="padding-top: 35px;">
                                <button class="btn btn-success" id="button_add_perfusao"  type="submit">@lang('Add')</button>
                            </div>
                        </div>
                    </form>
                    {{-- End Perfusao form --}}
                        
                        
                    <hr class="my-4"/>
                    
                    <form method="post" action="{{ route('obsProf.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            {{-- @dd($pacient->id) --}}
                            <input type="hidden" id="pacient_id" name="pacient_id" value="{{ $pacient->id }}">
                        
                            <div class="col-4 form-group{{ $errors->has('pressaoPD') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-pressaoPD">@lang('Pressão Pé Dir.')<h6>Segundos</h6></label>
                                <input type="text" name="pressaoPD" id="input-pressaoPD" class="form-control form-control-alternative{{ $errors->has('pressaoPD') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: 12 ')" required>
                                
                                @if ($errors->has('pressaoPD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pressaoPD') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-4 form-group{{ $errors->has('pressaoPE') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-pressaoPE">@lang('Pressão Pé Esq.')<h6>Segundos</h6></label>
                                <input type="text" name="pressaoPE" id="input-pressaoPE" class="form-control form-control-alternative{{ $errors->has('pressaoPE') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: 12')" required>
                                @if ($errors->has('pressaoPE'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pressaoPE') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 form-group{{ $errors->has('monofilamentoPD') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-monofilamentoPD">@lang('Right foot monofilament test PD')</label>
                                <input type="text" name="monofilamentoPD" id="input-monofilamentoPD" class="form-control form-control-alternative{{ $errors->has('monofilamentoPD') ? ' is-invalid' : '' }}" placeholder="" required>
                                
                                @if ($errors->has('monofilamentoPD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monofilamentoPD') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-6 form-group{{ $errors->has('monofilamentoPE') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-monofilamentoPE">@lang('Left foot monofilament test PE')</label>
                                <input type="text" name="monofilamentoPE" id="input-monofilamentoPE" class="form-control form-control-alternative{{ $errors->has('monofilamentoPE') ? ' is-invalid' : '' }}" placeholder="" required>
                                @if ($errors->has('monofilamentoPE'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monofilamentoPE') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 form-group{{ $errors->has('dermatologicasPD') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-dermatologicasPD">@lang('Dermatological Pathology PD')</label>
                                <input type="text" name="dermatologicasPD" id="input-dermatologicasPD" class="form-control form-control-alternative{{ $errors->has('dermatologicasPD') ? ' is-invalid' : '' }}" placeholder="" required>
                                
                                @if ($errors->has('dermatologicasPD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dermatologicasPD') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-6 form-group{{ $errors->has('dermatologicasPE') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-dermatologicasPE">@lang('Dermatological Pathology PE')</label>
                                <input type="text" name="dermatologicasPE" id="input-dermatologicasPE" class="form-control form-control-alternative{{ $errors->has('dermatologicasPE') ? ' is-invalid' : '' }}" placeholder="" required>
                                @if ($errors->has('dermatologicasPE'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dermatologicasPE') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 form-group{{ $errors->has('ungueaisPD') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-ungueaisPD">@lang('Nail Pathology PD')</label>
                                <input type="text" name="ungueaisPD" id="input-ungueaisPD" class="form-control form-control-alternative{{ $errors->has('ungueaisPD') ? ' is-invalid' : '' }}" placeholder="" required>
                                
                                @if ($errors->has('ungueaisPD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ungueaisPD') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-6 form-group{{ $errors->has('ungueaisPE') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-ungueaisPE">@lang('Nail Pathology PE')</label>
                                <input type="text" name="ungueaisPE" id="input-patologiaUngueaisPE" class="form-control form-control-alternative{{ $errors->has('ungueaisPE') ? ' is-invalid' : '' }}" placeholder="" required>
                                @if ($errors->has('ungueaisPE'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ungueaisPE') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="procedimentoProf">@lang('Professional Procedure')</label>
                            <input  class="form-control" type="textarea" name="procedimentoProf" id="procedimentoProf" rows="4" cols="8">
                        </div>

                        <hr class="my-4"/>                                

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">@lang('Save')</button>
                        </div>
                    
                    </form>
                    
                </div>  
            </div>
        </div>
  </div>
  @endforeach
@endif
</div>
<div>
@include('layouts.footers.auth')
</div> 
   
@endsection