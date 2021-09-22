@extends('layouts.app')

@section('content')

<body>
    <div class="tribunal text-center my-3">
        <h3 class="py-5">Gestion du site</h3>
        <img src="{{ asset("images/admin.jpg") }}" class="img-thumbnail">
    </div>
    <div class="text-center py-5">
        <a href="{{ route('adminuser') }}" class="lgbtn green"><button type="button" class="btn btn-primary btn-lg">Gestion des utilisateurs</button></a>
        <a href="{{ route('adminpost') }}" class="lgbtn green"><button type="button" class="btn btn-primary btn-lg">Gestion des posts</button></a>
        <a href="{{ route('admincomment') }}" class="lgbtn green"><button type="button" class="btn btn-primary btn-lg">Gestion des commentaires</button></a>
    </div>
</body>
@endsection