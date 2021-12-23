<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
//print_r($_REQUEST);
//echo "d;glkdglk";
if(isset($_REQUEST['update']))
{
 /*  echo "<pre>";
   print_r($_POST);
   die;*/
    $emp = $_POST['emp'];
    $hiddenId = $_POST['hiddenId'];
    $phone = $_POST['phone'];
    $Industry = $_POST['Industry'];
    $logo = $_POST['logo'];
    $web = $_POST['web'];
    $location = $_POST['location'];
    $who = $_POST['who'];
    $company_name = $_POST['company_name'];
    
    $address = $_POST['address'];
    $hiddenImage = $_POST['hiddenImage'];
    $email = $_POST['email'];
	$password=$_REQUEST['password'];
	$cpassword=$_REQUEST['cpassword'];
    $ATS_select = $_POST['ATS_select'];
	
	$country = $_POST['country'];
	$state = $_POST['state'];
	$contact_designation = $_POST['contact_department'];
	
	$social_media_name = $_POST['social_media_name'];
    
   if (($_FILES['logo']["name"])){
			$random_id= rand();
			$ext=explode(".",$_FILES["logo"]["name"]);
			if($ext[1]=='jpg' || $ext[1]=='jpeg' || $ext[1]=='png'){
				$handle =$_FILES["logo"]["tmp_name"];
			$real_upload_name_move="../../upload_img/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
			$real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
			move_uploaded_file($_FILES['logo']['tmp_name'],$real_upload_name_move);
			}else{
			  echo "<script>alert('Image format is not supported');</script>";
    redirect($site_url."admin/?page=show_emp&page_no=1");
			}
			
			
		 }
         
         else
         {
            $real_upload_name = $hiddenImage;
         }
    
    

    //if($logo == "")
    //{
    //     $logo = $hiddenImage;
    //}
    //else{
    //    
    //    $logo = ;
    //}
      //$logo = $hiddenImage;
      

      
      $Update = $conn->query("UPDATE sedna_form SET
                            emp_name='$emp',
                            industry='$Industry',
                            logo='$real_upload_name',
                            web='$web', 
                            who_we='$who',
                            emp_company='$company_name',
                            location='$location',
							country = '$country',
							state='$state',
                            contact='$phone',
                            address='$address',
                            ATs='$ATS_select',
                            email='$email',
							password='$password',
							cpassword='$cpassword'
                            WHERE id='$hiddenId'");
	  
	  $delet_media = $conn->query("DELETE FROM employer_more_social_nedia_info WHERE  employer_id ='$hiddenId'");
	  $media_ctn = count($social_media_name);
	  for($k=0; $k<=$media_ctn-1;$k++){
		
		$social_media_name = $_POST['social_media_name'][$k];
		$social_media_url = $_POST['social_media_url'][$k];
		
		$sql = $conn->query("INSERT INTO employer_more_social_nedia_info SET
						   employer_id ='$hiddenId',
						   social_media_department ='$social_media_name',
						   media_url ='$social_media_url'						   
						   ");
		
	  }
	  
	  
	  
		 $delet = $conn->query("DELETE FROM employer_more_contact_info WHERE  employer_id ='$hiddenId'");
		 $cnt=count($contact_designation);
		 
		for($i=0;$i<=$cnt-1;$i++)
		{
			
		$contact_department = $_POST['contact_department'][$i];
		$contact_name = $_POST['contact_name'][$i];
			$contact_phone = $_POST['contact_phone'][$i];
			$contact_email = $_POST['contact_email'][$i];
			$contact_designation = $_POST['contact_designation'][$i];
			$contact_skype = $_POST['contact_skype'][$i];
			
			//echo "<br>INSERT INTO employer_more_contact_info SET
			//				   employer_id ='$hiddenId',
			//				   contact_department ='$contact_department',
			//				   contact_name ='$contact_name',
			//				   contact_phone ='$contact_phone',
			//				   contact_email ='$contact_email',
			//				   contact_designation ='$contact_designation',
			//				   contact_skype ='$contact_skype'";
			
			
			$sql = $conn->query("INSERT INTO employer_more_contact_info SET
							   employer_id ='$hiddenId',
							   contact_department ='$contact_department',
							   contact_name ='$contact_name',
							   contact_phone ='$contact_phone',
							   contact_email ='$contact_email',
							   contact_designation ='$contact_designation',
							   contact_skype ='$contact_skype'");
		
		
		}

       
   
      
      if($Update)
      {
		header("location:../?page=view_profile_admin");
//header("location:../?page=view_profile_admin");
      }
      
     
}










