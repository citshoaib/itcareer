<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if($_GET['id'])
{
$id=mysql_real_escape_string($_GET['id']);
$delete = "DELETE FROM `contactus_sedna_tbl` WHERE id='$id'";
$que = mysql_query( $delete);
        $message="Contact Deleted successfully";
		$type="succ";
		SetMessage($message,$type);
		$location="../?page=contactus_manage";
		redirect($location);
}

?>
