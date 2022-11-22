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
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 pt-3 order-lg-2">
                            <div class="h3">
                                @lang('Lasts Registered')
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4 mb-2">Wellen Nascimento</a>
                        </div>
                        <div class="d-flex justify-content-between">
                             <a href="#" class="btn btn-sm btn-info mr-4 mb-2">Jeferson Pereira</a>
                        </div>
                    </div>
                    
                </div>
               {{-- End --}}
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Pacient Register')</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('pacient.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>
                            
                            
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-4 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">@lang('Name')</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('Name')" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-8 form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-surname">@lang('Surname')</label>
                                        <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="@lang('Surname')" required autofocus>

                                        @if ($errors->has('surname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('surname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-phone">@lang('Phone')</label>
                                        <input type="tel" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: 67 99120-0010')" required>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dob">@lang('Date of Brith')</label>
                                        <input type="date" name="dob" id="input-dob" class="form-control form-control-alternative{{ $errors->has('dob') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- @dd($estados) --}}
                                    <div class="col-6 form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-state">@lang('State')</label>
                                        <select name="state" id="input-state"class="form-control form-control-alternative{{ $errors->has('state') ? ' is-invalid' : '' }}" required>
                                            <option value="">@lang('Select')</option>
                                       {{-- Retrieving data from collection --}}
                                            @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                        @endforeach
                                            </select>

                                        @if ($errors->has('state'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-city">@lang('City')</label>
                                        <select name="city" id="input-city"class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" required>
                                            <option value="">@lang('Select')</option>
                                            </select>

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-address">@lang('Address')</label>
                                        <input type="text" name="address" id="input-address"class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-3 form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cep">@lang('Cep')</label>
                                        <input type="text" name="cep" id="input-cep"class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('cep'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-2 form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-number">@lang('Number')</label>
                                        <input type="text" name="number" id="input-number"class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <hr class="my-4">
                            
                                <h6 class="heading-small text-muted mb-4">@lang('Anamnesis Form')</h6>

                                






                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">@lang('Save')</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
