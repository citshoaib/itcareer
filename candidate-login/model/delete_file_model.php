<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if($_GET['id'])
{
$id=mysql_real_escape_string($_GET['id']);
$delete = "DELETE FROM `emp_week_date_rang` WHERE id='$id'";
$que = mysql_query( $delete);
        $message="File Delete successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=manage_time_sheet";
		redirect($location);
}

?>
