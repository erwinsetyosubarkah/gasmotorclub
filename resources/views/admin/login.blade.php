@extends('admin.layouts.login_main')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Halaman Login</p>
      
            <form action="/admin-login" method="post">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" autofocus required value="{{ old('username') }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
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
              <div class="row">             
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
   
            <div class="text-center mt-2">
              <a href="/admin-register">Belum memiliki akun?</a>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.login-box -->
@endsection