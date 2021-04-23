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
  <div class="col-lg-12">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">ပစ္စည်းအသစ်</h4><br>
        <font size="2" color="red"> * ထည့်စရာမရှိရင် 0 (သုည) ထည့်ပေးပါခင်ဗျာ</font>
      </div>
      <form method="POST">
         <div class="card-body">
            <div class="row">   
                <div class="col-md-4">
                {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">      
                        <label for="category">ပစ္စည်းနာမည်</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}">
                        {!! $errors->first('name', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('goldquality') ? 'has-error' : ''}}">
                        <select  name="goldquality">
                         <option value="{{$products->goldquality}}" selected> {{$products->goldquality}} </option>
                        @foreach($goldqualitydata as $data)
                        <option value="{{$data->goldquality}}">{{$data->goldquality}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('goldquality', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('shopname') ? 'has-error' : ''}}">
                        <label for="category">ဆိုင်နာမည်</label>
                        <input type="text" class="form-control" name="shopname" value="{{$products->shopname}}">
                        {!! $errors->first('shopname', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('total_cost') ? 'has-error' : ''}}">
                            <label for="category">စုစုပေါင်းရောင်းရငွေ</label>
                            <input type="text" class="form-control" name="total_cost">
                            {!! $errors->first('total_cost', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                    <div class="form-group {{ $errors->has('sold_date') ? 'has-error' : ''}}">
                        <label for="category">ရောင်းတဲ့ရက်စွဲ</label>
                        <input type="date" class="form-control" name="sold_date">   
                        {!! $errors->first('sold_date', '<p class="help-block"><font color="red">:message</font></p>') !!}
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('kyat') ? 'has-error' : ''}}">
                            <label for="category">ရွှေချိန်_ကျပ်</label>
                            <input type="text" class="form-control" name="kyat" value="{{$products->kyat}}">
                            {!! $errors->first('kyat', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('pel') ? 'has-error' : ''}}">
                            <label for="category">ရွှေချိန်_ပဲ</label>
                            <input type="text" class="form-control" name="pel" value="{{$products->pel}}">
                            {!! $errors->first('pel', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('yway') ? 'has-error' : ''}}">
                            <label for="category">ရွှေချိန်_ရွေး</label>
                            <input type="text" class="form-control" name="yway" value="{{$products->yway}}">
                            {!! $errors->first('yway', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>
                        
                        <div class="form-group {{ $errors->has('ayaw') ? 'has-error' : ''}}">
                            <label for="category">အလျော့တွက်</label>
                            <input type="text" class="form-control" name="ayaw" value="{{$products->ayaw}}">
                            {!! $errors->first('ayaw', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>
                       
                </div>
                <div class="col-md-4">
                <div class="form-group {{ $errors->has('bought_date') ? 'has-error' : ''}}">
                            <label for="category">ကျောက်ဖိုး</label>
                            <input type="text" class="form-control" name="k_price" value="{{$products->k_price}}">
                            {!! $errors->first('k_price', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                    <div class="form-group {{ $errors->has('bought_date') ? 'has-error' : ''}}">
                            <label for="category">ကျောက်ချိန်_ကျပ်</label>
                            <input type="text" class="form-control" name="k_kyat" value="{{$products->k_kyat}}">
                            {!! $errors->first('k_kyat', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('bought_date') ? 'has-error' : ''}}">
                            <label for="category">ကျောက်ချိန်_ပဲ</label>
                            <input type="text" class="form-control" name="k_pel" value="{{$products->k_pel}}">
                            {!! $errors->first('k_pel', '<p class="help-block"><font color="red">:message</font></p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('bought_date') ? 'has-error' : ''}}">
                            <label for="category">ကျောက်ချိန််_ရွေး</label>
                            <input type="text" class="form-control" name="k_yway" value="{{$products->k_yway}}">
                            {!! $errors->first('k_yway', '<p class="help-block"><font color="red">:message</font></p>') !!}
                </div>
            </div>
            @if (session('status')== '')
            <button type="submit" class="btn btn-primary" name="submit">အတည်ပြုရန်နှိပ်ပါ</button>&nbsp;&nbsp;
            @endif
           
                    <a href="/productlists" class="btn btn-warning">ပစ္စည်းစာရင်း</a>&nbsp;&nbsp;
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