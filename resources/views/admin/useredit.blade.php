@extends('admin.layouts.main')

@section('content') 
<form action="/admin-user-edit/{{ $user->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="name">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Masukan nama..." required value="{{ $user->name }}"> 
      @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"  placeholder="Masukan username..." required value="{{ $user->username }}"> 
      @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Masukan email..." required value="{{ $user->email }}"> 
      @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
    <label for="level">Level</label>
    <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
        @if( $user->level == 'admin')
          <option value="admin" selected>admin</option>
          <option value="author">author</option>
        @else
          <option value="admin">admin</option>
          <option value="author" selected>author</option>
        @endif      
    </select>                        
    @error('level')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror         
  </div>
  <div class="form-group">
    <label for="photo">Foto</label>
    <input type="file" class="form-control" id="photo" name="photo" onchange="previewImage()">   
    <img src='{{ asset('storage/' . $user->photo) }}' id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" /> 
    <input type="hidden" name="old_photo" value="{{ $user->photo }}">        
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
      const image = document.querySelector('#photo');
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