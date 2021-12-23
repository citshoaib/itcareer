	<script src="view/mark/test_mark.js"></script>
    <style>
  /**
 * Highlight any element inside the context
 * because it can be freely defined
 */
.context :not(div,p,span) {
  /*background: #f1c40f;*/
  color: green;
  padding: 0;
}

mark, .mark {
    background-color: #f3f148;
    padding: 0.2em;
}


</style>
    <script>
   $(function() {

  var mark = function() {

    // Read the keyword
    var keyword = $("input[name='keyword_search']").val();
		
		keyword = keyword.replace('AND', '');
		keyword = keyword.replace('and', '');
		keyword = keyword.replace('or', '');
		keyword = keyword.replace('OR', '');
   
    // Determine selected options
    var options = {
      "each": function(element) {
        setTimeout(function() {
          $(element).addClass("animate");
        }, 250);
      }
    };
   

    // Mark the keyword inside the context
    $(".context").unmark();
    $(".context").mark(keyword, options);
  };

  $("input[name='keyword_search']").on("keyup", mark);
  
  mark();

});
</script>
         <?php
 require "../FULLTEXT-search/php-queryclasses/BooleanToSQL.php";      
		//echo "<pre>";
		
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);



		if(isset($_POST['search']))
		{
		//echo "<pre>";print_r($_POST);
		//die;
		
		$where_condition="";	
		
		//echo "<pre>";print_r($_POST);
		 $keyword_set=$conn->real_escape_string($_POST["keyword_set"]);
		 $keyword_string=$conn->real_escape_string($_POST["keyword_search"]);
		$_SESSION['string_key_word']=stripslashes($keyword_string);
        $_SESSION['string_key']=$keyword_set;
        
        
        $search_string_full.=$keyword_string;
		
		
		$company_set=$conn->real_escape_string($_POST["company_set"]);
		$company_name=$conn->real_escape_string($_POST["company_name"]);
		
		$job_title_set=$conn->real_escape_string($_POST["job_title_set"]);
		$work_feild=$conn->real_escape_string($_POST["work_feild"]);
		
		$skill_set=$conn->real_escape_string($_POST["skill_set"]);
		$skill_name=$_POST["skill_name"];
		$experince=$_POST["experince"];
		
		$work_country=$conn->real_escape_string($_POST['work_country']);
        $search_string_full.= $work_country;
        
		$selected_state=$conn->real_escape_string($_POST['state']);
		$last_active_days=$conn->real_escape_string($_POST['last_active_days']);
		$employment_type=$_POST['employment_type'];
		$work_authorization=$_POST['work_authorization'];
		$travel_preferences=$conn->real_escape_string($_POST['travel_preferences']);
		$willing_to_relocate=$_POST['willing_to_relocate'];
		$year_experience=$conn->real_escape_string($_POST['year_experience']);
		$degree=$conn->real_escape_string($_POST['degree']);
		$security_clearance=$conn->real_escape_string($_POST['security_clearance']);
		$hourly_salary=$conn->real_escape_string($_POST['hourly_salary']);
		$annual_salary=$_POST['annual_salary'];
		
		$experince=$_POST['experince'];
		$distance_mi=$conn->real_escape_string($_POST['distance_mi']);
		
        
        
		
		if($keyword_string!=""){
         
	$keyword_search=search_candidate($keyword_set,'b.resume_data',$keyword_string);
       
        if($keyword_set=='Any')
		{
		$where_condition.=$keyword_search." AND ";
		
		}
		else
		{
			$where_condition.=$keyword_search." AND ";
			
		}
        
		}
		if($company_name!=""){
		$company_name_search=search_candidate($company_set,'comapnay',$company_name);
		$where_condition.=$company_name_search." AND ";
		}
		if($work_feild!=""){
		$work_feild_search=search_candidate($job_title_set,'position',$work_feild);
		$where_condition.=$work_feild_search." AND ";
		}
        
        if(is_array($skill_name))
			 {
        $skill_name= array_filter($skill_name);
        //print_r($skill_name);
			 }
		if(!empty($skill_name))
		{
            
            
		$where_skills=search_candidate_skillwise($skill_set,$skill_name,$experince);
		$where_condition.=$where_skills." AND ";
		}
		
        
        
        
        
//		if($work_country!='' && $distance_mi!='')
//		{
//          // echo "both". $work_country."-->".$distance_mi ;
//         if (is_numeric($work_country))  
//		{  
//         $work_country_mile_search=   search_distance_mi($work_country,$distance_mi);
//        $where_condition.=$work_country_mile_search;
//        }
//        
//        }
        
        
		//zip code search
		
	
		
		
		
		
		
		
		
		if($work_country!='' && $distance_mi!='')
		{
          
		if (is_numeric($work_country))  
		{  
		//$work_country_Postal_code= $work_country;
		//$work_country_where ="( b.postal_code Like '%".$work_country_Postal_code."%' )";
		 //echo "number". $work_country."-->".$distance_mi ;
		 
		   $work_country_mile_search=   search_new_distance_mi($work_country,$distance_mi);
          $where_condition.=$work_country_mile_search;
		}
		else
		{
		 
		  //echo "string". $work_country."-->".$distance_mi; 
	  
		$select_city_zip=$conn->query("select min(zip_code) as zip_code from zip_code where city like '%". $work_country . "%' ");
		$fetch_city_zip=$select_city_zip->fetch_array();
		   $city_zip=trim($fetch_city_zip['zip_code']);
		
		
		 $work_country_mile_search=   search_new_distance_mi($city_zip,$distance_mi);
          $where_condition.=$work_country_mile_search;
		}
		
		}
		
		
		//close zip code search
		
		
		
		
		
		
		
        
		
		
		if($work_country!='' && $distance_mi=='')
		{
            
		if (is_numeric($work_country))  
		{  
		$work_country_Postal_code= $work_country;
		$work_country_where ="( b.postal_code =$work_country_Postal_code)";
		}
		else
		{
		$work_country_city	=$work_country;
		$work_country_where ="( b.city Like '%".$work_country."%' )";
		
		}
		$where_condition.=$work_country_where." AND ";
		}
		
		
		if(!empty($selected_state))
		{
		
		$selected_state_where="";
		foreach($selected_state as $state_value)
		{
		if($selected_state_where=="")
		{
		
		$selected_state_where.="(b.state=$state_value";	
		
		}
		else
		{
		$selected_state_where.=" || b.state=$state_value";	
		}
		
		}
		$where_condition.=$selected_state_where.") AND ";
		
		
		}
		

		
		if(!empty($employment_type))
		{
		$qu_employment_where='';
		foreach($employment_type as $val)
		{
		if($qu_employment_where!='')
		{
		$qu_employment_where.=" || b.employment_type Like '%".$val."%'";
		}
		else
		{
		$qu_employment_where.="(b.employment_type Like '%".$val."%' ";									
		}
		}			
		$where_condition.=$_SESSION['where_condition'].$qu_employment_where.") AND ";
		}
		
		
		
		if(!empty($work_authorization))
		{
		
		$work_authorization_wt=implode(",",$work_authorization);
		
		$work_authorization_wt_where ="b.work_authorization in ($work_authorization_wt)";
		$where_condition.=$_SESSION['where_condition'].$work_authorization_wt_where." AND ";
		
		}
		
		
         
        
        
		
		if(!empty($annual_salary))
		{
		$salary_qu_where="";
		foreach($annual_salary as $val)
		{
		$val_array=explode("-",$val);
		$more_than=$val_array[0];
		$less_than=$val_array[1];
		if($more_than!='')
		{
		if($salary_qu_where!='')
		{
		
		$salary_qu_where.=" || b.salary >=$more_than &&  b.salary <= $less_than";
		
		}
		else
		{
		$salary_qu_where.="(b.salary >=$more_than &&  b.salary <= $less_than";									
		}
		}			
		}
		$where_condition.=$_SESSION['where_condition'].$salary_qu_where.") AND ";
		}
		
		
		
		
		if(!empty($hourly_salary))
		{
		
		$salary_qu_hourly_where='';			
		foreach($hourly_salary as $val1)
		{
		
		$val_array1=explode("-",$val1);
		$more_than1=$val_array1[0];
		$less_than1=$val_array1[1];
		if($more_than1!='')
		{
		if($salary_qu_hourly_where!='')
		{
		
		$salary_qu_hourly_where.="|| b.hourly_rate >=$more_than1 &&  b.hourly_rate <=$less_than1";
		
		}
		else
		{
		$salary_qu_hourly_where.="(b.hourly_rate >=$more_than1 &&  b.hourly_rate <=$less_than1";									
		
		}
		}			
		}
		$where_condition.=$_SESSION['where_condition'].$salary_qu_hourly_where.")AND ";
		
		
		}
		
		
		
		if(!empty($travel_preferences))
		{
		$travel_preferences_tp=implode(",",$travel_preferences);
		
		$travel_preferences_tp_where ="b.travel in ($travel_preferences_tp) ";
		
		$where_condition.=$_SESSION['where_condition'].$travel_preferences_tp_where." AND ";
		
		}
		
		
	
		
		
		if(!empty($willing_to_relocate))
		{
		//print_r($willing_to_relocate);
		$willing_to_relocate_where="";
		foreach( $willing_to_relocate as $value_willing_to_relocate )
		{
		
		if($willing_to_relocate_where!='')
		{
		
		$willing_to_relocate_where.="|| b.relocate LIKE '%".$value_willing_to_relocate."%'";
		
		}
		else
		{
		$willing_to_relocate_where.="(b.relocate LIKE '%".$value_willing_to_relocate."%'";									
		
		}
		
		
		}
		 	$where_condition.=$_SESSION['where_condition'].$willing_to_relocate_where.") AND ";		
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		if(!empty($degree))
		{
		$degree_tp=implode(",",$degree);
		
		$degree_tp_where ="c.education IN ($degree_tp)";
		
		$where_condition.=$_SESSION['where_condition'].$degree_tp_where." AND ";
		
		}
        
         
        
        
		
		if(!empty($security_clearance))
		{
		//print_r($security_clearance_where);
		$security_clearance_where="";
		foreach( $security_clearance as $value_security_clearance )
		{
		
		if($security_clearance_where!='')
		{
		
		$security_clearance_where.="|| b.security LIKE '%".$value_security_clearance."%'";
		
		}
		else
		{
		$security_clearance_where.="(b.security LIKE '%".$value_security_clearance."%'";									
		
		}
		
		
		}
		 	$where_condition.=$_SESSION['where_condition'].$security_clearance_where.") AND ";		
		
		}
		
     
        
		
		if(!empty($year_experience))
		{
		///print_r($hourly_salary);			
		
		$year_experience_qus='';			
		foreach($year_experience as $val1)
		{
		
		$val_array1=explode("-",$val1);
		$more_than1=$val_array1[0];
		$less_than1=$val_array1[1];
		if($more_than1!='')
		{
		if($year_experience_qus!='')
		{
		
		$year_experience_qus.=" || b.experience >=$more_than1 &&  b.experience <=$less_than1";
		
		}
		else
		{
		$year_experience_qus.="(b.experience >=$more_than1 &&  b.experience <=$less_than1";									
		
		}
		}			
		}
		
		$where_condition.=$_SESSION['where_condition'].$year_experience_qus.")AND ";	
		
		
		}
        
        unset($_SESSION["query"]);
        unset($_SESSION['pagination_sql']);
				unset($_SESSION['where_condition']);
		
       }
       
        
            
            
        
         
       
       
       
       
		      $rows='20';
				  if(isset($_GET['page_no'])){
				   $page_no=$_GET['page_no'];
				  }else{
				  $page_no=1;	
				  }
				  $first_page=$rows*($page_no-1);
		
		 $limit ="limit $first_page,$rows ";
					
					$i = $limit*($page-1)+1;
                   
		
    
		
         if(isset($_SESSION['query']) and $_SESSION['query']!="")
        {
            
        $query=$_SESSION['query'].$limit;
        
      $pagination_sql=  $_SESSION['pagination_sql'];
        
        $query12=$conn->query($pagination_sql);
     $total_rows=$query12->num_rows;
		
		$result=$conn->query($query);
        
        }else{
            
            
 $query123="SELECT a.date,a.id,a.email,b.reg_id,b.first_name,b.middel_name,b.phone_no,b.state,b.city,b.postal_code,b.employment_type,b.work_authorization,b.comment,b.relocate,b.security,b.searchable,b.last_name,b.salary,b.hourly_rate,b.experience,b.position,
     b.resume_data
		 FROM sedna_operator_request_consultants_reg a
		LEFT JOIN sebna_profile_tbl b ON a.id = b.reg_id
		
		WHERE $where_condition a.status='1' and b.searchable='yes'";				
		
       
             $_SESSION['query']=$query123;
						 
						$_SESSION['where_condition']=$where_condition;
        
       
        $query=$query123.$limit;  
        
       
        
        
      $pagination_sql = "SELECT * FROM sedna_operator_request_consultants_reg a
		  LEFT JOIN sebna_profile_tbl b ON a.id = b.reg_id
			WHERE $where_condition  a.status='1' and b.searchable='yes' ";
        
        $_SESSION['pagination_sql']=$pagination_sql;
					    
        
	$query12=$conn->query($pagination_sql);
     $total_rows=$query12->num_rows;
		
		$result=$conn->query($query);
		//$num_rows = $result_p->num_rows;
     
            
            
        }
        
        
        
		?>
        
        <div class="full-wi">
		<div class="container ">
            
		
        <form method="post" id="" action="?page=employer&page_no=1" >
		<div class="row ">
		<div class="col-md-1">
		<div class="input">
		<div class="form-group form-md-line-input form-md-floating-label has-success">
		<!--<input type="text" name="range_val" class="form-control">
		<label for="form_control_1">Country</label>-->
		<select name="keyword_set"  class="form-control">
        <option value="All" <?php if($_SESSION['string_key']=='All'){ echo "selected";} ?>>All</option>
         
         <option value="Any" <?php if($_SESSION['string_key']=='Any'){ echo "selected";} ?>>Any</option>
         
         <option value="Boolean" <?php if($_SESSION['string_key']=='Boolean'){ echo "selected";} ?>>Boolean</option>
         
         </select>
		
		</div>
		
		</div>
		
		</div>
        <div class="col-md-5 unit">
			<div class="input">
		<div class="form-group form-md-line-input form-md-floating-label has-success">
		<input name="keyword_search" id="keyword" value="<?php if($_SESSION['string_key_word']!=''){ echo stripslashes(htmlentities($_SESSION['string_key_word'])); } ?>"   class="form-control <?php if($_SESSION['string_key_word']!=''){ echo "edited"; } ?>" type="text">
		<label for="form_control_1">Keyword Search</label>
		</div>
		</div>
		</div>
        <div class="col-md-3 unit">
		
		<div class="input">
		<div class="form-group form-md-line-input form-md-floating-label has-success">
             <input name="work_country" value="<?php if($work_country!=''){ echo $work_country; }  ?>" id="search-box" class="form-control <?php if($work_country!=''){ echo "edited"; }  ?>" type="text">
         <div id="suggesstion-box"></div>
		<!--<input name="skill_name[]" value="" class="form-control" type="text">-->
		<label for="form_control_1">zip, city</label>
		</div>
		</div>
		</div>
		
		
		<div class="col-md-3 pt_5">
		<input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Apply & Search Candidates" type="submit">
		<br />
		<span class="pt_5"><a href="?page=search">Advanced Search</a></span>
		
		</div>
		
		
		</div>
        </form>
		
		<!--<div class="row ">-->
		<!--<div class="col-md-12">-->
		<!--<ul class="list-btn">-->
		<!--<li>tester-->
		<!--<a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> -->
		<!--</li>-->
		<!--<li> Quality: 0 years  <a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> </li>-->
		<!---->
		<!--<li> Coventry <a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> </li>-->
		<!---->
		<!--<li> health <a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> </li>-->
		<!---->
		<!--<li> QA or test or tester <a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> </li>-->
		<!---->
		<!--<li> Email <a href="#" class="icon"> <i class="fa fa-times" aria-hidden="true"></i></a> </li>-->
		<!--</ul>-->
		<!---->
		<!--</div></div>-->
		</div>
		
		
		</div>
		
		<form method="post" id="configform" action="?page=employer&page_no=1">
        
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
         
         <? $sql_m = $conn->query("SELECT * FROM `sebna_employment_type`");
         while($row_m = $sql_m->fetch_array()){
         
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
         
         <? $sql_iy123 = $conn->query("SELECT id FROM `sebna_work_authorization`");
         while($row_iy123 = $sql_iy123->fetch_array()){
         
         $ty12.= $row_iy123['id'].',';
         
         }
         // // echo $ty;
         $all_work_authorization= rtrim($ty12,",");
         ?>      
         
         
         
         <li class="pall_5"> <input name="work_authorization[]" value="<?php echo $all_work_authorization; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_w = $conn->query("SELECT * FROM `sebna_work_authorization`");
         while($row_w = $sql_w->fetch_array()){
         
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
        <!--<li>
         <a href="#" class="f13">Degree<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         <? $sql_iy12 = $conn->query("SELECT id FROM `sedna_education_master`");
         while($row_iy12 = $sql_iy12->fetch_array()){
         
         $ty.= $row_iy12['id'].',';
         
         }
         // // echo $ty;
         $all_degree= rtrim($ty,",");
         ?>          
         <li class="pall_5"> <input name="degree[]" value="<?php echo $all_degree; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_iy = $conn->query("SELECT * FROM `sedna_education_master`");
         while($row_iy = $sql_iy->fetch_array()){
         
         ?>
         
         <li class="pall_5"> <input name="degree[]" value="<? echo $row_iy["id"]; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> <? echo $row_iy["education_type"]; ?></span>           </li>
         
         <? }  ?>   </ul>
         </div>
         </li>-->
		
		</ul>
		</div>
		
		</div>
        </form>
		
		<div class="col-md-9">
		<h3 class="block-head"> <?php echo stripslashes($search_string_full); ?> <!--tester Quality: 0 years Coventry health QA...--> <!--<span class="fr"><a href="#"><input class="clear" name="clear" value="Save Search" type="button"></a></span>-->
		</h3>
		<strong><?php  echo $total_rows; ?> Candidates</strong>
		
		<div class="line mt_5 mb_5"></div>
		
		
		<!--<div class="col-md-3 pl_0 pt_15 pb_5">-->
		<!--<i class="fa fa-download" aria-hidden="true"></i>  <a href="#">Save to Position</a>-->
		<!--</div>-->
		
		<div class="col-md-9 pt_5 pb_5">
		<div class="fr">
		<ul class="list-in">
		<li> <a onclick="hide_all();"><i class="fa fa-minus-circle" aria-hidden="true" ></i> Hide Skills </a></li>
		<li><div class="input">
		<!--<div class="form-group form-md-line-input form-md-floating-label has-success">-->
		<!---->
		<!--<select class="" name="country" id="country">-->
		<!--<option disabled="" value="none">Country...</option>-->
		<!--<option value="AD">Andorra</option>-->
		<!--<option value="AE">United Arab Emirates</option>-->
		<!---->
		<!--</select>-->
		<!---->
		<!--</div>-->
        
		
		</div> </li>
		<li> <a id="list_btn"><i class="fa fa-list" aria-hidden="true"></i> List </a></li>
		<li> <a id="grid_btn"><i class="fa fa-th-large" aria-hidden="true"></i> Grid </a></li>
		
		
		</ul>
		
		</div>
		
		
		
		
		</div>
		
		
        <script>
		$(document).ready(function() {	
		grid_list_view= localStorage.getItem('grid_list_view');
        // alert(grid_list_view);
		 if (grid_list_view == 'list_view') {
           $(".grid_div").addClass('list_view');
		   $(".grid_div").removeClass("col-md-6").addClass('col-md-12'); 
         
		 }
		 if (grid_list_view == 'grid_view') {
            $(".grid_div").addClass('grid_view');
			 $(".grid_div").removeClass("col-md-12").addClass('col-md-6'); 
         }
		 
		});
		 
		 
		 
		 
		 
        $('#list_btn').on('click',function(e) {
		
        
        $(".grid_div").removeClass("col-md-6").addClass('col-md-12');  
		 $(".grid_div").removeClass("grid_view").addClass('list_view');  
		
        localStorage.setItem('grid_list_view', 'list_view');

        });
        
        $('#grid_btn').on('click',function(e) {
        
        $(".grid_div").removeClass("col-md-12").addClass('col-md-6'); 
		 $(".grid_div").removeClass("list_view").addClass('grid_view');          
          
		 localStorage.setItem('grid_list_view', 'grid_view');

        
        });
        
        </script>
        	<div class="cl"></div> 
		
		<div class="line mt_5 mb_5"></div>
        
		
	
		<div class="cl"></div> 
		
        
		<!--      profile        -->
		<?php
        if($result->num_rows>0)
        {
			
		while($fetch_result=$result->fetch_assoc())
		{
            //echo "<pre>";
            //print_r($fetch_result);
            
         $reg_id=$fetch_result["id"];	
		 $first_name=$fetch_result["first_name"];
		$middel_name=$fetch_result["middel_name"];
		$last_name=$fetch_result["last_name"];
		
		$full_name=ucfirst($first_name).' '.ucfirst($middel_name).' '.ucfirst($last_name);
		$email=$fetch_result["email"];
		$comapnay=$fetch_result["comapnay"];
		$position=$fetch_result["position"];
		// $reg_id=$fetch_result["reg_id"];
		$city=$fetch_result["city"];
		$experience=$fetch_result["experience"];
		$salary=$fetch_result["salary"];
        $hourly_rate=$fetch_result["hourly_rate"];
		?>
		
        
        
        
        
        
		<div class="col-md-12 fl grid_div " >
		<div class="profile-box mt_15  pt_10 context ">
		<div class="col-md-2 grid_profile">
		<div class="profile-active">
		<div class="profile-icon">
		<i class="fa fa-user"></i>
		
		</div>
		
		</div>
		
		<div class="profile-btn">
		<a href="#"> 
		
		<i class="fa fa-angle-double-right" aria-hidden="true"></i>
		</a>
		
		</div>
		
		
		
		</div>
		
		
		
		<div class="col-md-10 grid_name">
		
		<div class="col-md-9">
		<span class="f20"><a href="?page=profile&id=<?php echo $reg_id; ?>" target="_blank" ><b><?php echo $full_name; ?></b></a></span>
		<br>
		Email: <?php echo $email;  ?>
        <br />
		Company: <?php echo $comapnay; ?>
		<br />
		Desired: <?php echo ucfirst($position); ?>
		<br />
		
		</div>
		
		<div class="col-md-3">
            

            
		<div class="fr">
    
     
    
        <span >
		<?php echo date("d M Y",$fetch_result["date"]);?>
		</span>
        
        
        </div>
        <div class="cl"></div>
        <div class="fr">
		
        <span class="fr text-right">
            <?php
          
          if($experience!=''){ echo $experience ." Years Exp."; }
              echo "<br>";
        if($salary!=''){ echo "$ ".$salary ."/yr."; }
         if($hourly_rate!=''){ echo " | $ ".$hourly_rate ."/hr."; }      
          
            ?>
		</span>
        
        <br />
        <span class="fr">
        <a href="?page=profile&id=<?php echo $reg_id; ?>" class="f14"><i class="fa fa-eye"></i></a>
        <a href="?page=search_schedule&candidate_id=<?php echo $reg_id; ?>" class="f14"><i class="fa fa-users"></i></a>
            <a href="?page=comment&id=<?php echo $reg_id; ?>" target="_top">
       <i class="fa fa-comment-o" aria-hidden="true"></i></a>
       
         
          <a href="mailto:<?php echo $email; ?>" target="_top">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>  </a> 
            
      
       
       </span>
        </div>
        
		
		</div>  
		
		<div class="cl"></div>
        <br>
        <div class="skill <?php echo $reg_id; ?>">
		<?php
        
        $select_skill=$conn->query("select * from sedna_skills where reg_id=$reg_id");
        while($fetch_skill=$select_skill->fetch_array())
        {
           $skill_name=$fetch_skill['skill_name'];
           $year_exp=$fetch_skill['year_exp'];
           $last_used=$fetch_skill['last_used'];
        ?>
        
        
		<div class="col-md-6 mt_10">
		<?php echo $skill_name; ?> <!--QA -->---------------------<span class="gre-box"><?php echo $year_exp; if($year_exp!=''){ echo " Yrs";}  ?> | <?php echo $last_used; ?> <!--5 yrs | 2015--></span>

		</div>
        <?php
        }
        ?>
        </div>
       
        <div class="cl"></div> 
        <div class="col-md-12 mt_15">
		<a  class=".hide_skills" onclick="hide_one(<?php echo $reg_id; ?>);" > Hide Skills</a>
        </div>
        
     
        
		</div>
		
		<div class="cl"></div> 
		</div>
		
		
		<div class="share-icon mb_10">
		<ul>
		<li><a href="mailto:<?php echo $email; ?>"  class="active" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		</ul>
		</div>
		</div>
       
		<?php
		
		}
        }
        else
        {
           echo "<h3>"."No Record Found....." . "</h3>"."<br><br><br><br><br><br>";  
            
        }
        
       
		?>
		
		
		<!--      profile        -->
		
		<div class="cl"></div> 
		
        
        <div class="pagination">
                                <?php
	$per_page_block = 10;
	if(isset($_GET['page_no'])){
		$get_current_page = $_GET['page_no'];
		if($get_current_page <4){
			$start_loop = 1;
			$end_loop = 10;
		}
		else
		{
			$start_loop = $get_current_page-4;
			$end_loop = $get_current_page+5;
		}
		
		
	}
	
	//	$query=$conn->query("select * from customer");

	$total_page=ceil($total_rows/$rows);
//	echo $start_loop."--".$end_loop;
	if($end_loop>$total_page){
		$end_loop = $total_page;
	}
	
	
	$previous = $get_current_page-1;
	?>
	<ul>
	<?
	if($previous > 1)
	{
		echo "<li><a href='?page=employer&page_no=".$previous."'>Previous</a></li>";
	}
	if($start_loop>1){
		echo "<li><a href='?page=employer&page_no=1'>1 </a></li>";
		echo "<li><a href='#'>...</a>";
	}
	for($i=$start_loop;$i<=$end_loop;$i++){
		$class_active = "";
        if($i == $get_current_page ){
            
         $class_active = "class = 'active_page test_click'";   
            
        }
		else
		{
			$class_active="class='test_click'";
		}
		
        echo "<li ". $class_active."><a href='?page=employer&page_no=".$i."'>".$i."  "."</a></li>";	
	}
	$remain_pages = $total_page- $end_loop;
	if($remain_pages>1){
		echo "<li><a href='#'>...</a></li>";
	}
	if($remain_pages>0){
		echo "<li><a href='?page=employer&page_no=$total_page'>".$total_page."</a></li>";
	}

	$next_page = $_GET['page_no']+1;
	if($next_page <= $total_page){ 
		echo "<li><a href='?page=employer&page_no=".$next_page."'>Next</a></li>";	
	}
	
	?>
  
  
                       </div>
        
		</div>
        
        
        
        
        
		
        
        
        
        
    
        
		
		</div></div>
		<!--<script type="text/javascript">
			$(".test_click").click(function() {
				
				 alert($(this).attr("href"));
			//var a=	$(".grid_div").attr("class");
			//var b =a.split(" ");
			//
			//
			//	alert(b[3]);
				});
			
			
		</script>-->
		
		
        <script type="text/javascript">
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
        <!--hide all skill script-->
        <script>
        function hide_all() {
        
        $('.skill').toggle();
        
        
        }
        </script>
        <!--  hide one skill      -->
        <script>
        function hide_one(hide_value) {
        
        $('.' + hide_value).toggle();  
        }
        
        </script>
        