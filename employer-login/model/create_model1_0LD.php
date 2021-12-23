<?php
 @session_start();
 $reg_date =strtotime(date("d-m-Y"));
  $operator_id= $_SESSION['employer_id'];

include('../../config/config.php');
include('../../config/function.php');
 if(isset($_REQUEST["submit"]))
{
    //print_r($_POST);
   
    $value_new = serialize($_POST);  
//echo  $value_new . '<br>';

//$original_array=unserialize($serialized_data);
//var_export($original_array)  . '<br>';


	
    $reg_id=$_POST['reg_id'];
     $operator_id=$_POST['operator_id'];

 $value_new = mysql_real_escape_string($value_new);
  
  $select_data= mysql_query("select * from sedna_operator_request_consultants where operator_id='$operator_id' && consultant_id='$reg_id' && status='0'");
   if($row=mysql_numrows($select_data)>0)
   {
	$fetch_data=mysql_fetch_array($select_data);
	//print_r($fetch_data);
 
	mysql_query("update sedna_operator_request_consultants set change_date='$reg_date', new_value='$value_new' where operator_id='$operator_id' && consultant_id='$reg_id'  && status='0'");
	
	
   }
   else{
	
	
//	echo "insert into sedna_operator_request_consultants (change_date,operator_id,consultant_id,old_value,new_value)
//            values('$reg_date','$operator_id','$reg_id','$old_value','$value_new')";
  
mysql_query("insert into sedna_operator_request_consultants (change_date,operator_id,consultant_id,old_value,new_value)
            values('$reg_date','$operator_id','$reg_id','$old_value','$value_new')")  or die(mysql_error()); 
   }
 
  $location="../?page=profile&id=$reg_id";
				  redirect($location);
 
}
 
 
?>