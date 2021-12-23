<?php
@session_start();
if(!$_SESSION["employer_email"]){
header('location:?page=login');
}
?> 
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>
     
   <script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
 

  </script>
  
  
	 
   <style>
	.pt_45{
	  padding-top: 43px;
	}
	
	
   </style>
   


<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head"> Job Details</h3>

</div>
</div>

<div class="widget-header"> <i class="icon-list-alt"></i>

<div class="row">
<div class="span12">
<div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form method="post" action="model/add_job_info.php" enctype ="multipart/form-data">
<input type="hidden" name="id">

<div class="row" >


<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="job_title" class="alphaonly form-control" required >
<label for="form_control_1">Job Title</label>

</div>
</div>
</div>


<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_from" class="alphaonly form-control range_from" required >
<label for="form_control_1">Enter Min Salary</label>

</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_to" class="alphaonly form-control range_to" required >
<label for="form_control_1">Enter Max Salary</label>
</div>
</div></div>
</div>

<div class="row" >

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control" name="job_type">
  <option value="0">Work Type</option>
  <option value="part_time">Part Time</option>
  <option value="full_time">Full Time</option>
  
</select>
</div>
</div>
</div>

<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control" name="employment_type">
  <option value="0">Employment Type</option>
  <option value="part_time">Part Time</option>
  <option value="full_time">Full Time</option>
  
</select>
</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="file" name="image" >


</div>
</div>
</div>


</div>

<div class="row" >

<div class="col-md-4 unit"> 
<div class="input">
<div >
<select class="form-control change" name="country">
  <option value="">Select Country</option>
<? $country=$conn->query("SELECT country_code,country_name FROM `country_master`");
while($country_name=$country->fetch_array()){
    
          
          ?>
    <option  value="<?php echo $country_name['country_code'];?>"><?php echo $country_name['country_name'];?></option>       
        <?
        
}
?>
  

  </select>
</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div >
<select  id="state_id" name="state" onchange="AjaxShipping(this.value);" class="form-control" style="width:100%; height:40px;"  >
<option value="">Please Select State</option>

</select>
</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="city"  class="form-control" required >
<label for="form_control_1">City</label>

</div>
</div>
</div>

</div>


<div class="row" >


<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="zip_code"  class="form-control" required >
<label for="form_control_1">Zip Code</label>

</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="opening_date" id="datepicker" class="alphaonly form-control" required >
<label for="form_control_1">Opening Date</label>

</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="closing_date" id="datepicker1" class="alphaonly form-control" required >
<label for="form_control_1">Closing Date</label>

</div>
</div>
</div>
</div>

<div class="row" >


<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="company_name"  class="form-control" required >
<label for="form_control_1">Company Name</label>

</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="url" name="company_url"  class="form-control" required >
<label for="form_control_1">Company Url</label>

</div>
</div>
</div>

<div class="col-md-4 unit"> 
<div class="input">

</div>
</div>
</div>

<div class="row" >
<div class="col-md-6 unit">
  <label class=" col-md-6" style="margin-left: -14px;"></label>
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<textarea name="address" placeholder="Location" class="form-control" id=""></textarea>
</div>
</div>
</div>


<div class="col-md-6 unit pt_45">
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">

<!--<select name="experinece_level" class="form-control" >
  <option value="">Select Experience Level</option>
  <? $level_result=$conn->query("SELECT * FROM `experience_level_master`");
  while($row_level=$level_result->fetch_array()){
?>
  <option value="<? echo $row_level['id'];?>"><? echo $row_level['experience_level'];?></option><?}?></select>-->
</div>
</div>
</div>

</div>
<div class="row">
  <label class=" col-md-12">Description:</label>
</div>

<div class="row" >


<div class="col-md-12 unit">  
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<textarea name="description" class="form-control" id="text"></textarea>
<script>
 CKEDITOR.replace( 'text' );
</script>



</div>
</div>
</div>

</div>

<div class="row"> 
  <div class="col-md-2 unit">
   
    
    <input type="submit" name="submit" class="btn btn-primary btn-lg"  value="Submit" data-automation-id="sign-in-button" >
   
  </div>

  </div>

</form></div>

</div>
</div>

<span id="addjob_form"></span>

</div></div>


<script>
		$('.change').on('change', function() {
  country=this.value;
	
	
	$.ajax({
		url:"view/ajax/select_country.php",
		type:"POST",
		data:{country_code:country},
		success: function(html){
		
		$("#state_id").html(html);
		}
		
		});
});
		
		
		
		
		$("#datepicker").blur(function (){
			
			
						$("#datepicker").addClass("edited");
		
			});
		$("#datepicker1").blur(function (){
			
			
						$("#datepicker1").addClass("edited");
		
			});
	
		function AjaxShipping(val){
			
			alert(val);
			
				$.ajax({
		url:"view/ajax/select_country.php",
		type:"POST",
		data:{city:val},
		success: function(html){
			
		$("#city_id").html(html);
		}
		
		});
		}
		
		 $(".range_to").blur(function(){
	
	range_to=parseInt($(this).val());
	range_from=parseInt($(".range_from").val());
	//alert(range_from);
	
	if(range_from>range_to){
	  alert("Salary From value can't be greater then Salary To !!");
	  $(".range_from").val("");
      
    }
	
	});
  
		
	
	$('#dbType').on('change',function(){
    
	 var selection = $(this).val().join();
	 //alert(selection);
	  var arr = selection.split(',');
	  $(arr).each(function(index){
		
		if (arr[index]=="Other") {
           // alert(arr[index]);
Success!
			  $(".smt_ch").show();
        }else{
		  
		  $(".smt_ch").hide();
		}
		
		});

});
  </script>

