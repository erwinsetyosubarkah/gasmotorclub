@extends('admin.layouts.main')

@section('content')    
<form action="/admin-event-edit/{{ $event->id }}" method="POST" id="form-edit" enctype="multipart/form-data">
  @csrf    
  <div class="form-group">
      <label for="event_title">Nama Event</label>
      <input type="text" class="form-control @error('event_title') is-invalid @enderror" id="event_title" name="event_title"  placeholder="Masukan nama produk..." minlength="5" required value="{{ $event->event_title }}"> 
      @error('event_title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror         
  </div>
  @php
    $event->event_date = date("d-m-Y H:i:s",strtotime($event->event_date))
  @endphp
  <div class="form-group">
    <label>Tanggal</label>
      <div class="input-group date" id="event_date" data-target-input="nearest">
          <input type="text" name="event_date" class="form-control datetimepicker-input @error('event_date') is-invalid @enderror" data-target="#event_date" required value="{{ $event->event_date }}">
          <div class="input-group-append" data-target="#event_date" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
      </div>
      @error('event_date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror 
  </div> 
  <div class="form-group">
    <label for="event_image">Foto Produk</label>
    <input type="file" class="form-control" id="event_image" name="event_image" onchange="previewImage()">   
    <img src='{{ asset('storage/' . $event->event_image) }}' id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" /> 
    <input type="hidden" name="old_event_image" value="{{ $event->event_image }}">        
  </div>
  <div class="form-group">
    <label for="event_description">Deskripsi</label>
    <textarea class="form-control ckeditor" id="event_description" name="event_description">{{ $event->event_description }}</textarea>        
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