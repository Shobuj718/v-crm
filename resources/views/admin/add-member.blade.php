@extends('master')

@section('member', 'menu-open')
@section('add-member', 'active')



@section('content')
<div class="container-fluid">

  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Member</h3>
    </div>
    <form role="form">

        <div class="row">
          <div class="col-md-6">
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

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>

            </div>            
          </div>
          <div class="col-md-6">
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

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>

            </div>            
          </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


  </div>
</div>
@endsection