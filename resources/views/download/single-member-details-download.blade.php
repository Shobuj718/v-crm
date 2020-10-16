
	<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-body">

            
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col member-list-itemss">

                    <div class="memberr-listt-itemss"> <h5>Passport Status</h5><span>:</span> <p>{{  $member->passport_status ?? '' }}</p> </div>


                    <div class="memberr-listt-itemss"><h5>Letter Collection</h5> <span>:</span> <p>{{  $member->letter_bank ?? $member->home_country ?? $member->out_station ?? '' }}</p></div>

                    

                    <div class="memberr-listt-itemss"><h5>Current Status</h5> <span>:</span> <p>{{  $member->current_status ?? '' }}</p></div>

                    <div class="memberr-listt-itemss"><h5>Document </h5> <span>:</span> <p>


                                       

                    </p></div>
                    <div class="memberr-listt-itemss"><h5>Company Name </h5> <span>:</span> <p>{{  $member->company->company_name ?? '' }}</p></div>

                    <h2>Passport and Visa Information</h2>

                    <div class="memberr-listt-itemss"><h5>Passport No </h5> <span>:</span> <p>{{  $member->passport_no ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Name as Passport </h5> <span>:</span> <p>{{  $member->passport_surname ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Group Name </h5> <span>:</span> <p>{{  $member->group_name ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Passport Copy </h5> <span>:</span> <p>
                    
                    
                    

                    </p></div>

                    <div class="memberr-listt-itemss"><h5>Passport Expired </h5> <span>:</span> <p>{{  $member->passport_expire ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Passport Submition Date </h5> <span>:</span> <p>{{  $member->passport_sub_date ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Visa Copy </h5> <span>:</span> <p>

                    
                    

                    </p></div>


                    <div class="memberr-listt-itemss"><h5>Visa Expired </h5> <span>:</span> <p>{{  $member->visa_expire_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Visa Status </h5> <span>:</span> <p>{{  $member->visa_status ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Visa Submition Date </h5> <span>:</span> <p>{{  $member->visa_sub_date ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Medical Status </h5> <span>:</span> <p>{{  $member->medical_status ?? '' }}</p></div>
                    <div class="memberr-listt-itemss"><h5>Medical Date </h5> <span>:</span> <p>{{  $member->medical_date ?? '' }}</p></div>

                    <!-- multiple value  -->
                    <div class="memberr-listt-itemss"><h5>Levi </h5> <span>:</span> <p>
                    

                    </p></div>

                    <div class="memberr-listt-itemss"><h5>I-Card </h5> <span>:</span> <p>

                    

                    </p></div>
                    <div class="memberr-listt-itemss"><h5>Others </h5> <span>:</span> <p>

                    

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

            </div>
              </div>

            </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
