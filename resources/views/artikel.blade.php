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
                                <form action="/artikel">
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
                            @if ($artikels->count())                                
                            
                            <div class="row">
                                @foreach ($artikels as $item)                                   
                                
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="service-block">
                                        <img src="{{ asset('storage/'. $item->post_image) }}" alt="{{ $item->title }}" class="img-fluid" onclick="zoomImg()">
                                        <div class="content">
                                            <h4 class="mt-4 mb-2 title-color"><a href="/artikel/{{ $item->id }}">{{ $item->title }}</a></h4>
                                            <small class=""> <strong> <i class="icofont-book-mark mr-2"></i>{{ $item->category->category_name }}</strong></small>
                                            <small class="float-right"><strong> <i class="icofont-calendar mr-2"></i> {{ $item->created_at->diffForHumans() }}</strong></small>
                                            <p class="mb-4 mt-2">{!! $item->excerpt !!} <small><a href="/artikel/{{ $item->id }}">Selengkapnya</a></small></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $artikels->links() }}
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


