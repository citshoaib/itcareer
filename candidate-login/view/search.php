
         <script>
         
         function add_divs(){
         
         var fdggdh = ' <div class="row pt_10"><label class="label col-md-1 pt_10">&nbsp;</label><div class="input col-md-3"></div><div class="col-md-4 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input name="skill_name[]" class="form-control" type="text"><label for="form_control_1">Skill Name</label></div></div></div><div class="col-md-2 unit"><div class="input"><div class="form-group form-md-line-input form-md-floating-label has-success"><input name="experince[]" class="form-control" type="text"><label for="form_control_1">Years</label></div></div></div><div class="col-md-2 unit"><a class="f20 div_minus"> <i class="fa fa-minus-circle" aria-hidden="true"></i> </a></div></div>';
         $(".div_add").append(fdggdh);
         
         $(".div_minus").click( function() {
         
         
         $(this).parent().parent().remove();
         
         });
         
         }
         
         
         $(document).ready(function(){
         $('.change_div').change(function(){
         if(this.checked){
         $('.Hourly_div').fadeIn('slow');
         $('.Annual_div').fadeOut('slow');
         $('.Hourly_div').parent().parent().css("height","auto");
         }else{
         $('.Annual_div').fadeIn('slow');
         $('.Hourly_div').fadeOut('slow');
         }
         });
         });
         
         
         $(document).ready(function(){
         
         $(".expand_toggle").toggle(
         function(){
         $(".st-accordion ul li").addClass("st-open");
         $(".st-accordion ul li").css("height","auto");
         $(".st-content").css("display","block");
         $('.expand_toggle').text('Collapse All Filters');
         },
         function(){
         $(".st-accordion ul li").removeClass("st-open");
         $(".st-content").css("display","none");
         $('.expand_toggle').text('Expand All Filters');
         });
         
         });
         
         
          
         
         </script>


<!-- select auto state-->

         <script>
         $(function() {
         function split( val ) {
         return val.split( /,\s*/ );
         }
         function extractLast( term ) {
         return split( term ).pop();
         }
         
         $( "#selected_state" ).bind( "keydown", function( event ) {
         // alert("adad");
         if ( event.keyCode === $.ui.keyCode.TAB &&
         $( this ).autocomplete( "instance" ).menu.active ) {
         event.preventDefault();
         }
         })
         .autocomplete({
         minLength: 1,
         source: function( request, response ) {
         // delegate back to autocomplete, but extract the last term
         $.getJSON("view/ajax/read_state.php", { term : extractLast( request.term )},response);
         },
         focus: function() {
         // prevent value inserted on focus
         return false;
         },
         select: function( event, ui ) {
         var terms = split( this.value );
         // remove the current input
         terms.pop();
         // add the selected item
         terms.push( ui.item.value );
         // add placeholder to get the comma-and-space at the end
         terms.push( "" );
         this.value = terms.join( ", " );
         return false;
         }
         });
         });
         </script>
  
         <script>
         $(document).ready(function(){
         $("#checkAll").click(function () {
         
         $('.employment_type').not(this).prop('checked', this.checked);
         });
         });
         </script>

         <script>
         $(document).ready(function(){
         $("#security_clearance_all").click(function () {
         
         $('.security_clearance').not(this).prop('checked', this.checked);
         });
         });
         </script>

         <script>
         $(document).ready(function(){
         $("#willing_to_relocate_all").click(function () {
         
         $('.relocate').not(this).prop('checked', this.checked);
         });
         });
         </script>   
 
 
 
   
   
  
  

<!--?page=employer-->


         <form action="?page=employer&page_no=1" method="post" enctype="multipart/form-data" autocomplete="off">    
         <div class="full-wi">
         
         <div class="container ">
         
         <div class="row ">
         <div class="col-md-9">
         <h3><i>Advanced Consultants Search</i></h3>
         
         </div>
         
         <div class="col-md-3">
         <div class="pt_15">
         <input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Search" type="submit" onclick="get_local();">
         <a href="#"><input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" name="clear" value="Reset" onclick="reset_all();" type="reset"></a></div>
         </div>
        <script>
            
            
            function get_local() {
               var key_word= $("#key_word").val();
           // alert("local"+key_word);
             localStorage.setItem('key_word_local', key_word);
            
            var key_select=$("#keyselect option:selected" ).val();
              localStorage.setItem('key_word_local_key', key_select);
              
              
                var company_set=$("#company_set option:selected" ).val();
              localStorage.setItem('company_set_local_key', company_set);
               var company_name= $("#company_name").val();
           // alert("local"+key_word);
             localStorage.setItem('company_name_local', company_name);
             
             
             var job_title_set=$("#job_title_set option:selected" ).val();
              localStorage.setItem('job_title_set_local_key', job_title_set);
               var job_title= $("#work_feild").val();
           // alert("local"+key_word);
             localStorage.setItem('job_title_local', job_title);
             
              var searchbox = $("#search-box").val();
             localStorage.setItem('searchbox_local', searchbox);
             
              var distance_mi= $("#distance_mi").val();
             localStorage.setItem('distance_mi_local', distance_mi);
              
              
          
            }
            
            $(document).ready(function() {
                
           var job_title_set_local_key= localStorage.getItem('job_title_set_local_key');
           $("#job_title_set option[value='"+job_title_set_local_key+"']").attr("selected", true);
           var job_title_local= localStorage.getItem('job_title_local');
           $('#work_feild').val(job_title_local);
           
           var company_set_local_key= localStorage.getItem('company_set_local_key');
           $("#company_set option[value='"+company_set_local_key+"']").attr("selected", true);
           var company_name_local= localStorage.getItem('company_name_local');
           $('#company_name').val(company_name_local);
           
           
           var key_word_local_key= localStorage.getItem('key_word_local_key');
           $("#keyselect option[value='"+key_word_local_key+"']").attr("selected", true);
          
           
		var key_word_local= localStorage.getItem('key_word_local');
           $('#key_word').val(key_word_local);
		
           
           var searchbox_local= localStorage.getItem('searchbox_local');
           $('#search-box').val(searchbox_local);
           
           var distance_mi_local= localStorage.getItem('distance_mi_local');
           $('#distance_mi').val(distance_mi_local);
		
		 
		});
           </script>
         
         </div>
         </div>
         
         
         </div>
         
         
         
         <div class="container ">
         
         <div class="row ">
         <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
         
         <div class="row">
         
         <div class="col-md-12 ">
         <h3>Keywords </h3>
         Enter a search string.
         
         </div>
         </div>
         
         <div class="row pt_10">  
         <div class=" col-md-4"><select class="form-control mt_5" name="keyword_set" id="keyselect">
         
         <option value="All">All</option>
         
         <option value="Any" >Any</option>
         
         <option value="Boolean">Boolean</option>
         
         </select></div>
         <div class="input col-md-8">
         
         <textarea name="keyword_search" id="key_word" rows="3" cols="5" class="form-control mt_5"></textarea>
         
         </div></div>
         
         <div class="row">
         
         <div class="col-md-12 ">
         <h3>Further Refinement </h3>
         Narrow your search with specific matches in the following fields.
         
         </div>
         </div>
         
         <div class="row pt_10">          <label class="label col-md-1 pt_10">Skill Set:</label>
         <div class="input col-md-3">
         <select class="form-control" name="skill_set" id="skill_set">
         <option value="All">All</option>
         
         <option value="Any" >Any</option>
         
         <option value="Boolean">Boolean</option>
         <option value="Year">Year</option>
         </select>
         </div>
         
         <div class="col-md-4 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="skill_name[]" class="form-control" type="text">
         <label for="form_control_1">Skill Name</label>
         </div>
         </div>
         </div>
         
         <div class="col-md-2 unit year">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="experince[]" class="form-control year" type="text" id="year">
         <label for="form_control_1">Years</label>
         </div>
         </div>
         </div>
         <div class="col-md-2 unit year">
         <a onclick="add_divs();" class="f20">  <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
         
         </div>
         
         
         </div>
         
         <div class="div_add">
         
         
         
         </div>
         
         
         
         
         <div class="row pt_10">          <label class="label col-md-1 pt_10">Company: </label>
         <div class="input col-md-3">
         <select class="form-control" name="company_set">
         <option value="All">All</option>
         
         <option value="Any" >Any</option>
         
         <option value="Boolean">Boolean</option>
         </select>
         </div>
         
         <div class="col-md-8 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="company_name" value="" class="form-control" type="text">
         <label for="form_control_1">Company Name</label>
         </div>
         </div>
         </div>
         
         
         
         
         </div>
         
         <div class="row pt_10">          <label class="label col-md-1 pt_10">Job Title:</label>
         <div class="input col-md-3">
         <select class="form-control" name="job_title_set" id="job_title_set">
         <option value="All">All</option>
         
         <option value="Any" >Any</option>
         
         <option value="Boolean">Boolean</option>
         </select>
         </div>
         
         <div class="col-md-8 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="work_feild" id="work_feild" value="" class="form-control" type="text">
         <label for="form_control_1">QA or test or tester</label>
         </div>
         </div>
         </div>
         
         
         
         
         </div>
         
         
         <div class="row">
         
         <div class="col-md-12 ">
         <h3>Location </h3>
         Single or multiple locations.
         
         </div>
         </div>
         
         <script>
         $(document).ready(function(){
         $(".year").hide();  
         $(function(){
         $("#skill_set").change(function(){
         var tt=  $("#skill_set").val();
         // alert("sfsfsdf" + tt);
         if (tt=="Year") {
         $(".year").show();
         }
         else
         {
         $(".year").hide();       
         }
         });
         });       
         
         });          
         
         
         
         
         $(document).ready(function(){
         $("#example_0").attr("checked",true);       
         $("#state_filed").attr("disabled",true);
         $('#tokenize').tokenize().disable();
         $(function(){
         $("#example_0").change(function(){
         $("#search-box").removeAttr("disabled");
         $("#distance_mi").removeAttr("disabled");
         $('#tokenize').tokenize().disable();
         $("#state_filed").attr("disabled",true);
         // $(".state_filed").attr("disabled",true);
         
         });
         $("#example_1").change(function(){
         $("#example_0").removeAttr("checked");  
         $("#state_filed").removeAttr("disabled");
         $("#search-box").attr("disabled",true);
         $("#distance_mi").attr("disabled",true);
         $('#tokenize').tokenize().enable();
         });
         
         });
         });
         
         
         </script>              
         
         
         <div class="row pt_10">          <div class=" col-md-1 pr_0"><div class="input ">
         <input name="single_multiple" value="single" id="example_0" class="current" type="radio">   
         </div>
         </div>
         
         
         <div class="col-md-3 unit ">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <!--  <input name="work_country" value="" class="form-control" type="text">-->
         <label for="form_control_1">zip, city :</label>
         </div>
         </div>
         </div>
         
         <div class="col-md-4 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="work_country" value="" id="search-box" class="form-control" type="text">
         <div id="suggesstion-box"></div>
         <label for="form_control_1"></label>
         </div>
         </div>
         </div>
         
         
         
         <div class="col-md-2 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <label for="form_control_1">Distance (mi)</label>
         </div>
         </div>
         </div>
         
         <div class="col-md-2 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="distance_mi" value="" id="distance_mi" class="form-control" type="text">
         <label for="form_control_1"></label>
         </div>
         </div>
         </div>
         
         </div>
         
         
         
         <div class="row pt_10">          <div class=" col-md-1"><div class="input ">
         <input name="single_multiple" value="multiple" id="example_1" class="current" type="radio">   
         </div>
         </div>
         
         
         
         
         <div class="col-md-4 unit">
         
         <select class="form-control " id="state_filed" name="state_select">
         <option value="Current State">Current State</option>
         
         <option value="Prefered State">Prefered State</option>
         </select>
         </div>
         
         <div class="input col-md-7">
         <!--
         <textarea name="selected_state" id="selected_state" rows="3" cols="5" class="form-control"></textarea>
         -->
         <script type="text/javascript">
         $(document).ready(function(){
         //alert('aaa');
         $('#tokenize').tokenize();
         
         });
         
         </script>
         
         <select id="tokenize" name="state[]" multiple="multiple" class="tokenize-sample state_filed" >
         <?php
         $select_state=mysql_query("select * from state_master");
         while($fetch_state=mysql_fetch_array($select_state))
         {
         ?>
         
         <option value="<?php echo $fetch_state['StateID']; ?>"><?php echo $fetch_state['state_name']; ?></option>
         
         <?php
         }
         ?>
         
         </select>     
         
         
         
         </div>     
         
         
         
         </div>
         
         
         
         
         
         
         
         <div class="row">
         
         <div class="col-md-12 ">
         <h3>Last Active </h3>
         The last time the candidate was active on Sedna.
         
         </div>
         </div>
         
         
         <div class="row pt_10">                                   
         
         <div class="col-md-3 unit">
         
         <div class="input">
         <div class="form-group form-md-line-input form-md-floating-label has-success">
         <input name="last_active_days" value="" class="form-control" type="text">
         <label for="form_control_1">Days:</label>
         </div>
         </div>
         </div>
         
         
         <div class="cl"></div>
         <!--<div class="col-md-4 unit pt_10">
         
         <div class="input">
         <input name="likely_to_switch"  value="yes" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> Likely to Switch ? </span>
         </div>
         </div>-->
         
         
         </div>
         
         
         <!--<div class="row">
         
         <div class="col-md-12 ">
         <h3>Profile Source</h3>
         Choose between Open Web, Resumes, or both sets of profile.
         
         </div>
         </div>-->
         
         
         <!-- <div class="row">
         
         <div class="col-md-12 ">
         <ul>
         <li class="pall_5"> <input name="resumes_web_probile[]" value="resumes" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> Resumes </span>           </li>
         
         <li class="pall_5"> <input name="resumes_web_probile[]" value="open web Profile" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> Open Web Profile </span>           </li>
         
         <li class="pall_5"> <input name="resumes_web_probile[]" value="both" id="currentEmploymentNew" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> Both </span>           </li>
         </ul>
         
         </div></div>-->
         
         
         <div class="row">
         
         <div class="col-md-12 ">
         <h3>Filters <span class="fr f15 skdjdk"><a class="expand_toggle" >Expand All Filters</a></span></h3> 
         <hr />
         
         </div>
         
         
         </div>
         
         <div class="row">
         <div class="col-md-12">
         <div id="st-accordion" class="st-accordion">
         <ul >
         
         <li>
         <a href="#">Employment Type<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         <?/* $sql_employment_type = mysql_query("SELECT id FROM `sebna_employment_type`");
         while($row_employment_type = mysql_fetch_array($sql_employment_type)){
         
         $ty_employment_type.= $row_employment_type['id'].',';
         
         }
         // // echo $ty;
         $all_employment_type= rtrim($ty_employment_type,",");*/
         ?>
         
         
         
         
         <li class="pall_5"> <input name="" value="" id="checkAll" class="ng-pristine ng-valid current employment_type" type="checkbox">  <span class="pt_5"> All </span>           </li>
         
         <? $sql_m = mysql_query("SELECT * FROM `sebna_employment_type`");
         while($row_m = mysql_fetch_array($sql_m)){
         
         ?>
         
         <li class="pall_5"> <input name="employment_type[]" value="<? echo $row_m["id"]; ?>" id="" class="ng-pristine ng-valid current employment_type" type="checkbox">  <span class="pt_5"> <? echo $row_m["employment_type"]; ?></span>           </li>
         
         <? }  ?>
         
         </ul>
         </div>
         </li>
         
         <!-- -------------------------------------------------------->        
         
         <li>
         <a href="#">Work Authorization<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
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
         
         <!-- -------------------------------------------------------->
         <li>
         <a href="#">Compensation<span class="st-arrow">Open or Close</span></a>
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
         
         
         <!-- -------------------------------------------------------->        
         
         <li>
         <a href="#">Travel Preferences<span class="st-arrow">Open or Close</span></a>
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
         
         <!-- -------------------------------------------------------->  
         
         
         <li>
         <a href="#">Willing to Relocate<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5"> <input name="" value="" id="willing_to_relocate_all" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span></li>
         <li class="pall_5"> <input name="willing_to_relocate[]" value="No" id="currentEmploymentNew" class="relocate" type="checkbox">  <span class="pt_5"> No </span></li> 
         <li class="pall_5"> <input name="willing_to_relocate[]" value="Yes" id="currentEmploymentNew" class="relocate" type="checkbox">  <span class="pt_5"> Yes </span></li>
         
         </ul>
         </div>
         </li>
         
         <!-- -------------------------------------------------------->  
         
         
         <li>
         <a href="#">Year Experience<span class="st-arrow">Open or Close</span></a>
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
         
         <!-- -------------------------------------------------------->  
         
         
         <li>
         <a href="#">Degree<span class="st-arrow">Open or Close</span></a>
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
         
         <!-- -------------------------------------------------------->  
         
         
         <li>
         <a href="#">Security Clearance<span class="st-arrow">Open or Close</span></a>
         <div class="st-content">
         <ul class="list">
         
         <li class="pall_5"> <input name="" id="security_clearance_all" class="ng-pristine ng-valid current" type="checkbox">  <span class="pt_5"> All </span></li>
         <li class="pall_5"> <input name="security_clearance[]" value="No" id="currentEmploymentNew" class="security_clearance" type="checkbox">  <span class="pt_5"> No </span></li> 
         <li class="pall_5"> <input name="security_clearance[]" value="Yes" id="currentEmploymentNew" class="security_clearance" type="checkbox">  <span class="pt_5"> Yes </span></li>
         
         </ul>
         </div>
         </li>
         
         <!-- -------------------------------------------------------->   
         
         </ul>
         </div>
         
         </div>
         
         </div>
         
         
         
         
         
         <div class="row ">
         
         <div class="col-md-12 pb_10"> 
         <div class="pt_15">
         <input class="btn btn-default-1 btn-custom btn-rounded waves-effect waves-light" name="search" value="Search" type="submit" onclick="get_local();">
         <a href="#"><input class="btn btn-white-1 btn-custom btn-rounded waves-effect waves-light" name="clear" value="Reset" type="reset"></a></div>
         </div>
         
         </div>
         
         
         
         
         </div>
         
         
         </div></div></form>
         
         
         
         <!--select city  auto --> 
         
         
         
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
   
   