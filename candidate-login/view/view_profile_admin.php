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

$conn->select_db("itcapp_citacademy");
$select = "SELECT * FROM cit_academy_registration WHERE id = '".$_SESSION['candidate_id']."' ";
$que_select = $conn->query($select);
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
$emp = $que_select->fetch_array();

$conn->select_db("itcapp_website");
$select_da = "SELECT * FROM sedna_user_registration_tbl WHERE id = '".$_SESSION["candidate_id"]."' ";
$que_select_da = $conn->query($select_da);
$can_data = $que_select_da->fetch_array();

$select_pro = "SELECT * FROM sebna_profile_tbl WHERE reg_id = '".$can_data['master_id']."' ";
$que_select_pro = $conn->query($select_pro);
$can_pro = $que_select_pro->fetch_array();



$conn->select_db("itcapp_citacademy");

$select_pro_d = "SELECT * FROM cit_academy_registration WHERE master_id = '".$can_data['master_id']."' ";
$que_select_pro_d = $conn->query($select_pro_d);
$can_pro_d = $que_select_pro_d->fetch_array();


 ?>
 <tr>
<td align="center"><?php echo $i; ?></td>
<?php if($can_pro['middel_name']==''){?>
<td align="center"><?php echo ucfirst($can_pro['first_name']).' '.ucfirst($can_pro['last_name']); ?></td>
<?php }else{?>
<td align="center"><?php echo ucfirst($can_pro['first_name']).' '.ucfirst($can_pro['middel_name']).' '.ucfirst($can_pro['last_name']); ?></td>
<?php } ?>
<td align="center"><?php echo $can_pro['email'];?></td>

<td align="center"><?php echo $can_pro_d['candidate_password']; ?></td>


<?php  
$conn->select_db("itcapp_website");

$select_one = $conn->query("SELECT * FROM sedna_operator_request_consultants_reg WHERE can_user_id = '".$emp['candidates_userid']."' ");
 $fetch2_one=$select_one->fetch_array();
 
?>

<td>
<a href="?page=edit&id=<?php echo $can_pro['reg_id'];?>" class="btn btn-default btn-sm btn-icon btn-primary">Edit</a>
<!--<a href="javascript:;" ntr="<?php echo $master_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1 upload_video">Upload Your Profile Video</a>-->
</td>

<td>
 <a href="?page=profile&id=<?php echo $can_pro['reg_id'];?>" class="btn btn-default btn-sm btn-icon btn-primary1">View</a>
</td>




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