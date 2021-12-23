<?php
include('../../../config/config.php');
include('../../../config/function.php');
$uid=$_REQUEST['uid'];


 //echo "DELETE FROM sebna_work_experience WHERE id='$uid'";
$conn->query("DELETE FROM sebna_work_experience WHERE id='$uid'");
?>