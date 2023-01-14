@extends('layouts.main')

@section('content')   
  <section class="section doctor-single shadow mb-4" style="padding: 0 !important;">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6">
                  <div class="doctor-img-block">
                      <img src="{{ asset('storage/'. $profile->club_logo) }}" alt="{{ $profile->club_name }}" class="img-fluid w-50">
  
                      <div class="info-block mt-4">
                          <h4 class="mb-0">{{ $profile->leader_name }}</h4>
                          <p>{{ $profile->leader_email }}</p>
  
                          <ul class="list-inline mt-4 doctor-social-links">
                              <li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="icofont-skype"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="icofont-linkedin"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="icofont-pinterest"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
  
              <div class="col-lg-8 col-md-6">
                  <div class="doctor-details mt-4 mt-lg-0">
                      <h2 class="text-md">{{ $page_title }}</h2>
                      <div class="divider my-4"></div>
                      {!! $visidanmisi->content !!}
                  </div>
              </div>
          </div>
      </div>
  </section>
  
 
@endsection