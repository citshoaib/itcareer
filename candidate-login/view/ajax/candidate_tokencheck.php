<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');


   $token_value=$_POST['token_value'];
  
  $select=mysql_query("select * from generated_tokens_master where generated_tokens='$token_value' and status='0'");
  
  $count=mysql_num_rows($select);
  
  if($count==1){
    
    echo "1";
    
  }
 


?>