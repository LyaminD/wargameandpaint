@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5 py-5">
        <h1 class="py-5">Gestion des utilisateurs</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">id_user</th>
                                    <th>Pseudo</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            @foreach ($user as $user)
                            <tbody class="table-body">
                                <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                                    <td class="text-center">{{$user->id}}</td>
                                    <td>{{$user->pseudo}}</td>
                                    <td>{{$user->email}}</td>
                                    <th>
                                        <form action="{{route('destroyUser',$user->id)}}" method="post">
                                            @CSRF
                                            @method('delete')
                                            <input type="submit" value="Supprimer l'utilisateur" class="btn btn-danger">
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