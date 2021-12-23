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
           <h3 class="block-head">New Consultant Request's</h3>
	     
           <table class="table" id="example">
						<thead>	
								<tr>
									<td align="center"><h4>S no.</h4></td>
									<td align="center"><h4>Operator Name</h4></td>
									<td align="center"><h4>Request Date</h4></td>
									<!--<td><h4>Pass</h4></td>
									<td><h4>Emp Type</h4></td>
									
									<td><h4>Contact</h4></td>
                                    <td><h4>Edit</h4></td>
									<td><h4>Delete</h4></td>-->
									<td align="center"><h4>View</h4></td>
									<td align="center"><h4>Status</h4></td>
									
								</tr>
							</thead>
							<tbody>
                                <?php
	
 				        
					 
					
				$select = "SELECT * FROM sedna_operator_request_consultants where status='0'" ;
				
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
                           $select_operator= mysql_query("select * from sedna_user_registration_tbl where id='$opt_id'");
                            $fetch_operator=mysql_fetch_array($select_operator);
                            echo $fetch_operator['name'];
                            
                             ?></td>
							<td align="center"><?php echo $new_date = date('d-m-Y', $data_fetch['change_date']); ?></td>
							
						<td align="center"><a href="<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon" onClick="return hs.htmlExpand(this , {width:600})" style="color:#666666; font-weight:bold;" >View</a>
						<!--hislide div-->
					<div class="highslide-maincontent" style="margin:5px;">
				 <form action="" method="post">
             <table class="table table-striped" width="50%" cellpadding="10">
				   <?php
          
				   
	  $popup = mysql_query("SELECT * FROM `sedna_operator_request_consultants` WHERE id = '".$data_fetch['id']."'");
	  $show = mysql_fetch_array($popup);
      echo "<pre>";
       $new_value= $show['new_value'];
  
      $old_val=unserialize($show['old_value']);
      print_r($old_val);
      echo "<br>";
      echo count($old_val);
        echo "<br>";
      $new_value_array=unserialize($new_value);
   print_r($new_value_array);

array_pop($new_value_array);
     // print_r($new_value_array);
      
	  
	  
	  
	  
     
      
      ?>
      
      
      
      
      
        <tr>
				  <td></td>
				  <td>New Values</td>
				  <td>Old Values</td>
			</tr>
     <!-- <tr>
				  <td>ID</td>
				  <td><?php if (array_key_exists('reg_id', $new_value_array)) {
       echo    $new_value_array[reg_id];
       }?></td>
			</tr>-->
			<tr>
				  <td>First Name</td>
                  <td><?php  if (array_key_exists('first_name', $new_value_array)) {
       echo    $new_value_array[first_name];
       } ?></td>
				  <td><?php  if (array_key_exists('first_name', $old_val)) {
       echo    $old_val[first_name];
       } ?></td>
			</tr>
            <tr>
				  <td>Last Name</td>
                  <td><?php if (array_key_exists('last_name', $new_value_array)) {
       echo    $new_value_array[last_name];
       } ?></td>
				    <td><?php  if (array_key_exists('last_name', $old_val)) {
       echo    $old_val[last_name];
       } ?></td>
			</tr>
			<tr>
				  <td>Email</td>
                  <td><?php if (array_key_exists('email', $new_value_array)) {
       echo    $new_value_array[email];
       } ?></td>
				  <td><?php  if (array_key_exists('email', $old_val)) {
       echo    $old_val[email];
       } ?></td>
			</tr>
			<tr>
				  <td>Phone No.</td>
                  <td><?php if (array_key_exists('phone', $new_value_array)) {
       echo    $new_value_array[phone];
       } ?></td>
				  <td><?php  if (array_key_exists('phone', $old_val)) {
       echo    $old_val[phone];
       } ?></td>
			</tr>
			
			<tr>
				  <td>City</td>
                  <td><?php   
       if (array_key_exists('city', $new_value_array)) {
       echo    $new_value_array[city];
       }  ?></td>
				   <td><?php  if (array_key_exists('city', $old_val)) {
       echo    $old_val[city];
       } ?></td>
			</tr>
			
			<tr>
				  <td>Country</td>
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
			
			
			<tr>
				  <td>Postal Code</td>
                  <td><?php
				   if (array_key_exists('postal_code', $new_value_array)) {
       echo    $new_value_array[postal_code];
       }?></td>
				  <td><?php
				   if (array_key_exists('postal_code', $old_val)) {
       echo    $old_val[postal_code];
       }?></td>
			</tr>
			<tr>
				  <td>Employment Type</td>
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
			<tr>
				  <td>Work Authorization</td>
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
			<tr>
				  <td>Experience</td>
                  <td><?php if (array_key_exists('experience', $new_value_array)) {
       echo    $new_value_array[experience];
       } ?></td>
				  <td><?php if (array_key_exists('experience', $old_val)) {
       echo    $old_val[experience];
       } ?></td>
			</tr>
			
			<tr>
				  <td>Salary</td>
                   <td><?php  if (array_key_exists('salary', $new_value_array)) {
       echo    $new_value_array[salary];
       }?></td>
				  <td><?php  if (array_key_exists('salary', $old_val)) {
       echo    $old_val[salary];
       }?></td>  
				   
			</tr>
			<tr>
				  <td>Hourly Rate</td>
                   <td><?php  if (array_key_exists('hourly_rate', $new_value_array)) {
       echo    $new_value_array[hourly_rate];
       }?></td>
				   <td><?php  if (array_key_exists('hourly_rate', $old_val)) {
       echo    $old_val[hourly_rate];
       }?></td>
			</tr>
			<tr>
				  <td>Work Experience</td>
                   <td><?php  if (array_key_exists('job_title', $new_value_array)) {
						  count($new_value_array[job_title]);
           for($wrk=0;$wrk<count($new_value_array[job_title]); $wrk++ )
		   {
			if($new_value_array[job_title][$wrk]!='' or  $new_value_array[start_date][$wrk]!='')
			{
				  
				echo $new_value_array[job_title][$wrk]."---------".$new_value_array[start_date][$wrk]."------".$new_value_array[end_date][$wrk] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>
				   
				   
			<td><?php  if (array_key_exists('job_title', $old_val)) {
						  count($old_val[job_title]);
           for($wrk=0;$wrk<count($old_val[job_title]); $wrk++ )
		   {
			if($old_val[job_title][$wrk]!='' or  $old_val[start_date][$wrk]!='')
			{
				  
				echo $old_val[job_title][$wrk]."---------".$old_val[start_date][$wrk]."------".$old_val[end_date][$wrk] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>	   
				   
				   
				   
				   
			</tr>
			<tr>
				  <td>Skills</td>
                   <td><?php  if (array_key_exists('skill_name', $new_value_array)) {
						  count($new_value_array[skill_name]);
           for($sk=0;$sk<count($new_value_array[skill_name]); $sk++ )
		   {
			if($new_value_array[skill_name][$sk]!='' or  $new_value_array[year_exp][$sk]!='')
			{
				  
				echo $new_value_array[skill_name][$sk]."---------".$new_value_array[year_exp][$sk]."------".$new_value_array[last_used][$sk] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>
				   
				<td><?php  if (array_key_exists('skill_name', $old_val)) {
						  count($old_val[skill_name]);
           for($sk=0;$sk<count($old_val[skill_name]); $sk++ )
		   {
			if($old_val[skill_name][$sk]!='' or  $old_val[year_exp][$sk]!='')
			{
				  
				echo $old_val[skill_name][$sk]."---------".$old_val[year_exp][$sk]."------".$old_val[last_used][$sk] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>   
				   
				   
				   
			</tr>
			
		<tr>
				  <td>Education</td>
                   <td><?php  if (array_key_exists('skill_name', $new_value_array)) {
						  count($new_value_array[education_type]);
           for($ed=0;$ed<count($new_value_array[education_type]); $ed++ )
		   {
			if($new_value_array[education_type][$ed]!='' or  $new_value_array[institution][$ed]!='')
			{
				  
				echo $new_value_array[skill_name][$ed]."---------".$new_value_array[institution][$ed]."------".$new_value_array[edu_city][$ed]."---------".$new_value_array[edu_country][$ed] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>
				   
			 <td><?php  if (array_key_exists('skill_name', $old_val)) {
						  count($old_val[education_type]);
           for($ed=0;$ed<count($old_val[education_type]); $ed++ )
		   {
			if($old_val[education_type][$ed]!='' or  $old_val[institution][$ed]!='')
			{
				  
				echo $old_val[skill_name][$ed]."---------".$old_val[institution][$ed]."------".$old_val[edu_city][$ed]."---------".$old_val[edu_country][$ed] ."<br>";  
			}
			
	   }
	   
				   }
	   ?></td>	   
				   
				   
				   
			</tr>	
			
			
				
			 </table>
		 
		 
		 
		 
		 
		 
		 
		 
		 
				  </form>
                   
                </div></td>
						<!--hislide div                      ?page=request_Of_new_consultant&id=<?php //echo $data_fetch['id']; ?>  onclick="return confirm('Do you really want to Activate  it ?');"-->
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
								 class="btn btn-default btn-sm btn-icon" >Approved</a>
								<?php }?>
							</td>
			</tr>
			
				          
			
       <?php
						$i++;
				}
                    }	?>
								
								
							</tbody>
						</table>
                        
			      
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
	<?php

					?>
            

