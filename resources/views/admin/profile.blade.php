@extends('admin.layouts.main')

@section('content')    
    <form action="" method="POST">
        <div class="form-group">
          <label for="club_name">Nama Club</label>
          <input type="text" class="form-control" id="club_name" name="club_name"  placeholder="Masukan nama club...">          
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email"  placeholder="Masukan email contoh : example@dmail.com">          
        </div>
        <div class="form-group">
          <label for="phone">Telephone / HP</label>
          <input type="tel" class="form-control" id="phone" name="phone"  placeholder="Masukan nomor telpon atau HP ...">          
        </div>
        <div class="form-group">
          <label for="club_logo">Logo Club</label>
          <input type="file" class="form-control" id="club_logo" name="club_logo">          
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" cols="30" rows="2"></textarea>        
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control ckeditor" id="description" name="description"></textarea>        
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@endsection