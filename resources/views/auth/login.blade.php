@extends('layout.master-mini')
@section('content')

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
        </div>
    </div>
    


</form>
@endsection