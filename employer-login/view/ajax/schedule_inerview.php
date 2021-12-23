<?php
include('../../../config/config.php');
include('../../../config/function.php');

$ApplyJobId= $_POST['ApplyJobId'];
$JobId = $_POST['JobId'];
$InterviewId = $_POST['InterviewId'];
$Status = $_POST['Status'];


if($Status == 'Reject'){
    
    $conn->query("UPDATE interview_schedule SET status='2' where job_position='$JobId' and id='$InterviewId'");
    
    $conn->query("UPDATE apply_jobs SET status='2' where id='$ApplyJobId'");
    
    echo "Interview Rejected";
    
}else{
    
    $conn->query("UPDATE interview_schedule SET status='1' where job_position='$JobId' and id='$InterviewId'");
    
    $conn->query("UPDATE apply_jobs SET status='1' where id='$ApplyJobId' ");
    
    echo "Interview Accepted";
}


?>