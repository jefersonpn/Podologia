@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.patology.partials.header', [
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
                        <div class="col-lg-4 pt-3 order-lg-2">
                            <div class="h3">
                                @lang('Catalog')
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4 mb-2">CID 10 L60.0 Unha encravada</a>
                        </div>
                        <div class="d-flex justify-content-between">
                             <a href="#" class="btn btn-sm btn-info mr-4 mb-2">CID 10 L60.0 Unha encravada</a>
                        </div>
                    </div>
                    
                </div>
               {{-- End --}}
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Patology Register')</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('patology.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">@lang('Pathology information')</h6>
                            
                            
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">@lang('Name')</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('Name')" value="" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm form-group{{ $errors->has('cid') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cid">@lang('C.I.D')</label>
                                        <input type="text" name="cid" id="input-cid" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: L60.0')" value="" required autofocus>

                                        @if ($errors->has('cid'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">@lang('Description')</label>
                                    <textarea name="description" id="input-description" rows="5" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="@lang('Pathology Description')" value="" required></textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">@lang('Image')</label>
                                    <input name="image" type="file" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('treatment') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-treatment">@lang('Treatment')</label>
                                    <textarea name="treatment" id="input-treatment" rows="5" class="form-control form-control-alternative{{ $errors->has('treatment') ? ' is-invalid' : '' }}" placeholder="@lang('Treatment Description')" value="" required></textarea>

                                    @if ($errors->has('treatment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('treatment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('medications') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-treatment">@lang('Topical Medications')</label>
                                    <textarea name="medications" id="input-medications" rows="5" class="form-control form-control-alternative{{ $errors->has('medications') ? ' is-invalid' : '' }}" placeholder="@lang('Ex: Aradois 50mg (controle de pressão)')" required></textarea>

                                    @if ($errors->has('medications'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('medications') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('orientation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-orientation">@lang('Care and Orientation')</label>
                                    <textarea name="orientation" id="input-oriientation" rows="5" class="form-control form-control-alternative{{ $errors->has('orientation') ? ' is-invalid' : '' }}" placeholder="@lang('Orientação e cuidados que deve se ter com essa patologia')" required></textarea>

                                    @if ($errors->has('orientation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('orientation') }}</strong>
                                        </span>
                                    @endif
                                </div>

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
