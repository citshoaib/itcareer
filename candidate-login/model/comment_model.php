<?php
include("../../config/config.php");
include("../../config/function.php");
if(isset($_REQUEST['submit']))
{
      $date =strtotime(date("d-m-Y"));
   $oprater_id=$_POST['oprater_id'];
    $consultant_id=$_POST['consultant_id'];
     $comment= mysql_real_escape_string($_POST['comment']);

     $sql_insert="insert into sedna_comment_table (consultant_id,oprater_id,comment,date) value('$consultant_id','$oprater_id','$comment','$date')";
     mysql_query($sql_insert) or die(mysql_error());
      $location="../?page=comment&id=$consultant_id";
								redirect($location); 
}

?>