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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        <div id="site-content">
                <header class="site-header">
                    <div class="container">
                    <a href="{{route('home')}}" id="branding">
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
                            </ul> <!-- .menu -->
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

    </div>
</body>
</html>
