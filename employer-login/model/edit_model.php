<?php
include('../../config/config.php');
include('../../config/function.php');
//echo "manish";

if(isset($_REQUEST['update']))
{

//
//print_r($_POST);


   $reg_id= $_POST['reg_id'];
   $first_name= $_POST['first_name'];
	$middel_name=$_POST['middel_name'];
   $last_name= $_POST['last_name'];
   $phone= $_POST['phone_no'];
   $postal_code= $_POST['postal_code'];
   $searchable= $_POST['searchable'];
    $relocate= $_POST['relocate'];
	$security= $_POST['security'];
   $city= $_POST['city'];
   $country= $_POST['country'];
   $state=$_POST['state'];
   $travel= $_POST["travel"];
   $position=$_POST['position'];
   $experience= $_POST['experience'];
    $work_authorization= $_POST['work_authorization'];
	$employer_name=$_POST['employer_name'];
	$employer_company=$_POST['employer_company'];
	$employer_email=$_POST['employer_email'];
	$employer_number=$_POST['employer_number'];
	$preferred_location=$_POST['preferred_location'];
	
	
	

   $employment_type=implode(',',$_POST['employment_type']);
   
   $salary= $_POST['salary'];
   $hourly_rate= $_POST['hourly_rate'];
   $skill_name_arr= $_POST['skill_name'];
   
   //print_r($skill_name_arr);
   //echo count($skill_name);
   $year_exp_arr= $_POST['year_exp'];
   $last_used_arr= $_POST['last_used'];
   $job_title_arr= $_POST['job_title'];
   
  // echo count($job_title_arr);
   //print_r($job_title_arr);
   $comapnay_arr= $_POST['comapnay'];
   $start_date_arr= $_POST['start_date'];
   $end_date_arr=$_POST['end_date'];
   $current= $_POST['current'];
   //print_r($current);
   $education_type_arr= $_POST['education_type'];
   $institution_arr= $_POST['institution'];
   $edu_city_arr= $_POST['edu_city'];
   $edu_country_arr= $_POST['edu_country'];
   $edu_year_arr= $_POST['edu_year'];
   
   
   
   $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
   //print_r($_FILES["cv"]["name"]);
       //$_FILES["cv"]["tmp_name"];
   
   
    if(!empty($_FILES['cv']["name"])){
		$random_id= rand();
		$ext=explode(".",$_FILES["cv"]["name"]);
		$handle =$_FILES["cv"]["tmp_name"];
					//print_r($ext[1]); 
				 $real_upload_name_move="../../upload_doc/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
				 $real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
                move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
		 // $inputFileName = $real_upload_name;
		 $select_upload_temp=mysql_query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
		 if(mysql_num_rows($select_upload_temp)>0)
		 {
		mysql_query("update sedna_operator_request_consultants_reg set cv='$real_upload_name' where id='$reg_id'");  
		  
		 }
		 
	 }
   
   
   	mysql_query("update sedna_operator_request_consultants_reg set status='1' where id='$reg_id'");  
   
    
    /////mysql_query("update sebna_registration set first_name='$first_name', last_name='$last_name'  where id='$reg_id'");
    
    mysql_query("update sebna_profile_tbl set first_name='$first_name', last_name='$last_name',city='$city', country='$country',state='$state',phone_no='$phone',postal_code='$postal_code',employment_type='$employment_type',work_authorization='$work_authorization',
				employer_name='$employer_name',employer_company='$employer_company',employer_email='$employer_email',employer_number='$employer_number',preferred_location='$preferred_location',travel='$travel',position='$position', salary='$salary',searchable='$searchable',relocate='$relocate',security='$security', hourly_rate='$hourly_rate'   where reg_id='$reg_id'");
     mysql_query("DELETE FROM sedna_skills WHERE reg_id=$reg_id");
    if(count($_POST['skill_name'])>0)
  {
  for($j=0;$j<count($_POST['skill_name']); $j++)
    {
        if($_POST['skill_name'][$j]!='')
	{
       
    mysql_query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used)
             values('$reg_id','$skill_name_arr[$j]','$year_exp_arr[$j]','$last_used_arr[$j]')");
    }
	}
  }
     mysql_query("DELETE FROM sebna_work_experience WHERE reg_id=$reg_id");
   
   if(count($_POST['job_title'])>0)
  {
	
	
  for($i=0;$i<count($_POST['job_title']); $i++)
    {
		
			if($_POST['job_title'][$i]!='')
	{
		
        if($end_date_arr[$i]!='')
        {
			
			
    mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','')");    
        }
        else
        {
			
			
       mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
               values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','','$current[$i]')");    
           
            
        }
        }
	}
  } 
   
   
  mysql_query("DELETE FROM sedna_education WHERE reg_id=$reg_id");
  
    if(count($_POST['education_type'])>0)
  {
    
		
		
  for($k=0;$k<count($_POST['education_type']); $k++)
    {
		if($_POST['education_type'][$k]!='')
	{
		//echo $_POST['education_type'][$k];
        mysql_query("insert into sedna_education(reg_id,education,institution,city,state,country,year)
                values('$reg_id','$education_type_arr[$k]','$institution_arr[$k]','$edu_city_arr[$k]','$edu_state_arr[$k]','$edu_country_arr[$k]',$edu_year_arr[$k])");
    }
	}
  }  
    
  $location="../?page=profile&id=$reg_id";
							redirect($location); 
   
    
}   
?>