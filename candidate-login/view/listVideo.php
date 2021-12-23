<?php date_default_timezone_set('Asia/Kolkata');
// retrieve session data
if(!$_SESSION["candidate_email"]){
	 header('location:?page=login');
}
?>
<div class="container content mtb">

<div class="row ">
		   <div class="col-lg-12">
		  <h3 class="block-head">Video List</h3>
		  <div class="res_tab">
			   <table id="" class="table" >  <!--id="example"-->
			   <thead>
				 <tr>
				   <th><h4>S no.</h4></th>
				   <th><h4>Video</h4></th>
				   <th><h4>Upload Date</h4></th>
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
			   $candidate_id = $_SESSION['candidate_id'];
		
		mysql_select_db('tools_citacademy');
$data_sel=mysql_query("SELECT * FROM `cit_academy_registration` where id='$candidate_id'");
$data_arr=mysql_fetch_array($data_sel);
$can_user_id=$data_arr['candidates_userid'];
		
		mysql_select_db('tools_jportal');
$dfhh=mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` where can_user_id='$can_user_id'");
$fchjh=mysql_fetch_array($dfhh);
$master_id_can=$fchjh['id'];
		
			   
			   $sql="SELECT * FROM `candidate_video` WHERE `master_id`='$master_id_can' ORDER BY `videoId` DESC $limit";
			   $select = mysql_query($sql) or die(mysql_error());
			   $pagination_sql = ("SELECT * FROM `candidate_video` WHERE `master_id`='$master_id_can' ORDER BY `videoId` DESC");
			   while($row = mysql_fetch_array($select)){
				   ?>
				   <tr>
					   <td><?php echo $jki;?></td>
					   
					   <td><a target="_blank" href="https://jobportal-candidate-video.s3.amazonaws.com/<?php echo $row['videoName']; ?>">
					       <?php echo $row['videoName']; ?></a></td>
					   
					   <td><?php echo $row['uploadDate'];?></td>
			  
				   </tr>
				   <?php
				   $jki++;
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
		  
		   </div>
</div>
</div>