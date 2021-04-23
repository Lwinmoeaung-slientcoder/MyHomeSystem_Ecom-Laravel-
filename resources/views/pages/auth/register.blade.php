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
  <div class="col-lg-3 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">ရွှေအရည်အသွေး</h4>
      </div>
      <div class="card-body">
   
              <form method="POST">
             
                  <div class="box-body">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group {{ $errors->has('kyat') ? 'has-error' : ''}}">
                      <label for="category">အသုံးပြုသူနာမည်ထည့်ရန်</label>
                      <input type="text" class="form-control" name="name" placeholder="အသုံးပြုသူနာမည်ထည့်ရန်နေရာ">
                      {!! $errors->first('name', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('kyat') ? 'has-error' : ''}}">
                      <label for="category">စကားဝှက်ထည့်ရန်</label>
                      <input type="password" class="form-control" name="password" placeholder="စကားဝှက်ထည့်ရန်နေရာ">
                      {!! $errors->first('password', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('kyat') ? 'has-error' : ''}}">
                      <label for="category">စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="စကားဝှက်ကိုနောက်တစ်ကြိမ်ပြန်ထည့်ရန်">
                      {!! $errors->first('password_confirmation', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('kyat') ? 'has-error' : ''}}">
                      <label for="category">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email ထည့်ရန်နေရာ">
                      {!! $errors->first('email', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>
                  </div>
                </form>
      </div>
    </div>
  </div>

  <div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">ရွှေအရည်အသွေးပြဇယား</h4>
      </div>
      
              
         
      <div class="card-body">
      <input class="form-control " id="myInput" style="width:200px" onkeyup="myFunction()" type="text" placeholder="ရွှေအရည်အသွေးရိုက်ပြီးရှာပါ" aria-label="Search">
      <table class="table table-striped" id="myTable"  style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th>နံပါတ်</th>
                        <th>အသုံးပြုသူ</th>
                        <th>စကားဝှက်</th>
                        <th>Email</th>
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
                    <td>
                        <a href="{{ action('UsersController@delete',$data->id) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    </td>
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