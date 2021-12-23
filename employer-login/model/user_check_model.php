
<?php 
@session_start();
include("../../config/config.php");
include("../../config/function.php");

if(isset($_REQUEST['submit']))
{
  
    $uname = $_POST['username'];
	$pass = $_POST['password'];
	
	
   //echo"select * from user_registration_tbl where name='".$uname."' && user_pass='".$pass."'";
	$sql= mysql_query("select * from user_registration_tbl where name='".$uname."' && user_pass='".$pass."'") or die(mysql_error());
    
     
  
	
		
				while($fetch_user = mysql_fetch_array($sql)){
                        echo$fetch_user['status'];
                 if($fetch_user['status']==1)
				{
						        $_SESSION['admin_id'] = $fetch_user['name'];
								$_SESSION['id'] = $fetch_user['id'];
								$message= "Login Successfully.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="../?page=show_emp";
								redirect($location); 
							
				}
				
		
		else
		{
			$message= "Sorry invalid Username.....!";  
			$type="error1";
			SetMessage($message, $type);
			$location="../?page=user_login";
			redirect($location);
		}
        }
       
}

?>