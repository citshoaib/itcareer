<?php
include('../../../config/config.php');

$email = $_REQUEST['email'];

$query = $conn->query("select * from sedna_operator_request_consultants_reg where email LIKE '%$email%' && status='1' && delete_status='0' order by `id` asc");
    
    $count = $query->num_rows();
    
    if($count >0){
    
    echo '<ul>';
	 while($result=$query->fetch_array())
	 {
	      
                        echo '<li onClick="fillemail(\''.$result['email'].'\');">'.$result['email'].'</li>';
                 }
         	 
	 
   echo '</ul>';
    }

?>