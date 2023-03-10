@php
    $site_profile = App\Models\Profile::first();
    $categories = App\Models\Category::all();
    $events = App\Models\Event::all();
@endphp

<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>{{ $site_profile->club_name }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/'. $site_profile->club_logo) }}">

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/plugins/fontawesome-free/css/all.min.css">

  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/novena/css/style.css">

</head>

<body id="top">
    @include('partials.navbar')
    <div class="container pt-4">
        @yield('content')
    </div>


    <!-- footer Start -->
    <footer class="footer section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mr-auto col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <div class="logo mb-4">
                            <img src="{{ asset('storage/'. $site_profile->club_logo) }}" alt="" class="" height="100"> <span class="font-weight-bold" >{{ $site_profile->club_name }}</span>
                            
                        </div>
                        {!! $site_profile->short_description !!}

                        <ul class="list-inline footer-socials mt-4">
                            <li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Kategori Artikel</h4>
                        <div class="divider mb-4"></div>

                        <ul class="list-unstyled footer-menu lh-35">       
                            @foreach ($categories as $item)                                
                                <li><a href="#">{{ $item->category_name }} </a></li>
                            @endforeach                     
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Event Terbaru</h4>
                        <div class="divider mb-4"></div>

                        <ul class="list-unstyled footer-menu lh-35">
                            @foreach ($events as $item)                                
                                <li><a href="#">{{ $item->event_title }} </a></li>
                            @endforeach 
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Kontak Kami</h4>
                        <div class="divider mb-4"></div>

                        <div class="footer-contact-block mb-4">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-email mr-3"></i>
                                <span class="h6 mb-0">Support Selama 24/7</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:{{ $site_profile->phone }}">{{ $site_profile->email }}</a></h4>
                        </div>

                        <div class="footer-contact-block">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-support mr-3"></i>
                                <span class="h6 mb-0">Senin s/d Jum'at : 08:30 - 18:00</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:{{ $site_profile->phone }}">{{ $site_profile->phone }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-btm py-4 mt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="copyright">
                            &copy; Copyright 2023
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                            <form action="#" class="subscribe">
                                <input type="text" class="form-control" placeholder="Your Email address">
                                <a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <a class="backtop js-scroll-trigger" href="#top">
                            <i class="icofont-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{ asset('/') }}vendor/novena/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{ asset('/') }}vendor/novena/plugins/bootstrap/js/popper.js"></script>
    <script src="{{ asset('/') }}vendor/novena/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}vendor/novena/plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('/') }}vendor/novena/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="{{ asset('/') }}vendor/novena/plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="{{ asset('/') }}vendor/novena/plugins/shuffle/shuffle.min.js"></script>
    <script src="{{ asset('/') }}vendor/novena/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="{{ asset('/') }}vendor/novena/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="{{ asset('/') }}vendor/novena/js/script.js"></script>
    <script src="{{ asset('/') }}vendor/novena/js/contact.js"></script>
    @include('sweetalert::alert')
    <script src="{{ asset('/') }}vendor/sweetalert/sweetalert.all.js"></script>
    <script src="{{ asset('/') }}vendor/ckeditor5/ckeditor.js"></script>
    <script>
        $(document).ready(function () {      
            ClassicEditor
            .create( document.querySelector( '.ckeditor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );

            $('.carousel').carousel()

        });

        function previmg(src){
            var modal;

            function removeModal() {
                modal.remove();
                $('body').off('keyup.modal-close');
            }
            modal = $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: 'contain',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
            }).click(function() {
                removeModal();
            }).appendTo('body');
            //handling ESC
            $('body').on('keyup.modal-close', function(e) {
                if (e.key === 'Escape') {
                removeModal();
                }
            });
        }
    </script>
    @yield('script') 
  </body>
  </html>
   