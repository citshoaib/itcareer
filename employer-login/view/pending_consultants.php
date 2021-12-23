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
           <h3 class="block-head">Draft Consultants</h3>
	      <form  method="post" action=""  enctype="multipart/form-data">
	     <p align="center">
	      &nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;<input type="text" name="datepicker" id="datepicker" size="30" autocomplete="off" >
				  
				   <br><br>
           
				  <input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" type="submit" name="search" value="Search" />
				  
				  <a   href='?page=pending_consultants&page_no=1'> <input class="btn btn-error btn-custom btn-rounded waves-effect waves-light" type="button" name="clear" value="Clear" /></a>
				  </p>
			
		   </form>
           <div class="res_tab">
           <table id="" class="table" >  <!--id="example"-->
						<thead>	
								<tr>
									<th align="center"><h4>S no.</h4></th>
									<!--<td align="center"><h4>Operator Name</h4></td>-->
									<th align="center"><h4>Consultant Name</h4></th>
									<th align="center"><h4>Email</h4></th>
									<th align="center"><h4>Title</h4></th>
									<th align="center"><h4>Entry Date</h4></th>
									<!--<td><h4>Pass</h4></td>
									<td><h4>Emp Type</h4></td>
									
									<td><h4>Contact</h4></td>
                                    <td><h4>Edit</h4></td>
									<td><h4>Delete</h4></td>-->
									<th align="center"><h4>Details</h4></th>
									<!--<td align="center"><h4>Status</h4></td>-->
									<th align="center"><h4>Action</h4></th>
									
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
       if($fetch12['total']==1)
       {	
						//echo $emp['id'];
				$new_value= $data_fetch['new_value']; 
			 $new_value_array=unserialize($new_value);
			 
			 //print_r($new_value_array);
					 
					?>
       
 
        
            <tr>
							<td align="center"><?php echo $i; ?></td>
							
							<td align="center"><?php if (array_key_exists('first_name', $new_value_array)) {
       echo    ucfirst($new_value_array[first_name])." ".ucfirst($new_value_array[middle_name])." ".ucfirst($new_value_array[last_name]);
       }  
	
	 ?></td>
			<td align="center"><?php $select_email= mysql_query("select * from sedna_operator_request_consultants_reg where id='".$data_fetch['consultant_id']."'");
									$fetch_email=	mysql_fetch_array($select_email);		
										  echo $fetch_email[email];	
			
			?></td>
			
			
	  <td align="center"><?php if (array_key_exists('position', $new_value_array)) {
       echo    ucfirst($new_value_array[position]);
       }  
	
	 ?></td>
			
							<td align="center"><?php echo $new_date = date('d-m-Y', $data_fetch['change_date']); ?></td>
							
						<td align="center"><a href="?page=profile&id=<?php echo $data_fetch['consultant_id'];?>" class="btn btn-info btn-custom btn-rounded waves-effect waves-light">View</a>
						<!--hislide div-->
					</td>
						<!--hislide div-->
						<!-- <td align="center">
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
							</td>-->
						 
						 <td align="center"><a href="?page=pending_consultants&id=<?php echo $data_fetch['consultant_id'];?>" class="btn btn-active btn-custom btn-rounded waves-effect waves-light" onclick="return confirm('Do you really want to Activate  it ?');">Approve</a>
						
					</td>
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
        if($i == $get_current_page ){
            
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
	  
	  $select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		 $cv_name=  $fetch_upload_temp['cv'];
	  mysql_query("update sedna_operator_request_consultants_reg set cv='$cv_name' where id='$id'");
	  mysql_query("delete from sedna_temp_upload where consultant_id='$id'");
		 }
	  
	  
	  
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
	 // print_r($new_value_array);
	  //echo "</pre>";
	  //array_pop($new_value_array);
	   //echo "</pre>";
	 // print_r($new_value_array);
	 
if(!is_array($new_value_array[searchable]))
{
    $searchable =  $new_value_array[searchable];
  
}
if(!is_array($new_value_array[relocate]))
{
   $relocate =  $new_value_array[relocate];
  
}
if(!is_array($new_value_array[security]))
{
   $security =  $new_value_array[security];
  
}
	  
	  if(!is_array($new_value_array[first_name]))
	  {
		 $first_name = $new_value_array[first_name];		
	  }	  
	  if(!is_array($new_value_array[middel_name]))
	  {
	 $middle_name = $new_value_array[middel_name];		
	  }
	  if(!is_array($new_value_array[last_name]))
	  {
		 $last_name = $new_value_array[last_name];		
	  }
	  
	  if(!is_array($new_value_array[email]))
	  {
		 $email = $new_value_array[email];		
	  }
	  if(!is_array($new_value_array[phone_no]))
	  {
		$phone_no=  $new_value_array[phone_no];
		
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
	  if(!is_array($new_value_array[state]))
	  {
		 $state= $new_value_array[state];
		
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
	  if(!is_array($new_value_array[travel]))
	  {
		$travel=  $new_value_array[travel];
		
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
	  if(!is_array($new_value_array[current]))
   {
 
  
  }
else
{
 
  $current=  $new_value_array[current];
   
 
  
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
			
mysql_query("insert into sebna_profile_tbl(reg_id,first_name,middel_name,last_name,city,country,state,phone_no,postal_code,employment_type,salary,hourly_rate,experience,searchable,relocate,security,position,preferred_location,employer_name,employer_company,employer_email,employer_number,work_authorization,travel,reg_date)
values('$consultant_id','$first_name','$middle_name','$last_name','$city','$Country','$state','$phone_no','$postal_code','$employment_type12','$salary','$hourly_rate','$experience','$searchable','$relocate','$security','$position','$preferred_location','$employer_name','$employer_company','$employer_email','$employer_number','$work_authorization','$travel','$date')");	  
	  
	  
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
	  $current_date_wk= $current[$wrk];
	  if($job_title1!='')
	  {
	 mysql_query("insert into sebna_work_experience (reg_id,job_title,comapnay,start_date,end_date,current) values('$consultant_id','$job_title1','$comapnay1','$start_date1','$end_date1','$current_date_wk') ");			
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
	 //header("Location:?page=pending_consultants");
	 
	 $message= "Successfully Approved....!";  
								$type="succ";
								SetMessage($message, $type);
							    $location="?page=pending_consultants";
								redirect($location); 
	 
	  }
	  else
	  {
	  echo mysql_error();
	  }
	  
	  
	}
	
	
	?>
            

