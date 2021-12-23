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
           <h3 class="block-head">Operator Requests</h3>
	     <?
		// echo $_SESSION["id"];
	     //echo "SELECT * FROM sedna_operator_request_consultants_reg where id='".$_SESSION["id"]."'";
	      $select_count_sdgdfrg=mysql_query("SELECT group_concat(id separator ',') as ids FROM sedna_user_registration_tbl where TL_id='".$_SESSION["candidate_id"]."'");
         $fetch127845= mysql_fetch_array($select_count_sdgdfrg);
		
		
		
	   $operator_id_458 = $fetch127845['ids'];
		
		
	   
	   
	 
	   
	  
	     
	     ?>
          
	    <form  method="post" action=""  enctype="multipart/form-data"><div class="res_tab" >
		<table width="80%" cellpadding="10" class="table-striped" align="center">
			<tbody>
				<tr>
					
					<td class="pall_5">Operator Name:</td>
							  <td class="pall_5"><select name="operator_name" id="operator_name" >
									<option value=''>Select Name</option>
									<?php
									$memberName_query = mysql_query("SELECT * FROM `sedna_user_registration_tbl` order by name") or die(mysql_error());
									while($memberName_row = mysql_fetch_array($memberName_query)){
									?>
									<option value="<?php echo $memberName_row['id'];?>"><?php echo $memberName_row['name'];?></option>
									<?php } ?>
				  </select>
							  </td>
							  
							   <td class="pall_5">Date:</td>
							  <td class="pall_5"><input type="text" name="datepicker" id="datepicker" size="30" autocomplete="off" >
							  </td>
					
				</tr>
				<tr id="submit">
							  
							  <td colspan="6" align="center" class="pall_5">
								<input class="btn" type="submit" name="search" value="Search" />
				  
				  <!--<a class="" href='?page=request_Of_old_consultant&page_no=1'>Clear</a>-->
				  <a href="?page=request_Of_old_consultant&page_no=1" ><input type="button" value="Clear" name="Clear" class="clear"></a>
							</td></tr>
				
				
			</tbody>
		</table>
		</div>
	     </form>
	    
	    <div class="res_tab">
           <table class="table" > <!--id="example"-->
						<thead>	
								<tr>
									<th align="center"><h4>S no.</h4></th>
									<th align="center"><h4>Operator Name</h4></th>
									<th align="center"><h4>Consultant</h4></th>
									<th align="center"><h4>Email Id</h4></th>
									<th align="center"><h4>Title</h4></th>
									<th align="center"><h4>Request Date</h4></th>
									<!--<td><h4>Pass</h4></td>
									<td><h4>Emp Type</h4></td>
									
									<td><h4>Contact</h4></td>
                                    <td><h4>Edit</h4></td>
									<td><h4>Delete</h4></td>-->
									<th align="center"><h4>Details</h4></th>
									<th align="center"><h4>Status</h4></th>
									
								</tr>
							</thead>
							<tbody>
                               <?php
					  
					  $rows='20';
				  if(isset($_GET['page_no'])){
				  $page_no=$_GET['page_no'];
				  }else{
				  $page_no='1';	
				  }
				  $first_page=$rows*($page_no-1);
				  
				  if(isset($_POST['search']))
				  {
					$operator_name = $_REQUEST['operator_name'];
					$datepicker = $_REQUEST['datepicker'];
					$date_filter = strtotime($datepicker);
					
					if($operator_name!=''){
					
					$where =" where operator_id ='$operator_name' && status='1'";
						
					}
					
					elseif($date_filter !=''){
						
					$where =" where change_date ='$date_filter' && status='1'";
						
					}
					
				  }else{
					
					$where ="where operator_id in($operator_id_458)  &&  status=''  "; /*ORDER BY status ASC*/
					 
				  }
				  
					 $limit ="limit $first_page,$rows ";  
					  
					  
					
					//$i = $limit*($page-1)+1;
					
					
					
					$i = '1';
					
			 	$select = "SELECT * FROM sedna_operator_request_consultants $where $limit";
		          
				
				$pagination_sql = "SELECT * FROM sedna_operator_request_consultants $limit";
				
				$que_select = mysql_query($select) or die(mysql_error());
					
					
					while($data_fetch = mysql_fetch_array($que_select)){
						
					//	echo "SELECT COUNT(consultant_id) as total FROM sedna_operator_request_consultants where consultant_id='".$data_fetch['consultant_id']."'";
					//	
					//	echo "<pre>";
					//print_r($data_fetch);
					
						
$select_count=mysql_query("SELECT COUNT(consultant_id) as total FROM sedna_operator_request_consultants where consultant_id='".$data_fetch['consultant_id']."'");
         $fetch12= mysql_fetch_array($select_count);
       if($fetch12['total']>1)
       {
					
					
						
						//echo $emp['id'];
				 
					
					 
					?>
       
 
        
            <tr>
							<td align="center"><?php echo $i; ?></td>
							<td align="center"><?php
                            $opt_id=$data_fetch['operator_id'];
							$consultant_id=$data_fetch['consultant_id'];
                           $select_operator= mysql_query("select * from sedna_user_registration_tbl where id='$opt_id'");
                            $fetch_operator=mysql_fetch_array($select_operator);
                            echo ucfirst($fetch_operator['name']);
                            
                             ?></td>
							
							<td align="center"><?php $popup = mysql_query("SELECT * FROM `sebna_profile_tbl` WHERE reg_id = $consultant_id");
	  $show1 = mysql_fetch_array($popup);
	  echo ucfirst( $show1['first_name']." ".$show1['middel_name']." ".$show1['last_name']);
      
       
	
	 ?></td>
							<td align="center"><?php  $popup1 = mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` WHERE id = $consultant_id");
	  $show11 = mysql_fetch_array($popup1);
	  echo $show11['email'];
	  $old_cv_name=$show11['cv'];
        ?></td>
			<td align="center"><?php $popup = mysql_query("SELECT * FROM `sebna_profile_tbl` WHERE reg_id = $consultant_id");
	  $show1 = mysql_fetch_array($popup);
	  echo ucfirst( $show1['position']);
      
       
	
	 ?></td>					
							
							
							<td align="center"><?php echo $new_date = date('d-m-Y', $data_fetch['change_date']); ?></td>
							
						<td align="center"><a href="<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon btn-primary1" onClick="return hs.htmlExpand(this , {width:800})"  >View</a>
						<!--hislide div-->
					<div class="highslide-maincontent" style="margin:5px;">
				 <form action="" method="post">
             <table class="table table-striped" width="50%" cellpadding="10">
				   <?php
                  // echo $emp['id'];
                   // $i = $limit*($page-1)+1;
				   
				   //echo "SELECT * FROM `sedna_operator_request_consultants` WHERE id = '".$data_fetch['id']."'";
	  $popup = mysql_query("SELECT * FROM `sedna_operator_request_consultants` WHERE id = '".$data_fetch['id']."'");
	  $show = mysql_fetch_array($popup);
      
    
       $new_value= $show['new_value'];
   // echo "<pre>";
      $old_val=unserialize($show['old_value']);
     //print_r($old_val);
      
      count($old_val);
    
      $new_value_array=unserialize($new_value);
  // print_r($new_value_array);

//array_pop($new_value_array);
      
      
	  
	
      
      
      ?>
      
			
      
        <tr>
				  <th></th>
				  <th>New Values</th>
				  <th>Old Values</th>
			</tr>
     <!-- <tr>
				  <td>ID</td>
				  <td><?php if (array_key_exists('reg_id', $new_value_array)) {
       echo    $new_value_array[reg_id];
       }?></td>
			</tr>-->
		
	 
	   <?php
   $select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$consultant_id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		 $cv_name=  $fetch_upload_temp['cv'];
         ?>
		<tr>
			<th>Resume</th><td><a download="../Operator/upload_doc/<?php echo $cv_name;?>" href="" >Download</a></td>
			<td><a download="../Operator/upload_doc/<?php echo $old_cv_name;?>" href="" >Download</a></td>
		</tr>
		
		<?php   } ?>
	 
	 
	 <?php  if (array_key_exists('first_name', $new_value_array)) { ?>
			<tr>
				  <th>First Name</th>
                  <td><?php  if (array_key_exists('first_name', $new_value_array)) {
       echo    $new_value_array[first_name];
       } ?></td>
				  <td><?php  if (array_key_exists('first_name', $old_val)) {
       echo    $old_val[first_name];
       } ?></td>
			</tr>
			<?php
	 }
	 if (array_key_exists('middel_name', $new_value_array)) { ?>
			<tr>
				  <th>Middel Name</th>
                  <td><?php  if (array_key_exists('middel_name', $new_value_array)) {
       echo    $new_value_array[middel_name];
       } ?></td>
				  <td><?php  if (array_key_exists('middel_name', $old_val)) {
       echo    $old_val[middel_name];
       } ?></td>
			</tr>
			
			
			
			
			<?php
			}
			if (array_key_exists('last_name', $new_value_array)) { ?>
            <tr>
				  <th>Last Name</th>
                  <td><?php if (array_key_exists('last_name', $new_value_array)) {
       echo    $new_value_array[last_name];
       } ?></td>
				    <td><?php  if (array_key_exists('last_name', $old_val)) {
       echo    $old_val[last_name];
       } ?></td>
			</tr>
			<?php }
			 if (array_key_exists('email', $new_value_array)) { ?>
			<tr>
				  <th>Email</th>
                  <td><?php if (array_key_exists('email', $new_value_array)) {
       echo    $new_value_array[email];
       } ?></td>
				  <td><?php  if (array_key_exists('email', $old_val)) {
       echo    $old_val[email];
       } ?></td>
			</tr>
			<?php }
				  if (array_key_exists('phone_no', $new_value_array)) { ?>
			<tr>
				  <th>Phone No.</th>
                  <td><?php
				  if (array_key_exists('phone_no', $new_value_array)) {
       echo  $new_value_array[phone_no];
       } ?></td>
				  <td><?php  if (array_key_exists('phone_no', $old_val)) {
       echo    $old_val[phone_no];
       } ?></td>
			</tr>
			<?php
				  }
       if (array_key_exists('city', $new_value_array)) { ?>
			<tr>
				  <th>City</th>
                  <td><?php   
       if (array_key_exists('city', $new_value_array)) {
       echo    $new_value_array[city];
       }  ?></td>
				   <td><?php  if (array_key_exists('city', $old_val)) {
       echo    $old_val[city];
       } ?></td>
			</tr>
			<?php }
				   if (array_key_exists('country', $new_value_array)) { ?>
			<tr>
				  <th>Country</th>
                  <td><?php
				   if (array_key_exists('country', $new_value_array)) {
        $country_code =    $new_value_array[country];
	     $select_country_name=mysql_query("select * from country_master WHERE country_code ='$country_code'");
				 $fetch_country_name= mysql_fetch_array($select_country_name);
				 echo $fetch_country_name['country_name'];
       }
				
				 
				  ?></td>
				  <td><?php
				   if (array_key_exists('country', $old_val)) {
        $country_code1 =    $old_val[country];
	     $select_country_name=mysql_query("select * from country_master WHERE country_code ='$country_code'");
				 $fetch_country_name= mysql_fetch_array($select_country_name);
				 echo $fetch_country_name['country_name'];
       }
				
				 
				  ?></td>
			</tr>
			
			<?php }
				   if (array_key_exists('postal_code', $new_value_array)) { ?>
			<tr>
				  <th>Postal Code</th>
                  <td><?php
				   if (array_key_exists('postal_code', $new_value_array)) {
       echo    $new_value_array[postal_code];
       }?></td>
				  <td><?php
				   if (array_key_exists('postal_code', $old_val)) {
       echo    $old_val[postal_code];
       }?></td>
			</tr>
			<?php
				   }
				   if (array_key_exists('searchable', $new_value_array)) { ?>
			<tr>
				  <th>Searchable</th>
                  <td><?php
				   if (array_key_exists('searchable', $new_value_array)) {
       echo    $new_value_array[searchable];
       }?></td>
				  <td><?php
				   if (array_key_exists('searchable', $old_val)) {
       echo    $old_val[searchable];
       }?></td>
			</tr>
			<?php }
				   if (array_key_exists('relocate', $new_value_array)) { ?>
			<tr>
				  <th>Relocate</th>
                  <td><?php
				   if (array_key_exists('relocate', $new_value_array)) {
       echo    $new_value_array[relocate];
       }?></td>
				  <td><?php
				   if (array_key_exists('relocate', $old_val)) {
       echo    $old_val[relocate];
       }?></td>
			</tr>
			<?php } if (array_key_exists('security', $new_value_array)) { ?>
			<tr>
				  <th>Security Clearance</th>
                  <td><?php
				   if (array_key_exists('security', $new_value_array)) {
       echo    $new_value_array[security];
       }?></td>
				  <td><?php
				   if (array_key_exists('security', $old_val)) {
       echo    $old_val[security];
       }?></td>
			</tr>
			
			
			
			
			
		<?php } if (array_key_exists('employment_type', $new_value_array)) { ?>	
			
			
			<tr>
				  <th>Employment Type</th>
                   <td><?php  if (array_key_exists('employment_type', $new_value_array)) {
        $employment_type=   $new_value_array[employment_type];
		// count($employment_type);
		$emp_type='';
	   for($ety=0; $ety<count($employment_type);$ety++)
	   {
			
		$employment_type12=	mysql_query("select * from sebna_employment_type where id='$employment_type[$ety]'");
		$employment_type_fetch=	mysql_fetch_array($employment_type12);
		if($emp_type!='')
		{
		 $emp_type .= ", ". $employment_type_fetch['employment_type'];
		}
		else
		{
			$emp_type .=  $employment_type_fetch['employment_type'];
			
		}
	   }
	   echo $emp_type;
       }?></td>
				   
		<td><?php  if (array_key_exists('employment_type', $old_val)) {
        $employment_type=   $old_val[employment_type];
		// count($employment_type);
		$emp_type='';
	   for($ety=0; $ety<count($employment_type);$ety++)
	   {
			
		$employment_type12=	mysql_query("select * from sebna_employment_type where id='$employment_type[$ety]'");
		$employment_type_fetch=	mysql_fetch_array($employment_type12);
		if($emp_type!='')
		{
		 $emp_type .= ", ". $employment_type_fetch['employment_type'];
		}
		else
		{
			$emp_type .=  $employment_type_fetch['employment_type'];
			
		}
	   }
	   echo $emp_type;
       }?></td>		   
				   
			</tr>
			
	<?php } if (array_key_exists('work_authorization', $new_value_array)) { ?>		
			<tr>
				  <th>Work Authorization</th>
                  <td><?php  if (array_key_exists('work_authorization', $new_value_array)) {
        $work_authorization=   $new_value_array[work_authorization];
	   
	   $select_work_authorization_name=mysql_query("select * from sebna_work_authorization` WHERE id ='$work_authorization'");
				 $fetch_work_authorization_name= mysql_fetch_array($select_work_authorization_name);
				 echo $fetch_work_authorization_name['work_authorization'];
       }?></td>
				  
			<td><?php  if (array_key_exists('work_authorization', $old_val)) {
        $work_authorization=   $old_val[work_authorization];
	   
	   $select_work_authorization_name=mysql_query("select * from sebna_work_authorization` WHERE id ='$work_authorization'");
				 $fetch_work_authorization_name= mysql_fetch_array($select_work_authorization_name);
				 echo $fetch_work_authorization_name['work_authorization'];
       }?></td>	  
				  
				  
				  
			</tr>
			
			
		<?php } if (array_key_exists('position', $new_value_array)) { ?>
			
			<tr>
				  <th>Position</th>
                  <td><?php if (array_key_exists('position', $new_value_array)) {
       echo    $new_value_array[position];
       } ?></td>
				  <td><?php if (array_key_exists('position', $old_val)) {
       echo    $old_val[position];
       } ?></td>
			</tr>
		<?php } if (array_key_exists('experience', $new_value_array)) { ?>	
			
			
			
			<tr>
				  <th>Experience</th>
                  <td><?php if (array_key_exists('experience', $new_value_array)) {
       echo    $new_value_array[experience];
       } ?></td>
				  <td><?php if (array_key_exists('experience', $old_val)) {
       echo    $old_val[experience];
       } ?></td>
			</tr>
		<?php } if (array_key_exists('salary', $new_value_array)) { ?>	
			<tr>
				  <th>Salary</th>
                   <td><?php  if (array_key_exists('salary', $new_value_array)) {
       echo    $new_value_array[salary];
       }?></td>
				  <td><?php  if (array_key_exists('salary', $old_val)) {
       echo    $old_val[salary];
       }?></td>  
				   
			</tr>
		<?php  } if (array_key_exists('hourly_rate', $new_value_array)) { ?>	
			
			
			<tr>
				  <th>Hourly Rate</th>
                   <td><?php  if (array_key_exists('hourly_rate', $new_value_array)) {
       echo    $new_value_array[hourly_rate];
       }?></td>
				   <td><?php  if (array_key_exists('hourly_rate', $old_val)) {
       echo    $old_val[hourly_rate];
       }?></td>
			</tr>
		<?php }
		
		if($new_value_array[job_title]!='') { ?>
		
			
			<tr>
				  <th>Work Experience</th>
                   <td>
                  <table>
						<tr>
						<th>Job Title</th>
                        <th>Comapnay</th>
						<th>Start Date</th>
						<th>End Date</th>
						</tr>
						
				  
				   
				   <?php  if (array_key_exists('job_title', $new_value_array)) {
						
				  $new_value_array[job_title];
				  
              $job_title_count=	  count($new_value_array[job_title]);
               $comapnay_count=	  count($new_value_array[comapnay]);
			 $start_date_count=	  count($new_value_array[start_date]);
			 $end_date_count=	  count($new_value_array[end_date]);
             
			if($job_title_count>$start_date_count && $end_date_count && $comapnay_count)
			{
				   $big3= $new_value_array[job_title];
				  
			}
            else if($comapnay_count>$job_title_count && $start_date_count && $end_date_count )
			{
				    $big3 =$new_value_array[comapnay];
			}
            
			else if($start_date_count>$job_title_count && $end_date_count && $comapnay_count )
			{
				    $big3 = $new_value_array[start_date];
			}
            
           
			else if($end_date_count>$job_title_count && $start_date_count && $comapnay_count )
			{
				    $big3 =$new_value_array[end_date];
			}
			else{
				   $big3= $new_value_array[job_title];
			}
			 $big3;
				  
				  
				  
				  if(!empty($big3))
				 {
			
				  
				//  print_r($big);
				  
				
					foreach ($big3 as $key => $value)
					{
						
						 $job_titlename= $new_value_array[job_title][$key];
						 $in_comapnay=$new_value_array[comapnay][$key];
					 $in_start_date=$new_value_array[start_date][$key];
				    $in_end_date=$new_value_array[end_date][$key];
						
					
						
						
					$selectskyl=mysql_query("select * from sebna_work_experience where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			
			
			$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_job_title=$fetch_sk_data['job_title'];
			$fetch_comapnay=$fetch_sk_data['comapnay'];
			$fetch_start_date=$fetch_sk_data['start_date'];
			$fetch_end_date=$fetch_sk_data['end_date'];
			
			       $job_titlename= $new_value_array[job_title][$key];
						 $in_comapnay=$new_value_array[comapnay][$key];
					 $in_start_date=$new_value_array[start_date][$key];
				    $in_end_date=$new_value_array[end_date][$key];
		?>
		
		
	<tr>
	  <td><?php echo ($job_titlename!='')? $job_titlename : $fetch_job_title; ?></td>
	  <td><?php echo ($in_comapnay!='')? $in_comapnay : $fetch_comapnay;  ?></td>
	  <td><?php echo ($in_start_date!='')? $in_start_date : $fetch_start_date; ?> </td>
	   <td><?php echo ($in_end_date!='')? $in_end_date : $fetch_end_date; ?> </td>
	</tr>	
					 	
				
					
					
	<?php 					
				
	  }
	  else
	  { ?>
	  
		<tr>
	  <td><?php echo $job_titlename; ?></td>
	  <td><?php echo	 $in_comapnay;  ?></td>
	  <td><?php echo $in_start_date; ?> </td>
	  <td><?php echo $in_end_date; ?> </td>
	</tr>
		
			
<?php 			
	  }
	  
	               }
	
					}

	   
				 }
				
			   
				   
	   ?>
	    </table> 
                   
                   
                   
                   
                   
                   
             </td>
				   
				   
			<td>
			
                  <table>
						<tr>
						<th>Job Title</th>
                        <th>Comapnay</th>
						<th>Start Date</td>
						<th>End Date</th>
						</tr>
						
				  
				   
				   <?php  if (array_key_exists('job_title', $old_val) OR array_key_exists('comapnay', $old_val) Or array_key_exists('start_date', $old_val) Or array_key_exists('end_date', $old_val)) {
						
				  $old_val[job_title];
				  
              $job_title_count=	  count($old_val[job_title]);
               $comapnay_count=	  count($old_val[comapnay]);
			 $start_date_count=	  count($old_val[start_date]);
			 $end_date_count=	  count($old_val[end_date]);
             
			if($job_title_count>$start_date_count && $end_date_count && $comapnay_count)
			{
				   $big3= $old_val[job_title];
				  
			}
            else if($comapnay_count>$job_title_count && $start_date_count && $end_date_count )
			{
				    $big3 =$old_val[comapnay];
			}
            
			else if($start_date_count>$job_title_count && $end_date_count && $comapnay_count )
			{
				    $big3 = $old_val[start_date];
			}
            
           
			else if($end_date_count>$job_title_count && $start_date_count && $comapnay_count )
			{
				    $big3 =$old_val[end_date];
			}
			else{
				   $big3= $old_val[job_title];
			}
			 $big3;
				  
				  
				  
				  if(!empty($big3))
				 {
			
				  
				//  print_r($big);
				  
				
					foreach ($big3 as $key => $value)
					{
						
						 $job_titlename= $old_val[job_title][$key];
						 $in_comapnay=$old_val[comapnay][$key];
					 $in_start_date=$old_val[start_date][$key];
				    $in_end_date=$old_val[end_date][$key];
						
					
						
						
					$selectskyl=mysql_query("select * from sebna_work_experience where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			
			
			$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_job_title=$fetch_sk_data['job_title'];
			$fetch_comapnay=$fetch_sk_data['comapnay'];
			$fetch_start_date=$fetch_sk_data['start_date'];
			$fetch_end_date=$fetch_sk_data['end_date'];
			
			       $job_titlename= $old_val[job_title][$key];
						 $in_comapnay=$old_val[comapnay][$key];
					 $in_start_date=$old_val[start_date][$key];
				    $in_end_date=$old_val[end_date][$key];
		?>
		
		
	<tr>
	  <td><?php echo ($job_titlename!='')? $job_titlename : $fetch_job_title; ?></td>
	  <td><?php echo ($in_comapnay!='')? $in_comapnay : $fetch_comapnay;  ?></td>
	  <td><?php echo ($in_start_date!='')? $in_start_date : $fetch_start_date; ?> </td>
	   <td><?php echo ($in_end_date!='')? $in_end_date : $fetch_end_date; ?> </td>
	</tr>	
					 	
				
					
					
	<?php 					
				
	  }
	  else
	  { ?>
	  
		<tr>
	  <td><?php echo $job_titlename; ?></td>
	  <td><?php echo	 $in_comapnay;  ?></td>
	  <td><?php echo $in_start_date; ?> </td>
	  <td><?php echo $in_end_date; ?> </td>
	</tr>
		
			
<?php 			
	  }
	  
	               }
	
					}

	   
				 }
				
			   
				   
	   ?>
	    </table>
			
			
			
			
			
			
			
			
			
			</td>	   
				   
			   
			</tr>
			
	<?php
		}
	if (array_key_exists('skill_name', $new_value_array)) {
	?>
			
			
			
			<tr>
				  <th>Skills</th>
                   <td>
				   <table>
						<tr>
						<th>Skill Name</th>
						<th>Year Exp</th>
						<th>Last Used</th>
						</tr>
						
				  
				   
				   <?php  if (array_key_exists('skill_name', $new_value_array)) {
						
				  $new_value_array[skill_name];
				  
              $skill_name_count=	  count($new_value_array[skill_name]);
			 $year_exp_count=	  count($new_value_array[year_exp]);
			 $last_used_count=	  count($new_value_array[last_used]);
			if($skill_name_count>$year_exp_count && $last_used_count )
			{
				   $big= $new_value_array[skill_name];
				  
			}
			else if($year_exp_count>$skill_name_count && $last_used_count )
			{
				    $big = $new_value_array[year_exp];
			}
			else if($last_used_count>$skill_name_count && $year_exp_count )
			{
				    $big =$new_value_array[last_used];
			}
			else{
				   $big= $new_value_array[skill_name];
			}
			 $big;
				  
				  
				  
				  if(!empty($big))
				 {
			
				  
				//  print_r($big);
				  
				
					foreach ($big as $key => $value)
					{
						
						 $in_skill_name= $new_value_array[skill_name][$key];
					 $in_yer=$new_value_array[year_exp][$key];
				    $in_used=$new_value_array[last_used][$key];
						
					
						
						//echo "select * from sedna_skills where reg_id='$consultant_id' && id='$key'";
					$selectskyl=mysql_query("select * from sedna_skills where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_skill_name=$fetch_sk_data['skill_name'];
			$fetch_year_exp=$fetch_sk_data['year_exp'];
			$fetch_last_used=$fetch_sk_data['last_used'];
			
			       $in_skill_name= $new_value_array[skill_name][$key];
					$in_yer=$new_value_array[year_exp][$key];
				   $in_used=$new_value_array[last_used][$key];
		?>
		
		
	<tr>
	  <td><?php echo ($in_skill_name!='')? $in_skill_name : $fetch_skill_name; ?></td>
	  <td><?php echo ($in_yer!='')? $in_yer : $fetch_year_exp;  ?></td>
	  <td><?php echo ($in_used!='')? $in_used : $fetch_last_used; ?> </td>
	</tr>	
					 	
				
					
					
	<?php 					
				
	  }
	  else
	  { ?>
	  
		<tr>
	  <td><?php echo $in_skill_name; ?></td>
	  <td><?php echo	 $in_yer;  ?></td>
	  <td><?php echo $in_used; ?> </td>
	</tr>
		
			
<?php 			
	  }
	  
	               }
	
					}

	   
				 }
				
			   
				   
	   ?>
	    </table>
				   </td>
				   
				<td>
				 <table>
						<tr>
						<th>Skill Name</th>
						<th>Year Exp</th>
						<th>Last Used</th>
						</tr>
				
				<?php
				
				if (array_key_exists('skill_name', $old_val) OR array_key_exists('year_exp', $old_val) OR array_key_exists('last_used', $old_val)) {
				
               $skill_name_count=	 count($old_val[skill_name]);
			  $year_exp_count=	  count($old_val[year_exp]);
			  $last_used_count=	  count($old_val[last_used]);
			  
			   
			  
			if($skill_name_count>$year_exp_count && $last_used_count )
			{
				   $big= $old_val[skill_name];
				  
			}
			else if($year_exp_count>$skill_name_count && $last_used_count )
			{
				    $big = $old_val[year_exp];
			}
			else if($last_used_count>$skill_name_count && $year_exp_count )
			{
				    $big =$old_val[last_used];
			}
			else{
				  if($old_val[skill_name]!='')
				  {
				   $big=$old_val[skill_name];
				  }
				  if($old_val[year_exp]!='')
				  {
				   $big=$old_val[year_exp];
				  }
				   if($old_val[last_used]!='')
				  {
				   $big=$old_val[last_used];
				  }
				  
			}
			  $big;
				  
				  
				  
				  if(!empty($big))
				 {
			
				
					foreach ($big as $key => $value)
					{
					
					$old_val[skill_name][$key];
					$old_val[year_exp][$key];
				   $old_val[last_used][$key];	
						
					
						//echo "select * from sedna_skills where reg_id='$consultant_id' && id='$key'";
				$selectskyl=mysql_query("select * from sedna_skills where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {		
				$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_skill_name=$fetch_sk_data['skill_name'];
			$fetch_year_exp=$fetch_sk_data['year_exp'];
			$fetch_last_used=$fetch_sk_data['last_used'];
			
			       $in_skill_name= $old_val[skill_name][$key];
					$in_yer=$old_val[year_exp][$key];
				   $in_used=$old_val[last_used][$key];
				   ?>
				   <tr>
				   <td><?php echo ($in_skill_name!='')? $in_skill_name : $fetch_skill_name;  ?></td>
				   <td><?php echo ($in_yer!='')? $in_yer : $fetch_year_exp; ?></td>
				   <td><?php  echo ($in_used!='')? $in_used : $fetch_last_used; ?></td>
					</tr>
				<?php 
				
			
	  }	
	            
				   }
	
					}

				 }
	
	   ?>
				 </table>
				</td>   
				   
				   
				   
			</tr>
		<?php  }
		if (array_key_exists('education_type', $new_value_array) OR array_key_exists('institution', $new_value_array) OR array_key_exists('edu_city', $new_value_array) OR array_key_exists('edu_country', $new_value_array)) {  ?>	
			
		<tr>
				  <th>Education</th>
                   <td>
				   
				   <table>
						<tr>
						<th>Education</th>
						<th>Institution</th>
						<th>City</th>
						<th>Country</th>
						</tr>
						
				  
				   
				   <?php  if (array_key_exists('education_type', $new_value_array) OR array_key_exists('institution', $new_value_array) OR array_key_exists('edu_city', $new_value_array) OR array_key_exists('edu_country', $new_value_array)) {
						
				  $new_value_array[education_type];
				  
              $education_type=	  count($new_value_array[education_type]);
			 $institution=	  count($new_value_array[institution]);
			 $edu_city=	  count($new_value_array[edu_city]);
			  $edu_country=	  count($new_value_array[edu_country]);
			  
			
			  
			if($education_type>$institution && $edu_city && $edu_country)
			{
				   $big= $new_value_array[education_type];
				  
			}
			else if($institution>$skill_name_count && $last_used_count )
			{
				    $big = $new_value_array[institution];
			}
			else if($edu_city>$skill_name_count && $year_exp_count )
			{
				    $big =$new_value_array[edu_city];
			}
			else if ($edu_country > $education_type && $institution && $edu_city) {
				   $big= $new_value_array[edu_country];
			}
			else
			{
				   $big= $new_value_array[education_type];
			}
			 $big;
				  
				  
				  
				  if(!empty($big))
				 {
			
				  
				//  print_r($big);
				  
				
					foreach ($big as $key => $value)
					{
						
						
					  $education_type=	  $new_value_array[education_type][$key];
					     $education_type=	  $new_value_array[education_type][$key];
				$select_education1 =mysql_query("select * from sedna_education_master where id=$education_type");
	$fetch_education1=mysql_fetch_array($select_education1);	
			$fetch_education_name1=$fetch_education1['education_type'];	
			 $institution=	  $new_value_array[institution][$key];
			 $edu_city=	  $new_value_array[edu_city][$key];
			  $edu_country=	  $new_value_array[edu_country][$key];	
						
						
						
						//echo "select * from sedna_education where reg_id='$consultant_id' && id='$key'";
					$selectskyl=mysql_query("select * from sedna_education where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			
			
			$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_education_id=$fetch_sk_data['education'];
	$select_education =mysql_query("select * from sedna_education_master where id=$fetch_education_id");
	$fetch_education=mysql_fetch_array($select_education);
	$fetch_education_name=$fetch_education['education_type'];
			$fetch_institution=$fetch_sk_data['institution'];
			$fetch_city=$fetch_sk_data['city'];
			$fetch_country=$fetch_sk_data['country'];
			
			        $education_type=	  $new_value_array[education_type][$key];
				$select_education1 =mysql_query("select * from sedna_education_master where id=$education_type");
	$fetch_education1=mysql_fetch_array($select_education1);	
			$fetch_education_name1=$fetch_education1['education_type'];		
			 $institution=	  $new_value_array[institution][$key];
			 $edu_city=	  $new_value_array[edu_city][$key];
			  $edu_country=	  $new_value_array[edu_country][$key];	
		?>
		
		
	<tr>
	  <td><?php echo ($education_type!='')? $fetch_education_name1 : $fetch_education_name; ?></td>
	  <td><?php echo ($institution!='')? $institution : $fetch_institution;  ?></td>
	  <td><?php echo ($edu_city!='')? $edu_city : $fetch_city; ?> </td>
	  <td><?php echo ($edu_country!='')? $edu_country : $fetch_country; ?> </td>
	</tr>	
					 	
				
					
					
	<?php 					
				
	  }
	  else
	  { ?>
	  
		<tr>
	  <td><?php echo $fetch_education_name1; ?></td>
	  <td><?php echo	$institution;  ?></td>
	  <td><?php echo $edu_city; ?> </td>
	  <td><?php echo $edu_country; ?> </td>
	</tr>
		
			
<?php 			
	  }
	  
	               }
	
					}

	   
				 }
				
			   
				   
	   ?>
	    </table> 
				   
	
	   </td>
				   
			 <td>
             
             
             
             <table>
						<tr>
						<th>Education</th>
						<th>Institution</th>
						<th>City</th>
						<th>Country</th>
						</tr>
						
				  
				   
				   <?php  if (array_key_exists('education_type', $old_val) OR array_key_exists('institution', $old_val) OR array_key_exists('edu_city', $old_val) OR array_key_exists('edu_country', $old_val)) {
						
				  $old_val[education_type];
				  
              $education_type=	  count($old_val[education_type]);
			 $institution=	  count($old_val[institution]);
			 $edu_city=	  count($old_val[edu_city]);
			  $edu_country=	  count($old_val[edu_country]);
			  
			
			  
			if($education_type>$institution && $edu_city && $edu_country)
			{
				   $big= $old_val[education_type];
				  
			}
			else if($institution>$skill_name_count && $last_used_count )
			{
				    $big = $old_val[institution];
			}
			else if($edu_city>$skill_name_count && $year_exp_count )
			{
				    $big =$old_val[edu_city];
			}
			else if ($edu_country > $education_type && $institution && $edu_city) {
				   $big= $old_val[edu_country];
			}
			else
			{
				   $big= $old_val[education_type];
			}
			 $big;
				  
				  
				  
				  if(!empty($big))
				 {
			
				  
				//  print_r($big);
				  
				
					foreach ($big as $key => $value)
					{
						
						
					  $education_type=	  $old_val[education_type][$key];
					     $education_type=	  $old_val[education_type][$key];
				$select_education1 =mysql_query("select * from sedna_education_master where id=$education_type");
	$fetch_education1=mysql_fetch_array($select_education1);	
			$fetch_education_name1=$fetch_education1['education_type'];	
			 $institution=	  $old_val[institution][$key];
			 $edu_city=	  $old_val[edu_city][$key];
			  $edu_country=	  $old_val[edu_country][$key];	
						
						
						
						//echo "select * from sedna_skills where reg_id='$consultant_id' && id='$key'";
					$selectskyl=mysql_query("select * from sedna_education where reg_id='$consultant_id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			$fetch_sk_data=mysql_fetch_array($selectskyl);
			$fetch_education_id=$fetch_sk_data['education'];
	$select_education =mysql_query("select * from sedna_education_master where id=$fetch_education_id");
	$fetch_education=mysql_fetch_array($select_education);
	$fetch_education_name=$fetch_education['education_type'];
			$fetch_institution=$fetch_sk_data['institution'];
			$fetch_city=$fetch_sk_data['city'];
			$fetch_country=$fetch_sk_data['country'];
			
			        $education_type=	  $old_val[education_type][$key];
				$select_education1 =mysql_query("select * from sedna_education_master where id=$education_type");
	$fetch_education1=mysql_fetch_array($select_education1);	
			$fetch_education_name1=$fetch_education1['education_type'];		
			 $institution=	  $old_val[institution][$key];
			 $edu_city=	  $old_val[edu_city][$key];
			  $edu_country=	  $old_val[edu_country][$key];	
		?>
		
		
	<tr>
	  <td><?php echo ($education_type!='')? $fetch_education_name1 : $fetch_education_name; ?></td>
	  <td><?php echo ($institution!='')? $institution : $fetch_institution;  ?></td>
	  <td><?php echo ($edu_city!='')? $edu_city : $fetch_city; ?> </td>
	  <td><?php echo ($edu_country!='')? $edu_country : $fetch_country; ?> </td>
	</tr>	
					 	
				
					
					
	<?php 					
				
	  }
	  else
	  { ?>
	  
		<tr>
	  <td><?php echo $fetch_education_name1; ?></td>
	  <td><?php echo	$institution;  ?></td>
	  <td><?php echo $edu_city; ?> </td>
	  <td><?php echo $edu_country; ?> </td>
	</tr>
		
			
<?php 			
	  }
	  
	               }
	
					}

	   
				 }
                 
				
                
                
			   
				   
	   ?>
	    </table>
             
             
             
        
             
           </td>	   
				   
				   
				   
			</tr>		
			
	 <?php } ?>		
				
			 </table>
				  </form>
                   
                </div></td>
						<!--hislide div-->
						 <td align="center">
							<?php if($data_fetch['status']=='0'){?>
								<a href="?page=request_Of_old_consultant&id=<?php echo $consultant_id; ?>" 
								 class="btn btn-default btn-sm btn-icon" onclick="return confirm('Do you really want to Approved  it ?');">Not Approved</a>
								<?php
								}
								if($data_fetch['status']=='1')
								{
								?>
								<a href="?page=request_Of_old_consultant&id=<?php echo $consultant_id; ?>" 
								 class="btn btn-default btn-sm btn-icon" onclick="return confirm('Do you really want to De-activate  it ?');">Approved</a>
								<?php }?>
							</td>
			</tr>
			
				          
			
       <?php
						$i++;
	   }			
						$new_value_array = '';
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
			$end_loop = 5;
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
		echo "<li><a href='?page=request_Of_old_consultant&page_no=".$previous."'>Previous</a></li>";
	}
	if($start_loop>1){
		echo "<li><a href='?page=request_Of_old_consultant&page_no=1'>1 </a></li>";
		echo "<li><a href='#'>...</a>";
	}
	for($i=$start_loop;$i<=$end_loop;$i++){
	    $class_active = "";
	  if($i == $get_current_page ){
            
         $class_active = "class = 'active_page'";   
            
        }
		echo "<li ".$class_active."><a href='?page=request_Of_old_consultant&page_no=".$i."'>".$i."  "."</a></li>";	
	}
	$remain_pages = $total_page- $end_loop;
	if($remain_pages>1){
		echo "<li><a href='#'>...</a></li>";
	}
	if($remain_pages>0){
		echo "<li><a href='?page=request_Of_old_consultant&page_no=$total_page'>".$total_page."</a></li>";
	}

	$next_page = $_GET['page_no']+1;
	if($next_page <= $total_page){ 
		echo "<li><a href='?page=request_Of_old_consultant&page_no=".$next_page."'>Next</a></li>";	
	}
	
	?>
  
                               </div>    
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
	<?php
					
					//if(isset($_GET['id']))
					//{
					//$id=$_GET['id'];
					//$select=mysql_query("select * from sedna_operator_request_consultants where id=$id");
					//while($row=mysql_fetch_object($select))
					//{
					//$status_var=$row->status;
					//if($status_var=='0')
					//{
					//$status_state=1;
					//}
					//else
					//{
					//$status_state=0;
					//}
					//$update=mysql_query("update sedna_operator_request_consultants set status='$status_state' where id='$id' ");
					//if($update)
					//{
					//header("Location:?page=request_Of_new_consultant");
					//}
					//else
					//{
					//echo mysql_error();
					//}
					//}
					//
					//}
					
					if(isset($_GET['id']))
					{
										
				 	$id=$_GET['id'];
					
					$select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		 $cv_name=  $fetch_upload_temp['cv'];
	  mysql_query("update sedna_operator_request_consultants_reg set cv='$cv_name' where id='$id'");
	  mysql_query("delete from sedna_temp_upload where consultant_id='$id'");
		 }
					
					
					
			$select_ap=mysql_query("select * from sedna_operator_request_consultants where consultant_id='$id' && status='0'");
			$fetch_ap=mysql_fetch_array($select_ap);
		//	echo "<pre>";
			 $new_value_ap= unserialize($fetch_ap['new_value']);
		//print_r($new_value_ap);
	
			if(!empty($new_value_ap))
			{
				
			$data_set='';
			if (array_key_exists('first_name', $new_value_ap)) {
				 $first_name=  $new_value_ap[first_name];
				 if($data_set!='')
				 {
				$data_set .= ",first_name='$first_name'";  
				 }
				 else
				 {
				  $data_set .= "first_name='$first_name'";  
				 }
			}
			
			if (array_key_exists('middel_name', $new_value_ap)) {
				echo "fs". $middel_name=  $new_value_ap[middel_name];
				 if($data_set!='')
				 {
				$data_set .= ",middel_name='$middel_name'";  
				 }
				 else
				 {
				  $data_set .= "middel_name='$middel_name'";  
				 }
			}
			
			
			
			if (array_key_exists('last_name', $new_value_ap)) {
				 $last_name=  $new_value_ap[last_name];
				 if($data_set!='')
				 {
				$data_set .= ",last_name='$last_name'";  
				 }
				 else
				 {
				  $data_set .= "last_name='$last_name'";  
				 }
			}
			if (array_key_exists('country', $new_value_ap)) {
				 $country=  $new_value_ap[country];
				 if($data_set!='')
				 {
				$data_set .= ",country='$country'";  
				 }
				 else
				 {
				  $data_set .= "country='$country'";  
				 }
			}
			
			if (array_key_exists('searchable', $new_value_ap)) {
				 $searchable=  $new_value_ap[searchable];
				 if($data_set!='')
				 {
				$data_set .= ",searchable='$searchable'";  
				 }
				 else
				 {
				  $data_set .= "searchable='$searchable'";  
				 }
			}
			else{
			 if($data_set!='')
				 {
				$data_set .= ",searchable='$searchable'";  
				 }
				 else
				 {
				  $data_set .= "searchable='$searchable'";  
				 }
				  
			}
			
			if (array_key_exists('city', $new_value_ap)) {
				 $city=  $new_value_ap[city];
				 if($data_set!='')
				 {
				$data_set .= ",city='$city'";  
				 }
				 else
				 {
				  $data_set .= "city='$city'";  
				 }
			}
			
			if (array_key_exists('position', $new_value_ap)) {
				 $position=  $new_value_ap[position];
				 if($data_set!='')
				 {
				$data_set .= ",position='$position'";  
				 }
				 else
				 {
				  $data_set .= "position='$position'";  
				 }
			}
			
			if (array_key_exists('preferred_location', $new_value_ap)) {
				 $preferred_location=  $new_value_ap[preferred_location];
				 if($data_set!='')
				 {
				$data_set .= ",preferred_location='$preferred_location'";  
				 }
				 else
				 {
				  $data_set .= "preferred_location='$preferred_location'";  
				 }
			}
			
			
			if (array_key_exists('employer_name', $new_value_ap)) {
				 $employer_name=  $new_value_ap[employer_name];
				 if($data_set!='')
				 {
				$data_set .= ",employer_name='$employer_name'";  
				 }
				 else
				 {
				  $data_set .= "employer_name='$employer_name'";  
				 }
			}
			if (array_key_exists('employer_company', $new_value_ap)) {
				 $employer_company=  $new_value_ap[employer_company];
				 if($data_set!='')
				 {
				$data_set .= ",employer_company='$employer_company'";  
				 }
				 else
				 {
				  $data_set .= "employer_company='$employer_company'";  
				 }
			}
			if (array_key_exists('employer_email', $new_value_ap)) {
				 $employer_email=  $new_value_ap[employer_email];
				 if($data_set!='')
				 {
				$data_set .= ",employer_email='$employer_email'";  
				 }
				 else
				 {
				  $data_set .= "employer_email='$employer_email'";  
				 }
			}
			if (array_key_exists('employer_number', $new_value_ap)) {
				 $employer_number=  $new_value_ap[employer_number];
				 if($data_set!='')
				 {
				$data_set .= ",employer_number='$employer_number'";  
				 }
				 else
				 {
				  $data_set .= "employer_number='$employer_number'";  
				 }
			}
			
			
			
			
			
			if (array_key_exists('experience', $new_value_ap)) {
				 $experience=  $new_value_ap[experience];
				 if($data_set!='')
				 {
				$data_set .= ",experience='$experience'";  
				 }
				 else
				 {
				  $data_set .= "experience='$experience'";  
				 }
			}
			
			if (array_key_exists('employment_type', $new_value_ap)) {
				 $employment_type=  $new_value_ap[employment_type];
			      foreach($employment_type as $emp_type)
				  {
						if($emp_data=='')
						{
						 $emp_data=$emp_type;
						}
						else{
							  $emp_data.= ",".$emp_type;
							  
						}
						
				  }
				  
				 if($data_set!='')
				 {
				  
				$data_set .= ",employment_type='$emp_data'";  
				 }
				 else
				 {
				  $data_set .= "employment_type='$emp_data'";  
				 }
			}
			
			
			if (array_key_exists('relocate', $new_value_ap)) {
				 $relocate=  $new_value_ap[relocate];
				 if($data_set!='')
				 {
				$data_set .= ",relocate='$relocate'";  
				 }
				 else
				 {
				  $data_set .= "relocate='$relocate'";  
				 }
			}
			else
			{
				 if($data_set!='')
				 {
				$data_set .= ",relocate='$relocate'";  
				 }
				 else
				 {
				  $data_set .= "relocate='$relocate'";  
				 }  
				  
			}
			
			
			if (array_key_exists('work_authorization', $new_value_ap)) {
				 $work_authorization=  $new_value_ap[work_authorization];
				 if($data_set!='')
				 {
				$data_set .= ",work_authorization='$work_authorization'";  
				 }
				 else
				 {
				  $data_set .= "work_authorization='$work_authorization'";  
				 }
			}
			
			if (array_key_exists('travel', $new_value_ap)) {
				 $travel=  $new_value_ap[travel];
				 if($data_set!='')
				 {
				$data_set .= ",travel='$travel'";  
				 }
				 else
				 {
				  $data_set .= "travel='$travel'";  
				 }
			}
			
			
			
			
			if (array_key_exists('security', $new_value_ap)) {
				 $security=  $new_value_ap[security];
				 if($data_set!='')
				 {
				$data_set .= ",security='$security'";  
				 }
				 else
				 {
				  $data_set .= "security='$security'";  
				 }
			}
			else
			{
				  if($data_set!='')
				 {
				$data_set .= ",security='$security'";  
				 }
				 else
				 {
				  $data_set .= "security='$security'";  
				 }
				  
			}
			
			
			
			
			
			
			
			
			if (array_key_exists('phone_no', $new_value_ap)) {
				 $phone=  $new_value_ap[phone_no];
				 if($data_set!='')
				 {
				  $data_set .= ",phone_no='$phone'";  
				 }
				 else{
				$data_set .= "phone_no='$phone'";  
				 }
			}
			
			if (array_key_exists('salary', $new_value_ap)) {
				 $salary=  $new_value_ap[salary];
				 if($data_set!='')
				 {
				$data_set .= ",salary='$salary'";  
				 }
				 else
				 {
				  $data_set .= "salary='$salary'";  
				 }
			}
			
			if (array_key_exists('hourly_rate', $new_value_ap)) {
				 $hourly_rate=  $new_value_ap[hourly_rate];
				 if($data_set!='')
				 {
				$data_set .= ",hourly_rate='$hourly_rate'";  
				 }
				 else
				 {
				  $data_set .= "hourly_rate='$hourly_rate'";  
				 }
			}
			
			if (array_key_exists('hourly_rate', $new_value_ap)) {
				 $hourly_rate=  $new_value_ap[hourly_rate];
				 if($data_set!='')
				 {
				$data_set .= ",hourly_rate='$hourly_rate'";  
				 }
				 else
				 {
				  $data_set .= "hourly_rate='$hourly_rate'";  
				 }
			}
			
			
			
			if (array_key_exists('skills_remove_ids', $new_value_ap)) {
				 $skills_remove_ids=  $new_value_ap[skills_remove_ids];
				 mysql_query("delete from sedna_skills where id in($skills_remove_ids)"); 
			}
			
			
			
			if (array_key_exists('skill_name', $new_value_ap)) {
						
				  $new_value_ap[skill_name];
				  
             $skill_name_count=	  count($new_value_ap[skill_name]);
			 $year_exp_count=	  count($new_value_ap[year_exp]);
			 $last_used_count=	  count($new_value_ap[last_used]);
			if($skill_name_count>$year_exp_count && $last_used_count )
			{
				   $big= $new_value_ap[skill_name];
				  
			}
			else if($year_exp_count>$skill_name_count && $last_used_count )
			{
				    $big = $new_value_ap[year_exp];
			}
			else if($last_used_count>$skill_name_count && $year_exp_count )
			{
				    $big =$new_value_ap[last_used];
			}
			else{
				   $big= $new_value_ap[skill_name];
			}
			 $big;
				  
				  
				  
				  if(!empty($big))
				 {
			
				  
				//  print_r($big);
				  
				$update_set='';
					foreach ($big as $key => $value)
					{
						
						
						$in_skill_name= $new_value_ap[skill_name][$key];
						$in_yer=$new_value_ap[year_exp][$key];
						$in_used=$new_value_ap[last_used][$key];
						
						//echo "select * from sedna_skills where reg_id='$id' && id='$key'";
				  
	  $selectskyl=mysql_query("select * from sedna_skills where reg_id='$id' && id='$key'");
	  if(mysql_num_rows($selectskyl)>0)
	  {
			
			if($in_skill_name!='')
			{
			if($update_set!='')
			{
				  $update_set.= ", skill_name="."'".$in_skill_name."'";
				  
			}
			else
			{
				  
				 $update_set= "skill_name="."'".$in_skill_name."'";  
				  
			}
				  
			}
			if($in_yer!='')
			{
			if($update_set!='')
			{
				  $update_set.= ", year_exp="."'".$in_yer."'";
				  
			}
			else
			{
				  
				 $update_set= "year_exp="."'".$in_yer."'";  
				  
			}
				  
			}
			
			if($in_used!='')
			{
			if($update_set!='')
			{
				  $update_set.= ", last_used="."'".$in_used."'";
				  
			}
			else
			{
				  
				 $update_set= "last_used="."'".$in_used."'";  
				  
			}
				  
			}
			//echo "<br>";
	  	//echo "update sedna_skills set $update_set where reg_id='$id' && id='$key'";
			
	mysql_query("update sedna_skills set $update_set where reg_id='$id' && id='$key'");	  
	
	
	  }
	  else{
						if($in_skill_name!='')
						{
						
						
					
		//echo "insert into sedna_skills (reg_id,skill_name,year_exp,last_used) values('$id','$in_skill_name','$in_yer','$in_used')";		
							
						
						
		mysql_query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used) values('$id','$in_skill_name','$in_yer','$in_used')");				
						
						
					}
	 	
	  }		
					}

					
					
	   
				 }
				
				 
				   }
		
			
// work code



if (array_key_exists('workex_remove_ids', $new_value_ap)) {
				 $workex_remove_ids=  $new_value_ap[workex_remove_ids];
				 //echo "<br>";
				 
				///echo  "delete from sebna_work_experience where id in($workex_remove_ids)";
				mysql_query("delete from sebna_work_experience where id in($workex_remove_ids)"); 
			}
			
			
			
			if (array_key_exists('job_title', $new_value_ap)) {
						
			  $workex_job_title=	  count($new_value_ap[job_title]);
			 $workex_comapnay=	  count($new_value_ap[comapnay]);
			 $workex_start_date=	  count($new_value_ap[start_date]);
			 $workex_end_date=     count($new_value_ap[end_date]);
			 $workex_current=     count($new_value_ap[current]);
			 if($workex_job_title>$workex_comapnay && $workex_start_date && $workex_end_date )
			{
				    $big1 = $new_value_ap[job_title];
			}
			else if($workex_comapnay>$workex_job_title && $workex_start_date && $workex_end_date )
			{
				    $big1 =$new_value_ap[comapnay];
			}
			else if($workex_start_date>$workex_job_title && $workex_comapnay && $workex_end_date )
			{
				    $big1 =$new_value_ap[start_date];
			}
			else if($workex_end_date>$workex_job_title && $workex_comapnay && $workex_start_date )
			{
				    $big1 =$new_value_ap[end_date];
			}
			
			else{
				   $big1= $new_value_ap[job_title];
			}
			 $big1;
				  
				  
				  
				  if(!empty($big1))
				 {
			
				  
				//  print_r($big);
				  
				$workex_update_set='';
					foreach ($big1 as $key => $value)
					{
						$in_job_title=$new_value_ap[job_title][$key];
						$in_comapnay=$new_value_ap[comapnay][$key];
						$in_start_date=$new_value_ap[start_date][$key];
						$in_end_date=$new_value_ap[end_date][$key];
						$in_current=  $new_value_ap[current][$key];
				  
	  $selectworkex=mysql_query("select * from sebna_work_experience where reg_id='$id' && id='$key'");
	  if(mysql_num_rows($selectworkex)>0)
	  {
			
			if($in_job_title!='')
			{
			if($workex_update_set!='')
			{
				  $workex_update_set.= ", job_title="."'".$in_job_title."'";
				  
			}
			else
			{
				  
				 $workex_update_set= "job_title="."'".$in_job_title."'";  
				  
			}
				  
			}
			
			if($in_comapnay!='')
			{
			if($workex_update_set!='')
			{
				  $workex_update_set.= ", comapnay="."'".$in_comapnay."'";
				  
			}
			else
			{
				  
				 $workex_update_set= "comapnay="."'".$in_comapnay."'";  
				  
			}
				  
			}
			
			
			
			
			if($in_start_date!='')
			{
			if($workex_update_set!='')
			{
				  $workex_update_set.= ", start_date="."'".$in_start_date."'";
				  
			}
			else
			{
				  
				 $workex_update_set= "start_date="."'".$in_start_date."'";  
				  
			}
				  
			}
			
			if($in_end_date!='')
			{
			if($workex_update_set!='')
			{
				  $workex_update_set.= ", end_date="."'".$in_end_date."'";
				  
			}
			else
			{
				  
				 $workex_update_set= "end_date="."'".$in_end_date."'";  
				  
			}
				  
			}
			
			
			if($in_current!='')
			{
			if($workex_update_set!='')
			{
				  $workex_update_set.= ", current="."'".$in_current."'";
				  
			}
			else
			{
				  
				 $workex_update_set= "current="."'".$in_current."'";  
				  
			}
				  
			}
			
			
			
			
	  // echo "<br>";
	 //echo "update sebna_work_experience set $workex_update_set where reg_id='$id' && id='$key'";	
			
	mysql_query("update sebna_work_experience set $workex_update_set where reg_id='$id' && id='$key'");	  
	
	
	  }
	  else{
						if($in_job_title!='')
						{
						
	 //echo "insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date) values('$id','$in_job_title','$in_comapnay','$in_start_date','$in_end_date')";	
								
						
						
		mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current) values('$id','$in_job_title','$in_comapnay','$in_start_date','$in_end_date','$in_current')");				
						
						
					}
	 	
	  }		
					}

					
					
	   
				 }
				
				 
				   }
			
			
		//	die;
//	  education	 Code
			
			
			
			
		
if (array_key_exists('educate_remove_ids', $new_value_ap)) {
				 $educate_remove_ids=  $new_value_ap[educate_remove_ids];
				 // echo "<br>";
				//echo  "delete from sedna_education where id in($educate_remove_ids)";
				mysql_query("delete from sedna_education where id in($educate_remove_ids)"); 
			}
			
			
			
			if (array_key_exists('education_type', $new_value_ap)) {
						
				  $new_value_ap[education_type];
				   $education_education_type=	  count($new_value_ap[education_type]);
			 $education_institution=	  count($new_value_ap[institution]);
			 $education_edu_city=	  count($new_value_ap[edu_city]);
			 $education_edu_country=     count($new_value_ap[edu_country]);
			 $education_edu_year=     count($new_value_ap[edu_year]);
			 
			 if($education_education_type>$education_institution && $education_edu_city && $education_edu_country && $education_edu_year )
			{
				    $big2 = $new_value_ap[education_type];
			}
			else if($education_institution>$education_education_type && $education_edu_city && $education_edu_country && $education_edu_year )
			{
				    $big2 =$new_value_ap[education_type];
			}
			else if($education_edu_city>$education_education_type && $education_institution && $education_edu_country && $education_edu_year )
			{
				    $big2 =$new_value_ap[edu_city];
			}
			else if($education_edu_country>$education_education_type && $education_institution && $education_edu_city && $education_edu_year )
			{
				    $big2 =$new_value_ap[edu_country];
			}
			
			else if($education_edu_year>$education_education_type && $education_institution && $education_edu_city && $education_edu_country )
			{
				    $big2 =$new_value_ap[edu_year];
			}
			
			else{
				   $big2= $new_value_ap[education_type];
			}
			$big2;
				  
				  
				  
				  if(!empty($big2))
				 {
			
				  
				//  print_r($big);
				  
				$education_update_set='';
					foreach ($big2 as $key => $value)
					{
						$in_education_type=$new_value_ap[education_type][$key];
						$in_institution=$new_value_ap[institution][$key];
						$in_edu_city=$new_value_ap[edu_city][$key];
						$in_edu_country=$new_value_ap[edu_country][$key];
						$in_edu_year=$new_value_ap[edu_year][$key];
						
				  
	  $selectedu=mysql_query("select * from sedna_education where reg_id='$id' && id='$key'");
	  if(mysql_num_rows($selectedu)>0)
	  {
			
			
			if($in_education_type!='')
			{
			if($education_update_set!='')
			{
				  $education_update_set.= ", education="."'".$in_education_type."'";
				  
			}
			else
			{
				  
				 $education_update_set= "education="."'".$in_education_type."'";  
				  
			}
				  
			}
			
			
			if($in_institution!='')
			{
			if($education_update_set!='')
			{
				  $education_update_set.= ", institution="."'".$in_institution."'";
				  
			}
			else
			{
				  
				 $education_update_set= "institution="."'".$in_institution."'";  
				  
			}
				  
			}
			
			if($in_edu_city!='')
			{
			if($education_update_set!='')
			{
				  $education_update_set.= ", city="."'".$in_edu_city."'";
				  
			}
			else
			{
				  
				 $education_update_set= "city="."'".$in_edu_city."'";  
				  
			}
				  
			}
			
			
			
			
			if($in_edu_country!='')
			{
			if($education_update_set!='')
			{
				  $education_update_set.= ", country="."'".$in_edu_country."'";
				  
			}
			else
			{
				  
				 $education_update_set= "country="."'".$in_edu_country."'";  
				  
			}
				  
			}
			
			
			
		//echo "update sedna_education set $education_update_set where reg_id='$id' && id='$key'";	
			
	mysql_query("update sedna_education set $education_update_set where reg_id='$id' && id='$key'");	  
	
	
	  }
	  else{
						if($in_education_type!='')
						{
					
	 mysql_query("insert into sedna_education (reg_id,education,institution,city,state,country) values('$id','$in_education_type','$in_institution','$in_edu_city','','$in_edu_country')");	
								
						
						
				
						
						
					}
	 	
	  }		
					}

					
					
	   
				 }
				
				 
				   }	
			
			
			
			
			 $query_up="update sebna_profile_tbl set $data_set where reg_id='$id'";
			
			mysql_query($query_up);
			
		mysql_query("update sedna_operator_request_consultants set status='1' where consultant_id=$id && status='0'");

			
			
			
			}
			
			
	                            $message= "Approved Successfully.....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="?page=request_Of_old_consultant";
								redirect($location); 
					
			//header("Location:?page=request_Of_old_consultant");		
					}
					
					
					
					?>
            

