@extends('layout.master-mini')
@section('content')

<!-- <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
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
</div> -->

<div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              
                <div class="box">
                <center> <label class="label"><font size="5" color="Red">Login Form | AMK </font></label></center><br>
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="username" class="text-white">Username:</label><br>
                                <input type="email" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    


</form>
@endsection