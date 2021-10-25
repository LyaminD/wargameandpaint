@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5 py-5">
        <h1 class="py-5">Gestion des posts</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">id_post</th>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                </tr>
                            </thead>
                            @foreach ($post as $post)
                            <tbody class="table-body">
                                <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                                    <td class="text-center">{{$post->id}}</td>
                                    <td>{{$post->titre}}</td>
                                    <td>{{$post->content}}</td>
                                    <th>
                                        <form action="{{route('destroyPost',$post->id)}}" method="post">
                                            @CSRF
                                            @method('delete')
                                            <input type="submit" value="Supprimer le post" class="btn btn-danger">
                                        </form>
                                    </th>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection