@extends('layouts.app')

@section('content')
    @include('pages.pacient.partials.header')
    
    <div class="container-fluid mt--7">
        
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="budget">@lang('Pacient')</th>
                                    <th scope="col" class="sort" data-sort="status">@lang('Average Ticket')</th>
                                    <th scope="col">Anamnese</th>
                                    <th scope="col">Obs Prof.</th>
                                    <th scope="col"></th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                @foreach ($pacients as $pacient )
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                           
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $pacient->name }} {{ $pacient->surname }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        @if($pacient->ticket != 0)
                                            {{ $pacient->ticketMedio }}
                                        @else
                                            <p>R$ 0,00</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($pacient->anamnese != 0)
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">@lang('Filled')</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-danger"></i>
                                            <span class="status">@lang('No filled')</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($pacient->obsProf != 0)
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">@lang('Filled')</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-danger"></i>
                                            <span class="status">@lang('No filled')</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
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
                                                <a class="dropdown-item" href="{{ route('anamnesi.create', $pacient->id) }}">Anamnese</a>
                                                <a class="dropdown-item" href="{{ route('obsProf.create', $pacient->id) }}">Obs Prof.</a>
                                                <hr class="p-0 m-0"/>
                                                <div class=" d-flex justify-content-center mx-2 my-2">
                                                    <a href="{{ route('pacient.show', $pacient->id) }}"  class="btn btn-sm btn-default">@lang('Show')</a>
                                                    <form action="{{ route('pacient.destroy', $pacient->id) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
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
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush