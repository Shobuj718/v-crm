@extends('master')

@section('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('report', 'menu-open')
@section('report-nav-link', 'active')
@section('due-installment', 'active')

@section('page-header')
	<h2>Due Report</h2>
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

              <div class="row" style="float:right;">

                <div class="col-md-5">
                  <div class="form-group">
                    <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;">
                      <option value="" selected>Selected Company Name</option>
                      @foreach($companies as $company)
                      <option value="{{ $company->id ?? '' }}">{{ $company->company_name ?? '' }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Write your search">
                  </div>
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-success">Search</button>
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-warning">Clear</button>
                </div>

              </div>

                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Company</th>
                    <th>Passport No</th>
                    <th>Passport Name</th>
                    <th>Phone</th>                    
                    <th>Total</th>
                    <th>Discount</th>
                    <th>paid</th>
                    <th>Due</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $i = 1;
                    $total_due = 0;
                  @endphp
                  
                  @foreach($members as $key => $member)

                  @php
                  $total_due += $member->total_deposit;
                  @endphp

                    <tr>
                      <td>{{ $member->id }}</td>
                      <td>{{ $member->company->company_name ?? '' }}</td>
                      <td>{{ $member->passport_no ?? '' }}</td>
                      <td>{{ $member->passport_surname ?? '' }}</td>
                      <td>{{ $member->phone ?? '' }}</td>
                      <td>{{ $member->total_deposit }}</td>
                      <td>{{ $member->diposit_discount ?? '' }}</td>
                      <td>{{ $member->permanent_diposit ?? '' }}</td>
                      <td>{{ $member->total_deposit ?? '' }}</td>                      
                    </tr>

                    

                  @endforeach 
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>                    
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>{{ number_format($total_due,2)  }}</th>
                    </tr>                 
                  </tfoot>
                </table>
                <div class="report-items-navigation">
                  {{$members->links()}}
                </div>

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