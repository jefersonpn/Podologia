
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- Custom CSS -->
        {{-- <link type="text/css" href="{{ asset('assets') }}/css/style.css" rel="stylesheet"> --}} 
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css?v=').time()}}">
        <script src="https://code.jquery.com/jquery-3.6.1.js" ></script>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body class="py-5{{ $class ?? '' }}">
                

        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div  class="main-content">

            @if(isset($header) )
                @switch($header)
                    @case((1)||(2)||(3)||(4)||(5))
                        @include('layouts.navbars.navs.registers')
                        @yield('content')
                        @break
                @endswitch
            @else
            @include('layouts.navbars.navbar')
            @yield('content')
            @endif
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        @if (session()->has('success'))
            <div class="alert alert-success" style="
            position:fixed; 
            bottom: 0px; 
            right: 0px; 
            width: auto;
            z-index:9999; 
            border-radius:0px;" 
            role="alert">
                {{ session('success') }}
            </div>
        @endif
            @if (session()->has('error'))
            <div class="alert alert-danger " style="
            position:fixed; 
            bottom: 0px; 
            right: 0px; 
            width: auto;
            z-index:9999; 
            border-radius:0px;" 
            role="alert">
                {{ session('error') }}
            </div>
        @endif

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>    
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        {{-- My Personal script --}}
        
</body>
</html>

