<?php

@session_start();
//unset($_SESSION["admin_id"]);

unset($_SESSION['user_type']);
unset($_SESSION['department']);
unset($_SESSION['employer_login']);
unset($_SESSION['employer_email']);
unset($_SESSION['employer_id']);
unset($_SESSION['emp_name']);


//logout.php

include('gconfig.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();


//session_destroy();
$message= "Logout successfull..!";  
$type="succ";
SetMessage($message, $type);
$location="?page=login";
redirect($location);

?>

