<?php
include('../../config/config.php');
include('../../config/function.php');
//echo "manish";
error_reporting(E_ALL);
$date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
$reg_date =strtotime(date("d-m-Y"));
   $operator_id= $_SESSION['employer_id'];
//	 echo "<pre>";
// print_r($_POST);


 
if(isset($_REQUEST['update']))
{  
  
  

  array_pop($_POST);
   $reg_id=$_POST['reg_id'];
  // print_r($_FILES["cv"]["name"]);
	//	$_FILES["cv"]["tmp_name"];
	 if(!empty($_FILES['cv']["name"])){
	  $random_id= rand();
		$ext=explode(".",$_FILES["cv"]["name"]);
		$handle =$_FILES["cv"]["tmp_name"];
					//print_r($ext[1]); 
				 $real_upload_name_move="../../upload_doc/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
				 $real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
                move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
		 // $inputFileName = $real_upload_name;
		 $select_upload_temp=mysql_query("select * from sedna_temp_upload where consultant_id='$reg_id'");
		 if(mysql_num_rows($select_upload_temp)>0)
		 {
		
		
		mysql_query("update sedna_temp_upload set operator_id='$operator_id',cv='$real_upload_name',date='$date_for_upload_name' where consultant_id='$reg_id'");  
		  
		 }
		 else{
		 
          mysql_query("insert into sedna_temp_upload (consultant_id,operator_id,cv,date) values('$reg_id','$operator_id','$real_upload_name','$date_for_upload_name')") or die(mysql_error());
		 }
	 }
		
		
   $value_new = serialize($_POST);
   
   //echo  $value_new . '<br>';
 // print_r($_POST);
 
 // echo "<br>-------------------------------------------<br>";

  $que_email=mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` where id = '$reg_id'");
  if(mysql_num_rows($que_email)>0){
    $fetch_que_email = mysql_fetch_array($que_email,MYSQL_ASSOC);
	$email_1["email"]=$fetch_que_email['email'];
	//$cv_1["cv"]=$fetch_que_email['cv'];
	 $final_array_result = $email_1;

  
  }
  
$que_1 = mysql_query("SELECT * FROM `sebna_profile_tbl` where reg_id = '$reg_id'");
if(mysql_num_rows($que_1)>0){
  $ro_1 = mysql_fetch_array($que_1,MYSQL_ASSOC); 
  $first_name_1["first_name"] = $ro_1["first_name"];
  $reg_id_1["reg_id"] = $ro_1["reg_id"];
  $middle_name_1["middel_name"] = $ro_1["middel_name"];
  $last_name_1["last_name"] = $ro_1["last_name"];
  
  $phone_1["phone_no"] = $ro_1["phone_no"];
  $position_1["position"] = $ro_1["position"];
  $experience_1["experience"] = $ro_1["experience"];
  $postal_code_1["postal_code"] = $ro_1["postal_code"];
  $searchable_1["searchable"] = $ro_1["searchable"];
  $city_1["city"] = $ro_1["city"];
  $country_1["country"] = $ro_1["country"];
  $experience_1["experience"] = $ro_1["experience"];
  
  $employment_type["employment_type"]= explode(",",$ro_1["employment_type"]);
  
  $relocate_1["relocate"] = $ro_1["relocate"];
  $work_authorization_1["work_authorization"] = $ro_1["work_authorization"];
  $travel_1["travel"] = $ro_1["travel"];
  $security_1["security"] = $ro_1["security"];
  $salary_1["salary"] = $ro_1["salary"];
  $hourly_rate_1["hourly_rate"] = $ro_1["hourly_rate"];
 $final_array_result = $first_name_1+$reg_id_1+$middle_name_1+$last_name_1+$final_array_result+$phone_1+$position_1+$experience_1+$postal_code_1+$searchable_1+$city_1+$country_1+$experience_1+$employment_type+$relocate_1+$work_authorization_1+$travel_1+$security_1+$salary_1+$hourly_rate_1+$country_1;
   
	
  }else{
   $ro_1 = [];
  }
  
  
  
  //table 2 start
  
  $que_2 = mysql_query("SELECT * FROM `sedna_education` where reg_id = '$reg_id'");
  if(mysql_num_rows($que_2)>0){
  
  while($ro_2 = mysql_fetch_array($que_2,MYSQL_ASSOC)){
  $eduid=$ro_2["id"];
  $education_type_1["education_type"][$eduid] = $ro_2["education"];
  $institution_1["institution"][$eduid] = $ro_2["institution"];
  $edu_city_1["edu_city"][$eduid] = $ro_2["city"];
  $edu_country_1["edu_country"][$eduid] = $ro_2["country"];
  }
    
  }else{
   $education_type_1["education_type"][] = "";
  $institution_1["institution"][] ="";
  $edu_city_1["edu_city"][] = "";
  $edu_country_1["edu_country"][] ="";
  
  }
  
  $final_array_result = $final_array_result+$education_type_1+$institution_1+$edu_city_1+$edu_country_1;
	
	 
	
   //table 2 stop
  
  
  //table 3 start
  $que_3 = mysql_query("SELECT * FROM `sebna_work_experience` where reg_id = '$reg_id'");
   if(mysql_num_rows($que_3)>0){
  while($ro_3 = mysql_fetch_array($que_3,MYSQL_ASSOC)){
	$wexid=$ro_3["id"];
  $job_title_1["job_title"][$wexid] = $ro_3["job_title"];
  $comapnay_1["comapnay"][$wexid] = $ro_3["comapnay"];
  $start_date_1["start_date"][$wexid] = $ro_3["start_date"];
  $end_date_1["end_date"][$wexid] = $ro_3["end_date"];
  
  }
   
  }else{
   $job_title_1["job_title"][] ="";
  $comapnay_1["comapnay"][] = "";
  $start_date_1["start_date"][] = "";
  $end_date_1["end_date"][] = "";
  
  }
  $final_array_result = $final_array_result+$job_title_1+$comapnay_1+$start_date_1+$end_date_1;
	
  //table 3 stop
  
  //table 4 start
  $que_4 = mysql_query("SELECT * FROM `sedna_skills` where reg_id = '$reg_id'");
   if(mysql_num_rows($que_4)>0){
  while($ro_4 = mysql_fetch_array($que_4,MYSQL_ASSOC)){
  $sid=$ro_4["id"];
  $skill_name_1["skill_name"][$sid] = $ro_4["skill_name"];
  $year_exp_1["year_exp"][$sid]= $ro_4["year_exp"];
  $last_used_1["last_used"][$sid] = $ro_4["last_used"];
  }
  }else{
   $skill_name_1["skill_name"][] = "";
  $year_exp_1["year_exp"][] = "";
  $last_used_1["last_used"][] = "";
  }
  $final_array_result = $final_array_result+$skill_name_1+$year_exp_1+$last_used_1;
 // table 4 stop
   $a2=  $final_array_result;
 $a1= $_POST;
//echo "<pre>";
//print_r($a1);
 
 //echo "fetch";
 //print_r($a2);
 
//echo "<br><br>";
 
 
 
 
 
 function arrayRecursiveDiff($aArray1, $aArray2) {
  $aReturn = array();

  foreach ($aArray1 as $mKey => $mValue) {
    if (array_key_exists($mKey, $aArray2)) {
      if (is_array($mValue)) {
        $aRecursiveDiff = arrayRecursiveDiff($mValue, $aArray2[$mKey]);
        if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }
      } else {
        if ($mValue != $aArray2[$mKey]) {
          $aReturn[$mKey] = $mValue;
        }
      }
    } else {
      $aReturn[$mKey] = $mValue;
    }
  }
  return $aReturn;
}
	  //echo "<pre>";
	  $result_1 = arrayRecursiveDiff($a1, $a2);
	// print_r($result_1);
 
	
	$new_val_get = serialize($result_1);
 

 $result_15 = arrayRecursiveDiff($a2, $a1);
  //print_r($result_15);
  
   $old_val_get = serialize($result_15);
 
  $select_count=mysql_query("SELECT COUNT(consultant_id) as total FROM sedna_operator_request_consultants where `consultant_id`=$reg_id");
 $fetch12= mysql_fetch_array($select_count);
  $fetch12['total'];

 if($fetch12['total']=='1')
 {
$select_data_11=mysql_query("select * from sedna_operator_request_consultants where consultant_id='$reg_id' && status='0' ");
if($row11=mysql_num_rows($select_data_11)>0)
  {
	
  if($old_val_get=='')
  {
		
  mysql_query("update sedna_operator_request_consultants set change_date='$reg_date', old_value='$old_val_get', new_value='$new_val_get' where operator_id='$operator_id' && consultant_id='$reg_id'  && status='0'");
  }
  else
  {
	
	mysql_query("update sedna_operator_request_consultants set change_date='$reg_date', old_value='', new_value='$value_new' where operator_id='$operator_id' && consultant_id='$reg_id'  && status='0'");
 
	
  }
  
  }
 else
 {
  

  
  mysql_query("insert into sedna_operator_request_consultants (change_date,operator_id,consultant_id,old_value,new_value)
        values('$reg_date','$operator_id','$reg_id','$old_val_get','$new_val_get')");
  
 }
 
 }
 
  else if($fetch12['total']=='0')
  {
		
  mysql_query("insert into sedna_operator_request_consultants (change_date,operator_id,consultant_id,old_value,new_value)
        values('$reg_date','$operator_id','$reg_id','','$value_new')");
   
  }
  else{
		$fetch12['total'];
   $select_data_edit=mysql_query("select * from sedna_operator_request_consultants where consultant_id='$reg_id' && status='0' && operator_id='$operator_id' ");
if($row_edit=mysql_num_rows($select_data_edit)>0)
  {
  
  
mysql_query("update sedna_operator_request_consultants set change_date='$reg_date', old_value='$old_val_get', new_value='$new_val_get' where operator_id='$operator_id' && consultant_id='$reg_id'  && status='0'");
	  

   
  }
  else
  {
   
	  mysql_query("insert into sedna_operator_request_consultants (change_date,operator_id,consultant_id,old_value,new_value)
           values('$reg_date','$operator_id','$reg_id','$old_val_get','$new_val_get')");
   
  }
  }
  
	
	
   }
  


  $location="../?page=profile&id=$reg_id";
				  redirect($location);




?>