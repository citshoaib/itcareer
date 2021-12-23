<?php
require_once('../../config/config.php');
require_once('../../config/function.php');

if(isset($_REQUEST)){
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $can_email = $_REQUEST['can_email'];
    $mobile = $_REQUEST['mobile'];
    $country = $_REQUEST['country'];
    $city = $_REQUEST['city'];
    $zipcode = $_REQUEST['zipcode'];
    $address = $_REQUEST['address'];
   


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