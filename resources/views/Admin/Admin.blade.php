@extends('layouts.app')

@section('content')

<body>
    <div class="tribunal text-center my-3">
        <h3>Gestion du site</h3>
        <img src="{{ asset("images/admin.jpg") }}" class="img-thumbnail">
    </div>
    <div class="text-center">
        <a href="{{ route('AdminUser') }}" class="lgbtn green">Gestion des utilisateurs</a>
        <a href="{{ route('AdminPost') }}" class="lgbtn green">Gestion des posts</a>
        <a href="{{ route('AdminComment') }}" class="lgbtn green">Gestion des commentaires</a>
    </div>
</body>
@endsection