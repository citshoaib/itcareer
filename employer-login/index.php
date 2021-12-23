<?php
@session_start();
ob_start();
error_reporting(E_ALL);
include('../config/config.php');

include('../config/zipcode.php');
include('../config/function.php');


if(isset($_REQUEST['page']))
{


	 $page=$_REQUEST['page'];
	$include='view/'.$page.'.php';
	if(!is_file($include))
	{
		$include='view/401.php';	
	}
}
else 
	{  
		$include='view/login.php';
	}
	
include('template/index.php');

ob_end_flush();
?>
