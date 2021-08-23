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
                        <h4 class="mt-0 mb-0">{{ $user->pseudo}}</h4>
                        <p class="small mb-4 text-light"> <i class="fas fa-map-marker-alt mr-2"></i>New York</p>
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
                <div class="button-div">
                    <a href="" class="btn btn-primary" role="button" data-bs-toggle="button">Me suivre</a>
                </div>
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
                                        <div class="carousel-item <?php if ($loop->iteration == 1) { echo "active"; }?>">
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
                     echo "  <img src=\"". asset("images/$image->name") ."\" class=\"img-fluid rounded shadow-sm w-50\">";}
                 ?>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <form>
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

@foreach ($user->posts as $post)
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
                                <p><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star text-warning mr-1"></span><span class="fa fa-star-half-o text-warning mr-1"></span><span class="fa fa-star-o text-warning mr-1"></span></p>
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
                            <p class="bold text-center px-md-3"><img src="images/{{ $post->image->name }}" class="img-fluid rounded shadow-sm"></p>
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
                        <div class="d-flex flex-row mb-2"><img src="images/{{ $commentaire->user->imageprofil }}" width="40" class="rounded-image">
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
                                <button class="text-danger"> <i class="fas fa-times-circle"></i></button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="p-2">
                        <form action="{{route('commentaires.store')}}" method="post">
                            @csrf
                            <div class="comments  text-center my-2">
                                <h3>Commente !</h3>
                                <div class="commentaire-input"> <input type="text" name="content" class="form-control" placeholder="Commentaire">
                                    <h3>Tags</h3>
                                    <input type="text" name="tags" class="form-control" placeholder="Tags">
                                    <h3>Joindre une image</h3>
                                    <input type="text" name="image" class="form-control" placeholder="Images">
                                    <input type="hidden" value="{{$post->id}}" name="post_id">
                                    <input type="submit" value="envoyer" class="my-2 btn-success">
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