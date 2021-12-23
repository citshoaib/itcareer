<?php
$id = $_SESSION["employer_id"];
// retrieve session data
if(!$_SESSION["employer_email"]){
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
$select = "SELECT * FROM sedna_form WHERE id = '".$_SESSION['employer_id']."' ";
$que_select = $conn->query($select);

?>
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


while($emp = $que_select->fetch_array()){
	
	//echo $emp['id'];

$status = $emp['status'];
 
?>



<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $emp['emp_name']; ?></td>
<td align="center"><?php echo $emp['email'];?><?php if($status == '0'){?>
<img src="template/images/verified.jpg" width="20px" >
<?php }else{?>
<img src="template/images/notverified.png" width="20px" >
<?php } ?></td>

<td align="center"><?php echo $emp['user_pass']; ?></td>

<td><a href="?page=editEmployee&id=<?php echo $id;?>" class="btn btn-default btn-sm btn-icon btn-primary">Edit</a></td>

<td><a href="<?php echo $emp['id'];?>" class="btn btn-default btn-sm btn-icon btn-primary1" onClick="return hs.htmlExpand(this , {width:600})"  >View</a>
<!--hislide div-->
<div class="highslide-maincontent" style="margin:5px;">
<form action="" method="post">
<table class="table table-striped" width="50%" cellpadding="10">
<?php
// echo $emp['id'];
// $i = $limit*($page-1)+1;
$popup = $conn->query("SELECT * FROM `sedna_form` WHERE id = '".$emp['id']."'");
$show = $popup->fetch_array();?>
<!--<tr>
<td>ID</td>
<td><?php echo $show['id'];?></td>
</tr>-->
<tr>
<td>Company Logo</td>
<td> <img id='logo' src='../upload_img/<?php echo $show['logo']; ?>' height='50' width='50' alt="no image avail"/></td>
</tr>

<tr>
<td>Employee Name</td>
<td><?php echo $show['emp_name'];?></td> 
</tr>


<tr>
<td>Employee Email</td>
<td><?php echo $show['email'];?></td>
</tr>


<?php

}
?>
<tr>
<td>Contact</td>
<td><?php echo $show['contact'];?></td>
</tr>
<tr>
<td>Social Pages</td>
<td><?php
//echo "SELECT * FROM employer_more_social_nedia_info where employer_id='".$_SESSION['employer_id']."'";

$select_social_media = $conn->query("SELECT * FROM employer_more_social_nedia_info where employer_id='".$_SESSION['employer_id']."'");
while($social_row = $select_social_media->fetch_array()){
	$social_media_department = $social_row['social_media_department'];
	
	$media_url = $social_row['media_url'];
	if($social_media_department == 'facebook' ){
	echo "Facebook - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	if($social_media_department == 'instagram' ){
	echo "Instagram - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	if($social_media_department == 'twitter' ){
	echo "Twitter - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	if($social_media_department == 'google+' ){
	echo "Google+ - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	if($social_media_department == 'linked_in' ){
	echo "LinkedIn - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	if($social_media_department == 'you_tube' ){
	echo "YouTube - <a href='".$media_url."' target='_blank'>".$media_url."</a>";
	}
	echo "<br>";
}

?></td>
</tr>

<tr>
<td>Industry</td>
<td><?php echo $show['industry'];?></td>
</tr>

<tr>
<td>Website</td>
<td><?php echo $show['web'];?></td>
</tr>

<tr>
<td>Location</td>
<td><?php echo $show['location'];?></td>
</tr>

<tr>
<td>Who we are</td>
<td><?php echo $show['who_we'];?></td>
</tr>




</table>
</form>

</div></td>
	<!--hislide div-->
	 
</tr>

    

<?php
	$i++;

?>
			
			
		</tbody>
	</table>

<!--<button type="submit" class="btn btn-wuxia btn-large btn-primary">Save changes</button>-->
					
			





</div>


</div></div>



<div class="container">
</div>
