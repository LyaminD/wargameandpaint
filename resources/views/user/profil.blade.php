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
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block text-dark">745</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block text-dark">340</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
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

<section class="dark">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">Mes derniers posts</h1>
        @foreach ($posts as $post)
        <article class="postcard dark blue">

            <a class="postcard__img_link" href="{{route('profil',$post->user_id)}}"> @foreach ($post->images as $image)
                <img class="postcard__img" src="{{ asset("images/$image->name") }}" alt="Image Title" />
                @endforeach</a>


            <div class="postcard__text">
                <h3 class="postcard__title blue"><img src="{{ asset("images/$user->imageprofil") }}" width="50" class="rounded-circle"><a href="#">{{ $post->user->pseudo}}</a></h3>
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
    <div class="col-md-3 offset-md-5 ">
        {{ $posts->links() }}
    </div>
</section>
@endsection