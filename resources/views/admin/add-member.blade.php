@extends('master')

@section('member', 'menu-open')
@section('member-nav-link', 'active')
@section('add-member', 'active')

@section('styles')
  <style type="text/css">
    .required{
      color:red;
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

@endsection

@section('content')
<div class="container-fluid">

  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Member</h3>
    </div>
    
              <div class="alert alert-success" role="alert" style="display:none;margin-top: 10px">
                  <span class="success"></span>
              </div>
              <div class="alert alert-danger" role="alert" style="display:none;margin-top: 10px">
                  <span class="error"></span>
              </div>

    <form role="form" id="addMember">

        <div class="row">
          <div class="col-md-6">
            <div class="card-body">

              <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Passport Informaion</h3>
              </div>
              </div>

                <div class="form-group">
                  <label>Company<span class="required">*</span></label>
                  <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;">
                    <option value="" selected>Selected Company Name</option>
                    @foreach($companies as $company)
                    <option value="{{ $company->id ?? '' }}">{{ $company->company_name ?? '' }}</option>
                    @endforeach
                  </select>
                </div>

              <div class="form-group">
                <label>Passport No<span class="required">*</span></label>
                <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Enter passport no">
              </div>

              <div class="form-group">
                <label>Passport Surname<span class="required">*</span></label>
                <input type="text" name="passport_surname" id="passport_surname" class="form-control" placeholder="Enter passport surname">
              </div>

              <div class="form-group">
                <label>Passport Givename<span class="required">*</span></label>
                <input type="text" name="passport_givename" id="passport_givename" class="form-control" placeholder="Enter passport givename">
              </div>

              <div class="form-group">
                <label>Group Name</label>
                <input type="text" name="group_name" id="group_name" class="form-control" placeholder="Enter group name">
              </div>

            <!-- <div class="form-group">
              <label for="exampleInputFile">Passport Copy</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="passport_copy[]" id="passport_copy[]" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>

              </div>
            </div> -->


            <div class="input-group control-group increment" >
                <input type="file" name="passport_copy[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                  <input type="file" name="passport_copy[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <label>Passport Expire<span class="required">*</span></label>
                <input type="text" name="passport_expire" id="passport_expire" class="form-control">
              </div>


              <div class="form-group">
                <label>Passport Sub.Date</label>
                <input type="text" name="passport_sub_date" id="passport_sub_date" class="form-control">
              </div>

            <div class="form-group">
              <label for="exampleInputFile">Visa Copy</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="visa_copy[]" id="visa_copy[]" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="form-group">
                <label>Visa Expire Date<span class="required">*</span></label>
                <input type="text" name="visa_expire_date" id="visa_expire_date" class="form-control">
              </div>

            <div class="form-group">
                  <label>Visa Status</label>
                  <select name="visa_status" id="visa_status" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option selected="">Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Visa Sub.Date</label>
                <input type="text" name="visa_sub_date" id="visa_sub_date" class="form-control">
              </div>

            <div class="form-group">
                  <label>Medical Status</label>
                  <select name="medical_status" id="medical_status" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option selected="">Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Medical Date</label>
                <input type="text" name="medical_date" id="medical_date" class="form-control">
              </div>

              <div class="form-group">
              <label for="exampleInputFile">Levi</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="levi_file[]" id="levi_file[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">I-Card</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="icard_file[]" id="icard_file[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Others</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="other_file[]" id="other_file[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
            </div>

            <div class="form-group">
                <label>Birth Date<span class="required">*</span></label>
                <input type="text" name="birth_date" id="birth_date" class="form-control" placeholder="Enter birth date">
              </div>

              <div class="form-group">
                <label>Phone(MY)<span class="required">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone">
              </div>

              <div class="form-group">
                <label>Phone(BD)</label>
                <input type="text" name="phone_bd" id="phone_bd" class="form-control" placeholder="Enter phone(bd)">
              </div>

              <div class="form-group">
                <label>Phone (Emergency)</label>
                <input type="text" name="phone_emergency" id="phone_emergency" class="form-control" placeholder="Enter phone(emergency)">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
              </div>

              <div class="form-group">
              <label for="exampleInputFile">Photo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="member_image" id="member_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>

            <div class="form-group">
                  <div class="form-group">
                      <label>Present Address</label>
                      <textarea name="present_address" id="present_address" class="form-control" rows="3" placeholder="Enter present address"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                      <label>Permanent Address</label>
                      <textarea name="parmanent_address" id="parmanent_address" class="form-control" rows="3" placeholder="Enter permanent address"></textarea>
                  </div>
                </div>

              <div class="card card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Other Information</h3>
                  </div>
              </div>

              <label>Letter Collection<span class="required">*</span></label>
              <div class="form-check">                
                <input type="checkbox" name="letter_bank" id="letter_bank" class="form-check-input">
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck1">Letter Bank</label>

                <input type="checkbox" name="home_country" id="home_country" class="form-check-input">
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck2">Home Country</label>

                <input type="checkbox" name="out_station" id="out_station" class="form-check-input" >
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck3">Out Station</label>
              </div>

                <div class="form-group">
                  <label>Current Status<span class="required">*</span></label>
                  <input type="text" name="current_status" id="current_status" class="form-control" placeholder="Enter current status">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Document</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="document" id="document" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                    <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                    </button>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                      <label>Special Note</label>
                      <textarea name="special_note" id="special_note" class="form-control" rows="3" placeholder="Enter category details"></textarea>
                  </div>
                </div>


                <div class="form-check">                
                  <input type="checkbox"  name="file_close" id="file_close" class="form-check-input" id="exampleCheck1">
                  <label style="padding-right:30px;" class="form-check-label" for="exampleCheck1">File Close</label>
                </div>

            </div> 

          </div>


          <div class="col-md-6">
            <div class="card-body">
              
              <div class="form-group">
                  <label>Passport Status</label>
                  <select name="passport_status" id="passport_status" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Status</option>
                    <option>Active</option>
                    <option>Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

            <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">CIDB Informaion</h3>
              </div>
            </div>


              <div class="form-group">
                  <label> Subbmission Date:</label>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">                    
                          <input type="text" name="cidb_subbmision_date" id="cidb_subbmision_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        </div>
                    </div>
                </div>

              <div class="form-group">
                  <label>Delivery Date:</label>
                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">                    
                          <input type="text" name="cidb_delivery_date" id="cidb_delivery_date" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                        </div>
                    </div>
                </div>


              <div class="form-group">
                  <label>Status</label>
                  <select name="cidb_status" id="cidb_status" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Status</option>
                    <option >Active</option>
                    <option >Pending</option>
                    <option>Expire</option>
                  </select>
                </div>


            <div class="form-group">
              <label for="exampleInputFile">CIDB Copy</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="cidb_file[]" id="cidb_file[]" class="custom-file-input" >
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Depposit Informaion</h3>
              </div>
            </div>


              <div class="form-group">
                <label>Total deposit</label>
                <input type="number" name="total_deposit" id="total_deposit" class="form-control" placeholder="Enter total deposit">
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="number" name="diposit_discount" id="diposit_discount" class="form-control" placeholder="Enter discount">
              </div>
              <div class="form-group">
                <label>Permanent Deposit</label>
                <input type="number" name="permanent_diposit" id="permanent_diposit" class="form-control" placeholder="Enter permanent diposite">
              </div>
              <div class="form-group">
                <label>Refund Amount</label>
                <input type="number" name="deposit_refund_amount" id="deposit_refund_amount" class="form-control" placeholder="Enter refound amount">
              </div>
              <div class="form-group">
                <label>Refund Date</label>
                <input type="text" name="deposit_refund_date" id="deposit_refund_date" class="form-control">
              </div>


                
              <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>#</p>
                </div>
                <div class="col-md-5">                  
                    <label>Deposit Date</label>                  
                </div>
                <div class="col-md-5">                  
                    <label>Amount</label>                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-danger float-right"><i class="fas fa-minus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>1</p>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="text" name="diposit_date[]" id="diposit_date[]" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="number" name="deposit_amount[]" id="deposit_amount[]" class="form-control" placeholder="Enter name">
                  </div>
                </div>

              </div>

              <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Payment Informaion</h3>
              </div>
            </div>


            <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>#</p>
                </div>
                <div class="col-md-5">                  
                    <label>Category</label>                  
                </div>
                <div class="col-md-5">                  
                    <label>Amount</label>                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-danger float-right"><i class="fas fa-minus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>1</p>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                  <select name="payment_category_id[]" id="payment_category_id[]" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option value="1">SOCSO</option>                    
                    <option value="2">MEDICAL FEE</option>
                    <option value="3">VISA FEE</option>
                     <option value="4">LETTER</option>
                     <option value="5">MEDICAL 2</option>
                    <option value="6">CIDB FEE</option>
                   
                  </select>
                </div>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="number" name="payment_amount[]" id="payment_amount[]" class="form-control">
                  </div>
                </div>

              </div>

              

              <div class="form-group">
                <label>Total Amount</label>
                <input type="number" name="payment_total_amount" id="payment_total_amount" class="form-control" placeholder="Enter total amount">
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="number" name="payment_discount" id="payment_discount" class="form-control" placeholder="Enter discount">
              </div>
              <div class="form-group">
                <label>Payable</label>
                <input type="number" name="payment_payable" id="payment_payable" class="form-control" placeholder="">
              </div>

              <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>#</p>
                </div>
                <div class="col-md-5">                  
                    <label>Installment Date</label>                  
                </div>
                <div class="col-md-5">                  
                    <label>Received Amount</label>                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-1">                  
                  <button type="button" class="btn btn-danger float-right"><i class="fas fa-minus"></i> 
                </button>
                </div>
                <div class="col-md-1">                  
                  <p>1</p>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="text" name="installment_date[]" id="installment_date[]" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="number" name="received_amount[]" id="received_amount[]" class="form-control">
                  </div>
                </div>
              </div>

            </div>            
          </div>

        </div>
        <div class="card-footer" style="text-align:;">
            <button type="submit" class="btn btn-success">Submit</button>
                  <a type="submit" class="btn btn-warning" onclick="clearForm()">Clear</a>
        </div>
    </form>


  </div>
</div>
@endsection

@section('scripts')




<script type="text/javascript">
$(document).ready(function () {
  
  $(".btn-info").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

  $('#addMember').validate({
    rules: {
      passport_no: {required: true},
      passport_surname: {required: true},
      passport_givename: {required: true},
      passport_expire: {required: true},
      visa_expire_date: {required: true},
      birth_date: {required: true},
      phone: {required: true},
      letter_bank: {required: true},
      current_status: {required: true},
      company_id: {
          required: {
              depends: function(element) {
                  return $("#company_id").val() == '';
              }
          }
      }
    },
    messages: {
      passport_no: { required: "required" },
      passport_surname: { required: "required" },
      passport_givename: { required: "required" },
      passport_expire: { required: "required" },
      visa_expire_date: { required: "required" },
      birth_date: { required: "required" },
      phone: { required: "required" },
      letter_bank: { required: "required" },
      current_status: { required: "required" },
      
      company_id: { required: "required" },
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
      
          alert( "Form successful submitted!" );
          //return false;

          var form = $('#addMember')[0];       
          var bodyFormData = new FormData(form); 
          console.log(bodyFormData);
          //return false;  

          axios({
              method: 'post',
              url: "{{route('store.member')}}",
              data: bodyFormData,
              headers: {'Content-Type': 'multipart/form-data' }
          })
          .then(function (response) {
              console.log(response);
              //return false;
              if(response.data.status == 'success'){
                  $('.alert-success').css("display", "block");
                  $('.success').html(response.data.message).show();
                  //$("#addMember")[0].reset();
                  //window.location.href = response.data.redirect_url;
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
  $("#addExpense")[0].reset();
}

</script>
@endsection