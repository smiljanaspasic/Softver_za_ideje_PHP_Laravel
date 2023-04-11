<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script
            src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
        crossorigin="anonymous"></script> 
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <a class="navbar-brand">
                    <img src="https://yt3.googleusercontent.com/ytc/AL5GRJUj_8cTsZ_YhsvVez2e1_9vFPaFULQ3dKP1qtY=s900-c-k-c0x00ffffff-no-rj" alt="SLIKA"/ height="100px" width="100px">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (('new_idea' == Route::currentRouteName()) || ('my_ideas' == Route::currentRouteName()) || ('searchuser' == Route::currentRouteName()) )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('new_idea') }}">{{ __('Dodaj novi predlog') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my_ideas') }}">{{ __('Pregled svih mojih predloga') }}</a>
                        </li>
                        <li class='nav-item'>
                            <form method="post" action="{{route('searchuser')}}">
                                @csrf 
                                <div class="input-group ps-5">
                                    <div id="navbar-search-autocomplete" class="form-outline">
                                        <input type="search" id="form1" class="form-control" name='pretraga'/>
                                    </div>
                                    <button class="btn btn-primary">Pretraga</button>

                                </div>
                            </form>
                        </li>
                        @endif

                        @if ('home' == Route::currentRouteName() || ('search' == Route::currentRouteName()) || ('accept' == Route::currentRouteName())
                        || ('partly' == Route::currentRouteName()) || ('decline' == Route::currentRouteName()) || ('wait' == Route::currentRouteName()) )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Pregled svih predloga') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('accept') }}">{{ __('Pregled svih odobrenih predloga') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partly') }}">{{ __('Pregled svih delimicno odobrenih predloga') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('decline') }}">{{ __('Pregled svih odbijenih predloga') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wait') }}">{{ __('Pregled svih predloga na cekanju') }}</a>
                        </li>
                        <li class='nav-item'>
                            <form method="post" action="{{route('search')}}" >
                              @csrf

                                <div class="input-group ps-5">
                                    <div id="navbar-search-autocomplete" class="form-outline">
                                        <input type="text" id="form1" class="form-control" name='pretraga'"/>
                                    </div>
                                    <button class="btn btn-primary">Pretraga</button>

                                </div>
                            </form>

                        </li>
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif


                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
