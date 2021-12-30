<?php
@session_start();
@ob_start();
error_reporting(E_ALL);

$site_url = "https://itcareer.app/admin";
$site_main_url = "https://itcareer.app/";


// $hostname='localhost';
// $database='itcapp_users';
// $username='itcapp_users';
// $password='$CG,Bc2{d*qB';


$servername = "localhost";
/*$username = "itcapp_webuser";
$password = "webuser@2021";*/
$username = "root";
$password = "";
$dbname = "itcapp_website";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}

 $today_date_strtotime = strtotime(date('Y-m-d')); 

// DbConnect($hostname,$username,$password,$database);
// function DbConnect($Server,$UserName,$Password,$DataBase)
// {
// $conn = mysqli_connect($Server,$UserName,$Password) or die ("Couldn't connect to server.");
// return $db = mysqli_select_db($conn,$DataBase) or die("Couldn't select database.");  
// }


?>