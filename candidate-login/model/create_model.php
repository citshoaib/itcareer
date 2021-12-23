
<?php
include('../../config/config.php');
include('../../config/function.php');
 if(isset($_REQUEST["submit"]))
{
//    echo "<pre>";
//	print_r($_POST);
//	
//	die;
 //echo count($_POST);
    $reg_date =strtotime(date("d-m-Y"));
    $reg_id=$_POST['reg_id'];
 $first_name=$_POST['first_name'];
 $middel_name=$_POST['middel_name'];
 $last_name=$_POST['last_name'];
 $city=$_POST['city'];
 $Country=$_POST['country'];
 $state=$_POST['state'];
 $postal_code=$_POST['postal_code'];
 $employer_name=$_POST['employer_name'];
	$employer_company=$_POST['employer_company'];
	$employer_email=$_POST['employer_email'];
	$employer_number=$_POST['employer_number'];
 $you_are=$_POST['you_are'];
 //print_r($_POST['employment_type']);
  $employment_type=implode(',',$_POST['employment_type']);
 
 
 $work_authorization=$_POST['work_authorization'];
  count($_POST['job_title']);
    $job_title_arr=$_POST['job_title'];
 $job_title=implode(',',$_POST['job_title']);
 $comapnay_arr=$_POST['comapnay'];
 $start_date_arr=$_POST['start_date'];
  $end_date_arr=$_POST['end_date'];
  //print_r($end_date_arr);
   $current_arr=$_POST['current'];
   //print_r($current_arr);
 $comapnay=implode(',',$_POST['comapnay']);
 $start_date=implode(',',$_POST['start_date']);
 $end_date=implode(',',$_POST['end_date']);
 $current_date=implode(',',$_POST['current']);
  count($_POST['skill_name']);
 $skill_name=implode(',',$_POST['skill_name']);
 $skill_name_arr=$_POST['skill_name'];
 $year_exp_arr=$_POST['year_exp'];
 $last_used_arr=$_POST['last_used'];
 $year_exp=implode(',',$_POST['year_exp']);
 $last_used=implode(',',$_POST['last_used']);
  if(count($_POST['job_title'])>0)
  {
  for($i=0;$i<count($_POST['job_title']); $i++)
    {
        if($end_date_arr[$i]!='')
        {
    mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','')");    
        }
        else
        {
        mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','$current_arr')");    
           
            
        }
        } 
  }
  
  if(count($_POST['skill_name'])>0)
  {
  for($j=0;$j<count($_POST['skill_name']); $j++)
    {
         mysql_query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used)
                values('$reg_id','$skill_name_arr[$j]','$year_exp_arr[$j]','$last_used_arr[$j]')");    
       
        } 
  }
  
mysql_query("insert into sebna_profile_tbl (reg_id,first_name,middel_name,last_name,city,Country,state,postal_code,you_are,employment_type,work_authorization,current,employer_name,employer_company,employer_email,employer_number,last_used,reg_date)
            values('$reg_id','$first_name','$middel_name','$last_name','$city','$Country','$state','$postal_code','$you_are','$employment_type','$work_authorization','$current_date','$employer_name','$employer_company','$employer_email','$employer_number','$last_used','$reg_date')")  or die(mysql_error()); 
 
 
  $location="../?page=profile&reg_id=$reg_id";
								redirect($location);
 
}
 
 
?>