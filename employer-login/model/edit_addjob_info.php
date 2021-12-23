<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
//print_r($_REQUEST);

if(isset($_REQUEST['update']))
{
	
$update_id=$_POST['uid']; 
$job_title = $_POST['job_title'];
$description= $_POST['description'];
$salary_from=$_REQUEST['salary_from'];
$salary_to = $_POST['salary_to'];
$job_type=$_POST["job_type"];
$company_url=$_POST['company_url'];
$company_name=$_POST['company_name'];
$experinece_level=$_POST['experinece_level'];

	
	
$eligibility1=$_REQUEST['eligibility'];

foreach ($eligibility1 as $key => $val) {
   if ($val =='Other')
    {
	  $specify=$_REQUEST['specify'];
    $eligibility1[$key] = $specify;
  $space=mysql_query("SELECT * FROM eligibility WHERE title='$specify'");
  $count=mysql_num_rows($space);
  if($count==0){
   
   mysql_query("INSERT INTO `eligibility`( `title`) VALUES ('$specify')");
   
  }
  
    }
	
    
}
 $eligibility=implode(",",$eligibility1);

	$country=$_REQUEST['country'];
	$category=$_REQUEST["category"];
	
	 $sql_state = mysql_query("SELECT country_name FROM `country_master` where country_code='$country'");
	$state_value=mysql_fetch_array($sql_state);
	$state=$_REQUEST['state'];
	$city=$_REQUEST['city'];
	$zip_code=$_REQUEST['zip_code'];
	 $location=$zip_code.",".$city.",".$state.",".$state_value['country_name'];
	
    if($_FILES['image']['name']){

     $name= $_FILES["image"]["name"];
       $type= $_FILES["image"]["type"];
        $size= $_FILES["image"]["size"];
         $tmp= $_FILES["image"]["tmp_name"];
          //$r=explode(".",$name);
          
         
            $new=time()."-".$name;
           $to = $arr['image'];
                 $upload=move_uploaded_file($tmp,"../upload_doc/image/".$new);

}
else{
    
    $new=$_POST['recent_image'];
}



$opening_date=strtotime($_REQUEST['opening_date']);
$closing_date=strtotime($_REQUEST['closing_date']);

$short_description = $_REQUEST['short_description'];
    
  
 
 
 $update=mysql_query("UPDATE sedna_job_form set job_title='$job_title',
							short_description='$short_description',
description='$description',
experience_level='$experinece_level',
salary_from='$salary_from',
salary_to='$salary_to',
job_type='$job_type',
eligibility='$eligibility',
location='$location',
opening_date='$opening_date',
closing_date='$closing_date',
company_url='$company_url',
company_name='$company_name',
image='$new',
category='$category'
WHERE id='$update_id'");
 
 
 
 
 
// 
//$insert= mysql_query("INSERT INTO sedna_job_form  SET
//job_title='$job_title',description='$description',
//salary_from='$salary_from',
//salary_to='$salary_to',
//job_type='$job_type',
//eligibility='$eligibility',
//location='$location',
//opening_date='$opening_date',
//closing_date='$closing_date',
//company_url='$company_url',
//company_name='$company_name',
//image='$new',
//category='$category',
//entry_date='$entry_date'");
    
     $message="Update successfully";
	$type="msg_succ";	
	
	}
   
	SetMessage($message, $type);
	$location="../?page=manage_job_info";
	redirect($location);

    ?>