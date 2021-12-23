<?php
          require_once('../../config/config.php');
		  require_once('../../config/function.php');
      if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    
	$contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $user_pass = $_POST['randomfield'];
   $department = $_POST['department'];
   $TL_id=$_POST['TL_id'];
    $joining_date= $_POST['joining_date'];
    
 
$inseart = mysql_query("INSERT INTO `sedna_user_registration_tbl`(`name`, `contact`, `email`, `address`, `department`, `TL_id`, `user_pass`, `joining_date`)
    VALUES ('$name','$contact','$email','$address','$department','$TL_id','$user_pass','$joining_date')");
      if($inseart){
        
	    $message="Ad add Delete successfully";
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