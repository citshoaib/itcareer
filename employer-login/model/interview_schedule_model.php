<?php 
@session_start();
include("../../config/config.php");
include("../../config/function.php");
include ('../../phpmailer/function.php');

//echo "<pre>";
//print_r($_POST);
//die;
if(isset($_REQUEST['submit']))
{
    
    $candidate_name = $_REQUEST['candidate_name'];
    $employer_id = $_SESSION['employer_id']; 
    $candidate_id = $_REQUEST['candidate_id'];
    $job_position = $_REQUEST['job_position'];
    $office_phone_no = $_REQUEST['office_phone_no'];
    $office_email_address = $_REQUEST['office_email_address'];
    $interview_date = strtotime($_REQUEST['interview_date']);
    $interview_time = strtotime($_REQUEST['interview_time']);
	
    $presenter = $_REQUEST['presenter'];
    $address = $_REQUEST['address'];
    $comment = $_REQUEST['comment'];
    $entry_date = strtotime(date("d-M-Y"));
    
	
	
	
	$select_1 = mysql_query("select * from interview_schedule where candidate_id ='$candidate_id' and job_position ='$job_position'") or die(mysql_error());
	$count_1 = mysql_num_rows($select_1);
	
	if($count_1=='1'){
		$message= "Already Scheduled.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="../?page=application_list";
								redirect($location);
	}else{
		
		
		$msg_super="Candiate All details like time,place,inetview Time";
	$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$candidate_id'");
	$fetch=mysql_fetch_array($select);
	$reg_id=$fetch['id'];
	
	$email=$fetch['email'];
	$aa = new callfunction();
	$aa->confirm_candiate_email($msg_super,$email);
	
		
		
		$insert_query = mysql_query("INSERT INTO interview_schedule SET
                                employer_id ='$employer_id',
                                candidate_id ='$candidate_id',
                                candidate_name ='$candidate_name',
                                job_position ='$job_position',
                                office_phone_no ='$office_phone_no',
                                office_email_address ='$office_email_address',
                                interview_date ='$interview_date',
                                interview_time ='$interview_time',
                                presenter ='$presenter',
                                address ='$address',
                                comment ='$comment',
                                entry_date ='$entry_date'") or die(mysql_error());
		
		$select_2 = mysql_query("select * from apply_jobs where candidate_id='$candidate_id' and jobid='$job_position'") or die(mysql_error());
		$count_2 = mysql_num_rows($select_2);
		
		$select_3 = mysql_query("SELECT * FROM sedna_operator_request_consultants_reg where id='$candidate_id'") or die(mysql_error());
		$fetch = mysql_fetch_array($select_3);
		$cv = $fetch['cv'];
		
		
		if($count_2=='0'){
			mysql_query("INSERT INTO apply_jobs SET status='3', candidate_id='$candidate_id',jobid='$job_position',comment='$comment',cv='$cv',entry_date='$entry_date'") or die(mysql_error());
		}else{
			mysql_query("UPDATE apply_jobs SET status='3' where candidate_id='$candidate_id' and jobid='$job_position'") or die(mysql_error());
		}
    
    
    
    if($insert_query){
        $message= "Insert Successfully.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="../?page=application_list&page_no=1";
								redirect($location); 
    }
		
	}
    
    
    
}
?>