@extends('admin.layouts.main')

@section('content')    
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambah">
    <i class="fas fa-plus"></i>  Tambah
  </button>
<table id="table-post" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Gambar Arikel</th>
      <th class="text-center">Judul</th>
      <th class="text-center">Slug</th>
      <th class="text-center">Artikel</th>
      <th class="text-center">Kategori</th>
      <th class="text-center">Author</th>
      <th class="text-center">Aksi</th>
    </tr>    
    </thead>

    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($posts as $item)
        <tr>
            <td class="text-center">{{ $i }}</td>
            <td class="text-center"><img src="{{ asset('storage/'. $item->post_image) }}" alt="{{ $item->title }}" class="" height="100"></td>
            <td class="text-center">{{ $item->title }}</td>
            <td class="text-center">{{ $item->slug }}</td>
            <td class="text-center">{{ strip_tags($item->excerpt) }}</td>
            <td class="text-center">{{ $item->category->category_name }}</td>
            <td class="text-center">{{ $item->user->name }}</td>
            <td class="text-center">
              <a href="/admin-post-edit/{{ $item->id }}" class="badge badge-warning mr-2 ml-2 btn-edit border-0"><i class="fas fa-edit"></i>  Ubah</a>
              <form action="/admin-post/{{ $item->id }}" method="POST" class="d-inline form-hapus" >
                @method('delete')
                @csrf
                <input type="hidden" name="_method" >
                <button type="submit" class="badge badge-danger mr-2 ml-2 btn-hapus border-0"><i class="fas fa-trash"></i>  Hapus</button>
              </form>
            </td>
          
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    
</table>

  
  <!-- Modal Tambah-->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTambahLabel">Tambah Artikel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin-post" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Masukan nama produk..." required value="{{ old('title') }}"> 
                        @error('title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}" placeholder="Masukan slug..."> 
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
                            @if(old('category_id') ==       $category->id)
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
                      <img id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" />        
                    </div>
                    <div class="form-group">
                      <label for="body">Artikel</label>
                      <textarea class="form-control ckeditor" id="body" name="body">{{ old('body') }}</textarea>        
                    </div>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script') 
<script>

$(document).ready(function () { 
    let table_post = $('#table-post').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "language": {
          "decimal":        "",
          "emptyTable":     "Tidak ada data ditemukan di tabel",
          "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          "infoEmpty":      "Menampilkan 0 dari 0 dari 0 data",
          "infoFiltered":   "(Difilter dari _MAX_ total data)",
          "infoPostFix":    "",
          "thousands":      ",",
          "lengthMenu":     "Menampilkan _MENU_ data",
          "loadingRecords": "Loading...",
          "processing":     "",
          "search":         "Cari:",
          "zeroRecords":    "Tidak ada data ditemukan",
          "paginate": {
              "first":      "Pertama",
              "last":       "Terakhir",
              "next":       "Selanjutnya",
              "previous":   "Sebelumnya"
          }
        }
        
    });
    
    $('#title').on('keyup',function () {
      $('#slug').val(string_to_slug($(this).val()));
    });

    $('.btn-hapus').click(function(e){
        var form =  $(this).closest("form");
        e.preventDefault();
        Swal.fire({
          title: 'Apa anda yakin ?',
          text: "Anda tidak akan dapat mengembalikan ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        })
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