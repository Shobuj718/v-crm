@extends('master')

@section('company', 'menu-open')
@section('company-add', 'active')



@section('content')
	<div class="container-fluid">
        <div class="row">
         <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  	<div class="form-group">
	                    <label>Name</label>
	                    <input type="text" class="form-control" placeholder="Enter name">
                  	</div>
                  	<div class="form-group">
	                    <div class="form-group">
	                        <label>Address</label>
	                        <textarea class="form-control" rows="3" placeholder="Enter address"></textarea>
	                    </div>
                  	</div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
          
        </div>
      </div>
@endsection