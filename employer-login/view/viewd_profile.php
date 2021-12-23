<?php
/*if($_SESSION["id"]!='')
{
   $regid= $_SESSION["id"];
}
else*/ if($_REQUEST['reg_id']!=''){
$reg_id=$_REQUEST['reg_id'];
}
else{
   $reg_id=$_REQUEST['master_id'];
  
}
?>

<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">viewed Profile</h3>




<!--<div class="res_tab">-->
<table id="example" class="table" > <!--id="example"-->
<thead>	
<tr>
<th><h4>S no.</h4></th>
<th><h4>Employee Id</h4></th>
<th><h4>Candidate Id</h4></th>
<th><h4>Date</h4></th>
</tr>
</thead>    
    
<tbody>
    <?php
    
    $i=1;
    $sql = "SELECT * FROM sebna_profile_tbl ";
    $query = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($query)){
        $id = $row['id'];
        $status = $row['status'];
    ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo ucwords($row['package_name']);?></td>
        <td><?php echo ucwords($row['price']);?></td>
       <td><?php echo ucwords($row['job_posting']);?></td>
     
           </tr>
    <?php $i++; } ?>
</tbody>    
    
</table>
<!--</div>-->

</div></div></div>


<div class="container">
</div>