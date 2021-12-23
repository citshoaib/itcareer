 <?php
// retrieve session data
require_once('../config/function.php');
if(!$_SESSION["candidate_email"]){
	//  header('location:?page=login');
	  $location="?page=login";
		redirect($location);
}
?>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
 


<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Change Password</h3>
        
							<form method="post" action="model/change_password_model.php" >
					
				   <?php
                    $id = $_SESSION["candidate_id"];
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
// 	  $popup_edit = $conn->query("SELECT * FROM `cit_academy_registration` WHERE id = $id");
// 	  $show_edit = $popup_edit->fetch_array();
	  ?>
	  
	  
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <table class="table table-striped" align="center" width="50%" >
			<tr>
				  <td>Old Password</td>
				  <td><input type="password" value="" name="old_pass" required></td>
			</tr>
			<tr>
				  <td>New Password</td>
                  <td>
						
						<input type="password" name="new_pass" value="" id="txtPassword" required></td>
			</tr>
			<tr>
				  <td>Confirm Password</td>
                  <td><input type="password" name="confirm_password" value="" id="txtConfirmPassword" required></td>
			</tr>
			
			
			
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Change Password" onclick="return Validate()" class="btn ">&nbsp;<!--<a href="?page=change_pass&id=<?php echo $show_edit['id'];?>" >Change Password</a>-->	</td>
				
            </tr>
				
			 </table>
				  
                   
                
							</form>
						
                        
				<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
            

