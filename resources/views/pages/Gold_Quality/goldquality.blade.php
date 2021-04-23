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
   
              <form action="{{ action('GoldqualityController@insert') }}" method="POST">
              {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="category">ရွှေအရည်အသွေးထည့်ရန်</label>
                      <input type="text" class="form-control" name="goldquality" placeholder="ရွှေအရည်အသွေးထည့်ရန်နေရာ">
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
                        <th>ရွှေအရည်အသွေး</th>
                        <th>လုပ်ဆောင်ချက်</th>
                    </tr>

                </thead>
                <tbody>
                <?php $i = 0 ?>
                @foreach($goldqualitydata as $data)
                <?php $i++ ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{ $data->goldquality }}</td>
                    <td>
                        <a href="{{ action('GoldqualityController@delete',$data->id) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                
            </table>
            <div class="d-flex justify-content-center">
                        {!! $goldqualitydata->links("pagination::bootstrap-4") !!}
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