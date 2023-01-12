@extends('admin.layouts.main')

@section('content')    
    <form action="" method="POST">
        <div class="form-group">
          <label for="club_name">Nama Club</label>
          <input type="text" class="form-control" id="club_name" name="club_name"  placeholder="Masukan nama club..." value="{{ $profile->club_name }}">          
        </div>
        <div class="form-group">
          <label for="club_name_abbreviation">Singkatan Nama Club</label>
          <input type="text" class="form-control" id="club_name_abbreviation" name="club_name_abbreviation"  placeholder="Masukan singkatan nama club..." value="{{ $profile->club_name_abbreviation }}">          
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
          <input type="file" class="form-control" id="club_logo" name="club_logo">  
          <img id='imgPreview'
          src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
          data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
          alt="Table Full of Spices"
          class="mb-2 mb-md-4 shadow-1-strong rounded" width="100"
        />        
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
      $('#club_logo').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

    $('#imgPreview').click(function(){
        const file = 'https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp';
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $(this).attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
</script>
@endsection