 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
?>
<div class="container content mtb">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Application List</h3>
	     
<form method="post" action="" enctype="multipart/form-data">
<div class="res_tab">
<table class="table-striped" width="50%" align="center" cellpadding="5">
<tbody>
<tr>

<td class="pall_5">Job Title:</td>
<td class="pall_5"><input name="job_title" id="job_title" autocomplete="off" type="text">
</td>

<td class="pall_5">Apply Date:</td>
<td class="pall_5"><input name="date" id="datepicker" autocomplete="off" class="email"  type="text"></td>



</tr>

<tr id="submit">

<td colspan="6" class="pall_5" align="center"> <input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Search" type="submit">

<!-- <a class="clear "  href='?page=show_consultants&page_no=1'>Clear</a>-->
<a href="?page=application_list&page_no=1"><input value="Clear" name="Clear" class="btn btn-error btn-custom btn-rounded waves-effect waves-light" type="button"></a>
</td></tr>






</tbody></table></div>

</form>
           
           <div class="res_tab">
                <table id="" class="table" >  <!--id="example"-->
                <thead>
                  <tr>
                    <th><h4>S no.</h4></th>
                    <th><h4>Job Title</h4></th>
                    <th><h4>Resume</h4></th>
                    <th><h4>Entry Date</h4></th>
			  <th><h4>Status</h4></th>
			  <th><h4>Action</h4></th>
			  <!--<th><h4>Job Details</h4></th>
			  <th><h4>Candidate Details</h4></th>
			  <th><h4>Interview Schedule</h4></th>-->
                  </tr>  
                    
                </thead>
                
                <tbody>
                    <?php
			  
			  
			  
			  
				$rows='10';
				if(isset($_GET['page_no'])){
				$page_no=$_GET['page_no'];
				}else{
				$page_no=1;	
				}
				
				$first_page=$rows*($page_no-1);
				$limit ="limit $first_page,$rows ";
				$i = $limit*($page-1)+1;
				
				$jki=1;
				$candidate_id = $_SESSION["employer_id"];
				
				if(isset($_REQUEST['search'])){
					
				$date = strtotime($_REQUEST['date']);
				$job_title = $_REQUEST['job_title'];
				
				$common_join = "INNER JOIN sedna_job_form ON apply_jobs.jobid = sedna_job_form.id  ";
				
				if($date!=''){
					$where = "where apply_jobs.entry_date='$date' && sedna_job_form.employer_id='".$_SESSION['employer_id']."' ";
				}
				elseif($job_title!=''){
					$where = "where sedna_job_form.job_title like '%$job_title%' && sedna_job_form.employer_id='".$_SESSION['employer_id']."' ";
				}
				elseif($date!='' && $job_title!=''){
					$where = "where apply_jobs.entry_date='$date' && sedna_job_form.job_title like '%$job_title%' && sedna_job_form.employer_id='".$_SESSION['employer_id']."' ";
				}
				
			  }else{
				$common_join = "INNER JOIN sedna_job_form ON apply_jobs.jobid = sedna_job_form.id  ";
				$where = "where sedna_job_form.employer_id='".$_SESSION['employer_id']."'";
			  }
				
				$sql="SELECT *,apply_jobs.entry_date as entry_date_jobs,apply_jobs.status as job_status,apply_jobs.id as jod_ids_apply FROM apply_jobs $common_join $where ORDER BY apply_jobs.id DESC $limit";
				$select_jobs_application =  $conn->query($sql);
				$pagination_sql = ("SELECT * FROM apply_jobs $common_join ORDER BY apply_jobs.id DESC");
				
				if($select_1->num_rows > 0){
				
				while($row = $select_jobs_application->fetch_array()){
					
					$jobid = $row['jobid'];
					$candidate_id =$row['candidate_id'];
                    ?>
                    <tr>
                        <td><?php echo $jki;?></td>
                        
                        <td><?php
                        $job_details_query =  $conn->query("SELECT * FROM sedna_job_form where id='".$row['jobid']."'");
                        $row_1=$job_details_query->fetch_array();
                        echo $row_1['job_title'];
                        ?></td>
                        
                        <td><a href="../upload_doc/<?php echo $row['cv']; ?>" download><?php echo $row['cv']; ?></a></td>
                        
                        <td><?php echo date("d-M-Y",$row['entry_date_jobs']);?></td>
				
				<td><?php
				
				$interview_query =  $conn->query("SELECT * FROM interview_schedule where job_position='".$row['jobid']."' and candidate_id='$candidate_id' and employer_id='".$_SESSION['employer_id']."'");
				$interview_data = $interview_query->fetch_array();
				$interview_id = $interview_data['id'];
				
				$job_status = $row['job_status'];
				
				if($job_status == '0'){
					echo "Pending";
				}
				elseif($job_status == '1'){
					echo "Accepted";
				}elseif($job_status == '2'){
					echo "Rejected";
				}elseif($job_status == '3'){
					echo "Scheduled"."<br>";
				?>
				<!--<a href="#" onclick="schedule('<?php echo $row['jod_ids_apply'];?>','<?php echo $row_1['id'];?>','<?php echo $interview_id;?>','Accept');">Accept</a> / <a href="#" onclick="schedule('<?php echo $row['jod_ids_apply'];?>''<?php echo $row_1['id'];?>','<?php echo $interview_id;?>','Reject');">Reject</a>-->
				<?
				}
				
				?></td>
				
				<td>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li>
							<a onClick="return hs.htmlExpand(this , {width:800, height:500})" href="#">View Job Details</a>
<div class="highslide-maincontent">
<div class="widget-header"> <i class="icon-list-alt"></i><h3> Job Info - <?php echo $row_1['job_title'];?></h3></div>
             
<br>
<table class="table table-bordered data-table">
	
<tr><th>Image</th><td><img src="../employer-login/upload_doc/image/<?php echo $row_1['image'];?>" id="tid" height="50" width="50"> </td></tr>
<tr><th>Job Title</th><td><?php echo $row_1['job_title'];?></td></tr>
<tr><th>Description</th><td><?php echo $row_1['description'];?></td></tr>
<tr><th>Salary From</th><td><?php echo $row_1['salary_from'];?></td></tr>
<tr><th>Salary To</th><td><?php echo $row_1['salary_to'];?></td></tr>
<tr><th>Job Type</th><td><?php echo $row_1['job_type'];?></td></tr>
<tr><th>Eligibility</th><td><?php echo $row_1['eligibility'];?></td></tr>
<tr><th>Location</th><td><?php echo $row_1['location'];?></td></tr>
<tr><th>Opening Date</th><td><?php echo date("d-m-Y",$row_1['opening_date']);?></td></tr>
<tr><th>Closing Date</th><td><?php echo date("d-m-Y",$row_1['closing_date']);?></td></tr>
<tr><th>Company Name</th><td><?php echo $row_1['company_name'];?></td></tr>
<tr><th>Company Url</th><td><?php echo $row_1['company_url'];?></td></tr>
<tr><th>Category</th><td><?php echo $row_1['category'];?></td></tr>







</table>

</div>
						  </li>
						  
						 
						 <li>
							
	<a href="?page=profile&master_id=<?php echo $row['candidate_id'];?>"  >View Candidate Details</a>
						 </li>
						  
						 <!-- <li>
							
						<a class="<?php if($job_status == '3' || $job_status == '1'){ ?> not-active<? } ?>" href="?page=schedule&JobId=<?php echo $jobid; ?>&candidate_id=<?php echo $candidate_id;?>">Schedule Interview</a>	
						  </li>-->
						  
						  
						  
						</ul>
					</div>
				</td>
				
				
				
                    </tr>
                    <?php
                    $jki++;
			  
			  
                    } }else{

echo "<span style='color:red;'>No data found..</span>";

}
                    ?>
                </tbody>
                
                </table>
		    
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

//	$query= $conn->query("select * from customer");
$query= $conn->query($pagination_sql);
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
echo "<li><a href='?page=application_list&page_no=".$previous."'>Previous</a></li>";
}
if($start_loop>1){
echo "<li><a href='?page=application_list&page_no=1'>1 </a></li>";
echo "<li><a href='#'>...</a>";
}
for($i=$start_loop;$i<=$end_loop;$i++){
echo "<li><a href='?page=application_list&page_no=".$i."'>".$i."  "."</a></li>";	
}
$remain_pages = $total_page- $end_loop;
if($remain_pages>1){
echo "<li><a href='#'>...</a></li>";
}
if($remain_pages>0){
echo "<li><a href='?page=application_list&page_no=$total_page'>".$total_page."</a></li>";
}

$next_page = $_GET['page_no']+1;
if($next_page <= $total_page){ 
echo "<li><a href='?page=application_list&page_no=".$next_page."'>Next</a></li>";	
}

?>

</div>
           </div>
           
            </div>
</div>
</div>

<style>
	.not-active {
   pointer-events: none;
   cursor: default;
}
</style>

<script>
	function schedule(ApplyJobId,JobId,InterviewId,Status){
		var data = "ApplyJobId="+ApplyJobId+"&JobId="+JobId+"&InterviewId="+InterviewId+"&Status="+Status;
		
		 if(confirm("Do you really want to "+Status+" this interview call?")){
			if(Status=='Reject'){
			
			//alert('Do you really want to reject this interview call?');
			
			$.ajax({
				url:"view/ajax/schedule_inerview.php",
				type:"POST",
				data:data,
				success: function(html){
				
				
				alert(html);
				location.reload();
				}
			
			});
			
		}
		
		if(Status=='Accept'){	
		$.ajax({
				url:"view/ajax/schedule_inerview.php",
				type:"POST",
				data:data,
				success: function(html){
				
				
				alert(html);
				location.reload();
				}
				
		});
		
		}
		
		}
		
	//	if(confirm("Do you really want to accept this interview call?")){
	//		
	//		//alert('Do you really want to accept this interview call?');
	//	if(Status=='1'){	
	//	$.ajax({
	//			url:"view/ajax/schedule_inerview.php",
	//			type:"POST",
	//			data:data,
	//			success: function(html){
	//			
	//			
	//			alert(html);
	//			location.reload();
	//			}
	//			
	//	});
	//	
	//	}
	//}
	
	}
</script>