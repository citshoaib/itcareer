<?php 
@session_start();
include("../../config/config.php");
include("../../config/function.php");

if(isset($_POST))
{
    $candidate_name = $_POST['candidate_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $country=$_POST['country'];
    $cpassword = $_POST['cpassword'];
    $base_password = md5($_POST['cpassword']);
    $entry_date = strtotime(date("d-m-Y"));
      $token = $_POST['token'];
    
    $real_upload_name='';
    
    mysql_query("INSERT INTO `sedna_operator_request_consultants_reg`(country,date,email,cv,status,delete_status) VALUES ('$country','$entry_date','$email','$real_upload_name','1','0')");

     $reg_id=mysql_insert_id();
    //echo "INSERT INTO candidate_registration
    //                         candidate_name ='$candidate_name',
    //                         email ='$email',
    //                         password ='$cpassword',
    //                         base_password ='$base_password',
    //                         entry_date ='$entry_date'
    //                         ";
     $sql_query = mysql_query("INSERT INTO sebna_profile_tbl SET
                                first_name='$candidate_name',
                             employer_email ='$email',
                             reg_id='$reg_id',
                             reg_date ='$entry_date'
                             ") or die(mysql_error());
                             
                             
       $update_token_id=mysql_query("update generated_tokens_master set candidate_id='$reg_id' where generated_tokens='$token'");                      
    
    
    
    
    $sql_query = mysql_query("INSERT INTO sedna_user_registration_tbl SET
                             name ='$candidate_name',
                             master_id='$reg_id',
                             email ='$email',
                             user_pass ='$cpassword',
                             base_password ='$base_password',
                             status='1',
                             department ='candidate',
                             joining_date ='$entry_date'
                             ") or die(mysql_error());
    
    if($sql_query){
                    $message= "You are registered now please login.";  
                    $type="succ";
                    SetMessage($message, $type);
                    $location="../?page=login";
                    redirect($location);
    }
    
}

?>