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
    <div id="loginBackground">

        <h1>Bienvenu sur Wargame & Paint ! ! !</h1>
        <div class="container">
            <div class="tribunal text-center my-3">
                <img src="{{ asset("images/....png") }}" class="img-thumbnail">
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