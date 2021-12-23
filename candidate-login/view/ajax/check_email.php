<?php
include("../../../config/config.php");
include("../../../config/function.php");

 $email= $_REQUEST['email'];

$select_email=mysql_query("select * from sedna_operator_request_consultants_reg where email='$email'");
if($row=mysql_num_rows($select_email)!=0)
{
    echo "Email Allradeay exist";
}

?>