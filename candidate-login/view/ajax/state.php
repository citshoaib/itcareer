
<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');
$country=$_REQUEST['country_id'];
$state_id=$_REQUEST['state_id'];
$flag="";


  // $sql_state = "SELECT * FROM state_master where country_code='".$country."'  order by state_name";


  $sql_state = "SELECT * FROM state_master where country_code='".$country."'  order by state_name";

$rs_state = $conn->query($sql_state);
?>
<select name="state" id="state" onchange="AjaxShipping(this.value)" class="form-control" style="width:100%; height:40px;"  >
<option value="">Please Select State</option>
<?
while($row_state = $rs_state->fetch_array()){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo $row_state['StateID']; ?>"><?php echo $row_state['state_name'];?></option>
<? }  ?>
</select>



