@extends('master')

@section('styles')
	<!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
              
              <div class="card-body ">

              <div class="row" style="float:;">

              <div class="col-md-7"></div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;">
                      <option value="" selected>All Company</option>
                      @foreach($companies as $company)
                      <option value="{{ $company->id ?? '' }}">{{ $company->company_name ?? '' }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-1">
                  <button type="button" name="filter" id="filter" class="btn btn-success">Search</button>
                </div>
                <div class="col-md-1">
                  <button type="button" name="reset" id="reset" class="btn btn-warning">Clear</button>
                </div>
                

            </div>
              
                <table id="customer_data" class="table table-bordered table-striped">
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

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(company_id = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('membersearch.index') }}",
                data:{company_id:company_id}
            },
            columns: [
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'passport_no',
                    name:'passport_no'
                },
                {
                    data:'passport_surname',
                    name:'passport_surname'
                },
                {
                    data:'passport_expire',
                    name:'passport_expire'
                },
                {
                    data:'visa_expire_date',
                    name:'visa_expire_date'
                },
                {
                    data:'phone',
                    name:'phone'
                },
                {
                    data:'company_name',
                    name:'company_name'
                },
                {
                    data:'payment_total_amount',
                    name:'payment_total_amount'
                },
                {
                    data:'payment_discount',
                    name:'payment_discount'
                },
                {
                    data:'paid',
                    name:'paid'
                },
                {
                    data:'due_amount',
                    name:'due_amount'
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

    $('#filter').click(function(){
        var company_id = $('#company_id').val();

        if(company_id != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(company_id);
        }
        else
        {
            alert('Select company name from filter option');
        }
    });

    $('#reset').click(function(){
        $('#company_id').val('');
        //fill_datatable();
    });

});
</script>

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