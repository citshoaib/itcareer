<?php
include("../../config/config.php");
include("../../config/function.php");

if($_REQUEST['UserId'])
{
 $UserId = $_REQUEST['UserId'];
$password = $_POST["password"];
$password1 = md5($_POST["password"]);
$key = $_REQUEST['key'];


$que=mysql_query("select * from sedna_user_registration_tbl where id='$UserId' and alfakey='$key'");
   $count=mysql_num_rows($que);
   
   if($count>0)
   {
	    
	  $insert=mysql_query("update sedna_user_registration_tbl set alfakey='', user_pass='$password',base_password='$password1' where id='$UserId'") or die(mysql_error());   
   $message= "Password Changed Successfully";  
	  $type="succ";
SetMessage($message, $type);
$location="../?page=login";
redirect($location);
   
   }else{
	   $message= "Password Not Changed !!";  
	  $type="error";
	  
SetMessage($message, $type);
$location="../?page=login";
redirect($location);
   }

}

?>