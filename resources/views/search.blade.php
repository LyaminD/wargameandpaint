@extends('layouts.app')

@section('content')

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
                                    <div class="col pr-lg-5"><img class=" img-1 mr-lg-5 " src="images/{{ $post->imageprofil }}" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center border-0 mt-0 pt-0 mb-3">
                        <div class="row text-center name mt-auto ">
                            <div class="col">
                                <h4 class="mb-0">{{ $post->pseudo}}</h4>
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
                            <p class="bold text-center px-md-3"><img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm">{{ $post->image}}</p>
                        </div>
                    </div>
                    <div class="card-body text-center pb-3 ">
                        <div class="row justify-content-center">
                            <div class="col text-center justify-content-center ">
                                <p class="bold text-center px-md-3">tags</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-auto mb-4">
                    <div class="text-center">
                        @if (Auth::user()->can('update', $post))
                        <a href="{{route('posts.edit',$post)}}">
                            <button>Modifier le post</button></a>
                        @endif
                    </div>

                    <div class="text-center">
                        @if (Auth::user()->can('delete', $post))
                        <form action="{{route('posts.destroy',$post)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="supprimer"> <i class="fas fa-times-circle"></i>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection