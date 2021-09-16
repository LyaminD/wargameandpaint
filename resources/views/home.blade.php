@extends('layouts.app')

@section('content')
<!-- POSTER UN POST-->
<div class="mt-2 mb-5 text-center">
    <h1 class="text-dark my-5">Quoi de neuf ?</h1>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="p-2">
                    <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        <div class="posts my-3">
                            <h3>Ecris ton post en dessous</h3>
                            <div class="posts-input">
                                <input type="text" name="titre" class="form-control my-3" placeholder="Donne un titre">
                                <div class="posts-input">
                                    <input type="text" name="content" class="form-control my-3" placeholder="Ecrit ton post">
                                    <h3 class="my-3">Choisissez votre faction</h3>
                                    <select class="custom-select" name="faction">
                                        @foreach ($factions as $faction)
                                        <option value="{{$faction->id}}">{{ $faction->nom}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn-success">Envoyer</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="dark">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">Fil d'actualité</h1>
        @foreach ($posts as $post)
        <article class="postcard dark blue">

            <a class="postcard__img_link" href="{{route('profil',$post->user_id)}}"> @foreach ($post->images as $image)
                <img class="postcard__img" src="images/{{ $image->name }}" alt="Image Title" />
                @endforeach</a>

            <div class="postcard__text">
                <h3 class="postcard__title blue"><img src="images/{{ $post->user->imageprofil }}" width="50" class="rounded-circle"><a href="#">{{ $post->user->pseudo}}</a></h3>
                <h1 class="postcard__title blue"><a href="#">{{ $post->titre}}</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">{{ $post->content}}</div>
                <ul class="postcard__tagbox">
                    @if (Auth::user()->can('update', $post))
                    <a href="{{route('posts.edit',$post)}}">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Modifier le post</li>
                        @endif
                        @if (Auth::user()->can('delete', $post))
                        <form action="{{route('posts.destroy',$post)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="tag__item">
                        </form>
                        @endif
                </ul>
            </div>
        </article>
        @foreach($post->commentaires as $commentaire)
        <article class="postcard dark blue">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h3 class="postcard__title blue"><img src="images/{{ $commentaire->user->imageprofil }}" width="50" class="rounded-circle"><a href="{{route('profil',$commentaire->user_id)}}">{{ $commentaire->user->pseudo}}</a></h3>
                <h1 class="postcard__title blue">Les commentaires</h1>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">{{ $commentaire->content}}</div>
                <ul class="postcard__tagbox">
                    @if (Auth::user()->can('update', $commentaire))
                    <a href="{{route('commentaires.edit',$commentaire)}}">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Modifier le commentaire</li>
                        @endif
                        <form action="{{route('commentaires.destroy',$commentaire)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="tag__item">
                        </form>
                </ul>
            </div>
        </article>
        @endforeach
        @endforeach
    </div>
</section>


































@endsection