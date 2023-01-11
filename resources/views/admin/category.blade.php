@extends('admin.layouts.main')

@section('content')    
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
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
            <td class="text-center"><a href="" class="btn btn-warning mr-2 ml-2"><i class="fas fa-edit"></i>  Ubah</a><a href="" class="btn btn-danger mr-2 ml-2"><i class="fas fa-trash"></i>  Hapus</a></td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    
</table>

  
  <!-- Modal Tambah-->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="" method="POST">
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="category_name">Kategori</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"  placeholder="Masukan nama club...">          
                    </div>
                    <div class="form-group">
                        <label for="category_slug">Slug</label>
                        <input type="category_slug" class="form-control" id="category_slug" name="category_slug"  placeholder="Masukan Slug">          
                    </div>
         
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script') 
<script>

$(document).ready(function () { 
    $('#table-category').DataTable({
        "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
            "lengthMenu": "Menampilkan _MENU_ data per halaman",
            "zeroRecords": "Data Tidak Ditemukan - Maaf",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data Tidak Ada",
            "infoFiltered": "(difilter dari _MAX_ total data)"
        }
        
    });
  });

</script>
@endsection