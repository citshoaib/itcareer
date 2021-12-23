
<?php
require_once('../../config/show_weeks.php');
require_once('../../config/config.php');
require_once('../../config/function.php');


if(isset($_POST['submit'])){
     $name= $_POST['emp_name'];
     $mon = $_POST['month'];
     $yer = $_POST['year'];
	 //echo getWeeks($month,$year);
         $select_week = getWeeks($month,$year);
	                           
  //echo "SELECT * FROM `month_year_weeks_tbl` WHERE month = '$mon' && year = '$yer'";
   $fetch1 = mysql_query("SELECT * FROM `month_year_weeks_tbl` WHERE month = '$mon' && year = '$yer'");
   //$num = mysql_num_rows($fetch1);
   //echo$num;
   $fetch = mysql_fetch_array($fetch1);
  //echo $fetch['month'].$fetch['year'];
   if($fetch['month']=='' && $fetch['year']==''){
	 $exp = explode(",",$select_week);
                          foreach($exp as $value){
                            
                         if(!$value==''){
  //echo "INSERT INTO `month_year_weeks_tbl`(`month`, `year`, `weeks`) VALUES ('$mon','$yer','$value')";
    $que_inseart = mysql_query("INSERT INTO `month_year_weeks_tbl`(`month`, `year`, `weeks`) VALUES ('$mon','$yer','$value')");
    
        $message="Pleas select weeks !!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=salary_slip&month=$mon&year=$yer";
		redirect($location);
						 }
 }
       
   } else{
							
							
							$message="";
							$type="succ";
							SetMessage($message,$type);
							$location="../?page=salary_slip&month=$mon&year=$yer";
							redirect($location);
						 }
}

?>