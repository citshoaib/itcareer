<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');
?>
<ul>
    <?php
    
    $keywords = $_POST['keywords'];
    //echo "SELECT city,county,state_name,zip_code FROM zip_code where city like '%$keywords%' or county like '%$keywords%' or state_name like '%$keywords%' or zip_code like '%$keywords%'";
    $sql = $conn->query("SELECT city,county,state_name,zip_code FROM zip_code where city like '%$keywords%' or county like '%$keywords%' or state_name like '%$keywords%' or zip_code like '%$keywords%'") or die(mysql_error());
     $count = $sql->num_rows;
    if($count>0){
        ?>
        <ul>
            <?
    while($row = $sql->fetch_array()){
        
   ?>
    <li onclick="setcountry('<?php echo $row['zip_code'].','.$row['city'].','.$row['state_name'].','.$row['county'];?>')"><?php echo $row['zip_code'].','.$row['city'].','.$row['state_name'].','.$row['county'];?></li>
    <?
     }
     ?>
     </ul>
     <?
     
    }
    ?>
