<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];

$query_1 = mysql_query("SELECT * FROM zip_code where zip_code='$id' ") or die(mysql_error());
$fetch_zip_data = mysql_fetch_array($query_1);

  

  echo  $county = $fetch_zip_data['country'].'#';
  echo $state = $fetch_zip_data['state_name'].'#';
  echo  $city = $fetch_zip_data['city'];

  
 
 ?>
 
 
 

 <?php


?>