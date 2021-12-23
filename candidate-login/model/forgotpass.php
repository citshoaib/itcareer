<?php
include('../../config/config.php');
include('../../config/function.php');
include('../../phpmailer/function.php');

if(isset($_POST['submit']))
{ 
 
  
  $email=$_POST['email'];
  
  $this_object = new callfunction();
 $query_rec_log = mysql_query("select * from sedna_user_registration_tbl where email='".$email."'") or die(mysql_error());
   $totalRows_rec_log = mysql_num_rows($query_rec_log);
  if($totalRows_rec_log>0){
 $row=mysql_fetch_array($query_rec_log);
 $password=$row["base_password"];
 
   $simple_registration_id=base64_encode($row["id"]) ;

$chars = "abcdefghijklmnopqrstuvwxyz_0123456789";
$charArray = str_split($chars);
for($i = 0; $i < 4; $i++){
$randItem = array_rand($charArray);
$key .= "".$charArray[$randItem];
}  
   
  mysql_query("UPDATE sedna_user_registration_tbl SET
			alfakey='$key' WHERE id='".$row["id"]."'");
   
   
$msg.="Someone has requested a link to change your password for Sedna CMS admin panel, and you can do this through the link below. <br>
http://develop-a.cheshtainfotech.com/jobportal/cdms/candidate-login/?page=recovery_password&UserId=$simple_registration_id&key=$key";

$msg.="<br><br><br>From: Sedna";
$this_object->send_password($msg,$email);

}
else
{
  $message= "Sorry email not found..!"; 
  $type="error1";
	  
  SetMessage($message, $type);
  
 $location="../?page=forget";
  redirect($location); 

}
 
}
?>