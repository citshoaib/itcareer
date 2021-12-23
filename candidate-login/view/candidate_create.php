<?php
if(isset($_SESSION["candidate_email"])){
header('location:?page=dashboard');
}
?>
<script type="text/javascript">
$(document).ready(function() {
	
$("#login_frm").validate();


});
</script>
<style>
    .box{
        display: none;
    }
   /* .container {
    width: 1311px;
    background:#E4F5DD;
}*/
input[type="submit"]{
    background: #0C481A;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<?php

@session_start();
 $current_date =strtotime(date("d-m-Y"));
$reg_id= $_REQUEST['id'];
  $select= $conn->query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
$fetch=$select->fetch_array();
 
 $email=$fetch['emp_emails'];
 $cv_name=$fetch['cv'];
 
 $select1= $conn->query("select * from sebna_profile_tbl where reg_id='$reg_id'");
 $fetch2=$select1->fetch_array();
  $first_name=$fetch2['first_name'];
		$middel_name = $fetch2['middel_name'];
 $last_name=$fetch2['last_name'];
 $city=$fetch2['city'];
  $Country1=$fetch2['country'];
   $state=$fetch2['state'];
   $employment_type=explode(",",$fetch2['employment_type']);
  $work_authorization1=$fetch2['work_authorization'];
  $phone=$fetch2['contact'];
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
       $language=explode(",",$fetch2['language_know']);
       $profile_image=$fetch2['profile_image'];
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
jQuery( document ).ready(function() {

//
//var ss212=$('.work_experience_test').prev().attr("class");
////alert(ss212[2]);
//str=ss212.split(" ");
//
//rowCount = str[2];

   jdsjd =  jQuery('.work_experience').html();

   
});

function work_experience(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;

var recRow = '<div class="row work_experience'+rowCount+'" >'+jdsjd+'<div class="col-md-3 pt_10"><a href="javascript:void(0);" class="remove" onclick="removeRowwork_experience('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.work_experience_test').before(recRow);

//var ss=jQuery('.work_experience'+rowCount).find('.job_title').attr('name','job_title['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.comapnay').attr('name','comapnay['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.start_date').attr('name','start_date['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.end_date').attr('name','end_date['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.current').attr('name','current['+rowCount+']');


$('.demo-1').monthpicker();

jQuery(".current").click(function() {
   
   jQuery(".current").each(function(){
         jQuery('.current').prop('checked', false);   
     jQuery(".end_date").prop("disabled", false);
      });
     
  jQuery(this).prop('checked', true);  
  var a1223= jQuery(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= jQuery(this).parent().parent().prev().find('input').val('');
    
    
   
   
   

    });
  
jQuery(".demo-1").click(function() {     
       
	   	 jQuery(this).addClass("edited");
	   //alert(a1223);
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
                $("."+del_id).hide();
            //window.location.reload(); 
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
           
           $("."+skills_id).hide();
            //window.location.reload(); 
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
              $("."+work_experience_id).hide();
            //window.location.reload(); 
                          }
           
              
                 
            }) ;
  
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




       <div class="container content mtb">
       <div class="row">
           
                <div class="col-md-12 text-center text_img_as header">
              <center>  <img src="template/images/logo-itCareer.fw__300.png" class="img-responsive"></center>
               
                </div>

      
        <div class="col-lg-12">
             <div class="col-md-2 unit">
            </div>
              <div class="col-md-6 unit">
<br><br>
            <h3 style="text-align:left;"class="block-head">Register</h3><br>
            </div>
            <div class="col-md-2 unit">
            </div>
          
            <div class="col-md-2 unit">
            </div>
        </div>
                 <br>       <hr><br>
        
        <div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form action="model/candidate_create_model.php" id="theform" method="post" enctype="multipart/form-data">

            <div class="row">
                 <div class="col-md-2 unit">
                                
                            </div>
                            <div class="col-md-4 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="first_name" required value="" class="alphaonly form-control <?php if($first_name!=''){echo 'edited'; } ?>">
                                    <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>" class="form-control" >
                                    <label for="form_control_1">First Name</label>
                                    </div>
                                </div>
                            </div>
																												
										
																												
                            <div class="col-md-4 unit">
                             
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_name" value="" class="alphaonly form-control <?php if($last_name!=''){echo 'edited'; } ?>" required>
                                    
                                      <label for="form_control_1">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            
                            
                 <div class="col-md-2 unit">
                                
                            </div>
                            <div class="col-md-4 unit">
                                
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="emp_emails" value="" class="form-control <?php if($email!=''){echo 'edited'; } ?>" required>
                                    <label for="form_control_1">Email</label>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 unit">
                     
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="mob_number" value="" onkeypress="return isNumber(event);" class="form-control <?php if($phone!=''){echo 'edited'; } ?>" required >
                                     <label for="form_control_1">Phone No.</label>
                                     
                                    </div>
                                </div>
                            </div>
                            
                 
                 <div class="col-md-2 unit">
                </div>
                      
                            
                        </div>
                        
              
                 <hr>
                  <div class="row">
                         <div class="col-md-2 unit">
                         </div>
                            <div class="col-md-4 unit">
                             <div class="input" id="country">
                                
                                     <select class="form-control" required onchange="AjaxGetState(this.value)" name="country" >
                                                <option  value="">Country...</option>
                   <?php
                  $country=  $conn->query("select * from  country_master order by country_name ASC");
                   while($fetch_country=$country->fetch_array())
                   {
         
                   ?>
                                                <option value="<?php echo $fetch_country['country_code']; ?>" <?php echo ($fetch_country['country_code']==$Country1)? 'selected' : '';  ?>><?php echo $fetch_country['country_name']; ?></option>
                      <?php } ?>
                                            </select>
                                    
                                     
                                
                            </div>
                            </div>


                            <div class="col-md-4 unit">
                               <div class="input" id="state">
                                 <select name="state" class="form-control" required>
                <option value="">State name</option>
                <?php
                 $state_setect=  $conn->query("select *  FROM state_master where StateID='".$state."' ");
                   while($fetch_state=$state_setect->fetch_array())
                   {
                ?>
                <option value="<?php echo  $fetch_state['StateID']?>" <?php echo ($fetch_state['StateID']==$state)? 'selected' : '';  ?>><?php echo  $fetch_state['state_name']?></option>
                
                <?php
                   }
                ?>
              
            </select>       </div>    
                               
                            </div>
                             <div class="col-md-2 unit">
                         </div>
                    </div>             
                        
                        
                 <hr>
                  <div class="row">
                         <div class="col-md-2 unit">
                         </div>
                            <div class="col-md-4 unit">
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="city" id="city"  value="" class="alphaonly form-control <?php if($city!=''){echo 'edited'; } ?>"required>
                                     <label for="form_control_1">City</label>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-md-4 unit">
                                 <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text"  name="postal_code" id="postal_code" onkeypress="return isNumber(event);" onblur="zip_id(this.value)" value="" class="form-control <?php if($postal_code!=''){echo 'edited'; } ?>" required >
                                    <label for="form_control_1">Zipcode</label>
                                    </div>
                                </div>
                             </div>
                             <div class="col-md-2 unit">
                         </div>
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
                                
                                
                             
                 <hr>      
                                
                    <div class="row">
                         <div class="input col-md-2">
                         </div>
                         <div class="input col-md-8">
                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <textarea name="remark" class="form-control" placeholder="Address" spellcheck="false"></textarea>
                            </div>
                        </div>
                         <div class="input col-md-2">
                         </div>
                    </div>     
                 <hr>
                    
                       <div class="row">
                         <div class="input col-md-2">
                         </div>
                            <div class="input col-md-2">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <lable>Upload Resume</label>
                                   
                                 </div>
                            </div>
                         <div class="input col-md-8"> <input type="file" name="cv" id="cv" value="" class="" required>
                         </div>
                        </div>
                     <hr>     
                     <div class="row">
                         <div class="input col-md-2">
                         </div>
                         
     <div class="input col-md-2">
      
                        <label>
                          <input type="radio" name="colorRadio" value="red"> Aadhar Number
                      </label>
                      <br>
        </div>               
             
     <div class="input col-md-2">         
                        <label>
                          <input type="radio" name="colorRadio" value="green"> SSN Number
                      </label>
     
     </div>
                         
                         
                         <div class="input col-md-4">
                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                          
                                <div class="red box">
   <input type="text" name="aadhar_num" class="number form-control" onkeypress="return isNumber(event);" placeholder="Aadhar Number" minlength="12" maxlength="12">
  </div>
    <div class="green box">
      <input type="text" name="ssn_num" class="number form-control" placeholder="SSN Number" onkeypress="return isNumber(event);" minlength="9" maxlength="9">
  </div>
                            </div>
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
                                
                                
                                
                                
                                
                                
                             
                                  
                                
                                
                                
                                 
                                   
                                   
                             
                                  
                                   
                                   <!--</div>-->
                                  
                                  
                         
                                
                        <hr>
                   
              
                              
                        <br>
                        <div class="row"> 
                            <div class="col-md-2 unit">
                                </div>
                            <div class="col-md-3 unit">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg"  value="Save your profile" data-automation-id="sign-in-button" >
                              
                                <br><br>
                            </div>
                            <div class="col-md-2 unit">
                                  <a href="?page=login" class="btn btn-lg" style="text-decoration: underline;">Sign In</a>
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


jQuery(function(){
   
     jQuery(".current").click(function() {

	 //alert("adad");
    jQuery(".current").each(function(){
        jQuery('.current').prop('checked', false);   
      jQuery(".end_date").removeAttr("disabled");
      });
     
   jQuery(this).prop('checked', true);  
  var a1223= jQuery(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= jQuery(this).parent().parent().prev().find('input').val('');
    
     });
});


jQuery(".demo-1").click(function(){
       jQuery(".demo-1").addClass("edited");
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
    node.val(node.val().replace(/[^a-zA-Z\s]/g,'') ); }
);

</script>