<?php
include('../../../config/config.php');
include('../../../config/function.php');

$ApplyJobId= $_POST['ApplyJobId'];
$JobId = $_POST['JobId'];
$InterviewId = $_POST['InterviewId'];
$Status = $_POST['Status'];


if($Status == 'Reject'){
    
    mysql_query("UPDATE interview_schedule SET status='2' where job_position='$JobId' and id='$InterviewId'") or die(mysql_error());
    
    mysql_query("UPDATE apply_jobs SET status='2' where id='$ApplyJobId'") or die(mysql_error());
    
    echo "Interview Rejected";
    
}else{
    
    mysql_query("UPDATE interview_schedule SET status='1' where job_position='$JobId' and id='$InterviewId'") or die(mysql_error());
    
    mysql_query("UPDATE apply_jobs SET status='1' where id='$ApplyJobId' ") or die(mysql_error());
    
    echo "Interview Accepted";
}


?>