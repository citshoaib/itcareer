<?php
@session_start();
if(!$_SESSION["admin_id"]){
header('location:?page=login');
}
?> 
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
     
   <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
 

  </script>
	 
   
   
<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head"> Job Details</h3>

</div>
</div>
<div class="widget-header"> <i class="icon-list-alt"></i>

<!--<span style="float:right;margin-right:5px;margin-top:5px;"><a href="?page=formfieldshow" class="btn btn-primary">List</a></span>-->
<div class="row">
<div class="span12">
<div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form method="post" action="model/add_job_info.php" enctype ="multipart/form-data">


<input type="hidden" name="id">

<div class="row" >

<!--<label class="label col-md-4">Job Title:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="job_title" class="alphaonly form-control" required >
<label for="form_control_1">Job Title</label>

</div>
</div>
</div>

<!--</div>

</div>-->


<!--<div class="row" >

<label class="label col-md-4">Salary From:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_from" class="alphaonly form-control range_from" required >
<label for="form_control_1">Enter Min Salary</label>

</div>
</div>
</div>
<!--
</div>

</div>-->
<!--<div class="row" >

<label class="label col-md-4">Salary To:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_to" class="alphaonly form-control range_to" required >
<label for="form_control_1">Enter Max Salary</label>
</div>
</div>


</div>


</div>
<div class="row" >
<!--
<label class="label col-md-4">Job Type:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control" name="job_type">
  <option value="part_time">Part Time</option>
  <option value="full_time">Full Time</option>
  
</select>
</div>
</div>
</div>
<!--</div>-->



<!--<div class="row" >

<label class="label col-md-4">All Category:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control" name="category" >
	
  <option value="IT Department Manager">IT Department Manager</option>
  <option value="Design Jobs">Design Jobs</option>
	<option value="Automobile Jobs">Automobile Jobs</option>
	<option value="Mechanical Engineering Jobs">Mechanical Engineering Jobs</option>
	
  
</select>
</div>
</div>
</div>
<!--</div>


<div class="row" >
<label class="label col-md-4">Eligibility:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div >
<select name="eligibility[]" class="form-control"  multiple id="dbType">
<?php
$Eligibility_query = mysql_query("SELECT * FROM eligibility") or die(mysql_error());
while($fetch=mysql_fetch_array($Eligibility_query)){

?>

<option  value="<?php echo $fetch['title']; ?>"><?php echo $fetch['title']; ?></option>
<?php

}

?>
	
	

  <option  value="Other"  >Other</option>
  </select>
</div>
</div>
</div>
<div class="col-md-12 unit">	
<div class="input smt_ch" id="otherType" style="display:none;">
<div class="form-group form-md-line-input form-md-floating-label has-success">

<input type="text" name="specify"  class="form-control"/>
<label for="form_control_1">Specify Eligibility</label>
</div>
</div>
</div>

</div>
<!--
<div class="row smt_ch" id="otherType" style="display:none;">
<label class="label col-md-4">Specify:</label>-->

<!--</div>-->



<div class="row" >
<!--<label class="label col-md-4">Country:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div >
<select class="form-control change" name="country">
  <option value="">Select Country</option>
<? $country=mysql_query("SELECT country_code,country_name FROM `country_master`");
while($country_name=mysql_fetch_array($country)){
		
					
					?>
		<option  value="<?php echo $country_name['country_code'];?>"><?php echo $country_name['country_name'];?></option>				
				<?
				
}
?>
	

  </select>
</div>
</div>
</div>
<!--</div>


</div>

-->



<!--<div class="row" >

<label class="label col-md-4">State / Province:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div >
<select  id="state_id" name="state" onchange="AjaxShipping(this.value);" class="form-control" style="width:100%; height:40px;"  >
<option value="">Please Select State</option>

</select>
</div>
</div>
</div>
<!--</div>-->


<!--<div class="row" >

<label class="label col-md-4">City:</label>-->
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

<!--<label class="label col-md-4">Zip Code:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="zip_code"  class="form-control" required >
<label for="form_control_1">Zip Code</label>

</div>
</div>
</div>
<!--
</div>-->







<!--<div class="row" >

<label class="label col-md-4">Opening Date:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="date" name="opening_date" id="datepicker" class="alphaonly form-control" required >
<label for="form_control_1">Opening Date</label>

</div>
</div>
</div>
<!--
</div>





<div class="row" >

<label class="label col-md-4">Closing Date:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="date" name="closing_date" id="datepicker1" class="alphaonly form-control" required >
<label for="form_control_1">Closing Date</label>

</div>
</div>
</div>
</div>
<div class="row" >

<!--<label class="label col-md-4">Company Name:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="company_name"  class="form-control" required >
<label for="form_control_1">Company Name</label>

</div>
</div>
</div>
<!--</div>-->

<!--<div class="row" >

<label class="label col-md-4">Company url:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="url" name="company_url"  class="form-control" required >
<label for="form_control_1">Company Url</label>

</div>
</div>
</div>
<!--</div>


<div class="row" >
<label class="label col-md-4">Image:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="file" name="image" >


</div>
</div>
</div>
</div>

<div class="row" >

<!--<label class="label col-md-4">Description:</label>-->
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

</table>

</form>

</div>

</div>
</div>
</div>

</div>
</div>
<span id="addjob_form"></span>
<!--<div class="row ">
<div class="col-lg-12">
<span style="float:right;margin-right:5px;margin-top:5px;"><a href="?page=manage_job_info" class="btn btn-primary">Manage Job</a></span>

</div>

</div>-->
</div>
</div>
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
	
		//function AjaxShipping(val){
		//	
		//	alert(val);
		//	
		//		$.ajax({
		//url:"view/ajax/select_country.php",
		//type:"POST",
		//data:{city:val},
		//success: function(html){
		//	
		//$("#city_id").html(html);
		//}
		//
		//});
		//}
		
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
			  $(".smt_ch").show();
        }else{
		  
		  $(".smt_ch").hide();
		}
		
		});

});
  </script>

