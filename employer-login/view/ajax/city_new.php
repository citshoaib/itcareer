<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');
$state_name=$_REQUEST['state_id'];
//$state_id=$_REQUEST['state_id'];
$flag="";


  ///$sql_state = "SELECT * FROM state_master where country_code='".$country."'  order by state_name";


  $sql_state = "SELECT DISTINCT city FROM zip_code where state_name='".$state_name."'  order by city";

$rs_state = mysql_query($sql_state) or die(mysql_error());
?>
<select name="city" class="form-control" style="width:100%; height:40px;"  >
<option value="">Please Select City</option>
<?
while($row_state = mysql_fetch_array($rs_state)){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo  $row_state['city']; ?>"><?php echo $row_state['city'];?></option>
<? }  ?>
</select>