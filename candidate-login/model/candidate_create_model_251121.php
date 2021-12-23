<?php
include('../../config/config.php');
include('../../config/function.php');
require_once('../phpmailer/function.php');

 if(isset($_REQUEST["submit"]))
{  
   

$skill_pro_resume=$_POST['skill_name'][0];
    
	 $reg_date =strtotime(date("d-m-Y"));
	 
	  $reg_id=$_POST['reg_id'];
	 $remark=$_POST['remark']; 
 $aadhar_num=$_POST['aadhar_num'];
 $ssn_num=$_POST['ssn_num'];
 $first_name=$_POST['first_name'];
 $middel_name=$_POST['middel_name'];
 $last_name=$_POST['last_name'];
 
    $searchable= $_POST['searchable'];
    $relocate= $_POST['relocate'];
	$security= $_POST['security'];
	 $position=$_POST['position'];
	 
   $travel=$_POST['travel'];
	$experience= $_POST['experience'];
	 
   $salary= $_POST['salary'];
   $hourly_rate= $_POST['hourly_rate'];
 $city=$_POST['city'];
 $Country=$_POST['country'];
  $state=$_POST['state'];
 $postal_code=$_POST['postal_code'];
 $employer_name=$_POST['employer_name'];
	$employer_company=$_POST['employer_company'];
	$employer_email=$_POST['employer_email'];
	$employer_number=$_POST['employer_number'];

 $you_are=$_POST['you_are'];
 
   $education_type_arr= $_POST['education_type'];
   $institution_arr= $_POST['institution'];
   $edu_city_arr= $_POST['edu_city'];
   $edu_country_arr= $_POST['edu_country'];
   $edu_year_arr= $_POST['edu_year'];
 
 //print_r($_POST['employment_type']);
  $employment_type=implode(',',$_POST['employment_type']);
 
 
 $work_authorization=$_POST['work_authorization'];
  count($_POST['job_title']);
    $job_title_arr=$_POST['job_title'];
 $job_title=implode(',',$_POST['job_title']);
 $comapnay_arr=$_POST['comapnay'];
 $start_date_arr=$_POST['start_date'];
  $end_date_arr=$_POST['end_date'];
  $email=$_POST['can_email'];
  $contact=$_POST['mobile'];
  //print_r($end_date_arr);
   $current_arr=$_POST['current'];
   $language=implode(",",$_POST['language']);
   //print_r($current_arr);
 $comapnay=implode(',',$_POST['comapnay']);
 $start_date=implode(',',$_POST['start_date']);
 $end_date=implode(',',$_POST['end_date']);
 $current_date=implode(',',$_POST['current']);
  count($_POST['skill_name']);
 $skill_name=implode(',',$_POST['skill_name']);
 $skill_name_arr=$_POST['skill_name'];
 
	$preferred_location=$_POST['preferred_location'];
 $year_exp_arr=$_POST['year_exp'];
 $last_used_arr=$_POST['last_used'];
 $year_exp=implode(',',$_POST['year_exp']);
 $last_used=implode(',',$_POST['last_used']);
	 
	 
	  function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
 
 
 
 $password2 = generate_password(6); // 6 character long password
 $md5_pass=md5($password2);
 
	
// 	if(!empty($_FILES['cv']["name"])){
// 		 $random_id= rand();
// 		$ext=explode(".",$_FILES["cv"]["name"]);
// 		$handle =$_FILES["cv"]["tmp_name"];
// 					//print_r($ext[1]); 
// 				 $real_upload_name_move="../../candidate-login/upload_doc/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
// 				 $real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
//                 move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
		
		
		 
// 	 }

  if($_FILES['cv']['name']){

     $name= $_FILES["cv"]["name"];
       $type= $_FILES["cv"]["type"];
        $size= $_FILES["cv"]["size"];
         $tmp= $_FILES["cv"]["tmp_name"];
          //$r=explode(".",$name);
          
         
            $resume_new=time()."-".$name;
        
                 $upload=move_uploaded_file($tmp,"../upload_doc/".$resume_new);

}


   	  	  	
   	  	  	   $chars_1 = "0123456789";
    $charArray = str_split($chars_1);
    for($i = 0; $i < 6; $i++){
        $randItem = array_rand($charArray);
        $candidates_userid .= "".$charArray[$randItem];
    }
    
    $chars_2 = "abc0123456789";
    $charArray = str_split($chars_2);
    for($i = 0; $i < 6; $i++){
        $randItem = array_rand($charArray);
        $key_pass .= "".$charArray[$randItem];
    }
    
    $base_pass = md5($key_pass);
    
    $entry_date = strtotime(date("d-m-Y"));
   	  	 
$conn->select_db("itcapp_website");  

$insert = $conn->query("INSERT INTO `sedna_operator_request_consultants_reg`(date,email,country,cv,status,delete_status,can_user_id,operator_id) VALUES ('$reg_date','$email','$Country','$resume_new','1','0','$candidates_userid','')");
		 
		
		 $reg_id=$conn->insert_id;
   
   
 
  if($_FILES['dp']['name']){

     $name= $_FILES["dp"]["name"];
       $type= $_FILES["dp"]["type"];
        $size= $_FILES["dp"]["size"];
         $tmp= $_FILES["dp"]["tmp_name"];
          //$r=explode(".",$name);
          
         
            $new=time()."-".$name;
        
                 $upload=move_uploaded_file($tmp,"../../candidate-login/upload_doc/profile_picture/".$new);

}
 
 
 
  if(count($_POST['job_title'])>0)
  {
  for($i=0;$i<count($_POST['job_title']); $i++)
    {
        if($end_date_arr[$i]!='')
        {
    $conn->query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','')");    
        }
        else
        {
        $conn->query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','$current_arr')");    
           
            
        }
        } 
  }
  
  if(count($_POST['skill_name'])>0)
  {
  for($j=0;$j<count($_POST['skill_name']); $j++)
    {
         $conn->query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used)
                values('$reg_id','$skill_name_arr[$j]','$year_exp_arr[$j]','$last_used_arr[$j]')");    
       
        } 
  }
        
$insert = $conn->query("insert into sebna_profile_tbl (ssn_num,aadhar_num,source,address,profile_image,language_know,reg_id,first_name,middel_name,last_name,emp_emails,city,contact,Country,state,postal_code,you_are,employment_type,work_authorization,current,employer_name,employer_company,employer_email,employer_number,last_used,reg_date,preferred_location,travel,experience,position,salary,searchable,relocate,security,hourly_rate,resume_data,comment,add_by)
           values('$ssn_num','$aadhar_num','public','$remark','$new','$language','$reg_id','$first_name','$middel_name','$last_name','$email','$city','$contact','$Country','$state','$postal_code','$you_are','$employment_type','$work_authorization','$current_date','$employer_name','$employer_company','$employer_email','$employer_number','$last_used','$reg_date','$preferred_location','$travel','$experience','$position','$salary','$searchable','$relocate','$security','$hourly_rate','$skill_pro_resume','','')"); 
           
           
           
    if(count($_POST['education_type'])>0)
  {
    
		
		
  for($k=0;$k<count($_POST['education_type']); $k++)
    {
		if($_POST['education_type'][$k]!='')
	{
		//echo $_POST['education_type'][$k];
        $conn->query("insert into sedna_education(reg_id,education,institution,city,state,country,year)
                values('$reg_id','$education_type_arr[$k]','$institution_arr[$k]','$edu_city_arr[$k]','$edu_state_arr[$k]','$edu_country_arr[$k]',$edu_year_arr[$k])");
    }
	}
  }  

/*  $conn->query("update sebna_profile_tbl set
			  first_name = '$first_name',
			  middel_name = '$middel_name',
			  last_name = '$last_name',
			  city = '$city',
			  Country = '$Country',
			  state = '$state',
			  postal_code = '$postal_code',
			  you_are = '$you_are',
			  employment_type = '$employment_type',
			  work_authorization = '$work_authorization',
			  current = '$current_date',
			  employer_name = '$employer_name',
			  employer_company = '$employer_company',
			  employer_email = '',
			  employer_number = '$employer_number',
			  last_used = '$last_used',
			  reg_date = '$reg_date' where reg_id='$reg_id' ");*/
 
 $name=$first_name." ".$middel_name." ".$last_name;

 
											
$conn->query("INSERT INTO `sedna_user_registration_tbl`(`master_id`, `name`, `contact`, `emp_emails`, `address`, `department`, `TL_id`, `user_pass`, `base_password`, `joining_date`, `status`, `delete_status`, `emp_name`, `industry`, `web`, `who_we`, `location`, `ATs`, `profile_img`,alfakey,video_id,file_name,file_url) VALUES
													('$reg_id','$name','$contact','$email','$Country','candidate','','$password2','$md5_pass','$reg_date','1','0','','','','','','','$new','','','','')"); 
   	  	  	

   	  	  	
           $conn->select_db("itcapp_citacademy");
   
 $insert = $conn->query("INSERT INTO `cit_academy_registration`(`frist_name`, `last_name`, `email`, `phn`, `address`, `candidates_userid`, `candidate_password`, `candidate_base_pass`, `status`, `entry_date`,master_id) VALUES
			    ('$first_name','$last_name','$email','$contact','$remark','$candidates_userid','$key_pass','$base_pass','0','$entry_date','$reg_id')"); 
  
  
 
if($insert){

$this_object = new callfunction();	
$msg = "true";
//$to = $email;
$to = 'cit.shoaibm2019@gmail.com';
$subject	= 	"Thank you for contact with us...!";
$message = "\n";
$message.= 	"Dear ".$name."&nbsp;&nbsp;<br><br>";
$message.='<b>Thank you!</b>  for your registration at TechSimba Pvt Ltd.<br>';
$message.='We will surely review your candidature for the opportunity.<br>';
$message.='Please find below login credentials And complete your profile now, <a href="https://tools.cheshtainfotech.com/jobportal/cdms/candidate-login/?page=login">click here</a> to login.<br><br>';
$message.= "Candidate login ID :- ".$candidates_userid."<br/>";
$message.= "Password :- ".$key_pass."<br/><br>";
$message.='A complete profile may help us to provide you with the best opportunities at our end.<br><br><br>';
$message.='All the Best!<br>';
$message.='<b>Team TechSimba</b><br>';
$this_object->SendMailToUser($to,$subject,$message);

    
//  			$this_object = new callfunction();	
// 			$msg = "true";
//     		$to      	= $email;
// 			$subject	= 	"Thank you for contact with us...!";
// 			$message = "\n";
// 			$message.= 	"Dear  <b>".$name."&nbsp;&nbsp;</b><br><br>";
// 			$message.='Many thanks for your kind interest.<br>';
// 			$message.='Our team will contact you soon.<br><br>';
// 			$message.='Your Login Details.<br><br>';
// 			$message.= "Candidate ID :-".$candidates_userid."<br/>";
// 		    $message.= "Password :-".$key_pass."<br/><br/><br/>";
// 			$message.='With Kind Regards<br>';
// 			$message.='Support Team<br>';
// 			$message.='Techsimba.in<br>';
// 			$message.='<a href="http://techsimba.in/">www.techsimba.in</a><br> +91-96859-71959';
// 			$this_object->SendMailToUser($to,$subject,$message);
 
            $to = "cit.shoaibm2019@gmail.com";
			$subject	= 	"Contact Enquiry";
			$message = 'Dear Administrator,'. "<br/><br/>";
			$message.= 'Please check the below details'. "<br/><br/>";
			$message.= 	"<strong>Name :- </strong>".$name."<br/>";
			$message.= 	"<strong>Email :- </strong>".$email."<br/>";
			$message.= 	"<strong>Contact Number :- </strong>".$contact."<br/>";
			$message.='Thanks & Regards,'."<br/>".' Techsimba ';
			$this_object->SendMailToAdmin($to,$message,$subject);
            } 
 
    $location="../?page=login";
    redirect($location);

}
 
 
?>