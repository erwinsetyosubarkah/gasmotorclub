@extends('admin.layouts.main')

@section('content')    
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambah">
    <i class="fas fa-plus"></i>  Tambah
  </button>
<table id="table-myproduct" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto Produk</th>
      <th class="text-center">Nama Produk</th>
      <th class="text-center">Stok</th>
      <th class="text-center">Harga</th>
      <th class="text-center">Deskripsi Produk</th>
      <th class="text-center">Aksi</th>
    </tr>    
    </thead>

    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($myproducts as $item)
        <tr>
            <td class="text-center">{{ $i }}</td>
            <td class="text-center"><img src="{{ asset('storage/'. $item->product_image) }}" alt="{{ $item->product_name }}" class="" height="100"></td>
            <td class="text-center">{{ $item->product_name }}</td>
            <td class="text-center">{{ $item->stock }}</td>
            <td class="text-center">Rp. {{ number_format($item->price,0,',','.') }}</td>
            <td class="text-center">{{ $item->product_description }}</td>
            <td class="text-center">
              <a href="/admin-myproduct-edit/{{ $item->id }}" class="badge badge-warning mr-2 ml-2 btn-edit border-0"><i class="fas fa-edit"></i>  Ubah</a>
              <form action="/admin-myproduct/{{ $item->id }}" method="POST" class="d-inline form-hapus" >
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
            <h5 class="modal-title" id="modalTambahLabel">Tambah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin-myproduct" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name"  placeholder="Masukan nama produk..." required> 
                        @error('product_name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required> 
                        @error('stock')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required> 
                        @error('price')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                      <label for="product_image">Foto Produk</label>
                      <input type="file" class="form-control" id="product_image" name="product_image" onchange="previewImage()">   
                      <img id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" />        
                    </div>
                    <div class="form-group">
                      <label for="product_description">Deskripsi</label>
                      <textarea class="form-control ckeditor" id="product_description" name="product_description"></textarea>        
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
    let table_myproduct = $('#table-myproduct').DataTable({
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