@extends('layouts.app')

@section('content')

<div class="container lst">

  <h3 class="well">Envoi plusieurs images !</h3>

  <form method="post" action="{{route('storeMultipleImg')}}" enctype="multipart/form-data">
    @csrf
    <div class="input-group hdtuto control-group lst increment">
      <input type="file" name="filenames[]" class="myfrm form-control">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Ajoute une autre image</button>
      </div>
    </div>
    <div class="clone hide">
      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
        <input type="file" name="filenames[]" class="myfrm form-control">
        <div class="input-group-btn">
          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Enlever l'image</button>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-success" style="margin-top:10px">Post les images</button>

  </form>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-success").click(function() {
      var lsthmtl = $(".clone").html();
      $(".increment").after(lsthmtl);
    });
    $("body").on("click", ".btn-danger", function() {
      $(this).parents(".hdtuto").remove();
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
  $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

      if (input.filenames) {
        var filesAmount = input.filenames.length;

        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function(event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
          }

          reader.readAsDataURL(input.filenames[i]);
        }
      }

    };

    $('#images').on('change', function() {
      multiImgPreview(this, 'div.imgPreview');
    });
  });
</script>

</body>
@endsection