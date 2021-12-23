<?php
$id = $_SESSION["candidate_id"];
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
<h3 class="block-head">View Profile</h3>
<?php
mysql_select_db('tools_citacademy');
$select = "SELECT * FROM cit_academy_registration WHERE id = '".$_SESSION['candidate_id']."' ";
$que_select = mysql_query($select) or die(mysql_error());
//echo $select;
?>

<div class="res_tab">
<table class="table table-striped">
<thead>
<tr>
<th>S no.</th>
<th>Name</th>
<th>Email</th>


<th>Password</th>
<th>Edit</th>

<th>Details</th>


</tr>
</thead>
<tbody>
<?php

$i = $limit*($page-1)+1;
$emp = mysql_fetch_array($que_select);

//echo $emp['id'];
$master_id=$emp['master_id'];
$value_video=mysql_query("SELECT * FROM `videos` where master_id='$master_id'");
$count = mysql_num_rows($value_video);

if($count=='0'){
 
 ?>
 <tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo ucfirst($emp['frist_name']); ?></td>
<td align="center"><?php echo $emp['email'];?></td>

<td align="center"><?php echo $emp['user_pass']; ?></td>

<td>
<a href="?page=edit&id=<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary">Edit</a>
<a href="javascript:;" ntr="<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1 upload_video">Upload Your Profile Video</a>
</td>

<td>
 <a href="?page=profile&master_id=<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1">View</a>
</td>
<!--hislide div-->

</tr>
 
 
  <?php
}else{

while($video_value_name=mysql_fetch_array($value_video)){

$video_name=$video_value_name['video_path'];
$video_status=$video_value_name['status'];
 $youtube_video_id=$video_value_name['youtube_video_id'];
?>



<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo ucfirst($emp['name']); ?></td>
<td align="center"><?php echo $emp['email'];?></td>

<td align="center"><?php echo $emp['user_pass']; ?></td>

<td>
<a href="?page=edit&id=<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary">Edit</a>
<a href="javascript:;" ntr="<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1 upload_video">Upload Your Profile Video</a>
</td>

<td>
<?php if($video_status=="0"){ ?>
<a href="javascript:;" class="btn btn-default btn-sm btn-icon btn-primary1">Video Under Process</a>
<?php }elseif($video_status=="1" && $youtube_video_id!==""){ ?>
<a  data-toggle="modal" class="btn btn-default btn-sm btn-icon btn-primary play_" ntr="<?php echo $ikj; ?>" href="javascript:;" data-target="#vedio_display<?php echo $ikj; ?>" type="video/mp4">Play Video</a>

<!-- Modal -->
  <div class="modal fade" id="vedio_display<?php echo $ikj; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $name;?></h4>
        </div>
        <div class="modal-body">
         <iframe src="http://www.youtube.com/embed/<?php echo $youtube_video_id;?>"
   width="560" height="315" frameborder="0" allowfullscreen></iframe>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div><?php } ?><a href="?page=profile&master_id=<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1">View</a>
</td>
<!--hislide div-->

</tr>



<?php
$i++;
}
}
?>


</tbody>
</table>
</div>

<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->

<div id="divdeps" style="display:none" title=""></div>			      





</div>


</div></div>



<div class="container">
</div>
<script>

$(".upload_video").click(function(){
//link_video="http://develop-a.cheshtainfotech.com/jobportal/cdms/candidate-login/yt/";
master_id=$(this).attr("ntr");
//alert(master_id);
var pathname = window.location.pathname; // Returns path only
//alert(pathname);
//link_video_1=pathname+"yt/?master_id="+master_id;
link_video_1 = "http://209.124.66.8:49152/?master_id="+master_id;
newwindow=window.open(link_video_1,'name','height=500,width=700');
if (window.focus) {newwindow.focus();}
return false;

});


</script>	