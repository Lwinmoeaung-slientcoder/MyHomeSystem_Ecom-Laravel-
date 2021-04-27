@extends('layout.master-mini')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <form method="post">
          <div class="form-group">
         <center> <label class="label">Login Form</label></center><br>
      {{csrf_field()}}
            <label class="label">email</label>
            <div class="input-group">
              <input type="text" class="form-control" name="email" placeholder="Email">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Login</button>
          </div>
          <div class="form-group d-flex justify-content-between">
            <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
          </div>

        </form>
      </div>
      <p class="footer-text text-center">copyright © 2021 AMK. All rights reserved.</p>
    </div>
  </div>
</div>

@endsection