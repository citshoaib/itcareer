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
    <style>
	.pt_45{
	  padding-top: 43px;
	}
	
	
   </style>
  
  <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
header('location:?page=login');
}
?>   
     
<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Edit Job Details</h3>
</div></div>

<div class="widget-header"> <i class="icon-list-alt"></i>

<!--<span style="float:right;margin-right:5px;margin-top:5px;"><a href="?page=formfieldshow" class="btn btn-primary">List</a></span>-->
<?php


 $sedna_id=$_REQUEST['id'];

//$sedna_id=$row_1['id'];
$select_1=$conn->query("select * from sedna_job_form where id='$sedna_id' order by id");

$row_1=$select_1->fetch_array();



$job_title = $row_1['job_title'];  
$description= $row_1['description'];
$salary_from=$row_1['salary_from'];
$salary_to = $row_1['salary_to'];
$job_type=$row_1["job_type"];
$eligibility=explode(",",$row_1['eligibility']);
$location=explode(",",$row_1['location']);

$country_name_value=$location[3];
$flag=$location[2];
$city=$location[1];
$zip=$location[0];
$opening_date=date("d-m-Y",$row_1['opening_date']);
$closing_date=date("d-m-Y",$row_1['closing_date']);
$category=$row_1['category'];
 $image=$row_1['image'];
 $short_description = $row_1['short_description'];
 $experience_level=$row_1['experience_level'];

?>


<div class="row">
<div class="span12">
<div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form method="post" action="model/edit_addjob_info.php" enctype ="multipart/form-data">

<input type="hidden" name="uid" id="id" value="<?php echo $sedna_id;?>">


<div class="row" >
<!--
<label class="label col-md-4">Job Title:</label>
-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="job_title" value="<?php echo $job_title;?>"  class="alphaonly form-control edited" required >

<label for="form_control_1">Job Title</label>

</div>
</div>
</div>

<!--</div>


<div class="row" >

<label class="label col-md-4">Salary From:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_from" value="<?php echo $salary_from;?>"  class="alphaonly form-control edited range_from" required >
<input type="hidden" name="city_ajax" id="city_ajax" value="<?php echo $flag;?>" >
<label for="form_control_1">Enter Min Salary</label>

</div>
</div>
</div>

<!--</div>
<div class="row" >

<label class="label col-md-4">Salary To:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="number" name="salary_to" value="<?php echo $salary_to;?>"  class="alphaonly form-control edited range_to" required >
<label for="form_control_1">Enter Max Salary</label>

</div>
</div>
</div>

</div>
<div class="width">
<div class="row" >

<!--label class="label col-md-4">Job Type::</label-->
<div class="col-md-4 unit">	
<div class="input">
<div class="width" >
<select class="form-control" name="job_type">
  	<option value="0">Select Job Type</option>
  <option <? if($job_type=="part_time"){?>selected<?}?> value="part_time">Part Time</option>
  <option <? if($job_type=="full_time"){?>selected<?}?> value="full_time">Full Time</option>
  
</select>


</div>
</div>
</div>

<!--</div>

<div class="row" >

<label class="label col-md-4">All Category:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="width" >
<select class="form-control" name="category">
  <?php $selected_cat_ids=$category; ?>
	<option value="0">Select Category</option>
	<?php $cat->cat_list($p_cid=0,$space='',$selected_cat_ids); ?>
  <!--<option <? if($category=="IT Department Manager"){?>selected<?}?> value="IT Department Manager">IT Department Manager</option>
  <option <? if($category=="Design Jobs"){?>selected<?}?> value="Design Jobs">Design Jobs</option>
	<option <? if($category=="Automobile Jobs"){?>selected<?}?> value="Automobile Jobs">Automobile Jobs</option>
	<option <? if($category=="Mechanical Engineering Jobs"){?>selected<?}?> value="Mechanical Engineering Jobs">Mechanical Engineering Jobs</option>
	-->
  
</select>


</div>
</div>
</div>
<!--
</div>


<div class="row" >
<label class="label col-md-4">Eligibility:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div >
<select name="eligibility[]" class="form-control" multiple id="dbType">
<?php
$Eligibility_query = $conn->query("SELECT * FROM eligibility");
while($fetch=$Eligibility_query->fetch_array()){

?>

<option <? foreach ($eligibility as $key => $val) if($val==$fetch['title']){?>selected<?} ?> value="<?php echo $fetch['title']; ?>"><?php echo $fetch['title']; ?></option>
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

</div>


<div class="row" >
<!--<label class="label col-md-4">Country</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div >
<select class="form-control change" name="country">
  <option value="">Select Country</option>
<? $country=$conn->query("SELECT country_code,country_name FROM `country_master`");
while($country_name=$country->fetch_array()){
		
					
					?>
		<option <?php if($country_name_value==$country_name['country_name']) {?>selected<?} ?> value="<?php echo $country_name['country_code'];?>"><?php echo $country_name['country_name'];?></option>				
				<?
				
}
?>
	

  </select>
</div>
</div>
</div>
<!--</div>



<div class="row" >

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
<!--</div>



<div class="row" >

<label class="label col-md-4">City:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="city" value="<? echo $city;?>" class="form-control edited" required >
<label for="form_control_1">City</label>

</div>
</div>
</div>

</div>

<div class="row" >
<!--
<label class="label col-md-4">Zip Code:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="zip_code" value="<? echo $zip;?>" class="form-control edited" required >
<label for="form_control_1">Zip Code</label>

</div>
</div>
</div>
<!--
</div>



<div class="row" >

<label class="label col-md-4">Opening Date:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="date" name="opening_date" id="datepicker" value="<?php echo $opening_date?>"  class="alphaonly form-control edited" required >
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
<input type="date" name="closing_date" id="datepicker1" value="<?php echo $closing_date?>"  class="alphaonly form-control edited" required >
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
<input type="text" name="company_name" value="<?php echo $row_1["company_name"]; ?>"  class="alphaonly form-control edited" required >
<label for="form_control_1">Company Name</label>

</div>
</div>
</div>
<!--
</div>



<div class="row" >

<label class="label col-md-4">Company url:</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="company_url"value="<?php echo $row_1["company_url"]; ?>"  class="alphaonly form-control edited" required >
<label for="form_control_1">Company Url</label>

</div>
</div>
</div>

<!--</div>


<div class="row" >

<label class="label col-md-4">Image</label>-->
<div class="col-md-4 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="file" name="image" >
 <span style="color: red;">(Only .jgp . png . jpeg)</span>
 <input type="hidden" value="<?php echo $image;?>" name="recent_image">
  

</div>
</div>
 <?php
 
if($image!=''){
?>
	 <div>
		<img id='logo' src="upload_doc/image/<?php echo $image;?>" height='99' width='99' alt=""/>
		<a href="#" onclick="delet_image('<?php echo $sedna_id;?>','<?php echo $image;?>')"><img class="images" src="../admin/template/images/supprimer.png" height="25" width="25"></a>
	 </div>
<?php
}else{
?>
<div >
  <img  src="../admin/template/images/User_ring.png" id="tid" height="100" width="100"> 
</div>
<?php } ?>
	</div>
</div>




<div class="row" >

<!--<label class="label col-md-4">Description:</label>-->
<div class="col-md-6 unit">
  <label class=" col-md-6">Short Description:</label>
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<textarea name="short_description" class="form-control" id=""><? echo $short_description; ?></textarea>
</div>
</div>
</div>


<div class="col-md-6 unit pt_45">
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">

<select name="experinece_level" class="form-control" >
  <option value="">Select Experience Level</option>
  <? $level_result=$conn->query("SELECT * FROM `experience_level_master`");
	while($row_level=$level_result->fetch_array()){
?>
  <option <? if($experience_level==$row_level['id']){ ?>selected<?}?> value="<? echo $row_level['id'];?>"><? echo $row_level['experience_level'];?></option><?}?></select>
</div>
</div>
</div>

</div>

<div class="row">
  <label class="col-md-12">Description:</label>
</div>

<div class="row" >
<!--
<label class="label col-md-4">Description:</label>-->
<div class="col-md-12 unit">	
<div class="input">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<textarea name="description" class="form-control" id="text"><? echo $description;?></textarea>
<script>
 CKEDITOR.replace( 'text' );
</script>
<br>
<div class="row"> 
	<div class="col-md-2 unit">
	 
	  
	  <input type="submit" name="update" class="btn btn-primary btn-lg"  value="Update Detail's" data-automation-id="sign-in-button" >
   
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
</div>

<!--<div class="row ">
<div class="col-lg-12">
<span style="float:right;margin-right:5px;margin-top:5px;"><a href="?page=manage_job_info" class="btn btn-primary">Manage Job</a></span>

</div>

</div>-->
</div>
</div>

<script>
	
	
	
	 function delet_image(id,image){
	
			if (confirm("Are you sure?")) {
        // your deletion code
    
			data = 'id='+id+'&image='+image;
			//alert(data);
					$.ajax({
		url:"view/ajax/delete_image_emp.php",
		type:"POST",
		data:data,
		success: function(html){
			
		//$("#city_id").html(html);
	//	alert(html);
		 location.reload();
		}
		
		});
			}
		}
	
	
	$(window).load(function() {
     country=$(".change").val();
		 city_ajax = $("#city_ajax").val();
			$.ajax({
		url:"view/ajax/select_country.php",
		type:"POST",
		data:{edit_country_code:country,city_ajax:city_ajax},
		success: function(html){
		//alert(html);
		$("#state_id").html(html);
		}
		
		});
});
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