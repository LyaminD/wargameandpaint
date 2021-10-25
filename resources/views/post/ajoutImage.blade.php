@extends('layouts.app')

@section('content')

<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row my-3">
        <input type="hidden" name="post" value="true">
        <div class="col-md-6 my-2">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <button type="submit" class="btn btn-success">Upload ton image</button>
        </div>
    </div>
</form>
@endsection