@extends('layouts.app')

@section('content')

<h1>Résultat de ta recherche.</h1>

@foreach($users as $user)


<a class="postcard__img_link" href="{{route('profil',$user->id)}}">
    {{$user->pseudo}}
</a>
<a class="postcard__img_link" href="{{route('profil',$user->id)}}">
    <img src="images/{{ $user->imageprofil }}" width="50" class="rounded-circle">
</a>

@endforeach
@endsection