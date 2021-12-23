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


 $sql= "select * from sedna_form where email='".$me->getProperty('email')."' and status='0'";
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
  
  
  
//   $_SESSION['user_first_name'] = $data['given_name'];
//   $_SESSION['user_image'] = $data['picture'];
//   $_SESSION['user_last_name'] = $data['family_name'];
//   $_SESSION['user_gender'] = $data['gender'];
  


 }
 
 
 $sql= "select * from sedna_form where email='".$_SESSION['user_email_address']."' and status='0'";
  
  
  $way = 'gm';
  
}elseif(isset($_REQUEST['submit']))
{
  
     $uname = $_POST['email'];
	 $pass = $_POST['password'];
	 

$sql= "select * from sedna_form where email='".$uname."' and user_pass='".$pass."'";

}


	
	$result = $conn->query($sql);
	

		if($result->num_rows > 0)
		{ 
				$fetch =  $result->fetch_assoc();
		
                    $fetch['id'];
                    $fetch['emp_name'];
                    $admin = 'employer'; 
                    
                    $_SESSION['department']='employer';
                    $_SESSION['user_type']='employer';
                    $_SESSION['employer_login'] = 'true';
                    $_SESSION['employer_email'] = $fetch['email'];
                    $_SESSION['employer_id'] = $fetch['id'];
                    $_SESSION['emp_name'] = $fetch['emp_name'];
                    
                 
               
								
			$message= "Login Successfully.....!";  
			$type="succ";
		    $location="../?page=editEmployee&id=".$fetch['id'];
		
			
				
		}
		else
		{
		    
		    if(isset($_REQUEST['submit'])){
		    
			$message= "Sorry Invalid Username Or Password.....!";  
			$type="error1";
			$location="../?page=login";
			
		    }else{
			



    $password = '123@employee';
			
	$emp_name = $_SESSION['user_name'];
    $email = $_SESSION['user_email_address'];
    $cpassword = $password;
    $base_pass = md5($password);
    $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
    
    
    if(isset($_REQUEST['state']) && isset($_GET["code"]) && $_GET["code"]!=''){
        
        $login_type = 'Facebook';
        
    }elseif(isset($_GET["code"]) && $_GET["code"]!='' && isset($_REQUEST['scope']) && isset($_SESSION['access_token'])){
        
        $login_type = 'Gmail';
        
    }else{
        
        $login_type = 'Website';
    }
    

    $sql = $conn->query("INSERT INTO sedna_form SET
                emp_name ='".$emp_name."',
                email ='".$email."',
                user_pass ='".$cpassword."',
                base_password ='".$base_pass."',
                department = 'employer',
                login_type='".$login_type."',
                joining_date ='".$date_for_upload_name."'");
                
                
          $last_id = $conn -> insert_id;
          
          $_SESSION['department']='employer';
                    $_SESSION['user_type']='employer';
                    $_SESSION['employer_login'] = 'true';
                    $_SESSION['employer_email'] = $email;
                    $_SESSION['employer_id'] = $last_id;
                    $_SESSION['emp_name'] = $emp_name;
                
           
                 
            $message= "Login Successfully.....!";  
            $type="succ";
            $location="../?page=dashboard";  
		    
		    }
			
		}
		
		  
		
	
		$conn->close();    
		
		SetMessage($message, $type);
		redirect($location);
       

?>