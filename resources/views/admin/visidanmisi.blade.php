@extends('admin.layouts.main')

@section('content')    
    <form action="/admin-visidanmisi" method="POST">
      @csrf
        <div class="form-group">
          <label for="title">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Masukan Judul..." value="{{ $visidanmisi->title }}" required>   
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror        
        </div>

        <div class="form-group">
            <label for="content">Isi Visi dan Misi</label>
            <textarea class="form-control ckeditor" id="content" name="content">{{ $visidanmisi->content }}</textarea>        
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@endsection
