	<div class="container content mtb">
		
		<div class="row ">












<div class="col-md-3">
		<h3 class="block-head">Filters
		
		<ul class="two-btn">
		<li><li ><input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" id="configreset"  value="Reset" type="reset" ><!--<a href="#">Reset</a>--></li> <!--onclick="reset_all();"-->
		<li ><input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Apply" type="submit"><!--<a href="#" class="active">Apply</a>--></li>
		</ul>
		<script>
			 $('#configreset').click(function(){
            $('#configform')[0].reset();
						 window.location.href = "?page=search";
       });
			 
			 		</script>
		
		</h3>
		
		<div id="st-accordion" class="st-accordion">
		<ul>
		
		<li class="" style="height: 40px;">
		<a href="#" class="f13">Employment Type<span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		 <ul class="list">
         
         <li class="pall_5"> <input name="" value="" id="checkAll" class="ng-pristine ng-valid current employment_type" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_m = mysql_query("SELECT * FROM `sebna_employment_type`");
         while($row_m = mysql_fetch_array($sql_m)){
         
         ?>
         
         <li class="pall_5"> <input name="employment_type[]" value="<? echo $row_m["id"]; ?>" id="" class="ng-pristine ng-valid current employment_type" type="checkbox">  <span class="pt_5"> <? echo $row_m["employment_type"]; ?></span>           </li>
         
         <? }  ?>
         
         </ul>
		</div>
		</li>
		<li>
		<a href="#" class="f13">Work Authorization<span class="st-arrow">Open or Close</span></a>
		<div class="st-content" style="display: none;">
		<ul class="list">
         
         <? $sql_iy123 = mysql_query("SELECT id FROM `sebna_work_authorization`");
         while($row_iy123 = mysql_fetch_array($sql_iy123)){
         
         $ty12.= $row_iy123['id'].',';
         
         }
         // // echo $ty;
         $all_work_authorization= rtrim($ty12,",");
         ?>      
         
         
         
         <li class="pall_5"> <input name="work_authorization[]" value="<?php echo $all_work_authorization; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_w = mysql_query("SELECT * FROM `sebna_work_authorization`");
         while($row_w = mysql_fetch_array($sql_w)){
         
         ?>
         
         <li class="pall_5"> <input name="work_authorization[]" value="<? echo $row_w["id"]; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> <? echo $row_w["work_authorization"]; ?></span>           </li>
         
         <? }  ?>
         
         </ul>
		</div>
		</li>
        <li>
         <a href="#" class="f13">Compensation<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         
         
         
         <label class="switch">
         <input class="switch-input change_div" type="checkbox" />
         <span class="switch-label" data-on="Hourly" data-off="Annual"></span> 
         <span class="switch-handle"></span> 
         </label>
         
         
         <div class="cl"></div>
         <div class="Annual_div">      
         <ul class="list">
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="0-9999999999" >  <span class="pt_5"> All </span></li>
         <!--<li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="0" >  <span class="pt_5"> Negotiable </span></li>-->
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="0-30000" >  <span class="pt_5"> Less than $30,000 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="30000-39999" >  <span class="pt_5"> $30,000 to $39,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="40000-49999" >  <span class="pt_5"> $40,000 to $49,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="50000-59999" >  <span class="pt_5"> $50,000 to $59,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="60000-69999" >  <span class="pt_5"> $60,000 to $69,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="70000-79999" >  <span class="pt_5"> $70,000 to $79,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="80000-89999" >  <span class="pt_5"> $80,000 to $89,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="90000-99999" >  <span class="pt_5"> $90,000 to $99,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="100000-124999" >  <span class="pt_5"> $100,000 to $124,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="125000-149999" >  <span class="pt_5"> $125,000 to $149,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="150000-199999" >  <span class="pt_5"> $150,000 to $199,999 </span></li>
         <li class="pall_5"> <input name="annual_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="200000-9999999999" >  <span class="pt_5"> $200,000+ </span></li>
         
         
         </ul>
         </div>
         <div class="Hourly_div" style="display: none;">                          
         <ul class="list">
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="0-999999" >  <span class="pt_5"> All </span></li>
         <!--<li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="Negotiable" >  <span class="pt_5"> Negotiable </span></li>    -->
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="20-24">  <span class="pt_5"> $20 to $24 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="25-29">  <span class="pt_5"> $25 to $29 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="30-34">  <span class="pt_5"> $30 to $34 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="35-39">  <span class="pt_5"> $35 to $39 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="40-44">  <span class="pt_5"> $40 to $44 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="45-49 ">  <span class="pt_5"> $45 to $49 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="50-54">  <span class="pt_5"> $50 to $54 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="55-60">  <span class="pt_5"> $55 to $60 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="60-64">  <span class="pt_5"> $60 to $64 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="65-70">  <span class="pt_5"> $65 to $70 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="70-74">  <span class="pt_5"> $70 to $74 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="75-79">  <span class="pt_5"> $75 to $79 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="80-84">  <span class="pt_5"> $80 to $84 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="85-89">  <span class="pt_5"> $85 to $89 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="90-94">  <span class="pt_5"> $90 to $94 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="95-99">  <span class="pt_5"> $95 to $99 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="100-124">  <span class="pt_5"> $100 to $124 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="125-150">  <span class="pt_5"> $125 to $150 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="150-174">  <span class="pt_5"> $150 to $174 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="175-199">  <span class="pt_5"> $175 to $199 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="200-249">  <span class="pt_5"> $200 to $249 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="250-299">  <span class="pt_5"> $250 to $299 </span></li>
         <li class="pall_5"> <input name="hourly_salary[]"  id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox" value="300-999999">  <span class="pt_5"> $300+ </span></li></ul>
         </div>
         </div>
         </li>
        <li>
         <a href="#" class="f13">Travel Preferences<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5"> <input name="travel_preferences[]" value="0,25,50,50,75,100" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span></li>
         <li class="pall_5"> <input name="travel_preferences[]" value="0" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 0% - No travel </span></li> 
         <li class="pall_5"> <input name="travel_preferences[]" value="25" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 25% </span></li>
         <li class="pall_5"> <input name="travel_preferences[]" value="50" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 50% </span></li>
         <li class="pall_5"> <input name="travel_preferences[]" value="75" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 75% </span></li>
         <li class="pall_5"> <input name="travel_preferences[]" value="100" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 100% </span></li>
         
         </ul>
         </div>
         </li>
        <li>
         <a href="#" class="f13">Willing to Relocate<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5"> <input name="" value="" id="willing_to_relocate_all" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span></li>
         <li class="pall_5"> <input name="willing_to_relocate[]" value="No" id="currentEmploymentNew" class="relocate" type="checkbox">  <span class="pt_5"> No </span></li> 
         <li class="pall_5"> <input name="willing_to_relocate[]" value="Yes" id="currentEmploymentNew" class="relocate" type="checkbox">  <span class="pt_5"> Yes </span></li>
         
         </ul>
         </div>
         </li>
        <li>
         <a href="#" class="f13">Year Experience<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5"> <input name="year_experience[]" value="0-60" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span></li>
         <li class="pall_5"> <input name="year_experience[]" value="0-3" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 0-3 Years </span></li> 
         <li class="pall_5"> <input name="year_experience[]" value="4-7" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 4-7 Years </span></li>
         <li class="pall_5"> <input name="year_experience[]" value="8-10" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> 8-10 Years </span></li>
         <li class="pall_5"> <input name="year_experience[]" value="10-60" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> More than 10 years </span></li>            
         </ul>
         </div>
         </li>
        <li>
         <a href="#" class="f13">Degree<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         <? $sql_iy12 = mysql_query("SELECT id FROM `sedna_education_master`");
         while($row_iy12 = mysql_fetch_array($sql_iy12)){
         
         $ty.= $row_iy12['id'].',';
         
         }
         // // echo $ty;
         $all_degree= rtrim($ty,",");
         ?>          
         <li class="pall_5"> <input name="degree[]" value="<?php echo $all_degree; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_iy = mysql_query("SELECT * FROM `sedna_education_master`");
         while($row_iy = mysql_fetch_array($sql_iy)){
         
         ?>
         
         <li class="pall_5"> <input name="degree[]" value="<? echo $row_iy["id"]; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> <? echo $row_iy["education_type"]; ?></span>           </li>
         
         <? }  ?>   </ul>
         </div>
         </li>
		
		</ul>
		</div>
		
		</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      		</div>
		
		</div>  
