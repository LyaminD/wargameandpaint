@extends('layouts.app')

@section('content')

<h2>Résultat de ta recherche.</h2>

@foreach($users as $user)

<a class="postcard__img_link" href="{{route('profil',$user->id)}}">
    {{$user->pseudo}}
</a>
<a class="postcard__img_link" href="{{route('profil',$user->id)}}">
    <img src="images/{{ $user->imageprofil }}" width="50" class="rounded-circle">
</a>

@endforeach
@endsection