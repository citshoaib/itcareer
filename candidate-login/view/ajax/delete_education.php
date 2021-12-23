<?php
include('../../../config/config.php');
include('../../../config/function.php');

$uid=$_REQUEST['uid'];
 //echo "DELETE FROM sedna_education WHERE id='$uid'";
$conn->query("DELETE FROM sedna_education WHERE id='$uid'");
?>