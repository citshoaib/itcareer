<?php
error_reporting(0);
@session_start();
ob_start();
include('../config/config.php');
include('../config/zipcode.php');
include('../config/function.php');

//if($_SESSION["user_type"] != 'A'){
//	  header('location:?page=login');
//}
	//$_SESSION["username"];
	//if(isset($_SESSION["username"]))
		// {
if(isset($_REQUEST['page']))
{

   //SetMessage('Successfully Added','succ');
//echo $_REQUEST['page'];
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
//include('maintenance.php');

// Here we will check which index file to be loaded 
ob_end_flush();

?>
