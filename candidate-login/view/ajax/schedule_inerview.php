<?php
include('../../../config/config.php');
include('../../../config/function.php');

$JobPosition =$_POST['JobPosition'];
$EmployerId= $_POST['EmployerId'];
$InterviewId = $_POST['InterviewId'];
$CandidateId = $_POST['CandidateId'];
$Status = $_POST['Status'];


if($Status == 'Reject'){
    
    mysql_query("UPDATE interview_schedule SET status='2' where job_position='$JobPosition' and id='$InterviewId' and employer_id='$EmployerId' and candidate_id='$CandidateId' ") or die(mysql_error());
    echo "Interview Rejected";
     
}

if($Status == 'Accept'){
    
    mysql_query("UPDATE interview_schedule SET status='1' where job_position='$JobPosition' and id='$InterviewId' and employer_id='$EmployerId' and candidate_id='$CandidateId' ") or die(mysql_error());
    echo "Interview Accepted";
    
}

?>