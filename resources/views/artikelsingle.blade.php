@extends('layouts.main')

@section('content')   
  <section class="section doctor-single shadow mb-4" style="padding: 0 !important;">
      <div class="container">
          <div class="row">   
              <div class="col-lg-12">
                  <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{ $page_title }}</h2>                                     
                            <div class="divider my-4"></div>
                                    
                                    <section class="section blog-wrap" style="padding:0 !important;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="single-blog-item">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-lg-6">
                                                        <img src="{{ asset('storage/'. $artikel->post_image) }}" alt="" class="img-fluid shadow">
                                                    </div>
                                                </div>
                                    
                                                <div class="blog-item-content mt-5 pl-4 pr-4">
                                                    <div class="blog-item-meta mb-3">
                                                        <span class="text-color-2 text-capitalize mr-3"><i class="icofont-book-mark mr-2"></i> {{ $artikel->category->category_name }}</span>
                                                        <span class="text-black text-capitalize mr-3 float-right"><i class="icofont-calendar mr-2"></i>  {{ $artikel->created_at->diffForHumans() }}</span>
                                                    </div> 
                                                    <h2 class="mb-4 text-md"><a href="">{{ $artikel->title }}</a></h2>
                                                                                       
                                                    {!! $artikel->body !!}
                                    
                                                    <div class="mt-5">    
                                                        <ul class="float-right list-inline">
                                                            <li class="list-inline-item"> Share: </li>
                                                            <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-facebook" aria-hidden="true"></i></a></li>
                                                            <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-twitter" aria-hidden="true"></i></a></li>
                                                            <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-pinterest" aria-hidden="true"></i></a></li>
                                                            <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-linkedin" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
       
                              </div>
                            </div>   
                        </div>
                                 
                        </div>
                    </section>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
 
@endsection