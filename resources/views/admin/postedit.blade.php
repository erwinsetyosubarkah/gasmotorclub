@extends('admin.layouts.main')

@section('content')    
<form action="/admin-post-edit/{{ $post->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="title">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Masukan nama produk..." required value="{{ $post->title }}"> 
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ $post->slug }}" placeholder="Masukan slug..."> 
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="category_id">Kategori</label>
      <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        @foreach ($categories as $category)
          @if($post->category->id == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endif                            
        @endforeach
      </select>                        
      @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
    <label for="post_image">Foto</label>
    <input type="file" class="form-control" id="post_image" name="post_image" onchange="previewImage()">   
    <img id='imgPreview' src="{{ asset('storage/' . $post->post_image) }}" class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" />   
    <input type="hidden" name="old_post_image" value="{{ $post->post_image }}">     
  </div>
  <div class="form-group">
    <label for="body">Artikel</label>
    <textarea class="form-control ckeditor" id="body" name="body">{{ $post->body }}</textarea>        
  </div>    
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>
@endsection

@section('script')
<script>
  $(document).ready(function () { 

    $('#title').on('keyup',function () {
      $('#slug').val(string_to_slug($(this).val()));
    });

  });

  function previewImage(){
      const image = document.querySelector('#post_image');
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