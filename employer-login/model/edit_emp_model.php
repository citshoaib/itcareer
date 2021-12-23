<?php
          require_once('../../config/config.php');
		  require_once('../../config/function.php');
      if(isset($_POST['submit'])){
		  $id = $_POST['id'];
    $name = $_POST['name'];
    
	$contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $user_pass = $_POST['user_pass'];
    $department = $_POST['department'];
	$TL_id=$_POST['TL_id'];
    $joining_date= $_POST['joining_date'];
   

$inseart = mysql_query("UPDATE `sedna_user_registration_tbl` SET name='$name',contact='$contact',email='$email',address='$address',
department='$department',TL_id='$TL_id', user_pass='$user_pass',joining_date='$joining_date' WHERE id= $id");
    
	  if($inseart){
        
	    $message="Update successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=show_emp";
		redirect($location);
     // }
	  }else {
        echo"isnot ok";
		
		  
		  } 
   }



?>