<?php

require_once('../../config/config.php');
require_once('../../config/function.php');

           
            if(isset($_POST['submit'])){
                
                          $id = $_POST['id'];
                    $job_title= $_POST['job_title'];
                  $description= $_POST['description'];
                       $skills= $_POST['skills'];
                 $opening_date= $_POST['opening_date'];
                 $closing_date= $_POST['closing_date'];
                 
                 
//echo"UPDATE `job_openings_tbl` SET job_title='$job_title',description='$description',skills='$skills',opening_date='$opening_date',closing_date='$closing_date' WHERE id='$id'";     
              
                $que_inseart = mysql_query("UPDATE `job_openings_tbl` SET job_title='$job_title',description='$description',skills='$skills',opening_date='$opening_date',closing_date='$closing_date' WHERE id='$id'");
                
        $message="Successfully edited job !!";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=edit_opening_job";
		redirect($location);
				
}

?>