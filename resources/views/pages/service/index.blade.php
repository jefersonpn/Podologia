@extends('layouts.app')

@section('content')
    @include('pages.service.partials.header')
    
    <div class="container-fluid mt--7">
        
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="budget">@lang('Description')</th>
                                    <th scope="col" class="sort" data-sort="status">@lang('Phone')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Last Purchase')</th>
                                    <th scope="col"></th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                @foreach ($providers as $provider ) 
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                           
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"> {{ $provider->nomeFantasia }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                            <p class="telefone mt-3">{{ $provider->telefone }}</p>
                                    </td>
                                    <td>
                                        @if($provider->situacao == 'ATIVA')
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status text-success">{{ $provider->situacao }}</span>
                                            </span>
                                            @else
                                             <span class="badge badge-dot mr-4">
                                            <i class="bg-danger"></i>
                                            <span class="status text-danger">{{ $provider->situacao }}</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- @if($pacient->obsProf != 0) --}}
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">@lang('10/01/2023')</span>
                                            </span>
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">100%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <div class=" d-flex justify-content-start mx-2 my-2">
                                                <a class=" btn btn-sm btn-info" href="{{ route('provider.edit', $provider->id) }}">@lang('Show')</a>
                                                </div>
                                                <hr class="p-0 m-0"/>
                                                <div class=" d-flex justify-content-start mx-2 my-2">
                                                    <form action="{{ route('provider.delete', $provider->id) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <input type="hidden" name="provider_id" id="provider_id" value="{{ $provider->id }}">
                                                        <button type="submit" class="btn btn-sm btn-danger">@lang('Delete')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>                    
                                @endforeach
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush