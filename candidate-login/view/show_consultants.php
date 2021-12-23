<?php
// retrieve session data
if(!$_SESSION["candidate_email"]){
	  header('location:?page=login');
}
?>
<!--<div class="container">
<hr>
</div>-->

<div class="container content mtb">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Consultant List</h3>
		   
		   <form  method="post" action=""  enctype="multipart/form-data"><div class="res_tab" >
		<table width="50%" cellpadding="5" class="table-striped" align="center">
			<tbody>
				<tr>
					<!--<td class="pall_5">Operator Name:</td>
							  <td class="pall_5"><select name="operator_name" id="operator_name" >
									<option value=''>Select Name</option>
									<?php
									$memberName_query = mysql_query("SELECT * FROM `sedna_user_registration_tbl` order by name") or die(mysql_error());
									while($memberName_row = mysql_fetch_array($memberName_query)){
									?>
									<option value="<?php echo $memberName_row['id'];?>"><?php echo $memberName_row['name'];?></option>
									<?php } ?>
				  </select>
							  </td>-->
							  
							   <td class="pall_5">Phone:</td>
							  <td class="pall_5"><input type="text" name="phone" id="phone" autocomplete="off" >
							  </td>
							  
							  <td class="pall_5">Email:</td>
							  <td class="pall_5"><input type="text" name="email" id="email" autocomplete="off" class='email' onkeyup='contact(this.value);' >
					<div style="display: none;" id="suggestions_email" class="suggestionsBox_email">
                              <div id="suggestionsList_email" class="suggestionList"></div>
					</div>
							  </td>	
					
				</tr>
				
				<tr id="submit">
							  
							  <td colspan="6" align="center" class="pall_5"><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" type="submit" name="search" value="Search" />
				  
				  <!--<a class="" href='?page=show_consultants&page_no=1'>Clear</a>-->
				   <a href="?page=show_consultants&page_no=1" ><input type="button" value="Clear" name="Clear" class="btn btn-error btn-custom btn-rounded waves-effect waves-light"></a>
							</td></tr>
				
			</tbody>
		</table>
		</div>
			 			
		   </form>
		   
		 <div class="res_tab">   
           <table id="" class="table" >  <!--id="example"-->
						<thead>	
								<tr>
									<th><h4>S no.</h4></th>
									<th><h4>Operator</h4></th>
									<th><h4>Consultant name</h4></th>
									<th><h4>Email</h4></th>
									<th><h4>Phone no.</h4></th>
									
									<th><h4>Country</h4></th>
                                    <th><h4>Edit</h4></th>
									<th><h4>Delete</h4></th>
									<th><h4>Details</h4></th>
									<th><h4>Update History</h4></th>
									
								</tr>
							</thead>
							<tbody>
                                <?php
								
								
				  $rows=20;
				  if(isset($_GET['page_no'])){
				  $page_no=$_GET['page_no'];
				  }else{
				  $page_no=1;	
				  }
				  $first_page=$rows*($page_no-1);
				  
				  $common_join = "INNER join sebna_profile_tbl on sebna_profile_tbl.reg_id = sedna_operator_request_consultants_reg.id ";
				  
				  if(isset($_POST['search']))
				  {
					
					 $email = $_REQUEST['email'];
					 $phone = $_REQUEST['phone'];
					
					
					$operator_name = $_REQUEST['operator_name'];
					
					if($email!=''){
					
					$where =" where email='$email' && status='1' && delete_status='0' ORDER BY status ASC";
						
					}elseif($phone!=''){
						
					$where =" where phone_no='$phone' && status='1' && delete_status='0' ORDER BY status ASC";	
						
					}elseif($operator_name !=''){
						
						$where ="where operator_id ='$operator_name' && status='1' && delete_status='0' ORDER BY status ASC";	
						
					}elseif($email!='' && $phone!='' && $operator_name !=''){
						
						$where = "where email='$email' && phone_no='$phone' && operator_id ='$operator_name' && status='1' && delete_status='0' ORDER BY status ASC";
					
					}elseif($phone!='' && $operator_name !='' ){
						
						$where = "where phone_no='$phone' && operator_id ='$operator_name'  && status='1' && delete_status='0' ORDER BY status ASC";
					
					}elseif($email!='' && $operator_name!='' ){
						
						$where = "where email='$email' && operator_id='$operator_name'  && status='1' && delete_status='0' ORDER BY status ASC";
					
					}elseif($email!='' && $phone!='' ){
						
						$where = "where email='$email' && phone_no='$phone'  && status='1' && delete_status='0' ORDER BY status ASC";
					
					}
					
				  }else{
						
					 $where =" where status='1'   && delete_status='0'  ORDER BY status ASC";
				  }
				  
				  $limit ="limit $first_page,$rows ";
				  
				  
					
					$i = $limit*($page-1)+1;
					
					
					  $select = "SELECT *, sedna_operator_request_consultants_reg.id jjdi  FROM sedna_operator_request_consultants_reg $common_join $where $limit";
					
					$pagination_sql = "SELECT * FROM sedna_operator_request_consultants_reg $common_join ORDER BY status ASC";
					
					
		          $que_select = mysql_query($select) or die(mysql_error());
			    
			    $count = mysql_num_rows($que_select);
			    
			    if($count >0){
			    
			    
			   
					
					while($emp = mysql_fetch_array($que_select)){
						
						
						
                        $emp_id=$emp['id'];
						$operator_id = $emp['operator_id'];
						
//					$select_profile=mysql_query("select * from sebna_profile_tbl where reg_id='$emp_id'");   	
//						//echo $emp['id'];
//                        $fetch_profile = mysql_fetch_array($select_profile);
						
						$select_operator_name=mysql_query("SELECT * FROM `sedna_user_registration_tbl` WHERE id='$operator_id'");
						
						$fetch_operator_name = mysql_fetch_array($select_operator_name);
				 
					
					 
					?>
       
 
        
            <tr>
							<td align="center"><?php echo $i; ?></td>
							<td align="center"><?php if($fetch_operator_name['name'] != ''){echo ucfirst($fetch_operator_name['name']);}else{ echo "Admin"; } ?></td>
							<td align="center"><?php  echo ucfirst($emp['first_name'].' '.$emp['middel_name'].' '.$emp['last_name']); ?></td>
							<td align="center"><?php echo $emp['email'];?></td>
							<td align="center"><?php echo $emp['phone_no']; ?></td>
							
							<td align="center"><?php  echo  $country=$emp['country'];
							//$select_country=mysql_query("select * from country_master where country_code='$country'");
							//$fetch_country=mysql_fetch_array($select_country);
							//echo $fetch_country['country_name'];
							
							?></td>
							
							<td><a href="?page=edit&id=<?php echo $emp['jjdi'];?>" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light">Edit</a></td>
							

						<td align="center"><a href="model/delete_consultants_model.php?id=<?php echo $emp['jjdi']; ?>" onclick="return confirm('Do you really want to delete it ?')" class="btn btn-error btn-custom btn-rounded waves-effect waves-light" >Delete</a>
							</td>
						<td><a href="?page=profile&id=<?php echo $emp['jjdi'];?>" class="btn btn-info btn-custom btn-rounded waves-effect waves-light" >View</a></td>
						
						 <td align="center">
							<a href="<?php echo $emp['jjdi'];?>" class="btn btn-inverse-1 btn-custom btn-rounded waves-effect waves-light" onClick="return hs.htmlExpand(this , {width:600})" style="color:#666666; font-weight:bold;" >View History</a>
						<!--hislide div-->
					<div class="highslide-maincontent" style="margin:5px;">
				<?php
				$popup = mysql_query("SELECT * FROM `sedna_consultants_update_history` WHERE consultant_id = '".$emp['id']."'");
				if(mysql_num_rows($popup)>0)
				{
				?>
             <table class="table table-striped" width="50%" cellpadding="10">
				   <?php
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
	  $popup = mysql_query("SELECT * FROM `sedna_consultants_update_history` WHERE consultant_id = '".$emp['id']."'");
	  $show = mysql_fetch_array($popup);?>
			<tr>
				  <td>ID</td>
				  <td><?php echo $show['id'];?></td>
			</tr>
			<!--<tr>
				  <td>Name</td>
                  <td><?php echo $show['consultant_id'];?></td>
			</tr>-->
			<tr>
				  <td>Emp. Id</td>
                  <td><?php echo $show['emp_id'];?></td>
			</tr>
			
			<tr>
				  <td>Date</td>
                  <td><?php echo $show['date'];?></td>
			</tr>
			
				
			 </table>
				<?php
				}
				else
				{
			echo "<h4>". "No History" ."</h4>";	  
				  
				}
				
				?>
                   
                </div></td>
						<!--hislide div-->
							</td>
			</tr>
			
				          
			
       <?php
						$i++;
				}
				
				
				 }else{
					
					?>
					<td align="center"><b >No Record</b></td>
					<?php 
					
				 }
					?>
								
								
							</tbody>
						</table>
		</div>
		   
		   
		   
		   <div class="pagination">
                                <?php
	$per_page_block = 10;
	if(isset($_GET['page_no'])){
		$get_current_page = $_GET['page_no'];
		if($get_current_page <4){
			$start_loop = 1;
			$end_loop = 4;
		}
		else
		{
			$start_loop = $get_current_page-4;
			$end_loop = $get_current_page+5;
		}
		
		
	}
	
	//	$query=mysql_query("select * from customer");
	$query=mysql_query($pagination_sql);
	$total_rows=mysql_num_rows($query);
	$total_page=ceil($total_rows/$rows);
//	echo $start_loop."--".$end_loop;
	if($end_loop>$total_page){
		$end_loop = $total_page;
	}
	
	
	$previous = $get_current_page-1;
	?>
	<ul>
	<?
	if($previous > 1)
	{
		echo "<li><a href='?page=show_consultants&page_no=".$previous."'>Previous</a></li>";
	}
	if($start_loop>1){
		echo "<li><a href='?page=show_consultants&page_no=1'>1 </a></li>";
		echo "<li><a href='#'>...</a>";
	}
	for($i=$start_loop;$i<=$end_loop;$i++){
	   $class_active = "";
	  if($i == $get_current_page ){
            
         $class_active = "class = 'active_page'";   
            
        }

		echo "<li ".$class_active."><a href='?page=show_consultants&page_no=".$i."'>".$i."  "."</a></li>";	
	}
	$remain_pages = $total_page- $end_loop;
	if($remain_pages>1){
		echo "<li><a href='#'>...</a></li>";
	}
	if($remain_pages>0){
		echo "<li><a href='?page=show_consultants&page_no=$total_page'>".$total_page."</a></li>";
	}

	$next_page = $_GET['page_no']+1;
	if($next_page <= $total_page){ 
		echo "<li><a href='?page=show_consultants&page_no=".$next_page."'>Next</a></li>";	
	}
	
	?>
  
                               </div>
		   
		   
		   
		   
		   
            </div>


</div></div>



    <div class="container">
    </div>
	
	<script>
	  function contact(email) {
            //alert(email);
			
			
			if(email.length == 0) {
                        
        
        $('#suggestions_email').fadeOut();
                } 
                else{
        
        $.ajax({
            type: 'POST',     
            url: "view/ajax/email_filter.php",
            data:"email="+email,
            async: true,
            success: function(data) {
                
                $('#suggestions_email').fadeIn();
              $("#suggestionsList_email").html(data);  
                            }
            
                 
                 
             });
                }
			
          }
	    
	    function fillemail(thisValue1)
         {
            $('#email').val(thisValue1);
            setTimeout("jQuery('#suggestions_email').fadeOut();", 100);
             
         }
	</script>
	
					
					

