@extends('layouts.app')

@section('content')

<form action="{{route('commentaires.update',$commentaire)}}" method="post">
    @csrf
    @method('PUT')
    <div class="commentaires container my-5 justify-content-center">
        <h3>Modifie ton commentaire en dessous</h3>
        <div class="commentaires-input"> <input type="text" value="{{$commentaire->content}}" name="content" class="form-control" placeholder="Commentaire">
            <button class="mt-3">Modifier</button>
        </div>
    </div>
</form>
@endsection