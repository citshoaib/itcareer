 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
?>
<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Edit Employee</h3>
           <!--hislide div-->
							<form method="post" action="model/edit_emp_model.php" >
					
				   <?php
                   $id = $_REQUEST['id'];
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
	  $popup_edit = mysql_query("SELECT * FROM `sedna_user_registration_tbl` WHERE id = $id");
	  $show_edit = mysql_fetch_array($popup_edit);?>
      <input type="hidden" name="id" value="<?php echo $show_edit['id'];?>">
      <table class="table table-striped" width="50%" cellpadding="10" >
			<tr>
				  <td>ID</td>
				  <td><?php echo $show_edit['id'];?></td>
			</tr>
			<tr>
				  <td>Name</td>
                  <td><input type="text" name="name" value="<?php echo $show_edit['name'];?>"></td>
			</tr>
			<tr>
				  <td>Email</td>
                  <td><input type="text" name="email" value="<?php echo $show_edit['email'];?>"></td>
			</tr>
			<?php if($show_edit['department']=='operator'){ ?>
			<tr>
							  <td>Team Leader:</td>
							  <td>
								<select name="TL_id" >
								  <option value="">Select TL ...</option>
								  <?php
								  $TL_id=$show_edit['TL_id'];
								  $select_tl=mysql_query("SELECT * FROM `sedna_user_registration_tbl` WHERE department='TL'");
								  while($fetch_TL=mysql_fetch_array($select_tl))
								  {
								  ?>
								  <option value="<?php echo $fetch_TL['id']; ?>" <?php echo ($fetch_TL['id']==$TL_id)? 'selected':''; ?>><?php echo $fetch_TL['name']; ?></option>
								 <?php
								  }
								 ?>
								  
								</select>
								</td>
							</tr>
			<?php
			}
			
			?>
			<tr>
				  <td>Contact</td>
                  <td><input type="text" name="contact" value="<?php echo $show_edit['contact'];?>"></td>
			</tr>
			<tr>
				  <td>Address</td>
                  <td><input type="text" name="address" value="<?php echo $show_edit['address'];?>"></td>
			</tr>
			<tr>
							  <td>Department:</td>
							  <td>
								<select name="department" >
								  <option value="">Select Type ...</option>
								  <option value="TL" <?php echo ($show_edit['department']=='TL')? 'selected':''; ?>>Team Leader</option>
								  <option value="operator" <?php echo ($show_edit['department']=='operator')? 'selected':''; ?>>Operator</option>
								  
								</select>
								</td>
							</tr>
			<tr>
				  <td>Password</td>
                  <td><input type="text" name="user_pass" value="<?php echo $show_edit['user_pass'];?>"></td>
			</tr>
			
			
			<tr>
				  <td>Joining Date</td>
                  <td><input type="text" name="joining_date" value="<?php echo $show_edit['joining_date'];?>"></td>
			</tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="UPDATE" class="btn btn-wuxia btn-large btn-primary"></td>
            </tr>
				
			 </table>
				  
                   
                
							</form>
						
                        
				<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
            

