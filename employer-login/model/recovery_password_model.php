<?php
include("../../config/config.php");
include("../../config/function.php");

if($_REQUEST['UserId'])
{
 $UserId = $_REQUEST['UserId'];
$password = $_POST["password"];
$password1 = md5($_POST["password"]);
$key = $_REQUEST['key'];


$que=mysqli_query($conn,"select * from sedna_form where id='$UserId' and alfakey='$key'");
   $count=mysqli_num_rows($que);
   
   if($count>0)
   {
	    
	  $insert=mysqli_query($conn, "update sedna_form set alfakey='', user_pass='$password', password='$password',base_password='$password1' where id='$UserId'") or die(mysqli_error());   
   $message= "Password Changed Successfully";  
	  $type="succ";
SetMessage($message, $type);
$location="../?page=login";
redirect($location);
   
   }else{
	   $message= "Password Can't be Changed !!";  
	  $type="error";
	  
SetMessage($message, $type);

header("location:https://itcareer.app/employer-login/?page=login");
   }


}

?>