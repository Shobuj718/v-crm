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
                <label>Passport Copy</label>
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
                <input type="date" name="passport_expire" id="passport_expire" class="form-control">
              </div>


              <div class="form-group">
                <label>Passport Sub.Date</label>
                <input type="date" name="passport_sub_date" id="passport_sub_date" class="form-control">
              </div>

            <!-- visa multiple image start -->
              <div class="input-group-visa control-group-visa increment-visa" >
                <label>Visa Copy</label>
                <input type="file" name="visa_copy[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-visa" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-visa hide">
                <div class="control-group-visa input-group-visa" style="margin-top:10px">
                  <input type="file" name="visa_copy[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-visa"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
                </div>
              </div>
              <!-- visa multiple image end -->

            <div class="form-group">
                <label>Visa Expire Date<span class="required">*</span></label>
                <input type="date" name="visa_expire_date" id="visa_expire_date" class="form-control">
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
                <input type="date" name="visa_sub_date" id="visa_sub_date" class="form-control">
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
                <input type="date" name="medical_date" id="medical_date" class="form-control">
              </div>

              <div class="input-group-levi control-group-levi increment-levi" >
                <label>Levi</label>
                <input type="file" name="levi_file[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-levi" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-levi hide">
                <div class="control-group-levi input-group-levi" style="margin-top:10px">
                  <input type="file" name="levi_file[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-levi"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
                </div>
              </div>

            <div class="input-group-icard control-group-icard increment-icard" >
                <label>I-Card</label>
                <input type="file" name="icard_file[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-icard" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-icard hide">
                <div class="control-group-icard input-group-icard" style="margin-top:10px">
                  <input type="file" name="icard_file[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-icard"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
                </div>
              </div>

            <div class="input-group-other control-group-other increment-other" >
                <label>Others</label>
                <input type="file" name="other_file[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-other" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-other hide">
                <div class="control-group-other input-group-other" style="margin-top:10px">
                  <input type="file" name="other_file[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-other"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
                </div>
              </div>

            <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
            </div>

            <div class="form-group">
                <label>Birth Date<span class="required">*</span></label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Enter birth date">
              </div>

              <div class="form-group">
                <label>Phone(MY)<span class="required">*</span></label>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter phone">
              </div>

              <div class="form-group">
                <label>Phone(BD)</label>
                <input type="number" name="phone_bd" id="phone_bd" class="form-control" placeholder="Enter phone(bd)">
              </div>

              <div class="form-group">
                <label>Phone (Emergency)</label>
                <input type="number" name="phone_emergency" id="phone_emergency" class="form-control" placeholder="Enter phone(emergency)">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
              </div>

              <div class="form-group">
              <label for="">Photo</label>
              <input type="file" name="member_image" id="member_image" class="form-control">
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

                <div class="input-group-document control-group-document increment-document" >
                <label>Document</label>
                <input type="file" name="document[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-document" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-document hide">
                <div class="control-group-document input-group-document" style="margin-top:10px">
                  <input type="file" name="document[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-document"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
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
                    <input type="date" name="cidb_subbmision_date" id="cidb_subbmision_date" class="form-control" placeholder="Enter birth date">
                </div>

              <div class="form-group">
                  <label>Delivery Date:</label>
                  <input type="date" name="cidb_delivery_date" id="cidb_delivery_date" class="form-control" />
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


            <div class="input-group-cidb control-group-cidb increment-cidb" >
                <label>CIDB Copy</label>
                <input type="file" name="cidb_file[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-info-cidb" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
              </div>
              <div class="clone-cidb hide">
                <div class="control-group-cidb input-group-cidb" style="margin-top:10px">
                  <input type="file" name="cidb_file[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger-cidb"><i class="glyphicon glyphicon-remove"></i> </button>
                  </div>
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
                <input type="date" name="deposit_refund_date" id="deposit_refund_date" class="form-control">
              </div>



              <div class="row">                
                <div class="col-md-1">                  
                      <a href="javascript:void(0);" class="btn btn-warning " title="Add field"><i class="fas fa-home"></i></a>
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

              <div class="field_wrapper_deposit">
                  <div class="row">
                    <div class="col-md-1">                  
                      <a href="javascript:void(0);" class="btn btn-primary add_button_deposit" title="Add field"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-1">                  
                      <p>1</p>
                    </div>
                    <div class="col-md-5">                  
                      <div class="form-group">
                        <input type="date" name="diposit_date[]" id="diposit_date[]" placeholder="asdfff" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-5">                  
                      <div class="form-group">
                        <input type="number" name="deposit_amount[]" id="deposit_amount[]" placeholder="asdfff dd"  class="form-control">
                      </div>
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
                      <a href="javascript:void(0);" class="btn btn-warning " title="Add field"><i class="fas fa-home"></i></a>
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

              <div class="field_wrapper_category_payment">
                  <div class="row">
                    <div class="col-md-1">                  
                      <a href="javascript:void(0);" class="btn btn-primary add_button_category_payment" title="Add field"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-1">                  
                      <p>1</p>
                    </div>
                    <div class="col-md-5">                  
                        <div class="form-group">
                        <select name="payment_category_id[]" id="payment_category_id[]" class="form-control select2" style="width: 100%;">
                          <option selected value="">Select</option>
                          @foreach($expense_categories as $expense_category)
                          <option value="{{ $expense_category->id ?? '' }}">{{ $expense_category->expense_category_name ?? '' }}</option>
                          @endforeach                         
                        </select>
                      </div>
                      </div>
                    <div class="col-md-5">                  
                      <div class="form-group">
                        <input type="number" name="payment_amount[]" id="payment_amount[]" placeholder="asdfff dd"  class="form-control">
                      </div>
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
                      <a href="javascript:void(0);" class="btn btn-warning " title="Add field"><i class="fas fa-home"></i></a>
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

              <div class="field_wrapper_installment">
                  <div class="row">
                    <div class="col-md-1">                  
                      <a href="javascript:void(0);" class="btn btn-primary add_button_installment " title="Add field"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-1">                  
                      <p>1</p>
                    </div>
                    <div class="col-md-5">                  
                      <div class="form-group">
                        <input type="date" name="installment_date[]" id="installment_date[]"  class="form-control">
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


  $(document).ready(function(){

    /*    $("input#diposit_discount").keyup(function(){
          var current = $("#total_deposit").val();
          var input = document.getElementById('#total_depositss');
          var procuring = $("#diposit_discount").val();
          console.log('cur'+input);
          console.log('curr'+procuring);
          //$("#updated").val(current - procuring);
          });

        function showMe(e) {
// i am spammy!
  alert(e.value);
}
      */  
        $("input#total_deposit").keydown(function(){
            var total_deposit = $(this).val();
            var totalwithgst = Number(budget);// - gst;
            $("input#permanent_diposit").val(totalwithgst.toFixed(2));
        });
        $("input#total_deposit").keyup(function(){
            var total_deposit = $(this).val();
            var totalwithgst = Number(total_deposit);// - gst;
            $("input#permanent_diposit").val(totalwithgst.toFixed(2));
        });
        $("input#diposit_discount").keyup(function(){
            var total_deposit = $(this).val();
            var total_deposit2 = $('#total_deposit').val();
            var totalwithgst = Number(total_deposit2) - total_deposit;
            console.log('per '+total_deposit)
            console.log('dis '+total_deposit2)
            console.log('diss '+totalwithgst)
            $("input#permanent_diposit").val(totalwithgst.toFixed(2));
            /*var diposit_discount = $(this).val();
            //var total_deposit2 = $('#permanent_diposit').val();            
            //var totalwithgst = Number(total_deposit2) - total_deposit;

            var diposit_discount = $("input#total_deposit").val();
            var total_deposit = document.getElementById('total_deposit').value;
            console.log('per '+diposit_discount)
            console.log('dis '+total_deposit)
            var result1 = parseInt(total_deposit) - parseInt(diposit_discount);
            $("input#permanent_diposit").val(result1.toFixed(2));*/
        });
        $("input#diposit_discount").keydown(function(){
            var total_deposit = $(this).val();
            var total_deposit2 = $('#total_deposit').val();
            var totalwithgst = Number(total_deposit2) - total_deposit;
            $("input#permanent_diposit").val(totalwithgst.toFixed(2));
        });

        /*sum();
        $("#diposit_discount").on("keydown keyup", function() {
            sum();
        });

        function sum() {
            var permanent_diposit = document.getElementById('permanent_diposit').value;
            var diposit_discount = document.getElementById('diposit_discount').value;
            //var result = parseInt(num1) + parseInt(num2);
            var result1 = parseInt(permanent_diposit) - parseInt(diposit_discount);
            if (!isNaN(result)) {
                //document.getElementById('sum').value = result;
            document.getElementById('permanent_diposit').value = result1;
            }
        }*/

    });
</script>


<script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; 
      var addButton = $('.add_button_category_payment'); 
      var wrapper = $('.field_wrapper_category_payment'); 

    var fieldHTML = '<div class="row"><a href="javascript:void(0);" class="" title="Add field"><div class="col-md-1 btn btn- remove_button_category_payment"><i class="fas fa-minus"></i></a></div><div class="col-md-1"> <p>1</p></div><div class="col-md-5"><div class="form-group"><select name="payment_category_id[]" id="payment_category_id[]" class="form-control select2" style="width: 100%;"><option selected value="">Select</option>@foreach($expense_categories as $expense_category)<option value="{{ $expense_category->id ?? '' }}">{{ $expense_category->expense_category_name ?? '' }}</option>@endforeach</select></div></div><div class="col-md-5"><div class="form-group"><input type="number" name="payment_amount[]" id="payment_amount[]" class="form-control"></div></div></div></div>';


      var x = 1; //Initial field counter is 1
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
      
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button_category_payment', function(e){
          e.preventDefault();
          $(this).parent('div').remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; 
      var addButton = $('.add_button_deposit'); 
      var wrapper = $('.field_wrapper_deposit'); 

      var fieldHTML = '<div class="row"><a href="javascript:void(0);" class="" title="Add field"><div class="col-md-1 btn btn- remove_button_deposit "><i class="fas fa-minus"></i></a></div><div class="col-md-1"> <p>1</p></div><div class="col-md-5"><div class="form-group"><input type="date" name="diposit_date[]" id="diposit_date[]" class="form-control"></div></div><div class="col-md-5"><div class="form-group"><input type="number" name="deposit_amount[]" id="deposit_amount[]" class="form-control"></div></div></div></div>';


      var x = 1; //Initial field counter is 1
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
      
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button_deposit', function(e){
          e.preventDefault();
          $(this).parent('div').remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; 
      var addButton = $('.add_button_installment'); 
      var wrapper = $('.field_wrapper_installment'); 

      var fieldHTML = '<div class="row"><a href="javascript:void(0);" class="" title="Add field"><div class="col-md-1 btn btn- remove_button_installment "><i class="fas fa-minus"></i></a></div><div class="col-md-1"> <p>1</p></div><div class="col-md-5"><div class="form-group"><input type="date" name="installment_date[]" id="installment_date[]" class="form-control"></div></div><div class="col-md-5"><div class="form-group"><input type="number" name="received_amount[]" id="received_amount[]" class="form-control"></div></div></div></div>';


      var x = 1; //Initial field counter is 1
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
      
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button_installment', function(e){
          e.preventDefault();
          $(this).parent('div').remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
</script>


<script type="text/javascript">
$(document).ready(function () {
  
      $(".btn-info").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
  
      $(".btn-info-visa").click(function(){ 
          var html = $(".clone-visa").html();
          $(".increment-visa").after(html);
      });

      $("body").on("click",".btn-danger-visa",function(){ 
          $(this).parents(".control-group-visa").remove();
      });
  
      $(".btn-info-levi").click(function(){ 
          var html = $(".clone-levi").html();
          $(".increment-levi").after(html);
      });

      $("body").on("click",".btn-danger-levi",function(){ 
          $(this).parents(".control-group-levi").remove();
      });
  
      $(".btn-info-icard").click(function(){ 
          var html = $(".clone-icard").html();
          $(".increment-icard").after(html);
      });

      $("body").on("click",".btn-danger-icard",function(){ 
          $(this).parents(".control-group-icard").remove();
      });
  
      $(".btn-info-other").click(function(){ 
          var html = $(".clone-other").html();
          $(".increment-other").after(html);
      });

      $("body").on("click",".btn-danger-other",function(){ 
          $(this).parents(".control-group-other").remove();
      });
  
      $(".btn-info-document").click(function(){ 
          var html = $(".clone-document").html();
          $(".increment-document").after(html);
      });

      $("body").on("click",".btn-danger-document",function(){ 
          $(this).parents(".control-group-document").remove();
      });
  
      $(".btn-info-cidb").click(function(){ 
          var html = $(".clone-cidb").html();
          $(".increment-cidb").after(html);
      });

      $("body").on("click",".btn-danger-cidb",function(){ 
          $(this).parents(".control-group-cidb").remove();
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