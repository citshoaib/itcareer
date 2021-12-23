<?php
include('../../../config/config.php');

$email = $_REQUEST['email'];

$query = mysql_query("select * from sedna_operator_request_consultants_reg where email LIKE '%$email%' && status='1' && delete_status='0' order by `id` asc") or die(mysql_error());
    
    $count = mysql_numrows($query);
    
    if($count >0){
    
    echo '<ul>';
	 while($result=mysql_fetch_array($query))
	 {
	      
                        echo '<li onClick="fillemail(\''.$result['email'].'\');">'.$result['email'].'</li>';
                 }
         	 
	 
   echo '</ul>';
    }

?>