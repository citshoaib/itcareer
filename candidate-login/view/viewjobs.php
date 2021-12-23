<?php
$jobid = $_GET['id'];
$select_jobs_details = mysql_query("SELECT * FROM sedna_job_form where id='$jobid'") or die(mysql_error());
$row = mysql_fetch_array($select_jobs_details);
$jobs_title = ucwords($row['job_title']);
$image = $row['image'];
?>


<style>

.data_pro h3{
color:#F69225;
padding:0px;
}

.data_pro{
margin-bottom:25px;
}

.ul_as li {
padding-bottom:10px;
}

.pl0{
padding-left:0px;
}

.pr0{
padding-right:0px;
}

.pt0{
padding-top:0px;
}

.pb0{
padding-bottom:0px;
}

.mt_10{
margin-top:10px;
}

.ml0{
margin-left:0px;
}
.mr0{
margin-right:0px;
}

.mt0{
margin-top:0px;
}

.mb0{
margin-bottom:0px;
}

.img_as_100 img {
width:120px;
height:120px;
}

.pt_16{
padding-top:16px;
}

.pt_10{
padding-top:10px;
}

.bg_as {
    background-color: #fff;
}

.mt_25{
margin-top:25px;
}

.br_as_c{
border:1px solid #EC971F;
}


</style>




<div class="container mt_25 ">
       <!--<div class="row">
        <div class="col-lg-12">
        <h3 class="block-head"><?php //echo $jobs_title;?></h3>
        </div>
       </div>-->
       
        
        <div class="row"> 

            
            
            
         <div class="col-md-12 content"> 
         <div class="col-md-2">
         <div class="img_as_100 fr"><?php if($image !=''){ ?>
         <img src="../employer-login/upload_doc/image/<?php echo $row['image'];?>" />
         <?php }else{ ?>
         <img src="template/images/aa.png" />
         <?php } ?>
         </div>
         </div>
         
        <div class="col-md-10 pl0 pl0">
        <div class="text_dada_job">
        <h3 class="mb0"><?php echo $jobs_title;?></h3>
        <p><?php echo ucwords($row['location']);?></p>
        <span>Posted Date: <?php echo date('d-M-Y',$row['entry_date'])?></span>
        </div>      
        
       <div class="btn_as mt_25 pb_10 fl"> <!--<button type="button" class="btn br_as_c btn-primary btn-md">Save</button>-->
        <button type="button" class="btn btn-primary btn-warning btn-md" onclick="applyjobs('<?php echo $row['id'];?>');">Apply</button></div>
        </div> 
         </div>
            
            
            <div class="cl"></div>
            
            
            
          
          <div class="col-md-12 mt_25 content">   
          
          <div class="col-md-12">
          <h3 class="mb0">Job description</h3>
          </div>
            
        <div class="col-md-8">   
          <div class="text_dada_job">
        
        <p><?php echo $row['description'];?></p>
        </div>  
            
        </div> 
        
        
        
        
        
        <div class="col-md-4"> 
        <div class="text_dada_job">
        
		<ul class="ul_as">
        <li><p class="mb0"> <b>Eligibility</b></p>
        <span> <?php echo ucwords($row['eligibility']);?> </span>
         </li>
        
        <li><p class="mb0"> <b>Experience Level</b></p>
        <span> <?php
        $master_level=$row['experience_level'];
$result_level=mysql_query("SELECT * FROM `experience_level_master` where id='$master_level'");
$value_level=mysql_fetch_array($result_level);

//echo $value_level['experience_level'];
        
        
        echo ucwords($value_level['experience_level']);?> </span>
         </li>
         
            <li><p class="mb0">  <b>Opening Date</b></p>
        <span> <?php echo date('d-M-Y',$row['opening_date'])?> </span>
         </li>
         
         
            <li><p class="mb0"> <b>Closing Date</b></p>
        <span><?php echo date('d-M-Y',$row['closing_date'])?> </span>
         </li>
            
            <li><p class="mb0"> <b>Salary (Rs.)</b></p>
        <span> <?php echo $row['salary_from'].' - '.$row['salary_to'];?> </span>
         </li>
         
         </ul>

        
        </div>
        </div>
        </div>
          
        </div>
          
          
          
          
          
          
            
            
            
        
        </div>
       
</div>

<script>
    function applyjobs(jobid){
              //alert(jobid);
              window.location.href = '?page=applyjobs&id='+jobid;
        }
</script>