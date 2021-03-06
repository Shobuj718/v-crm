@extends('master')

@section('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('report', 'menu-open')
@section('report-nav-link', 'active')
@section('income', 'active')

@section('page-header')
	<h2>Imcome Report</h2>
@endsection

@section('content')
	<div class="container-fluid">

        <form method="post" action="{{ route('income.report.search') }}">
          {{ csrf_field() }}
          <div class="row member-list-head-search-dd">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;">
                      <option value="" selected>Selected Company Name</option>
                      @foreach($companies as $company)
                      <option value="{{ $company->id ?? '' }}">{{ $company->company_name ?? '' }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start date">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End date">
                  </div>
                </div>
                <!-- <div class="col-md-2">
                  <div class="form-group">
                    <input type="text" name="passport_expire" id="passport_expire" class="form-control" placeholder="Write your search">
                  </div>
                </div> -->
                <div class="col-md-2">
                  <input type="submit" name="submit" class="btn btn-success" value="Search">
                  <button type="submit" class="btn btn-warning">Clear</button>
                </div>
          </div>

        </form>




        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">
                @if(count($paymentInstallmentReceived) > 0)
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Company</th>
                    <th>Passport No</th>
                    <th>Passport Name</th>
                    <th>Phone</th>                    
                    <th>Installment Date</th>
                    <th>Installment</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @php
                    $i = 1;
                  @endphp
                  @foreach($paymentInstallmentReceived as $key => $data)


                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->company->company_name ?? '' }}</td>
                      <td>{{ $data->member->passport_no ?? '' }}</td>
                      <td>{{ $data->member->passport_surname ?? '' }}</td>
                      <td>{{ $data->member->phone ?? '' }}</td>
                      <td>{{\Carbon\Carbon::parse($data->installment_date)->format('d/M/Y')}}</td>
                      <td>{{ $data->received_amount ?? '' }}</td>
                      
                    </tr>
                  @endforeach

                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>                    
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>{{ 12000  }}</th>
                    </tr>  

                  </tfoot>

                </table>
                @else
                    <p style="text-align:center">No data available</p>
                @endif


                
                @if(count($paymentInstallmentReceived) > 0)
                <div class="report-items-navigation">
                  {{$members->links()}}
                </div>
                @endif

                <div class="row no-print">
                <div class="col-12">
                  <a href="#" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Exel</button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> PDF</button>
                </div>
              </div>

              </div>

            </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endsection

@section('scripts')

<!-- DataTables -->
<script src="{{ asset('/adminlte/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection