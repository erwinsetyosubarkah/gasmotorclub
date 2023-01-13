@extends('admin.layouts.main')

@section('content')    
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambah">
    <i class="fas fa-plus"></i>  Tambah
  </button>
<table id="table-category" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Kategori</th>
      <th class="text-center">Slug</th>
      <th class="text-center">Aksi</th>
    </tr>    
    </thead>

    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($categories as $item)
        <tr>
            <td class="text-center">{{ $i }}</td>
            <td class="text-center">{{ $item->category_name }}</td>
            <td class="text-center">{{ $item->category_slug }}</td>
            <td class="text-center">
              <a href="/admin-category-edit/{{ $item->id }}" class="badge badge-warning mr-2 ml-2 btn-edit border-0"><i class="fas fa-edit"></i>  Ubah</a>
              <form action="/admin-category/{{ $item->id }}" method="POST" class="d-inline form-hapus" >
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
            <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin-category" method="POST">
              @csrf
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="category_name">Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name"  placeholder="Masukan nama club..." minlength="5" required value="{{ old('category_name') }}"> 
                        @error('category_name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                        <label for="category_slug">Slug</label>
                        <input type="text" class="form-control @error('category_slug') is-invalid @enderror" id="category_slug" name="category_slug"  placeholder="Masukan Slug" minlength="5" required value="{{ old('category_slug') }}"> 
                        @error('category_slug')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
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
    let table_category = $('#table-category').DataTable({
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

    $('#category_name').on('keyup',function () {
      $('#category_slug').val(string_to_slug($(this).val()));
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

</script>
@endsection