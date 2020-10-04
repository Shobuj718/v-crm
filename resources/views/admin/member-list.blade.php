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
                  
                  <tr>
                    <td>1</td>
                    <td>ASDF2345</td>
                    <td>Shobuj Mia</td>
                    <td>02/Oct/2020</td>
                    <td>02/Oct/2020</td>
                    <td>01236489</td>
                    <td>SM Manpower M.</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>
                       <div class="btn-group">
                        <button type="button" class="btn btn-success">Action</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Show</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">SMS Passport</a>
                            <a class="dropdown-item" href="#">SMS Visa</a>
                            <a class="dropdown-item" href="#">SMS Visa Collect</a>
                            <a class="dropdown-item" href="#">Remove</a>
                          </div>
                        </button>
                     </div>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>ASDF2345</td>
                    <td>Shobuj Mia</td>
                    <td>02/Oct/2020</td>
                    <td>02/Oct/2020</td>
                    <td>01236489</td>
                    <td>SM Manpower M.</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>
                       <div class="btn-group">
                        <button type="button" class="btn btn-success">Action</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Show</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">SMS Passport</a>
                            <a class="dropdown-item" href="#">SMS Visa</a>
                            <a class="dropdown-item" href="#">SMS Visa Collect</a>
                            <a class="dropdown-item" href="#">Remove</a>
                          </div>
                        </button>
                     </div>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>ASDF2345</td>
                    <td>Shobuj Mia</td>
                    <td>02/Oct/2020</td>
                    <td>02/Oct/2020</td>
                    <td>01236489</td>
                    <td>SM Manpower M.</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>
                       <div class="btn-group">
                        <button type="button" class="btn btn-success">Action</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Show</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">SMS Passport</a>
                            <a class="dropdown-item" href="#">SMS Visa</a>
                            <a class="dropdown-item" href="#">SMS Visa Collect</a>
                            <a class="dropdown-item" href="#">Remove</a>
                          </div>
                        </button>
                     </div>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>ASDF2345</td>
                    <td>Shobuj Mia</td>
                    <td>02/Oct/2020</td>
                    <td>02/Oct/2020</td>
                    <td>01236489</td>
                    <td>SM Manpower M.</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>
                       <div class="btn-group">
                        <button type="button" class="btn btn-success">Action</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Show</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">SMS Passport</a>
                            <a class="dropdown-item" href="#">SMS Visa</a>
                            <a class="dropdown-item" href="#">SMS Visa Collect</a>
                            <a class="dropdown-item" href="#">Remove</a>
                          </div>
                        </button>
                     </div>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>ASDF2345</td>
                    <td>Shobuj Mia</td>
                    <td>02/Oct/2020</td>
                    <td>02/Oct/2020</td>
                    <td>01236489</td>
                    <td>SM Manpower M.</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>
                    	 <div class="btn-group">
		                    <button type="button" class="btn btn-success">Action</button>
		                    <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
		                      <span class="sr-only">Toggle Dropdown</span>
		                      <div class="dropdown-menu" role="menu">
		                        <a class="dropdown-item" href="#">Show</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">SMS Passport</a>
                            <a class="dropdown-item" href="#">SMS Visa</a>
		                        <a class="dropdown-item" href="#">SMS Visa Collect</a>
		                        <a class="dropdown-item" href="#">Remove</a>
		                      </div>
		                    </button>
		                 </div>
                    </td>
                  </tr>
                                    
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