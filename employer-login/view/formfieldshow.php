<!--<script type="text/javascript" src="../template/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="../template/highslide/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = '../template/highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
</script>-->
<?php
//require_once('../../config/config.php');
//require_once('../../config/function.php');
?>
<!--<div class="container content">
<div class="row">
<div class="span12">

<div class="widget widget-nopad">

<div class="widget-header"> <i class="icon-list-alt"></i>

<span style="float:right;margin-right:5px;margin-top:5px;"></span>

</div>

</div>
</div>
</div>-->
 <?php
$_SESSION['employer_id'];
 $emp_id = $_SESSION['employer_id'];
 if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
 ?>
<div class="container content mtb">
 
<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Registration List</h3>

<div class="res_tab">

<table class="table table-bordered data-table example_jh" style="font-family:arial; ">
<thead>
<tr>

<th>Employee Name</th>
<th>Industry</th>
<th>WebSite</th>
<th>Who We are</th>
<th>Location</th>
<th>ATs</th>
<th>Action</th>


</tr>
</thead>
<tbody>
<?php

$select_1=mysql_query("select * from sedna_form where id='$emp_id'")or die(mysql_error);

while($row_1=mysql_fetch_array($select_1))
{
 $id = $row_1['id'];
?>

<tr>
 
<td><?php echo $row_1['emp_name']; ?></td>
<td><?php echo $row_1['industry']; ?></td>
<td><?php echo $row_1['web'];?></td>
<td><?php echo $row_1['who_we'];?></td>
<td><?php echo $row_1['location'];?></td>

<td><?php echo $row_1['ATs'];?></td>


<td><?php //echo $row_1['company_name'];?>
<!--<a href="">View</a>-->

       
        </div>
    
    
     <a class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" href="?page=editEmployee&id=<?php echo $id;?>" >Edit</a>   


</td>

</tr>
<? } ?>
</tbody>
</table>
</div>
</div>
</div>

</div>
