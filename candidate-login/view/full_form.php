<?php
@session_start();
 $current_date =strtotime(date("d-m-Y"));
$reg_id= $_SESSION['candidate_id'];
  $select=mysql_query("select * from candidate_registration where id='$reg_id'");
$fetch=mysql_fetch_array($select);
 
 $email=$fetch['email'];
 $cv_name=$fetch['cv'];
 
 
 $select1=mysql_query("select * from candidate_registration where id='$reg_id'");
 $fetch2=mysql_fetch_array($select1);
  $first_name=$fetch2['first_name'];
  $middel_name=$fetch2['middel_name'];
 $last_name=$fetch2['last_name'];
 $city=$fetch2['city'];
  $country1=$fetch2['country'];
  $state=$fetch2['state'];
  //$employment_type1=$fetch2['employment_type'];
   $employment_type=explode(",",$fetch2['employment_type']);
  $work_authorization1=$fetch2['work_authorization'];
  $phone=$fetch2['phone_no'];
  $postal_code=$fetch2['postal_code'];
  $position=$fetch2['position'];
  $salary=$fetch2['salary'];
  $hourly_rate=$fetch2['hourly_rate'];
  $experience=$fetch2['experience'];
  $travel=$fetch2['travel'];
  $searchable=$fetch2['searchable'];
    $relocate=$fetch2['relocate'];
	 $security=$fetch2['security'];
     $preferred_location=$fetch2['preferred_location'];
   $employer_name=$fetch2['employer_name'];
    $employer_company=$fetch2['employer_company'];
     $employer_email=$fetch2['employer_email'];
      $employer_number=$fetch2['employer_number'];
?>

<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
function education(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;
//var recRow = '<tr class="experience_row'+rowCount+'"><td>Job Title</td><td style="text-align: left;"><input type="text" class="form-control" name="job_title[]" value=""  placeholder="Job Title"></td></tr><tr class="experience_row'+rowCount+'"><td>Comapnay</td><td style="text-align: left;"><input type="text" class="form-control" name="comapnay[]" value=""  placeholder="Comapnay"></td></tr><tr class="experience_row'+rowCount+'"><td>Start Date</td><td style="text-align: left;"><input type="text" class="form-control" name="start_date[]" value=""  placeholder="Start Date"></td></tr><tr class="experience_row'+rowCount+'"><td>End Date</td><td style="text-align: left;"><input type="text" class="form-control" name="end_date[]" value=""  placeholder="End Date"><br><input type="checkbox" name="current[]" value="" > Current Date &nbsp;<a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a> </td></tr>';
var recRow = '<div class="row education'+rowCount+'" >'+jQuery('.education').html()+'<div class="col-md-2 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRow('+rowCount+');"><i class="fa fa-minus-circle"></i>  Remove</a></div></div>';

jQuery('.education_test').before(recRow);




}

function removeRow(removeNum) {
		
		  
jQuery('.education'+removeNum).remove();

}
</script>
<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
function skills(frm) {
 
rowCount ++;
var recRow = '<div class="row skills'+rowCount+'" >'+jQuery('.skills').html()+'<div class="col-md-3 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRowskills('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.skills_test').before(recRow);




}

function removeRowskills(removeNum) {
		 
		  
jQuery('.skills'+removeNum).remove();

}
</script>
<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
var jdsjd;
$( document ).ready(function() {


//var ss212=$('.work_experience_test').prev().attr("class");
////alert(ss212[2]);
//str=ss212.split(" ");
//
//rowCount = str[2];

   jdsjd =  $('.work_experience').html();

   
});


function work_experience(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;

var recRow = '<div class="row work_experience'+rowCount+'" >'+jdsjd+'<div class="col-md-3 pt_10"><a href="javascript:void(0);" class="remove" onclick="removeRowwork_experience('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.work_experience_test').before(recRow);

//var ss=$('.work_experience'+rowCount).find('.job_title').attr('name','job_title['+rowCount+']');
//var ss=$('.work_experience'+rowCount).find('.comapnay').attr('name','comapnay['+rowCount+']');
//var ss=$('.work_experience'+rowCount).find('.start_date').attr('name','start_date['+rowCount+']');
//var ss=$('.work_experience'+rowCount).find('.end_date').attr('name','end_date['+rowCount+']');
//var ss=$('.work_experience'+rowCount).find('.current').attr('name','current['+rowCount+']');

$('.demo-1').monthpicker();

$(".current").click(function() {
   
   $(".current").each(function(){
         $('.current').prop('checked', false);   
      $(".end_date").removeAttr("disabled");
      });
     
   $(this).prop('checked', true);  
  var a1223= $(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= $(this).parent().parent().prev().find('input').val('');
    
    
   
   
   
	  //alert("dggd");
      // alert($("input[name=current]:checked").val());
	  //$(".end_date").removeAttr("disabled");
	   
	  //var a1223= $(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
    //  var a12234= $(this).parent().parent().prev().find('input').val();
	 //  alert(a12234);
    });


}

function removeRowwork_experience(removeNum) {
		
		  
jQuery('.work_experience'+removeNum).remove();

}
</script>

<script>
 function delete_education(del_id) {
//alert(del_id);
$.ajax({
            type: 'POST',      
           url: "view/ajax/delete_education.php",
           data:"uid="+del_id,
           async: true,
            success: function(data) {
            window.location.reload(); 
                          }
           
              
                 
            }) ;
 }
</script>

<script>
 function skill_remove(skills_id)
 {
  //alert(skills_id);
  $.ajax({
            type: 'POST',      
           url: "view/ajax/delete_skill.php",
           data:"uid="+skills_id,
           async: true,
            success: function(data) {
            window.location.reload(); 
                          }
           
              
                 
            }) ;
  
 }
</script>

<script>
 function work_experience_remove(work_experience_id)
 {
  //alert(work_experience_id);
  $.ajax({
            type: 'POST',      
           url: "view/ajax/delete_work_experience.php",
           data:"uid="+work_experience_id,
           async: true,
            success: function(data) {
			 //alert(data);
            window.location.reload(); 
                          }
           
              
                 
            }) ;
  
 }
</script>


<script>
 function work_experience_remove(work_experience_id)
 {
 // alert(work_experience_id);
  $.ajax({
            type: 'POST',      
           url: "view/ajax/delete_work_experience.php",
           data:"uid="+work_experience_id,
           async: true,
            success: function(data) {
			 //alert(data);
            window.location.reload(); 
                          }
           
              
                 
            }) ;
  
 }
</script>


 <script>
	  function AjaxGetState(country_id,select_state) {
	  // alert(country_id);
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/state_new.php?country_id="+country_id,
	  //data:'country_id='+val,
	  success: function(data){
	  $("#state").html(data);
	  if (select_state!='') {
	  $("#state>select[name=state]").find("option[value='"+select_state+"']").attr("selected","selected");
	  }
	  }
	  });
	  }
	  
	  
	  </script>
	  
	  
 <script>
	  function AjaxGetState(country_id,select_state) {
	  //alert("ada"+select_state);
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/state.php?country_id="+country_id,
	  //data:'country_id='+val,
	  success: function(data){
	  $("#state").html(data);
	  if (select_state!='') {
		// alert(select_state);
	  $("#state>select[name=state]").find("option[value='"+select_state+"']").attr("selected","selected");
	  }
	  }
	  });
	  }
	  
	  
	  </script>
	  
	  <script>
	  //function AjaxShipping(state_id,select_city) {
	  //
	  //$.ajax({
	  //type: "POST",
	  //url: "view/ajax/city_new.php?state_id="+state_id,
	  ////data:'country_id='+val,
	  //success: function(data){
	  //$("#city").html(data);
	  //// alert(data);
	  //
	  //if (select_city!='') {
	  //select_city=$.trim(select_city);
	  //$("#city>select[name=city]").find("option[value='"+select_city+"']").attr("selected","selected");
	  //
	  //}
	  //}
	  //});
	  //}
	  
      
      
      
      
      
     
 function zip_id(id)
	  {
	  if(id!==''){
	  //alert(id);
	  jQuery.ajax({
	  url : "view/ajax/get_new_zip.php",
	  type:"POST",
	  data: "id="+id,
	  Async: true,
	  success:function(data)
	  {
	  //alert(data);
	  
	  var res = data.split("#");
	  //
	  
	  var country=$("#country>select[name=country]>option:selected").val();
	  if (country=='') {
	  //alert(res['0']);
	  $("#country>select[name=country]").find("option[value='"+res['0']+"']").attr("selected","selected").change();
	  
	  }
	  
	  
	  var state=$("#state>select[name=state]>option:selected").val();
	  if (state=='') {
	  var country_id=res['0'];
	  var select_state= res['1'];
	  //$("select[name='theNameYouChose']").find("option[value='theValueYouWantSelected']").attr("selected",true);
	  AjaxGetState(country_id,select_state);
	  
	  
	  
	  }
	  
	  var city=	$("#city").val();
	  if (city=='') {
	  
	  
	  var select_city=res['2'];
	  var state_id=res['1'];
	  
      //alert("ddgd"+select_city);
      
      	$("#city").val(select_city);
        
         $("#city").addClass("edited");
      
	  //AjaxShipping(state_id,select_city);
	  
	  // alert(select_city);
	  //$("#city>select[name=city]").find("option[value='"+select_city+"']").attr("selected","selected");
	  
	  
	  }
	  
	  
	  }
	  });
	  
	  }
	  }
      
      
      
      
      
      
	  
	  </script>






        <div class="container">
       <div class="row"> 
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
<form action="model/edit_model.php" id="theform" method="post" enctype="multipart/form-data">
     
        <div class="row">
            
            <div class="col-md-12 ">
           <!-- <h3>Not Searchable (Editing):</h3>-->
                        </div>
            </div>
      
            <div class="row">
                            <div class="col-md-4 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="alphaonly form-control <?php if($first_name!=''){echo 'edited'; } ?>" >
                                    <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>" class="form-control" >
                                    <label for="form_control_1">First Name</label>
                                    </div>
                                </div>
                            </div>
							
							<div class="col-md-4 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="middel_name" value="<?php echo $middel_name; ?>" class="alphaonly form-control <?php if($middel_name!=''){echo 'edited'; } ?>" >
                                   
                                    <label for="form_control_1">Middle Name</label>
                                    </div>
                                </div>
                            </div>
							
							
							
							
                            <div class="col-md-4 unit">
                             
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="alphaonly form-control <?php if($last_name!=''){echo 'edited'; } ?>" >
                                    
                                      <label for="form_control_1">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 unit">
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 unit">
                                
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" readonly name="email" value="<?php echo $email; ?>" class="form-control <?php if($email!=''){echo 'edited'; } ?>">
                                    <label for="form_control_1">Email</label>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                     
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="phone_no" value="<?php echo $phone; ?>" onkeypress="return isNumber(event);" class="form-control <?php if($phone!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Phone No.</label>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                            <div class="input" id="country">
                                   
                                    <!--<input type="text" name="range_val" class="form-control">
                                    <label for="form_control_1">Country</label>-->
                                     <select class="form-control"  onchange="AjaxGetState(this.value)" name="country" >
                                                <option  value="">Country...</option>
                   <?php
                  $country= mysql_query("select * from  country_master order by country_name ASC");
                   while($fetch_country=mysql_fetch_array($country))
                   {
         
                   ?>
                                                <option value="<?php echo $fetch_country['country_code']; ?>" <?php echo ($fetch_country['country_code']==$country1)? 'selected' : '';  ?>><?php echo $fetch_country['country_name']; ?></option>
                      <?php } ?>
                                            </select>
                                    
                                     
                                
                            </div>
                                
                            </div>
                            
                             <!--<div class="col-md-3 ">
                             
                         <div class="fl pall_5">Searchable</div>
                         <div class="fl">
                     <input type="checkbox" name="searchable" checked data-toggle="toggle">
                     
                     </div>    
            
                        </div>-->
                        <div class="col-md-3 ">
                         <div class="fl pall_5">Searchable</div>
                           
                         <div class="fl">
                     <input type="checkbox" value="yes" name="searchable"  data-toggle="toggle" <?php if($searchable!=''){echo "checked"; } ?>>
                     
                     </div>        
            <!--<input name="Searchable" type="radio" value="">--> 
                        </div>
                            
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-md-4 unit">
                               <div class="input" id="state">
                                   <select name="state"    class="form-control">
                <option value="">State name</option>
                <?php
                 $state_setect= mysql_query("select *  FROM state_master where state_name='".$state."' ");
                   while($fetch_state=mysql_fetch_array($state_setect))
                   {
                ?>
                <option value="<?php echo  $fetch_state['state_name']?>" <?php echo ($fetch_state['state_name']==$state)? 'selected' : '';  ?>><?php echo  $fetch_state['state_name']?></option>
                
                <?php
                   }
                ?>
              
            </select>
                                </div> 
                            </div>
                            <div class="col-md-4 unit">
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="city" id="city"  value="<?php echo $city; ?>" class="alphaonly form-control <?php if($city!=''){echo 'edited'; } ?>">
                                     <label for="form_control_1">City</label>
                                    
                                    </div>
                                </div>  
                                
                            </div>
                            <div class="col-md-4 unit">
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="postal_code" id="postal_code" onkeypress="return isNumber(event);" onblur="zip_id(this.value)"  value="<?php echo $postal_code; ?>" class="form-control <?php if($postal_code!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Zipcode</label>
                                    </div>
                                </div>
                            </div>
                        </div> 
                         <hr>
                         <div class="row">
             
                                <label class="label col-md-3">Title:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="position" value="<?php echo $position; ?>" class="form-control <?php if($position!=''){ echo 'edited';} ?>" ><label for="form_control_1">Desired Position</label>
									 
							</div>	</div></div>
                               
                                                       <div class="row">    <label class="label col-md-3">Experience:</label>
                                <div class="input col-md-6">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="experience" value="<?php echo $experience; ?>" class="form-control <?php if($experience!=''){echo 'edited'; } ?>">
                                 <label for="form_control_1">Years</label>   
                         </div> </div></div>
                            
                                                 <div class="row">          <label class="label col-md-3">Type:</label>
                                <div class="input col-md-6">
                                  
								    <select class="form-control" multiple  name="employment_type[]">
                                        
                                                <option >Select type </option>
                                        <?php
                                    //$select_type=mysql_query("select * from sebna_profile_tbl where reg_id='$reg_id'");
                                    //$fetch_type=mysql_fetch_array($select_type);
                                       $employment_type1= mysql_query("select * from sebna_employment_type");
                                       while($fetch_employment_type=mysql_fetch_array($employment_type1))
                                       {
                                        ?>
                                                <option value="<?php echo $fetch_employment_type['id']; ?>"  <?php  if(in_array($fetch_employment_type['id'],$employment_type)) { echo 'selected';}else { echo " "; } ?>><?php echo $fetch_employment_type['employment_type']; ?></option>
                                        <?php } ?>
                                            </select>
                                </div>
                                

                            
                      
                        </div>
                        
                        <div class="row">          <label class="label col-md-3">Relocate:</label>
                                <div class="input col-md-6">
                                <div class="fl">
                      <input type="checkbox" name="relocate" value="yes"  data-toggle="toggle" <?php if($relocate!=''){echo "checked"; } ?>></div>
                                </div></div>
                        
                        <div class="row">
                           
                                <label class="label col-md-3">Preferred location:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="preferred_location" value="<?php echo $preferred_location; ?>" class="alphaonly form-control <?php if($preferred_location!=''){ echo 'edited';} ?>" ><label for="form_control_1">Preferred location</label>
									 
							</div>	</div></div>
                        
                                
                                <div class="row">          <label class="label col-md-3">Authorization:</label>
                                <div class="input col-md-6">
                                    <select class="form-control" name="work_authorization" id="work_authorization_id">
                                                <option disabled value="none">Select...</option>
                                                <?php
                                                $work_authorization= mysql_query("select * from sebna_work_authorization");
                                       while($fetch_work_authorization=mysql_fetch_array($work_authorization))
                                       {
                                        ?>
                                               
                                                <option value="<?php echo $fetch_work_authorization['id']; ?>" <?php echo ($fetch_work_authorization['id']==$work_authorization1)? 'selected':''; ?> ><?php echo $fetch_work_authorization['work_authorization']; ?></option>
                                                <?php
                                       }
                                                ?>
                                            </select>
                                </div>
                                
                                </div>
                                
                                 <div  id="work_authorization_id_12">
                                
                               
                              <fieldset>
    <legend>Employer Details:</legend>
     <div class="row">
                                 <label class="label col-md-3">Name:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="employer_name" id="employer_name" value="<?php echo $employer_name; ?>" class="alphaonly form-control <?php if($employer_name!=''){ echo 'edited';} ?>" >
                                    <label for="form_control_1">Name</label>
									 
							</div>
                                </div>
     </div>
                                
                             <div class="row">    
                                   <label class="label col-md-3">Company:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="employer_company" id="employer_company" value="<?php echo $employer_company; ?>" class="alphaonly form-control <?php if($employer_company!=''){ echo 'edited';} ?>" >
                                    <label for="form_control_1">Company</label>
									 
							</div>
                                </div>
                             </div>
                                  <div class="row">  
                                   <label class="label col-md-3">Email:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="email" name="employer_email" id="employer_email" value="<?php echo $employer_email; ?>" class="form-control <?php if($employer_email!=''){ echo 'edited';} ?>" >
                                    <label for="form_control_1">Email</label>
									 
							</div>
                                </div>
                                   
                                </div>
                                
                                 <div class="row">
                                
                                   <label class="label col-md-3">Number:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="employer_number" id="employer_number" value="<?php echo $employer_number; ?>" class="form-control <?php if($employer_number!=''){ echo 'edited';} ?>" >
                                    <label for="form_control_1">Number</label>
									 
							</div>
                                </div>
                             
                                
                                </div>
           
                     </fieldset>
                              <br>
                                </div>
                                 <script>
						   $( document ).ready(function() {
                              
                                  var valu_select = $('#work_authorization_id').val();
                                 if (valu_select==3) {
                                  $("#work_authorization_id_12").show();
                                 }
                                 else{
                     $("#work_authorization_id_12").hide();
                                 }
                      });
						  $('#work_authorization_id').on('change', function() {
						  if(this.value ==3)
						  {
						 
						   $("#work_authorization_id_12").show();
						   
						  }
						  else
						  {
						
						   $("#work_authorization_id_12").hide();
                           $("#employer_name").val('');
                           $("#employer_company").val('');
                           $("#employer_email").val('');
                           $("#employer_number").val('');
                           
						  }
						 });
						</script>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                        <div class="row">          <label class="label col-md-3">Security Clearance:</label>
                                <div class="input col-md-6">
                                 <div class="fl">
                      <input type="checkbox" name="security"  data-toggle="toggle" <?php if($security!=''){ echo "checked"; } ?>></div>
                                </div></div>
                                
                                <div class="row">￼

              
                                <label class="label col-md-3">Salary:</label>
                                <div class="input col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="salary" value="<?php echo $salary; ?>" class="form-control <?php if($salary!=''){ echo 'edited';} ?>">
                                    <label for="form_control_1">Annual Salary</label>
                                    
                                    </div>
                                </div></div>
                                
                                <div class="row">
              
                                <label class="label col-md-3">Hourly Rate:</label>
                                <div class="input col-md-6">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="hourly_rate" value="<?php echo $hourly_rate; ?>" class="form-control <?php if($hourly_rate!=''){ echo 'edited';} ?>">
                                     <label for="form_control_1">Hourly Rate</label>
                                    
                                    </div>
                                </div></div>
                                
                                
                                <div class="row">
              
                                <label class="label col-md-3">I'm willing to travel:</label>
                                <div class="input col-md-6">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <select class="form-control" name="travel">
                                       <option value="">Select travel..</option>
                                       <option value="0" <?php echo ($travel=='0')? 'selected': ''; ?>>No travel</option>
                                       <option value="25" <?php echo ($travel=='25')? 'selected': ''; ?>>25 %</option>
                                       <option value="50" <?php echo ($travel=='50')? 'selected': ''; ?>>50 %</option>
                                       <option value="75" <?php echo ($travel=='75')? 'selected': ''; ?>>75 %</option>
                                       <option value="100" <?php echo ($travel=='100')? 'selected': ''; ?>>100 %</option>
                                       
                                    </select>
                                   
                                 <!--<label for="form_control_1">Hourly Rate ($)</label>-->
                                    
                                    </div>
                                </div></div>
                                
                                
                                
                                <div class="row">
              
                                <label class="label col-md-3">Upload CV</label>
                                <div class="input col-md-6">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="file" name="cv" id="cv" value="" class="">
                                    <div class="Preview"></div>
                                    
                             
                                   <div class="act_as fr" >
                                       <?php
                                $select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$reg_id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		 $cv_name=  $fetch_upload_temp['cv'];
         ?>
          <a download  href="../upload_doc/<?php echo $cv_name;?>" >Download CV</a>
         <?php
         }
         else
         {
           ?>
             <a download  href="../upload_doc/<?php echo $cv_name;?>" >Download CV</a>
        <?php
        }
		  ?>
                                    
                                    
                                     </div>
                                   <!--<input type="hidden" name="old_cv" value="<?php echo $cv_name;?>" class="">-->
                                    
                                    </div>
                                </div>
                                
                                <script>
			jQuery("#cv").change(function () {
			
			var formData = new FormData($('#theform')[0]);
			
			// alert(formData);
			var name=$("#cv").val();
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload.php",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			async: true,
			success: function(data) {
			// alert(data);
			$(".Preview").html(data);
			
			}
			}) ;
			
			var src = $('#file_name').attr('src');
			// alert(src);
			var src = src.split("/");
			var file_name= src[src.length-1];
			
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload_remove.php",
			data: "file_name="+file_name,
			//cache: false,
			//contentType: false,
			// processData: false,
			// async: true,
			success: function(data) {
			//  alert("sfsfs"+data);
			// $(".test").html(data);
			
			}
			}) ;
			
			});
			
			$("#submit").click(function(){
			
			var src = $('#file_name').attr('src');
			// alert(src);
			var src = src.split("/");
			var file_name= src[src.length-1];
			
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload_remove.php",
			data: "file_name="+file_name,
			//cache: false,
			//contentType: false,
			// processData: false,
			// async: true,
			success: function(data) {
			//  alert("sfsfs"+data);
			// $(".test").html(data);
			
			}
			}) ;
			});
			
			
			</script>
                                
                                
                                </div>
                                
                                
                                
                                
                                
                                <!--<div class="row">
              
                                <label class="label col-md-2">Cover Letter:</label>
                                <div class="input col-md-4">
                                    <a href="#">Manage Cover Letters</a>
                                </div></div>-->
                                
                        <hr>
                        
                              <div class="row">
            
            <div class="col-md-12 ">
            <h3>Skills </h3>
                        </div>
            </div>
            <?php
			
                $select_skill=mysql_query("select * from sedna_skills where reg_id='$reg_id'");
               while($fetch_skill=mysql_fetch_array($select_skill))
               {
				//	print_r($fetch_skill);
                ?>
            <div class="row ">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[]" value="<?php echo $fetch_skill['skill_name'];  ?>" class="form-control <?php if($fetch_skill['skill_name']!=''){echo 'edited'; } ?>">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[]" value="<?php echo $fetch_skill['year_exp'];  ?>" class="form-control <?php if($fetch_skill['year_exp']!=''){echo 'edited'; } ?>" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[]" value="<?php echo $fetch_skill['last_used'];  ?>" class="form-control <?php if($fetch_skill['last_used']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
				<div class="col-md-3 pt_10">		<button href="#" class="delete" onclick="skill_remove(<?php echo $fetch_skill['id'];?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> </div>
            </div>
            <?php
               }
            ?>
             <div class="row skills">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[]" value="" class="form-control">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[]" value="" class="form-control" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[]" value="" class="form-control" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
            </div>
                         <div class="row skills_test">
                           <div class="col-md-3 unit">
                                <a type="submit" class="btn btn-primary btn-lg" onclick="skills();" data-automation-id="sign-in-button" >Add</a>
                            </div> 
                        
                        
                        </div>
                        <hr>
                     <div class="row">
            
            <div class="col-md-12 ">
            <h3>Work Experience </h3>
                        </div>
            </div>
                     <?php
                     $select_work_experience=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
                     while($fetch_work_experience=mysql_fetch_array($select_work_experience))
                     {   $idwk= $fetch_work_experience['id'];
                     ?>
         <div class="row <?php echo $idwk; ?> ">
		   
                            <div class="col-md-12 unit">
                               <hr />
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[]" value="<?php echo $fetch_work_experience['job_title']; ?>" class="job_title form-control <?php if($fetch_work_experience['job_title']!=''){echo 'edited'; } ?> " >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[]" value="<?php echo $fetch_work_experience['comapnay']; ?>" class="comapnay form-control <?php if($fetch_work_experience['comapnay']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[]" value="<?php echo $fetch_work_experience['start_date']; ?>" class="start_date form-control demo-1 <?php if($fetch_work_experience['start_date']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[]" value="<?php echo $fetch_work_experience['end_date']; ?>" class="end_date form-control demo-1 <?php if($fetch_work_experience['end_date']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[]" <?php echo ($fetch_work_experience['current']!='' )?'checked':'';  ?>  value="<?php echo $current_date; ?>"  class="current ng-pristine ng-valid">   Current 
                                </div>
                            </div>
							 <div class="col-md-3 unit pt_10"><button href="#" class="delete" onclick="work_experience_remove(<?php echo $fetch_work_experience['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></div>
         </div>
        
         <?php
                     }
         ?>
         <div class="row work_experience">
		
                            <div class="col-md-12 unit">
                              <hr />   
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[]" value="<?php echo $fetch_work_experience['job_title']; ?>" class="job_title form-control" >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[]" value="<?php echo $fetch_work_experience['comapnay']; ?>" class="comapnay form-control" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[]" value="<?php echo $fetch_work_experience['start_date']; ?>" class="start_date form-control demo-1" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[]" value="<?php echo $fetch_work_experience['end_date']; ?>" class="end_date form-control demo-1" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[]" <?php echo ($fetch_work_experience['current']!='' )?'checked':'';  ?>  value="<?php echo $current_date; ?>" class="current ng-pristine ng-valid">   Current 
                                </div>
                            </div>
         </div>
         
                    <div class="row work_experience_test">        
                           <div class="col-md-12 unit">
                                <a type="submit" class="btn btn-primary btn-lg" onclick="work_experience();" data-automation-id="sign-in-button" >Add</a>
                            </div> 
                        
                        
                        </div>      
                        
     <hr>
                     <div class="row">
            
            <div class="col-md-12 ">
            <h3>Education</h3>
                        </div>
            </div>
            <?php
			$select_education=mysql_query("select * from sedna_education where reg_id='$reg_id'");
                     while($fetch_education=mysql_fetch_array($select_education))
                     {
							  
			?>
			<div class="row" id="">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[]">
                                                <option >...</option>
                                                <?php
                                                $education_master=mysql_query("select * from sedna_education_master");
                                                while($fetch_education_master=mysql_fetch_array($education_master))
                                                {
                                                ?>
                                                <option value="<?php echo $fetch_education_master['id']; ?>" <?php echo  ($fetch_education_master['id']==$fetch_education['education'])?'selected':''; ?>><?php echo $fetch_education_master['education_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="institution[]" value="<?php echo $fetch_education['institution']; ?>" class="form-control <?php if($fetch_education['institution']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[]" value="<?php echo $fetch_education['city']; ?>" class="form-control <?php if($fetch_education['city']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[]" value="<?php echo $fetch_education['country']; ?>" class="form-control <?php if($fetch_education['country']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[]"  value="<?php echo $fetch_education['year']; ?>" class="form-control <?php if($fetch_education['year']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
                              
							  <div class="col-md-2 unit pt_10"> <button href="#" class="delete" onclick="delete_education(<?php echo $fetch_education['id'];?>)"><i aria-hidden="true" class="fa fa-trash-o"></i> Delete</button></div>
                              
            </div>
			<?php } ?>
            <div class="row education" id="">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[]">
                                                <option value="" >...</option>
                                                <?php
                                                $education_master=mysql_query("select * from sedna_education_master");
                                                while($fetch_education_master=mysql_fetch_array($education_master))
                                                {
                                                ?>
                                                <option value="<?php echo $fetch_education_master['id']; ?>"><?php echo $fetch_education_master['education_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="institution[]" class="form-control" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[]" class="form-control" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[]" class="form-control" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[]" class="form-control" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
            </div>
                               <div class="row education_test"> 
                              <div class="col-md-2 unit">
                               
                                
                                <a  class="btn btn-primary btn-lg" onclick="education();" data-automation-id="sign-in-button" >Add</a>
                             
                            </div>
                            
                            
                    
                        
                        
                        </div>
                        <br>
  <div class="row"> 
                              <div class="col-md-2 unit">
                               
                                
                                <input type="submit" name="update" class="btn btn-primary btn-lg"  value="Update" data-automation-id="sign-in-button" >
                             
                            </div>
                            
                            
                    
                        
                        
                        </div>
          </form>              
            
            </div> </div></div>
		
<!--<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script src="template/js/jquery.mtz.monthpicker.js"></script>
<script>
$('.demo-1').monthpicker();

$(function(){
   
     $(".current").click(function() {

     $(".current").each(function(){
         $('.current').prop('checked', false);   
      $(".end_date").removeAttr("disabled");
      });
     
   $(this).prop('checked', true);  
  var a1223= $(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= $(this).parent().parent().prev().find('input').val('');
    
     });
});


$(".demo-1").click(function(){
        $(".demo-1").addClass("edited");
    });
//
//function zip_id(id)
//{
//	if(id!==''){
//		
//	
//	//alert(id);
//	jQuery.ajax({
//	url : "view/ajax/get_country_state_city.php",
//	type:"POST",
//	data: "id="+id,
//   success:function(data)
//  {
//	   var res = data.split("||#"); 
//		//alert(res);
//		
//				
//	   $("#city").val(res['0']);
//		$('#city').addClass("edited");
//		
//		$("#country").html(res['1']);
//		//$('#country').addClass("edited");
//		
//		 $("#state").html(res['2']);
//		//$('.state').addClass("edited");
//  }
//  });
//}
//}




function city_name(name)
{
	if(name!==''){
	//alert(name);
	jQuery.ajax({
	url : "view/ajax/get_country_state_city_2.php",
	type:"POST",
	data: "name="+name,
   success:function(data)
  {
	  var res = data.split("||#"); 
	//alert(data);
		
				
	   $("#postal_code").val(res['0']);
		$('#postal_code').addClass("edited");
		
		$("#country").html(res['1']);
		//$('#country').addClass("edited");
		
		 $("#state").html(res['2']);
		//$('.state').addClass("edited");
  }
  });

}
}
   

			   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$('.alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-z]/g,'') ); }
);

</script>