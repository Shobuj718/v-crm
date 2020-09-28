@extends('master')

@section('user', 'menu-open')
@section('user-nav-link', 'active')
@section('add-user', 'active')

@section('styles')
  <style type="text/css">
    .requird{
      color:red;
    }
  </style>
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
         <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">

                    <div class="form-group">
                      <label>Role<span class="requird">*</span></label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Selected Role</option>
                        <option>Admin</option>
                        <option>Author</option>
                        <option>Guest</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Username<span class="requird">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                      <label>Email<span class="requird">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                      <label>Password<span class="requird">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter Password">
                    </div>

                  	<div class="form-group">
	                    <label>Confirm Password<span class="requird">*</span></label>
	                    <input type="text" class="form-control" placeholder="Confirm Password">
                  	</div>
                  	
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <button type="submit" class="btn btn-warning">Clear</button>
                </div>
              </form>
            </div>

          </div>

          <div class="col-md-4">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">User Access</h3>
              </div>
              </div>

                <div class="position-relative p-3 bg-gray" style="height: 400px">
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                      User Access
                    </div>
                  </div>
                  <ul class="list-unstyled">
                      <li>Roll User
                          <ul>
                              <li>USER_ACCESS</li>
                          </ul>
                      </li>
                      <li>Roll Company
                          <ul>
                              <li>COMPANY_ACCESS</li>
                          </ul>
                      </li>
                      <li>Roll Category
                          <ul>
                              <li>CATEGORY_ACCESS</li>
                          </ul>
                      </li>
                      <li>Roll Member
                          <ul>
                              <li>MEMBER CREATE</li>
                              <li>MEMBER LIST</li>
                              <li>MEMBER SHOW</li>
                          </ul>
                      </li>
                      <li>Contact</li>
                  </ul>
                </div>
            </div>


          
        </div>
      </div>
@endsection