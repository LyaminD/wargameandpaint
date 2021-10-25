@extends('layouts.app')

@section('content')

<form action="{{route('posts.update',$post)}}" method="post">
    @csrf
    @method('PUT')
    <div class="posts container my-5 justify-content-center">
        <h3>Modifie ton post en dessous</h3>
        <div class="posts-input"> <input type="text" value="{{$post->content}}" name="content" class="form-control" placeholder="Post">
            <h3>Modifie ton image</h3>
            @if(Session::get('image'))
            <input type="text" class="form-control" name="image" id="image" value="{{Session::get('image')}}">
            @else
            <input type="text" name="image" id="image" class="form-control my-2" value="{{$post->image}}">
            @endif
            <button>Modifier</button>
        </div>
</form>
<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 my-2">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </div>
</form>
@endsection