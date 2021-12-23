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
           <h3 class="block-head">Show Employees</h3>
           <?php
		              $select = "SELECT * FROM sedna_user_registration_tbl";
		          $que_select = mysql_query($select) or die(mysql_error());
				  
		   ?>
           <table id="example" >
						<thead>	
								<tr>
									<td><h4>S no.</h4></td>
									<td><h4>Emp. name</h4></td>
									<td><h4>Email</h4></td>
									<td><h4>Pass</h4></td>
									<td><h4>Emp Type</h4></td>
									
									<td><h4>Contact</h4></td>
                                    <td><h4>Edit</h4></td>
									<td><h4>Delete</h4></td>
									<td><h4>Details</h4></td>
									<td><h4>Status</h4></td>
									
								</tr>
							</thead>
							<tbody>
                                <?php
					
					$i = $limit*($page-1)+1;
					
					
					while($emp = mysql_fetch_array($que_select)){
						
						//echo $emp['id'];
				 
					
					 
					?>
       
 
        
            <tr>
							<td align="center"><?php echo $i; ?></td>
							<td align="center"><?php echo ucfirst($emp['name']); ?></td>
							<td align="center"><?php echo $emp['email'];?></td>
							<td align="center"><?php echo $emp['user_pass']; ?></td>
							<td align="center"><?php  if($emp['department']=='TL'){ echo "Team Leader"; } else { echo "Operator";}    ?></td>
							<td align="center"><?php echo $emp['contact']; ?></td>
							
							<td><a href="?page=edit_emp&id=<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon">EDIT</a></td>
							

						<td align="center"><a href="model/delete_emp_model.php?id=<?php echo $emp['id']; ?>" onclick="return confirm('Do you really want to delete it ?')" class="btn-danger btn-sm btn-icon" >DELETE</a>
							</td>
						<td><a href="<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon" onClick="return hs.htmlExpand(this , {width:600})" style="color:#666666; font-weight:bold;" >View</a>
						<!--hislide div-->
					<div class="highslide-maincontent" style="margin:5px;">
				 <form action="" method="post">
             <table class="table table-striped" width="50%" cellpadding="10">
				   <?php
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
	  $popup = mysql_query("SELECT * FROM `sedna_user_registration_tbl` WHERE id = '".$emp['id']."'");
	  $show = mysql_fetch_array($popup);?>
			<tr>
				  <td>ID</td>
				  <td><?php echo $show['id'];?></td>
			</tr>
			<tr>
				  <td>Name</td>
                  <td><?php echo $show['name'];?></td>
			</tr>
			<tr>
				  <td>Email</td>
                  <td><?php echo $show['email'];?></td>
			</tr>
			<tr>
				  <td>Emp. Type</td>
                  <td><?php  if($show['department']=='TL'){ echo "Team Leader"; } else { echo "Operator";}    ?></td>
			</tr>
			<?php
			if($show['TL_id']!='')
			{
			?>
			<tr>
				  <td>TL. Name</td>
                  <td><?php
				  $TL_id=$show['TL_id'];
				  $select_tl_name=mysql_query("select * from sedna_user_registration_tbl` WHERE TL_id ='$TL_id'");
				 $fetch_TL_name= mysql_fetch_array($select_tl_name);
				 echo $fetch_TL_name['name'];
				 
				  ?></td>
			</tr>
			<?php
			
			}
			?>
			<tr>
				  <td>Contact</td>
                  <td><?php echo $show['contact'];?></td>
			</tr>
			<tr>
				  <td>Address</td>
                  <td><?php echo $show['address'];?></td>
			</tr>
			<tr>
				  <td>Password</td>
                  <td><?php echo $show['user_pass'];?></td>
			</tr>
			
			
			<tr>
				  <td>Joining Date</td>
                  <td><?php echo $show['joining_date'];?></td>
			</tr>
			
				
			 </table>
				  </form>
                   
                </div></td>
						<!--hislide div-->
						 <td align="center">
							<?php if($emp['status']=='0'){?>
								<a href="?page=show_emp&id=<?php echo $emp['id']; ?>" 
								 class="btn btn-default btn-sm btn-icon" onclick="return confirm('Do you really want to Activate  it ?');">Deactivate</a>
								<?php
								}
								if($emp['status']=='1')
								{
								?>
								<a href="?page=show_emp&id=<?php echo $emp['id']; ?>" 
								 class="btn btn-default btn-sm btn-icon" onclick="return confirm('Do you really want to De-activate  it ?');">Activate</a>
								<?php }?>
							</td>
			</tr>
			
				          
			
       <?php
						$i++;
				}
					?>
								
								
							</tbody>
						</table>
                        
			
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
	<?php
					
					if(isset($_GET['id']))
					{
					$id=$_GET['id'];
					$select=mysql_query("select * from sedna_user_registration_tbl where id=$id");
					while($row=mysql_fetch_object($select))
					{
					$status_var=$row->status;
					if($status_var=='0')
					{
					$status_state=1;
					}
					else
					{
					$status_state=0;
					}
					$update=mysql_query("update sedna_user_registration_tbl set status='$status_state' where id='$id' ");
					if($update)
					{
					header("Location:?page=show_emp");
					}
					else
					{
					echo mysql_error();
					}
					}
					?>
					<?php
					}
					?>
            

