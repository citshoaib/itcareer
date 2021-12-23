<?php
include("../../config/config.php");
include("../../config/function.php");

$_SESSION['employer_id'];
 $emp_id = $_SESSION['employer_id'];
 
 
if($_REQUEST['submit'])
{
   $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $id=$_POST['hiddenpass'];
   //$cnfrm_pass = $_POST['cnfrm_pass'];

$sql_change_pass = $conn->query("SELECT * FROM sedna_form where id='$emp_id'");
$fetch_detail = $sql_change_pass->fetch_array();

  $password = $fetch_detail['user_pass'];

if($old_pass == $password )

{
      $update_pass = "update sedna_form set user_pass='$new_pass' where id='$emp_id' ";
  
  $set_msg = $conn->query($update_pass);
  
      if($set_msg)
      {
       
          $message= "Password Updated Successfully.....!";  
          $type="succ";
          SetMessage($message, $type);
          $location="../?page=view_profile_admin";
          redirect($location); 
      }
      
    }
    else
    {
       
          $location="../?page=change_pass";
          redirect($location); 
    }
    
}




?>
