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
                <h3 class="card-title">Update User</h3>
              </div>
              
              <div class="alert alert-success" role="alert" style="display:none;margin-top: 10px">
                  <span class="success"></span>
              </div>
              <div class="alert alert-danger" role="alert" style="display:none;margin-top: 10px">
                  <span class="error"></span>
              </div>

              <form role="form" id="updateUser">
                <div class="card-body">

                    <div class="form-group">
                      <label>Role<span class="requird">*</span></label>
                      <select name="role" id="role" class="form-control select2" style="width: 100%;">
                        <option  value="" selected="selected">Select Role</option>
                        <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected="selected"' : '' }} >Super Admin</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected="selected"' : '' }} >Admin</option>
                        <option value="staff" {{ $user->role == 'staff' ? 'selected="selected"' : '' }} >Staff</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected="selected"' : '' }} >User</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Username<span class="requird">*</span></label>
                      <input type="text" name="username" id="username" value="{{ $user->username ?? '' }}" class="form-control" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                      <label>Email<span class="requird">*</span></label>
                      <input type="text" name="email" id="email" value="{{ $user->email ?? '' }}"  class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                      <label>Password<span class="requird">*</span></label>
                      <input type="text" name="password" id="password" value="{{ $user->original_password ?? '' }}"  class="form-control" placeholder="Enter Password">
                    </div>

                  	<div class="form-group">
	                    <label>Confirm Password<span class="requird">*</span></label>
	                    <input type="text" name="password_confirm" id="password_confirm" value="{{ $user->original_password ?? '' }}"  class="form-control" placeholder="Confirm Password">
                  	</div>
                  	
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a type="submit" class="btn btn-warning" onclick="clearForm()">Clear</a>
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

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  
  $('#updateUser').validate({
    rules: {
      username: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6
      },
      password_confirm: {
            required: true,
            minlength: 6,
            equalTo: "#password"
      },
      role: {
          required: {
              depends: function(element) {
                  return $("#role").val() == '';
              }
          }
      }
    },
    messages: {
      username: { required: "required" },
      email: {
        required: "required",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "required",
        minlength: "Your password must be at least 6 characters long"
      },
      password_confirm: { required: "required" },
      role: { required: "required" },

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
    submitHandler: function () {
      
          //alert( "Form successful submitted!" );
          //return false;

          var form = $('#updateUser')[0];       
          var bodyFormData = new FormData(form); 
          console.log(bodyFormData);
          //return false;  

          axios({
              method: 'post',
              url: "{{route('update.user', $user->uid)}}",
              data: bodyFormData,
              headers: {'Content-Type': 'multipart/form-data' }
          })
          .then(function (response) {
              console.log(response);
              
              if(response.data.status == 'success'){
                  $('.alert-success').css("display", "block");
                  $('.success').html(response.data.message).show();
                  $("#updateUser")[0].reset();
                  window.location.href = response.data.redirect_url;
              }else{
                $('.alert-error').css("display", "block");
                $('.error').html(response.data.message).show().delay(5000).fadeOut();
              }
              
          })
          .catch(function (response) {
              console.log(response);
          });

    }

  });



});

function clearForm(){
  $("#adduser")[0].reset();
  $("#role")[0].selectedIndex = 0;  
  $("#role option:selected").removeAttr("selected");
}

</script>
@endsection
