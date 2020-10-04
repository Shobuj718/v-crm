@extends('master')

@section('expense', 'menu-open')
@section('expense-nav-link', 'active')
@section('expense-add', 'active')

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
                <h3 class="card-title">Update Expense</h3>
              </div>
              
              <div class="alert alert-success" role="alert" style="display:none;margin-top: 10px">
                  <span class="success"></span>
              </div>
              <div class="alert alert-danger" role="alert" style="display:none;margin-top: 10px">
                  <span class="error"></span>
              </div>

              <form role="form" id="udpateExpense">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Expense Name<span class="requird">*</span></label>
                      <input type="text" name="expense_category_name" id="expense_category_name" value="{{ $expense->expense_category_name }}" class="form-control" placeholder="Enter category name">
                  </div>
                  <div class="form-group">
                        <label>Expense Status</label>
                        <select name="expense_category_status" id="expense_category_status" class="form-control select2" style="width: 100%;">
                          <option value="" selected="selected">Select Status</option>
                          <option value="active" {{ $expense->expense_category_status == 'active' ? 'selected="selected"' : '' }}>Active</option>
                          <option value="pending" {{ $expense->expense_category_status == 'pending' ? 'selected="selected"' : '' }}>Pending</option>
                          <option value="deactive" {{ $expense->expense_category_status == 'deactive' ? 'selected="selected"' : '' }}>Deactive</option>
                        </select>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  
  $('#udpateExpense').validate({
    rules: {
      expense_category_name: {
        required: true,
      },
      expense_category_status: {
          required: {
              depends: function(element) {
                  return $("#expense_category_status").val() == '';
              }
          }
      }
    },
    messages: {
      expense_category_name: { required: "required" },
      expense_category_status: { required: "required" },
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

          var form = $('#udpateExpense')[0];       
          var bodyFormData = new FormData(form); 
          console.log(bodyFormData);
          //return false;  

          axios({
              method: 'post',
              url: "{{route('expense.category.update', $expense->uid)}}",
              data: bodyFormData,
              headers: {'Content-Type': 'multipart/form-data' }
          })
          .then(function (response) {
              console.log(response);
              
              if(response.data.status == 'success'){
                  $('.alert-success').css("display", "block");
                  $('.success').html(response.data.message).show();
                  $("#udpateExpense")[0].reset();
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
  $("#udpateExpense")[0].reset();
}

</script>
@endsection
