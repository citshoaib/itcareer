    <?php 
    @session_start();
    unset($_SESSION['candidate_department']);
    unset($_SESSION['candidate_login']);
    unset($_SESSION['candidate_email']);
    unset($_SESSION['candidate_id']);
    unset($_SESSION['candidate_master_id']);
    
    
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email_address']);
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_last_name']);
    
    //session_destroy();
    $message= "Logout successfull..!";  
    $type="succ";
    
    SetMessage($message, $type);
    
    
    $location="?page=login";
    redirect($location);
    ?>