@extends('layouts.app')

@section('content')

<form action="{{route('commentaires.update',$commentaire)}}" method="post">
    @csrf
    @method('PUT')
    <div class="commentaires container my-5 justify-content-center">
        <h3>Modifie ton commentaire en dessous</h3>
        <div class="commentaires-input"> <input type="text" value="{{$commentaire->content}}" name="content" class="form-control" placeholder="Commentaire">
            <h3>Modifie ton Tags</h3>
            <input type="text" name="tags" class="form-control" value="{{$commentaire->tags}}" placeholder="Tags">
            <h3>Modifie ton image</h3>
            <input type="text" name="image" class="form-control" value="{{$commentaire->image}}" placeholder="Images">
            <div class="fonts"> <i class="fa fa-camera "></i> </div>
            <button>Modifier</button>
        </div>
    </div>
</form>
@endsection