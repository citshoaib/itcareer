<?php 
@session_start();
//Include Google Configuration File
include('../view/gconfig.php');
require_once( '../view/Facebook/autoload.php' );

include("../../config/config.php");
include("../../config/function.php");


// echo "<pre>";
// print_r($_REQUEST);

// echo "<pre>";
// print_r($_SESSION);

// die;


 if(isset($_SESSION['FBRLH_state']) && isset($_REQUEST['state']) && isset($_GET["code"]) && $_GET["code"]!=''){ ?>
 
 
<span class="crayon-k "  style="color:white;">require_once</span> <span class="crayon-s" style="color:white;">'insert_db.php'</span><span  style="color:white;" class="crayon-sy">;</span>

<?php


$fb = new Facebook\Facebook([
  'app_id' => '1693288947547308',
  'app_secret' => '9f356cd024aeed33365a0b13e5b294dd',
  'default_graph_version' => 'v2.5',
]);  
  
$helper = $fb->getRedirectLoginHelper();  
  
try 
{  
  $accessToken = $helper->getAccessToken();  
} catch(Facebook\Exceptions\FacebookResponseException $e) {  
  // When Graph returns an error  
  
  echo 'Graph returned an error: ' . $e->getMessage();  
  exit;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {  
  // When validation fails or other local issues  

  echo 'Facebook SDK returned an error: ' . $e->getMessage();  
  exit;  
}  


try 
{
  // Get the Facebook\GraphNodes\GraphUser object for the current user.
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'ERROR: Graph ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'ERROR: validation fails ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

// echo "Full Name: ".$me->getProperty('name')."<br>";
// echo "Email: ".$me->getProperty('email')."<br>";
// echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty

// ('id')."</a>";


$_SESSION['user_name'] = $me->getProperty('name');
$_SESSION['user_email_address'] = $me->getProperty('email');
$_SESSION['user_first_name'] = $me->getProperty('first_name');
$_SESSION['user_last_name'] = $me->getProperty('last_name');

 $sql= "select * from cit_academy_registration where email='".$me->getProperty('email')."' and status='0'";
$way = 'fb';

}


//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
elseif(isset($_GET["code"]) && $_GET["code"]!='' && isset($_REQUEST['scope']))
{
    
    
    if(isset($_SESSION['access_token']) && $_SESSION['access_token'] == '') {
  header("Location: index.php");
} 


 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();
  
//   echo "<pre>";
//   print_r($data);
//   echo "</pre>";
  
//   die;

  //Below you can find Get profile data and store into $_SESSION variable

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
  
  if(!empty($data['name']))
  {
   $_SESSION['user_name'] = $data['name'];
  }
  
  
  
  $_SESSION['user_first_name'] = $data['given_name'];
//   $_SESSION['user_image'] = $data['picture'];
  $_SESSION['user_last_name'] = $data['family_name'];
//   $_SESSION['user_gender'] = $data['gender'];
  


 }
 
 
 $sql= "select * from cit_academy_registration where email='".$_SESSION['user_email_address']."' and status='0'";
  
  
  $way = 'gm';
  
}elseif(isset($_REQUEST['submit']))
{
  
     $uname = $_POST['email'];
	 $pass = $_POST['password'];
	
	$sql = "select * from cit_academy_registration where candidates_userid='".$uname."' && candidate_password='".$pass."' ";

}


//Selecting the database
$conn->select_db("itcapp_citacademy");

$result = $conn->query($sql);

if($result->num_rows > 0)
		{ 
				$fetch = $result->fetch_assoc();
				
				$conn->select_db("itcapp_website");
				
		$select_id = "select * from sedna_user_registration_tbl where master_id='".$fetch['master_id']."'";
		
		
	$result = $conn->query($select_id);
				
				$fetch_id = $result->fetch_assoc();
			

				            $admin = 'candidate'; 
							
								$_SESSION['candidate_department']='candidate';
								//$_SESSION['user_type']='TL';
								$_SESSION['candidate_login'] = 'true';
								//$_SESSION["admin"]= $admin; 
							    $_SESSION['candidate_email'] = $fetch['email'];
								$_SESSION['candidate_id'] = $fetch_id['id'];
								$_SESSION['candidate_master_id'] = $fetch['master_id'];
								
				
								$message= "Login Successfully.....!";  
								$type="succ";
							    $location="../?page=view_profile_admin";
		
				
		}
		else
		{
		    
		    
		     if(isset($_REQUEST['submit'])){
		    
			$message= "Sorry Invalid Username Or Password.....!";   
			$type="error1";
			$location="../?page=login";
			
		    }else{
		        
		        
		        	  function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
 
 
 
 $password2 = generate_password(6); // 6 character long password
 $md5_pass=md5($password2);
		        
		        
		         $chars_1 = "0123456789";
    $charArray = str_split($chars_1);
    for($i = 0; $i < 6; $i++){
        $randItem = array_rand($charArray);
        $candidates_userid .= "".$charArray[$randItem];
    }
    
    $chars_2 = "abc0123456789";
    $charArray = str_split($chars_2);
    for($i = 0; $i < 6; $i++){
        $randItem = array_rand($charArray);
        $key_pass .= "".$charArray[$randItem];
    }
    
    $base_pass = md5($key_pass);
    
    $entry_date = strtotime(date("d-m-Y"));
    
    $emp_name = $_SESSION['user_name'];
    $email = $_SESSION['user_email_address'];
    $cpassword = $password2;
    $base_pass = $md5_pass;
    
     $conn->select_db("itcapp_website");  
    
    

    $insert = $conn->query("INSERT INTO `sedna_operator_request_consultants_reg`(date,email,country,cv,status,delete_status,can_user_id,operator_id) VALUES ('$entry_date','$email','','','1','0','$candidates_userid','')");
		 
		
		 $reg_id=$conn->insert_id;
		 
	 

        $insert = $conn->query("insert into sebna_profile_tbl (ssn_num,aadhar_num,source,address,profile_image,language_know,reg_id,first_name,middel_name,last_name,employer_email,city,contact,Country,state,postal_code,you_are,employment_type,work_authorization,current,employer_name,employer_company,employer_number,last_used,reg_date,preferred_location,travel,experience,position,salary,searchable,relocate,security,hourly_rate,resume_data,comment,add_by)
           values('','','public','','','','$reg_id','".$_SESSION['user_first_name']."','','".$_SESSION['user_last_name']."','$email','','','','','','','','','','','','','','$entry_date','','','','','','','','','','','','')");         
		        
		
   
	$conn->query("INSERT INTO `sedna_user_registration_tbl`(`master_id`, `name`, `contact`, `email`, `address`, `department`, `TL_id`, `user_pass`, `base_password`, `joining_date`, `status`, `delete_status`, `emp_name`, `industry`, `web`, `who_we`, `location`, `ATs`, `profile_img`,alfakey,video_id,file_name,file_url) VALUES ('$reg_id','$emp_name','','$email','','candidate','','$password2','$md5_pass','$entry_date','1','0','','','','','','','','','','','')"); 	        
		        
		  $reg_tbl_id=$conn->insert_id;
		  
		  
		  
		     $conn->select_db("itcapp_citacademy");      
		        
		        
	        
		        
	 $insert = $conn->query("INSERT INTO `cit_academy_registration`(`frist_name`, `last_name`, `email`, `phn`, `address`, `candidates_userid`, `candidate_password`, `candidate_base_pass`, `status`, `entry_date`,master_id) VALUES
			    ('".$_SESSION['user_first_name']."','".$_SESSION['user_last_name']."','$email','','','$candidates_userid','$key_pass','$base_pass','0','$entry_date','$reg_id')"); 	
			    
			    
			           $admin = 'candidate'; 
							
								$_SESSION['candidate_department']='candidate';
								$_SESSION['candidate_login'] = 'true';
							    $_SESSION['candidate_email'] = $email;
								$_SESSION['candidate_id'] = $reg_tbl_id;
								$_SESSION['candidate_master_id'] = $reg_id;
		        
		        
		      	$message= "Login Successfully.....!";  
								$type="succ";
							    $location="../?page=view_profile_admin";  
		        
		        
		    }
		    
		    
		
		}
		

       
       	$conn->close();    
		
		SetMessage($message, $type);
	redirect($location);
       
       

?>