@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

@section('scripts')


<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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
    }
  });
});
</script>
@endsection


-------------------
@extends('master')

@section('category', 'menu-open')
@section('category-nav-link', 'active')
@section('add-category', 'active')

@section('styles')
  <style type="text/css">
    .requird{
      color:red;
    }
  </style>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


@endsection

@section('content')
  <div class="container-fluid">
        <div class="row">
         <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    <div class="form-group">
                      <label>Category Name<span class="requird">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter category name">
                    </div>
                    <div class="form-group">
                        <label>Category Status</label>
                        <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Selected Status</option>
                          <option selected="">Active</option>
                          <option selected="">Pending</option>
                          <option>Expire</option>
                        </select>
                    </div>
                </div>

                <div class="input-group control-group after-add-more">
                    <input type="file" name="addMoreFile[]" class="form-control" placeholder="Enter Name Here">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                  </div>


                  <!-- Copy Fields -->
                  <div class="copy hide">
                    <div class="control-group input-group" style="margin-top:10px">
                      <input type="file" name="addMoreFile[]" class="form-control" placeholder="Enter Name Here">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-minus"></i></button>
                      </div>
                    </div>
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <button type="submit" class="btn btn-warning">Clear</button>
                </div>
              </form>
            </div>

          </div>
          
        </div>
      </div>

      <script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>
@endsection
