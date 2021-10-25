@extends('layouts.app')

@section('content')

<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="{{ asset("images/$user->imageprofil") }}" width="130" class="rounded mb-2 img-thumbnail"><a href="#" class="btn btn-outline-dark btn-sm btn-block">Changez la photo de profil</a></div>
                    <div class="media-body mb-5 text-light">
                        <h4 class="mt-0 mb-4">{{ $user->pseudo}}</h4>
                    </div>
                </div>
            </div>
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block text-dark">{{count($user->images)}}</h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light ">
                    <p class="font-italic mb-0 text-dark">Jeux joués :{{$user->jeux}}</p>
                    <p class="font-italic mb-0 text-dark">Armées jouées :{{$user->armées}}</p>
                    <p class="font-italic mb-0 text-dark">Liens :{{$user->liens}}</p>
                </div>
            </div>
            <div class="px-4 py-3 ">
                <h5 class="mb-0 text-dark">Me suivre et être prévenu de mes futurs posts !</h5>

                @unless (auth()->user()->is($user))

                <form method="POST" action="{{ route('follow',$user)}}">
                    @csrf
                    <a href="">
                        <button type="submit" class="btn btn-warning shadow ml-3">
                            {{ auth()->user()->isFollowing($user) ? 'Se désabonner' : 'S\'abonner' }}
                        </button>
                    </a>
                </form>

                @endif
            </div>
            <div class="py-4 px-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Voir toutes les photos
                </button>
                <!-- Modal -->
                <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mes photos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($user->images as $image)
                                        <div class="carousel-item <?php if ($loop->iteration == 1) {
                                                                        echo "active";
                                                                    } ?>">
                                            <img src="{{ asset("images/$image->name") }}" class="d-block w-100" alt="...">
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($user->images as $image)
                <?php if ($loop->iteration < 5) {
                    echo "  <img src=\"" . asset("images/$image->name") . "\" class=\"img-fluid rounded shadow-sm w-50\">";
                }
                ?>
                @endforeach
            </div>
            <div class="p-2 ">
                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12 my-2">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12 my-2 text-center">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
                <form action="{{route('deleteUser',$user)}}" method="post">
                    @CSRF
                    @method('delete')
                    <input type="submit" value="Supprimer mon compte" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>

<section class="">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">Mes derniers posts</h1>
        @foreach ($posts as $post)
        <article class="postcard dark blue">

            <a class="postcard__img_link" href="{{route('profil',$post->user_id)}}"> @foreach ($post->images as $image)
                <img class="postcard__img" src="{{ asset("images/$image->name") }}" alt="Image Title" />
                @endforeach</a>

            <div class="postcard__text">
                <h3 class="postcard__title blue mx-3 text-center"><img src="images/{{ $post->user->imageprofil }}" class="rounded-circle mx-3"><a href="#">{{ $post->user->pseudo}}</a></h3>
                <h2 class="postcard__title blue text-center">{{ $post->titre}}</h2>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt text-center">{{ $post->content}}</div>
                <ul class="postcard__tagbox justify-content-center">
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

                <form action="{{route('commentaires.store')}}" method="post" class="">
                    @csrf

                    <div class="commentaire text-center my-2 ">
                        <div class="commentaire-input champcommentaire ">
                            <h3>Commente !</h3>
                            <input type="text" name="content" class="form-control" placeholder="Commentaire">
                            <input type="hidden" value="{{$post->id}}" name="post_id" class="">
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