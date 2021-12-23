<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];

$query_1 = $conn->query("SELECT * FROM zip_code where zip_code='$id' ");
$fetch_zip_data = $query_1->fetch_array();

  

  echo  $county = $fetch_zip_data['country'].'#';
  echo $state = $fetch_zip_data['state_name'].'#';
  echo  $city = $fetch_zip_data['city'];

  
 
 ?>
 
 
 

 <?php


?>