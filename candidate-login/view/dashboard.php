<?php

if(!$_SESSION["candidate_email"]){
header('location:?page=login');
}
?>

<style>

.mtb{
min-height: 440px;


}
.table-striped > tbody > tr:nth-of-type(2n+1) {
background-color: rgba(0, 0, 0, 0.08);
}



.blue:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #2980b9;
color: #fff;
}
.teal:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #16a085;
color: #fff;
}
.red:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #c0392b;
color: #fff;
}
.green:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #27ae60;
color: #fff;
}
.perple:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #2b3076;
color: #fff;
}
.orange:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #d35400;
color: #fff;
}
.cyan:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
background-color: #00bcd4;
color: #fff;
}

.dash-stat {
background: rgba(0, 0, 0, 0.1) none repeat scroll 0 0;
cursor: default;
height: 150px;
margin-bottom: 15px;
overflow: hidden;
position: relative;
text-align: center;
text-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}
.light-shadow {
box-shadow: 0 1px 10px rgba(0, 0, 0, 0.07);
}
.rounded {
border-radius: 3px !important;
}
.dash-stat .dash-stat-chart {
bottom: -10px;
height: 70%;
left: 0;
opacity: 0.6;
position: absolute;
transition: all 0.1s ease 0s;
width: 100%;
z-index: 1;
}
.dash-stat .dash-stat-chart canvas {
margin-left: -10px;
width: calc(100% + 20px);
}
.dash-stat .dash-stat-cont {
height: 100%;
left: 0;
padding: 20px;
position: absolute;
top: 0;
width: 100%;
z-index: 2;
}
.dash-stat .dash-stat-main {
display: block;
font-size: 30px;
font-weight: bold;
margin: 30px 0 15px;
transition: all 0.1s ease 0s;
}
.dash-stat .dash-stat-sub {
opacity: 0.8;
}
.dash-stat .dash-stat-more {
bottom: 0;
cursor: pointer;
left: 0;
padding: 5px 5px 5px 10px;
position: absolute;
text-align: left;
transform: translate(0px, 100%);
transition: all 0.1s ease 0s;
width: 100%;
}
.dash-stat .dash-stat-more i {
float: right;
font-size: 12px;
margin: 3px 5px 0;
}
.dash-stat:hover .dash-stat-chart, .dash-stat:hover .dash-stat-icon {
opacity: 1;
}
.dash-stat:hover .dash-stat-main {
margin-top: 12px;
}
.dash-stat:hover .dash-stat-more {
transform: translate(0px, 0px);
}
.modal-dialog {
margin-top: 15%;
}
</style>

<div class="container content mtb">

<div class="container">

<?php

$rowhgyt=$_SESSION['candidate_id'];

mysql_select_db('tools_citacademy');
$data_sel=mysql_query("SELECT * FROM `cit_academy_registration` where id='$rowhgyt'");
$data_arr=mysql_fetch_array($data_sel);
$can_user_id=$data_arr['candidates_userid'];

mysql_select_db('tools_jportal');
$dfhh=mysql_query("SELECT * FROM `sedna_operator_request_consultants_reg` where can_user_id='$can_user_id'");
$fchjh=mysql_fetch_array($dfhh);
$master_id_can=$fchjh['id'];

// $total_jobs = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can'") or die(mysql_error());
// $jobs_count = mysql_num_rows($total_jobs);

// $pending_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='0' ") or die(mysql_error());
// $upccoming = mysql_num_rows($pending_candidate);

//$active_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='1' ") or die(mysql_error());
//echo 'Total Active candidate - '.$total_active_candidtae= mysql_num_rows($active_candidate);
//echo "<br>";

//$reject_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='2' ") or die(mysql_error());
//echo 'Total Reject candidate - '.$total_reject_candidtae = mysql_num_rows($reject_candidate);
//echo "<br>";

// $Schedule_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='1' ") or die(mysql_error());
// $schedule = mysql_num_rows($Schedule_candidate);



?>
<?php

//$reg_id=$_REQUEST['id'];
//echo "select * from sedna_operator_request_consultants_reg where id='$master_id_can'";
$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$master_id_can'");
$fetch=mysql_fetch_array($select);
$reg_id=$fetch['id'];

$email=$fetch['email'];
$cv_name=$fchjh['cv'];


?>
<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Dashboard


<div class="fr" style="padding-right: 15px;">
<?
$value_video=mysql_query("SELECT * FROM `sedna_user_registration_tbl` where master_id='$reg_id' and video_id!='' and file_name!='' and file_url!=''");
$video_value_name=mysql_fetch_array($value_video);
$file_url=$video_value_name['file_url'];
$file_name=$video_value_name['file_name'];
$video_id=$video_value_name['video_id'];



if($video_id!=""){?>
<button class="btn btn-default btn-sm btn-icon btn-primary play_video"
   VideoId="<?php echo $video_id; ?>"
   VideoName="<?php echo $file_name; ?>"
   VideoURL="<?php echo $file_url; ?>"  >Play Video</button>
</a>
<?}?> 

<a  class="btn btn-info btn-custom btn-rounded waves-effect waves-light" id='cv' href="?page=listVideo">Video List</a>
<!--<button type="button" class="btn btn-danger"><i class="fa fa-play-circle"></i>&nbsp; Videos</button>-->
<!--<a  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview" id='cv' onClick="return hs.htmlExpand(this , {width:800, height:500})" href="#">View Resume </a>
<div class="highslide-maincontent" style="margin:5px;">
<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=http://develop-c.cheshtainfotech.com/jobportal/cdms/upload_doc/<?php echo $cv_name;?>" style="width: 100%; height: 575px;"></iframe>
</div>-->
<a  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview" id='cv' onClick="return hs.htmlExpand(this , {width:500, height:300})" href="#">Download Documents </a>
<div class="highslide-maincontent" style="margin:5px;">
   
   <h3>Documents List</h3>
   
<table width="100%" class="table">
   <?php  $i=1;
   $select_doc = mysql_query("SELECT * FROM `candidate_docs` where reg_id='$reg_id'");
   while($row_doc = mysql_fetch_array($select_doc)){
   ?>
   <tr>
      <td><? echo $i; ?></td>
      <td><a href="../admin/upload_doc/candidate_documents/<?php echo $row_doc['doc_name']; ?>" download><?php echo $row_doc['doc_name']; ?></a></td>
   </tr>
   <?php $i++; } ?>
</table>
</div>                          
<a class="btn btn-warning" href="../upload_doc/<?php echo $cv_name;?>" download>Download Resume</a>
<!--<a class="btn btn-warning" href="../upload_doc/<?php echo $cv_name;?>" download>Download Resume</a>-->
</div>

</h3>


</div>

</div>


<div class="row ">

<div class="col-lg-12">

<div class="col-md-4">
<div class="dash-stat light-shadow blue rounded">
<span id="stat-1" class="dash-stat-chart"><canvas style="display: inline-block; width: 139px; height: 105px; vertical-align: top;" width="139" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"></span>
<span class="dash-stat-sub">
<!--<input type="button" reg_ids="<? echo base64_encode($reg_id);?>" id="upload_video" class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_file" value="Upload Video1">-->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal0">Upload Video</button>
</span>

<!--<span class="dash-stat-more">View History <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>   

<div class="col-md-4">
<div class="dash-stat light-shadow teal rounded">
<span id="stat-2" class="dash-stat-chart"><canvas style="display: inline-block; width: 248px; height: 105px; vertical-align: top;" width="248" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"></span>
<span class="dash-stat-sub">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Upload CV</button>
</span>

<!--<span class="dash-stat-more">View Full Statistic <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>

<div class="col-md-4">
<div class="dash-stat light-shadow red rounded">

<div class="dash-stat-cont">
<span class="dash-stat-main"></span>
<span class="dash-stat-sub">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Upload Documents</button></span>

<!--<span class="dash-stat-more">View All Users <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>


</div>
</div>



<div class="row ">

<div class="col-lg-12">

<div class="col-md-4">
<div class="dash-stat light-shadow blue rounded">
<span id="stat-1" class="dash-stat-chart"><canvas style="display: inline-block; width: 139px; height: 105px; vertical-align: top;" width="139" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"><?php echo number_format($jobs_count);?></span>
<span class="dash-stat-sub">Total Jobs Applied</span>
<!--<span class="dash-stat-more">View History <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>   

<!--	<div class="col-md-4">
<div class="dash-stat light-shadow teal rounded">
<span id="stat-2" class="dash-stat-chart"><canvas style="display: inline-block; width: 248px; height: 105px; vertical-align: top;" width="248" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"><?php //echo number_format($schedule);?></span>
<span class="dash-stat-sub">Total Interview Scheduled </span>
<!--<span class="dash-stat-more">View Full Statistic <i class="fa fa-arrow-right"></i></span>-->
<!--	</div>
</div>
</div>-->

<!--	<div class="col-md-4">
<div class="dash-stat light-shadow red rounded">

<div class="dash-stat-cont">
<span class="dash-stat-main"><?php //echo number_format($upccoming);?></span>
<span class="dash-stat-sub">Upcoming Interviews</span>
<!--<span class="dash-stat-more">View All Users <i class="fa fa-arrow-right"></i></span>-->
<!--</div>
</div>
</div>-->


</div>
</div>
</div>
</div>


<div id="myModal0" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Upload Video</h4>
</div>
<div class="modal-body">
<form id="formVideo" method="post"  name="data" enctype="multipart/form-data">
<table width="52%" cellspacing="4" cellpadding="4">
<tr>
<th>Upload Video <span style="color:red;">*</span></th>
<td><input type="file" id="video_filename" name="video_filename">
<input type="hidden" name="can_id" value="<? echo $master_id_can;?>"></td></tr>
<tr><td></td><td>
<!--<input id="submit_cv" type="submit"  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_cv_doc" value="Submit">-->
<button  id="submit_video" type="submit"  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_cv_doc">Submit</botton></td></tr>
</table>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>





<div id="myModal1" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Upload Resume</h4>
</div>
<div class="modal-body">
<form id="formCv" method="post"  name="data" enctype="multipart/form-data">
<table width="52%" cellspacing="4" cellpadding="4">
<tr>
<th>Upload CV<span style="color:red;">*</span></th>
<td><input type="file" id="cv" name="cv">
<input type="hidden" name="can_id" value="<? echo $master_id_can;?>"></td></tr>
<tr><td></td><td>
<!--<input id="submit_cv" type="submit"  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_cv_doc" value="Submit">-->
<button  id="submit_cv" type="submit"  class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_cv_doc">Submit</botton></td></tr>
</table>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>


<div id="myModal2" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Upload Document</h4>
</div>
<div class="modal-body">
<form id="formDoc" name="formDoc" method="post" enctype="multipart/form-data">
<table width="52%" cellspacing="4" cellpadding="4" id="table_id">
<tr>
<th>Upload Document<span style="color:red;">*</span></th>
<tr id="appen_0">
<td><input type="hidden" name="can_id" value="<? echo $master_id_can;?>"><input type="text" name="id_type[]" ></td><td><input type="file" id="docs" name="docs[]"></td><td><input type="button" class="append" value="Add More"></td>
</tr>

</table>
<button name="Btn" value="Submit" id="submit_doc" class="btn btn-info btn-custom btn-rounded waves-effect waves-light Preview upload_file">Submit</button>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>



<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script>

$(".play_video").click(function(){
   VideoId=$(this).attr("VideoId");
   VideoName=$(this).attr("VideoName");
   VideoURL=$(this).attr("VideoURL");
   
   //alert(VideoId +" "+VideoName+" "+VideoURL);
   
   new_window=window.open(VideoURL,'name','height=500,width=700');
   if (window.focus) {new_window.focus();}
   
});


$(".upload_file").click(function(){

master_id=$(this).attr("id");

		
if(master_id=="upload_video"){


id=$(this).attr("reg_ids");

var pathname = window.location.pathname; // Returns path only

//link_video_1=pathname+"yt/?master_id="+id;
//link_video_1=pathname+"?page=node_form&master_id="+id;
link_video_1 = "http://209.124.66.8:49152/?master_id="+id;
//link_video_1 = "http://209.124.66.8:49152/";
$.confirm({
title: 'Instructions',
content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
buttons: {
confirm: function () {
 // $.alert('Confirmed!');
  
  newwindow=window.open(link_video_1,'name','height=500,width=700');
if (window.focus) {newwindow.focus();}
//return false;
},
cancel: function () {
 // $.alert('Canceled!');
}
}
});


  


}
			  
});


//*****video submit
$("form#formVideo").submit(function(e){
//alert("ok");
e.preventDefault();
var formData = new FormData($('#formVideo')[0]);
//alert(formData);
$.ajax({
url: "view/ajax/uploadVideo.php",
type: 'POST',
data: formData,
async: false,
success: function (data) {
   
if(data!=""){
$(".close").trigger( "click");
alert(data);
window.location.reload();
}
},
cache: false,
contentType: false,
processData: false
});

return false;
});
//*****video submit

$("form#formCv").submit(function(e){

e.preventDefault();
var formData = new FormData($('#formCv')[0]);
//alert(formData);
$.ajax({
url: "view/ajax/uploadCV.php",
type: 'POST',
data: formData,
async: false,
success: function (data) {
   //alert(data);
if(data==1){
$(".close").trigger( "click");
alert("cv updated successfully");
window.location.reload();
}
},
cache: false,
contentType: false,
processData: false
});

return false;
});



$(".append").click(function(){
valuetr=$("#table_id").find('tr').length;
//alert(valuetr);
$('#table_id tr:last').after("<tr id='append_"+valuetr+"'><td><input type='text' name='id_type[]' ></td><td><input type='file' id='docs' name='docs[]'></td><td align='center'><input type='button' class='remove_tr' value='Remove'></td></tr>");
$(".remove_tr").click(function(){
 $(this).parent().parent().remove();
  
  });

});




$("form#formDoc").submit(function(e){

e.preventDefault();
var formData = new FormData($('#formDoc')[0]);

$.ajax({
url: "view/ajax/uploadDOCS.php",
type: 'POST',
data: formData,
async: false,
cache: false,
contentType: false,
processData: false,
success: function (data) {

if(data=="1"){

$(".close").trigger( "click");
alert("Documents Submitted");
window.location.reload();

}
},

});

return false;
});





</script>