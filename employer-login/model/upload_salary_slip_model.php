<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if(isset($_POST['save'])){
    
     
     $emp_name= $_POST['emp_name'];
	 $year= $_POST['year'];
	 $month= $_POST['month'];
     $select_week = $_POST['select_week'];
	 
		  $allowedExts = array("pdf","xlsx","csv","xls","doc"); 
		  $extension = explode(".", $_FILES["select_week"]["name"]);
		  $exte = end($extension);
		  $file = $_FILES["time_sheet"]["name"];
		  $ext = pathinfo($file, PATHINFO_EXTENSION);
		    if ($_FILES["time_sheet"]["name"]!==''&& in_array($ext, $allowedExts))
		  {
			   
	 
                             $file_name=time().$_FILES["time_sheet"]["name"];
                             $target_dir = "../../upload/";
                             $target_file = $target_dir . $file_name;
                             $tmp_path1 =$_FILES["time_sheet"]["tmp_name"];
                           //move_uploaded_file(, $target_file);

                               move_uploaded_file($tmp_path1,$target_file);
	  
                       //echo "SELECT * FROM `salary_slip_emp_tbl` WHERE emp_name = $emp_name AND month = '$month' AND year = '$year' AND week = '$select_week'";
  
   $fetch1 = mysql_query("SELECT * FROM `salary_slip_emp_tbl` WHERE emp_name = '$emp_name' AND month = '$month' AND year = '$year' AND week = '$select_week'");
   
   $fetch = mysql_fetch_array($fetch1);
   if(!$fetch['emp_name']==$emp_name AND !$fetch['month']==$month AND !$fetch['year']==$year AND !$fetch['week']==$select_week){
   //echo"INSERT INTO `salary_slip_emp_tbl`(`emp_name`, `year`, `month`, `week`, `salary_slip_file`) VALUES ('$emp_name','$year','$month','$week','$file_name')";
   
   $que_inseart = mysql_query("INSERT INTO `salary_slip_emp_tbl`(`emp_name`, `year`, `month`, `week`, `salary_slip_file`) VALUES ('$emp_name','$year','$month','$select_week','$file_name')");
        $message="File upload succsessfully!!!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=salary_slip";
	    redirect($location);
   }else{
	 
	    $message="Already exists sheets in weeks, year or month!!!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=salary_slip";
	    redirect($location);
	 
   }
 }
        
    else{
        $message="Error File Uploading!!!!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=salary_slip";
		redirect($location);
    
   }
}

?>
