<?php
include('../../config/config.php');
include('../../config/function.php');
include ('../../phpmailer/function.php');


if(isset($_REQUEST['apply'])){

//echo "<pre>";
//print_r($_POST);

$upload_new = $_POST['upload_new'];    
$candidate_id = $_REQUEST['candidate_id'];
$id = $_REQUEST['id'];
$jobid = $_REQUEST['jobid'];
$uploded_cv = $_REQUEST['uploded_cv'];
$comment = $_REQUEST['comment'];
$date_for_upload_name=strtotime(date("Y/m/d H:i:s"));

		
		



$select = mysql_query("SELECT * FROM apply_jobs where candidate_id='$candidate_id' and jobid='$jobid'") or die(mysql_error());
$count = mysql_num_rows($select);

if($count > 0){
$message= "Already applied.....!";  
$type="succ";
SetMessage($message, $type);  
$location="../?page=applyjobs&id=$jobid";
redirect($location);  

}else{
	
	
	$aa = new callfunction();
	
	$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$candidate_id'");
		$fetch=mysql_fetch_array($select);
		$reg_id=$fetch['id'];
		
		$email=$fetch['email'];
		
		$profile_select = mysql_query("SELECT * FROM sebna_profile_tbl where reg_id='$candidate_id'") or die(mysql_error());
		$fetch_profile = mysql_fetch_array($profile_select);
		$first_name = $fetch_profile['first_name'];
		$middel_name = $fetch_profile['middel_name'];
		$last_name = $fetch_profile['last_name'];
		$phone_no = $fetch_profile['phone_no'];
		$employer_email = $fetch_profile['employer_email'];
		$city = $fetch_profile['city'];
		
		if($middel_name!=''){
			$full_name = ucwords($first_name).' '.ucwords($middel_name).' '.ucwords($last_name);
		}else{
			$full_name = ucwords($first_name).' '.ucwords($last_name);
		}
		
		$select_job_data = mysql_query("SELECT * FROM sedna_job_form where id='$jobid'") or die(mysql_error());
		$fetch_job_data = mysql_fetch_array($select_job_data);
		$employer_id = $fetch_job_data['employer_id'];
		$job_title = $fetch_job_data['job_title'];
		
		$msg_super .="Dear $full_name,<br><br>Thank you for applying. Your job application successfully accepted for following profile";
		$msg_super .="<br><br>";
		$msg_super .="<b>Job Title:</b>&nbsp; ".ucwords($fetch_job_data['job_title'])."<br>";
		$msg_super .="<b>Salary:</b>&nbsp; ".$fetch_job_data['salary_from']." - ".$fetch_job_data['salary_to']."<br>";
		$msg_super .="<b>Job Type:</b>&nbsp; ".ucwords(str_replace('_',' ',$fetch_job_data['job_type']))."<br>";
		$msg_super .="<b>Location:</b>&nbsp; ".ucwords($fetch_job_data['location'])."<br>";
		$msg_super .="<b>Job Description:</b>&nbsp; ".$fetch_job_data['description']."<br>";
		$msg_super .="<br><br><br>";
		$msg_super .='With kind regards.<br><br><img src="http://develop-a.cheshtainfotech.com/jobportal/wp-content/themes/jobportal/images/logo.png" style="background-color: rgb(0, 0, 0);">';
		
		//echo $msg_super;
		//die;
		
		
		
		
		
		$aa->mail_to_candidate_for_job_apply($msg_super,$email,$job_title);
		//$aa->candidate_successfull($msg_super,$email);
		
		$employer_select = mysql_query("SELECT * FROM sedna_form where id='$employer_id'") or die(mysql_error());
		$fetch_employer_data = mysql_fetch_array($employer_select);
		$employer_email = $fetch_employer_data['email'];
		$employer = $fetch_employer_data['emp_name'];
		$subject ="New job application recived by $full_name";
		$msg .="Dear $employer,<br><br>";
		$msg .="Please check the details are give below<br>";
		$msg .='<b>Candidate Name:</b>&nbsp;'.$full_name.'<br>';
		$msg .='<b>Number:</b>&nbsp;'.$phone_no.'<br>';
		$msg .='<b>Email:</b>&nbsp;'.$employer_email.'<br>';
		$msg .='<b>City:</b>&nbsp;'.$city.'<br>';
		$msg .="<b>Comment:</b>nbsp;$comment<br>";
		$msg .="<br><br><br>";
		$msg .='With kind regards.<br><br><img src="http://develop-a.cheshtainfotech.com/jobportal/wp-content/themes/jobportal/images/logo.png" style="background-color: rgb(0, 0, 0);">';
		
		$aa->mail_to_employer_for_job_apply($msg,$employer_email,$subject);
		
		//$msg_super="Candidate Info";
		//$job=$_POST['jobid'];
		//$fetch_emp_id=mysql_query("SELECT employer_id FROM `sedna_job_form` WHERE id=$job");
		//$emp_row=mysql_fetch_array($fetch_emp_id);
		//$emp_id=$emp_row['employer_id'];
		//$emp_email=mysql_fetch_array(mysql_query("SELECT email  FROM `sedna_form` WHERE `id` ='$emp_id'"));
		//$email_emp=$emp_email['email'];
		//
		//$aa->employer_info_after_candidate_apply($msg_super,$email_emp);	
		// echo "sdgh";

if($upload_new!='no'){

$random_id= rand();
$ext=explode(".",$_FILES["cv"]["name"]);
$handle =$_FILES["cv"]["tmp_name"];
//print_r($ext[1]); 
$real_upload_name_move="../../upload_doc/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
$real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
// $inputFileName = $real_upload_name;
$select_upload_temp=mysql_query("select * from sedna_operator_request_consultants_reg where id='$candidate_id'") or die(mysql_error());
echo mysql_num_rows($select_upload_temp);
if(mysql_num_rows($select_upload_temp)>0)
{



//			echo "INSERT INTO apply_jobs  SET
//                   candidate_id = '$candidate_id',
//                   jobid ='$jobid',
//                   comment ='$comment',
//                   cv = '$real_upload_name',
//                   entry_date ='$date_for_upload_name'";
//				   
//				   die;

mysql_query("update sedna_operator_request_consultants_reg set cv='$real_upload_name' where id='$candidate_id'") or die(mysql_error());  



mysql_query("INSERT INTO apply_jobs  SET
candidate_id = '$candidate_id',
jobid ='$jobid',
comment ='$comment',
cv = '$real_upload_name',
entry_date ='$date_for_upload_name'") or die(mysql_error());

$message= "Applyed Successfully.....!";  
$type="succ";
SetMessage($message, $type);  

$location="../?page=application_list";
redirect($location);  

}


}else{
//        echo "INSERT INTO apply_jobs  SET
//                   candidate_id = '$candidate_id',
//                   jobid ='$jobid',
//                   comment ='$comment',
//                   cv = '$uploded_cv',
//                   entry_date ='$date_for_upload_name'";
//		
//		 die;
mysql_query("INSERT INTO apply_jobs  SET
candidate_id = '$candidate_id',
jobid ='$jobid',
comment ='$comment',
cv = '$uploded_cv',
entry_date ='$date_for_upload_name'") or die(mysql_error());

$message= "Applied Successfully.....!";  
$type="succ";
SetMessage($message, $type);  

$location="../?page=application_list";
redirect($location);

}

}




}

?>