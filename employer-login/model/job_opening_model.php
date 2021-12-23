

<?php
require_once('../../config/config.php');
require_once('../../config/function.php');

if(isset($_POST['submit'])){
     $job_title= $_POST['job_title'];
     $description = $_POST['description'];
     $skills = $_POST['skills'];
     $opening_date = $_POST['opening_date'];
     $closing_date = $_POST['closing_date'];
     $status = $_POST['status'];
	 
 // echo "INSERT INTO `job_openings_tbl`(`job_title`, `description`, `skills`, `opening_date`, `closing_date`, `status`)
  //VALUES ('$job_title','$description','$skills','$opening_date','$closing_date','$status')";
   $que_inseart = mysql_query("INSERT INTO `job_openings_tbl`(`job_title`, `description`, `skills`, `opening_date`, `closing_date`, `status`)
  VALUES ('$job_title','$description','$skills','$opening_date','$closing_date','$status')");
    
        $message="Successfully  add  job!!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=job_openings";
		redirect($location);
						 }
 
       
   else{
							
							
							$message="Error in add the job!!";
							$type="succ";
							SetMessage($message,$type);
							$location="../?page=job_openings";
							redirect($location);
						 }




?>