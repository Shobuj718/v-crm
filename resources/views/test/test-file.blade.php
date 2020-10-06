<html lang="en">
<head>
  <title>Laravel Multiple File Upload Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
   

  <div class="container">

    <h3 class="jumbotron">Laravel Multiple File Upload</h3>
<form method="post" action="{{url('form')}}" enctype="multipart/form-data">
  {{csrf_field()}}

        <div class="input-group control-group increment" >
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>



        <div class="input-groups control-groups increments" >
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-successs" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clones hide">
          <div class="control-groups input-groups" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-controls">
            <div class="input-group-btn"> 
              <button class="btn btn-dangers" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>

        <div class="field_wrapper">
            <!-- div>
                <input type="text" name="field_name[]" value=""/>
                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
            </div> -->

              <div class="row">
                <div class="col-md-1">                  
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add new</a>
                </div>
                <div class="col-md-1">                  
                  <p>1</p>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="text" name="installment_date[]" id="installment_date[]" placeholder="asdfff" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">                  
                  <div class="form-group">
                    <input type="number" name="received_amount[]" id="received_amount[]" placeholder="asdfff dd"  class="form-control">
                  </div>
                </div>
              </div>
        </div>

        <div class="client-form-row client-form-two-col">
                                        <div class="width32 client-form-postcode">
                                                <label>Bid amount (Plus GST)</label>
                                                <div class="monney-field">
                                                    <p class="monney-field-dolla" style="border-right: none"> $ </p>
                                                    <input type="number" name="budget" id="budget" placeholder="Enter your budget">
                                                    <p class="monney-field-cents" style="border-left: none"> .00 </p>
                                                <div></div></div>
                                        </div>
                                        <div class="width32 client-form-email">
                                            <label>Our Admin Fee(15%)</label>
                                            <input type="number" name="gst2" id="gst2" step=".01" onchange="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="GST" class="valid" aria-invalid="false" readonly="=&quot;true&quot;">
                                        </div>
                                        <div class="width32 client-form-email">
                                            <label>Our Admin Fee(15%)</label>
                                            <input type="number" name="gst" id="gst" step=".01" onchange="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="GST" class="valid" aria-invalid="false" readonly="=&quot;true&quot;">
                                        </div>
                                        <div class="width32 client-form-postcode">
                                                <label>Total (you will recieve)</label>
                                                <input type="number" name="total_amt" id="total_amt" placeholder="Total Amount" readonly="=&quot;true&quot;" step=".01">
                                        </div>
                                    </div>

<form name="form1" method="post" action="" >
<table>
<tr><td>Num 1:</td><td><input type="text" name="num1" id="num1" /></td></tr>
<tr><td>Num 2:</td><td><input type="text" name="num2" id="num2" /></td></tr>
<tr><td>Sum:</td><td><input type="text" name="sum" id="sum" readonly /></td></tr>
<tr><td>Subtract:</td><td><input type="text" name="subt" id="subt" readonly /></td></tr>
</table>
</form>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>        
  </div>

<script type="text/javascript">
$(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#budget, #num2").on("keydown keyup", function() {
        sum();
    });
});

function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
      var result = parseInt(num1) + parseInt(num2);
      var result1 = parseInt(num2) - parseInt(num1);
            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
        document.getElementById('subt').value = result1;
            }
        }
</script>

<script type="text/javascript">
  $(document).ready(function(){
        $("input#budget").keydown(function(){
            var gstpercentage = 15;
            var budget = $(this).val();
            var gst = (gstpercentage / 100) * budget;
            $("input#GST").val(gst.toFixed(2));
            var totalwithgst = Number(budget) - gst;
            $("input#total_amt").val(totalwithgst.toFixed(2));
        });
        $("input#budget").keyup(function(){
            var gstpercentage = 15;
            var budget = $(this).val();
            var gst = (gstpercentage / 100) * budget;
            $("input#GST").val(gst.toFixed(2));
            var totalwithgst = Number(budget) - gst;
            $("input#total_amt").val(totalwithgst.toFixed(2));
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    /*var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>';*/ //New input field html 

    var fieldHTML = '<div class="row"><a href="javascript:void(0);" class="" title="Add field"><div class="col-md-1 remove_button">Add new</a></div><div class="col-md-1"> <p>1</p></div><div class="col-md-5"><div class="form-group"><input type="text" name="installment_date[]" id="installment_date[]" class="form-control"></div></div><div class="col-md-5"><div class="form-group"><input type="number" name="received_amount[]" id="received_amount[]" class="form-control"></div></div></div></div>';


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
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-successs").click(function(){ 
          var html = $(".clones").html();
          $(".increments").after(html);
      });

      $("body").on("click",".btn-dangers",function(){ 
          $(this).parents(".control-groups").remove();
      });


      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>


</body>
</html>