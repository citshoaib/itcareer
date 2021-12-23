<?php
if(isset($_SESSION["candidate_email"])){
header('location:?page=dashboard');
}
?>
<script type="text/javascript">
$(document).ready(function() {
	
$("#login_frm").validate();


});
</script>
<style>
	.header{
	 background: #000 none repeat scroll 0 0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
		text-align: center;
	}
	.form-module {
    background: #ffffff none repeat scroll 0 0;
    border-top: 5px solid #00affe;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    margin: 45px auto 10%;
    max-width: 300px;
    position: relative;
    width: 100%;
		margin-top:45px;
}
.cl{
	clear: both;
	
	}
	.text-center {
    text-align: center;
}

	.text_img_as img {
		margin: 0px auto;
}

.mycss{
	width:100px !important;
	
	
}
</style>

<div class="container container-1">
        <div class="row">
					

<div class="col-md-12 text-center text_img_as header">
                <img src="../templates/images/logo.png" class="img-responsive"><br>
                <h4 style="color: #FFF;">C2C Hired (Candidate Panel)</h4>
            </div>


<div class="cl"></div>
<div class="cl"></div>
<?
echo  "<b style='color:red; text-align: center;font-size: 16px;'>".GetMessage()."</b>";
?>
<div class="module form-module ">

   
  <div class="form">
    <h2>Login to your account</h2>
	
    <form id="login_frm" action="model/check_login.php" method="post" autocomplete="off">
      <div> <input type="email" name="email" placeholder="Email ID" class="balloon" required/><label for="name"><i class="fa fa-user"></i></label></div>
      <div> <input type="password" name="password" placeholder="Password" class="balloon" required/><label for="name"><i class="fa fa-lock"></i></label></div>
      <input type="submit" name="submit" value="Sign In">
    </form>
  </div>
  <!--<div class="form">
    <h2>Create an account</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>-->
  <div class="cta"><a href="?page=forget">Forgot your password?</a></div>
	<span style="margin-left: 135px;">OR</span>
	<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
	<div class="cta"><a data-toggle="modal" data-target="#myModal">Register Now</a></div></br>
								
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <!--<button type="button" class="close mycss" data-dismiss="modal" align="center">-->
			<a class="close" data-dismiss="modal"><img src="http://simpleicon.com/wp-content/uploads/cross.png" width="20" style="float: right;"></a>
		 <!--</button>-->
          <h4 class="modal-title">Candidate Registration</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="model/candidate_registration_model.php" onsubmit="return Validate()">
	 <div class="form-group">
    <label for="email">Candidate Name:</label>
    <input type="text" class="form-control" id="candidate_name" name="candidate_name" required>
  </div>
  
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  <span id="error_email" style="color: red;"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" required>
  </div>
  
	<div class="form-group">
    <label for="cpassword">Confirm Password:</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
  </div>
	
		<div class="form-group">
    <label for="token">Apply Token:</label>
    <input type="text" class="form-control" id="token" name="token" required>
	<h4 class="Validate" style="display: none;color:#006400;">Token Validate Succefully</h4>
	<h4 class="Invalid" style="display: none;color:#FF0000;">Token is Invalid</h4>
  </div>
	
	<div class="form-group">
    <label for="pwd">Select Country:</label>
    <select name="country" required class="form-control">
		<option value="">Select Country</option>
		<?  $selCountry="SELECT * FROM `country_master`";
		    $queryCountry=mysql_query($selCountry);
		    while($rowCountry=mysql_fetch_array($queryCountry)){
		?>
		<option value="<? echo $rowCountry['country_code'];?>"><? echo $rowCountry['country_name'];?></option>
		<? } ?>
	</select>
  </div>
	
  <!--<div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>-->
  <button type="submit" id="submit_btn" class="btn btn-default  mycss" >Submit</button>
  
</form> 
        </div>
        <!--<div class="modal-footer">
					
          <button type="button" class="btn btn-default  mycss" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>							
	
</div>
		
		 <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("pwd").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
	
	
	$("#email").blur(function(){
	    
		email=$(this).val();
		$.ajax({
			type:"POST",
			url:"view/ajax/validate_ajax.php",
			data:{"email":email},
			success:function(msg){
				if(msg=="1"){
			$("#error_email").text("Email is Already Registered");		
			$("#submit_btn").attr("disabled",'disabled');				
					
				}else{
					
				$("#error_email").text("");		
			$("#submit_btn").attr("disabled",false);				
					
					
				}
				
				
			}
			
			});
		});
	
	
 $("#token").blur(function(){
        

	 tkn_val=$(this).val();
        
        
     
        
        
           
        $.ajax({
            
            
            type: "post",
            url: "view/ajax/candidate_tokencheck.php",
            data: "token_value="+tkn_val,
            async:true,
            success:function(data){
                
                
           
                
                
                
                   if(data=='1'){
                        
                    $(".Validate").show();
                     $(".Invalid").hide();   
                        
                    }else{
                        
                        $(".Invalid").show();    
                     $(".Validate").hide();
                    }
                
                
                
                
            }
            
            
            
        });
        
        
        
        
        
	
 });
	
	
</script>
				
</div></div>

<div class="account-container">
	
	<div class="content clearfix"> 
	