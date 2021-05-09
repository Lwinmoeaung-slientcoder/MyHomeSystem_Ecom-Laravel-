@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
   <div class="row">
      <div class="col-md-12">
          @if (session('status'))
                <P class="alert alert-success">{{session('status')}}</p>
            @endif
            @if (session('excel'))
                <P class="alert alert-success">{{session('excel')}}</p>
            @endif
      </div>
    </div>
<div class="row">
  

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">ပစ္စည်းစာရင်းပြဇယား</h4>
      </div>
      
              
         
      <div class="card-body">

      <div class="col-md-12">
      <div class="row">
      <div class="col-md-4">
      <input class="form-control " id="myInput" style="width:200px" onkeyup="myFunction()" type="text" placeholder="ပစ္စည်းနာမည်ရိုက်ပြီးရှာပါ" aria-label="Search"><br/>
      </div>
      <div class="col-md-4">
      <input class="form-control " id="myInput1" style="width:200px" onkeyup="myFunction1()" type="text" placeholder="ဆိုင််နာမည်ရိုက်ပြီးရှာပါ" aria-label="Search"><br/>
      </div>
      <div class="col-md-3">
      <form action="{{ action('SaleProductsController@export') }}" method="get" accept-charset="UTF-8">        
                                    <!-- <a href="/productssexport" class="btn btn-primary btn3d1"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true">&nbsp;Back</span></a>
                                    @if(!$saledata->isEmpty())
                                      <a href="#" class="btn btn-primary btn-md delete btn3d1"><span class="glyphicon glyphicon-save-file" aria-hidden="true">&nbsp;ExcelDownload</span></a>
                                  
                                    @endif -->
                                   
      <a href="/salesexport" class="btn btn-info btn-sm"><i class="mdi mdi-file-document"></i>Excelထုတ်ရန်နှိပ်ပါ</a>
</form>
      </div>
      </div >
      <table class="table table-striped table-bordered" id="myTable"  style="overflow-x:auto;overflow-y:auto;">
                <thead>
                <tr>

                    <th rowspan="2">နံပါတ်</th>
                    <th rowspan="2">ပစ္စည်းနာမည်</th>
                    <th rowspan="2">ရွှေရည်</th>
                    <th rowspan="2">ဆိုင််နာမည်</th>
                    <th colspan="3">ရွှေချိန်</th>
                    <th rowspan="2">အလျော့တွက်</th>
                    <th colspan="3">ကျောက်ချိန်</th>
                    <th rowspan="2">ကျောက်ဖိုး</th>
                    <th rowspan="2">ရောင်းရငွေ</th>
                    <th rowspan="2">ရောင်းတဲ့ရက်စွဲ</th>
                    @if(Auth::User()->role=='Manager')
                    <th rowspan="2">လုပ်ဆောင်ချက်</th>
                    @endif

                    </tr>
                    <tr>
                    <th>ကျပ်</th>
                    <th>ပဲ</th>
                    <th>ရွေး</th>
                    <th>ကျပ်</th>
                    <th>ပဲ</th>
                    <th>ရွေး</th>
                    </tr>

                </thead>
                <tbody>
                <?php $i = 0 ?>
                @foreach($saledata as $data)
                <?php $i++ ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->goldquality }}</td>
                    <td>{{ $data->shopname }}</td>
                    <td>{{ $data->kyat }}</td>
                    <td>{{ $data->pel }}</td>
                    <td>{{ $data->yway }}</td>
                    <td>{{ $data->ayaw }}</td>
                    <td>{{ $data->k_kyat }}</td>
                    <td>{{ $data->k_pel }}</td>
                    <td>{{ $data->k_yway }}</td>
                    <td>{{ $data->k_price }}</td>
                    <td>{{ $data->total_cost }}</td>
                    <td>{{ $data->sold_date }}</td>

                    @if(Auth::User()->role=='Manager')
                    <td>
                    <a href="{{ action('SaleProductsController@editscreen',$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                    <a href="{{ action('SaleProductsController@delete',$data->id) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    </td>
                    @endif

                  </tr>
                  @endforeach

                </tbody>
                
            </table>
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