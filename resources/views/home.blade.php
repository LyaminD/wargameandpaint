@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carnet de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Vous êtes connecté !') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tribunal text-center my-5">
    <img src="{{ asset("images/tribunal.jpg") }}">
</div>

<!-- POSTER UN POST-->
<div class="container mt-5 mb-5 text-center">
    <h1>Post ton post !</h1>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="p-2">
                    <p class="text-justify">Partagez vos éxpèriences ! avec ou sans photos ! </p>
                    <form action="{{route('posts.store')}}" method="post">
                        @csrf
                        <div class="posts">
                            <h3>Ecris ton post en dessous</h3>
                            <div class="posts-input"> <input type="text" name="content" class="form-control" placeholder="post">

                                <h3>Joindre une image</h3>
                                @if(Session::get('image'))
                                <input type="text" class="form-control" name="image" id="image" value="{{Session::get('image')}}">
                                @else
                                <input type="text" name="image" id="image" class="form-control my-2" placeholder="Upload d'images ci-dessous">
                                @endif
                                <button class="btn-success">Envoyer</button>
                            </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center">Fil d'actualité</h1>
<!-- POST-->
@foreach ($posts as $post)
<div class="container my-5 justify-content-center">
    <div class=" row justify-content-center ">
        <div class="col-lg-6 col-12 mt-5 ">
            <div class="card mt-3 ">
                <div class="layer"></div>
                <div class="content">
                    <div class="card-header text-center border-0">
                        <div class="row justify-content-center my-4">
                            <div class="col">
                                <div class="d-flex flex-lg-row flex-column-reverse no-gutters justify-content-center">
                                    <div class="col-3 text-right"><img class="img-fluid" id="quotes" src="https://img.icons8.com/ultraviolet/40/000000/quote-left.png" width="110" height="110"></div>
                                    <div class="col pr-lg-5"><img class=" img-1 mr-lg-5 " src="images/{{ $post->user->imageprofil }}" width="130" class="rounded mb-2 img-thumbnail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center border-0 mt-0 pt-0 mb-3">
                        <div class="row text-center name mt-auto ">
                            <div class="col">
                                <h4 class="mb-0">{{ $post->user->pseudo}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center pb-3 ">
                        <div class="row justify-content-center">
                            <div class="col text-center justify-content-center ">
                                <p class="bold text-center px-md-3"> {{ $post->content}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-center justify-content-center ">
                            <p class="bold text-center px-md-3"><img src="images/{{ $post->image }}" class="img-fluid rounded shadow-sm"></p>
                        </div>
                    </div>
                    <div class="card-body text-center pb-3 ">
                        <div class="row justify-content-center">
                            <div class="col text-center justify-content-center ">
                                <p class="bold text-center px-md-3">tags :</p>
                            </div>
                        </div>

                    </div>
                    <hr class="mt-auto mb-4">
                    <div class="text-center">
                        @if (Auth::user()->can('update', $post))
                        <a href="{{route('posts.edit',$post)}}">
                            <button class="btn-primary">Modifier le post</button></a>
                        @endif
                    </div>

                    <div class="text-center">
                        @if (Auth::user()->can('delete', $post))
                        <form action="{{route('posts.destroy',$post)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="supprimer" class="my-2 btn-danger">
                        </form>
                        @endif
                    </div>

                    @foreach($post->commentaires as $commentaire)
                    <div class="commentaires ">
                        <div class="d-flex flex-row mb-2"> <img src="images/{{ $commentaire->user->image }}" width="40" class="rounded-image">
                            <div class="d-flex flex-column ml-2">
                                <span class="name"><a href="{{route('profil',$commentaire->user_id)}}">{{ $commentaire->user->pseudo}}</a></span>
                                <small class="commentaire-text">{{ $commentaire->content}}</small>
                            </div>
                            <div class="text-center">
                                @if (Auth::user()->can('update', $commentaire))
                                <a href="{{route('commentaires.edit',$commentaire)}}">
                                    <button><i class="fas fa-pencil-alt"></i></button></a>
                                @endif
                            </div>
                            <div class="text-center">
                                @if (Auth::user()->can('delete', $commentaire))
                                <form action="{{route('commentaires.destroy',$commentaire)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button> <i class="fas fa-times-circle text-danger"></i></button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="p-2">
                            <form action="{{route('commentaires.store')}}" method="post">
                                @csrf
                                <div class="commentaire  text-center my-2">
                                    <h3>Commente !</h3>
                                    <div class="commentaire-input"> <input type="text" name="content" class="form-control" placeholder="Commentaire">
                                        <h3>Tags</h3>
                                        <input type="text" name="tags" class="form-control" placeholder="Tags">
                                        <h3>Joindre une image</h3>
                                        @if(Session::get('image'))
                                        <input type="text" class="form-control" name="image" id="image" value="{{Session::get('image')}}">
                                        @else
                                        <input type="text" name="image" id="image" class="form-control my-2" placeholder="Upload d'images ci-dessous">
                                        @endif
                                        <input type="hidden" value="{{$post->id}}" name="post_id">
                                        <input type="submit" value="envoyer" class="my-2 btn-success">
                                    </div>
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection