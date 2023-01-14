@extends('admin.layouts.main')

@section('content')    
<form action="/admin-galery-edit/{{ $galery->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="image_title">Judul</label>
      <input type="text" class="form-control @error('image_title') is-invalid @enderror" id="image_title" name="image_title"  placeholder="Masukan judul foto..." minlength="5" required value="{{ $galery->image_title }}"> 
      @error('image_title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
    <label for="galery_image">Foto</label>
    <input type="file" class="form-control" id="galery_image" name="galery_image" onchange="previewImage()">   
    <img src='{{ asset('storage/' . $galery->galery_image) }}' id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" /> 
    <input type="hidden" name="old_galery_image" value="{{ $galery->galery_image }}">        
  </div> 
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>
@endsection

@section('script')
<script>
  $(document).ready(function () { 


  });

  function previewImage(){
      const image = document.querySelector('#galery_image');
      const imgPreview = document.querySelector('#imgPreview');
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    function zoomImg(){
      let src = $('#imgPreview').attr('src');
      previmg(src);
    }
  </script>
@endsection