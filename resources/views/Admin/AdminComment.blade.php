@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5 py-5">
        <h1 class="py-5">Gestion des commentaires</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">id_commentaire </th>
                                    <th>Post_id</th>
                                    <th>User_id</th>
                                    <th>Contenu</th>
                                </tr>
                            </thead>
                            @foreach ($commentaire as $commentaire )
                            <tbody class="table-body">
                                <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                                    <td class="text-center">{{$commentaire ->id}}</td>
                                    <td>{{$commentaire ->post_id}}</td>
                                    <td>{{$commentaire ->user_id}}</td>
                                    <td>{{$commentaire ->content}}</td>
                                    <th>
                                        <form action="{{route('destroyComment',$commentaire ->id)}}" method="post">
                                            @CSRF
                                            @method('delete')
                                            <input type="submit" value="Supprimer le commentaire" class="btn btn-danger">
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