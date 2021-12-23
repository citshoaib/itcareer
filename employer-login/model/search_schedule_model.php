<?php 
@session_start();
include("../../config/config.php");
include("../../config/function.php");
include ('../../phpmailer/function.php');



if(isset($_REQUEST['submit']))
{
    $session_email=$_REQUEST['session_email'];
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
    
	
	$interview_date=date('"d-m-Y"',$interview_date);
		$interview_time=date('H:i:s',$interview_time);
	$result_job=mysql_query("SELECT * FROM `sedna_job_form` where id=$job_position");
	$row_job=mysql_fetch_array($result_job);
	$result_email=mysql_query("SELECT * FROM `sedna_form` where email='$session_email'");
	$row_email=mysql_fetch_array($result_email);
	 $experience_id=$row_job['experience_level'];
	$result_experience_level=mysql_query("SELECT experience_level FROM `experience_level_master` where id=$experience_id");
	$row_experience=mysql_fetch_array($result_experience_level);
 
 
  $msg_super="<html>
<head>
<title>Invitation to Interview</title>
</head>
<body>
<table border='0' align='center' width='600' cellspacing='1' cellpadding='5'>
<tbody>
<tr><td style='border:1px solid #eeeeee;padding:0' bgcolor='#fafafa'>
<table width='100%'>
<tbody>
<tr><td style='font-family:Arial;font-size:12px;color:#666;padding:3px 8px 0 0' width='10%' valign='top'><img src='$site_main_url/upload_img/".$row_email['logo']."' class='CToWUd' width='100' height='100'></td><td style='font-family:Arial;font-size:12px;color:#333' width='40%' valign='top'><strong style='font-size:18px'>".$row_email['emp_name']."</strong><br><br><span>Recruitment Consultant</span>
<small style='color:#04a414;font-size:12px'></small></span><br></td>
<td style='font-family:Arial;font-size:12px' width='40%' valign='top'><p style='padding-bottom:5px;line-height:16px;margin-top:5px;margin-bottom:10px;font-size:12px'></p></td></tr>
</tbody>
</table> </td></tr>
<tr style='background:#fff'><td>
<table><tbody><tr><td style='word-break:break-word' bgcolor='#FFFFFF' valign='top'>
<font color='#000000' face='Arial, Helvetica, sans-serif'><span style='font-size:14px'>
<div style='margin:0px;padding:3px 0px'>
<strong>Experience Level for the Job:</strong>&nbsp;".$row_experience['experience_level']."</div>
<div style='margin:0px;padding:3px 0px'><strong>Salary of the Job:</strong>&nbsp;".$row_job['salary_from']." - ".$row_job['salary_to']."</div>
<div style='word-break:break-word'>  </div><div style='margin:0px;padding:3px 0px;word-break:break-word'><strong>Job Location:</strong>&nbsp;".$row_job['location']."</div>
</span>   <br>  <br>
   &nbsp;&nbsp;
<a class='m_-1660751917678271980mainPrevColor' title='Reply with additional details sought by the recruiter' href='mailto:".$row_email['email']."' style='background:#3c98ed;font-size:17px;font-weight:bold;color:#fff;padding:7px 10px;font-family:Arial,Helvetica,sans-serif;text-decoration:none' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=en&amp;q=http://my.naukri.com/AL/ResdexRMJMail/alid/70bdcb2fc0a05a0aac58a6ba3021c75195443830df4b3855e293dde8a84793b3ff003c62a2e1a3649a79cdf0e65ea9310d7b52c912a1e953/redirectParam/replyView?applytype%3Dsingle%26ApplyMode%3D1%26src%3Drmj%2520%2520%26reqId%3D%26messageId%3D2de5108bb3145b330c1174bfed33beb25b5f0c524a11091910421909035d131b48584d526102091b580f144251531d421e054e085642130c14010245515f0b53431b0f6&amp;source=gmail&amp;ust=1504092749536000&amp;usg=AFQjCNGkNKJprio-QA02_2AEcCZkOWiXPg'>Reply</a>
<p style='clear:both;font-size:12px;padding:0 0 10px 0'><br>
<strong>Dear $candidate_name,</strong>
</p>
<blockquote style='margin:0px;padding:10px 0px;font-size:12px;font-family:Arial,Helvetica,sans-serif;word-break:break-word'> Job Description.
<div style='margin-bottom:7px;margin-left:0;margin-right:0;margin-top:0'><br></div><div style='margin-bottom:7px;margin-left:0;margin-right:0;margin-top:0'>".$row_job['description']."
</div></blockquote><br>
<blockquote style='margin:0px;padding:10px 0px;font-size:12px;font-weight:normal;font-family:Arial,Helvetica,sans-serif;word-break:break-word'>".$row_email['emp_name']."<div style='margin-bottom:7px;margin-left:0;margin-right:0;margin-top:0'><a href='mailto:".$row_email['email']."' target='_blank'>".$row_email['email']."</a></div></blockquote>
<div style='clear:both'></div></font></td></tr></tbody></table></td></tr> 
</tbody>
</table>

</body>
</html>";
					
	
	
	$select_1 = mysql_query("select * from interview_schedule where candidate_id ='$candidate_id' and job_position ='$job_position'") or die(mysql_error());
	$count_1 = mysql_num_rows($select_1);
	
	if($count_1=='1'){
		$message= "Already Scheduled.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="../?page=application_list";
								redirect($location);
	}else{
		
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
								status='3',
                                entry_date ='$entry_date'") or die(mysql_error());
		
		//$select_2 = mysql_query("select * from apply_jobs where candidate_id='$candidate_id' and jobid='$job_position'") or die(mysql_error());
		//$count_2 = mysql_num_rows($select_2);
		//
		//$select_3 = mysql_query("SELECT * FROM sedna_operator_request_consultants_reg where id='$candidate_id'") or die(mysql_error());
		//$fetch = mysql_fetch_array($select_3);
		//$cv = $fetch['cv'];
		//
		//
		//if($count_2=='0'){
		//	mysql_query("INSERT INTO apply_jobs SET status='3', candidate_id='$candidate_id',jobid='$job_position',comment='$comment',cv='$cv',entry_date='$entry_date'") or die(mysql_error());
		//}else{
		//	mysql_query("UPDATE apply_jobs SET status='3' where candidate_id='$candidate_id' and jobid='$job_position'") or die(mysql_error());
		//}
    
    
    
    if($insert_query){
		
		$interview_date=date('"d-m-Y"',$interview_date);
		$interview_time=date('H:i:s',$interview_time);
		
					
			
	$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$candidate_id'");
	$fetch=mysql_fetch_array($select);
	$reg_id=$fetch['id'];
	
	$email=$fetch['email'];
	$aa = new callfunction();
	$aa->confirm_candiate_email($msg_super,$email);
	
        $message= "Insert Successfully.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="../?page=application_list&page_no=1";
								redirect($location); 
    }
		
	}
    
    
    
}
?>