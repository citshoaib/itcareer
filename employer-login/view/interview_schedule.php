<?php
@session_start();
// retrieve session data
if(!$_SESSION["employer_email"]){
header('location:?page=login');
}
?>

<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Interview Schedules</h3>
</div>
</div>

<div class="row">
	<form method="post" action="" enctype="multipart/form-data"><div class="res_tab">
<table class="table-striped" width="80%" align="center" cellpadding="10">
<tbody>

<tr>



<td class="pall_5">Status:</td>
<td class="pall_5">
<select name="status" id="status" autocomplete="off" class="status" onkeyup="contact(this.value);">
    

<option value="">Select Status</option>
<option value="0">Pending</option>
<option value="1">Accepted</option>
<option value="2">Rejected</option>

</select>
</td>

<td class="pall_5">Interview Date:</td>
<td class="pall_5">
<input name="interview_date" id="datepicker" autocomplete="off"  type="text">
</div>
</td>
</tr>




<tr id="submit">

<td colspan="6" class="pall_5" align="center"><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Search" type="submit">

<!--<a class="clear"  href='?page=show_emp&page_no=1'>Clear</a>-->
<a href="?page=interview_schedule&page_no=1"><input value="Clear" name="Clear" class="btn btn-error btn-custom btn-rounded waves-effect waves-light" type="button"></a>
</td></tr>

</tbody></table></div>
</form>
</div>

<div class="res_tab">
<table id="" class="table" > 
<thead>
<tr>
<th><h4>S. No</h4></th>
<th><h4>Job Title</h4></th>
<th><h4>Candidate Name</h4></th>
<th><h4>Interview Date</h4></th>
<th><h4>Status</h4></th>
<th width="16%"><h4>Action</h4></th>

</tr>
</thead>
<tbody>
<?php
$username=$_SESSION['employer_id'];

if(isset($_REQUEST['search'])){
	
	$status = $_REQUEST['status'];
	$interview_date = strtotime($_REQUEST['interview_date']);

	if( $status!='' && $interview_date!=''){
		$where="where status='$status' and interview_date='$interview_date' and employer_id='$username' ";
	}


	elseif($status!=''){
		$where="where status='$status' and employer_id='$username' ";
	}
	elseif($interview_date!=''){
		$where="where interview_date='$interview_date' and employer_id='$username' ";
	}else{
		$where = "where employer_id='$username'";
	}
	
}else{
	
	$where = "where employer_id='$username'";
	
}

	$rows='10';
if(isset($_GET['page_no'])){
$page_no=$_GET['page_no'];
}else{
$page_no=1;	
}
$first_page=$rows*($page_no-1);
 $limit ="limit $first_page,$rows ";
  $i = $limit*($page-1)+1;

$sql = "select * FROM interview_schedule $where ORDER BY id DESC $limit";
$select_1=mysql_query($sql)or die(mysql_error);
$pagination_sql = ("SELECT * FROM interview_schedule $where ORDER BY status DESC");
while($row_1=mysql_fetch_array($select_1))
{
    $id= $row_1['id'];
	 $job_type=str_replace("_"," ",$row_1['job_type']);
	$job_title=$row_1['job_position'];
?>

<tr class="gradeA">

<td><?php echo $row_1['id']; ?></td>
<td><?

$fetch= mysql_query("SELECT job_title FROM `sedna_job_form` WHERE id='$job_title'");
while($slt=mysql_fetch_array($fetch))
{
    
    echo $slt['job_title'];
    
}




?></td>
<td><?php echo $row_1['candidate_name']; ?></td>
<td><?php echo date("d-m-Y",$row_1['interview_date']);?></td>
<td><?php 
$status = $row_1['status'];
if($status == '0'){
					echo "Pending";
				}
				elseif($status == '1'){
					echo "Accepted";
				}elseif($status == '2'){
					echo "Rejected";
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
<div class="widget-header"> <i class="icon-list-alt"></i><h3> Job Info -<?

$fetch= mysql_query("SELECT job_title FROM `sedna_job_form` WHERE id='$job_title'");
while($slt=mysql_fetch_array($fetch))
{
    
    echo $slt['job_title'];
    
}

?></h3></div>
             
<br>
<table class="table table-bordered data-table">
	

<!--<tr><th>Employer Id</th><td><?php echo $row_1['employer_id'];?></td></tr>
<tr><th>Candidate Id</th><td><?php echo $row_1['candidate_id'];?></td></tr>-->
<tr><th>Candidate Name</th><td><?php echo $row_1['candidate_name'];?></td></tr>
<tr><th>Job Position</th><td><?

$fetch= mysql_query("SELECT job_title FROM `sedna_job_form` WHERE id='$job_title'");
while($slt=mysql_fetch_array($fetch))
{
    
    echo $slt['job_title'];
    
}

?></td></tr>
<tr><th>Office Phone No</th><td><?php echo $row_1['office_phone_no'];?></td></tr>
<tr><th>Office Email Address</th><td><?php echo $row_1['office_email_address'];?></td></tr>
<tr><th>Interview Time</th><td><?php echo date("h:i A",$row_1['interview_time']);?></td></tr>
<tr><th>Interview Date</th><td><?php echo date("d-m-Y",$row_1['interview_date']);?></td></tr>
<tr><th>Entry Date</th><td><?php echo date("d-m-Y",$row_1['entry_date']);?></td></tr>
<tr><th>Address</th><td><?php echo $row_1['address'];?></td></tr>
<tr><th>Comment</th><td><?php echo $row_1['comment'];?></td></tr>
<tr><th>Presenter</th><td><?php echo $row_1['presenter'];?></td></tr>

</table>

</div>
		
	  </li>
	  
	  <li>
		
		<a href="?page=profile&master_id=<?php echo $row_1['candidate_id'];?>" >View Candidate Details</a>
		
	  </li>
	  
	</ul>
	</div>
</td>



</tr>
<? } ?>



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


</div></div>



<div class="container">
</div>

<!--<script>
    
    $(".deact").click(function (){
       
        
value=$(this).val();
vid=$(this).attr("id");
//alert(vid);
new_val=vid.split("_");

if (new_val[0]=="active") {
    active="Deactivate";
}
else{
	    active="Activate";

}
 if(confirm("Are you sure you want to "+active+" this?")){
new_id=new_val[1];
//alert(new_id[0]);

$.ajax({
  url: "view/ajax/interview_status.php",
  type: "POST",
  data: {status :value,new_id:new_id},
  success: function(html){
 
    if(html=="1"){
        
       
	 
	    $("#active_"+new_id).hide();
	   $("#deactive_"+new_id).show();
	 
      
        
    }
    if(html=="0"){
        $("#deactive_"+new_id).hide();
       $("#active_"+new_id).show();
      
       
        
    }
  }
});
 }

        });
    
</script>-->

</div>
</div>