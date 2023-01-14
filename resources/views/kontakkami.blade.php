@extends('layouts.main')

@section('content')   
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">{{ $page_title }}</span>
            <h1 class="text-capitalize mb-5 text-lg">Segera Bergabung</h1>
  
            <!-- <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact form start -->
  
  <section class="section contact-info pb-0">
      <div class="container">
           <div class="row" id="card-parent" style="padding:0 !important;">
              <div class="col-lg-4 col-sm-6 col-md-6" style="margin:0 !important; padding:0 !important;">
                  <div class="contact-block  mb-lg-0" style="margin:0 !important; padding:0 !important;">
                      <i class="icofont-live-support"></i>
                      <h5>Hubungi Kami</h5>
                       {{ $profile->phone }}
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-md-6" style="margin:0 !important; padding:0 !important;">
                  <div class="contact-block  mb-lg-0" style="margin:0 !important; padding:0 !important;">
                      <i class="icofont-support-faq"></i>
                      <h5>Email Kami</h5>
                      {{ $profile->email }}
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-md-6" style="margin:0 !important; padding:0 !important;">
                  <div class="contact-block  mb-lg-0" style="margin:0 !important; padding:0 !important;">
                      <i class="icofont-location-pin"></i>
                      <h5>Alamat</h5>
                      {{ $profile->address }}
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <section class="contact-form-wrap section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-6">
                  <div class="section-title text-center">
                      <h2 class="text-md mb-2">{{ $page_title }}</h2>
                      <div class="divider mx-auto my-4"></div>
                      <p class="mb-5">Hubungi Kami untuk info lebih lengkap.</p>
                  </div>
              </div>
          </div>
          
      </div>
  </section>
  
 
@endsection

@section('script')
<script>
    $(document).ready(function () { 
        var parentHeight = $('#card-parent').height();
        $('#card-parent').height(parentHeight + 30);
        parentHeight = $('#card-parent').height();
        $('.contact-block').each(function(){            
            $(this).height(parentHeight); 
            $(this).css("margin-top", 15);
            $(this).css("margin-bottom", 15);
            $(this).css("margin-left", 10);
            $(this).css("margin-right", 10);
            $(this).css("padding", 10);
        });
    });
</script>
@endsection