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

@section('report', 'menu-open')
@section('report-nav-link', 'active')
@section('passport-expired', 'active')

@section('page-header')
  <h2>Visa Expired Report</h2>
@endsection

@section('content')
  <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

              <div class="row" style="float:;">

              <div class="col-md-3"></div>

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

                <div class="col-md-2">
                  <div class="form-group">
                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start date">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="date" name="end_date" id="end_date"  class="form-control" placeholder="End date">
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
                    <th>Company</th>
                    <th>Passport No</th>
                    <th>Passport Name</th>
                    <th>Phone</th>                    
                    <th>Passport Expired</th>
                    <th>SMS</th>
                  </tr>
                  </thead>
                 
                </table>

                <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-warning float-right"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> PDF</button>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Exel</button>
                  
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(company_id = '', start_date = '', end_date = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('visa.expired') }}",
                data:{company_id:company_id, start_date:start_date, end_date:end_date}
            },
            columns: [
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'company_name',
                    name:'company_name'
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
                    data:'phone',
                    name:'phone'
                },
                {
                    data:'passport_expire',
                    name:'passport_expire'
                },
                
                
                
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

    $('#filter').click(function(){
        var company_id = $('#company_id').val();
        var start_date = $('#start_date').val();
        var end_date   = $('#end_date').val();
        //alert(company_id)
        if(company_id != '' || start_date != '' || end_date != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(company_id, start_date, end_date);
        }
        else
        {
            alert('Select company name from filter option');
        }
    });

    $('#reset').click(function(){
        $('#company_id').val('');
        $('#start_date').val('');
        $('#end_date').val('');
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