@extends('admin.layouts.main')

@section('content')    
    <form action="/admin-profile" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="club_name">Nama Club</label>
          <input type="text" class="form-control @error('club_name') is-invalid @enderror" id="club_name" name="club_name"  placeholder="Masukan nama club..." value="{{ $profile->club_name }}" required>   
          @error('club_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror        
        </div>
        <div class="form-group">
          <label for="club_name_abbreviation">Singkatan Nama Club</label>
          <input type="text" class="form-control @error('club_name_abbreviation') is-invalid @enderror" id="club_name_abbreviation" name="club_name_abbreviation"  placeholder="Masukan singkatan nama club..." value="{{ $profile->club_name_abbreviation }}" required>
          @error('club_name_abbreviation')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror           
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email"  placeholder="Masukan email contoh : example@dmail.com" value="{{ $profile->email }}">          
        </div>
        <div class="form-group">
          <label for="phone">Telephone / HP</label>
          <input type="tel" class="form-control" id="phone" name="phone"  placeholder="Masukan nomor telpon atau HP ..." value="{{ $profile->phone }}">          
        </div>
        <div class="form-group">
          <label for="club_logo">Logo Club</label>
          <input type="file" class="form-control" id="club_logo" name="club_logo" onchange="previewImage()">  
          <input type="hidden" name="old_club_logo" value="{{ $profile->club_logo }}">  
          <img id='imgPreview' src="{{ asset('storage/'. $profile->club_logo)  }}" class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" />        
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" cols="30" rows="2">{{ $profile->address }}</textarea>        
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control ckeditor" id="description" name="description">{{ $profile->description }}</textarea>        
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@endsection

@section('script')
<script>
    $(document).ready(()=>{

    });

    function previewImage(){
      const image = document.querySelector('#club_logo');
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