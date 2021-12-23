<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if($_GET['id'])
{
$id=mysql_real_escape_string($_GET['id']);
$delete ="update sedna_operator_request_consultants_reg set delete_status='1' where id='$id'";

//$delete = "DELETE FROM `sebna_registration` WHERE id='$id'";
$que = mysql_query( $delete);
        $message="File Delete successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=show_consultants";
		redirect($location);
}

?>
