<?php
include("../../config/config.php");
include("../../config/function.php");

if(isset($_REQUEST[submit]))
{
    
  
    $id=$_POST['id'];
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
	$confirm_password=md5($_POST['confirm_password']);
	
	$conn->select_db("itcapp_citacademy");
   $sql=  $conn->query("select * from cit_academy_registration where  candidate_password='".$old_pass."' && id='$id' ");

	
		if($sql->num_rows > 0)
		{ 
				
     $inseart =  $conn->query("UPDATE `cit_academy_registration` SET candidate_password='$new_pass', candidate_base_pass='$confirm_password'  WHERE id= $id");
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