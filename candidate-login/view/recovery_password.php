<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function () {
$("#btn").click(function () {
var password = $("#password").val();
var confirmPassword = $("#cpassword").val();
if (password != confirmPassword) {
alert("Passwords do not match.");
return false;
}
return true;
});
});

//      
// $(document).ready(function() {
//    
//     jQuery.validator.addMethod("textOnly", function(value, element) {
//    return this.optional(element) || (element.value.match(/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,10}$/));
//}, " Strong passwords with min 8 - max 10 character length,at least two letters (not case sensitive),one number,one special character (all, not just defined),space is not allowed. ");
//    
// 
// $("#passwordform").validate({
//    rules: {
//	 
//	 password:{// compound rule 
//	  required: true ,
//	
//                    minlength: 8,
//			textOnly:true
//              
//
//	  
//	 },
//	 
//	 
//            confirm_pass:{// compound rule 
//          required: true ,
//           equalTo: "#password"
//          },
//          
//          
//
//                }   
//    });
//    
//    });

</script>
<div class="module form-module ">

<div class="form">

<form method="POST" id="passwordform" action="model/recovery_password_model.php">

<div class="panel white rounded centered ">
<h2 class="txt-center">Change Password</h2>

<div class="alert info rounded">
<i class="fa fa-info-circle"></i> Enter new password <?php echo GetMessage(); ?>
</div>

<!--<input type="email" name="email" placeholder="Email" class="control rounded" style="margin-bottom: 7px;">-->
<div> <input type="hidden" class="balloon" value="<?php echo base64_decode($_REQUEST['UserId']);?>" data-required="1" name="UserId" id="UserId" style="margin-bottom: 7px;"></div>
<div> <input type="hidden" class="balloon" value="<?php echo $_REQUEST['key'];?>" data-required="1" name="key" id="key" style="margin-bottom: 7px;"></div>
<div> <input type="password" class="balloon"  placeholder="New Password" data-required="1" name="password" id="password" ><label for="name"><i class="fa fa-lock"></i></label></div>
<div> <input type="password" class="balloon" placeholder="Confirm Password" data-required="1"  name="cpassword" id="cpassword" ><label for="name"><i class="fa fa-lock"></i></label></div>

<!--<a class="control border default block rounded hover-inverse" style="margin-top: 15px;">Send my password</a>-->
<input type="submit" name="submit" id="btn" value="Change Password" >

<!--<p class="txt-center" style="margin-top: 20px;">Remembered your password ? <a href="?page=login">Go Back</a></p>-->
</div>
</form>
</div></div>
<style>
.error {
color: red;
}
</style>