<?php
include("../../../config/config.php");
include("../../../config/function.php");


  $videoFile_name=$_FILES['videoFile']['name'];
 $extension = end(explode(".", $videoFile_name));
  $master_id =$_SESSION['candidate_master_id'];

if( $extension=="mp4" && isset($_FILES['videoFile']['name']) && $master_id){
    
    $title =$_REQUEST['title'];
    $entry_date=strtotime("now");
   
    $description =$_REQUEST['description'];
    $tags =$_REQUEST['tags'];
	
	$result_video=mysql_query("SELECT * FROM `videos` where master_id=$master_id AND status=1 ");
	  $count_row=mysql_num_rows($result_video);
	
	$row_value=mysql_fetch_array($result_video);
	$video_file_name=$row_value['video_path'];
	$youtube_video_id=$row_value['youtube_video_id'];
	
    if(isset($_FILES['videoFile']['name'])){
        
   
	 $videoFile_type=$_FILES['videoFile']['type'];
     $videoFile_tmp=$_FILES['videoFile']['tmp_name'];
     $videoFile_size=$_FILES['videoFile']['size'];
       
          $new=time()."-".$videoFile_name;
        
          $upload=move_uploaded_file($videoFile_tmp,"../../../admin/upload_doc/profile_video/".$new);
          
        } 
    
	if($count_row==1){
	//
	//$result_del=mysql_query("DELETE FROM `videos` WHERE master_id=$master_id");
	// if ($result_del){
		//$unlink_video=unlink("../../admin/upload_doc/profile_video/".$video_file_name);
		//if($unlink_video){
		//	
		//	echo "<script> alert('video deleted');</script>";
		//}else{
		//	echo "<script> alert('not');</script>";
		//}
		 //mysql_query("DELETE FROM `videos` WHERE master_id='$master_id'");
		
			$result_video_val=mysql_query("SELECT * FROM `videos` where master_id=$master_id AND status=0 ");
			$again_num_rows=mysql_num_rows($result_video_val);
			if($again_num_rows==0){
		$result22=mysql_query("insert into videos (master_id,video_title,video_description,video_tags,video_path,youtube_video_id,status,date,new_video_status)
             values('$master_id','$title','$description','$tags','$new','','','$entry_date','1')") or die(mysql_error());
		}else{
			
			$result22=mysql_query("update videos set master_id='$master_id',video_title='$title',video_description='$description',video_tags='$tags',video_path='$new',youtube_video_id='',status='',date='$entry_date',new_video_status='1' where master_id='$master_id'AND status=0 ") or die(mysql_error());
		}
	//mysql_query("update videos set master_id='$master_id',video_title='$title',video_description='$description',video_tags='$tags',video_path='$new',status='1',date='$entry_date' where master_id=$master_id");
	echo "success"."@@".$new;
	}
	else{
		
		$result_video_val=mysql_query("SELECT * FROM `videos` where master_id=$master_id AND status=0 ");
			$again_num_rows=mysql_num_rows($result_video_val);
			if($again_num_rows==0){
		$result22=mysql_query("insert into videos (master_id,video_title,video_description,video_tags,video_path,youtube_video_id,status,date,new_video_status)
             values('$master_id','$title','$description','$tags','$new','','','$entry_date','')") or die(mysql_error());
		}else{
			
			$result22=mysql_query("update videos set master_id='$master_id',video_title='$title',video_description='$description',video_tags='$tags',video_path='$new',youtube_video_id='',status='',date='$entry_date',new_video_status='1' where master_id='$master_id'AND status=0 ") or die(mysql_error());
		}
	//echo "<script> alert('You can upload Only Two Video'); window.close(); </script>";
 //$result=mysql_query("insert into videos (master_id,video_title,video_description,video_tags,video_path,youtube_video_id,status,date)
 //            values('$master_id','$title','$description','$tags','$new','','','$entry_date')") or die(mysql_error());
 if($result22){
    
   echo "success"."@@".$new;
 }
	}
}
//$location="../../?page=view_profile_admin";


?>