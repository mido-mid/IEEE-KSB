<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IEEE KSB</title>

        <link href="{{ asset('images') }}/ieee.png" rel="icon" type="image/png">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    </head>
    <body class="{{ $class ?? '' }}">



    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">

        <div class="container-fluid user-navbar">

            <a class="navbar-brand" href="#"><span class="logo">KFS</span> IEEE KSB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse links" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('volunteers') }}">Volunteers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events') }}">events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Contact us</a>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link @auth dropdown-toggle @endauth" href="{{ route('login') }}" @auth id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endauth>
                            @auth
                            {{\Str::limit(auth()->user()->name, 10)}}
                            @endauth
                        </a>
                        @auth

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('profile.update') }}" class="dropdown-item">
                                <i style="margin-right:5px" class="fas fa-male"></i>
                                <span>{{ __('My profile') }}</span>
                            </a>

                                <a style="margin-bottom:7px" href="{{ route('homeadmin') }}" class="dropdown-item">
                                    <i style="margin-left:-7px;margin-right:5px" class="fas fa-home"></i>
                                    <span>{{ __('go to admin') }}</span>
                                </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i style="margin-right:3px" class="fas fa-sign-out-alt"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                        @endauth
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')


    @include('includes.footer')

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('js') }}/script.js"></script>
        <script src="{{ asset('js') }}/jquery-3.5.1.min.js">
        //<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        <script src="{{ asset('js') }}/bootstrap.min.js"></script>
        <script src="{{ asset('js') }}/bootstrap.js"></script>


    </body>
</html>
