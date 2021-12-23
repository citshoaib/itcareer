<?php
@session_start();
// retrieve session data
if(!$_SESSION["candidate_email"]){
      header('location:?page=login');
}
$filtered_status = $_GET['filtered_status'];
?>
<div class="container content mtb">
       <div class="row">
        <div class="col-lg-12">
        <h3 class="block-head">Search Jobs</h3>
      <div class="col-xs-12 col-sm-9 col-sm-offset-2">
<!--<form action="model/edit_model.php" id="theform" method="post" enctype="multipart/form-data">-->
     
        <div class="row">
            
            <div class="col-md-12 ">
           <!-- <h3>Not Searchable (Editing):</h3>-->
                        </div>
            </div>
        <style>
            .panel-title{
                  
                  height: 30px;
            }
      /*      .search_jobs {
                background-color: orange;
                color: #fff;
                cursor: pointer;
                line-height: 25px;
                text-align: center;
                overflow: scroll;
                max-height: 100px;
                height: auto;
                z-index: 9999;
                position: absolute;
                width: 326px;
            }
            
            .search_jobs li:hover {
                background-color: #fff;
                color: #000;
            }*/
			.search_jobs ul li {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom: 1px solid #ccc;
    border-left: 4px solid #00affe;
    border-right: 1px solid #ccc;
    cursor: pointer;
    list-style: outside none none;
    margin-bottom: 1px;
    margin-top: 0;
    padding: 6px;
    z-index: 1000;
    background: #fff none repeat scroll 0 0;
}



.search_jobs ul {
    font-family: Arial,Helvetica,sans-serif;
    font-size: 11px;
    margin: 0;
    padding: 0;
}
     .search_jobs {
height: 204px;
overflow: auto;}      
     /*       .search_country {
                background-color: orange;
                color: #fff;
                cursor: pointer;
                line-height: 25px;
                text-align: center;
                overflow: scroll;
                max-height: 100px;
                height: auto;
                z-index: 9999;
                position: absolute;
                width: 326px;
            }
            
            .search_country li:hover {
                background-color: #fff;
                color: #000;
            }*/
            
            .search_country ul li {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom: 1px solid #ccc;
    border-left: 4px solid #00affe;
    border-right: 1px solid #ccc;
    cursor: pointer;
    list-style: outside none none;
    margin-bottom: 1px;
    margin-top: 0;
    padding: 6px;
    z-index: 1000;
    background: #fff none repeat scroll 0 0;
}

.search_country {
height: 204px;
overflow: auto;}
.search_country ul {
    font-family: Arial,Helvetica,sans-serif;
    font-size: 11px;
    margin: 0;
    padding: 0;
}
            
.data_pro h3{
color:#00affe;
padding:0px;
}

.data_pro{
margin-bottom:25px;
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
width:70px;
height:70px;
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

.panel-heading, .filt_h{
background-color:#00affe !important;
color:#fff !important;
}

.taggle_color_h i{
color:#00affe !important;
}

.all_checkbox_de span {
    padding-left: 4px;
    vertical-align: middle;
}

        </style>
        <script>
        function search_jobs(keywords){
        //alert(keywords);
        $( ".search_jobs" ).fadeOut( "slow" );
       $( ".search_country" ).fadeOut( "slow" );
        if(keywords !==''){
           $.ajax({
            type: 'POST',      
           url: "view/ajax/search_jobs.php",
           data:"keywords="+keywords,
           async: true,
            success: function(data) {
            if(data !==''){
              $( ".search_jobs" ).fadeIn( "slow" );
            $( ".search_jobs" ).html( data );
            }
            
            //window.location.reload(); 
                          }
                
            }) ; 
        }
        
        
        }
        
        function setdata(jobdata){
            $( "#search_job" ).val(jobdata);
            $( ".search_jobs" ).fadeOut( "slow" );
        }
        
        function searchcountry(keywords){
              
              
            
        $( ".search_jobs" ).fadeOut( "slow" );
           if(keywords !==''){
             $.ajax({
            type: 'POST',      
           url: "view/ajax/search_country.php",
           data:"keywords="+keywords,
           async: true,
            success: function(data) {
            //alert(data);
            if(data !==''){
              $( ".search_country" ).fadeIn( "slow" );
            $( ".search_country" ).html( data );
            }
            
            //window.location.reload(); 
                          }
                
            }) ;
           }
        }
        
        function setcountry(countrydata){
            $( "#country" ).val(countrydata);
            $( ".search_country" ).fadeOut( "slow" );
        }
        
        
        function submit(){
            var search_job = $("#search_job").val();
            var country = $("#country").val();
            
            //alert(search_job+' '+country);
            if(search_job !=='' || country!==''){
               $( ".search_jobs_data" ).fadeOut( "slow" );
               $( ".search_jobs_data_filter" ).fadeOut( "slow" );
               $( ".loader" ).fadeIn( "slow" );               
            
            
            $.ajax({
            type: 'POST',      
           url: "view/ajax/search_jobs_data.php",
           data:"search_job="+search_job+"&country="+country,
           async: true,
            success: function(data) {
                //alert(data);
		    
            if(data!==''){
              $( ".loader" ).fadeOut( "slow" );
              $( ".search_jobs_data" ).fadeIn( "slow" );
              $( ".search_jobs_data_filter" ).fadeIn( "slow" );
              $( ".search_jobs_data" ).html( data );
            }
           
            //window.location.reload(); 
                          }
                
            }) ;
            
            }
        }
        
        
        function viewjobs(jobid){
              //alert(jobid);
              window.location.href = '?page=viewjobs&id='+jobid;
        }
        
        function applyjobs(jobid){
              //alert(jobid);
              window.location.href = '?page=applyjobs&id='+jobid;
        }
        
        
         $('#search-box').keyup(function() {
         var txtVal = this.value;
         if ($.isNumeric(txtVal)) {
         // alert("nnnn");   
         }
         else
         {
         
         $.ajax({
         type: "POST",
         url: "view/ajax/readCountry.php",
         data:'keyword='+$(this).val(),
         beforeSend: function(){
         $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
         },
         success: function(data){
         $("#suggesstion-box").show();
         $("#suggesstion-box").html(data);
         $("#search-box").css("background","#FFF");
         }
         });  
              
         
         }
         
         });
         </script>
      
            <div class="row">
			<form method="post" action="?page=search_jobs&new_serch=filter&page_no=1" >
                            <div class="col-md-5 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input name="search_job" id="search_job" value="" class="alphaonly form-control " autocomplete="off" type="text" onkeyup="search_jobs(this.value);">
                                    <label for="form_control_1">Search jobs by title, keyword or company</label>
                                    </div>
                                <div class="search_jobs" style="display: none;"></div>
                                </div>
					</div>
							
					<div class="col-md-5 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input name="country" id="country" value="" class="alphaonly form-control " type="text" autocomplete="off" onkeyup="searchcountry(this.value);">
                                   
                                    <label for="form_control_1">City, state, postal code or country</label>
                                    </div>
                                <div class="search_country" style="display: none;"></div>
                                </div>
                            </div>
						
                            <div class="col-md-2 unit">
                                 <input name="update" class="btn btn-primary btn-lg" value="Search" data-automation-id="sign-in-button" type="submit" > <!--onclick="submit();"-->
                            </div>
				    
				    </form>
                        </div>
                        
<br>
          <!--</form>-->
</div>
            
            </div>
       </div>
</div>

<?php


if(isset($filtered_status)){
	
	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	$jobs_all = $_REQUEST['jobs_all'];
	$jobs_category = implode(',',$_REQUEST['jobs_category']);
	$company_name = implode(',',$_REQUEST['company_name']);
	$experince_level = implode(',',$_REQUEST['experince_level']);
	$date_post = implode(',',$_REQUEST['date_post']);
	
	if($jobs_all =='all_job_category'){
		$where = " ";
	}
	elseif($jobs_category !=''){
		$where = "where category in ($jobs_category) ";
	}
	elseif($company_name !='' ){
		$where = "where company_name like '%$company_name%'";
	}
	elseif($experince_level !=''){
		$where='';
	}
	elseif($date_post !=''){
		
		$past_24_hours = strtotime(date('d-M-Y', strtotime('-24 hour')));
		$previous_week = strtotime("-1 week +1 day");
		$past_month = strtotime(date("Y-m", strtotime("-1 months")));
		
		if($date_post='past_24_hours'){
		$where="WHERE entry_date >='$past_24_hours'";	
		}
		if($date_post='past_week'){
		$where="WHERE entry_date >='$previous_week' ";	
		}
		if($date_post='past_month'){
		$where="WHERE entry_date >='$past_month' ";	
		}
		
	}else{
	 $where ="";
	}
	
	
	$sql_filter = "SELECT * FROM sedna_job_form $where";

	
	?>
<div class="container content mtb show_div">
	
	<div class="row">
        <div class="col-lg-12">

<div class="filtered_status">
<div class="col-lg-4 search_jobs_data_filter" style="padding-top: 2%;">
              <form action="?page=search_jobs&filtered_status=filter&page_no=1" method="post">
			
			<h3 class="block-head">Filters
		
		<ul class="two-btn">
		<li></li>
			<li >
				<a href="?page=search_jobs" class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light">Reset</a>
				<!--<input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" id="configreset"  value="Reset" type="reset" >-->
				<!--<a href="#">Reset</a>--></li> <!--onclick="reset_all();"-->
		<li ><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Apply" type="submit"><!--<a href="#" class="active">Apply</a>--></li>
		</ul>
		
		
		</h3>
		
		<div id="st-accordion" class="st-accordion">
		<ul>
		
		<li class="" style="height: 40px;">
		<a href="#" class="f13">Jobs Category <span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		 <ul class="list">
         
         <li class="pall_5">
		 <input name="jobs_all" value="all_job_category" id="checkAll_job" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
		<span class="pt_5"> All </span>
	   </li>
         
         <?
         $job=mysql_query("SELECT * FROM sedna_category where status='0' ");
        $i=0;
         while($job_category=mysql_fetch_array($job)){
            ?>
		 <li class="pall_5">
            <input name="jobs_category[]" value="<? echo $job_category['cid'];?>" id="job_category_<? echo $i; ?>" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
            <span class="pt_5"><? echo $job_category['name'];?></span> <br> 
 </li>
            
            <?
            $i++;
         }
         ?>
         
         </ul>
		</div>
		</li>
		<li>
		<a href="#" class="f13">Company Name<span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		<ul class="list">
			
         
         <li class="pall_5">
		<input name="jobs_all" value="all_company_name" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
            <span class="pt_5"> All </span> 
	   </li>
         
         <?php
				    
				    $select_compayname = mysql_query("SELECT id,company_name FROM sedna_job_form group by company_name") or die(mysql_error());
				    while($fetch_data_company=mysql_fetch_array($select_compayname)){
					?>
					 <li class="pall_5">
                               <input name="company_name[]" value="<?php echo $fetch_data_company['company_name'];?>" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> <?php echo $fetch_data_company['company_name'];?> </span>  
					 </li>
					<?
				    }
				    
				    ?>
         
         </ul>
		</div>
		</li>
        <li>
         <a href="#" class="f13">Experience Level<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         
         
         
         <label class="switch">
        <!-- <input class="switch-input change_div" type="checkbox" />-->
         <span class="switch-label" data-on="Hourly" data-off="Annual"></span> 
         <span class="switch-handle"></span> 
         </label>
         
         
         <div class="cl"></div>
         <div class="Annual_div">      
         <ul class="list">
         <li class="pall_5">
		 <input name="jobs_all" value="all_entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                               <span class="pt_5"> All </span> 
	   </li>
	   
	   <?php
	   $select_experience_level = mysql_query("SELECT * FROM experience_level_master") or die(mysql_error());
	   while( $row_fetch_experience_level = mysql_fetch_array($select_experience_level) ){
		?>
		<li class="pall_5">
			<input name="experince_level[]" value="<?php echo $row_fetch_experience_level['id'];?>" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> <?php echo ucwords(str_replace('_',' ',$row_fetch_experience_level['experience_level']));?> </span> 
			</li>
		<?php
	   }
	   ?>
	   
			<!--<li class="pall_5">
			<input name="experince_level[]" value="entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Entry level </span> 
			</li>
			
			<li class="pall_5">
			<input name="experince_level[]" value="associate" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Associate </span>  
			</li>
			
			<li class="pall_5">
			<input name="experince_level[]" value="internship" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Internship </span>
			
			</li>
			
			<li class="pall_5">
			 <input name="experince_level[]" value="mid_senior_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                            <span class="pt_5"> Mid-Senior level </span> 
			</li>
			
			
			<li class="pall_5">
			 <input name="experince_level[]" value="not_applicable" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Not Applicable </span>  
			</li>
			
			<li class="pall_5">
				<input name="experince_level[]" value="executive" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                       <span class="pt_5"> Executive </span> 
			</li>
			
			<li class="pall_5">
				 <input name="experince_level[]" value="director" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                                  <span class="pt_5"> Director </span>
			</li>-->
         
         
         </ul>
         </div>
        
         </div>
         </li>
        <li>
         <a href="#" class="f13">Date Posted<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5">
		<input name="jobs_all" value="all_date_post" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> All Time </span> 
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_24_hours" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Past 24 hours </span> 
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_week" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Past Week </span>  
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_month" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                           <span class="pt_5"> Past Month </span> 
	   </li>
        
         </ul>
         </div>
         </li>
        
		</div>
			
			
		  </form>
</div>

<div class="col-lg-8 mt_25 bg_as " style=" padding-top: 2%;">
	
	
	<?php
$i = 1;
//echo "SELECT * FROM sedna_job_form $where";
$jobs_search_query = mysql_query($sql_filter) or die(mysql_error());
$count_filter = mysql_num_rows($jobs_search_query);
if($count_filter>0){
while($row = mysql_fetch_array($jobs_search_query)){
  $image = $row['image'];
  //echo "<pre>";
  //print_r($row);?>
 <div class="row"> 

<div class="col-md-2">
<div class="img_as_100 pr0 fr pt_16">
  <?php if($image !=''){
    ?>
  <img src="../employer-login/upload_doc/image/<?php echo $row['image'];?>" />
  <?php }else{ ?>
  <img src="template/images/aa.png" />
  <?php }?>
</div>
</div>

<div class="col-md-10 pl0 pr0">
<div class="data_pro">
<h3 class="mb0"><?php echo ucwords($row['job_title']);?></h3>
<p class="mb0" style="color:#000;"><a href="<?php echo $row['company_url'];?>" target="_blank"><?php echo ucwords($row['company_name']);?></a> </p>
<span style="font-size:15px;"><?php echo ucwords($row['location']);?></span>
<div class="text_p mt_10 mb0"><p ><?php
 $string = strlen($row['description']);
if (strlen($row['description']) > 400) {
  $stringCut = substr($row['description'], 0, 400);
 
  echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 

}else{
  echo $row['description'];
}
//echo $string;
?></p></div>
<div class="icon_As mt0"> <strong>Experience Level:</strong> <?php




echo ucwords($row['experience_level']);?></div>
<div class="icon_As mt0"> <strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?>  </div>
<div class="icon_As mt0"> <strong>Job Category:</strong> <?php 
$select_category = mysql_query("SELECT * FROM sedna_category where cid='".$row['category']."'" );
$fetch_name = mysql_fetch_array($select_category);
echo ucwords($fetch_name['name']);
//echo ucwords(str_replace("_"," ",$row['category']));

?>  </div>
<div class="icon_As mt0"> <strong>Eligibility:</strong> <?php echo ucfirst(str_replace("_"," ",$row['eligibility']));?>  </div>
<div class="btn_as pb_10 fr">
<button type="button" class="btn btn-warning" onclick="viewjobs('<?php echo $row['id'];?>');">VIEW MORE</button>
<button type="button" class="btn btn-warning" onclick="applyjobs('<?php echo $row['id'];?>');">APPLY NOW</button>
</div>
</div>

<div class="cl"></div>

<hr />

</div>

</div>





  <!--<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
      <div class="caption">
        <h3><?php echo ucwords($row['job_title']);?></h3>
        <p class="card-description"><?php echo $row['description'];?></p>
        <p class="card-description"><strong>Salary:</strong> <?php echo $row['salary_from'].' to '.$row['salary_to'];?></p>
        <p class="card-description"><strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?></p>
        <p class="card-description"><strong>Location:</strong> <?php echo ucwords($row['location']);?></p>
        <p class="card-description"><strong>Eligibility:</strong> <?php echo ucwords($row['eligibility']);?></p>
        <p class="card-description"><strong>Opening Date:</strong> <?php echo ucwords(date("d-M-Y",$row['opening_date']));?></p>
        <p class="card-description"><strong>Closing Date:</strong> <?php echo ucwords(date("d-M-Y",$row['closing_date']));?></p>
        <div align="center">
            <button type="button" class="btn btn-default" onclick="viewjobs('<?php echo $row['id'];?>');" style="margin: 5px;">VIEW MORE</button>
            <button type="button" class="btn btn-default btn-primary1" onclick="applyjobs('<?php echo $row['id'];?>');" style="margin: 5px;">APPLY NOW</button>
        </div>
      </div>
    </div>
  </div>-->
  <?php
  //if($i%3==0){
  //  
  //  ?>
  <!--  <div class="cl"></div>-->
    <?
  //  
  //}
  
  ?>
  
  <?
  $i++;
  
}

}else{
	
	echo "<h3>No Jobs Available</h3>";
	
}

?>
	
	
</div>
        </div>


	  </div>
	</div>
</div>
	
	</div>
<?php	
}else{
	
	$new_serch=$_REQUEST['new_serch'];
	
	if($new_serch!=''){
		
	
	?>
	
	

<div class="container content mtb show_div">
       <div class="row">
        <div class="col-lg-12">
          <div class="loader" style="display: none; text-align: center;"><img src="template/images/logo.gif" width="230px" ></div>
          <!--<div class="col-lg-8 mt_25 bg_as search_jobs_data" style="display: none; padding-top: 2%;"></div>-->
          <div class="col-lg-4 search_jobs_data_filter" style=" padding-top: 2%;">
              <form action="?page=search_jobs&filtered_status=filter&page_no=1" method="post">
			
			<h3 class="block-head">Filters
		
		<ul class="two-btn">
		<li></li>
			<li >
				<a href="?page=search_jobs" class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light">Reset</a>
				<!--<input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" id="configreset"  value="Reset" type="reset" >-->
				<!--<a href="#">Reset</a>--></li> <!--onclick="reset_all();"-->
		<li ><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Apply" type="submit"><!--<a href="#" class="active">Apply</a>--></li>
		</ul>
		
		
		</h3>
		
		<div id="st-accordion" class="st-accordion">
		<ul>
		
		<li class="" style="height: 40px;">
		<a href="#" class="f13">Jobs Category <span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		 <ul class="list">
         
         <li class="pall_5">
		 <input name="jobs_all" value="all_job_category" id="checkAll_job" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
		<span class="pt_5"> All </span>
	   </li>
         
         <?
         $job=mysql_query("SELECT * FROM sedna_category where status='0' ");
        $i=0;
         while($job_category=mysql_fetch_array($job)){
            ?>
		 <li class="pall_5">
            <input name="jobs_category[]" value="<? echo $job_category['cid'];?>" id="job_category_<? echo $i; ?>" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
            <span class="pt_5"><? echo $job_category['name'];?></span> <br> 
 </li>
            
            <?
            $i++;
         }
         ?>
         
         </ul>
		</div>
		</li>
		<li>
		<a href="#" class="f13">Company Name<span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		<ul class="list">
			
         
         <li class="pall_5">
		<input name="jobs_all" value="all_company_name" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
            <span class="pt_5"> All </span> 
	   </li>
         
         <?php
				    
				    $select_compayname = mysql_query("SELECT id,company_name FROM sedna_job_form group by company_name") or die(mysql_error());
				    while($fetch_data_company=mysql_fetch_array($select_compayname)){
					?>
					 <li class="pall_5">
                               <input name="company_name[]" value="<?php echo $fetch_data_company['company_name'];?>" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> <?php echo $fetch_data_company['company_name'];?> </span>  
					 </li>
					<?
				    }
				    
				    ?>
         
         </ul>
		</div>
		</li>
        <li>
         <a href="#" class="f13">Experience Level<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         
         
         
         <label class="switch">
        <!-- <input class="switch-input change_div" type="checkbox" />-->
         <span class="switch-label" data-on="Hourly" data-off="Annual"></span> 
         <span class="switch-handle"></span> 
         </label>
         
         
         <div class="cl"></div>
         <div class="Annual_div">      
         <ul class="list">
         <li class="pall_5">
		 <input name="jobs_all" value="all_entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                               <span class="pt_5"> All </span> 
	   </li>
	   
	   <?php
	   $select_experience_level = mysql_query("SELECT * FROM experience_level_master") or die(mysql_error());
	   while( $row_fetch_experience_level = mysql_fetch_array($select_experience_level) ){
		?>
		<li class="pall_5">
			<input name="experince_level[]" value="<?php echo $row_fetch_experience_level['id'];?>" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                  <span class="pt_5"> <?php echo ucwords(str_replace('_',' ',$row_fetch_experience_level['experience_level']));?> </span> 
			</li>
		<?php
	   }
	   ?>
	   
			<!--<li class="pall_5">
			<input name="experince_level[]" value="entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Entry level </span> 
			</li>
			
			<li class="pall_5">
			<input name="experince_level[]" value="associate" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Associate </span>  
			</li>
			
			<li class="pall_5">
			<input name="experince_level[]" value="internship" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Internship </span>
			
			</li>
			
			<li class="pall_5">
			 <input name="experince_level[]" value="mid_senior_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                            <span class="pt_5"> Mid-Senior level </span> 
			</li>
			
			
			<li class="pall_5">
			 <input name="experince_level[]" value="not_applicable" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Not Applicable </span>  
			</li>
			
			<li class="pall_5">
				<input name="experince_level[]" value="executive" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                       <span class="pt_5"> Executive </span> 
			</li>
			
			<li class="pall_5">
				 <input name="experince_level[]" value="director" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                                  <span class="pt_5"> Director </span>
			</li>-->
         
         
         </ul>
         </div>
        
         </div>
         </li>
        <li>
         <a href="#" class="f13">Date Posted<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5">
		<input name="jobs_all" value="all_date_post" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> All Time </span> 
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_24_hours" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Past 24 hours </span> 
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_week" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Past Week </span>  
	   </li>
	   
	   <li class="pall_5">
		<input name="date_post[]" value="past_month" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                           <span class="pt_5"> Past Month </span> 
	   </li>
        
         </ul>
         </div>
         </li>
        
		</div>
			
			
		  </form>
	    </div>

<div class="col-lg-8 mt_25 bg_as search_jobs_data" style=" padding-top: 2%;">
	
	<?php
	
	
	$search_job = $_POST['search_job'];
$country = $_POST['country'];

if($search_job !=='' && $country!==''){
  $where = "where status='0' and (job_title like '%$search_job%' and location like '%$country%')";
}
elseif($search_job !==''){
  $where = "where status='0' and (job_title like '%$search_job%')";
}
elseif($country!==''){
   $where = "where status='0' and (location like '%$country%')";
}

$i = 1;
//echo "SELECT * FROM sedna_job_form $where";
$jobs_search_query = mysql_query("SELECT * FROM sedna_job_form $where") or die(mysql_error());
while($row = mysql_fetch_array($jobs_search_query)){

?>
	
<div class="row"> 

<div class="col-md-2">
<div class="img_as_100 pr0 fr pt_16">
  <?php if($image !=''){
    ?>
  <img src="../employer-login/upload_doc/image/<?php echo $row['image'];?>" />
  <?php }else{ ?>
  <img src="template/images/aa.png" />
  <?php }?>
</div>
</div>

<div class="col-md-10 pl0 pr0">
<div class="data_pro">
<h3 class="mb0"><?php echo ucwords($row['job_title']);?></h3>
<p class="mb0" style="color:#000;"><a href="<?php echo $row['company_url'];?>" target="_blank"><?php echo ucwords($row['company_name']);?></a> </p>
<span style="font-size:15px;"><?php echo ucwords($row['location']);?></span>
<div class="text_p mt_10 mb0"><p ><?php
 $string = strlen($row['description']);
if (strlen($row['description']) > 400) {
  $stringCut = substr($row['description'], 0, 400);
 
  echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 

}else{
  echo $row['description'];
}
//echo $string;
?></p></div>
<div class="icon_As mt0"> <strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?>  </div>
<div class="icon_As mt0"> <strong>Job Category:</strong> <?php 
$select_category = mysql_query("SELECT * FROM sedna_category where cid='".$row['category']."'" );
$fetch_name = mysql_fetch_array($select_category);
echo ucwords($fetch_name['name']);
//echo ucwords(str_replace("_"," ",$row['category']));?>  </div>
<div class="icon_As mt0"> <strong>Experience Level:</strong> <?php
$master_level=$row['experience_level'];
$result_level=mysql_query("SELECT * FROM `experience_level_master` where id='$master_level'");
$value_level=mysql_fetch_array($result_level);

//echo $value_level['experience_level'];


echo ucwords($value_level['experience_level']);?></div>
<div class="icon_As mt0"> <strong>Eligibility:</strong> <?php echo ucfirst(str_replace("_"," ",$row['eligibility']));?>  </div>
<div class="btn_as pb_10 fr">
<button type="button" class="btn btn-warning" onclick="viewjobs('<?php echo $row['id'];?>');">VIEW MORE</button>
<button type="button" class="btn btn-warning" onclick="applyjobs('<?php echo $row['id'];?>');">APPLY NOW</button>
</div>
</div>

<div class="cl"></div>

<hr />

</div>

</div>





  <!--<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
      <div class="caption">
        <h3><?php echo ucwords($row['job_title']);?></h3>
        <p class="card-description"><?php echo $row['description'];?></p>
        <p class="card-description"><strong>Salary:</strong> <?php echo $row['salary_from'].' to '.$row['salary_to'];?></p>
        <p class="card-description"><strong>Job Type:</strong> <?php echo ucwords(str_replace("_"," ",$row['job_type']));?></p>
        <p class="card-description"><strong>Location:</strong> <?php echo ucwords($row['location']);?></p>
        <p class="card-description"><strong>Eligibility:</strong> <?php echo ucwords($row['eligibility']);?></p>
        <p class="card-description"><strong>Opening Date:</strong> <?php echo ucwords(date("d-M-Y",$row['opening_date']));?></p>
        <p class="card-description"><strong>Closing Date:</strong> <?php echo ucwords(date("d-M-Y",$row['closing_date']));?></p>
        <div align="center">
            <button type="button" class="btn btn-default" onclick="viewjobs('<?php echo $row['id'];?>');" style="margin: 5px;">VIEW MORE</button>
            <button type="button" class="btn btn-default btn-primary1" onclick="applyjobs('<?php echo $row['id'];?>');" style="margin: 5px;">APPLY NOW</button>
        </div>
      </div>
    </div>
  </div>-->
  <?php
  //if($i%3==0){
  //  
  //  ?>
  <!--  <div class="cl"></div>-->
    <?
  //  
  //}
  
  ?>
  
  <?
  $i++;
}

?>	
	
</div>
        </div>
          
          
          
       </div>
</div>
	 
	 
	 <?php
	}
}

?>
 
<script>
      
//      setInterval(function () {
//      
//    
//$(".show_div :checked").each(function() {
//
//
//    alert(this.id + " is checked");
//
//});
//},1);


      
</script>
