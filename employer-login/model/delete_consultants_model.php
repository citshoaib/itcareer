<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if($_GET['id'])
{
$id=mysql_real_escape_string($_GET['id']);
$delete ="update sebna_registration set status='1' where id='$id'";

//$delete = "DELETE FROM `sebna_registration` WHERE id='$id'";
$que = mysql_query( $delete);
        $message="File Delete successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=show_consultants";
		redirect($location);
}

?>
