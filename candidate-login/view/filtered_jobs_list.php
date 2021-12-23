<?php
@session_start();
// retrieve session data
if(!$_SESSION["candidate_email"]){
      header('location:?page=login');
}
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
                                 <input name="update" class="btn btn-primary btn-lg" value="Search" data-automation-id="sign-in-button" type="submit" onclick="submit();">
                            </div>
                        </div>
                        
<br>
          <!--</form>-->
</div>
        
        </div>
       </div>
</div>

<div class="container content mtb show_div">
       <div class="row">
        <div class="col-lg-12">
          <div class="loader" style="display: none; text-align: center;"><img src="template/images/logo.gif" width="230px" ></div>
          <!--<div class="col-lg-8 mt_25 bg_as search_jobs_data" style="display: none; padding-top: 2%;"></div>-->
          <div class="col-lg-4 search_jobs_data_filter" style="display: none; padding-top: 2%;">
              <form action="?page=filtered_jobs_list&page_no=1" method="post">
		<div class="panel panel-default">
        <div class="panel-heading filt_h">
            <h3 class="panel-title">Filters <span id="apply_reset" ><ul class="two-btn">
		<li></li><li><input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" id="configreset" value="Reset" type="reset"><!--<a href="#">Reset</a>--></li> <!--onclick="reset_all();"-->
		<li><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Apply" type="submit"><!--<a href="#" class="active">Apply</a>--></li>
		</ul></span></h3>
        </div>
        
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        Jobs Category 
                    </div>
                    <div class="col-xs-2 taggle_color_h"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-1">
                    <hr></hr>
                    <div class="container pl0">
                        <div class="fluid-row">
                        
                            <div class="col-xs-12">
       <div class="all_checkbox_de">
         <input name="jobs_all" value="all_job_category" id="checkAll_job" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
         
         <span class="pt_5"> All </span>
         </div>
         </div>
                            
                         
                            
                            <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               
                               <?
         $job=mysql_query("SELECT * FROM sedna_category where status='0' ");
        $i=0;
         while($job_category=mysql_fetch_array($job)){
            ?>
            <input name="jobs_category[]" value="<? echo $job_category['cid'];?>" id="job_category_<? echo $i; ?>" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
            <span class="pt_5"><? echo $job_category['name'];?></span> <br> 

            
            <?
            $i++;
         }
         ?>
                                                             
                            </div>
               
                           <!-- <div class="col-xs-12">
                              <div class="all_checkbox_de">
                               <input name="" value="" id="checkAll" class="ng-pristine ng-valid current employment_type" type="checkbox">  
                               <span class="pt_5"> Design Jobs </span> 
                               </div>
                            </div>
                            

                            <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="" value="" id="checkAll" class="ng-pristine ng-valid current employment_type" type="checkbox"> 
                                <span class="pt_5"> Automobile Jobs </span>  
                                </div>
                            </div>
    

                            <div class="col-xs-12">
                              <div class="all_checkbox_de">
                               <input name="" value="" id="checkAll" class="ng-pristine ng-valid current employment_type" type="checkbox">  
                                 <span class="pt_5"> Mechanical Engineering Jobs </span> 
                                 </div>
                            </div>
-->

                             <div class="cl"></div>
                                                        
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-2" data-toggle="detail-2">
                    <div class="col-xs-10">
                       Company Name
                    </div>
                    <div class="col-xs-2 taggle_color_h"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-2">
                    <hr></hr>
                    <div class="container pl0">
                        <div class="fluid-row">
                        
                        
                            <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="jobs_all" value="all_company_name" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                               <span class="pt_5"> All </span> 
                               </div>
                            </div>
				    
				    <?php
				    
				    $select_compayname = mysql_query("SELECT id,company_name FROM sedna_job_form group by company_name") or die(mysql_error());
				    while($fetch_data_company=mysql_fetch_array($select_compayname)){
					?>
					<div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="company_name[]" value="<?php echo $fetch_data_company['id'];?>" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> <?php echo $fetch_data_company['company_name'];?> </span>  
                                </div>
                            </div>
					<?
				    }
				    
				    ?>
   
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-3" data-toggle="detail-3">
                    <div class="col-xs-10">
                        Experience Level
                    </div>
                    <div class="col-xs-2 taggle_color_h"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-3">
                    <hr></hr>
                    <div class="container pl0">
                        <div class="fluid-row">
                        
                        
                        
                        
                                <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="jobs_all" value="all_entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                               <span class="pt_5"> All </span> 
                               </div>  
                            </div>

                            
                                <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="entry_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Entry level </span> 
                                 </div>
                            </div>



                                <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="associate" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Associate </span>  
                               </div>
                            </div>




                               <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="internship" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                               <span class="pt_5"> Internship </span> 
                               </div> 
                            </div>
                            
                            
    
                               <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="mid_senior_level" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                            <span class="pt_5"> Mid-Senior level </span> 
                                            </div>
                            </div>
                            
                            
              
                                <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="not_applicable" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Not Applicable </span>  
                                  </div>
                            </div>
                            
                            
                            
                    <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="executive" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                       <span class="pt_5"> Executive </span> 
                                       </div>
                            </div>
                            
                            
      <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="experince_level[]" value="director" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">
                                  <span class="pt_5"> Director </span>
                                  </div>   
                            </div>
                            
                            
                            

                        </div>
                    </div>
                </div>
            </li>
            
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-2" data-toggle="detail-4">
                    <div class="col-xs-10">
                       Date Posted
                    </div>
                    <div class="col-xs-2 taggle_color_h"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-4">
                    <hr></hr>
                    <div class="container pl0">
                        <div class="fluid-row">
                        
                        
                        
                        
                                  <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="jobs_all" value="all_date_post" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                <span class="pt_5"> All Time </span>  
                                </div>
                            </div>
                            
                            
                            
                            
              <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="date_post[]" value="past_24_hours" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox">  
                                 <span class="pt_5"> Past 24 hours </span> 
                                 </div>
                            </div>
                            
                            
                            
                            
                        <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="date_post[]" value="past_week" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                  <span class="pt_5"> Past Week </span>  
                                  </div>
                            </div>
                            
                            
                            
                            
                       <div class="col-xs-12">
                            <div class="all_checkbox_de">
                               <input name="date_post[]" value="past_month" id="" class="ng-pristine ng-valid current employment_type checkAll" type="checkbox"> 
                                           <span class="pt_5"> Past Month </span> 
                                           </div> 
                            </div>

                        </div>
                    </div>
                </div>
            </li>
        </ul>
	</div>
		
              
          </div>
</form>


<div class="col-lg-8 mt_25 bg_as search_jobs_data" style="display: none; padding-top: 2%;"></div>
        </div>
          
          
          
       </div>
</div>
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