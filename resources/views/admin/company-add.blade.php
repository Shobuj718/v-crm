@extends('master')

@section('company', 'menu-open')
@section('company-nav-link', 'active')
@section('company-add', 'active')

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
                <h3 class="card-title">Add Company</h3>
              </div>
              
              <div class="alert alert-success" role="alert" style="display:none;margin-top: 10px">
                  <span class="success"></span>
              </div>
              <div class="alert alert-danger" role="alert" style="display:none;margin-top: 10px">
                  <span class="error"></span>
              </div>

              <form role="form" id="addCompany">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Name<span class="requird">*</span></label>
                      <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter company name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                          <textarea class="form-control" name="company_address" id="company_address" rows="3" placeholder="Enter company address"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a type="submit" class="btn btn-warning" onclick="clearForm()">Clear</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  @endsection

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  
  $('#addCompany').validate({
    rules: {
      company_name: {
        required: true,
      },
    },
    messages: {
      company_name: { required: "required" },
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

      console.log('Called');
          var form = $('#addCompany')[0];       
          var bodyFormData = new FormData(form);    
          axios({
              method: 'post',
              url: "{{route('store.company')}}",
              data: bodyFormData,
              headers: {'Content-Type': 'multipart/form-data' }
          })
          .then(function (response) {
              console.log(response);
              
              if(response.data.status == 'success'){
                  $('.alert-success').css("display", "block");
                  $('.success').html(response.data.message).show();
                  $("#addCompany")[0].reset();
                  window.location.href = response.data.redirect_url;
              }else{
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
    $("#addCompany")[0].reset();
  }

</script>
@endsection
