@extends('layouts.app')

@section('content')

<section class="">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">Fil d'actualité</h1>
        @if( count($posts) == 0)
        <p>Pas de posts</p>
        @else
        <div>{{$posts[0]->faction->nom}}</div>

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
        @endif
    </div>
</section>
@endsection