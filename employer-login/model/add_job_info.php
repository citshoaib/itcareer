<?php
@session_start();
include('../../config/config.php');
include('../../config/function.php');

if(isset($_POST["submit"])){
    
    echo "<pre>";
    print_r($_POST);
    die;
    
    
    
    $job_title = $_REQUEST['job_title'];
    $description= $_REQUEST['description'];
	$salary_from=$_REQUEST['salary_from'];
	$salary_to = $_REQUEST['salary_to'];
	$job_type=$_POST["job_type"];
	$employment_type=$_POST["employment_type"];
	
	
	
$eligibility1=$_REQUEST['eligibility'];

foreach ($eligibility1 as $key => $val) {
   if ($val =='Other')
    {
	  $specify=$_REQUEST['specify'];
    $eligibility1[$key] = $specify;
  $space=$conn->query("SELECT * FROM eligibility WHERE title='$specify'");
  $count=$space->num_rows;
  if($count==0){
   
   $conn->query("INSERT INTO `eligibility`( `title`) VALUES ('$specify')");
   
  }
  
    }
	
    
}
 $eligibility=implode(",",$eligibility1);

	
	
	//die;
	
	//$eligibility=implode(",",$_REQUEST['eligibility']);
	$country=$_REQUEST['country'];
	$category=$_REQUEST["category"];
	$employer_id = $_SESSION['employer_id'];
	
	 $sql_state = $conn->query("SELECT country_name FROM `country_master` where country_code='$country'");
	$state_value=$sql_state->fetch_array();
	$state=$_REQUEST['state'];
	$city=$_REQUEST['city'];
	$zip_code=$_REQUEST['zip_code'];
	 $location=$zip_code.",".$city.",".$state.",".$state_value['country_name'];
	
	

      $name= $_FILES["image"]["name"];
       $type= $_FILES["image"]["type"];
        $size= $_FILES["image"]["size"];
         $tmp= $_FILES["image"]["tmp_name"];
          //$r=explode(".",$name);
          
          if($name!=''){ 
            $new=time()."-".$name;
           $to = $arr['image'];
                 $upload=move_uploaded_file($tmp,"../upload_doc/image/".$new);
}
	$opening_date=strtotime($_REQUEST['opening_date']);
	$closing_date=strtotime($_REQUEST['closing_date']);
	$company_name=$_REQUEST['company_name'];
	$company_url=$_REQUEST['company_url'];
	 $image=$_REQUEST['image'];
	$entry_date=strtotime("now");
	
	$short_description = $_REQUEST['address'];


//echo "INSERT INTO sedna_job_form  SET
//job_title='$job_title',description='$description',
//salary_from='$salary_from',
//salary_to='$salary_to',
//job_type='$job_type',
//eligibility='$eligibility',
//location='$location',
//opening_date='$opening_date',
//closing_date='$closing_date'";



$insert= $conn->query("INSERT INTO sedna_job_form  SET
					 employer_id='$employer_id',
					job_title='$job_title',
					short_description='$short_description',
					description='$description',
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
					experience_level='$experience_level',
					category='$category',
					entry_date='$entry_date'");
	  
    //echo "hello";
    $message="Added successfully";
	$type="msg_succ";	
	
}

	SetMessage($message, $type);
	$location="../?page=manage_job_info&page_no=1";
	redirect($location);
?>