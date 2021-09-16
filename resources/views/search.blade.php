@extends('layouts.app')

@section('content')



@foreach($users as $user)

<div>{{$user->pseudo}}</div>






@endforeach




@endsection