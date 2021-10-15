@extends('layouts.app')

@section('content')
<h2 class="text-center mt-3">Bonjour {{$user->pseudo}}, modifie ici tes informations !</h2>

<div class="container text-dark">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifiez vos informations') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('updateaccount') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$user->nom}}" required autocomplete="nom" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{$user->prenom}}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{$user->pseudo}}" required autocomplete="pseudo" autofocus>

                                @error('pseudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jeux" class="col-md-4 col-form-label text-md-right">{{ __('Jeux') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('jeux') is-invalid @enderror" name="jeux" value="{{$user->jeux}}" required autocomplete="jeux">

                                @error('jeux')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="armées" class="col-md-4 col-form-label text-md-right">{{ __('Armées') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('armées') is-invalid @enderror" name="armées" value="{{$user->armées}}" required autocomplete="armées">

                                @error('armées')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="liens" class="col-md-4 col-form-label text-md-right">{{ __('Liens FB / Twitter ...') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('liens') is-invalid @enderror" name="liens" value="{{$user->liens}}" required autocomplete="liens">

                                @error('liens')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo de profil') }}</label>
                        <div class="col-md-6">
                            @if(Session::get('image'))
                            <input type="text" class="form-control" name="imageprofil" id="image" value="{{Session::get('image')}}">
                            @else
                            <input type="text" name="imageprofil" id="image" value="{{$user->imageprofil}}" class="form-control my-2" placeholder="Upload d'images ci-dessous">
                            @endif
                            <button class="button is-link btn-success" type="submit">Envoyer</button>
                        </div>
                    </div>
                    </form>
                    <div class="">
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection