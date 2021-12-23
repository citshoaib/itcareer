<?php
require_once('../../config/config.php');
require_once('../../config/function.php');

if(isset($_REQUEST)){
   
    //echo "<pre>";
    //print_r($_REQUEST);
    //echo "</pre>";
    
    $emp_name = $_REQUEST['emp_name'];
    $email = $_REQUEST['email'];
    $cpassword = $_REQUEST['cpassword'];
    $base_pass = md5($_REQUEST['cpassword']);
    $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
    
     $login_type = 'Website';
    
   
    $sql = mysql_query("INSERT INTO sedna_form  SET
                emp_name ='$emp_name',
                email ='$email',
                user_pass ='$cpassword',
                base_password ='$base_pass',
                department = 'employer',
                login_type='".$login_type."',
                joining_date ='$date_for_upload_name'");
    //echo "hello";
    if($sql)
          {
             
header("location: ../?page=login");
          }
    
}

?>