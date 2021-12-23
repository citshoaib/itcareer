<?

include('../../../config/config.php');
include('../../../config/function.php');


$reg_id=$_REQUEST['can_id'];
$id_type_array=$_REQUEST['id_type'];
 $date_for_upload=strtotime(date("Y/m/d H:i:s"));

$name_array=$_FILES['docs']["name"];
$type_array=$_FILES['docs']["type"];
$tmp_array=$_FILES['docs']['tmp_name'];
$size_array=$_FILES['docs']["size"];


if(!empty($_FILES['docs']["name"])){

$length=count($id_type_array);


          //  mysql_query("delete from candidate_docs where reg_id='$reg_id'");
            for($i=0;$i<=$length-1;$i++){
        $doc_type=$id_type_array[$i];
        $name=$name_array[$i];
      
		$type=$type_array[$i];
		$tmp=$tmp_array[$i];
		$size=$size_array[$i]; 
    
         $random_id= rand();
		$ext=explode(".",$name);
		$handle =$tmp;
					//print_r($ext[1]); 
				 $real_upload_name_move="../../../admin/upload_doc/candidate_documents/".$random_id.'__'.$date_for_upload.'.'.$ext[1];
				 $real_upload_name=$random_id.'__'.$date_for_upload.'.'.$ext[1];
                move_uploaded_file($tmp,$real_upload_name_move);
    
    
     $select_upload_temp=mysql_query("select * from candidate_docs where reg_id='$reg_id'") or die(mysql_error());
		
		$result=mysql_query("insert into candidate_docs set doc_name='$real_upload_name',reg_id='$reg_id',doc_type='$doc_type'") or die(mysql_error());  
		//mysql_query("update candidate_docs` set resume_data='$resume_data' where reg_id='$reg_id'")or die(mysql_error());  
		
        
    
                
            }
        if($result){
            echo "1";
            }    
}
?>