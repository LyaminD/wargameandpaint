@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wargame & Paint</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


<body>
    <div id="loginBackground" class="bg-dark text-center">
        <h1>Bienvenu sur Wargame & Paint ! ! !</h1>
        <p>Wargame & Paint est un site de partage de photos sur l'univers de Games Workshop !</p>
        <p>Partage tes réalisations avec la communauté !</p>
        <div class="container">
        <div class="tribunal text-center my-5">
    <img src="{{ asset("images/wargame.png") }}">
    </div>
        </div>
        <div class="container d-flex text-center">
            <div class="col text-center">
                <div class="button-div">
                    <a href="{{ route('register') }}" class="btn btn-primary" role="button" data-bs-toggle="button">S'enregistrer</a>
                    <a href="{{ route('login') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection