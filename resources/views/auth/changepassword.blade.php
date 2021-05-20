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
    <!-- Edit User -->
    <div class="col-lg-6 grid-margin stretch-card">
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

                        <input type="hidden" name="role" value="{{$users->role}}" />
                     
                    </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>
                        </div>
            </form>
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