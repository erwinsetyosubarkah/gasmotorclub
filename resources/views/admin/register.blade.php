@extends('admin.layouts.login_main')

@section('content')
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <div class="card-header text-center">
          <div class="d-flex justify-content-center">
          <img src="{{ asset('storage/'. $site_profile->club_logo) }}" alt="{{ $site_profile->club_name }}" class="brand-image img-circle elevation-3 d-block mb-2" style="opacity: .8" height="80" width="80">
        </div>
        <a href="/" class="h3">{{ $site_profile->club_name }}</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Halaman Pendaftaran</p>
  
        <form action="/admin-register" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <input type="hidden" name="level" value="author">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password2" class="form-control @error('password2') is-invalid @enderror" placeholder="Konfirmasi Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row">            
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="text-center mt-2">
            <a href="/admin-login">Sudah memiliki akun?</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection