@extends('master')

@section('member', 'menu-open')
@section('member-nav-link', 'active')
@section('add-member', 'active')



@section('content')
<div class="container-fluid">

  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Member</h3>
    </div>
    <form role="form">

        <div class="row">
          <div class="col-md-6">
            <div class="card-body">

              <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Passport Informaion</h3>
              </div>
              </div>

                <div class="form-group">
                  <label>Company</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Company Name</option>
                    <option>Microsoft</option>
                    <option>Apple</option>
                    <option>California</option>
                  </select>
                </div>

              <div class="form-group">
                <label>Passport Name</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Passport Surename</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Passport Givenname</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Group Name</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

            <div class="form-group">
              <label for="exampleInputFile">Passport Copy</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>

              </div>
            </div>



              <div class="form-group">
                <label>Passport Expire</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>


              <div class="form-group">
                <label>Passport Sub.Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

            <div class="form-group">
              <label for="exampleInputFile">Visa Copy</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>

                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                </button>
              </div>
            </div>

            <div class="form-group">
                <label>Visa Expire Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

            <div class="form-group">
                  <label>Visa Status</label>
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option selected="">Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Visa Sub.Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

            <div class="form-group">
                  <label>Medical Status</label>
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option selected="">Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Medical Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
              <label for="exampleInputFile">Levi</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
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
                  <input type="file" class="custom-file-input" id="exampleInputFile">
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
                  <input type="file" class="custom-file-input" id="exampleInputFile">
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
                <label>Birth Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Phone(MY)</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Phone(BD)</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Phone (Emergency)</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="form-group">
              <label for="exampleInputFile">Photo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>

            <div class="form-group">
                  <div class="form-group">
                      <label>Presend Address</label>
                      <textarea class="form-control" rows="3" placeholder="Enter category details"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                      <label>Permanent Address</label>
                      <textarea class="form-control" rows="3" placeholder="Enter category details"></textarea>
                  </div>
                </div>

              <div class="card card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Other Information</h3>
                  </div>
              </div>

              <label>Letter Collection<span class="requird">*</span></label>
              <div class="form-check">                
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck1">Letter Bank</label>

                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck2">Home Country</label>

                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                <label style="padding-right:30px;" class="form-check-label" for="exampleCheck3">Out Station</label>
              </div>

                <div class="form-group">
                  <label>Current Status<span class="requird">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter category name">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Document</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                    <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> 
                    </button>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                      <label>Special Note</label>
                      <textarea class="form-control" rows="3" placeholder="Enter category details"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" rows="3" placeholder="Enter category details"></textarea>
                  </div>
                </div>

                <div class="form-check">                
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label style="padding-right:30px;" class="form-check-label" for="exampleCheck1">File Close</label>
                </div>

            </div> 

          </div>


          <div class="col-md-6">
            <div class="card-body">
              
              <div class="form-group">
                  <label>Passport Status</label>
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option selected="">Pending</option>
                    <option>Expire</option>
                  </select>
              </div>

            <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">CIDB Informaion</h3>
              </div>
            </div>


              <div class="form-group">
                <label>Submission Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
            	<div class="form-group">
                <label>Delivery Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
            	</div>

              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selected Status</option>
                    <option selected="">Active</option>
                    <option>Expire</option>
                  </select>
                </div>


            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
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
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Permanent Deposit</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Refound Amount</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Refund Date</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Refund Date</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                </div>
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                </div>
              </div>

              <div class="card card card-success">
              <div class="card-header">
                <h3 class="card-title">Payment Informaion</h3>
              </div>
            </div>


              <div class="row">
                <div class="col-md-6">                  
                  <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option selected="">SOCSO</option>                    
                    <option>MEDICAL FEE</option>
                    <option>VISA FEE</option>
                     <option>LETTER</option>
                     <option>MEDICAL 2</option>
                    <option>CIDB FEE</option>
                   
                  </select>
                </div>
                </div>
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Total Amount</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label>Payable</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Installment Date</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                </div>
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label>Received Amount</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                </div>
              </div>

            </div>            
          </div>

        </div>
        <div class="card-footer" style="text-align:;">
            <button type="submit" class="btn btn-primary">Create</button>
        
            <button type="submit" class="btn btn-success">Clear</button>
        </div>
    </form>


  </div>
</div>
@endsection