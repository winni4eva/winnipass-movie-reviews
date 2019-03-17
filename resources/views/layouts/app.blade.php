<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        <div id="site-content">
                <header class="site-header">
                    <div class="container">
                        <a href="index.html" id="branding">
                            <img src="images/logo.png" alt="" class="logo">
                            <div class="logo-copy">
                                <h1 class="site-title">Film</h1>
                                <small class="site-description">Your movie home</small>
                            </div>
                        </a> <!-- #branding -->
    
                        <div class="main-navigation">
                            <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                            <ul class="menu">
                                <li class="menu-item current-menu-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="menu-item"><a href="{{route('films.create')}}">Add Film</a></li>
                                {{-- <li class="menu-item"><a href="review.html">Movie reviews</a></li>
                                <li class="menu-item"><a href="joinus.html">Join us</a></li>
                                <li class="menu-item"><a href="contact.html">Contact</a></li> --}}
                            </ul> <!-- .menu -->
    
                            {{-- <form action="#" class="search-form">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search"></i></button>
                            </form> --}}
                        </div> <!-- .main-navigation -->
    
                        <div class="mobile-navigation"></div>
                    </div>
                </header>
                <main class="main-content">
                        @yield('content')
                </main>
                <footer class="site-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="widget">
                                    <h3 class="widget-title">About Us</h3>
                                    <p>Your movie home</p>
                                </div>
                            </div>
                        </div> <!-- .row -->
    
                        <div class="colophon">Copyright 2019 Film, Designed by Themezy. All rights reserved</div>
                    </div> <!-- .container -->
    
                </footer>
            </div>
            <!-- Default snippet for navigation -->
            
    
    
            <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
            <script src="{{ asset('js/plugins.js') }}"></script>
            <script src="{{ asset('js/app-custom.js') }}"></script>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>
</html>
