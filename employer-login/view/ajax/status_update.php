<?php
include('../../../config/config.php');


 $status=$_POST["status"];
   $id=$_POST["new_id"];
   
if($status=="Deactive"){
    
    
   $update_status=$conn->query("UPDATE `sedna_job_form` SET `status`='0' WHERE id='$id'");
    if($update_status){
        
    echo "0";    
    }
    
     
}
if($status=="Active"){
    
   
    $update_status=$conn->query("UPDATE `sedna_job_form` SET `status`='1' WHERE id='$id'");
    if($update_status){
        
        echo "1";
    }
}


?>