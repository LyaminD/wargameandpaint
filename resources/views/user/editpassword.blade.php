@extends('layouts.app')

@section('content')
<div class="container col-md-2 text-center border text-dark">
    <h2 class="border-bottom">Modifiez votre mot de passe !</h2>
    <form class="section" action="{{ route('updatepassword') }}" method="post">
        {{ csrf_field() }}

        <div class="col my-5">
            <label class="label">Nouveau mot de passe</label>
            <div class="control">
                <input class="input" type="password" name="password">
            </div>
            @if($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="col my-5">
            <label class="label">Mot de passe (confirmation)</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation">
            </div>
            @if($errors->has('password_confirmation'))
            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="col my-5">
            <div class="control">
                <button class="button is-link btn-success" type="submit">Modifier mon mot de passe</button>
            </div>
        </div>
    </form>
</div>









@endsection