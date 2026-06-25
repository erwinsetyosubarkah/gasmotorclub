@extends('layouts.main')

@section('content')
    <section class="banner" style="background: url('{{ asset('storage/banner.png') }}') no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xl-7">
                    <div class="block">
                        <div class="divider mb-3"></div>
                        <h3 class="text-uppercase letter-spacing text-white">Solid community with sharing </h3>

                        <p class="mb-4 pr-5 text-white"> {!! $profile->short_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-block d-lg-flex">
                        <div class="col-lg-12 testimonial-wrap-2">
                            @foreach ($galeries as $galery)
                            <div class="testimonial-block style-2  gray-bg feature-item">
                                <div class="">
                                    <img src="{{ asset('storage/'.$galery->galery_image) }}" alt="" class="img-fluid">
                                </div>
                                <div class="position-absolute" style="top: 50px; background-color: rgb(253, 251, 251, 0.8); box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);">
                                    <h5>{{ $galery->image_title }}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="newest-articles mt-5">
        <div class="container">
            <h4 class="text-capitalize">Artikel Terbaru</h4>
            <div class="divider mb-4"></div>
            @if ($articles->count())
            <div class="row">
                @foreach ($articles as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
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
            @else
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center p-3 mb-5">
                            Produk tidak ditemukan.
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
