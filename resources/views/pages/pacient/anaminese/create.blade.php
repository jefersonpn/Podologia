@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.pacient.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see update your details and manage your account'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
@if(isset($anamnesi))
  @foreach($anamnesi as $anamnese)
    @foreach ($pacients as $pacient )
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h2 class="mb-0">@lang('Anamnesis Form')</h2>
                        </div>
                        <div class="py-4">
                            <h3 class="text-muted">{{ $pacient->name }} {{ $pacient->surname }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('anamnesi.update', $anamnese->id) }}" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <input type="hidden" name="pacient_id" value="{{ $pacient->id }}">
                                    <div class="col-6 form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-profession">@lang('Profession')</label>
                                        <input type="text" name="profession" id="input-profession" class="form-control form-control-alternative{{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ $anamnese->profession }}" required autofocus>

                                        @if ($errors->has('profession'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('sockType') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-sockType">@lang('Type of sock you wear the most')</label>
                                        <input type="text" name="sockType" id="input-sockType" class="form-control form-control-alternative{{ $errors->has('sockType') ? ' is-invalid' : '' }}" value="{{ $anamnese->sockType }}" required>

                                        @if ($errors->has('sockType'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sockType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('shoeType') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dob">@lang('Type of shoe you wear the most')</label>
                                        <input type="text" name="shoeType" id="input-shoeType" value="{{ $anamnese->shoeType }}" class="form-control form-control-alternative{{ $errors->has('shoeType') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('shoeType'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shoeType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-12 form-group{{ $errors->has('legsSurgery') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-legsSurgery">@lang('Have you had any surgery on your lower limbs?')</label>
                                        <input name="legsSurgery" id="input-legsSurgery" type="text" class="form-control form-control-alternative{{ $errors->has('legsSurgery') ? ' is-invalid' : '' }}" value="{{ $anamnese->legsSurgery }}" required>


                                        @if ($errors->has('legsSurgery'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('legsSurgery') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                         <div class="col-6 form-group{{ $errors->has('sport') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sport">@lang('Do you practice any sport?')</label>
                                            <input name="sport" id="input-sport" type="text" class="form-control form-control-alternative{{ $errors->has('sport') ? ' is-invalid' : '' }}" value="{{ $anamnese->sport }}" required>


                                            @if ($errors->has('sport'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sport') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 form-group{{ $errors->has('medicine') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sport">@lang('Do you take any medicine?')</label>
                                            <input name="medicine" id="input-medicine" type="text" class="form-control form-control-alternative{{ $errors->has('medicine') ? ' is-invalid' : '' }}" value="{{ $anamnese->medicine }}" required>


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
                                        <input type="range" min="0" max="10" name="painSensitivity" id="input-painSensitivity" value="{{ $anamnese->painSensitivity }}" class="form-control form-control-alternative{{ $errors->has('painSensitivity') ? ' is-invalid' : '' }}" required>

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
                                        <input type="radio" name="pregnant" value="0" id="input-pregnant-no"  @if( $anamnese->pregnant  == '0' ) checked @endif class="btn-check form-control-alternative{{ $errors->has('pregnant') ? ' is-invalid' : '' }}" >
                                        <label class="form-control-label" for="pregnant">@lang('No')</label>
                                        <input type="radio" name="pregnant" value="1" id="input-pregnant-yes" @if( $anamnese->pregnant  == '1' ) checked @endif class="btn-check form-control-alternative{{ $errors->has('pregnant') ? ' is-invalid' : '' }}">
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

                                        <input type="checkbox" name="paceMaker" id="paceMaker" class="btn-check" {{ $anamnese->paceMaker == 'on' ? 'checked' : '' }}>
                                        <label class="form-control-label" for="paceMaker" style="padding-right: 30px;">@lang('Pacemaker')</label>
                                        <input type="checkbox" name="pino" id="input-pinos" class="btn-check" {{  $anamnese->pino  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="pino" style="padding-right: 30px;">@lang('Pin')</label>
                                        <input type="checkbox" name="highPressure" id="input-highPressure" class="btn-check"  {{  $anamnese->highPressure  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="highPressure" style="padding-right: 30px;">@lang('High Pressure')</label>
                                        <input type="checkbox" name="seizures" id="input-seizures" class="btn-check" {{  $anamnese->seizures  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="seizures" style="padding-right: 30px;">@lang('Seizures')</label>
                                        <input type="checkbox" name="diabetes" id="input-diabetes" class="btn-check"  {{  $anamnese->diabetes  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="diabetes" style="padding-right: 30px;">@lang('Diabetes')</label>
                                        <br>
                                        <input type="checkbox" name="carcinogenic" id="input-carcinogenic" class="btn-check" {{  $anamnese->carcinogenic  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="carcinogenic" style="padding-right: 30px;">@lang('Carcinogenic Antecedents')</label>
                                        <input type="checkbox" name="circulatory" id="input-circulatory" class="btn-check" {{  $anamnese->circulatory  == 'on' ? 'checked' : ''  }}>
                                        <label class="form-control-label" for="circulatory" style="padding-right: 30px;">@lang('circulatory problems')</label>

                                    </div>

                                </div>

                                <hr class="my-4"/>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">@lang('Update')</button>
                                    <a href="{{ route('obsProf.create', $pacient->id) }}" class="btn btn-info mt-4">@lang('Notes')</a>
                                </div>
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
        <div class="row pb-5" style="margin-bottom: 30px;">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h2 class="mb-0">@lang('Anamnesis Form')</h2>
                        </div>
                        <div class="py-4">
                            <h3 class="text-muted">{{ $pacient->name }} {{ $pacient->surname }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('anamnesi.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <input type="hidden" name="pacient_id" value="{{ $pacient->id }}">
                                    <div class="col-6 form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-profession">@lang('Profession')</label>
                                        <input type="text" name="profession" id="input-profession" class="form-control form-control-alternative{{ $errors->has('profession') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Vendedora')" required autofocus>

                                        @if ($errors->has('profession'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('sockType') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-sockType">@lang('Type of sock you wear the most')</label>
                                        <input type="text" name="sockType" id="input-sockType" class="form-control form-control-alternative{{ $errors->has('sockType') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Meia Soquete')" required>

                                        @if ($errors->has('sockType'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sockType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('shoeType') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dob">@lang('Type of shoe you wear the most')</label>
                                        <input type="text" name="shoeType" id="input-shoetType" placeholder="Ex: Tênis" class="form-control form-control-alternative{{ $errors->has('shoeType') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('shoeType'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shoeType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-12 form-group{{ $errors->has('legsSurgery') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-legsSurgery">@lang('Have you had any surgery on your lower limbs?')</label>
                                        <input name="legsSurgery" id="input-legsSurgery" type="text" class="form-control form-control-alternative{{ $errors->has('legsSurgery') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Nos pés')" required>


                                        @if ($errors->has('legsSurgery'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('legsSurgery') }}</strong>
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

                                        <input type="checkbox" name="paceMaker" id="input-paceMaker" class="btn-check">
                                        <label class="form-control-label" for="paceMaker" style="padding-right: 30px;">@lang('Pacemaker')</label>
                                        <input type="checkbox" name="pino" id="input-pinos" class="btn-check">
                                        <label class="form-control-label" for="pino" style="padding-right: 30px;">@lang('Pin')</label>
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
                                    <a href="{{ route('obsProf.create', $pacient->id) }}" class="btn btn-info mt-4">@lang('Notes')</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

        @include('layouts.footers.auth')
    </div>


@endsection











