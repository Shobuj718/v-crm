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