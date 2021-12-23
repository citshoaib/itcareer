 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}

?>
<!--<div class="container">
<hr>
</div>-->


<div class="container content mtb">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Candidate List</h3>
	     
		
	     
	      <div class=""> <!--res_tab-->
           <table id="" class="table" >  <!--id="example"-->
						<thead>	
								<tr>
									<th width=""><h4>S no.</h4></th>
									<th width=""><h4>Candidate name</h4></th>
									<th width=""><h4>Email</h4></th>
									<th width=""><h4>Phone no.</h4></th>
									
									<th width=""><h4>Country</h4></th>
									<!--<th><h4>Uploaded By</h4></th>-->
									<th width=""><h4>Entry Date</h4></th>
									<th width=""><h4>Action</h4></th>
									<!--<th><h4>Edit</h4></th>-->
									<!--<td><h4>Delete</h4></td>-->
									<!--<th><h4>View</h4></th>-->
									<!--<th><h4>Update History</h4></th>-->
									
								</tr>
							</thead>
							<tbody>
                                <?php 
					  
					  if($_GET['job_id'] !=''){
						$job_id = $_GET['job_id'];
						
						$rows='50';
				  if(isset($_GET['page_no'])){
				  $page_no=$_GET['page_no'];
				  }else{
				  $page_no=1;	
				  }
				  $first_page=$rows*($page_no-1);
				  
				  $limit ="limit $first_page,$rows ";
					
					$i = $limit*($page-1)+1;
						
						
				$dfg=1;
					$select_jobs = $conn->query("SELECT * FROM apply_jobs where jobid='".$job_id."' $limit");
					$pagination_sql ="SELECT * FROM apply_jobs where jobid='".$job_id."' $limit";
					
					while($row_1=$select_jobs->fetch_array()){
						
					
					
$candidate_query = $conn->query("SELECT * FROM sedna_operator_request_consultants_reg where id='".$row_1['candidate_id']."'");
            $row=$candidate_query->fetch_array();
            $reg_id = $row_1['candidate_id'];
            $email=$row['email'];
            $date = $row['date'];

            $select1=$conn->query("select * from sebna_profile_tbl where reg_id='".$reg_id."'");
            $fetch2=$select1->fetch_array();
            $profile_image = $fetch2['profile_image'];
            $first_name=$fetch2['first_name'];
            $middel_name=$fetch2['middel_name'];
           $last_name=$fetch2['last_name'];
           $city=$fetch2['city'];
            $country1=$fetch2['country'];
            $state=$fetch2['state'];
            //$employment_type1=$fetch2['employment_type'];
             $employment_type=explode(",",$fetch2['employment_type']);
            $work_authorization1=$fetch2['work_authorization'];
            $phone=$fetch2['phone_no'];
            $postal_code=$fetch2['postal_code'];
            $position=$fetch2['position'];
            $salary=$fetch2['salary'];
            $hourly_rate=$fetch2['hourly_rate'];
            $experience=$fetch2['experience'];
            $travel=$fetch2['travel'];
            $searchable=$fetch2['searchable'];
              $relocate=$fetch2['relocate'];
               $security=$fetch2['security'];
               $preferred_location=$fetch2['preferred_location'];
             $employer_name=$fetch2['employer_name'];
              $employer_company=$fetch2['employer_company'];
               $employer_email=$fetch2['employer_email'];
                $employer_number=$fetch2['employer_number'];
                
                if($first_name!='' && $middel_name!='' && $last_name!=''){
                  $candidate_name = ucwords($first_name).' '.ucwords($middel_name).' '.ucwords($last_name);  
                }
                elseif($first_name!='' && $last_name!=''){
                   $candidate_name = ucwords($first_name).' '.ucwords($last_name);  
                }
                
                $country_details = $conn->query("SELECT * FROM country_master where country_code='$country1'");
                $country_fetch = $country_details->fetch_array();
                
                $address = $postal_code.','.ucwords($city).','.ucwords($state).','.ucwords($country_fetch['country_name']);
		    
		    ?>
		    
		   <tr>
			<td align="center"><?php echo $dfg; ?></td>
			<td align="center"><?php echo $candidate_name;?></td>
			<td align="center"><?php echo $email;?></td>
			<td align="center"><?php echo $phone;?></td>
			<td align="center">
			<?php   
			$select_country=$conn->query("select * from country_master where country_code='$country1'");
			$fetch_country=$select_country->fetch_array();
			echo $fetch_country['country_name'];
			
			?>
			</td>
			<td><?php echo date("d-M-Y",$date);?></td>
			
			<td>
			<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
			<span class="caret"></span></button>
			<ul class="dropdown-menu">
			
			<li><a href="?page=profile&master_id=<?php echo $reg_id;?>"  >Candidate View</a></li>
			<li>
				<a href="15" class="" onclick="return hs.htmlExpand(this , {width:600})">Job Details</a>
			<div class="highslide-maincontent" style="margin:5px;">
                 <table class="table table-striped" width="50%" cellpadding="10">
                    <?php
                    $jobs_query = $conn->query("SELECT * FROM sedna_job_form where id='$job_id'");
                    $fectch_jobs = $jobs_query->fetch_array();
                    ?>
                    <tr>
                        <td>Job Title</td>
                        <td><?php echo $fectch_jobs['job_title'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Salary</td>
                        <td><?php echo $fectch_jobs['salary_from'].' - '.$fectch_jobs['salary_to'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Type</td>
                        <td><?php echo ucwords($job_type=str_replace("_"," ",$fectch_jobs['job_type']));?></td>
                    </tr>
                    
                    <tr>
                        <td>Eligibility</td>
                        <td><?php echo $fectch_jobs['eligibility'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Location</td>
                        <td><?php echo ucwords($fectch_jobs['location']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Opening Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['opening_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Closing Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['closing_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Company Name</td>
                        <td><a target="_blank" href="<?php echo $fectch_jobs['company_url'];?>"><?php echo ucwords($fectch_jobs['company_name']);?></a></td>
                    </tr>
                    
                    <tr>
                        <td>Category</td>
                        <td><?php echo ucwords($fectch_jobs['category']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Entry Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['entry_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Description</td>
                        <td><?php echo $fectch_jobs['description'];?></td>
                    </tr>
                    
                 </table>
        </div>
			</li>
			
			</ul>
			</div>
			</td>
						
			<!--<td>
				<a href="?page=profile&id=<?php echo $reg_id;?>" class="btn btn-info btn-custom btn-rounded waves-effect waves-light" >Candidate View</a>
			<a href="15" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="return hs.htmlExpand(this , {width:600})">Job Details</a> 
        <div class="highslide-maincontent" style="margin:5px;">
                 <table class="table table-striped" width="50%" cellpadding="10">
                    <?php
                    $jobs_query = $conn->query("SELECT * FROM sedna_job_form where id='$job_id'");
                    $fectch_jobs = $jobs_query->fetch_array();
                    ?>
                    <tr>
                        <td>Job Title</td>
                        <td><?php echo $fectch_jobs['job_title'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Salary</td>
                        <td><?php echo $fectch_jobs['salary_from'].' - '.$fectch_jobs['salary_to'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Type</td>
                        <td><?php echo ucwords($job_type=str_replace("_"," ",$fectch_jobs['job_type']));?></td>
                    </tr>
                    
                    <tr>
                        <td>Eligibility</td>
                        <td><?php echo $fectch_jobs['eligibility'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Location</td>
                        <td><?php echo ucwords($fectch_jobs['location']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Opening Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['opening_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Closing Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['closing_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Company Name</td>
                        <td><a target="_blank" href="<?php echo $fectch_jobs['company_url'];?>"><?php echo ucwords($fectch_jobs['company_name']);?></a></td>
                    </tr>
                    
                    <tr>
                        <td>Category</td>
                        <td><?php echo ucwords($fectch_jobs['category']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Entry Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['entry_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Description</td>
                        <td><?php echo $fectch_jobs['description'];?></td>
                    </tr>
                    
                 </table>
        </div>  
			
			</td>
							
		   </tr> -->
		    
		    
		    
		    <?php
		    
		    $dfg++;
		    
					}
					
					
					
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
	$query=$conn->query($pagination_sql);
	$total_rows=$query->num_rows();
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
	for($i=$start_loop;$i<$end_loop;$i++){
	  $class_active = "";
        if($i == $page_no ){
            
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
					

