<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$date =strtotime(date("d-m-Y"));
$handle ='skills.xlsx';

$ext=explode(".",$handle);
//print_r($ext);

 $real_file_name="view/".$handle;


if(($ext[1]=="xlsx" or $ext[1]=="xls" or $ext[1]=="csv") )
{		
include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = $real_file_name;
if($ext[1]=="xlsx")
{
$objReader = new PHPExcel_Reader_Excel2007();//this is for xlsx files
}
else if($ext[1]=="csv")
{
 $objReader = new PHPExcel_Reader_CSV(); 
}
else
{
$objReader = new PHPExcel_Reader_Excel5();//this is for xls files
}


$objPHPExcel = $objReader->load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
$num_rows = $objPHPExcel->getActiveSheet()->getHighestRow();
//echo $highestRow = $sheetData->getHighestRow(); // set fourth parameter as "true" for getting actual indexes like 'A','B' etc....
}
elseif($ext[1]=="txt")
{
$fp = fopen($real_file_name, 'r');
while (($data1 = fgetcsv($fp, 5000, "\t")) !== FALSE)
 {

   $sheetData[]=$data1;
 }

}



 $count_rows=count($sheetData);
$data=$sheetData;
 count($data);


for($k=0;$k<=(count($data)-1);$k++)
{

 

$file=array();


if($k>=1){
 $file=$data[$k];
//print_r($file);


if($file[0]!=""){
  $file_position=mysql_real_escape_string($file[0]);
}
if($file[1]!=""){
 $file_name=mysql_real_escape_string($file[1]);
}
if($file[2]!=""){
 $file_location=mysql_real_escape_string($file[2]);
}
if($file[3]!=""){
 $file_contact=mysql_real_escape_string($file[3]);
}
if($file[4]!=""){
 $file_email=mysql_real_escape_string($file[4]);
}
if($file[5]!=""){
 $file_Comment=mysql_real_escape_string($file[5]);
}
if($file[6]!=""){
 $file_Visa_Status=mysql_real_escape_string($file[6]);
}
if($file[7]!=""){
 $file_Rates=mysql_real_escape_string($file[7]);
}
if($file[8]!=""){
 $file_Relocation=mysql_real_escape_string($file[8]);
}



//echo "insert into temp_import_table (position,name,location,contact,email,comment,visa_status,rates,relocation)
//VALUES ('$file_position','$file_name','$file_location','$file_contact','$file_email','$file_Comment','$file_Visa_Status','$file_Rates','$file_Relocation')";
$check=mysql_query("select * from temp_import_table where email=$file_email");
if(mysql_num_rows($check)==0)
{

mysql_query("insert into temp_import_table (position,name,location,contact,email,comment,visa_status,rates,relocation)
VALUES ('$file_position','$file_name','$file_location','$file_contact','$file_email','$file_Comment','$file_Visa_Status','$file_Rates','$file_Relocation')");

}
}


}

$select_data=mysql_query("select DISTINCT email from temp_import_table");
 $num=mysql_num_rows($select_data);
while($fetch_data=mysql_fetch_array($select_data))
{
 
  $email=$fetch_data['email'];
  
  $check1=mysql_query("select * from sedna_operator_request_consultants_reg where email=$email");
if(mysql_num_rows($check1)==0)
{

  
  
if($email!='' && $email!='Not provided')
 {
 
 //echo "insert into sedna_operator_request_consultants_reg (date,operator_id,email,cv,status) values ('$date','6','$email','','1')";
 
 $select_data12=mysql_query("insert into sedna_operator_request_consultants_reg (date,operator_id,email,cv,status) values ('$date','6','$email','','1')");
 //echo "select * from temp_import_table where email='$email'";
 $reg_id=mysql_insert_id(); 
 $select_all_data=mysql_query("select * from temp_import_table where email='$email'");
 if($dg=mysql_num_rows($select_all_data)>0)
 {
 $fetch_all_data=mysql_fetch_array($select_all_data);
  $location=$fetch_all_data['location'];
  $arry12=explode(",",$location);
  //print_r($arry12);
  $city= $arry12[0];
  echo $state= trim($arry12[1]);
  echo "select * from state_master where state_code='$state'";
  $select_state=mysql_query("select * from state_master where state_code='$state'");
  $fetch_state=mysql_fetch_array($select_state);
  $state_id=$fetch_state['StateID'];
  $country_code=$fetch_state['country_code'];
  
      $position=$fetch_all_data['position'];
  $contact=$fetch_all_data['contact'];
  $name=$fetch_all_data['name'];
   $comment=$fetch_all_data['comment'];
    $visa_status=$fetch_all_data['visa_status'];
   $select_visa=mysql_query("select * from sebna_work_authorization where work_authorization='$visa_status'");
   $fetch_visa=mysql_fetch_array($select_visa);
   $visa_id=$fetch_visa['id'];
  $relocation=$fetch_all_data['relocation'];
 //echo "insert into sebna_profile_tbl (reg_id,first_name,city,phone_no,work_authorization,relocate,comment) values ('$reg_id','$name','$city','$contact','$visa_id','$relocation','$comment')";
 
 mysql_query("insert into sebna_profile_tbl (reg_id,first_name,city,country,state,phone_no,work_authorization,relocate,position,comment) values ('$reg_id','$name','$city','$country_code','$state_id','$contact','$visa_id','$relocation','$position','$comment')");
 }
}
}
}



