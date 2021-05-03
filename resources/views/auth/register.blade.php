@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
   <div class="row">
      <div class="col-md-12">
          @if (session('status'))
                <P class="alert alert-success">{{session('status')}}</p>
            @endif
      </div>
    </div>
<div class="row">
@if (session('editvalue')== '')
  <div class="col-lg-3 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">အသုံးပြုသူအသစ်ထည့်ရန်</h4>
      </div>
      <div class="card-body">
   
              <form method="POST">
             
                  <div class="box-body">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                      <label for="username">အသုံးပြုသူနာမည်ထည့်ရန်</label>
                      <input type="text" class="form-control" id="username" name="name" placeholder="အသုံးပြုသူနာမည်ထည့်ရန်နေရာ">
                      {!! $errors->first('name', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                      <label for="password">စကားဝှက်ထည့်ရန်</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="စကားဝှက်ထည့်ရန်နေရာ">
                      {!! $errors->first('password', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                      <label for="password_confirmation">စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်">
                      {!! $errors->first('password_confirmation', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email ထည့်ရန်နေရာ">
                      {!! $errors->first('email', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                    <label for="cars">ရာထူးကို‌ရွေးပါ။</label>
                      <select name="role" id="role">
                      <option value="Guest" selected> Guest </option>
                      <option value="Staff">Staff</option>
                        <option value="Manager">Manager</option>
                      </select>
                      {!! $errors->first('role', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>
                  </div>
                </form>
      </div>
    </div>
    @else
    <!-- Edit User -->
    <div class="col-lg-3 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">အသုံးပြုသူအချက်အလက်ပြင်ရန်</h4>
      </div>
      <div class="card-body">
   
              <form method="POST">
             
                  <div class="box-body">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                      <label for="username">အသုံးပြုသူနာမည်ထည့်ရန်</label>
                      <input type="text" class="form-control" id="username" name="name" value="{{$users->name}}">
                      {!! $errors->first('name', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                      <label for="password">စကားဝှက်ထည့်ရန်</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="စကားဝှက်ထည့်ရန်">
                      {!! $errors->first('password', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                      <label for="password_confirmation">စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်">
                      {!! $errors->first('password_confirmation', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{$users->email}}">
                      {!! $errors->first('email', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                    <label for="cars">ရာထူးကို‌ရွေးပါ။</label>
                      <select name="role" id="role">
                      <option value="Guest" selected> Guest </option>
                        <option value="Manager">Manager</option>
                      </select>
                      {!! $errors->first('role', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>
                  </div>
                </form>
      </div>
    </div>
    @endif
  </div>



  <div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">အသုံးပြုသူနာမည်ပြဇယား</h4>
      </div>
      
              
         
      <div class="card-body">
      <input class="form-control " id="myInput" style="width:200px" onkeyup="myFunction()" type="text" placeholder="အသုံးပြုသူနာမည်ရိုက်ပြီးရှာပါ" aria-label="Search">
      <table class="table table-striped" id="myTable"  style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th>နံပါတ်</th>
                        <th>အသုံးပြုသူ</th>
                        <th>စကားဝှက်</th>
                        <th>Email</th>
                        <th>ရာထူး</th>
                        @if(Auth::User()->role=='Manager')
                        <th>လုပ်ဆောင်ချက်</th>
                        @endif
                    </tr>

                </thead>
                <tbody>
                <?php $i = 0 ?>
                @foreach($userdata as $data)
                <?php $i++ ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->password }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->role }}</td>

                    @if(Auth::User()->role=='Manager')
                    <td>
                       <a href="{{ action('UsersController@edit',$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                        <a href="{{ action('UsersController@delete',$data->id) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    </td>
                    @endif
                  </tr>
                  @endforeach

                </tbody>
                
            </table>
            <div class="d-flex justify-content-center">
                        {!! $userdata->links("pagination::bootstrap-4") !!}
                    </div>
      </div>
    </div>
  </div>

 
  
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/chart.js') !!}
@endpush