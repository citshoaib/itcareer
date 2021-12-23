<?php
//error_reporting(0);
include('../../../config/config.php');
include('../../../config/function.php');


    $keywords = $_POST['keywords'];
    //echo "SELECT * FROM sedna_job_form where status='0' and (job_title like '%$keywords%')";
    $jobs_search_query = mysql_query("SELECT * FROM sedna_job_form where status='0' and (job_title like '%$keywords%' or category like '%$keywords%') group by job_title") or die(mysql_error());
    $count = mysql_num_rows($jobs_search_query);
    if($count>0){
        ?>
        <ul>
        <?
    while($row = mysql_fetch_array($jobs_search_query)){
        //print_r($row);
        ?>
        
         <li onclick="setdata('<?php echo $row['job_title'];?>')"><?php echo $row['job_title'];?></li>   
            
        <?
        
    }
    ?>
    </ul>
    <?
    }

?>
