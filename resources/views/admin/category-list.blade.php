@extends('master')

@section('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('category', 'menu-open')
@section('category-nav-link', 'active')
@section('category-list', 'active')

@section('page-header')
	<h2>Category List</h2>
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
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($categories as $category)
                  <tr>                    
                    <td>{{ $category->id ?? '' }}</td>
                    <td>{{ $category->category_name ?? '' }}</td>
                    <td>
                    <a href="{{ route('edit.category',[ $category->uid, $category->slug]) }}" class="btn btn-info btn-xs">Edit</a>
                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                       
                    </td>
                  </tr>

                  @endforeach
                  
                  
                  </tfoot>
                </table>

                <div class="row no-print">
                <div class="col-12">
                  <a href="#" target="_blank" class="btn btn-warning float-left"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-left" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> PDF</button>
                  <button type="button" class="btn btn-success float-left"><i class="far fa-credit-card"></i> Exel</button>
                  
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