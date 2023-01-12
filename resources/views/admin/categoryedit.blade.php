@extends('admin.layouts.main')

@section('content')    
<form action="/admin-category-edit/{{ $category->id }}" method="POST" id="form-edit">
  @csrf    
  <div class="form-group">
      <label for="category_name">Kategori</label>
      <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name"  placeholder="Masukan nama club..." minlength="5" required value="{{ $category->category_name }}"> 
      @error('category_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  <div class="form-group">
      <label for="category_slug">Slug</label>
      <input type="category_slug" class="form-control @error('category_slug') is-invalid @enderror" id="category_slug" name="category_slug"  placeholder="Masukan Slug" minlength="5" required value="{{ $category->category_slug }}"> 
      @error('category_slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>       
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>
@endsection

@section('script')
<script>
  $(document).ready(function () { 
    $('#category_name').on('keyup',function () {
      $('#category_slug').val(string_to_slug($(this).val()));
    });

  });

  function string_to_slug (str) {
      str = str.replace(/^\s+|\s+$/g, ''); // trim
      str = str.toLowerCase();
    
      // remove accents, swap ñ for n, etc
      var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
      var to   = "aaaaeeeeiiiioooouuuunc------";
      for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
      }
  
      str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes
  
      return str;
  }
  </script>
@endsection