@extends('admin.layouts.main')

@section('content') 
<form action="/admin-myclient-edit/{{ $myclient->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="client_name">Nama Klien</label>
      <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name"  placeholder="Masukan nama klien..." minlength="5" required value="{{ $myclient->client_name }}"> 
      @error('client_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="company_name">Perusahaan</label>
      <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" minlength="5" required value="{{ $myclient->company_name }}"> 
      @error('company_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div> 
  <div class="form-group">
    <label for="client_image">Foto</label>
    <input type="file" class="form-control" id="client_image" name="client_image" onchange="previewImage()">   
    <img src='{{ asset('storage/' . $myclient->client_image) }}' id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" /> 
    <input type="hidden" name="old_client_image" value="{{ $myclient->client_image }}">        
  </div>
  <div class="form-group">
    <label for="client_address">Deskripsi</label>
    <textarea class="form-control ckeditor" id="client_address" name="client_address">{{ $myclient->client_address }}</textarea>        
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
      const image = document.querySelector('#client_image');
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