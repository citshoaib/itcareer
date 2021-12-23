<?php
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];
 //echo "UPDATE sedna_form SET logo='' WHERE id='$id' and logo='$images'";
 $conn->query("UPDATE sedna_form SET logo='' WHERE id='$id'");
?>