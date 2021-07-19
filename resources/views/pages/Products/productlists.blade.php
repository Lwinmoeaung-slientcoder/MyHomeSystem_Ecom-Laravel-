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

            <div class="col-md-3">
              <input class="form-control " id="myInput" style="width:200px" onkeyup="myFunction()" type="text" placeholder="ပစ္စည်းနာမည်ရိုက်ပြီးရှာပါ" aria-label="Search"><br/>
            </div>

            <div class="col-md-3">
              <input class="form-control " id="myInput1" style="width:200px" onkeyup="myFunction1()" type="text" placeholder="ဆိုင််နာမည်ရိုက်ပြီးရှာပါ" aria-label="Search"><br/>
            </div>

            <div class="col-md-3">
              <form action="{{ action('ProductListsController@export') }}" method="get" accept-charset="UTF-8">
                <a href="/productssexport" class="btn btn-info btn-sm"><i class="mdi mdi-file-document"></i>Excelထုတ်ရန်နှိပ်ပါ</a>
            </form>
            </div>

            <div class="col-md-3">
              <a href="/add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i>ပစ္စည်းအသစ်ထည့်ရန်နှိပ်ပါ</a>
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
                    <th rowspan="2">ဝယ်တဲ့ရက်စွဲ</th>
                    @if(Auth::User()->role=='Manager' || Auth::User()->role=='Staff')
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
                @foreach($productsdata as $data)
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
                    <td>{{ $data->bought_date }}</td>

                    @if(Auth::User()->role=='Manager')
                    <td>
                    <a href="{{ action('ProductListsController@editscreen',$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                    <a href="{{ action('ProductListsController@delete',$data->id) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    <a href="{{ action('SaleProductsController@movesalelistscreen',$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-coin"></i>Sell</a>
                    </td>
                    @endif

                    @if(Auth::User()->role=='Staff')
                    <td>
                    <a href="{{ action('SaleProductsController@movesalelistscreen',$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-coin"></i>Sell</a>
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
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
