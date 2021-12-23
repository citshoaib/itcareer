
 <?php
// retrieve session data
if(!$_SESSION["candidate_email"]){
	  header('location:?page=login');
}
?>
<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Contact Inquiries</h3>
           <?php
		              $select = "SELECT * FROM contactus_sedna_tbl";
		          $que_select = mysql_query($select) or die(mysql_error());
				  
		   ?>
           <table id="example" >
						<thead>	
								<tr>
									<td><h4>S no.</h4></td>
									<td><h4>Name</h4></td>
									<td><h4>Email</h4></td>
									<td><h4>Subject</h4></td>
									<td><h4>Date</h4></td>
									<td><h4>Message</h4></td>
									<td><h4>Delete</h4></td>
									
									
									
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
							<td align="center"><?php echo $emp['name']; ?></td>
							<td align="center"><?php echo $emp['email'];?></td>
							<td align="center"><?php echo $emp['subject']; ?></td>
							<td align="center"><?php echo $emp['date']; ?></td>
							
							</td>
						<td><a href="<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon" onClick="return hs.htmlExpand(this , {width:600})" style="color:#666666; font-weight:bold;" >View</a>
						<!--hislide div-->
					<div class="highslide-maincontent" style="margin:5px;">
				 
                   <?php echo $emp['message']; ?>
                </div></td>
						<!--hislide div-->
							
							
							

						<td align="center"><a href="model/contactus_model.php?id=<?php echo $emp['id']; ?>" onclick="return confirm('Do you really want to delete it ?')" class="btn-danger btn-sm btn-icon" >DELETE</a>
							</td>
						
						 
			</tr>
			
				          
			
       <?php
						$i++;
				}
					?>
								
								
							</tbody>
						</table>
                        
				<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
	<?php
					
					if(isset($_GET['id']))
					{
					$id=$_GET['id'];
					$select=mysql_query("select * from user_registration_tbl where id=$id");
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
					$update=mysql_query("update user_registration_tbl set status='$status_state' where id='$id' ");
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
            

