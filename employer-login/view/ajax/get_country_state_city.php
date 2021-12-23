<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];

$query_1 = mysql_query("SELECT * FROM zip_code where zip_code='$id' ") or die(mysql_error());
$fetch_zip_data = mysql_fetch_array($query_1);

echo $city = $fetch_zip_data['city'].'||#';

//$country = $fetch_zip_data['country'];

$state = $fetch_zip_data['state'];

$dome = mysql_query(" SELECT * FROM state_master WHERE country_code='$state' ") or die(mysql_error());
$fetch_state_data = mysql_fetch_array($dome);
$country_code = $fetch_state_data['country_code'];

$query_2 = mysql_query(" SELECT * FROM country_master WHERE country_code='$country_code' ") or die(mysql_error());



//echo '_'.$country_name = $fetch_country_data['country_name'];


?>
<select name="Country" id="country" onchange="AjaxGetState(this.value)" required class="form-control">
          

<?php
$query_4 = mysql_query(" SELECT * FROM country_master  ") or die(mysql_error());
$fetch_country_data = mysql_fetch_array($query_2);
$country_code = $fetch_country_data['country_code'];

while( $fetch_country_data_1 = mysql_fetch_array($query_4)){
  
 $country_code_1 = $fetch_country_data_1['country_code'];

?>
<option <?php if($country_code ==  $country_code_1){ ?> selected <? } ?> value="<?php echo $fetch_country_data_1['country_code']; ?>"><?php echo $fetch_country_data_1['country_name']; ?></option>
<?php } ?>
</select>||#
<select name="state" id="state1" onchange="AjaxShipping(this.value)" class="form-control" style="width:100%; height:40px;" required >
 

<?php
$query_3 = mysql_query(" SELECT * FROM state_master WHERE country_code='$state' ") or die(mysql_error());
while( $fetch_state_data = mysql_fetch_array($query_3)){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo  $fetch_state_data['StateID']; ?>"><?php echo $fetch_state_data['state_name'];?></option>
<? }  ?>
</select>
<?php

//echo '_'.$state_name = $fetch_state_data['state_name'];






//echo "<pre>";
//print_r($fetch_data);



?>