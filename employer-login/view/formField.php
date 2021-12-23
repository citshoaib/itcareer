 <?php
 if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
 ?>    
<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Registration Form</h3>
<div class="widget widget-nopad">

<div class="widget-header"> <i class="icon-list-alt"></i>

<!--<span style="float:right;margin-right:5px;margin-top:5px;"><a href="?page=formfieldshow" class="btn btn-primary">List</a></span>-->

</div>

</div>
</div>
</div>


 
<div class="row ">
<div class="col-lg-12">
<?php
session_start();
$id = $_SESSION['employer_id'];

$select_1=mysql_query("select * from sedna_form where id='$id'")or die(mysql_error);

$row_1=mysql_fetch_array($select_1);

$emp = $row_1['emp_name'];
$email = $row_1['email'];
$ATs = $row_1['ATs'];
$contact = $row_1['contact'];
$industry = $row_1['industry'];
$web = $row_1['web'];
$location =$row_1['location'];
 $who_we =$row_1['who_we'];
 $address = $row_1['address'];
 $logo = $row_1['logo'];
?>

 <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
<form method="post" action="model/formFieldmodel.php" method="post" enctype="multipart/form-data">

<div class="row" >
	<div align="center">
	<img id='logo' src='../upload_img/<?php echo $logo; ?>' height='99' width='99' alt=""/>
	<input type="hidden" name="hiddenImage" value="<?php echo $logo; ?>">
	<input type="hidden" name="hiddenId" value="<?php echo $id; ?>">
	
	</div>
	<br><br>
	<label class="label col-md-4">Employer Name:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="emp"  class="alphaonly form-control <?php if($emp!=''){echo 'edited'; } ?>" value="<?php echo $emp; ?>" required >
		<input type="hidden" name="id" value="<?php echo $id;?>">
		 <label for="form_control_1">Employer Name</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Employer Email:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="email" name="email"  class="alphaonly form-control <?php if($email!=''){echo 'edited'; } ?>" value="<?php echo $email; ?>" readonly >
		
		 <label for="form_control_1">Employer Email</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Contact Number:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="phone"  value="<?php echo $contact; ?>" class="alphaonly form-control <?php if($contact!=''){echo 'edited'; } ?>" required >
		
		 <label for="form_control_1">Contact Number</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Industry:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="Industry" value="<?php echo $industry; ?>" class="alphaonly form-control <?php if($industry!=''){echo 'edited'; }?>" required >
		
		 <label for="form_control_1">Industry</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Logo:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="file" name="logo"   required >		
		 
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Website:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="url" name="web" value="<?php echo $web; ?>" class="alphaonly form-control <?php if($web!=''){echo 'edited'; }?> " required >
		
		 <label for="form_control_1">Website</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Location:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		 <input type="text" name="location"  value="<?php echo $location; ?>" class="alphaonly form-control <?php if($location!=''){echo 'edited'; }?>" required >
		
		 <label for="form_control_1">Location</label>
		 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Who We:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		
		<textarea name="who" id="who" value="" required class="required form-control <?php if($who_we!=''){echo 'edited'; }?>"><?php echo $who_we; ?></textarea>
		
	 </div>
	 </div>
	</div>

</div>

<div class="row" >
	
	<label class="label col-md-4">Address:</label>
	<div class="col-md-4 unit">	
	 <div class="input">
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		
		<textarea name="address" id="address" value="" required class="required form-control <?php if($address!=''){echo 'edited'; }?>"><?php echo $address; ?></textarea>
		
	 </div>
	 </div>
	</div>

</div>

<div class="row">
              
	<label class="label col-md-4">Applicant Tracking System (ATS):</label>
	<div class="input col-md-6">
	
	 <div class="form-group form-md-line-input form-md-floating-label has-success">
		<select class="form-control" name="ATS_select" <?php if($ATs!=''){?>disabled="true" readonly <?php }?>>
		   <option value="">---Selelct ---</option>
			<option   value="ATS" <?php if($ATs=="ATS"){?>selected<?php }?>>ATS</option>
			
			<option  value="ATS1" <?php if($ATs=="ATS1"){?>selected<?php }?>>ATS1</option>
		   </select>
	 </div>
	</div>
</div>
	
	 <br>
  <div class="row"> 
	<div class="col-md-2 unit">
	 
	  
	  <input type="submit" name="submit" class="btn btn-primary btn-lg"  value="Submit" data-automation-id="sign-in-button" >
   
  </div>

  </div>

</form>
 </div>
</div>

</div>
</div>
