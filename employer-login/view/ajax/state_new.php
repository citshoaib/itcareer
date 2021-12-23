<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');
$country=$_REQUEST['country_id'];
$state_id=$_REQUEST['state_id'];
$flag="";


  // $sql_state = "SELECT * FROM state_master where country_code='".$country."'  order by state_name";


  $sql_state = "SELECT DISTINCT state_name FROM zip_code where county='".$country."'  order by state_name";

$rs_state = mysql_query($sql_state) or die(mysql_error());
?>
<select name="state" id="state1" onchange="AjaxShipping(this.value)" class="form-control" style="width:100%; height:40px;"  >
<option value="">Please Select State</option>
<?
while($row_state = mysql_fetch_array($rs_state)){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo  $row_state['state_name']; ?>"><?php echo $row_state['state_name'];?></option>
<? }  ?>
</select>
