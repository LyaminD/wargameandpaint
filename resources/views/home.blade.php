@extends('layouts.app')

@section('content')
<!-- POSTER UN POST-->
<div class="mt-2 mb-5 text-center postier">
    <h2 class="text-dark my-5">Quoi de neuf ?</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col d-flex justify-content-center">
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

<section class="post">
    <div class="container py-4">
        <h2 class="text-center" id="pageHeaderTitle">Fil d'actualité</h2>
        @foreach ($posts as $post)
        <article class="postcard dark blue">

            <a class="postcard__img_link" href="{{route('profil',$post->user_id)}}"> @foreach ($post->images as $image)
                <img class="postcard__img" src="images/{{ $image->name }}" alt="Image Title" />
                @endforeach</a>

            <div class="postcard__text">
                <h3 class="postcard__title blue mx-3 text-center"><img src="images/{{ $post->user->imageprofil }}" width="50" class="rounded-circle mx-3"><a href="#">{{ $post->user->pseudo}}</a></h3>
                <h2 class="postcard__title blue text-center">{{ $post->titre}}</h2>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt text-center">{{ $post->content}}</div>
                <ul class="postcard__tagbox">
                    @if (Auth::user()->can('update', $post))
                    <a href="{{route('posts.edit',$post)}}">
                        <input type="submit" value="Modifier le post" class="tag__item text-white">
                    </a>
                    @endif
                    @if (Auth::user()->can('delete', $post))
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Supprimer" class="tag__item text-white">
                    </form>
                    @endif

                </ul>
                <form action="{{route('commentaires.store')}}" method="post">
                    @csrf
                    <div class="commentaire d-flex text-center my-2">
                        <h3 class="text-center">Commente !</h3>
                        <div class="commentaire-input text-center"> <input type="text" name="content" class="form-control" placeholder="Commentaire">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="submit" value="envoyer" class="my-2 btn-success">
                        </div>
                    </div>
                </form>
                <div class="col text-center">
                    <a class="btn btn-info mb-2 mt-2" onclick="document.getElementById('formulairecommentaire{{$post->id}}').style.display = 'block'">Afficher les commentaires
                    </a>
                    <button class="btn btn-danger" onclick="document.getElementById('formulairecommentaire{{$post->id}}').style.display = 'none'">
                        Cacher les commentaires
                    </button>
                </div>
            </div>
        </article>

        <article class="postcard dark blue" id="formulairecommentaire{{$post->id}}" style="display:none">
            <h2 class="postcard__title blue text-center">Les commentaires</h2>
            @foreach($post->commentaires as $commentaire)
            <div class="postcard__text">
                <h3 class="postcard__title blue"><img src="images/{{ $commentaire->user->imageprofil }}" width="50" class="rounded-circle">
                    <a href="{{route('profil',$commentaire->user_id)}}">{{ $commentaire->user->pseudo}}</a>
                </h3>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">{{ $commentaire->content}}</div>
                <ul class="postcard__tagbox">
                    @if (Auth::user()->can('update', $commentaire))
                    <a href="{{route('commentaires.edit',$commentaire)}}">
                        <input type="submit" value="Modifier le commentaire" class="tag__item text-white">
                        @endif
                        @if (Auth::user()->can('delete', $commentaire))
                        <form action="{{route('commentaires.destroy',$commentaire)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer" class="tag__item text-white">
                        </form>
                        @endif
                </ul>
            </div>
            @endforeach
        </article>
        <hr class="mt-5 mb-5">
        @endforeach
    </div>
    <div class="col-md-3 offset-md-5 ">
        {{ $posts->links() }}
    </div>
    
    
</section>
@endsection