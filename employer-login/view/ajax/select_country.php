<?

include('../../../config/config.php');
include('../../../config/function.php');


if($_POST['country_code']){
    
    

$country=$_REQUEST['country_code'];
$state_id=$_REQUEST['state_id'];
$flag="";


 echo "SELECT * FROM state_master where country_code='".$country."'  order by state_name";


  $sql_state = "SELECT *  FROM `state_master` WHERE `country_code` = '$country'";

$rs_state = $conn->query($sql_state);
?>

<?
while($row_state = $rs_state->fetch_array()){
?>
<option  <?php if($flag!=""){?> selected="selected" <?php }?> value="<?php echo $row_state['state_name']; ?>"><?php echo $row_state['state_name'];?></option>
<? }  ?>


<?}





if($_POST['edit_country_code']){
    
    

$country=$_REQUEST['edit_country_code'];
$state_id=$_REQUEST['state_id'];
$flag=$_REQUEST['city_ajax'];


  // $sql_state = "SELECT * FROM state_master where country_code='".$country."'  order by state_name";


  $sql_state = "SELECT *  FROM `state_master` WHERE `country_code` = '$country'";

$rs_state = $conn->query($sql_state);
?>

<?
while($row_state =$rs_state->fetch_array()){
?>
<option  <?php if($flag==$row_state['state_name']){?> selected="selected" <?php }?> value="<?php echo $row_state['state_name']; ?>"><?php echo $row_state['state_name'];?></option>
<? }  ?>


<?}








