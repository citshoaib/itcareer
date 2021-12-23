<?php
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];
$images = $_POST['image'];
 //echo "DELETE FROM sedna_education WHERE id='$uid'";
$conn->query("UPDATE sedna_job_form SET image='' WHERE id='$id' and image='$images'");
?>