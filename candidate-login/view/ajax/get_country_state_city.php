<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');

$id=$_REQUEST['id'];

$query_1 = $conn->query("SELECT * FROM zip_code where zip_code='$id' ");
$fetch_zip_data = $query_1->fetch_array();

echo $city = $fetch_zip_data['city'].'||#';

//$country = $fetch_zip_data['country'];

$state = $fetch_zip_data['state'];

$dome = $conn->query(" SELECT * FROM state_master WHERE country_code='$state' ");
$fetch_state_data = $dome->fetch_array();
$country_code = $fetch_state_data['country_code'];

$query_2 = $conn->query(" SELECT * FROM country_master WHERE country_code='$country_code' ");



//echo '_'.$country_name = $fetch_country_data['country_name'];


?>
<select name="Country" id="country" onchange="AjaxGetState(this.value)" required class="form-control">
         

<?php
$query_4 = $conn->query(" SELECT * FROM country_master  ");
$fetch_country_data = $query_2->fetch_array();
$country_code = $fetch_country_data['country_code'];

while( $fetch_country_data_1 = $query_4->fetch_array()){
 
$country_code_1 = $fetch_country_data_1['country_code'];

?>
<option <?php if($country_code ==  $country_code_1){ ?> selected <? } ?> value="<?php echo $fetch_country_data_1['country_code']; ?>"><?php echo $fetch_country_data_1['country_name']; ?></option>
<?php } ?>
</select>||#
<select name="state" id="state1" onchange="AjaxShipping(this.value)" class="form-control" style="width:100%; height:40px;" required >


<?php
$query_3 = $conn->query(" SELECT * FROM state_master WHERE country_code='$state' ");
while( $fetch_state_data = $query_3->fetch_array()){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo  $fetch_state_data['StateID']; ?>"><?php echo $fetch_state_data['state_name'];?></option>
<? }  ?>
</select>
<?php

//echo '_'.$state_name = $fetch_state_data['state_name'];






//echo "<pre>";
//print_r($fetch_data);



?>