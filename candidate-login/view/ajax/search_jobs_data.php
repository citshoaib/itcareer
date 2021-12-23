<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');

$search_job = $_POST['search_job'];
$country = $_POST['country'];

if($search_job !=='' && $country!==''){
  $where = "where status='0' and (job_title like '%$search_job%' or location like '%$country%')";
}
elseif($search_job !==''){
  $where = "where status='0' and (job_title like '%$search_job%')";
}
elseif($country!==''){
   $where = "where status='0' and (location like '%$country%')";
}



?>


<?php
$i = 1;
//echo "SELECT * FROM sedna_job_form $where";
$jobs_search_query = mysql_query("SELECT * FROM sedna_job_form $where") or die(mysql_error());
while($row = mysql_fetch_array($jobs_search_query)){
  $image = $row['image'];
  //echo "<pre>";
  //print_r($row);?>
 <div class="row"> 

<div class="col-md-2">
<div class="img_as_100 pr0 fr pt_16">
  <?php if($image !=''){
    ?>
  <img src="../employer-login/upload_doc/image/<?php echo $row['image'];?>" />
  <?php }else{ ?>
  <img src="template/images/aa.png" />
  <?php }?>
</div>
</div>

<div class="col-md-10 pl0 pr0">
<div class="data_pro">
<h3 class="mb0"><?php echo ucwords($row['job_title']);?></h3>
<p class="mb0" style="color:#000;"><a href="<?php echo $row['company_url'];?>" target="_blank"><?php echo ucwords($row['company_name']);?></a> </p>
<span style="font-size:15px;"><?php echo ucwords($row['location']);?></span>
<div class="text_p mt_10 mb0"><p ><?php
 $string = strlen($row['description']);
if (strlen($row['description']) > 400) {
  $stringCut = substr($row['description'], 0, 400);
 
  echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 

}else{
  echo $row['description'];
}
//echo $string;
?></p></div>
<div class="icon_As mt0"> <strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?>  </div>
<div class="icon_As mt0"> <strong>Job Category:</strong> <?php echo ucwords(str_replace("_"," ",$row['category']));?>  </div>
<div class="icon_As mt0"> <strong>Eligibility:</strong> <?php echo ucfirst(str_replace("_"," ",$row['eligibility']));?>  </div>
<div class="btn_as pb_10 fr">
<button type="button" class="btn btn-warning" onclick="viewjobs('<?php echo $row['id'];?>');">VIEW MORE</button>
<button type="button" class="btn btn-warning" onclick="applyjobs('<?php echo $row['id'];?>');">APPLY NOW</button>
</div>
</div>

<div class="cl"></div>

<hr />

</div>

</div>





  <!--<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
      <div class="caption">
        <h3><?php echo ucwords($row['job_title']);?></h3>
        <p class="card-description"><?php echo $row['description'];?></p>
        <p class="card-description"><strong>Salary:</strong> <?php echo $row['salary_from'].' to '.$row['salary_to'];?></p>
        <p class="card-description"><strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?></p>
        <p class="card-description"><strong>Location:</strong> <?php echo ucwords($row['location']);?></p>
        <p class="card-description"><strong>Eligibility:</strong> <?php echo ucwords($row['eligibility']);?></p>
        <p class="card-description"><strong>Opening Date:</strong> <?php echo ucwords(date("d-M-Y",$row['opening_date']));?></p>
        <p class="card-description"><strong>Closing Date:</strong> <?php echo ucwords(date("d-M-Y",$row['closing_date']));?></p>
        <div align="center">
            <button type="button" class="btn btn-default" onclick="viewjobs('<?php echo $row['id'];?>');" style="margin: 5px;">VIEW MORE</button>
            <button type="button" class="btn btn-default btn-primary1" onclick="applyjobs('<?php echo $row['id'];?>');" style="margin: 5px;">APPLY NOW</button>
        </div>
      </div>
    </div>
  </div>-->
  <?php
  //if($i%3==0){
  //  
  //  ?>
  <!--  <div class="cl"></div>-->
    <?
  //  
  //}
  
  ?>
  
  <?
  $i++;
}

?>

