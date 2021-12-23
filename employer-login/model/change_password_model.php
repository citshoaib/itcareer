<?php
include("../../config/config.php");
include("../../config/function.php");

if(isset($_REQUEST[submit]))
{
    
//    echo "<pre>";
//	print_r($_POST);
//	
//	die;
    $id=$_POST['id'];
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
	$confirm_password=md5($_POST['confirm_password']);
   $sql= mysql_query("select * from sedna_user_registration_tbl where  user_pass='".$old_pass."' && id='$id' ") or die(mysql_error());

	
		if(mysql_num_rows($sql)> 0)
		{ 
				
     $inseart = mysql_query("UPDATE `sedna_user_registration_tbl` SET user_pass='$new_pass', base_password='$confirm_password'  WHERE id= $id") or die(mysql_error());
      if($inseart){
        
	    $message="Password updated successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=view_profile_admin";
		redirect($location);
  
	  }      
    
        }
        else
        {
            $message="Old password is incorrect!!!!";
		  $type="succ";
		  SetMessage($message,$type);
		  $location="../?page=view_profile_admin";
		  redirect($location);
            
        }
    
}
?>