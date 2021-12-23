<?php
require_once('../../config/config.php');
require_once('../../config/function.php');

if(isset($_REQUEST)){
    $company_name = $_REQUEST['company_name'];
    $emp_name = $_REQUEST['emp_name'];
    $emp_email = $_REQUEST['emp_email'];
    $city = $_REQUEST['city'];
    $password = $_REQUEST['password'];
    $con_password = $_REQUEST['con_password'];
    $country = $_REQUEST['country'];
   


    $sql = mysqli_query($conn, "INSERT INTO sedna_form  SET
                emp_name ='$emp_name',
                emp_company ='$company_name',
                email ='$emp_email',
                user_pass ='$password',
                cpassword ='$con_password',
                country ='$country',
                location ='$city'");
    if($sql){
        header("location:https://itcareer.app/employer-login/");
        }
} ?>