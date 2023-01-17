{{-- Menu  pequeno que aparece quando o usuario clica sobre a foto --}}

<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h1 mb-0 text-white text-uppercase d-none d-lg-inline-block" @switch($header)
            @case(1)
                href="{{ route('home') }}">@lang('Pathologys')<i class="ni ni-fat-add ml-2 text-success"></i><span class="h5 text-success">@lang('(new)')</span></a>
                @break
            @case(2)
                href="{{ route('pacient.create') }}">@lang('Pacients')<i class="ni ni-fat-add ml-2 text-danger"></i><span class="h5 text-danger">@lang('(new)')</span></a>
            @break
            @case(3)
                href="{{ route('provider.create') }}">@lang('Providers')<i class="ni ni-fat-add ml-2 text-success"></i><span class="h5 text-success">@lang('(new)')</span></a>
            @break
            @case(4)
                href="{{ route('servico.create') }}">@lang('Services')<i class="ni ni-fat-add ml-2 text-success"></i><span class="h5 text-success">@lang('(new)')</span></a>
            @break
            @case(5)
                href="{{ route('produto.create') }}">@lang('Products')<i class="ni ni-fat-add ml-2 text-success"></i><span class="h5 text-success">@lang('(new)')</span></a>
            @break
            
                
        @endswitch 
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('Welcome!')</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('My profile')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>@lang('Settings')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>@lang('Activity')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>@lang('Support')</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>@lang('Logout')</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>