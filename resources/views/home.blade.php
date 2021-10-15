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
                        <div class="posts my-3 text-dark">
                            <h3>Balance ton post</h3>
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
                                    <button class="btn-success mt-3">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    @foreach ($posts as $post)
    <div class="container">
        <div class="row post mb-5">
            <div class="col-md-6 blabla">
                @foreach ($post->images as $image)
                <div>
                    <img class="imagepost" src="images/{{ $image->name }}" alt="Image du post" />
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <img src="images/{{ $post->user->imageprofil }}" width="50" alt="Image du profil" class="rounded-circle mr-3"><a href="{{route('profil',$post->user_id)}}">{{ $post->user->pseudo}}</a></h3>
                </div>
                <h4 class="text-center">{{ $post->titre}}</h4>
                <div class="text-center">{{ $post->content}}</div>
                <ul class="">
                    @if (Auth::user()->can('update', $post))
                    <a href="{{route('posts.edit',$post)}}">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Modifier le post</li>
                    </a>
                    @endif
                    @if (Auth::user()->can('delete', $post))
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Supprimer" class="tag__item">
                    </form>
                    <form action="{{route('commentaires.store')}}" method="post">
                        @csrf
                        <div class="commentaire  text-center my-2">
                            <h3>Commente !</h3>
                            <div class="commentaire-input"> <input type="text" name="content" class="form-control" placeholder="Commentaire">
                                <input type="hidden" value="{{$post->id}}" name="post_id">
                                <input type="submit" value="envoyer" class="my-2 btn-success">
                            </div>
                        </div>
                    </form>
                    @endif
                </ul>
            </div>
            <div style="border-left:1px solid #000;height:500px"></div>
            <div class="col-md-5 blabla">
                <h2>Commentaires</h2>
                @foreach($post->commentaires as $commentaire)
                <h3 class=""><img src="images/{{ $commentaire->user->imageprofil }}" width="50" class="rounded-circle"><a href="{{route('profil',$commentaire->user_id)}}">{{ $commentaire->user->pseudo}}</a></h3>
                <div class="">{{ $commentaire->content}}</div>
                <ul class="">
                    @if (Auth::user()->can('update', $commentaire))
                    <a href="{{route('commentaires.edit',$commentaire)}}">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Modifier le commentaire</li>
                        @endif
                        @if (Auth::user()->can('delete', $commentaire))
                        <form action="{{route('commentaires.destroy',$commentaire)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="tag__item">
                        </form>
                        @endif
                </ul>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</section>
  
<section class="">
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
                        <i class="fas fa-calendar-alt mr-2"></i>
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">{{ $post->content}}</div>
                <ul class="postcard__tagbox">
                    @if (Auth::user()->can('update', $post))
                    <a href="{{route('posts.edit',$post)}}">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Modifier le post</li>
                    </a>
                    @endif
                    @if (Auth::user()->can('delete', $post))
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Supprimer" class="tag__item">
                    </form>
                    @endif

                </ul>
                <form action="{{route('commentaires.store')}}" method="post">
                    @csrf
                    <div class="commentaire  text-center my-2">
                        <h3>Commente !</h3>
                        <div class="commentaire-input"> <input type="text" name="content" class="form-control" placeholder="Commentaire">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="submit" value="envoyer" class="my-2 btn-success">
                        </div>
                    </div>
                </form>
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
                        @if (Auth::user()->can('delete', $commentaire))
                        <form action="{{route('commentaires.destroy',$commentaire)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="tag__item">
                        </form>
                        @endif
                </ul>
            </div>
        </article>
        @endforeach
        @endforeach
    </div>
</section>
@endsection