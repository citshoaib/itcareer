    
 <?php
 if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
 ?>
<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Edit Profile</h3>
</div>
<!--<div class="row">
<div class="span12">


<div class="widget widget-nopad">

<div class="widget-header"> <i class="icon-list-alt"></i>

<span style="float:right;margin-right:5px;margin-top:5px;"><a href="" class="btn btn-primary">Form Field</a></span>

</div>

</div>
</div>
</div>-->


<!--<div class="row">
<div class="span12">-->
<?php
$id = $_REQUEST['id'];
$select_1=$conn->query("select * from sedna_form where id='$id'");

$row_1=$select_1->fetch_array();
//echo "<pre>";
//print_r($row_1);

 $id = $row_1['id'];
 $emp = $row_1['emp_name'];
 $email = $row_1['email'];
 $company_name = $row_1['emp_company'];
 $contact = $row_1['contact'];
 $ind=$row_1['industry']; 
 $web= $row_1['web'];
 $who= $row_1['who_we'];
 $loc= $row_1['location'];
 $ats=$row_1['ATs'];
 $logo = $row_1['logo'];
 $password=$row_1['password'];
 $cpassword=$row_1['cpassword'];
 
 $country_val = $row_1['country'];
 $flag=$row_1['state'];
 
 ?>
 
<div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form method="post" id="checkpass" action="model/formFieldEdit.php" method="post" enctype="multipart/form-data">
	
<div class="row" >
	<div align="center">
	<?php if($ats!=''){?>
	<input type="hidden" name="ATS_select" value="<?php echo $ats; ?>">
	<?php } ?>
	<input type="hidden" name="hiddenImage" value="<?php echo $logo; ?>">
	<input type="hidden" name="hiddenId" value="<?php echo $id; ?>">
	
	</div>
</div>
	<div class="row" >
	    
	    <div class="col-md-4 unit">	
	    <?php
	 
if($logo!=''){
?>
<center>
		<img id='logo' src='../upload_img/<?php echo $logo; ?>' height='auto' width='200' alt=""/>
		<a href="javascript:void(0)" onclick="delet_image('<?php echo $id;?>')"><img class="images" src="template/images/supprimer.png" height="25" width="25"></a>
	</center>
<?php
}else{
?>
<div >
    <center>
<img  src="template/images/User_ring.png" id="tid" height="auto" width="200"></center>
</div>
<?php } ?>
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="file" name="logo"  >
		
		 
		 
	  <span style="color: red;">(Only .jgp . png . jpeg)</span></div>
	 </div>
	 
	</div>
	 <div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="company_name"  class="alphaonly form-control <?php if($company_name!=''){echo 'edited'; } ?>" placeholder="Company Name" value="<?php echo $company_name; ?>" required >
		
		 </div>
	 </div>
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="email" name="email"  class="alphaonly form-control <?php if($email!=''){echo 'edited'; } ?>" placeholder="Employer Email" value="<?php echo $email; ?>" readonly >
		
		 </div>
	 </div>
	  <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="url" name="web" value="<?php echo $web; ?>" class="alphaonly form-control <?php if($web!=''){echo 'edited'; } ?>" placeholder="Website" required >
		
		 </div>
	 </div>
	 <div class="input">
<div style="margin-right: 12px;margin-left: -15px;">
<select  id="state_id" name="state"  class="form-control" style="width:100%; height:40px;"  >


</select>
</div>
</div>
	 
	</div>
	<!--<label class="label col-md-5">Employer Name:</label>-->
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="emp" value="<?php echo $emp; ?>" class="form-control alphaonly form-control <?php if($emp!=''){echo 'edited'; } ?>"  placeholder="Contact Person Name" required >
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="city_ajax" id="city_ajax" value="<?php echo $flag;?>" >
		 
		 </div>
	 </div>
	 	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="phone"  class="alphaonly form-control <?php if($contact!=''){echo 'edited'; } ?>" placeholder="Contact Number" value="<?php echo $contact; ?>" required >
		
		 </div>
	 </div>
	 <div class="input">
<div style="margin-left: -15px;margin-right: 14px;">
<select class="form-control change" name="country">
  <option value="">Select Country</option>
<?php
$country=$conn->query("SELECT * FROM `country_master`");
while($country_name=$country->fetch_array()){
		//print_r($country_name);
					
					?>
					

		<option <?php if($country_val == $country_name['country_code']){ ?> selected <?php } ?> value="<?php echo $country_name['country_code'];?>"><?php echo $country_name['country_name'];?></option>				
				<?
				
}
?>
	

  </select>
</div>
</div>
 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="Industry" value="<?php echo $ind; ?>" placeholder="Industry" class="form-control alphaonly form-control <?php if($ind!=''){echo 'edited'; } ?>" required >
		
		 </div>
	 </div>
	</div>
	
<!--</div>-->


<!--<div class="row" >-->
	
	<!--<label class="label col-md-5">Employer Email:</label>-->


<!--</div>

<div class="row" >
	
	<label class="label col-md-5">Contact Number:</label>-->


	</div>



<div class="row" >
	
	<!--<label class="label col-md-5">Password:</label>-->
	<!--<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="password" name="password" value="<?php echo $password; ?>" id="password" class="alphaonly form-control edited required" required >
		
		 <label for="form_control_1">Password</label>
		 </div>
	 </div>
	</div>-->

<!--</div>-->

<!--<div class="row" >
	
	<label class="label col-md-5">Confirm Password:</label>-->
	<!--<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="password" name="cpassword" value="<?php echo $cpassword; ?>" id="confirm_pass" class="alphaonly form-control edited required">
		
		 <label for="form_control_1">Confirm Password</label>
		 </div>
	 </div>
	</div>-->

<!--</div>-->


<!--<div class="row" >-->
<!--	-->
<!--	<label class="label col-md-5">Location:</label>-->
<!--	<div class="col-md-4 unit">	-->
<!--	 <div class="input">-->
<!--	 <div class="form-group form-md-line-input form-md-floating-label has-success">-->
<!--		 <input type="text" name="location"  class="alphaonly form-control <?php if($loc!=''){echo 'edited'; } ?>" value="<?php echo $loc; ?>" required >-->
<!--		-->
<!--		 <label for="form_control_1">Location</label>-->
<!--		 </div>-->
<!--	 </div>-->
<!--	</div>-->
<!---->
<!--</div>-->



<!--<div class="row" >
	
	<label class="label col-md-5">Location:</label>-->
	<div class="col-md-12 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		
		<textarea name="location" id="location"  value="" placeholder="Address" required class="required form-control"><?php echo $loc; ?></textarea>
		
	 </div>
	 </div>
	</div>

</div>

<div class="row">
	
	<div class="col-md-12 unit">
    <label class="label ">Who We Are:</label>
    </div>
	
</div>
<div class="row" >	
	
	<div class="col-md-12 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		
		<textarea name="who" id="who" value="" placeholder="Who We Are" required class="required form-control"><?php echo $who; ?></textarea>
		
	 </div>
	 </div>
	</div>

</div>

<div class="row">
	<div class="col-md-12 unit">
	<label class="label ">Social Media Details:</label>
	</div>
</div>


	<?php
	$mor_media_info = $conn->query("SELECT * FROM employer_more_social_nedia_info where employer_id='".$id."' ");
	 $countrow_media=$mor_media_info->num_rows;
	 $kk=0;
	 if($countrow_media>0){
		while($media_row=$mor_media_info->fetch_array()){
	 ?>
	 <div class="row" id="media_<?php echo $kk;?>">
	<div class="input col-md-6">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
		<select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_<?php echo $kk;?>">
		<option value="">--Select Social Media Type--</option>
		<option <?php if($media_row['social_media_department'] == 'facebook'){ ?> selected <?php } ?> value="facebook">Facebook</option>
		<option <?php if($media_row['social_media_department'] == 'instagram'){ ?> selected <?php } ?> value="instagram">Instagram</option>
		<option <?php if($media_row['social_media_department'] == 'twitter'){ ?> selected <?php } ?> value="twitter">Twitter</option>
		<option <?php if($media_row['social_media_department'] == 'google+'){ ?> selected <?php } ?> value="google+">Google+</option>
		<option <?php if($media_row['social_media_department'] == 'linked_in'){ ?> selected <?php } ?> value="linked_in">LinkedIn</option>
		<option <?php if($media_row['social_media_department'] == 'you_tube'){ ?> selected <?php } ?> value="you_tube">YouTube</option>
		</select>
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
		<input type="url" name="social_media_url[]" id="social_media_url_<?php echo $kk;?>" class="form-control <?php if($media_row["media_url"]!=''){echo 'edited'; } ?>" placeholder="URL" value="<?php echo $media_row['media_url'];?>" >
	</div>
	<img class="pt_10 " style="position: absolute; right: 0px; top: 6px; width: 18px; height: 27px;" align="middle" src="template/images/supprimer.png" width="20" height="20"  <?php if($kk<=0){?> style="visibility:hidden " <?php }?>  border="0" onclick="return removeeee_media(this.id);" id="<?php echo $kk;?>"  value="Remove"/>
	</div>
	<div class="cl"></div>
	</div>
	<?php
	$kk++;
	}
	}else{
	?>
	
	<div class="row">
	<div class="input col-md-6">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
		<select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_<?php echo $kk;?>">
		<option value="">--Select Social Media Type--</option>
		<option value="facebook">Facebook</option>
		<option value="instagram">Instagram</option>
		<option value="twitter">Twitter</option>
		<option value="google+">Google+</option>
		<option value="linked_in">LinkedIn</option>
		<option value="you_tube">YouTube</option>
		</select>
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
		<input type="url" name="social_media_url[]" id="social_media_url_<?php echo $kk;?>" class="form-control <?php if($media_row["media_url"]!=''){echo 'edited'; } ?>"  placeholder="URL" value="<?php echo $media_row['media_url'];?>" >
	</div>
	
	</div>
	<div class="cl"></div>
	</div>
	
	<?php } ?>


<div id="append_media"></div>

<div class="row" >
	<div class="col-md-12 unit">
	<input name="addnew" id="addnew" class="btn" style="padding: 6px 12px;" value="Add New" onclick="return append_media();" type="button">
	</div>
</div>



<div class="row" >
	
	<div class="col-md-12 unit">
    <label class="label ">More Contact Details:</label>
    </div>
    </div>





	<?php
	$mor_info = $conn->query("SELECT * FROM employer_more_contact_info where employer_id='$id' ");
	 $countrow=$mor_info->num_rows;
	 $i=0;                        
if($countrow>0)
{
while($contact_row=$mor_info->fetch_array())
{
	?>
	<div class="row" id="newtr_<?php echo $i;?>">
<div class="input col-md-2">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
<!-- <img align="middle" src="templates/images/cancel.png"  <?php if($i<=0){?> style="visibility:hidden" <?php }?>  border="0" onclick="return removeeee(this.id);" id="<?php echo $i;?>"  value="Remove"/>-->

<select class="form-control select2me select2-hidden-accessible"   name="contact_department[]" id="contact_department_<?php echo $i;?>">
<option>--Select Deparnment--</option>
<option <?php if($contact_row['contact_department']=='Director'){?> selected="selected"<?php }?> value="Director">Director</option>

<option <?php if($contact_row['contact_department']=='Accounts'){?> selected="selected"<?php }?> value="Accounts">Accounts </option>

<option <?php if($contact_row['contact_department']=='Air_Imports'){?> selected="selected"<?php }?> value="Air_Imports">Air Imports</option>

<option <?php if($contact_row['contact_department']=='Air_Exports'){?> selected="selected"<?php }?> value="Air_Exports">Air Exports</option>

<option <?php if($contact_row['contact_department']=='Ocean_Imports'){?> selected="selected"<?php }?> value="Ocean_Imports">Ocean Imports</option> 

<option <?php if($contact_row['contact_department']=='Quotations'){?> selected="selected"<?php }?> value="Quotations">Quotations</option>

<option <?php if($contact_row['contact_department']=='Ocean_Exports'){?> selected="selected"<?php }?> value="Ocean_Exports">Ocean Exports</option>

<option <?php if($contact_row['contact_department']=='Sales_Manager'){?> selected="selected"<?php }?> value="Sales_Manager">Sales Manager</option>

</select>
  </div>
 </div>
      


 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" style="" name="contact_name[]" placeholder="Name" id="contact_name_<?php echo $i;?>" class="form-control  required <?php if($contact_row["contact_name"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_name"]?>"/>
     
     </div>
     </div>
     </div>


 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" style="" name="contact_phone[]" placeholder="Person Contact No" id="contact_phone_<?php echo $i;?>" class="form-control number-only required <?php if($contact_row["contact_phone"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_phone"]?>"/>

     </div>
     </div>
     </div>

 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="email" style="" placeholder="Email" name="contact_email[]" id="contact_email_<?php echo $i;?>" class="required form-control <?php if($contact_row["contact_email"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_email"]?>"/>
     
     </div>
     </div>
     </div>
	
	<div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" placeholder="Designation" name="contact_designation[]" style="" id="contact_designation_<?php echo $i;?>" class="form-control  <?php if($contact_row["contact_designation"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_designation"]?>"/>

     </div>
     </div>
     </div>
	
	<div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
    <input type="text" placeholder="SkypeId" class="form-control <?php if($contact_row["contact_skype"]!=''){echo 'edited'; } ?>" name="contact_skype[]"  id="contact_skype_<?php $i;?>" style="" value="<?php echo $contact_row["contact_skype"];?>"/>

     </div>
	 <img class="pt_10 " style="position: absolute; right: 0px; top: 6px; width: 18px; height: 27px;" align="middle" src="template/images/supprimer.png" width="20" height="20"  <?php if($i<=0){?> style="visibility:hidden " <?php }?>  border="0" onclick="return removeeee(this.id);" id="<?php echo $i;?>"  value="Remove"/>
	
     </div>
     </div>
	<div class="cl"></div>
	

<!--<input type="text" style="width:184px" name="contact_name[]" id="contact_name_<?php echo $i;?>" class="form-control  required" value="<?php echo $contact_row["contact_name"]?>"/>
-->
<!--
<td width="10%">
<input type="text" style="width:135px" name="contact_phone[]" id="contact_phone_<?php echo $i;?>" class="form-control number-only required" value="<?php echo $contact_row["contact_phone"]?>"/></td><td width="20%">
<input type="email" style="width:180px" name="contact_email[]" id="contact_email_<?php echo $i;?>" class="required form-control" value="<?php echo $contact_row["contact_email"]?>"/></td><td width="25%">
<input type="text" name="contact_designation[]" style="width:171px" id="contact_designation_<?php echo $i;?>" class="form-control required" value="<?php echo $contact_row["contact_designation"]?>"/>
</td>

<td  width="10%">
<input type="text" class="form-control" name="contact_skype[]"  id="contact_skype_<?php $i;?>" style="width:171px" value="<?php echo $contact_row["contact_skype"]?>"/>
</td>-->


</div>
	
	<?php
$i++;	
}
}else{
?>

	<div class="row">
<div class="input col-md-2">
	<div class="form-group form-md-line-input form-md-floating-label has-success">
<!-- <img align="middle" src="templates/images/cancel.png"  <?php if($i<=0){?> style="visibility:hidden" <?php }?>  border="0" onclick="return removeeee(this.id);" id="<?php echo $i;?>"  value="Remove"/>-->

<select class="form-control select2me select2-hidden-accessible"   name="contact_department[]" id="contact_department_<?php echo $i;?>">
<option>--Select Deparnment--</option>
<option <?php if($contact_row['contact_department']=='Director'){?> selected="selected"<?php }?> value="Director">Director</option>

<option <?php if($contact_row['contact_department']=='Accounts'){?> selected="selected"<?php }?> value="Accounts">Accounts </option>

<option <?php if($contact_row['contact_department']=='Air_Imports'){?> selected="selected"<?php }?> value="Air_Imports">Air Imports</option>

<option <?php if($contact_row['contact_department']=='Air_Exports'){?> selected="selected"<?php }?> value="Air_Exports">Air Exports</option>

<option <?php if($contact_row['contact_department']=='Ocean_Imports'){?> selected="selected"<?php }?> value="Ocean_Imports">Ocean Imports</option> 

<option <?php if($contact_row['contact_department']=='Quotations'){?> selected="selected"<?php }?> value="Quotations">Quotations</option>

<option <?php if($contact_row['contact_department']=='Ocean_Exports'){?> selected="selected"<?php }?> value="Ocean_Exports">Ocean Exports</option>

<option <?php if($contact_row['contact_department']=='Sales_Manager'){?> selected="selected"<?php }?> value="Sales_Manager">Sales Manager</option>

</select>
  </div>
 </div>
      


 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" style="" name="contact_name[]" placeholder="Name" id="contact_name_<?php echo $i;?>" class="form-control  required <?php if($contact_row["contact_name"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_name"]?>"/>
     
     </div>
     </div>
     </div>


 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" style="" name="contact_phone[]" placeholder="Person Contact No" id="contact_phone_<?php echo $i;?>" class="form-control number-only required <?php if($contact_row["contact_phone"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_phone"]?>"/>

     </div>
     </div>
     </div>

 <div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="email" style="" name="contact_email[]" placeholder="Email"  id="contact_email_<?php echo $i;?>" class="required form-control <?php if($contact_row["contact_email"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_email"]?>"/>
     
     </div>
     </div>
     </div>
	
	<div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
     <input type="text" name="contact_designation[]" style="" placeholder="Designation"  id="contact_designation_<?php echo $i;?>" class="form-control  <?php if($contact_row["contact_designation"]!=''){echo 'edited'; } ?>" value="<?php echo $contact_row["contact_designation"]?>"/>

     </div>
     </div>
     </div>
	
	<div class="col-md-2 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
    <input type="text" class="form-control <?php if($contact_row["contact_skype"]!=''){echo 'edited'; } ?>" placeholder="SkypeID" name="contact_skype[]"  id="contact_skype_<?php $i;?>" style="" value="<?php echo $contact_row["contact_skype"];?>"/>

     </div>
	 <img class="pt_10 " style="position: absolute; right: 0px; top: 6px; width: 18px; height: 27px;" align="middle" src="template/images/supprimer.png" width="20" height="20"  <?php if($i<=0){?> style="visibility:hidden " <?php }?>  border="0" onclick="return removeeee(this.id);" id="<?php echo $i;?>"  value="Remove"/>
	
     </div>
     </div>
	<div class="cl"></div>
	
	
<?php } ?>

<div id="append"></div>
<div class="row"><div class="col-md-12 unit">
<input name="addnew" id="addnew" class="btn" style="padding: 6px 12px;" value="Add New" onclick="return append();" type="button">
</div></div>
	
	 <br>
  <div class="row"> 
	<div class="col-md-2 unit">
	 
	  
	  <input type="submit" name="update" class="btn btn-primary btn-lg"  value="Update" data-automation-id="sign-in-button" >
   
  </div>

  </div>

</form>
 </div>
 
<!--video start-->
<link rel="stylesheet" href="https://www.webrtc-experiment.com/style.css">
    <style>
      
       video {
            max-width: 20%;
            vertical-align: top;
        }
        
        .recordrtc button {
            font-size: inherit;
        }

        .recordrtc button, .recordrtc select {
            vertical-align: middle;
            line-height: 1;
            padding: 2px 5px;
            height: auto;
            font-size: inherit;
            margin: 0;
        }

        .recordrtc, .recordrtc .header {
            display: block;
            text-align: center;
            padding-top: 0;
        }

        .recordrtc video {
            width: 70%;
        }

        .recordrtc option[disabled] {
            display: none;
        }
        .experiment{
            border:solid 0px #000;
        }
    </style>
    <script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
    <script src="https://www.webrtc-experiment.com/gif-recorder.js"></script>
    <script src="https://www.webrtc-experiment.com/getScreenId.js"></script>
    <script src="https://www.webrtc-experiment.com/DetectRTC.js"> </script>
     <!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>

        <div class="github-stargazers" style="display:none;"></div>

     

        <section class="experiment recordrtc">
            <h2 class="header">
                <select class="recording-media" style="display:none;">
                    <option value="record-video">Video</option>
                    <option value="record-audio">Audio</option>
                    <option value="record-screen">Screen</option>
                </select>

                <select class="media-container-format" style="display:none;">
                   
                    <option>Mp4</option>
                    <option disabled>WebM</option>
                    <option disabled>WAV</option>
                    <option disabled>Ogg</option>
                    <option>Gif</option>
                </select>

                <button>Start Recording</button>
            </h2>

            <div style="text-align: center; display: none;">
                <button id="save-to-disk">Save To Disk</button>
                <button id="open-new-tab" style="display:none;">Open New Tab</button>
                <button id="upload-to-server">Upload To Server</button>
            </div>

            <br>

            <video controls playsinline autoplay muted=false></video>
        </section>

        <script>
            (function() {
                var params = {},
                    r = /([^&=]+)=?([^&]*)/g;

                function d(s) {
                    return decodeURIComponent(s.replace(/\+/g, ' '));
                }

                var match, search = window.location.search;
                while (match = r.exec(search.substring(1))) {
                    params[d(match[1])] = d(match[2]);

                    if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                    }
                }

                window.params = params;
            })();
        </script>

        <script>
            var recordingDIV = document.querySelector('.recordrtc');
            var recordingMedia = recordingDIV.querySelector('.recording-media');
            var recordingPlayer = recordingDIV.querySelector('video');
            var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');

            recordingDIV.querySelector('button').onclick = function() {
                var button = this;

                if(button.innerHTML === 'Stop Recording') {
                    button.disabled = true;
                    button.disableStateWaiting = true;
                    setTimeout(function() {
                        button.disabled = false;
                        button.disableStateWaiting = false;
                    }, 2 * 1000);

                    button.innerHTML = 'Start Recording';

                    function stopStream() {
                        if(button.stream && button.stream.stop) {
                            button.stream.stop();
                            button.stream = null;
                        }
                    }

                    if(button.recordRTC) {
                        if(button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if(!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        }
                        else {
                            button.recordRTC.stopRecording(function(url) {
                                button.recordingEndedCallback(url);
                                stopStream();

                                saveToDiskOrOpenNewTab(button.recordRTC);
                            });
                        }
                    }

                    return;
                }

                button.disabled = true;

                var commonConfig = {
                    onMediaCaptured: function(stream) {
                        button.stream = stream;
                        if(button.mediaCapturedCallback) {
                            button.mediaCapturedCallback();
                        }

                        button.innerHTML = 'Stop Recording';
                      //  button.disabled = false;
                      
                     button.disabled = true;
                     setTimeout(function() {
                        button.disabled = false;
                       }, 5 * 1000);
                        
                        
                    },
                    onMediaStopped: function() {
                        button.innerHTML = 'Start Recording';

                        if(!button.disableStateWaiting) {
                            button.disabled = false;
                        }
                    },
                    onMediaCapturingFailed: function(error) {
                        if(error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                            InstallTrigger.install({
                                'Foo': {
                                    // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                    URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                    toString: function () {
                                        return this.URL;
                                    }
                                }
                            });
                        }

                        commonConfig.onMediaStopped();
                    }
                };

                if(recordingMedia.value === 'record-video') {
                    captureVideo(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                            disableLogs: params.disableLogs || false,
                            canvas: {
                                width: params.canvas_width || 320,
                                height: params.canvas_height || 240
                            },
                            frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.src = null;
                            recordingPlayer.srcObject = null;

                            if(mediaContainerFormat.value === 'Gif') {
                                recordingPlayer.pause();
                                recordingPlayer.poster = url;

                                recordingPlayer.onended = function() {
                                    recordingPlayer.pause();
                                    recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                };
                                return;
                            }

                            recordingPlayer.src = url;

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio') {
                    captureAudio(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'audio',
                            bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                            sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                            leftChannel: params.leftChannel || false,
                            disableLogs: params.disableLogs || false,
                            recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                        });

                        button.recordingEndedCallback = function(url) {
                            var audio = new Audio();
                            audio.src = url;
                            audio.controls = true;
                            recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                            recordingPlayer.parentNode.appendChild(audio);

                            if(audio.paused) audio.play();

                            audio.onended = function() {
                                audio.pause();
                                audio.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio-plus-video') {
                    captureAudioPlusVideo(commonConfig);

                    button.mediaCapturedCallback = function() {

                        if(DetectRTC.browser.name !== 'Firefox') { // opera or chrome etc.
                            button.recordRTC = [];

                            if(!params.bufferSize) {
                                // it fixes audio issues whilst recording 720p
                                params.bufferSize = 16384;
                            }

                            var audioRecorder = RecordRTC(button.stream, {
                                type: 'audio',
                                bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                                sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                                leftChannel: params.leftChannel || false,
                                disableLogs: params.disableLogs || false,
                                recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                            });

                            var videoRecorder = RecordRTC(button.stream, {
                                type: 'video',
                                disableLogs: params.disableLogs || false,
                                canvas: {
                                    width: params.canvas_width || 320,
                                    height: params.canvas_height || 240
                                },
                                frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                            });

                            // to sync audio/video playbacks in browser!
                            videoRecorder.initRecorder(function() {
                                audioRecorder.initRecorder(function() {
                                    audioRecorder.startRecording();
                                    videoRecorder.startRecording();
                                });
                            });

                            button.recordRTC.push(audioRecorder, videoRecorder);

                            button.recordingEndedCallback = function() {
                                var audio = new Audio();
                                audio.src = audioRecorder.toURL();
                                audio.controls = true;
                                audio.autoplay = true;

                                audio.onloadedmetadata = function() {
                                    recordingPlayer.src = videoRecorder.toURL();
                                };

                                recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                                recordingPlayer.parentNode.appendChild(audio);

                                if(audio.paused) audio.play();
                            };
                            return;
                        }

                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'video',
                            disableLogs: params.disableLogs || false,
                            // we can't pass bitrates or framerates here
                            // Firefox MediaRecorder API lakes these features
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.srcObject = null;
                            recordingPlayer.muted = false;
                            recordingPlayer.src = url;

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-screen') {
                    captureScreen(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                            disableLogs: params.disableLogs || false,
                            canvas: {
                                width: params.canvas_width || 320,
                                height: params.canvas_height || 240
                            }
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.src = null;
                            recordingPlayer.srcObject = null;

                            if(mediaContainerFormat.value === 'Gif') {
                                recordingPlayer.pause();
                                recordingPlayer.poster = url;
                                recordingPlayer.onended = function() {
                                    recordingPlayer.pause();
                                    recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                };
                                return;
                            }

                            recordingPlayer.src = url;
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio-plus-screen') {
                    captureAudioPlusScreen(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'video',
                            disableLogs: params.disableLogs || false,
                            // we can't pass bitrates or framerates here
                            // Firefox MediaRecorder API lakes these features
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.srcObject = null;
                            recordingPlayer.muted = false;
                            recordingPlayer.src = url;

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }
            };

            function captureVideo(config) {
                captureUserMedia({video: true}, function(videoStream) {
                    recordingPlayer.srcObject = videoStream;

                    config.onMediaCaptured(videoStream);

                    videoStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudio(config) {
                captureUserMedia({audio: true}, function(audioStream) {
                    recordingPlayer.srcObject = audioStream;

                    config.onMediaCaptured(audioStream);

                    audioStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudioPlusVideo(config) {
                captureUserMedia({video: true, audio: true}, function(audioVideoStream) {
                    recordingPlayer.srcObject = audioVideoStream;

                    config.onMediaCaptured(audioVideoStream);

                    audioVideoStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureScreen(config) {
                getScreenId(function(error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if(error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    captureUserMedia(screenConstraints, function(screenStream) {
                        recordingPlayer.srcObject = screenStream;

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function() {
                            config.onMediaStopped();
                        };
                    }, function(error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureAudioPlusScreen(config) {
                getScreenId(function(error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if(error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    screenConstraints.audio = true;

                    captureUserMedia(screenConstraints, function(screenStream) {
                        recordingPlayer.srcObject = screenStream;

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function() {
                            config.onMediaStopped();
                        };
                    }, function(error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
            }

            function setMediaContainerFormat(arrayOfOptionsSupported) {
                var options = Array.prototype.slice.call(
                    mediaContainerFormat.querySelectorAll('option')
                );

                var selectedItem;
                options.forEach(function(option) {
                    option.disabled = true;

                    if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                        option.disabled = false;

                        if(!selectedItem) {
                            option.selected = true;
                            selectedItem = option;
                        }
                    }
                });
            }

            recordingMedia.onchange = function() {
                if(this.value === 'record-audio') {
                    setMediaContainerFormat(['WAV', 'Ogg']);
                    return;
                }
                setMediaContainerFormat(['WebM', 'Mp4', 'Gif']);
            };

            if(DetectRTC.browser.name === 'Edge') {
                // webp isn't supported in Microsoft Edge
                // neither MediaRecorder API
                // so lets disable both video/screen recording options

                console.warn('Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.');

                recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
                setMediaContainerFormat(['WAV']);
            }

            if(DetectRTC.browser.name === 'Firefox') {
                // Firefox implemented both MediaRecorder API as well as WebAudio API
                // Their MediaRecorder implementation supports both audio/video recording in single container format
                // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)

                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                            + '<option value="record-audio-plus-screen">Audio+Screen</option>'
                                            + recordingMedia.innerHTML;
            }

            // disabling this option because currently this demo
            // doesn't supports publishing two blobs.
            // todo: add support of uploading both WAV/WebM to server.
            if(false && DetectRTC.browser.name === 'Chrome') {
                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                            + recordingMedia.innerHTML;
                console.info('This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).');
            }

            var MY_DOMAIN = 'webrtc-experiment.com';

            function isMyOwnDomain() {
                // replace "webrtc-experiment.com" with your own domain name
                return document.domain.indexOf(MY_DOMAIN) !== -1;
            }

            function saveToDiskOrOpenNewTab(recordRTC) {
                recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
                recordingDIV.querySelector('#save-to-disk').onclick = function() {
                    if(!recordRTC) return alert('No recording found.');

                    recordRTC.save();
                };

                recordingDIV.querySelector('#open-new-tab').onclick = function() {
                    if(!recordRTC) return alert('No recording found.');

                    window.open(recordRTC.toURL());
                };

                if(isMyOwnDomain()) {
                    recordingDIV.querySelector('#upload-to-server').disabled = true;
                    recordingDIV.querySelector('#upload-to-server').style.display = 'none';
                }
                else {
                    recordingDIV.querySelector('#upload-to-server').disabled = false;
                }
                
                recordingDIV.querySelector('#upload-to-server').onclick = function() {
                    if(isMyOwnDomain()) {
                        alert('PHP Upload is not available on this domain.');
                        return;
                    }

                    if(!recordRTC) return alert('No recording found.');
                    this.disabled = true;

                    var button = this;
                    uploadToServer(recordRTC, function(progress, fileURL) {
                        if(progress === 'ended') {
                            button.disabled = false;
                            button.innerHTML = 'Click to download from server';
                            button.onclick = function() {
                                window.open(fileURL);
                            };
                            return;
                        }
                        button.innerHTML = progress;
                    });
                };
            }

            var listOfFilesUploaded = [];
            var reg_id = '<?php echo $id; ?>'
            function uploadToServer(recordRTC, callback) {
                var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
                var fileType = blob.type.split('/')[0] || 'audio';
                //var fileName = (Math.random() * 1000).toString().replace('.', '');
                var fileName = reg_id;
                if (fileType === 'audio') {
                    fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
                } else {
                    fileName += '.mp4';
                }

                // create FormData
                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-blob', blob);

                callback('Uploading ' + fileType + ' recording to server.');

                // var upload_url = 'https://your-domain.com/files-uploader/';
                var upload_url = 'https://itcareer.app/employer-login/view/save.php';

                // var upload_directory = upload_url;
                var upload_directory = 'https://itcareer.app/employer-login/view/uploads/';

                makeXMLHttpRequest(upload_url, formData, function(progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }

                    callback('ended', upload_directory + fileName);

                    // to make sure we can delete as soon as visitor leaves
                    listOfFilesUploaded.push(upload_directory + fileName);
                });
            }

            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        callback('upload-ended');
                    }
                };

                request.upload.onloadstart = function() {
                    callback('Upload started...');
                };

                request.upload.onprogress = function(event) {
                    callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                };

                request.upload.onload = function() {
                    callback('progress-about-to-end');
                };

                request.upload.onload = function() {
                    callback('progress-ended');
                };

                request.upload.onerror = function(error) {
                    callback('Failed to upload to server');
                    console.error('XMLHttpRequest failed', error);
                };

                request.upload.onabort = function(error) {
                    callback('Upload aborted.');
                    console.error('XMLHttpRequest aborted', error);
                };

                request.open('POST', url);
                request.send(data);
            }

            window.onbeforeunload = function() {
                recordingDIV.querySelector('button').disabled = false;
                recordingMedia.disabled = false;
                mediaContainerFormat.disabled = false;

                if(!listOfFilesUploaded.length) return;

                var delete_url = 'https://webrtcweb.com/f/delete.php';
                // var delete_url = 'RecordRTC-to-PHP/delete.php';

                listOfFilesUploaded.forEach(function(fileURL) {
                    var request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
                            if(this.responseText === ' problem deleting files.') {
                                alert('Failed to delete ' + fileURL + ' from the server.');
                                return;
                            }

                            listOfFilesUploaded = [];
                            alert('You can leave now. Your files are removed from the server.');
                        }
                    };
                    request.open('POST', delete_url);

                    var formData = new FormData();
                    formData.append('delete-file', fileURL.split('/').pop());
                    request.send(formData);
                });

                return 'Please wait few seconds before your recordings are deleted from the server.';
            };
        </script>



   

    <!-- commits.js is useless for you! -->
    <script>
        window.useThisGithubPath = 'muaz-khan/RecordRTC';
    </script>
    <script src="https://www.webrtc-experiment.com/commits.js" async></script>

<!--video end-->


</div>




</div>



</div>






 <script type="text/javascript">
 $(document).ready(function() {
	// alert("jdjd");

    $("#checkpass").validate({

    rules: {
            cpassword:{// compound rule
          required: true ,
           equalTo: "#password"
          },
           

                }   
    });

});
 
 
 
 function delet_image(id){
			
			data = 'id='+id;
				if (confirm("Are you sure?")) {
					$.ajax({
		url:"view/ajax/delete_emp_image.php",
		type:"POST",
		data:data,
		success: function(html){
			
		//alert(html);
		 location.reload();
		}
		
		});
				}	
		}
		
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
 
 
 	$(window).load(function() {
     country=$(".change").val();
	  city_ajax = $("#city_ajax").val();
	  
		 state_id = $("#state_id").val();
			$.ajax({
		url:"view/ajax/select_country.php",
		type:"POST",
		data:{edit_country_code:country,state_id:state_id,city_ajax:city_ajax},
		success: function(html){
		//alert(html);
		$("#state_id").html(html);
		}
		
		});
});
	
	function append_media(){
		$len=$('input[name="social_media_url[]"]').length;
		
		
		if($len<=4)
		$("#append_media").append('<div class="row" id="media_'+$len+'"><div class="input col-md-6"><div class="form-group form-md-line-input form-md-floating-label has-success"><select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_'+$len+'"><option value="">--Select Social Media Type--</option><option value="facebook">Facebook</option><option value="instagram">Instagram</option><option value="twitter">Twitter</option><option value="google+">Google+</option><option value="linked_in">LinkedIn</option><option value="you_tube">YouTube</option></select></div></div><div class="col-md-6"><div class="form-group form-md-line-input form-md-floating-label has-success"><input type="url" name="social_media_url[]" id="social_media_url_'+$len+'" class="form-control"  placeholder="URL"></div><img src="template/images/supprimer.png" width="20" height="20" style="position: absolute; right: 0px; top: 15px; width: 18px; height: 18px;" border="0" onclick="return removeeee_media(this.id);" id="'+$len+'" value="Remove"/></div></div>');
	}
	
	function removeeee_media(id){
		var val=confirm("You really want to delete it??");
if(val==true)
$("#media_"+id).remove();
else
return false;
	}
	
	function append()
{

$len=$('input[name="contact_name[]"]').length;



//alert($len);
//var val=document.getElementById("remove").style.display="";
if($len<=4)
$("#append").append('<div class="row" id="newtr_'+$len+'"><div class="input col-md-2"><div class="form-group form-md-line-input form-md-floating-label has-success"><select style="" name="contact_department[]" id="contact_department_'+$len+'" class="form-control select2me select2-hidden-accessible"><option>--Select Deparnment--</option><option value="Director">Director</option><option value="Accounts">Accounts </option><option value="Air_Imports">Air Imports</option><option value="Air Exports">Air Exports</option><option value="Ocean_Imports">Ocean Imports</option><option value="Quotations">Quotations</option><option value="Ocean_Exports">Ocean Exports</option><option value="Sales_Manager">Sales Manager</option></select></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input style="" name="contact_name[]" id="contact_name_'+$len+'" class="form-control required" placeholder="Name" type="text"></div></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input style="" name="contact_phone[]" id="contact_phone_'+$len+'" class="form-control required" placeholder="Person Contact No" type="text"></div></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input name="contact_email[]" style="" id="contact_email_'+$len+'" class="form-control required" placeholder="Email" type="text"></div></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input name="contact_designation[]" id="contact_designation_'+$len+'" class="form-control required" placeholder="Designation" type="text"></div></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input class="form-control" name="contact_skype[]" id="contact_skype_'+$len+'" style="" placeholder="SkypeID" type="text"></div><img src="template/images/supprimer.png" width="20" height="20" style="position: absolute; right: 0px; top: 15px; width: 18px; height: 18px;" border="0" onclick="return removeeee(this.id);" id="'+$len+'" value="Remove"/></div></div></div>');

$len++;
}


function removeeee(id)
{
//alert(id);
var val=confirm("You really want to delete it??");
if(val==true)
$("#newtr_"+id).remove();
else
return false;

}
	
	
</script>
 
 <script>
 CKEDITOR.replace( 'who' );
</script>

<style>
	.images {
    margin-bottom: 65px;
}
</style>

