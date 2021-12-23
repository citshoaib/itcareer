<?php
/*if($_SESSION["id"]!='')
{
$regid= $_SESSION["id"];
}
else*/ 
$reg_id=$_REQUEST['id'];


$select=$conn->query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
$fetch=$select->fetch_array();
$reg_id=$fetch['id'];

$email=$fetch['email'];
$cv_name=$fetch['cv'];
$status = $fetch['status'];

$select_profile=$conn->query("select * from sebna_profile_tbl where reg_id='$reg_id'");
$fetch_profile=$select_profile->fetch_array();
$first_name=$fetch_profile['first_name'];
$middel_name=$fetch_profile['middel_name'];
$last_name=$fetch_profile['last_name'];
$postal_code=$fetch_profile['zipcode'];
$email=$fetch_profile['email'];
$city=$fetch_profile['city'];
$phone_no=$fetch_profile['contact'];
$Country=$fetch_profile['country'];
$state=$fetch_profile['state'];
$profile_image = $fetch_profile['profile_image'];
$language_know = explode(",",$fetch_profile['language_know']);

$sedna_category = explode(",",$fetch_profile['sedna_category']);

$job_title= explode(",",$fetch_profile['job_title']);
// print_r($job_title);
$employment_type=explode(",",$fetch_profile['employment_type']);
$work_authorization=$fetch_profile['work_authorization'];
$salary=$fetch_profile['salary'];
$hourly_rate=$fetch_profile['hourly_rate'];
$experience=$fetch_profile['experience'];
$position=$fetch_profile['position'];
$searchable=$fetch_profile['searchable'];
$relocate=$fetch_profile['relocate'];
$security=$fetch_profile['security'];
$travel=$fetch_profile['travel'];
$preferred_location=$fetch_profile['preferred_location'];
$employer_name=$fetch_profile['employer_name'];
$employer_company=$fetch_profile['employer_company'];
$employer_email=$fetch_profile['employer_email'];
$employer_number=$fetch_profile['employer_number'];


?>
<style>



.card {
padding-top: 20px;
margin: 10px 0 20px 0;
background-color: rgba(214, 224, 226, 0.2);
border-top-width: 0;
border-bottom-width: 2px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
-webkit-box-shadow: none;
-moz-box-shadow: none;
box-shadow: none;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.card .card-heading {
padding: 0 20px;
margin: 0;
}

.card .card-heading.simple {
font-size: 20px;
font-weight: 300;
color: #777;
border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
display: inline-block;
width: 46px;
height: 46px;
margin-right: 15px;
vertical-align: top;
border: 0;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
display: inline-block;
vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
margin: 0;
font-size: 14px;
line-height: 16px;
color: #262626;
}

.card .card-heading.image .card-heading-header span {
font-size: 12px;
color: #999999;
}

.card .card-body {
padding: 0 20px;
margin-top: 20px;
}

.card .card-media {
padding: 0 20px;
margin: 0 -14px;
}

.card .card-media img {
max-width: 100%;
max-height: 100%;
}

.card .card-actions {
min-height: 30px;
padding: 0 20px 20px 20px;
margin: 20px 0 0 0;
}

.card .card-comments {
padding: 20px;
margin: 0;
background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
padding: 0;
margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
padding-right: 5px;
overflow: hidden;
font-size: 12px;
color: #999;
text-overflow: ellipsis;
white-space: nowrap;
}

.card-comments .media-heading {
font-size: 13px;
font-weight: bold;
}

.card.people {
position: relative;
display: inline-block;
width: 170px;
height: 300px;
padding-top: 0;
margin-left: 20px;
overflow: hidden;
vertical-align: top;
}

.card.people:first-child {
margin-left: 0;
}

.card.people .card-top {
position: absolute;
top: 0;
left: 0;
display: inline-block;
width: 170px;
height: 150px;
background-color: #ffffff;
}

.card.people .card-top.green {
background-color: #53a93f;
}

.card.people .card-top.blue {
background-color: #427fed;
}

.card.people .card-info {
position: absolute;
top: 150px;
display: inline-block;
width: 100%;
height: 101px;
overflow: hidden;
background: #ffffff;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.card.people .card-info .title {
display: block;
margin: 8px 14px 0 14px;
overflow: hidden;
font-size: 16px;
font-weight: bold;
line-height: 18px;
color: #404040;
}

.card.people .card-info .desc {
display: block;
margin: 8px 14px 0 14px;
overflow: hidden;
font-size: 12px;
line-height: 16px;
color: #737373;
text-overflow: ellipsis;
}

.card.people .card-bottom {
position: absolute;
bottom: 0;
left: 0;
display: inline-block;
width: 100%;
padding: 10px 20px;
line-height: 29px;
text-align: center;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.card.hovercard {
position: relative;
padding-top: 0;
overflow: hidden;
text-align: center;
background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
background: url("http://lorempixel.com/850/280/nature/4/");
background-size: cover;
height: 230px;
}

.card.hovercard .avatar {
position: relative;
top: -50px;
margin-bottom: -50px;
}

.card.hovercard .avatar img {
width: 100px;
height: 100px;
max-width: 100px;
max-height: 100px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
padding: 4px 8px 10px;
}

.card.hovercard .info .title {
margin-bottom: 4px;
font-size: 24px;
line-height: 1;
color: #262626;
vertical-align: middle;
}

.card.hovercard .info .desc {
overflow: hidden;
font-size: 12px;
line-height: 20px;
color: #737373;
text-overflow: ellipsis;
}

.card.hovercard .bottom {
padding: 0 20px;
margin-bottom: 17px;
}

.pro_ul li {
padding-left: 10px;
padding-top: 5px;
}

.languages_ul li{
display:inline;
padding-left:15px;
}

.mt_t_25{
margin-top:15px;
}



.data_pro h3{
color:#F69225;
padding:0px;
}

.data_pro{
margin-bottom:25px;
}

.ul_as li {
padding-bottom:10px;
}

.pl0{
padding-left:0px;
}

.pr0{
padding-right:0px;
}

.pt0{
padding-top:0px;
}

.pb0{
padding-bottom:0px;
}

.mt_10{
margin-top:10px;
}

.ml0{
margin-left:0px;
}
.mr0{
margin-right:0px;
}

.mt0{
margin-top:0px;
}

.mb0{
margin-bottom:0px;
}

.img_as_100 img {
width:120px;
height:120px;
}

.pt_16{
padding-top:16px;
}

.pt_10{
padding-top:10px;
}

.bg_as {
background-color: #fff;
}

.mt_25{
margin-top:25px;
}

.br_as_c{
border:1px solid #EC971F;
}

.icon_title_adit {
display: inline;
font-size: 12px;
vertical-align: top;
}

.icon_title_adit a:hover{
color:#EC971F;
}

.as_hover_title a:hover{
color:#EC971F !important;
}


</style>



<div class="container  mtb">
<div class="row">
<div class="col-md-2 col-sm-6">
</div>

<div class="col-md-8 col-sm-6">


<div class="col-md-12 content">

<div class="col-md-12">
<div class="card hovercard">
<div class="cardheader">

</div>
<div class="avatar">
   <?php
   if($profile_image!=''){
	   ?>
	   <img alt="" src="upload_doc/profile_picture/<?php echo $profile_image;?>">
	   <?php
   }else{
   ?>
   <img alt="" src="upload_doc/profile_picture/dummy_img.jpg">
   <?php
   }
   ?>

</div>
<div class="info">
<div class="title as_hover_title">
   <a target="_blank" href="#"><?php
	   $candidate_name = ucwords($first_name).' '.ucwords($middel_name).' '.ucwords($last_name);
   echo $candidate_name;?></a>
   
  <div class="icon_title_adit">
  <a href="?page=edit&id=<?php echo $reg_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  
  </div> 
</div>

<div class="desc"><br> <?php if($experience!=''){ echo "Experience: ".$experience.' yr'; } ?> </div>
<!--<div class="desc"></div>-->
</div>

</div>
</div>


<div class="cl"></div>


<div class="col-md-6">
<h3 class="mb0">Contact Details</h3>
<ul class="pro_ul">
<li><i class="fa fa-map-marker"></i>&nbsp; <?php
			//echo $Country;
           $select_country= $conn->query("select * from country_master where country_code='$Country'");
           $fetch_country=$select_country->fetch_array();
           
           $select_state= $conn->query("select * from state_master where StateID='$state'");
           $fetch_state=$select_state->fetch_array();
                       echo ucfirst($city).','.ucfirst($fetch_state['state_name']).','.$fetch_country['country_name']; ?> </li>
<li><i class="fa fa-envelope-o"></i>&nbsp; <?php echo $email; ?>&nbsp;
<?php if($status == '1'){?>
<img src="template/images/verified.jpg" width="20px" >
<?php }else{?>
<img src="template/images/notverified.png" width="20px" >
<?php } ?>
</li>
<li><i class="fa fa-phone"></i>&nbsp; <?php if($phone_no!='') { echo $phone_no; }else {?><a href="?page=edit&id=<?php echo $reg_id; ?>"> Add phone</a> <?php } ?></li>
<li><i class="fa fa-paper-plane"></i>&nbsp; <?php echo $postal_code; ?> </li>
</ul>
</div>



<div class="col-md-6">
<div class="fr">
    
<?
$value_video=$conn->query("SELECT * FROM `videos` where master_id='$reg_id'");
$video_value_name=$value_video->fetch_array();
$video_name=$video_value_name['video_path'];
$video_status=$video_value_name['status'];
 $youtube_video_id=$video_value_name['youtube_video_id'];



if($video_status=="0"){?><a href="javascript:;" class="btn btn-default btn-sm btn-icon btn-primary1">Video Under Process</a><? }elseif($video_status=="1" && $youtube_video_id!==""){?><a  data-toggle="modal" class="btn btn-default btn-sm btn-icon btn-primary play_" ntr="<?php echo $ikj; ?>" href="javascript:;" data-target="#vedio_display<?php echo $ikj; ?>" type="video/mp4">Play Video</a>
</a>

<!-- Modal -->
  <div class="modal fade" id="vedio_display<?php echo $ikj; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><? echo $name;?></h4>
        </div>
        <div class="modal-body">
         <iframe src="http://www.youtube.com/embed/<? echo $youtube_video_id;?>"
   width="560" height="315" frameborder="0" allowfullscreen></iframe>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div><?}?>    
    
<!--<button type="button" class="btn btn-danger"><i class="fa fa-play-circle"></i>&nbsp; Videos</button>-->
<a class="btn btn-warning" href="../candidate-login/upload_doc/<?php echo $cv_name;?>" download>Download Resume</a>
</div>
</div>   



</div>





<div class="cl"></div>




<div class="col-md-12 mt_t_25 content">
<div class="languages">

<h3>Languages</h3>
<ul class="languages_ul">
<?php
foreach($language_know as $language){
?>
<li> <strong><?php echo ucwords($language);?></strong>  </li>
<?php } ?>
</ul>
</div>
</div>




<div class="col-md-12 mt_t_25 content">
<div class="languages" style="margin-bottom:20px;">

<h3>Miscellaneous Information</h3>
<?php //print_r($employment_type);
count($employment_type);
for($i=0; $i< count($employment_type);$i++)
{
$id=$employment_type[$i];
$select_employment_type=$conn->query("select * from sebna_employment_type where id='$id'");
$fetch_employment_type=$select_employment_type->fetch_array();

$fetch_employment_type=$fetch_employment_type['employment_type'];
if($i!=0)
{
   echo ",".$fetch_employment_type;
   
}
else
{
   
   echo $fetch_employment_type;
}
}
?>
<br><div class="">Relocate? <?php echo ($relocate!='')? $relocate: 'No'; ?></div>
Preferred Location : <?php echo ucfirst($preferred_location); ?><br> 

</div>
</div>




<div class="col-md-12 mt_t_25 content">
<div class="languages">

<h3>Experience</h3>
<?php  $select_skills=$conn->query("select * from sebna_work_experience where reg_id='$reg_id'");
while($fetch_skills=$select_skills->fetch_array())
{ ?>
<p class="mb0" style="color:#000; font-size:18px;"><strong><?php echo ucfirst ($fetch_skills['job_title']); ?></strong></p>
<p><?php echo ucfirst ($fetch_skills['comapnay']); ?></p>
<p><?php echo $fetch_skills['start_date']." - ".$fetch_skills['end_date']. date('m/Y ',$fetch_skills['current'] ); ?></p>

<div class="cl"></div>


<hr / style="color:#000; width:100%;">
<?php } ?>

</div>
</div>


<div class="col-md-12 mt_t_25 content">
<div class="languages pb_15">

<h3>Social Media</h3>
<?php  $select_social=$conn->query("select * from candidate_more_social_nedia_info where candidate_id='$reg_id'");
while($fetch_social=$select_social->fetch_array())
{
   $social_media_department = $fetch_social['social_media_department'];
	
	$media_url = $fetch_social['media_url'];
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
    
    ?>
<!--<button type="button" class="btn"><?php echo $fetch_skills['skill_name']; ?></button>-->
<?php } ?>



</div>

</div>


<div class="col-md-12 mt_t_25 content">
<div class="languages pb_15">

<h3>Skills</h3>
<?php  $select_skills=$conn->query("select * from sedna_skills where reg_id='$reg_id'");
while($fetch_skills=$select_skills->fetch_array())
{ ?>
<button type="button" class="btn"><?php echo $fetch_skills['skill_name']; ?></button>
<?php } ?>



</div>

</div>





<div class="col-md-12 mt_t_25 content">
<div class="languages">

<h3>Education</h3>
<?php
$select_education=$conn->query("select * from sedna_education where reg_id='$reg_id'");
while($fetch_education=$select_education->fetch_array())
{

?>
<p class="mb0" style="color:#000; font-size:18px;"><strong><?php
$education=$fetch_education['education'];
$edu_master=$conn->query("select * from sedna_education_master where id='$education'");
$fetch_edu_master=$edu_master->fetch_array();
echo  $fetch_edu_master['education_type'].', '.ucfirst ($fetch_education['institution']); ?></strong></p>
<p><?php echo ucfirst ($fetch_education['city']).', '.ucfirst ($fetch_education['country']).', '.ucfirst ($fetch_education['year']); ?></p>
<!--        <p>Learn how to use Bootstrap tab plugin to create togglable or dynamic tabs to ... dynamic tabs to toggle between the content using the Bootstrap tabs plugin.</p>
-->
<div class="cl"></div>

<?php } ?>


</div>
</div>  





















</div>















<div class="col-md-2 col-sm-6">
</div>






</div>
</div>
