@extends('layout.master-mini')
<style>

.container{
     padding-top:100px;
     margin-left:400px;
}
.inputField{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
@section('content')
<div class="container">
<form method="POST">


                 <div class="card">
                    <div class="card-header">
                    <div class="row">
                    <div class="class col-md-12">
                            @if (session('status'))
                                    <P class="alert alert-success">{{session('status')}}</p>
                                @endif

                    </div>
                    </div>
                        Register Form
                    </div>
                    <div class="card-body">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                 <label for="username">အသုံးပြုသူနာမည်ထည့်ရန်</label>
                 <input type="text" class="form-control inputField" id="username" name="name" placeholder="အသုံးပြုသူနာမည်ထည့်ရန်နေရာ">
                 {!! $errors->first('name', '<p class="help-block"><font color="red">:message</font></p>') !!}
               </div>
               <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                 <label for="password">စကားဝှက်ထည့်ရန်</label>
                 <input type="password" class="form-control inputField" id="password" name="password" placeholder="စကားဝှက်ထည့်ရန်နေရာ">
                 {!! $errors->first('password', '<p class="help-block"><font color="red">:message</font></p>') !!}
               </div>
               <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                 <label for="password_confirmation">စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်</label>
                 <input type="password" class="form-control inputField" id="password_confirmation" name="password_confirmation" placeholder="စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်">
                 {!! $errors->first('password_confirmation', '<p class="help-block"><font color="red">:message</font></p>') !!}
               </div>
               <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                 <label for="email">Email</label>
                 <input type="email" class="form-control inputField" id="email" name="email" placeholder="Email ထည့်ရန်နေရာ">
                 {!! $errors->first('email', '<p class="help-block"><font color="red">:message</font></p>') !!}
               </div>

               <input type="hidden" name="role" value="Guest">
             </div><!-- /.box-body -->

             <div class="card-footer text-left">
                 <button type="submit" class="btn btn-success" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>
                 <a href="/" class="btn btn-primary">Login</a>
                 </div


           </form>
           </div>
           @endsection
