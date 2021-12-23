<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
//print_r($_REQUEST);
//echo "d;glkdglk";
if(isset($_REQUEST['submit']))
{
    $emp_name = $_POST['emp'];
     $Industry = $_POST['Industry'];
	 $id = $_REQUEST['id'];
      $logo = $_POST['logo'];
       $web = $_POST['web'];
        $who = $_POST['who'];
          $location = $_POST['location'];
         $ATS = $_POST['ATS_select'];
		 $phone = $_REQUEST['phone'];
		 
		 $address = $_REQUEST['address'];
		 
		 $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
         
		 if(!empty($_FILES['logo']["name"])){
			$random_id= rand();
			$ext=explode(".",$_FILES["logo"]["name"]);
			$handle =$_FILES["logo"]["tmp_name"];
			$real_upload_name_move="../../upload_img/" .$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
			$real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
			move_uploaded_file($_FILES['logo']['tmp_name'],$real_upload_name_move);
			
		 }
		 else
		 {
			$real_upload_name == $logo;
		 }
		 

		 $sql = mysql_query("UPDATE sedna_form SET
							emp_name ='$emp_name',
							industry ='$Industry',
							logo ='$real_upload_name',
							web ='$web',
							who_we ='$who',
							location ='$location',
							ATs ='$ATS',
							contact ='$phone',
							address = '$address'
							 WHERE id='$id'") or die(mysql_error());
		 
          if($sql)
          {
header("location:../?page=formfieldshow");
          }


}

?>