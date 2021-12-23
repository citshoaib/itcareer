 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
 $operator_id= $_SESSION["employer_id"];
?>
<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Consultant Requests</h3>
	      <form  method="post" action=""  enctype="multipart/form-data">
	     <p align="center">
	      &nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;<input type="text" name="datepicker" id="datepicker" size="30" autocomplete="off" >
				  
				   <br><br>
           
				  <input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" type="submit" name="search" value="Search" />
				  
				  <a  href='?page=pending_consultants&page_no=1'><input class="btn btn-error btn-custom btn-rounded waves-effect waves-light" type="button" name="clear" value="Clear" /></a>
				  </p>
			
		   </form>
             <div class="res_tab">
           <table id="" class="table" >  <!--id="example"-->
						<thead>	
								<tr>
									<th align="center"><h4>S no.</h4></th>
									<th align="center"><h4>Operator Name</h4></th>
									<th align="center"><h4>Consultant Name</h4></th>
									<th align="center"><h4>Title</h4></th>
									<th align="center"><h4>Email Id</h4></th>
									<th align="center"><h4>Request Date</h4></th>
									<!--<td><h4>Pass</h4></td>
									<td><h4>Emp Type</h4></td>
									
									<td><h4>Contact</h4></td>
                                    <td><h4>Edit</h4></td>
									<td><h4>Delete</h4></td>-->
									<th align="center"><h4>Details</h4></th>
									<th align="center"><h4>Edit</h4></th>
									<th align="center"><h4>Status</h4></th>
									<!--<td align="center"><h4>Action</h4></td>-->
									
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
				  
				  //$common_join = "INNER join sebna_profile_tbl on sebna_profile_tbl.reg_id = sedna_operator_request_consultants_reg.id ";
				  
				  if(isset($_POST['search']))
				  {
					$datepicker = $_REQUEST['datepicker'];
					$date_filter = strtotime($datepicker);
					
					if($date_filter !=''){
						
					$where =" where change_date ='$date_filter' && operator_id='$operator_id' && status='0'";
						
					}
				  }
				  else{
					$where =" where operator_id='$operator_id' && status=0";
				  }
				  
				   $limit ="limit $first_page,$rows ";
					
					$i = $limit*($page-1)+1;
					
					      $select = "SELECT * FROM sedna_operator_request_consultants $where $limit";
						$pagination_sql = "SELECT * FROM sedna_operator_request_consultants ";
		          $que_select = mysql_query($select) or die(mysql_error());
					
					
					while($data_fetch = mysql_fetch_array($que_select)){
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
							
			<td align="center"><?php $popup = mysql_query("SELECT * FROM `sebna_profile_tbl` WHERE reg_id = $consultant_id");
	  $show1 = mysql_fetch_array($popup);
	  echo ucfirst( $show1['position']);
      
       
	
	 ?></td>				
							
							
							
							
							
							<td align="center"><?php  $popup1 = mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` WHERE id = $consultant_id");
	  $show11 = mysql_fetch_array($popup1);
	  echo $show11['email'];
	   $old_cv_name=$show11['cv'];
        ?></td>
							
							<td align="center"><?php echo $new_date = date('d-m-Y', $data_fetch['change_date']); ?></td>
							
						<td align="center"><a href="<?php echo $emp['id'];?>" class="btn btn-info btn-custom btn-rounded waves-effect waves-light" onClick="return hs.htmlExpand(this , {width:800})"  >View</a>
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
      
     $consultant_id= $show['consultant_id'];
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
		
	    <?php
   $select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$consultant_id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		 $cv_name=  $fetch_upload_temp['cv'];
         ?>
		<tr>
			<th>Resume</th><td><a download="upload_doc/<?php echo $cv_name;?>" href="" >Download</a></td>
			<td><a download="upload_doc/<?php echo $old_cv_name;?>" href="" >Download</a></td>
		</tr>
		
		<?php   } ?>
		
     <!-- <tr>
				  <td>ID</td>
				  <td><?php if (array_key_exists('reg_id', $new_value_array)) {
       echo    $new_value_array[reg_id];
       }?></td>
			</tr>-->
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
							
							
							
				
							
						<td align="center"><a href="?page=edit&id=<?php echo $data_fetch['consultant_id'];?>" class="btn btn-default btn-sm btn-icon" >Edit</a>
						
					</td>
						<!--hislide div-->
						 <td align="center">
							<?php if($data_fetch['status']=='0'){?>
								<a href="#" 
								 class="btn btn-default btn-sm btn-icon" >Not Approved</a>
								<?php
								}
								if($data_fetch['status']=='1')
								{
								?>
								<a href="#" 
								 class="btn btn-default btn-sm btn-icon">Approved</a>
								<?php }?>
							</td>
						 
						<!-- <td align="center"><a href="?page=pending_consultants&id=<?php echo $data_fetch['consultant_id'];?>" class="btn btn-default btn-sm btn-icon" onclick="return confirm('Do you really want to Activate  it ?');">Approve</a>
						
					</td>-->
			</tr>
			
				          
			
       <?php
						$i++;
	   }	}
					?>
								
								
							</tbody>
						</table></div>
                        
			
										
			<div class="pagination">
                                <?php
	$per_page_block = 10;
	if(isset($_GET['page_no'])){
		$get_current_page = $_GET['page_no'];
		if($get_current_page <4){
			$start_loop = 1;
			$end_loop = 10;
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
		echo "<li><a href='?page=pending_consultants&page_no=".$previous."'>Previous</a></li>";
	}
	if($start_loop>1){
		echo "<li><a href='?page=pending_consultants&page_no=1'>1 </a></li>";
		echo "<li><a href='#'>...</a>";
	}
	for($i=$start_loop;$i<=$end_loop;$i++){
	  $class_active = "";
        if($i == $page_no ){
            
         $class_active = "class = 'active_page'";   
            
        }
	  
		echo "<li".$class_active."><a href='?page=pending_consultants&page_no=".$i."'>".$i."  "."</a></li>";	
	}
	$remain_pages = $total_page- $end_loop;
	if($remain_pages>1){
		echo "<li><a href='#'>...</a></li>";
	}
	if($remain_pages>0){
		echo "<li><a href='?page=pending_consultants&page_no=$total_page'>".$total_page."</a></li>";
	}

	$next_page = $_GET['page_no']+1;
	if($next_page <= $total_page){ 
		echo "<li><a href='?page=pending_consultants&page_no=".$next_page."'>Next</a></li>";	
	}
	
	?>
  
                               </div>				      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
	<?php
	
	if(isset($_GET['id'])){
	  $id=$_GET['id'];
	  
	  $select=mysql_query("select * from sedna_operator_request_consultants where consultant_id=$id");
	  $fetch_1=mysql_fetch_array($select);
	  $fetch_1['id'];
	  $date=  $fetch_1['change_date'];
	  $fetch_1['operator_id'];
	  $consultant_id= $fetch_1['consultant_id'];
	  $new_value= $fetch_1['new_value'];
	  $status= $fetch_1['status'];
	  
	  $new_value_array=unserialize($new_value);
	  
	  //echo "<pre>";
	  //print_r($new_value_array);
	  //echo "</pre>";
	  
	  array_pop($new_value_array);
	  
	  if(!is_array($new_value_array[first_name]))
	  {
		 $first_name = $new_value_array[first_name];		
	  }	  
	  if(!is_array($new_value_array[last_name]))
	  {
		 $last_name = $new_value_array[last_name];		
	  }
	  if(!is_array($new_value_array[email]))
	  {
		 $email = $new_value_array[email];		
	  }
	  if(!is_array($new_value_array[phone]))
	  {
		$phone_no=  $new_value_array[phone];
		
	  }  
	  if(!is_array($new_value_array[postal_code]))
	  {
		 $postal_code= $new_value_array[postal_code];
		
	  }
	   if(!is_array($new_value_array[city]))
	  {
		 $city= $new_value_array[city];
		
	  }
	   if(!is_array($new_value_array[country]))
	  {
		 $Country= $new_value_array[country];
		
	  }  
	  
	  if(!is_array($new_value_array[experience]))
	  {
		 $experience =  $new_value_array[experience];
		
	  }
	   if(!is_array($new_value_array[position]))
{
    $position =  $new_value_array[position];
  
}
	  
	  if(!is_array($new_value_array[preferred_location]))
{
    $preferred_location =  $new_value_array[preferred_location];
  
}
	  
	  if(!is_array($new_value_array[salary]))
	  {
		 $salary =  $new_value_array[salary];
		
	  }
	  
	  if(!is_array($new_value_array[hourly_rate]))
	  {
		 $hourly_rate =  $new_value_array[hourly_rate];
		
	  }
	  
	   if(!is_array($new_value_array[employment_type]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $employment_type=  $new_value_array[employment_type];
		$employment_type12= implode(",",$employment_type);
		 //print_r($employment_type);
		
	  }
	  
	  if(!is_array($new_value_array[work_authorization]))
	  {
		$work_authorization=  $new_value_array[work_authorization];
		
	  }
	  
	  
	  
	  
	  if(!is_array($new_value_array[job_title]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $job_title=  $new_value_array[job_title];
		 
	  
		
	  }
	  
	  if(!is_array($new_value_array[comapnay]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $comapnay=  $new_value_array[comapnay];
		 
	   
		
	  }
	  if(!is_array($new_value_array[start_date]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $start_date = $new_value_array[start_date];
		 
	  
		
	  }
	  if(!is_array($new_value_array[end_date]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $end_date=  $new_value_array[end_date];
		 
	   
		
	  }
	  
	  if(!is_array($new_value_array[skill_name]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $skill_name=  $new_value_array[skill_name];
		 
	  }
	  
	  
	  if(!is_array($new_value_array[year_exp]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $year_exp=  $new_value_array[year_exp];
	  
		
	  }
	  
	  if(!is_array($new_value_array[last_used]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $last_used=  $new_value_array[last_used];
	  
		
	  }
	  
	  if(!is_array($new_value_array[education_type]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $education_type12=  $new_value_array[education_type];
		// print_r($education_type12);
		//  count($education_type12);
	  
		
	  }
	  if(!is_array($new_value_array[institution]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $institution=  $new_value_array[institution];
		// print_r($institution);
		// echo count($institution);
	  
		
	  }
	  if(!is_array($new_value_array[edu_city]))
	  {
	   
		
	  }
	  else
	  {
	   
		 $edu_city=  $new_value_array[edu_city];
	   //  print_r($edu_city);
		 // count($edu_city);
	  
		
	  }
	  if(!is_array($new_value_array[edu_country]))
	  {
	   
		
	  }
	  else
	  {
	   
		  $edu_country=  $new_value_array[edu_country];
		//print_r($edu_country);
		 // count($edu_country);
	  
		
	  }
	  
	  	  if(!is_array($new_value_array[edu_year]))
{
 
  
}
else
{
 
   $edu_year=  $new_value_array[edu_year];
   //print_r($edu_country);
  // echo count($edu_country);

  
}

if(!is_array($new_value_array[employer_name]))
{
   $employer_name=  $new_value_array[employer_name];
  
}
if(!is_array($new_value_array[employer_company]))
{
   $employer_company=  $new_value_array[employer_company];
  
}
if(!is_array($new_value_array[employer_email]))
{
   $employer_email=  $new_value_array[employer_email];
  
}
if(!is_array($new_value_array[employer_number]))
{
   $employer_number=  $new_value_array[employer_number];
  
}
	  
	  $check=mysql_query("select * from sebna_profile_tbl where reg_id='$consultant_id'");
	  if($row=mysql_fetch_row($check)){
			
			mysql_query("update sebna_profile_tbl set state='$state' where reg_id='$consultant_id'");

	  }else{
			
	  mysql_query("insert into sebna_profile_tbl(reg_id,first_name,last_name,city,country,state,phone_no,postal_code,employment_type,salary,hourly_rate,position,preferred_location,employer_name,employer_company,employer_email,employer_number,work_authorization,reg_date)
	  values('$consultant_id','$first_name','$last_name','$city','$Country','','$phone_no','$postal_code','$employment_type12','$salary','$hourly_rate','$position','$preferred_location','$employer_name','$employer_company','$employer_email','$employer_number','$work_authorization','$date')");	  
	  
	  
	  $selete11_wrk=mysql_query("select * from sebna_work_experience where reg_id='$consultant_id'");
	  while($fetch_row11_wrk=mysql_fetch_array($selete11_wrk))
	  {
	  $id_wrk= $fetch_row11_wrk['id'];
	  mysql_query("delete from sebna_work_experience where id='$id_wrk'") or die(mysql_error());
	  
	  }
	  
	  for($wrk=0;$wrk<count($job_title);$wrk++)
	  {
	  $job_title1=	$job_title[$wrk];
	  $comapnay1=$comapnay[$wrk];
	  $start_date1=$start_date[$wrk];
	  $end_date1=$end_date[$wrk];
	  if($job_title1!='')
	  {
	  mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current) values('$consultant_id','$job_title1','$comapnay1','$start_date1','$end_date1','') ");			
	  }
	  }
	  $selete11_skill=mysql_query("select * from sedna_skills where reg_id='$consultant_id'");
	  while($fetch_row11_skill=mysql_fetch_array($selete11_skill))
	  {
	  $id_skill= $fetch_row11_skill['id'];
	  mysql_query("delete from sedna_skills where id='$id_skill'") or die(mysql_error());
	  
	  }
	  for($sk=0;$sk<count($skill_name);$sk++)
	  {
	  $skill_name1=$skill_name[$sk];
	  $year_exp1=$year_exp[$sk];
	  $last_used1=$last_used[$sk];
	  
	  if($skill_name1!='')
	  {
	  
	  mysql_query("insert into sedna_skills (reg_id,skill_name,year_exp,last_used) values('$consultant_id','$skill_name1','$year_exp1','$last_used1')");			
	  }
	  }
	  
	  $selete11=mysql_query("select * from sedna_education where reg_id='$consultant_id'");
	  while($fetch_row11=mysql_fetch_array($selete11))
	  {
	  $id_edu= $fetch_row11['id'];
	  mysql_query("delete from sedna_education where id='$id_edu'") or die(mysql_error());
	  
	  }
	  for($edu=0;$edu<count($education_type12);$edu++)
	  {
	  $education_type123=$education_type12[$edu];
	  $institution1=$institution[$edu];
	   $edu_city1=$edu_city[$edu];
	   $edu_country1=$edu_country[$edu];
	   $edu_year=$edu_year[$edu];
	  
	  if($education_type123!='')
	  {
	 // echo "insert into sedna_education (reg_id,education,institution,city,country) values('$consultant_id','$education_type123','$institution1','$edu_city1','$edu_country1') ";
	 
	 mysql_query("insert into sedna_education (reg_id,education,institution,city,country,year) values('$consultant_id','$education_type123','$institution1','$edu_city1','$edu_country1','$edu_year') ");			
	  }
	  }
		
	  }
	  
	  
	  if($status=='0')
	  {
	  $status_state=1;
	  }
	  mysql_query("update sedna_operator_request_consultants_reg set status='$status_state' where id='$consultant_id' ");
	  $update=mysql_query("update sedna_operator_request_consultants set status='$status_state' where consultant_id='$consultant_id' ");
	  if($update)
	  {
	  header("Location:?page=pending_consultants");
	  }
	  else
	  {
	  echo mysql_error();
	  }
	  
	  
	}
	
	
	?>
            

