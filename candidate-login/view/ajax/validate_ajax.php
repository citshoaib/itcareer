<?
include('../../../config/config.php');
include('../../../config/function.php');


if(isset($_POST['email'])){
    $email=$_POST['email'];
    $result=mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` where email='$email'");
     $count=mysql_num_rows($result);
    
    if($count>0){
        echo "1";
    }else{
        echo "0";
    }
        
    }

?>