@extends('master')

@section('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('member', 'menu-open')
@section('member-nav-link', 'active')
@section('member-list', 'active')

@section('page-header')
	<h2>Member List</h2>
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

              <div class="col-md-6" style="text-align:right;">
                <div class="form-group">
                  <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;">
                    <option value="" selected>Selected Company Name</option>
                    @foreach($companies as $company)
                    <option value="{{ $company->id ?? '' }}">{{ $company->company_name ?? '' }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Passport No</th>
                    <th>Passport Name</th>
                    <th>Passport Expired</th>
                    <th>Visa Expired</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach($members as $key => $member)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $member->passport_no ?? '' }}</td>
                      <td>{{ $member->passport_surname ?? '' }}</td>
                      <td>{{\Carbon\Carbon::parse($member->passport_expire)->format('d/M/Y')}}</td>
                      <td>{{\Carbon\Carbon::parse($member->passport_expire)->format('d/M/Y')}}</td>
                      <td>{{ $member->phone ?? '' }}</td>
                      <td>{{ $member->company->company_name ?? '' }}</td>
                      <td>{{ $member->payment_total_amount ?? '' }}</td>
                      <td>{{ $member->payment_discount ?? '' }}</td>
                      <td>{{ $member->received_amount ?? '' }}</td>
                      <td>{{ $member->received_amount ?? '' }}</td>
                      <td>
                      <div class="dropdown btn btn-success"><a style="color:#fff" class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a>
                        <ul class="dropdown-menu"  role="menu" aria-labelledby="dropdownMenu">
                            <li> <a class="dropdown-item" href="{{ route('single.member.details', $member->uid) }}">Show</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">SMS Passport</a></li>
                            <li><a class="dropdown-item" href="#">SMS Visa</a></li>
                            <li><a class="dropdown-item" href="#">SMS Visa Collect</a></li>
                            <li><a class="dropdown-item" href="#">Remove</a></li>
                        </ul>
                    </div>
                         
                      </td>
                    </tr>
                  @endforeach                  
                  </tfoot>
                </table>
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