<?php
@session_start();
 $current_date =strtotime(date("d-m-Y"));
  $reg_id= $_REQUEST['id'];
  $select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$reg_id' && delete_status='0'");
$fetch=mysql_fetch_array($select);
 $consultants_id=$fetch['id'];
  $cv_name=$fetch['cv'];
   $status=$fetch['status'];
   
   if($status!='1')
{
 //echo "status_0";
 //echo "select * from sedna_operator_request_consultants where consultant_id='$reg_id' && status='0'";
 $select1=mysql_query("select * from sedna_operator_request_consultants where consultant_id='$reg_id' && status='0'");
 $fetch2=mysql_fetch_array($select1);
  
  $new_value_array= unserialize($fetch2['new_value']);
  
//  echo "<pre>";
//array_pop($new_value_array);
//print_r($new_value_array);
//
//  echo "</pre>";

if(!is_array($new_value_array[searchable]))
{
 echo   $searchable =  $new_value_array[searchable];
  
}
if(!is_array($new_value_array[relocate]))
{
echo   $relocate =  $new_value_array[relocate];
  
}
if(!is_array($new_value_array[security]))
{
   $security =  $new_value_array[security];
  
}

if(!is_array($new_value_array[first_name]))
{
   $first_name =  $new_value_array[first_name];
  
}
if(!is_array($new_value_array[middel_name]))
{
  $middle_name =  $new_value_array[middel_name];
  
}


if(!is_array($new_value_array[last_name]))
{
   $last_name= $new_value_array[last_name];
  
}
if(!is_array($new_value_array[email]))
{
  $email= $new_value_array[email];
  
}
if(!is_array($new_value_array[phone_no]))
{
  $phone_no=  $new_value_array[phone_no];
  
}
if(!is_array($new_value_array[postal_code]))
{
   $postal_code= $new_value_array[postal_code];
  
}
 if(!is_array($new_value_array[city]))
{
   $city=  $new_value_array[city];
  
}
 if(!is_array($new_value_array[country]))
{
    $Country= $new_value_array[country];
  
}
if(!is_array($new_value_array[state]))
{
    $state= $new_value_array[state];
  
}

 if(!is_array($new_value_array[state]))
{
   $state= $new_value_array[state];
  
}


if(!is_array($new_value_array[position]))
{
    $position =  $new_value_array[position];
  
}

if(!is_array($new_value_array[preferred_location]))
{
    $preferred_location =  $new_value_array[preferred_location];
  
}




if(!is_array($new_value_array[experience]))
{
   $experience =  $new_value_array[experience];
  
}

if(!is_array($new_value_array[salary]))
{
   $salary =  $new_value_array[salary];
  
}

if(!is_array($new_value_array[hourly_rate]))
{
   $hourly_rate =  $new_value_array[hourly_rate];
  
}


 if(!is_array($new_value_array[employment_type]))
{
 
  
}
else
{
 
    $employment_type=  $new_value_array[employment_type];
  // print_r($employment_type);
  
}

if(!is_array($new_value_array[work_authorization]))
{
   $work_authorization=  $new_value_array[work_authorization];
  
}

if(!is_array($new_value_array[travel]))
{
   $travel=  $new_value_array[travel];
  
}



if(!is_array($new_value_array[job_title]))
{
 
  
}
else
{
 
   $job_title=  $new_value_array[job_title];
   
   //print_r($job_title);
  
}

if(!is_array($new_value_array[comapnay]))
{
 
  
}
else
{
 
   $comapnay=  $new_value_array[comapnay];
   
  
  
}
if(!is_array($new_value_array[start_date]))
{
 
  
}
else
{
 
   $start_date = $new_value_array[start_date];
   
   
  
}
if(!is_array($new_value_array[end_date]))
{
 
  
}
else
{
 
   $end_date=  $new_value_array[end_date];
   
  
  
}
if(!is_array($new_value_array[current]))
{
 
  
}
else
{
 
  $current=  $new_value_array[current];
   
 
  
}


if(!is_array($new_value_array[skill_name]))
{
 
  
}
else
{
 
   $skill_name=  $new_value_array[skill_name];
   
  
  
}


if(!is_array($new_value_array[year_exp]))
{
 
  
}
else
{
 
   $year_exp=  $new_value_array[year_exp];
   
   
  
}
if(!is_array($new_value_array[last_used]))
{
 
  
}
else
{
 
   $last_used=  $new_value_array[last_used];
   
 
  
}
if(!is_array($new_value_array[education_type]))
{
 
  
}
else
{
 
   $education_type12=  $new_value_array[education_type];
   //print_r($education_type12);
   //echo count($education_type12);

  
}
if(!is_array($new_value_array[institution]))
{
 
  
}
else
{
 
   $institution=  $new_value_array[institution];
   //print_r($institution);
   ///echo count($institution);

  
}
if(!is_array($new_value_array[edu_city]))
{
 
  
}
else
{
 
   $edu_city=  $new_value_array[edu_city];
  // print_r($edu_city);
   //echo count($edu_city);

  
}
if(!is_array($new_value_array[edu_country]))
{
 
  
}
else
{
 
   $edu_country=  $new_value_array[edu_country];
   //print_r($edu_country);
  // echo count($edu_country);

  
}
if(!is_array($new_value_array[edu_year]))
{
 
  
}
else
{
 
   $edu_year=  $new_value_array[edu_year];
   //print_r($edu_country);
  // echo count($edu_country);

  
}

if(!is_array($new_value_array[employer_name]))
{
   $employer_name=  $new_value_array[employer_name];
  
}
if(!is_array($new_value_array[employer_company]))
{
   $employer_company=  $new_value_array[employer_company];
  
}
if(!is_array($new_value_array[employer_email]))
{
   $employer_email=  $new_value_array[employer_email];
  
}
if(!is_array($new_value_array[employer_number]))
{
   $employer_number=  $new_value_array[employer_number];
  
}



   }
   else
   {
     // echo "status_1";
      
     $email=$fetch['email'];
     $cv_name=$fetch['cv'];
      
 $select1_profile=mysql_query("select * from sebna_profile_tbl where reg_id='$reg_id'");
$fetch1=mysql_fetch_array($select1_profile);
 $first_name=$fetch1['first_name'];
 $middle_name = $fetch1['middel_name'];
  $last_name=$fetch1['last_name'];
  $postal_code=$fetch1['postal_code'];
  $position=$fetch1['position'];
  $city=$fetch1['city'];
  $phone_no=$fetch1['phone_no'];
   $Country=$fetch1['country'];
  $state=$fetch1['state'];
  $job_title= explode(",",$fetch1['job_title']);
  $employment_type=explode(",",$fetch1['employment_type']);
  $work_authorization=$fetch1['work_authorization'];
  $salary=$fetch1['salary'];
  $hourly_rate=$fetch1['hourly_rate'];
  $travel=$fetch1['travel'];
   $experience=$fetch1['experience'];
   $searchable=$fetch1['searchable'];
   $relocate=$fetch1['relocate'];
   $security=$fetch1['security'];
   $preferred_location=$fetch1['preferred_location'];
   $employer_name=$fetch1['employer_name'];
    $employer_company=$fetch1['employer_company'];
     $employer_email=$fetch1['employer_email'];
      $employer_number=$fetch1['employer_number'];
   }

 
?>

<script>

//   var form_clean;
//
//// serialize clean form
//$(function() { 
//    form_clean = $("form").serialize();
//    
//});
//
//// compare clean and dirty form before leaving
//window.onbeforeunload = function (e) {
//    var form_dirty = $("form").serialize();
//    if(form_clean != form_dirty) {
//       return 'There is unsaved form data.';
//      
//      alert("wrwrw");
//    }
//};
//   
   
</script>





<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
function education(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;
//var recRow = '<tr class="experience_row'+rowCount+'"><td>Job Title</td><td style="text-align: left;"><input type="text" class="form-control" name="job_title[]" value=""  placeholder="Job Title"></td></tr><tr class="experience_row'+rowCount+'"><td>Comapnay</td><td style="text-align: left;"><input type="text" class="form-control" name="comapnay[]" value=""  placeholder="Comapnay"></td></tr><tr class="experience_row'+rowCount+'"><td>Start Date</td><td style="text-align: left;"><input type="text" class="form-control" name="start_date[]" value=""  placeholder="Start Date"></td></tr><tr class="experience_row'+rowCount+'"><td>End Date</td><td style="text-align: left;"><input type="text" class="form-control" name="end_date[]" value=""  placeholder="End Date"><br><input type="checkbox" name="current[]" value="" > Current Date &nbsp;<a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a> </td></tr>';
var recRow = '<div class="row education'+rowCount+'" >'+$('.education').html()+'<div class="col-md-2 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRow('+rowCount+');"><i class="fa fa-minus-circle"></i>  Remove</a></div></div>';

$('.education_test').before(recRow);



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
var recRow = '<div class="row skills'+rowCount+'" >'+$('.skills').html()+'<div class="col-md-3 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRowskills('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.skills_test').before(recRow);




}

function removeRowskills(removeNum) {
		 
		  
$('.skills'+removeNum).remove();

}
</script>
<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
var jdsjd;
$( document ).ready(function() {


var ss212=$('.work_experience_test').prev().attr("class");
//alert(ss212[2]);
str=ss212.split(" ");

rowCount = str[2];

   jdsjd =  $('.work_experience').html();

   
});

function work_experience(frm) {
 //$('#addedRows').show();

rowCount ++;

var recRow = '<div class="row work_experience'+rowCount+'" >'+jdsjd+'<div class="col-md-3 pt_10"><a href="javascript:void(0);" class="remove" onclick="removeRowwork_experience('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.work_experience_test').before(recRow);




var ss=$('.work_experience'+rowCount).find('.job_title').attr('name','job_title['+rowCount+']');
var ss=$('.work_experience'+rowCount).find('.comapnay').attr('name','comapnay['+rowCount+']');
var ss=$('.work_experience'+rowCount).find('.start_date').attr('name','start_date['+rowCount+']');
var ss=$('.work_experience'+rowCount).find('.end_date').attr('name','end_date['+rowCount+']');
var ss=$('.work_experience'+rowCount).find('.current').attr('name','current['+rowCount+']');


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
  
$(".demo-1").click(function() {     
       
	   	  $(this).addClass("edited");
	   //alert(a1223);
    });

}


function removeRowwork_experience(removeNum) {
		
		  
jQuery('.work_experience'+removeNum).remove();

}
</script>

<script>
 function delete_education(del_id) {
  // alert(del_id);

$("#edu"+del_id).remove();
 }
</script>

<script>
  
 function collect_remove_ids(skills_id,field_name)
 {
  
  var oldVal = $("#"+field_name+"_remove_ids").val();
  if(oldVal==""){
  var nval= skills_id;
  }
  else
  {
   var nval= oldVal+","+ skills_id; 
  }
 // alert(nval);
$("#"+field_name+"_remove_ids").val(nval);


  
  $("#"+field_name+skills_id).remove();
  
 }
</script>

<script>
 function work_experience_remove(work_experience_id)
 {
  
$("#work"+work_experience_id).remove();
  
 }
</script>

   <script>
	  function AjaxGetState(country_id,select_state) {
	  // alert(country_id);
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/state.php?country_id="+country_id,
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
	  function AjaxShipping(state_id,select_city) {
	  
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/city_new.php?state_id="+state_id,
	  //data:'country_id='+val,
	  success: function(data){
	  $("#city").html(data);
	  // alert(data);
	  
	  if (select_city!='') {
	  select_city=$.trim(select_city);
	  $("#city>select[name=city]").find("option[value='"+select_city+"']").attr("selected","selected");
	  
	  }
	  }
	  });
	  }
	  
      
      
      
      
      
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
	  
	  
	  var state=	$("#state>select[name=state]>option:selected").val();
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
     
	  
	  }
	  
	  
	  }
	  });
	  
	  }
	  }
      
      
	  
	  </script>
	  






        <div class="container">
       <div class="row"> 
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
<form action="model/edit_model.php" id="theform" method="post" name="form" enctype="multipart/form-data">
     
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
                                    <input type="text" name="middel_name" value="<?php echo $middle_name; ?>" class="alphaonly form-control <?php if($middle_name!=''){echo 'edited'; } ?>" >
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
                                    <input type="text" name="phone_no" value="<?php echo $phone_no; ?>" onkeypress="return isNumber(event);" class="form-control <?php if($phone_no!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Phone No.</label>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <!--<input type="text" name="range_val" class="form-control">
                                    <label for="form_control_1">Country</label>-->
                                    <select class="form-control" onchange="AjaxGetState(this.value)" name="country" id="country">
                                                <option disabled=""  value="none">Country...</option>
                   <?php
                  $country= mysql_query("select * from  country_master");
                   while($fetch_country=mysql_fetch_array($country))
                   {
         
                   ?>
                                                <option value="<?php echo $fetch_country['country_code']; ?>" <?php echo ($fetch_country['country_code']==$Country)? 'selected' : '';  ?>><?php echo $fetch_country['country_name']; ?></option>
                      <?php } ?>
                                            </select>
                                    
                                     </div>
                                    
                                </div>
                            </div>
                            
                           
                        <div class="col-md-3 ">
                         <div class="fl pall_5">Searchable</div>
                           
                         <div class="fl">
                     <input type="checkbox" value="yes" name="searchable"  data-toggle="toggle" <?php if($searchable!=''){ echo "checked";} ?>>
                     
                     </div>        
         
                        </div>
                            
                        </div>
                        <hr>
                       <div class="row">
                        <div class="col-md-4 unit">
                              
                         <div class="input" id="state">
                                   <select name="state"    class="form-control">
                <option value="">State name</option>
                <?php
                 $state_setect= mysql_query("select *  FROM state_master where state_name='".$state."' and country_code='".$Country."'");
                   while($fetch_state=mysql_fetch_array($state_setect))
                   {
                ?>
                <option value="<?php echo $fetch_state['state_name']?>" <?php echo ($fetch_state['state_name']==$state)? 'selected' : '';  ?>><?php echo  $fetch_state['state_name']?></option>
                
                <?php
                   }
                ?>
              
            </select>
                                </div>    
                              
                            </div>
                        
                        
                            <div class="col-md-4 unit">
                           <!--  onblur="city_name(this.value)"-->
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="city" id="city"  value="<?php echo $city; ?>" class="alphaonly form-control <?php if($city!=''){echo 'edited'; } ?>">
                                     <label for="form_control_1">City</label>
                                    
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-md-3 unit">
                             
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="postal_code" id="postal_code" onkeypress="return isNumber(event);" onblur="zip_id(this.value)" value="<?php echo $postal_code; ?>" class="form-control <?php if($postal_code!=''){echo 'edited'; } ?>" >
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
                                    <input type="text" name="experience" value="<?php echo $experience; ?>" class="form-control <?php if($experience!=''){ echo 'edited';} ?>">
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
                                                <option value="<?php echo $fetch_employment_type['id']; ?>" <?php  if(in_array($fetch_employment_type['id'],$employment_type)) { echo 'selected';}else { echo " "; } ?>><?php echo $fetch_employment_type['employment_type']; ?></option>
                                        <?php } ?>
                                            </select>
                                </div>
                                

                      
                        </div>
                        
                        <div class="row">          <label class="label col-md-3">Relocate:</label>
                                <div class="input col-md-6">
                                <div class="fl">
                      <input type="checkbox" name="relocate" value="yes"  data-toggle="toggle" <?php if($relocate!=''){ echo "checked";} ?>></div>
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
                                                $work_authorization1= mysql_query("select * from sebna_work_authorization");
                                       while($fetch_work_authorization=mysql_fetch_array($work_authorization1))
                                       {
                                        ?>
                                               
                 <option value="<?php echo $fetch_work_authorization['id']; ?>" <?php echo ($fetch_work_authorization['id']==$work_authorization)? 'selected':''; ?> ><?php echo $fetch_work_authorization['work_authorization']; ?></option>
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
                                    <input type="text" name="employer_name" id="employer_name" value="<?php echo $employer_name; ?>" class="alphaonly form-control <?php if($employer_name!=''){ echo 'edited';} ?> re_remove" >
                                    <label for="form_control_1">Name</label>
									 
							</div>
                                </div>
     </div>
                                
                             <div class="row">    
                                   <label class="label col-md-3">Company:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="employer_company" id="employer_company" value="<?php echo $employer_company; ?>" class="alphaonly form-control <?php if($employer_company!=''){ echo 'edited';} ?> re_remove" >
                                    <label for="form_control_1">Company</label>
									 
							</div>
                                </div>
                             </div>
                                  <div class="row">  
                                   <label class="label col-md-3">Email:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="email" name="employer_email" id="employer_email" value="<?php echo $employer_email; ?>" class="form-control <?php if($employer_email!=''){ echo 'edited';} ?> re_remove" >
                                    <label for="form_control_1">Email</label>
									 
							</div>
                                </div>
                                   
                                </div>
                                
                                 <div class="row">
                                
                                   <label class="label col-md-3">Number:</label>
                                <div class="input col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="employer_number" id="employer_number" value="<?php echo $employer_number; ?>" class="form-control <?php if($employer_number!=''){ echo 'edited';} ?> re_remove" >
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
                            $(".re_remove").attr("required", true);
						   
						  }
						  else
						  {
						 $(".re_remove").removeAttr('required');
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
                      <input type="checkbox" name="security" value="yes" <?php if($security!=''){ echo "checked";} ?> data-toggle="toggle"></div>
                                </div></div>
                                
                                <div class="row">
              
                                <label class="label col-md-3">Salary:</label>
                                <div class="input col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="salary" value="<?php echo $salary; ?>" class="form-control <?php if($salary!=''){ echo 'edited';} ?>">
                                    <label for="form_control_1">Annual Salary ($)</label>
                                    
                                    </div>
                                </div></div>
                                
                                <div class="row">
              
                                <label class="label col-md-3">Hourly Rate:</label>
                                <div class="input col-md-6">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="hourly_rate" value="<?php echo $hourly_rate; ?>" class="form-control <?php if($hourly_rate!=''){ echo 'edited';} ?>">
                                     <label for="form_control_1">Hourly Rate ($)</label>
                                    
                                    </div>
                                </div></div>
                                
                                <div class="row">
              
                                <label class="label col-md-3">I'm willing to travel:</label>
                                <div class="input col-md-6">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <select class="form-control" name="travel">
                                       <option value=""  >Select travel..</option>
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
          <a download href="../upload_doc/<?php echo $cv_name;?>" >Download CV</a>
         <?php
         }
        
		else
        {
		  ?>
                                    
            <a download href="../upload_doc/<?php echo $cv_name;?>" >Download CV</a>                         
                                    
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
            <input type="hidden" name="skills_remove_ids" id="skills_remove_ids" value="">
                        </div>
            </div>
            <?php
			//echo count($skill_name);
			//print_r($skill_name);
            
            $select_skills=mysql_query("select * from sedna_skills where reg_id='$reg_id'");
				while($fetch_skills=mysql_fetch_array($select_skills))
				{
				$idsk= $fetch_skills['id'];
            
            
            ?>
            
            <div class="row <?php echo $idsk; ?>" id="skills<?php echo $idsk; ?>">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[<?php echo $idsk;?>]" value="<?php echo $fetch_skills['skill_name'];  ?>" class="form-control <?php if($fetch_skills['skill_name']!=''){echo 'edited'; } ?>">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[<?php echo $idsk;?>]" value="<?php echo $fetch_skills['year_exp'];  ?>" class="form-control <?php if($fetch_skills['year_exp']!=''){echo 'edited'; } ?>" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[<?php echo $idsk;?>]" value="<?php echo $fetch_skills['last_used'];  ?>" class="form-control <?php if($fetch_skills['last_used']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
				<div class="col-md-3 pt_10">	<button	 class="delete" onclick="collect_remove_ids(<?php echo $idsk;?>,'skills')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </button> </div>
            </div>
            
            
            <?php
                }
			for($sk=0;$sk<count($skill_name);$sk++)
			{
			 if($skill_name[$sk]!='')
             {
                ?>
            <div class="row" id="skill<?php echo $sk; ?>">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[]" value="<?php echo $skill_name[$sk];  ?>" class="form-control <?php if($skill_name[$sk]!=''){echo 'edited'; } ?>">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[]" value="<?php echo $year_exp[$sk];  ?>" class="form-control <?php if($year_exp[$sk]!=''){echo 'edited'; } ?>" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[]" value="<?php echo $last_used[$sk];  ?>" class="form-control <?php if($last_used[$sk]!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
				<div class="col-md-3 pt_10">	<button class="delete" onclick="skill_remove(<?php echo $sk;?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> </div>
            </div>
            <?php
              
             }
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
            <input type="hidden" name="workex_remove_ids" id="workex_remove_ids" value="">
                        </div>
            </div>
                     <?php
                    $select_work=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
				while($fetch_work=mysql_fetch_array($select_work))
				{ $idwk= $fetch_work['id'];
                  ?>
                  <div class="row <?php echo $idwk; ?>" id="workex<?php echo $idwk; ?>">
		  
                            <div class="col-md-12 unit">
                               <hr />
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[<?php echo $idwk; ?>]" value="<?php echo $fetch_work['job_title']; ?>" class="form-control job_title <?php if($fetch_work['job_title']!=''){echo 'edited'; } ?> " >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[<?php echo $idwk; ?>]" value="<?php echo $fetch_work['comapnay']; ?>" class="form-control comapnay <?php if($fetch_work['comapnay']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[<?php echo $idwk; ?>]" value="<?php echo $fetch_work['start_date']; ?>" class="form-control demo-1 start_date <?php if($fetch_work['start_date']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[<?php echo $idwk; ?>]" value="<?php echo $fetch_work['end_date']; ?>" class="form-control demo-1 end_date <?php if($fetch_work['end_date']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current" <?php echo ($fetch_work['current']!='' )?'checked':'';  ?>  value="<?php echo $current_date; ?>" id="currentEmploymentNew" class="ng-pristine ng-valid current">   Current 
                                </div>
                            </div>
							 <div class="col-md-3 unit pt_10"> <button class="delete" onclick="collect_remove_ids(<?php echo $idwk; ?>,'workex')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></div>
         </div>
                  
                  <?php
                 $jbnfj = 0;
                }
               
                     for($wrk=0;$wrk<count($job_title);$wrk++)
                  {  
                     if($job_title[$wrk]!='')
             
                     {
                     ?>
         <div class="row <?php echo $wrk; ?>" id="work<?php echo $wrk; ?>">
		  
                            <div class="col-md-12 unit">
                               <hr />
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[<?php echo $wrk; ?>]" value="<?php echo $job_title[$wrk]; ?>" class="form-control job_title <?php if($job_title[$wrk]!=''){echo 'edited'; } ?> " >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[<?php echo $wrk; ?>]" value="<?php echo $comapnay[$wrk]; ?>" class="form-control comapnay <?php if($comapnay[$wrk]!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[<?php echo $wrk; ?>]" value="<?php echo $start_date[$wrk]; ?>" class="form-control demo-1 start_date <?php if($start_date[$wrk]!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[<?php echo $wrk; ?>]" value="<?php echo $end_date[$wrk]; ?>" <?php echo ($end_date[$wrk]=='' )?'disabled':'';  ?> class="form-control demo-1 end_date <?php if($end_date[$wrk]!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[<?php echo $wrk; ?>]" <?php echo ($current[$wrk]!='' )?'checked':'';  ?>   value="<?php echo $current_date; ?>" class="ng-pristine ng-valid current">   Current 
                                </div>
                            </div>
							 <div class="col-md-3 unit pt_10"><button class="delete" onclick="work_experience_remove(<?php echo $wrk; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></div>
         </div>
        
         <?php    $jbnfj =  ++$wrk;
                     }
             
             }
           
         ?>
         <div class="row work_experience <?php echo $jbnfj; ?>">
		
                            <div class="col-md-12 unit">
                              <hr />   
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[<? echo $jbnfj; ?>]" value="" class="form-control job_title" >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[<? echo $jbnfj; ?>]" value="" class="form-control comapnay" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[<? echo $jbnfj; ?>]" value="" class="form-control demo-1 start_date" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[<? echo $jbnfj; ?>]" value="" class="form-control demo-1 end_date" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[<? echo $jbnfj; ?>]"   value="<?php echo $current_date; ?>"  class="ng-pristine ng-valid current ksjfkdjk">   Current 
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
              <input type="hidden" name="educate_remove_ids" id="educate_remove_ids" value="">
                        </div>
            </div>
            <?php

			$select_education=mysql_query("select * from sedna_education where reg_id='$reg_id'");
				while($fetch_education=mysql_fetch_array($select_education))
				{
                  $idedu= $fetch_education['id'];
                  ?>
        <div class="row " id="educate<?php echo $idedu;?>">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[<?php echo $idedu;?>]">
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
                                    <input type="text" name="institution[<?php echo $idedu;?>]" value="<?php echo $fetch_education['institution']; ?>" class="form-control <?php if($fetch_education['institution']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[<?php echo $idedu;?>]" value="<?php echo $fetch_education['city']; ?>" class="form-control <?php if($fetch_education['city']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[<?php echo $idedu;?>]" value="<?php echo $fetch_education['country']; ?>" class="form-control <?php if($fetch_education['country']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[<?php echo $idedu;?>]"  value="<?php echo $fetch_education['year']; ?>" class="form-control <?php if($fetch_education['year']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
                              
                              
							  <div class="col-md-2 unit pt_10"> <button class="delete" onclick="collect_remove_ids(<?php echo $idedu;?>,'educate')"><i aria-hidden="true" class="fa fa-trash-o"></i> Delete</button></div>
                              
            </div>
        
        
        
        <?php
                }
                     	for($edu=0;$edu<count($education_type12);$edu++)
			
                     {
                      if($education_type12[$edu]!='')
                      {
				//echo "sfs".	print_r($edu_country[$edu]);		  
                   
			?>
			<div class="row " id="edu<?php echo $edu;?>">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[]">
                                                <option >...</option>
                                                <?php
                                                $education_master=mysql_query("select * from sedna_education_master");
                                                while($fetch_education_master=mysql_fetch_array($education_master))
                                                {
                                                ?>
                                                <option value="<?php echo $fetch_education_master['id']; ?>" <?php echo  ($fetch_education_master['id']==$education_type12[$edu])?'selected':''; ?>><?php echo $fetch_education_master['education_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="institution[]" value="<?php echo $institution[$edu]; ?>" class="form-control <?php if($institution[$edu]!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[]" value="<?php echo $edu_city[$edu]; ?>" class="form-control <?php if($edu_city[$edu]!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[]" value="<?php echo $edu_country[$edu]; ?>" class="form-control <?php if($edu_country[$edu]!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[]" value="<?php echo $edu_year[$edu]; ?>" class="form-control <?php if($edu_year[$edu]!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
                              
							  <div class="col-md-2 unit pt_10"> <button class="delete" onclick="delete_education(<?php echo $edu;?>)"><i aria-hidden="true" class="fa fa-trash-o"></i> Delete</button></div>
                              
            </div>
			<?php }
            
                     }?>
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
	$.ajax({
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