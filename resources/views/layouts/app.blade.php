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

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md menu navbar-light bg-white shadow-sm d-flex justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/wargame.png') }}" class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @if (auth()->user() && auth()->user()->role_id == 2)
                        <a class="nav-link" href="{{ route('admin.index') }}">Administration</a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>
                            <div class="dropdown-menu dropdown-menu-right px-5 justify-content-center" aria-labelledby="navbarDropdown">
                                <a href="{{ route('adminpost') }}" class="mx-3 text-reset">Gestion des posts</a>
                                <a href="{{ route('admincomment') }}" class="mx-3 text-reset">Gestion des
                                    commentaires</a>
                                <a href="{{ route('adminuser') }}" class="mx-3 text-reset">Gestion des
                                    utilisateurs</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        @else
                        <li class="nav-item text-dark align-item-center mr-3">
                            <a href="{{ route('home') }}" class="nav-link mx-3 text-reset text-dark ">
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->pseudo }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right px-5 mr-3" aria-labelledby="navbarDropdown">
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

                <?php $factions = GetFactions(); ?>
                <FORM class="mx-3">
                    <SELECT onChange="window.location.replace('/posts/' + this.options[this.selectedIndex].value +'/show')" class="btn btn-secondary dropdown-toggle">
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
                    <SELECT onChange="window.location.replace('/posts/' + this.options[this.selectedIndex].value +'/show')" class="btn btn-secondary dropdown-toggle">
                        <OPTION VALUE="#" SELECTED> Age Of Sigmar </OPTION>
                        @foreach ($factions as $faction)
                        @if ($faction->jeu_id == '1')
                        <OPTION VALUE="{{ $faction->id }}">{{ $faction->nom }}</OPTION>
                        @endif
                        @endforeach
                        >
                    </SELECT>
                </FORM>

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
        </nav>

        @if (Auth::user())
        <div class="col-md-2 d-flex flex-column justify-content-center mx-auto mt-3" id="friendsList">
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