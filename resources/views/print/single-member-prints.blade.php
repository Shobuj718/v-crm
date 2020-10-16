@extends('master')

@section('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="<p>{{  asset('/adminlte/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<p>{{  asset('/adminlte/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('member', 'menu-open')
@section('member-nav-link', 'active')
@section('member-list', 'active')

@section('page-header')
    <h2>Member Details Print</h2>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

            
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col member-list-itemss">
                    <h2>Member Details</h2>
                    <div class="memberr-listt-itemss"> <h5>Passport Status</h5><span>:</span> <p>{{  $member->passport_status ?? '' }}</p> </div>


                    <div class="memberr-listt-itemss"><h5>Letter Collection</h5> <span>:</span> <p>{{  $member->letter_bank ?? $member->home_country ?? $member->out_station ?? '' }}</p></div>

                    

                    <div class="memberr-listt-itemss"><h5>Current Status</h5> <span>:</span> <p>{{  $member->current_status ?? '' }}</p></div>

                    <div class="memberr-listt-itemss"><h5>Document </h5> <span>:</span> <p>


                    @foreach($member->documents as $data)
                    
                      <a target="_blank" href="{{ asset('images/document/') }}/{{  $data->document_image ?? '' }}">{{  $data->document_image ?? '' }}</a>,
                      <!-- <img src="{{ asset('images/document/') }}/{{  $data->document_image ?? '' }}" alt="document_image">, -->
                    @endforeach

                    

                    </p></div>
                    <div class="memberr-listt-itemss"><h5>Company Name </h5> <span>:</span> <p>{{  $member->company->company_name ?? '' }}</p></div>

                    <h2>Passport and Visa Information</h2>

                    <div class="memberr-listt-itemss"><h5>Passport No </h5> <span>:</span> <p>{{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Name as Passport </h5> <span>:</span> <p>{{  $member->passport_surname ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Group Name </h5> <span>:</span> <p>{{  $member->group_name ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Passport Copy </h5> <span>:</span> <p>
                    
                    @foreach($member->passports as $data)
                      <a target="_blank" href="{{ asset('images/passport/') }}/{{  $data->passport_image ?? '' }}">{{  $data->passport_image ?? '' }}</a>,
                    @endforeach
                    

                    </p></div>

                    <div class="memberr-listt-itemss"><h5>Passport Expired </h5> <span>:</span> <p>{{  $member->passport_expire ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Passport Submition Date </h5> <span>:</span> <p>{{  $member->passport_sub_date ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Visa Copy </h5> <span>:</span> <p>

                    
                    @foreach($member->allVisa as $data)
                      <a target="_blank" href="{{ asset('images/visa_copy/') }}/{{  $data->visa_image ?? '' }}">{{  $data->visa_image ?? '' }}</a>,
                    @endforeach

                    </p></div>


                    <div class="memberr-listt-itemss"><h5>Visa Expired </h5> <span>:</span> <p>{{  $member->visa_expire_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Visa Status </h5> <span>:</span> <p>{{  $member->visa_status ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Visa Submition Date </h5> <span>:</span> <p>{{  $member->visa_sub_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Medical Status </h5> <span>:</span> <p>{{  $member->medical_status ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Medical Date </h5> <span>:</span> <p>{{  $member->medical_date ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Levi </h5> <span>:</span> <p>
                    
                    @foreach($member->allLevis as $data)
                      <a target="_blank" href="{{ asset('images/levi_file/') }}/{{  $data->levi_image ?? '' }}">{{  $data->levi_image ?? '' }}</a>,
                    @endforeach

                    </p></div>

                    <div class="memberr-listt-itemss"><h5>I-Card </h5> <span>:</span> <p>

                    @foreach($member->allIcards as $data)
                      <a target="_blank" href="{{ asset('images/icard_file/') }}/{{  $data->icard_image ?? '' }}">{{  $data->icard_image ?? '' }}</a>,
                    @endforeach

                    </p></div>
                    <div class="memberr-listt-itemss"><h5>Others </h5> <span>:</span> <p>

                    @foreach($member->allOthers as $data)
                      <a target="_blank" href="{{ asset('images/other_file/') }}/{{  $data->other_image ?? '' }}">{{  $data->other_image ?? '' }}</a>,
                    @endforeach

                    </p></div>


                    <h2>Passport and Visa Information</h2>

                    <div class="memberr-listt-itemss"><h5>Photo </h5> <span>:</span> <p><a target="_blank" href="{{ asset('images/member_image/') }}/{{  $member->member_image ?? '' }}">{{  $member->member_image ?? '' }}</a></p></div>

                    

                    <div class="memberr-listt-itemss"><h5>Date of Birth </h5> <span>:</span> <p>{{  $member->birth_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Phone(MY) </h5> <span>:</span> <p>{{  $member->phone ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Phone(BD) </h5> <span>:</span> <p>{{  $member->phone_bd ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Phone(Emargency) </h5> <span>:</span> <p>{{  $member->phone_emergency ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Email </h5> <span>:</span> <p>{{  $member->email ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Present Address </h5> <span>:</span> <p>{{  $member->present_address ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Parmanent Address </h5> <span>:</span> <p>{{  $member->parmanent_address ?? '' }}</p></div>


                    <h2>CIDB Information</h2>

                    <div class="memberr-listt-itemss"><h5>Submition Date </h5> <span>:</span> <p>{{  $member->cidb_subbmision_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Delivery Date </h5> <span>:</span> <p>{{  $member->cidb_delivery_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Status </h5> <span>:</span> <p>{{  $member->cidb_status ?? '' }}</p></div>

                    
                    <div class="memberr-listt-itemss"><h5>CIDB Copy </h5> <span>:</span> <p>
                      
                      @foreach($member->cidbs as $data)
                      <a target="_blank" href="{{ asset('images/cidb_file/') }}/{{  $data->cidb_image ?? '' }}">{{  $data->cidb_image ?? '' }}</a>,
                    @endforeach
                    
                    </p></div>


                    <h2>Payment Information</h2>

                    <div class="memberr-listt-itemss"><h5>Payment(1) </h5> <span>:</span>  <p> (VISA FEE) {{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Payment(2) </h5> <span>:</span> <p> (MEDICAL FEE) {{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Payment(3) </h5> <span>:</span>  <p> (CIDB FEE){{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Payment(4) </h5> <span>:</span> <p> (SOCSO) {{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Total Amount </h5> <span>:</span> <p>{{  $member->payment_total_amount ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Discount </h5> <span>:</span> <p>{{  $member->payment_discount ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Payable </h5> <span>:</span> <p>{{  $member->payment_payable ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Installment(1) </h5> <span>:</span> <p>{{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Total Paid </h5> <span>:</span> <p>{{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Due Amount </h5> <span>:</span> <p>{{  $member->passport_no ?? '' }}</p></div>


                    <h2>Deposit Payment Information</h2>

                    <div class="memberr-listt-itemss"><h5>Total Deposit </h5> <span>:</span> <p>{{  $member->total_deposit ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Discount </h5> <span>:</span> <p>{{  $member->diposit_discount ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Parmanent Deposit </h5> <span>:</span> <p>{{  $member->permanent_diposit ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Refund Amount </h5> <span>:</span> <p>{{  $member->deposit_refund_amount ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Refund Date </h5> <span>:</span> <p>{{  $member->deposit_refund_date ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Deposit(1) </h5> <span>:</span> <p>{{  $member->diposit_date ?? '' }}</p></div>


                </div>
              
              </div>

            <br>  

              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('print.member.details', $member->uid) }}" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-left"><i class="far fa-credit-card"></i> Excel</button>
                  <a href="{{ route('single.member.details.download', $member->uid) }}" target="_blank" class="btn btn-primary float-left" style="margin-left</h5> <span>:</span> 5px;"><i class="fas fa-download"></i> PDF</a>
                  <!-- <a href="#" onclick="window.open('MyPDF.pdf', '_blank', 'fullscreen=yes'); return false;">MyPDF</a> -->
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
<script src="<p>{{  asset('/adminlte/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<p>{{  asset('/adminlte/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<p>{{  asset('/adminlte/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<p>{{  asset('/adminlte/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive"</h5> <span>:</span> true,
      "autoWidth"</h5> <span>:</span> false,
    });
    $('#example2').DataTable({
      "paging"</h5> <span>:</span> true,
      "lengthChange"</h5> <span>:</span> false,
      "searching"</h5> <span>:</span> false,
      "ordering"</h5> <span>:</span> true,
      "info"</h5> <span>:</span> true,
      "autoWidth"</h5> <span>:</span> false,
      "responsive"</h5> <span>:</span> true,
    });
  });
</script>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>

@endsection