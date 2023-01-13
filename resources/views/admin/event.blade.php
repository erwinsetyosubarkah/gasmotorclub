@extends('admin.layouts.main')

@section('content')    
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambah">
    <i class="fas fa-plus"></i>  Tambah
  </button>
<table id="table-event" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Gambar Event</th>
      <th class="text-center">Nama Event</th>
      <th class="text-center">Tanggal</th>
      <th class="text-center">Deskripsi</th>
      <th class="text-center">Aksi</th>
    </tr>    
    </thead>

    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($events as $item)
        <tr>
            <td class="text-center">{{ $i }}</td>
            <td class="text-center"><img src="{{ asset('storage/'. $item->event_image) }}" alt="{{ $item->event_title }}" class="" height="100"></td>
            <td class="text-center">{{ $item->event_title }}</td>
            @php
               $item->event_date = date("d-m-Y H:i:s",strtotime($item->event_date))
            @endphp
            <td class="text-center">{{ $item->event_date }}</td>
            @php
                $item->event_description = substr(strip_tags($item->event_description), 0, 100) . '...';
            @endphp
            <td class="text-center">{{ $item->event_description }}</td>
            <td class="text-center">
              <a href="/admin-event-edit/{{ $item->id }}" class="badge badge-warning mr-2 ml-2 btn-edit border-0"><i class="fas fa-edit"></i>  Ubah</a>
              <form action="/admin-event/{{ $item->id }}" method="POST" class="d-inline form-hapus" >
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
            <form action="/admin-event" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="event_title">Nama Event</label>
                        <input type="text" class="form-control @error('event_title') is-invalid @enderror" id="event_title" name="event_title"  placeholder="Masukan nama event..." required value="{{ old('event_title') }}"> 
                        @error('event_title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror         
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                        <div class="input-group date" id="event_date" data-target-input="nearest">
                            <input type="text" name="event_date" class="form-control datetimepicker-input @error('event_date') is-invalid @enderror" data-target="#event_date" required value="{{ old('event_date') }}">
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
                      <label for="event_image">Gambar Event</label>
                      <input type="file" class="form-control" id="event_image" name="event_image" onchange="previewImage()">   
                      <img id='imgPreview' class="mb-2 mb-md-4 shadow-1-strong rounded" style="cursor: zoom-in;" width="100" onClick="zoomImg()" />        
                    </div>
                    <div class="form-group">
                      <label for="event_description">Deskripsi</label>
                      <textarea class="form-control ckeditor" id="event_description" name="event_description">{{ old('event_description') }}</textarea>        
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
    let table_event = $('#table-event').DataTable({
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

          //Date and time picker
    $('#event_date').datetimepicker({ 
      icons: { time: 'far fa-clock' },
      format: 'DD-MM-YYYY HH:mm:ss',
      locale: 'id',
    });


  });

  function previewImage(){
      const image = document.querySelector('#event_image');
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