@extends('admin.layouts.main')

@section('content')    
<form action="/admin-myproduct-edit/{{ $myproduct->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="product_name">Nama Produk</label>
      <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name"  placeholder="Masukan nama produk..." minlength="5" required value="{{ $myproduct->product_name }}"> 
      @error('product_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="stock">Stok</label>
      <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" minlength="5" required value="{{ $myproduct->stock }}"> 
      @error('stock')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>       
  <div class="form-group">
      <label for="price">Harga</label>
      <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" minlength="5" required value="{{ $myproduct->price }}"> 
      @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>   
  <div class="form-group">
    <label for="product_image">Foto Produk</label>
    <input type="file" class="form-control" id="product_image" name="product_image" onchange="previewImage()">   
    <img src='{{ asset('storage/' . $myproduct->product_image) }}' id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" /> 
    <input type="hidden" name="old_product_image" value="{{ $myproduct->product_image }}">        
  </div>
  <div class="form-group">
    <label for="product_description">Deskripsi</label>
    <textarea class="form-control ckeditor" id="product_description" name="product_description">{{ $myproduct->product_description }}</textarea>        
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
      const image = document.querySelector('#product_image');
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