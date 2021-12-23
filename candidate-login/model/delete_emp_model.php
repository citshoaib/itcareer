<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if($_GET['id'])
{
$id=mysql_real_escape_string($_GET['id']);
$delete = "DELETE FROM `sedna_user_registration_tbl` WHERE id='$id'";
$que = mysql_query( $delete);
        $message="File Delete successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=show_emp";
		redirect($location);
}

?>
