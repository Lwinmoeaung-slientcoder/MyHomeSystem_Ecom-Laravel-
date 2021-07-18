@extends('layout.master-mini')
@section('content')

<div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">

                <div class="box">

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
                                <label for="username" class="text-white">Email:</label><br>
                                <input type="email" name="email" id="username" class="form-control" require>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" require>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="class col-md-6">
            <p>
          <label class="label"><font size="5" color="Red">Login Form | AMK </font></label><br>
           <font size="4" color="black"> Welcome from AMK Web Inventory Application. <br>In this Application , You can check your inventory list details.<br>Before You check , please login with your acount first.<br><br>
                If you don't have account , please click this <a href="/guest/register" style="color:red">link</a>.
                </font>
            </p>

            </div>

        </div>
    </div>



</form>
@endsection
