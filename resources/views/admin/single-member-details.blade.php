@extends('master')

@section('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('member', 'menu-open')
@section('member-nav-link', 'active')
@section('member-list', 'active')

@section('page-header')
	<h2>Member Details</h2>
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

            
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">

                    <h5 class="float-right">Passport Status : {{ $member->passport_status ?? '' }}</h5>
                    <h5>Letter Collection : {{ $member->letter_bank ?? $member->home_country ?? $member->out_station ?? '' }}</h5>

                    

                    <h5>Current Status : {{ $member->current_status ?? '' }}</h5>
                    <h5>Document : {{ $member->document ?? '' }}</h5>
                    <h5>Company Name : {{ $member->company->company_name ?? '' }}</h5>

                    <h2>Passport and Visa Information</h2>

                    <h5>Passport No : {{ $member->passport_no ?? '' }}</h5>
                    <h5>Name as Passport : {{ $member->passport_surname ?? '' }}</h5>
                    <h5>Group Name : {{ $member->group_name ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>Passport Copy : {{ $member->passport_no ?? '' }}</h5>

                    <h5>Passport Expired : {{ $member->passport_expire ?? '' }}</h5>
                    <h5>Passport Submition Date : {{ $member->passport_sub_date ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>Visa Copy : {{ $member->passport_no ?? '' }}</h5>

                    <h5>Visa Expired : {{ $member->visa_expire_date ?? '' }}</h5>
                    <h5>Visa Status : {{ $member->visa_status ?? '' }}</h5>
                    <h5>Visa Submition Date : {{ $member->visa_sub_date ?? '' }}</h5>
                    <h5>Medical Status : {{ $member->medical_status ?? '' }}</h5>
                    <h5>Medical Date : {{ $member->medical_date ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>Levi : {{ $member->passport_no ?? '' }}</h5>
                    <h5>I-Card : {{ $member->passport_no ?? '' }}</h5>
                    <h5>Others : {{ $member->passport_no ?? '' }}</h5>


                    <h2>Passport and Visa Information</h2>

                    <h5>Photo : {{ $member->member_image ?? '' }}</h5>
                    <h5>Date of Birth : {{ $member->birth_date ?? '' }}</h5>
                    <h5>Phone(MY) : {{ $member->phone ?? '' }}</h5>
                    <h5>Phone(BD) : {{ $member->phone_bd ?? '' }}</h5>
                    <h5>Phone(Emargency) : {{ $member->phone_emergency ?? '' }}</h5>
                    <h5>Email : {{ $member->email ?? '' }}</h5>
                    <h5>Present Address : {{ $member->present_address ?? '' }}</h5>
                    <h5>Parmanent Address : {{ $member->parmanent_address ?? '' }}</h5>


                    <h2>CIDB Information</h2>

                    <h5>Submition Date : {{ $member->cidb_subbmision_date ?? '' }}</h5>
                    <h5>Delivery Date : {{ $member->cidb_delivery_date ?? '' }}</h5>
                    <h5>Status : {{ $member->cidb_status ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>CIDB Copy : {{ $member->passport_no ?? '' }}</h5>


                    <h2>Payment Information</h2>

                    <h5>Payment(1) : (VISA FEE) {{ $member->passport_no ?? '' }}</h5>
                    <h5>Payment(2) : (MEDICAL FEE) {{ $member->passport_no ?? '' }}</h5>
                    <h5>Payment(3) : (CIDB FEE) {{ $member->passport_no ?? '' }}</h5>
                    <h5>Payment(4) : (SOCSO) {{ $member->passport_no ?? '' }}</h5>
                    <h5>Total Amount : {{ $member->payment_total_amount ?? '' }}</h5>
                    <h5>Discount : {{ $member->payment_discount ?? '' }}</h5>
                    <h5>Payable : {{ $member->payment_payable ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>Installment(1) : {{ $member->passport_no ?? '' }}</h5>
                    <h5>Total Paid : {{ $member->passport_no ?? '' }}</h5>
                    <h5>Due Amount : {{ $member->passport_no ?? '' }}</h5>


                    <h2>Deposit Payment Information</h2>

                    <h5>Total Deposit : {{ $member->total_deposit ?? '' }}</h5>
                    <h5>Discount : {{ $member->diposit_discount ?? '' }}</h5>
                    <h5>Parmanent Deposit : {{ $member->permanent_diposit ?? '' }}</h5>
                    <h5>Refund Amount : {{ $member->deposit_refund_amount ?? '' }}</h5>
                    <h5>Refund Date : {{ $member->deposit_refund_date ?? '' }}</h5>

                    <!-- multiple value  -->
                    <h5>Deposit(1) : {{ $member->diposit_date ?? '' }}</h5>


                </div>
              
              </div>

            <br>  

              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-left"><i class="far fa-credit-card"></i> Excel</button>
                  <button type="button" class="btn btn-primary float-left" style="margin-left: 5px;">
                    <i class="fas fa-download"></i>PDF
                  </button>
                </div>
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