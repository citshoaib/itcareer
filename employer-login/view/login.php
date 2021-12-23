<?php

  //Include Google Configuration File
  include('gconfig.php');

  if(!isset($_SESSION['access_token'])) {
   //Create a URL to obtain user authorization
   $google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="template/images/Google_Button.svg" /></a>';
  } else {

    header("Location: dashboard.php");
  }
?><?php
if(isset($_SESSION["employer_email"])){
	  header('location:?page=dashboard');
}
?>
<script type="text/javascript">
$(document).ready(function() {
	
$("#login_frm").validate();


});
</script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style>
.header{
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
.form-module h2{
    color:#0C481A;
}
input[type="submit"]{
   background: #0C481A; 
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
.panel.panel-default img{
width: 80px;
margin-left: 2px;
   border-style: hidden;
    
}

.btn-primary{
   background-color: #fff !important; 
       margin: 10px 0 10px;
   border-color: #fff; 
}
.container{
max-width: 1400px;
}
.form-module .cta2{
   float:right; 
    font-size: 12px;
    padding: 0px 22px 10px;
}
.form-module .cta1{
   float:left; 
    font-size: 12px;
    padding: 0px 25px 15px;
}

.form-module {
    background: #ffffff none repeat scroll 0 0;
    border-top: 5px solid #0C481A;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    margin: 15px auto 5%;
    max-width: 300px;
    position: relative;
    width: 100%;
}
.panel img:hover {
box-shadow: 0px -1px 8px 1px #ccc;
border-radius: 30px;
}
#btn-fblogin img:hover {
box-shadow: 0px -1px 8px 1px #ccc;
border-radius: 30px;
}
.form-module input {
outline: none;
display: block;
width: 100%;
border: 1px solid #d9d9d9;
margin: 0 0 20px;
padding: 10px 15px;
box-sizing: border-box;
font-wieght: 400;
-webkit-transition: 0.3s ease;
transition: 0.3s ease;
font-size: 14px;
}
</style>

<div class="container container-1" style="background: #E4F5DD;height:100vh">
        <div class="row">

<div class="col-md-12 text-center text_img_as header">
                <img src="template/images/logo-itCareer.fw__300.png" class="img-responsive">
            </div>

<?
echo  "<b style='color:red; text-align: center;font-size: 16px;'>".GetMessage()."</b>";
?>
<div class="module form-module">
  <div class="form">
    <h2>Login to your account</h2>
    
    
    <form id="login_frm" action="model/check_login.php" method="post" autocomplete="off">
          <div class="container">
 
   <div class="panel">
   <?php
    echo '<div align="center">'.$google_login_btn . '<a id="btn-fblogin" href="view/fblogin.php" class="btn "><img src="template/images/FB_Button.svg" style="width: 80px;margin-left: 0px;"/></a>
   </div>';
   ?>
   
    
   </div>
   
   
  
           
                        
   
  </div>
  <br><br>
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
  <div class="cta1"><a href="?page=forget">Forgot your password?</a></div>
<div class="cta2"><a href="?page=register_now">Register Now</a></div>
	
	<!--
	<div class="cta2"><a data-toggle="modal" data-target="#myModal">Register Now</a></div>-->
	
	</br>
				 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
	   <a class="close" data-dismiss="modal"><img src="http://simpleicon.com/wp-content/uploads/cross.png" width="20" style="float: right;"></a>
          <h4 class="modal-title">Employer Registration</h4>
        </div>
        <div class="modal-body">
         <form method="post" action="model/employer_registration_model.php">
					 <div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" id="emp_name" name="emp_name" required>
  </div>	
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" required>
  </div>
	<div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
  </div>
  <!--<div class="checkbox ">
    <label><input class="form-control" type="checkbox"> Remember me</label>
  </div>-->
  <button type="submit" class="btn btn-default mycss" onclick="return Validate()">Submit</button>
</form> 
        </div>
        <!--<div class="modal-footer">
					
          <button type="button" class="btn btn-default mycss" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>								
								
</div>
				</div></div>

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
</script>

<div class="account-container">
	
	<div class="content clearfix"> 


