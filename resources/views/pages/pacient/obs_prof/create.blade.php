@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.pacient.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see update your details and manage your account'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
       
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
               {{-- Start --}}
               {{-- End --}}
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Professional Notes')</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/anaminese/store" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>
                            
                            <div class="pl-lg-4">
                                <div class="row justify-content-end">
                                    <div class="col-2 form-group p-0">
                                        <img class="ml-4 mt-2" style="width: 60px; height: auto; " src="{{ asset('images') }}/dorsal_pe_esq.png" alt="right foot">
                                        <br>
                                        <label class="btn btn-info mb-0 mt-4 ml-0">@lang('Left foot')</label>
                                    </div>

                                    <div class="col-2 form-group p-0">
                                        <img class="ml-4 mt-2" style="width: 60px; height: auto; " src="{{ asset('images') }}/dorsal_pe_dir.png" alt="right foot">
                                         <br>
                                        <label class="btn btn-info mb-0 mt-4 ml-1">@lang('Right foot')</label>
                                    </div>
                                    <div class="col-2 form-group p-0 mt-4">
                                        <img class="ml-4" style="width: 60px; height: auto; " src="{{ asset('images') }}/pe_esq.png" alt="right foot">
                                        <br>
                                        <label class="btn btn-info mb-0 mt-5 ml-2">@lang('Left foot')</label>
                                    </div>
                                    <div class="col-2 form-group p-0 mt-4">
                                        <img class="ml-4" style="width: 60px; height: auto; " src="{{ asset('images') }}/pe_dir.png" alt="right foot">
                                        <br>
                                        <label class="btn btn-info mb-0 mt-5 ml-0">@lang('Right foot')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row justify-content-start">
                                    
                                        <div class="col-3 form-group p-0">
                                            <label class="mr-9" for="">@lang('Perfusion')</label>
                                            <select name="perfusion" class="form-control form-control-alternative{{ $errors->has('perfusion') ? ' is-invalid' : '' }}" required>>
                                            
                                                    <option value="">@lang('Select')</option>
                                                @foreach ($perfusoes as $perfusao )
                                                    <option value="{{ $perfusao->id }}">{{ $perfusao->desc }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-9 form-group p-0 mt-5">
                                            <input class="ml-9" type="checkbox" name="pe_esq_dorsal" id="input_pe_esq_dorsal">
                                            <input class="ml-8" type="checkbox" name="pe_dir_dorsal" id="input_pe_dir_dorsal">
                                            <input class="ml-9" type="checkbox" name="pe_esq_plantar" id="input_pe_esq_plantar">
                                            <input class="ml-8" type="checkbox" name="pe_dir_plantar" id="input_pe_dir_plantar">
                                        </div>
                                </div>

                                   
                                </div>

                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-perfusion">@lang('Perfusion')</label>
                                            <select name="perfusion" class="form-control form-control-alternative{{ $errors->has('perfusion') ? ' is-invalid' : '' }}" required>>
                                           
                                                <option value="">@lang('Select')</option>
                                            @foreach ($perfusoes as $perfusao )
                                                <option value="{{ $perfusao->id }}">{{ $perfusao->desc }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('civil_state') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-civil_state">@lang('Civil State')</label>
                                        <select name="civil_state" class="form-control form-control-alternative{{ $errors->has('civil_state') ? ' is-invalid' : '' }}" required>>
                                          <option value="">@lang('Select')</option>
                                          
                                          {{-- @foreach ($estados_civil as $estado_civil )
                                            <option value="{{ $estado_civil->id }}">{{ $estado_civil->desc }}</option>
                                          @endforeach --}}
                                        </select>
                                        @if ($errors->has('civil_state'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('civil_state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('socktype') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-socktype">@lang('Type of sock you wear the most')</label>
                                        <input type="text" name="socktype" id="input-socktype" class="form-control form-control-alternative{{ $errors->has('socktype') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Meia Soquete')" required>

                                        @if ($errors->has('socktype'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('socktype') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('shoetype') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dob">@lang('Type of shoe you wear the most')</label>
                                        <input type="text" name="shoetype" id="input-shoetype" placeholder="Ex: Tênis" class="form-control form-control-alternative{{ $errors->has('shoetype') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('shoetype'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shoetype') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-12 form-group{{ $errors->has('surgery_legs') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-surgery_legs">@lang('Have you had any surgery on your lower limbs?')</label>
                                        <input name="surgery_legs" id="input-surgery_legs" type="text" class="form-control form-control-alternative{{ $errors->has('surgery_legs') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Nos pés')" required>
                                

                                        @if ($errors->has('surgery_legs'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('surgery_legs') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                         <div class="col-6 form-group{{ $errors->has('sport') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sport">@lang('Do you practice any sport?')</label>
                                            <input name="sport" id="input-sport" type="text" class="form-control form-control-alternative{{ $errors->has('sport') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Futebol, Natação')" required>
                                    

                                            @if ($errors->has('sport'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sport') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 form-group{{ $errors->has('medicine') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sport">@lang('Do you take any medicine?')</label>
                                            <input name="medicine" id="input-medicine" type="text" class="form-control form-control-alternative{{ $errors->has('medicine') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Losartana ')" required>
                                    

                                            @if ($errors->has('medicine'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('medicine') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                
                                <hr class="my-4"/>

                                <div class="row">

                                    <div class="col-12 form-group{{ $errors->has('painSensitivity') ? ' has-danger' : '' }}">
                                        
                                        <label class="form-control-label" for="input-painSensitivity">@lang('Pain sensitivity level')</label>
                                        <input type="range" min="0" max="10" name="painSensitivity" id="input-painSensitivity" class="form-control form-control-alternative{{ $errors->has('painSensitivity') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('painSensitivity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('painSensitivity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="row">

                                    <div class="col-6 form-group{{ $errors->has('pregnant') ? ' has-danger' : '' }}">
                                        <label style="padding-right: 10px;" class="form-control-label" for="pregnant">@lang('Pregnant ?')</label>
                                        <input type="radio" name="pregnant" id="input-pregnant-no" class="btn-check form-control-alternative{{ $errors->has('pregnant') ? ' is-invalid' : '' }}" checked>
                                        <label class="form-control-label" for="pregnant">@lang('No')</label>
                                        <input type="radio" name="pregnant" id="input-pregnant-yes" class="btn-check form-control-alternative{{ $errors->has('pregnant') ? ' is-invalid' : '' }}">
                                        <label class="form-control-label" for="pregnant">@lang('Yes')</label>

                                        @if ($errors->has('pregnant'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pregnant') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                </div>
                                <div class="row">
                                   
                                    <div class="col-12 form-group">
                                        <p class="form-control-label">@lang('Have you ?')</p>
                                        
                                        <input type="checkbox" name="pacemaker" id="input-pacemaker" class="btn-check">
                                        <label class="form-control-label" for="pacemaker" style="padding-right: 30px;">@lang('Pacemaker')</label>
                                        <input type="checkbox" name="pino" id="input-pinos" class="btn-check">
                                        <label class="form-control-label" for="highPressure" style="padding-right: 30px;">@lang('Pin')</label>
                                        <input type="checkbox" name="highPressure" id="input-highPressure" class="btn-check">
                                        <label class="form-control-label" for="highPressure" style="padding-right: 30px;">@lang('High Pressure')</label>
                                        <input type="checkbox" name="seizures" id="input-seizures" class="btn-check">
                                        <label class="form-control-label" for="seizures" style="padding-right: 30px;">@lang('Seizures')</label>
                                        <input type="checkbox" name="diabetes" id="input-diabetes" class="btn-check">
                                        <label class="form-control-label" for="diabetes" style="padding-right: 30px;">@lang('Diabetes')</label>
                                        <br>
                                        <input type="checkbox" name="carcinogenic" id="input-carcinogenic" class="btn-check">
                                        <label class="form-control-label" for="carcinogenic" style="padding-right: 30px;">@lang('Carcinogenic Antecedents')</label>
                                        <input type="checkbox" name="circulatory" id="input-circulatory" class="btn-check">
                                        <label class="form-control-label" for="circulatory" style="padding-right: 30px;">@lang('circulatory problems')</label>

                                    </div>

                                </div>

                                <hr class="my-4"/>                                
  
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">@lang('Save')</button>
                                    <a href="/anaminese/create" class="btn btn-info mt-4">@lang('Next')</a>
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










