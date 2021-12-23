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
<h3 class="block-head">Job List</h3>
</div>
</div>

<div class="row">
	<form method="post" action="" enctype="multipart/form-data"><div class="res_tab">
<table class="table-striped" width="80%" align="center" cellpadding="10">
<tbody>

<tr>


<td class="pall_5">Status:</td>
<td class="pall_5">
<select name="status" id="status" autocomplete="off" class="status" >
    

<option value="">Select Status</option>
<option value="0">Active</option>
<option value="1">Deactive</option>

</select>
</td>

<td class="pall_5">Job Title:</td>
<td class="pall_5">
<select name="job_titile" id="job_titile" autocomplete="off" class="status" >
    

<option value="">Select Job Title</option>
<?php
		$query_2 = $conn->query("select * FROM sedna_job_form group by job_title");
		while($row_query_2 = $query_2->fetch_array()){
			?>
			<option value="<?php echo $row_query_2['job_title'];?>"><?php echo $row_query_2['job_title'];?></option>
			<?php
		}
		?>

</select>
</td>

<td class="pall_5">Job Date:</td>
<td class="pall_5">
<input name="date" id="datepicker" autocomplete="off"  type="text">

</td>
</tr>




<tr id="submit">

<td colspan="6" class="pall_5" align="center"><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Search" type="submit">

<!--<a class="clear"  href='?page=show_emp&page_no=1'>Clear</a>-->
<a href="?page=manage_job_info&page_no=1"><input value="Clear" name="Clear" class="btn btn-error btn-custom btn-rounded waves-effect waves-light" type="button"></a>
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
<!--<th><h4>Description</h4></th>-->
<!--<th><h4>Salary From</h4></th>-->
<!--<th><h4>Salary To</h4></th>-->
<th><h4>Job Type</h4></th>
<th><h4>Eligibility</h4></th>
<th><h4>Location</h4></th>
<th width="16%"><h4>Opening Date</h4></th>
<th width="16%"><h4>Closing Date</h4></th>
<th><h4>Status</h4></th>
<th width="16%"><h4>Action</h4></th>

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
  
  
  if($_REQUEST['search']){
	
	$status = $_REQUEST['status'];
	$job_title = $_REQUEST['job_titile'];
	$date = strtotime($_REQUEST['date']);
	
	if($status!='' && $job_title='' && $date!=''){
		
		$where = "where status='$status' && job_title='$job_title' && '$date' between opening_date and closing_date && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($status!='' && $job_title=''){
		
		$where = "where status='$status' && job_title='$job_title' && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($status!='' && $date!=''){
		
		$where = "where status='$status' && '$date' between opening_date and closing_date && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($job_title='' && $date!=''){
		
		$where = "where job_title='$job_title' && '$date' between opening_date and closing_date && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($status!=''){
		
		$where = "where status='$status' && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($job_title!=''){
		
		$where = "where job_title='$job_title' && employer_id='".$_SESSION['employer_id']."'";
		
	}
	elseif($date!=''){
		
		$where = "where '$date' between opening_date and closing_date && employer_id='".$_SESSION['employer_id']."'";
		
	}
	
	
	
  }else{
	
	$where = "where employer_id='".$_SESSION['employer_id']."'";
	
  }

$sedna_id=$_REQUEST['id'];
$select_1=$conn->query("select * FROM sedna_job_form $where ORDER BY id DESC $limit");
$pagination_sql = ("SELECT * FROM sedna_job_form $where ORDER BY status DESC");


if($select_1->num_rows > 0){
while($row_1=$select_1->fetch_array())
{
    $id= $row_1['id'];
	 $job_type=str_replace("_"," ",$row_1['job_type']);
	
?>

<tr class="gradeA">

<td><?php echo $row_1['id']; ?></td>
<td><?php echo $row_1['job_title'];?></td>
<!--<td><?php // echo $row_1['description'];?></td>
<td><?php // echo $row_1['salary_from']; ?></td>
<td><?php // echo $row_1['salary_to'];?></td>-->
<td><?php echo strtoupper($job_type);?></td>
<td><?php echo strtoupper($row_1['eligibility']);?></td>
<td><?php echo $row_1['location']; ?></td>
<td><?php echo date("d-m-Y",$row_1['opening_date']);?></td>
<td><?php echo date("d-m-Y",$row_1['closing_date']);?></td>
<td>
	<input type="button"  <?php if($row_1['status']=="0"){?>style="display: none;"<?}?> value="Deactive" id="deactive_<? echo $id;?>" class="btn btn-error btn-custom btn-rounded waves-effect waves-light deact ">
<input type="button"  <?php if($row_1['status']=="1"){?>style="display: none;"<?}?> value="Active" id="active_<? echo $id;?>" class="btn btn-active btn-custom btn-rounded waves-effect waves-light deact">
</td>

<td>
	
	<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="?page=edit_addjob_info&id=<?php echo $row_1['id']; ?>" >Edit</a></li>
	  <li>
		<a  onClick="return hs.htmlExpand(this , {width:800, height:500})" href="#">View</a>
<div class="highslide-maincontent">
<div class="widget-header"> <i class="icon-list-alt"></i><h3> Job Info - <?php echo $row_1['job_title'];?></h3></div>
             
<br>
<table class="table table-bordered data-table">
	
<tr><th>Image</th><td><img src="upload_doc/image/<?php echo $row_1['image'];?>" id="tid" height="50" width="50"> </td></tr>
<tr><th>Job Title</th><td><?php echo $row_1['job_title'];?></td></tr>
<tr><th>Description</th><td><?php echo $row_1['description'];?></td></tr>
<tr><th>Salary From</th><td><?php echo $row_1['salary_from'];?></td></tr>
<tr><th>Salary To</th><td><?php echo $row_1['salary_to'];?></td></tr>
<tr><th>Job Type</th><td><?php echo $row_1['job_type'];?></td></tr>
<tr><th>Eligibility</th><td><?php echo $row_1['eligibility'];?></td></tr>
<tr><th>Experience Level</th><td><?php
$master_level=$row_1['experience_level'];
$result_level=$conn->query("SELECT * FROM `experience_level_master` where id='$master_level'");
$value_level=$result_level->fetch_array();

echo $value_level['experience_level'];?></td></tr>
<tr><th>Location</th><td><?php echo $row_1['location'];?></td></tr>
<tr><th>Opening Date</th><td><?php echo date("d-m-Y",$row_1['opening_date']);?></td></tr>
<tr><th>Closing Date</th><td><?php echo date("d-m-Y",$row_1['closing_date']);?></td></tr>
<tr><th>Company Name</th><td><?php echo $row_1['company_name'];?></td></tr>
<tr><th>Company Url</th><td><?php echo $row_1['company_url'];?></td></tr>
<tr><th>Category</th><td><?php 
$cat_nam = $row_1['category'];
$result_cat=$conn->query("SELECT * FROM `sedna_category` where cid='$cat_nam'");
$value_cat=$result_cat->fetch_array();
echo $value_cat['name'];?></td></tr>







</table>

</div>
	  </li>
	  <li>
			 <a href="?page=show_consultants&job_id=<?php echo $row_1['id']; ?>" >Application</a>  
  	
			</li>
    </ul>
  </div>
	
</td>

</tr>
<? } }else{

echo "<span style='color:red;'>No data found..</span>";

}?>
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
echo "<li><a href='?page=manage_job_info&page_no=".$previous."'>Previous</a></li>";
}
if($start_loop>1){
echo "<li><a href='?page=manage_job_info&page_no=1'>1 </a></li>";
echo "<li><a href='#'>...</a>";
}
for($i=$start_loop;$i<=$end_loop;$i++){
echo "<li><a href='?page=manage_job_info&page_no=".$i."'>".$i."  "."</a></li>";	
}
$remain_pages = $total_page- $end_loop;
if($remain_pages>1){
echo "<li><a href='#'>...</a></li>";
}
if($remain_pages>0){
echo "<li><a href='?page=manage_job_info&page_no=$total_page'>".$total_page."</a></li>";
}

$next_page = $_GET['page_no']+1;
if($next_page <= $total_page){ 
echo "<li><a href='?page=manage_job_info&page_no=".$next_page."'>Next</a></li>";	
}

?>

</div>						






</div>


</div></div>



<div class="container">
</div>










<script>
    
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
  url: "view/ajax/status_update.php",
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
    
</script>

</div>
</div>