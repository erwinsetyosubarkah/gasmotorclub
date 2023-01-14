@extends('layouts.main')

@section('content')   
  <section class="section doctor-single shadow mb-4" style="padding: 0 !important;">
      <div class="container">
          <div class="row">   
              <div class="col-lg-12">
                  <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{ $page_title }}</h2>                                     
                      <div class="divider my-4"></div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-6">
                                <form action="/galery">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukan kata kunci..." name="search">
                                        <div class="input-group-append">
                                        <button class="btn btn-primary" style="background-color: #223a66 !important;" type="submit" id="button-addon2">Cari</button>
                                        </div>
                                    </div>
                                </form>   
                            </div>
                        </div>      
                        <div class="container">                            
                            <div class="row align-items-center">
                                @if ($clients->count())
                                <div class="col-lg-12 testimonial-wrap-2">
                                    @foreach ($clients as $item)
                                    <div class="testimonial-block style-2  gray-bg shadow">
                                        <i class="icofont-quote-right"></i>                        
                                        <div class="testimonial-thumb">
                                            <img src="{{ asset('storage/'. $item->client_image) }}" alt="{{ $item->client_name }}"  class="img-fluid" id="prevImg" style="cursor: zoom-in;" onclick="zoomImg()">
                                        </div>
                        
                                        <div class="client-info ">
                                            <h4>{{ $item->client_name }}</h4>
                                            <span>{!! $item->company_name !!}</span>
                                            <p>
                                                {{ $item->client_address }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $clients->links() }}
                                </div>
                                @else                                
                                    <span>Produk tidak ditemukan.</span>                                    
                                @endif
                            </div>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
 
@endsection

@section('script') 
<script>
    function zoomImg(){
      let src = $('#prevImg').attr('src');
      previmg(src);
    }
</script>
@endsection



