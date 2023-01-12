<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:{{ $site_profile->email }}"><i class="icofont-support-faq mr-2"></i>{{ $site_profile->email }}</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>{{  $site_profile->address }} </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:{{ $site_profile->phone }}" >
							<span>Call Now : </span>
							<span class="h4">{{ $site_profile->phone }}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation shadow" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.html">
			  	<img src="{{ asset('storage/'. $site_profile->club_logo) }}" alt="" class="" height="100"> <span class="font-weight-bold" >{{ $site_profile->club_name }}</span>
			  </a>
			  

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="index.html">Home</a>
			  </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile Club <i class="icofont-thin-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdown02">
                    <li><a class="dropdown-item" href="department.html">Profile</a></li>
                    <li><a class="dropdown-item" href="department-single.html">Visi dan Misi</a></li>
                    <li><a class="dropdown-item" href="department-single.html">Produk Kami</a></li>
                    <li><a class="dropdown-item" href="department-single.html">Kontak Kami</a></li>
                </ul>
              </li>
			   <li class="nav-item"><a class="nav-link" href="about.html">Artikel</a></li>
			    <li class="nav-item"><a class="nav-link" href="service.html">Event</a></li>
			    <li class="nav-item"><a class="nav-link" href="service.html">Galery Foto</a></li>
			    <li class="nav-item"><a class="nav-link" href="service.html">Klien Kami</a></li>
			@auth
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Selamat Datang, {{ auth()->user()->name }} <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown05">
						<li><a class="dropdown-item" href="/admin"><i class="fas fa-cogs"></i> Dashboard</a></li>
						<li>
							<form action="/admin-logout" method="post">
								@csrf
								<button type="submit" class="btn btn-secondary ml-2"><i class="fas fa-sign-out-alt"></i> Logout</button>
							</form>
						</li>
					</ul>
				</li>
			@else
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-primary btn-sm text-white" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Login <i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item" href="/admin-login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <li><a class="dropdown-item" href="/admin-register"><i class="fas fa-edit"></i> Daftar</a></li>
                    </ul>
               </li>
			@endauth
               
			</ul>
		  </div>
		</div>
	</nav>
</header>