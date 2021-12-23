<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
if(isset($_REQUEST['submit']))
{
    $email=$_POST['email'];
     $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
  $select_email=mysql_query("select * from sebna_registration where email='$email'");
if($row=mysql_num_rows($select_email)==0)
{
    

    
   
			   
		  
					  
					  $ext=explode(".",$_FILES["cv"]["name"]);
					  $handle =$_FILES["cv"]["tmp_name"];
					//print_r($ext[1]); 
				 $real_upload_name="../upload_doc/" .$ext[0].'__'.$date_for_upload_name.'.'.$ext[1];
                move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name);
		  $inputFileName = $real_upload_name;
          mysql_query("insert into sebna_registration (email,cv,date) values('$email','$real_upload_name','$date_for_upload_name')") or die(mysql_error());
}
 
        
	//    $message="Update successfully";
	//	$type="succ";
		SetMessage($message,$type);
		$location="../?page=create";
		redirect($location);
     


}

?>