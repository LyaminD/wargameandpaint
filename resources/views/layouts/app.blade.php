<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'wargameandpaint') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md menu navbar-light bg-white shadow-sm d-flex">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        @guest
                        @else
                        <li class="nav-item text-dark align-item-center">
                            <a href="{{ route('home') }}" class="nav-link  text-reset text-dark ">
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->pseudo }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right px-5 mr-3" aria-labelledby="navbarDropdown">
                                @if (auth()->user() && auth()->user()->role_id == 2)
                                <a class="nav-link" href="{{ route('admin.index') }}">Administration</a>
                                @endif
                                <a href="{{ route('profil', $user = Auth::user()->id) }}" class="text-reset">
                                    Mon profil
                                </a></br>
                                <a href="{{ route('editaccount') }}" class="text-reset">
                                    Modifier mes informations
                                </a></br>
                                <a href="{{ route('editpassword') }}" class="text-reset">
                                    Modifier le mot de passe
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Se déconnecter') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
                <div class="col navdroite d-md-inline-flex align-items-center">
                    <?php $factions = GetFactions(); ?>
                    <div class="d-flex choixfaction justify-content-center">
                        <FORM class="mx-1">
                            <SELECT onChange="window.location.replace('/posts/' + this.options[this.selectedIndex].value +'/show')" class="btn btn-secondary dropdown-toggle faction">
                                <OPTION VALUE="#" SELECTED>Warhammer 40 000 </OPTION>
                                @foreach ($factions as $faction)
                                @if ($faction->jeu_id == '2')
                                <OPTION VALUE="{{ $faction->id }}">{{ $faction->nom }}</OPTION>
                                @endif
                                @endforeach
                                >
                            </SELECT>
                        </FORM>
                        <FORM>
                            <SELECT onChange="window.location.replace('/posts/' + this.options[this.selectedIndex].value +'/show')" class="btn btn-secondary dropdown-toggle faction">
                                <OPTION VALUE="#" SELECTED> Age Of Sigmar </OPTION>
                                @foreach ($factions as $faction)
                                @if ($faction->jeu_id == '1')
                                <OPTION VALUE="{{ $faction->id }}">{{ $faction->nom }}</OPTION>
                                @endif
                                @endforeach
                                >
                            </SELECT>
                        </FORM>
                    </div>
                    <!-- Search widget-->
                    <div class=" ms-4 container my-2 d-flex justify-content-end">
                        <form method="get" action="{{ route('search') }}">
                            <div class="d-flex justify-content-center">
                                <div class="input-group">
                                    <input class="form-control" type="search" placeholder="Entrez la recherche" aria-describedby="button-search" name="search" />
                                    <button class="btn btn-primary" type="submit" id="button-search">Go!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        @if (Auth::user())
        <div class="container d-flex flex-column justify-content-center mx-auto mt-3" id="friendsList">
            @include ('follows-list')
        </div>
        @endif

        <main class="container-fluid mb-5">
            <div class=" text-center">
                @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3" style="background-color: white">
            <h6 class="text-dark">© 2021 Copyright: Wargame & Paint / logo By Yamms</h6>
        </div>
    </footer>

</body>

</html>