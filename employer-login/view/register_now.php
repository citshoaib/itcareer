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
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 <script>
 
	  function AjaxGetState(country_id,select_state) {
	  //alert("ada"+select_state);
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/state.php?country_id="+country_id,
	  //data:'country_id='+val,
	  success: function(data){
	  $("#state").html(data);
	  if (select_state!='') {
		// alert(select_state);
	  $("#state>select[name=state]").find("option[value='"+select_state+"']").attr("selected","selected");
	  }
	  }
	  });
	  }
	  
	      
 function zip_id(id)
	  {
	  if(id!==''){
	  //alert(id);
	  jQuery.ajax({
	  url : "view/ajax/get_new_zip.php",
	  type:"POST",
	  data: "id="+id,
	  Async: true,
	  success:function(data)
	  {
	  //alert(data);
	  
	  var res = data.split("#");
	  //
	  
	  var country=$("#country>select[name=country]>option:selected").val();
	  if (country=='') {
	  //alert(res['0']);
	  $("#country>select[name=country]").find("option[value='"+res['0']+"']").attr("selected","selected").change();
	  
	  }
	  
	  
	  var state=$("#state>select[name=state]>option:selected").val();
	  if (state=='') {
	  var country_id=res['0'];
	  var select_state= res['1'];
	  //$("select[name='theNameYouChose']").find("option[value='theValueYouWantSelected']").attr("selected",true);
	  AjaxGetState(country_id,select_state);
	  
	  
	  
	  }
	  
	  var city=	$("#city").val();
	  if (city=='') {
	  
	  
	  var select_city=res['2'];
	  var state_id=res['1'];
	  
      //alert("ddgd"+select_city);
      
      	$("#city").val(select_city);
        
         $("#city").addClass("edited");
      
	  //AjaxShipping(state_id,select_city);
	  
	  // alert(select_city);
	  //$("#city>select[name=city]").find("option[value='"+select_city+"']").attr("selected","selected");
	  
	  
	  }
	  
	  
	  }
	  });
	  
	  }
	  }
	  
	  function city_name(name)
{
	if(name!==''){
	//alert(name);
	jQuery.ajax({
	url : "view/ajax/get_country_state_city_2.php",
	type:"POST",
	data: "name="+name,
   success:function(data)
  {
	  var res = data.split("||#"); 
	//alert(data);
		
				
	   $("#postal_code").val(res['0']);
		$('#postal_code').addClass("edited");
		
		$("#country").html(res['1']);
		//$('#country').addClass("edited");
		
		 $("#state").html(res['2']);
		//$('.state').addClass("edited");
  }
  });

}
}
	  
    </script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #0C481A;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 25%;
	background: #0C481A;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #0C481A;
	
	text-align: center;
}
.signup-form form {
	color: #fff;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #0056b3;
	text-decoration: none;
font-size:12px;
    
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
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
   height: 35px;
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
width: 225px;
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
.intro {
  height: 100%;
}

.gradient-custom {
  /* fallback for old browsers */
  background: #fa709a;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to bottom right, rgba(250, 112, 154, 1), rgba(254, 225, 64, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to bottom right, rgba(250, 112, 154, 1), rgba(254, 225, 64, 1))
}
.signup-form .form-control {
font-size: 14px;
}
.signup-form form a img:hover {
box-shadow: 0px -1px 8px 1px #ccc;
border-radius: 30px;
}
.btn-success:hover {
    color: #fff;
    background-color: #0C481A;
    border-color: #0C481A;}
    .form-module .cta1 a {
color: #007bff;
}
.form-module .cta1 a:hover {
text-decoration: underline;
}
.form-module .cta2 a {
color: #007bff;
}
.form-module .cta2 a:hover {
text-decoration: underline;
}
</style>

<div class="container container-1" style="background: #E4F5DD;">
<div class="row">

    <div class="col-md-12 text-center text_img_as header">
    <img src="template/images/logo-itCareer.fw__300.png" class="img-responsive">
    </div>
    <?
    echo  "<b style='color:red; text-align: center;font-size: 16px;'>".GetMessage()."</b>";
    ?>

<div class="signup-form">
    <form action="model/emp_reg_model.php" method="post">
		<h2>Employer Register</h2>
		
 <div class="container">
     <div class="panel">
       <?php
        echo '<div align="center">'.$google_login_btn . '<a id="btn-fblogin" href="view/fblogin.php" class="btn "><img src="template/images/FB_Button.svg" style="width: 80px;margin-left: 0px;"/></a>
       </div>';
       ?>
     </div>
 </div>
	
       
        <div class="form-group">
        	<input type="text" class="form-control" name="company_name" placeholder="Company Name" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="emp_name" placeholder="Your Name" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="emp_email" placeholder="Email" required="required">
        </div>
	
        
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div> 
        
		<div class="form-group">
            <div class="input" id="country">
            <select class="form-control" required onchange="AjaxGetState(this.value)" name="country" >
            <option  value="">Country</option>
            <?php
            $country=  $conn->query("select * from  country_master order by country_name ASC");
            while($fetch_country=$country->fetch_array())
            { ?>
            <option value="<?php echo $fetch_country['country_code']; ?>" <?php echo ($fetch_country['country_code']==$Country1)? 'selected' : '';  ?>><?php echo $fetch_country['country_name']; ?></option>
            <?php } ?>
            </select> 
            </div>
          </div>

        
		<div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="City" required="required">
        </div>        
   
		<div class="form-group">
            <!--<button type="submit" class="btn btn-success btn-lg btn-block
            ">Register Now</button>-->
            
      <input type="submit" name="submit" value="Register Now">
        </div>
        	<div class="form-group">
           <div class="cta2"><a href="?page=login">Sign In</a></div>
        </div> 

    </form>
</div>



</div>
</div>



<div class="account-container">
	<div class="content clearfix"> 


