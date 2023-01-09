@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('pages.pacient.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see update your details and manage your account'),
        'class' => 'col-lg-7'
    ])   
    @foreach ($pacient as $item )
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h1 class="my-0">@lang('Pacient')</h1>
                </div>
            </div>
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="my-0">{{ $item->name }} {{ $item->surname }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('pacient.update', $item->id) }}" autocomplete="off">
                    @csrf
                    @method("PATCH")

                    <h6 class="heading-small text-muted mb-4">@lang('Pacient information')</h6>
                    
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-4 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">@lang('Name')</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative" value="{{ $item->name }}" required autofocus>

                                
                            </div>
                            <div class="col-4 form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-surname">@lang('Surname')</label>
                                <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ $item->surname }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-4 form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-phone">@lang('Phone')</label>
                                <input type="tel" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $item->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-6 form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-dob">@lang('Date of Brith')</label>
                                <input type="date" name="dob" id="input-dob" class="form-control form-control-alternative{{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ $item->dob }}" required>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-3 form-group{{ $errors->has('civilState_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="civilState_id">@lang('Civil State')</label>
                                
                                <select name="civilState_id" id="civilState_id"class="form-control form-control-alternative{{ $errors->has('civilState_id') ? ' is-invalid' : '' }}" required>
                                    <option value=''>Selecione</option>
                                    @foreach ($civilStates as $civilState )
                                        @if($civilState->id == $item->civilState_id)
                                        <option value='{{ $civilState->id }}' selected>{{ $civilState->desc }}</option>
                                        @else
                                        <option value='{{ $civilState->id }}'>{{ $civilState->desc }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                    @if ($errors->has('civilState_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('civilState_id') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <hr class="my-4"/>
                    </div>
                    <h6 class="heading-small text-muted mb-4">@lang('Login info')</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-6 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">@lang('Email')</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $item->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <hr class="my-4"/>
                    </div>
                    <h6 class="heading-small text-muted mb-4">@lang('Others info')</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                    
                            <div class="col-3 form-group{{ $errors->has('sex_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="sex_id">@lang('Sex')</label>
                                
                                <select name="sex_id" id="sex_id"class="form-control form-control-alternative{{ $errors->has('sex_id') ? ' is-invalid' : '' }}" required>
                                    <option value=''>Selecione</option>
                                    @foreach ($sexs as $sex )
                                        @if($sex->id == $item->sex_id)
                                        <option value='{{ $sex->id }}' selected>{{ $sex->desc }}</option>
                                        @else
                                        <option value='{{ $sex->id }}'>{{ $sex->desc }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                    @if ($errors->has('sex_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Sex') }}</strong>
                                        </span>
                                    @endif
                            </div>
                                
                                <div class="col-4 form-group{{ $errors->has('estado_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-state">@lang('State')</label>
                                    
                                    <select name="estado_id" id="estado_id"class="form-control form-control-alternative{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" required>
                                        <option value=''>Selecione</option>
                                        @foreach ($estados as $estado )
                                            @if($estado->id == $item->estado_id)
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
                            
                                    <div class="col-5 form-group{{ $errors->has('cidade_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city_id">@lang('City')</label>
                                        <select name="cidade_id" id="cidade_id"class="form-control form-control-alternative{{ $errors->has('cidade_id') ? ' is-invalid' : '' }}" required>
                                            <option value="">Selecione</option>
                                            
                                        <script>
                                          

                                            // Get the pacient citys selected
                                            $(document).ready(function () 
                                            {
                                                var input_cidade_id = "<?php echo $item->cidade_id; ?>";
                                                var id_estado = 12;
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
                                
                            </div>
                            <div class="row">

                                <div class="col-7 form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">@lang('Address')</label>
                                    <input type="text" name="address" id="input-address" value="{{ $item->address }}" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-2 form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number">@lang('Number')</label>
                                    <input type="text" name="number" id="input-number" value="{{ $item->number }}" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-3 form-group{{ $errors->has('cap') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cap">@lang('Cep')</label>
                                    <input type="text" name="cap" id="input-cap" value="{{ $item->cap }}" class="form-control form-control-alternative{{ $errors->has('cap') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('cap'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cap') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                            </div>

                                                            

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">@lang('Update')</button>
                                {{-- <a href="/anaminese/create" class="btn btn-info mt-4">@lang('Next')</a> --}}
                            </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endforeach

        
        
        @include('layouts.footers.auth')
    </div>
  
   
@endsection











