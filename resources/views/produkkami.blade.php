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
                                <form action="/produkkami">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukan kata kunci..." name="search">
                                        <div class="input-group-append">
                                        <button class="btn btn-primary" style="background-color: #223a66 !important;" type="submit" id="button-addon2">Cari</button>
                                        </div>
                                    </div>
                                </form>   
                            </div>
                        </div>      
                      <section class="section service-2" style="padding: 0 !important;">
                        <div class="container">
                            @if ($produkkami->count())                                
                            
                            <div class="row">
                                @foreach ($produkkami as $item)                                   
                                
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="service-block">
                                        <img src="{{ asset('storage/'. $item->product_image) }}" alt="{{ $item->product_name }}" class="img-fluid">
                                        <div class="content">
                                            <h4 class="mt-4 mb-2 title-color"><a href="/produkkami/{{ $item->id }}">{{ $item->product_name }}</a></h4>
                                            <small class=""> <strong> Stock : {{ $item->stock }}</strong></small>
                                            <small class="float-right"><strong> Harga : Rp. {{ number_format($item->price,0,',','.') }}</strong></small>
                                            <p class="mb-4 mt-2">{!! $item->product_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $produkkami->links() }}
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center p-3">
                                         Produk tidak ditemukan.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
 
@endsection