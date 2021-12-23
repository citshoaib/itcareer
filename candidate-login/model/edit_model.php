<?php
include('../../config/config.php');
include('../../config/function.php');
//echo $reg_id;

if(isset($_REQUEST['update']))
{

/*echo "<pre>";
print_r($_POST);
die;
*/


  $social_media_name= $_POST['social_media_name'];
   $social_media_url= $_POST['social_media_url'];

  
   $reg_id= $_POST['reg_id'];
   $first_name= $_POST['first_name'];
   $last_name= $_POST['last_name'];
    $caste= $_POST['caste'];
   $gender= $_POST['gender'];
   $middel_name= $_POST['middel_name'];
   $contact= $_POST['contact'];
   $postal_code= $_POST['postal_code'];
    $searchable= $_POST['searchable'];
    $relocate= $_POST['relocate'];
  $security= $_POST['security'];
   $position=$_POST['position'];
   $city= $_POST['city'];
   $remark= $_POST['remark'];
   $country= $_POST['country'];
   $state=$_POST['state'];
   $travel=$_POST['travel'];
    $language=implode(',',$_POST['language']);
  
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
   $skill_resumeData= $_POST['skill_name'][0];
   //print_r($skill_name_arr);
   //echo count($skill_name);
   $year_exp_arr= $_POST['year_exp'];
   $last_used_arr= $_POST['last_used'];
   $job_title_arr= $_POST['job_title'];
   $comapnay_arr= $_POST['comapnay'];
   $start_date_arr= $_POST['start_date'];
   $end_date_arr=$_POST['end_date'];
   $current= $_POST['current'];
   $education_type_arr= $_POST['education_type'];
   $institution_arr= $_POST['institution'];
   $edu_city_arr= $_POST['edu_city'];
   $edu_country_arr= $_POST['edu_country'];
   $edu_year_arr= $_POST['edu_year'];
   
   
   
   
    $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
   //print_r($_FILES["cv"]["name"]);
       //$_FILES["cv"]["tmp_name"];
    if($_FILES['dp']['name']){

     $name= $_FILES["dp"]["name"];
       $type= $_FILES["dp"]["type"];
        $size= $_FILES["dp"]["size"];
         $tmp= $_FILES["dp"]["tmp_name"];
          //$r=explode(".",$name);
          
         
            $new=time()."-".$name;
        
                 $upload=move_uploaded_file($tmp,"../../candidate-login/upload_doc/profile_picture/".$new);

}else{
  
  $new=$_POST['recent_image'];
  
}
   
    if(!empty($_FILES['cv']["name"])){
     $random_id= rand();
    $ext=explode(".",$_FILES["cv"]["name"]);
    $handle =$_FILES["cv"]["tmp_name"];
          //print_r($ext[1]); 
         $real_upload_name_move="../../candidate-login/upload_doc/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
         $real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
                move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
           
           
           $inputFileName = $real_upload_name; 
//           if($check_resume_data==1)
//      {
      
      if($ext[1]=='docx')
      {
        function read_file_docx($filename){

$striped_content = '';
$content = '';

if(!$filename || !file_exists($filename)) return false;

$zip = zip_open($filename);

if (!$zip || is_numeric($zip)) return false;

while ($zip_entry = zip_read($zip)) {

if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

if (zip_entry_name($zip_entry) != "word/document.xml") continue;

$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

zip_entry_close($zip_entry);
}// end while

zip_close($zip);

//echo $content;
//echo "";
//file_put_contents('1.xml', $content);

$content = str_replace('', " ", $content);
$content = str_replace('', "\r\n", $content);
$striped_content = strip_tags($content);

return $striped_content;
}

$filename ="../../upload_doc/".$inputFileName; //Add file with folder

$content = read_file_docx($filename);
if($content !== false) {

//echo nl2br($content);
  $resume_data=$conn -> real_escape_string($content);

}
else {
echo 'Couldn\'t the file. Please check that file.';
}
  
      }
      
       //doc code 
    if($ext[1]=='doc')
    {
    
 $filename ="../../upload_doc/".$inputFileName;
if ( file_exists($filename) ) {

if ( ($fh = fopen($filename, 'r')) !== false ) {

$headers = fread($fh, 0xA00);

# 1 = (ord(n)*1) ; Document has from 0 to 255 characters
$n1 = ( ord($headers[0x21C]) - 1 );

# 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

# 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

# (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

# Total length of text in the document
$textLength = ($n1 + $n2 + $n3 + $n4);

$extracted_plaintext = fread($fh, $textLength);

# if you want the plain text with no formatting, do this
//echo 
 $resume_data=$conn -> real_escape_string($extracted_plaintext);
//  echo $resume_data;
//  die;
# if you want to see your paragraphs in a web page, do this
// nl2br($extracted_plaintext);

}

}    
        
    }
           
           
           
     // $inputFileName = $real_upload_name;
     $select_upload_temp=$conn->query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
     if($select_upload_temp->num_rows>0)
     {
    $conn->query("update sedna_operator_request_consultants_reg set cv='$real_upload_name' where id='$reg_id'");
    $conn->query("update sebna_profile_tbl set resume_data='$skill_resumeData' where reg_id='$reg_id'");
      
     }
     
   }
   
   
   $conn->query("update sedna_operator_request_consultants_reg set status='1' where id='$reg_id'");  
   
    
    ///$conn->query("update sebna_registration set first_name='$first_name', last_name='$last_name'  where id='$reg_id'");
    
   $conn->query("update sebna_profile_tbl  set caste='$caste',gender='$gender', remark='$remark', resume_data='$skill_resumeData', profile_image='$new', language_know='$language', first_name='$first_name', middel_name='$middel_name', last_name='$last_name',city='$city', country='$country',state='$state',contact='$contact',zipcode='$postal_code',employment_type='$employment_type',work_authorization='$work_authorization',employer_name='$employer_name',employer_company='$employer_company',employer_email='$employer_email',employer_number='$employer_number',preferred_location='$preferred_location',travel='$travel',experience='$experience',position='$position', salary='$salary',searchable='$searchable',relocate='$relocate',security='$security',hourly_rate='$hourly_rate'   where reg_id='$reg_id'");
     $conn->query("DELETE FROM sedna_skills WHERE reg_id=$reg_id");
    if(count($_POST['skill_name'])>0)
  {
  for($j=0;$j<count($_POST['skill_name']); $j++)
    {
        if($_POST['skill_name'][$j]!='')
  {
       
    $conn->query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used)
                values('$reg_id','$skill_name_arr[$j]','$year_exp_arr[$j]','$last_used_arr[$j]')");
    }
  }
  }
     $conn->query("DELETE FROM sebna_work_experience WHERE reg_id=$reg_id");
   
   if(count($_POST['job_title'])>0)
  {
  for($i=0;$i<count($_POST['job_title']); $i++)
    {
      if($_POST['job_title'][$i]!='')
  {
    
        if($end_date_arr[$i]!='')
        {
    $conn->query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','$end_date_arr[$i]','')");    
        }
        else
        {
        $conn->query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current)
                values('$reg_id','$job_title_arr[$i]','$comapnay_arr[$i]','$start_date_arr[$i]','','$current[$i]')");    
           
            
        }
        }
  }
  } 
   
   
  $conn->query("DELETE FROM sedna_education WHERE reg_id=$reg_id");
  
    if(count($_POST['education_type'])>0)
  {
    
    
    
  for($k=0;$k<count($_POST['education_type']); $k++)
    {
    if($_POST['education_type'][$k]!='')
  {
    //echo $_POST['education_type'][$k];
        $conn->query("insert into sedna_education(reg_id,education,institution,city,country,year)
                values('$reg_id','$education_type_arr[$k]','$institution_arr[$k]','$edu_city_arr[$k]','$edu_country_arr[$k]','$edu_year_arr[$k]')");
    }
  }
  }  
  
   $conn->query("DELETE FROM candidate_more_social_nedia_info WHERE candidate_id=$reg_id");
  
    if(count($_POST['social_media_name'])>0)
  {
    
    
    
  for($k=0;$k<count($_POST['social_media_name']); $k++)
    {
    if($_POST['social_media_name'][$k]!='')
  {
    //echo $_POST['education_type'][$k];
        $conn->query("insert into candidate_more_social_nedia_info(candidate_id,social_media_department,media_url)
                values('$reg_id','$social_media_name[$k]','$social_media_url[$k]')");
    }
  }
  }  
  
    
  $location="../?page=profile&id=$reg_id";
              redirect($location); 
   
    
}   
?>