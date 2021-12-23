 <?php
// retrieve session data
include("../../config/config.php");
include("../../config/function.php");
if(!$_SESSION["employer_email"]){
	//  header('location:?page=login');
	  $location="?page=login";
		redirect($location);
}
?>
<script type="text/javascript">
    function Validate() {
      
     
      
        var newpassword = document.getElementById("new_pass1").value;
        var confirmPassword = document.getElementById("cnfrm_pass1").value;
        if (newpassword != confirmPassword) {
            alert("New password and Confirm password do not match.");
            return false;
        }
         return Validatepass();
        //return true;
    }
</script>
  
 


<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Change Password</h3>
        
							<form method="post" action="model/change_pass_model.php" >
					
				   <?php
                    $id = $_SESSION["employer_id"];
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
	  $popup_edit = $conn->query("SELECT * FROM `sedna_form` WHERE id = $id");
	  $show_edit = $popup_edit->fetch_array();
	   $password = $show_edit['user_pass'];
	  
	  ?>
	 
      <input type="hidden" name="hiddenpass" value="<?php echo $show_edit['id'];?>">
      <table class="table table-striped" align="center" width="50%" >
			<tr>
				  <td>Old Password</td>
				  <td><input type="password" value="<?php echo $password; ?>" id='old_pass1' name="old_pass" required></td>
			</tr>
			<tr>
				  <td>New Password</td>
                  <td>
						
						<input type="password" name="new_pass" value="" id="new_pass1" required></td>
			</tr>
			<tr>
				  <td>Confirm Password</td>
                  <td><input type="password" name="cnfrm_pass" value="" id="cnfrm_pass1" required></td>
			</tr>
			
			
			
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Change Password" onclick="return Validate()" class="btn btn-wuxia btn-large ">&nbsp;<!--<a href="?page=change_pass&id=<?php echo $show_edit['id'];?>" >Change Password</a>-->	</td>
				
            </tr>
				
			 </table>
				  
                   
                
							</form>
						
                        
				<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>


<script type="text/javascript">
    function Validatepass() {
        var oldpass = document.getElementById("old_pass1").value;
        var password = '<?php echo $password; ?>';
        //var confirmPassword = document.getElementById("cnfrm_pass1").value;

        if (oldpass != password) {
         alert("Old password do not match.");
         return false;
        }
        return true;
        
    }
</script>

    <div class="container">
    </div>
            

