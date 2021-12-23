	  <?php
	  @session_start();
	  $reg_date =strtotime(date("d-m-Y"));
	  $operator_id= $_SESSION['employer_id'];
	  ?>
	  
	  
	  
	  <script type="text/javascript">
	  //$('#addedRows').hide(); 
	  
	  var rowCount = 0;
	  var jdsjd;
	  jQuery( document ).ready(function() {
	  
	  jdsjd =  jQuery('.experience_row').html();
	  });
	  
	  function experience(frm) {
	  //$('#addedRows').show();
	  //alert(rowCount);
	  rowCount ++;
	  //alert(".row experience_row"+rowCount);
	  var recRow = '<div class="row experience_row'+rowCount+'" >'+jdsjd+'<div class="col-md-3 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRow('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';
	  
	  
	  jQuery('.experience_row_test').before(recRow);
	  
	  var ss=$('.experience_row'+rowCount).find('.job_title').attr('name','job_title['+rowCount+']');
	  var ss=$('.experience_row'+rowCount).find('.comapnay').attr('name','comapnay['+rowCount+']');
	  var ss=$('.experience_row'+rowCount).find('.start_date').attr('name','start_date['+rowCount+']');
	  var ss=$('.experience_row'+rowCount).find('.end_date').attr('name','end_date['+rowCount+']');
	  var ss=$('.experience_row'+rowCount).find('.current').attr('name','current['+rowCount+']');
	  
	  //alert(ss);
	  $('.demo-1').monthpicker();
	  
	  
	  
	  
	  $(".current").click(function() {
	  
	  $(".current").each(function(){
	  $('.current').prop('checked', false);   
	  $(".end_date").removeAttr("disabled");
	  });
	  
	  $(this).prop('checked', true);  
	  var a1223= $(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
	  var a12234= $(this).parent().parent().prev().find('input').val('');
	  
	  
	  });
	  
	  
	  
	  
	  $(".demo-1").click(function() {     
	  
	  $(this).addClass("edited");
	  //alert(a1223);
	  });
	  //$(".row experience_row"+rowCount).children("input").removeAttr("disabled");
	  
	  
	  
	  
	  
	  }
	  
	  
	  
	  function removeRow(removeNum) {
	  
	  
	  jQuery('.experience_row'+removeNum).remove();
	  
	  }
	  </script>
	  
	  
	  <script type="text/javascript">
	  //$('#addedRows').hide(); 
	  
	  var rowCount = 0;
	  function Skills(frm) {
	  //$('#addedRows').show();
	  rowCount ++;
	  var recRow = '<div class="row Skills_row'+rowCount+'" >'+jQuery('.Skills_row').html()+'<div class="col-md-3 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRowSkills('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';
	  
	  jQuery('.Skills_row_test').before(recRow);
	  
	  }
	  
	  function removeRowSkills(removeNum) {
	   
	  jQuery('.Skills_row'+removeNum).remove();
	  
	  }
	  </script>
	  <script>
	  function AjaxGetState(country_id,select_state) {
	  //alert(select_state);
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
	  
	  <!--<script>
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
	  
	  
	  </script>-->
	  
	  
	  
	  
	  <?php
	  if(isset($_REQUEST['submit']))
	  {
	  
	  // print_r($_POST);
	  $email=$_POST['email'];
      $check_resume_data= mysql_real_escape_string($_POST['resume_data']);
	  $date_for_upload_name=strtotime(date("Y/m/d H:i:s"));
	  
	  $select_1=mysql_query("select * from sedna_operator_request_consultants_reg where email='$email'");
	  
	  if($num=mysql_num_rows($select_1)>0)
	  {
	  $fetch1=mysql_fetch_array($select_1);
	  $reg_id=$fetch1['id'];
	  $location="?page=create&id=$reg_id";
	  redirect($location);
	  
	  }
	  else{
        $random_id= rand();
     // echo   $file_name_upload=$_FILES["cv"]["name"];
      //$real_upload_name_move12="fileUpload/".$file_name_upload;
	  $ext=explode(".",$_FILES["cv"]["name"]);
	  $handle =$_FILES["cv"]["tmp_name"];
	  $real_upload_name_move="../upload_doc/".$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
	  $real_upload_name=$random_id.'__'.$date_for_upload_name.'.'.$ext[1];
   //   move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move12);
	  move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
       
	  $inputFileName = $real_upload_name;
      
      // docx code
      if($check_resume_data==1)
      {
      
      if($ext[1]=='docx')
      {
        function read_file_docx($filename){

$striped_content = '';
$content = '';

if(!$filename || !file_exists($filename)) return false;

$zip = zip_open($filename);

if (!$zip || is_numeric($zip)) return false;

while ($zip_entry = zip_read($zip)) {

if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

if (zip_entry_name($zip_entry) != "word/document.xml") continue;

$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

zip_entry_close($zip_entry);
}// end while

zip_close($zip);

//echo $content;
//echo "";
//file_put_contents('1.xml', $content);

$content = str_replace('', " ", $content);
$content = str_replace('', "\r\n", $content);
$striped_content = strip_tags($content);

return $striped_content;
}

$filename ="../upload_doc/".$inputFileName; //Add file with folder

$content = read_file_docx($filename);
if($content !== false) {

//echo nl2br($content);
 $resume_data=mysql_real_escape_string($content);

}
else {
echo 'Couldn\'t the file. Please check that file.';
}
  
      }
      
       //doc code 
    if($ext[1]=='doc')
    {
    
 $filename ="../upload_doc/".$inputFileName;
if ( file_exists($filename) ) {

if ( ($fh = fopen($filename, 'r')) !== false ) {

$headers = fread($fh, 0xA00);

# 1 = (ord(n)*1) ; Document has from 0 to 255 characters
$n1 = ( ord($headers[0x21C]) - 1 );

# 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

# 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

# (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

# Total length of text in the document
$textLength = ($n1 + $n2 + $n3 + $n4);

$extracted_plaintext = fread($fh, $textLength);

# if you want the plain text with no formatting, do this
//echo 
 $resume_data=mysql_real_escape_string($extracted_plaintext);
# if you want to see your paragraphs in a web page, do this
// nl2br($extracted_plaintext);

}

}    
        
    }
    
      }
      else
      {
        $resume_data=html_entity_decode(strip_tags($check_resume_data));
      }
      
	  mysql_query("insert into sedna_operator_request_consultants_reg (operator_id,email,cv,date,status) values('$operator_id','$email','$real_upload_name','$date_for_upload_name','1')") or die(mysql_error());
	  $last_id=mysql_insert_id();
      
      
       mysql_query("insert into sedna_resume(consultant_id,resume_data,date) values('$last_id','$resume_data','$date_for_upload_name')")or die(mysql_error());
      
      
	  //$_SESSION['id12']=mysql_insert_id();							
	  //echo "sds". $last_id =$_SESSION['id12'];
	  //echo "select * from sebna_registration where id='$last_id'";
	  $select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$last_id'");
	  $fetch=mysql_fetch_array($select);
	  $reg_id=$fetch['id'];
	  $first_name=$fetch['first_name'];
	  $last_name=$fetch['last_name'];
	  $email=$fetch['email'];
	  $cv_name=$fetch['cv'];
	  
	  }
	  
	  }
	  else
	  {
	  $reg_id=$_REQUEST['id'];
	  }
	  
	  
	  ?>
	  
	  
	  <div class="container">
	  <div class="row">
	  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw ">
	  
	  <form action="model/create_model1.php" method="post">
	  <div class="row">
	  
	  <div class="col-md-12 ">
	  <div class="heading">Name & Location</div>
	  </div></div>
	  <div class="row">
	  <div class="col-md-4 unit">
	  
	  <div class="input">
	  <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>">
	  <input type="hidden" name="operator_id" value="<?php echo $operator_id; ?>">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text"  value="<?php echo ucfirst($first_name); ?>" required class="alphaonly form-control <?php if($first_name!=''){echo 'edited'; } ?>" name="first_name">   <label for="form_control_1">First Name</label>
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-md-4 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text"  value="<?php echo ucfirst($middel_name); ?>" class="alphaonly form-control <?php if($middel_name!=''){echo 'edited'; } ?>" name="middel_name">   <label for="form_control_1">Middel Name</label>
	  </div>
	  </div>
	  </div>
	  
	  
	  <div class="col-md-4 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text" required value="<?php echo ucfirst($last_name); ?>" class="alphaonly form-control <?php if($last_name!=''){echo 'edited'; } ?>" name="last_name">
	  <input type="hidden" name="email" value="<?php echo $email; ?>">
	  <label for="form_control_1">Last Name</label>
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-md-12 unit" >
	  
	  <div class="input"  id="country">
	  <select name="country"   onchange="AjaxGetState(this.value)" required class="form-control">
	  <option value="" >Country name</option>
	  <?php
	  //country_master
	  $country=mysql_query("select * from  country_master order by country_name ASC");
	  while($fetch_country=mysql_fetch_array($country))                
	  {
	  ?>
	  <option value="<?php echo $fetch_country['country_code']; ?>"><?php echo $fetch_country['country_name']; ?></option>
	  <?php } ?>
	  </select>
	  </div>
	  </div>    
	  <div class="col-md-12 unit">
	  
	  <div class="input" id="state">
	  <select name="state"    class="form-control">
	  <option value="">State name</option>
	  
	  </select>
	  </div>
	  </div>
	  
	  
	  <div class="col-md-8 unit">
	  
	  <!--<div class="input" id="city">
	  <select name="city"   class="form-control">
	  <option value="">city name</option>
	  
	  </select>
	  </div>-->
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text" id="city" required value=""  class="form-control alphaonly" name="city" ><!--onblur="city_name(this.value)"-->
	  <label for="form_control_1">City</label>
	  </div>
	  </div>
	  </div>
	  
	  
	  <div class="col-md-4 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text" id="postal_code" required  class="form-control"  onkeypress="return isNumber(event);" name="postal_code" onblur="zip_id(this.value)">
	  <label for="form_control_1">Zip Code</label>
	  </div>
	  </div>
	  </div>
	  
	  
	  
	  
	  </div>
	  
	  
	  <hr>
	  <div class="row">
	  
	  <div class="col-md-12 ">
	  <div class="heading">Employment Details</div>
	  </div></div>
	  
	  <div class="row">
	  
	  <div class="col-md-12 ">
	  <div class="input">
	  <select multiple name="employment_type[]" class="form-control">
	  <?php $employment_type=mysql_query("select * from sebna_employment_type");
	  while($fetch_employment_type=mysql_fetch_array($employment_type))                
	  {
	  ?>
	  <option value="<?php echo $fetch_employment_type['id']; ?>"><?php echo $fetch_employment_type['employment_type']; ?></option>
	  <?php } ?>
	  </select></div>
	  
	  
	  </div>
	  
	  <div class="col-md-12 "><div class="input">
	  <select  name="work_authorization" class="form-control" id="work_authorization_id">
	  <option value="">Select Work Authorization </option>
	  <?php $work_authorization=mysql_query("select * from sebna_work_authorization");
	  while($fetch_work_authorization=mysql_fetch_array($work_authorization))                
	  {
	  ?>
	  <option value="<?php echo $fetch_work_authorization['id']; ?>"><?php echo $fetch_work_authorization['work_authorization']; ?></option>
	  <?php } ?>
	  </select></div>
	  
	  
	  </div>
	  
	  
	  
	  <div class="col-md-12 " id="work_authorization_id_12">
	  <div class="heading"> Enter Employer Details </div>
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text"   value="<?php echo ucfirst($employer_name); ?>"  class="alphaonly form-control <?php if($employer_name!=''){echo 'edited'; } ?> re_remove" name="employer_name">
	  <label for="form_control_1">Name</label>
	  </div>
	  
	  </div>
	  
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text"  value="<?php echo ucfirst($employer_company); ?>"  class="alphaonly form-control <?php if($employer_company!=''){echo 'edited'; } ?> re_remove" name="employer_company">
	  <label for="form_control_1">Company</label>
	  </div>
	  
	  </div>
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="email"  value="<?php echo ucfirst($employert_email); ?>"  class="form-control <?php if($employert_email!=''){echo 'edited'; } ?> re_remove" name="employer_email">
	  <label for="form_control_1">Email</label>
	  </div>
	  
	  </div>
	  
	  
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text" id="number"   class="form-control <?php if($employert_number!=''){echo 'edited'; } ?> re_remove" value="<?php echo $employert_number; ?> "  onkeypress="return isNumber(event);" name="employer_number">
	  <label for="form_control_1">Number</label>
	  </div>
	  
	  </div>
	  
	  
	  
	  
	  <script>
	  $( document ).ready(function() {
	  $("#work_authorization_id_12").hide();
     
	  });
	  $('#work_authorization_id').on('change', function() {
	  if(this.value ==3)
	  {
	  
      
	  $("#work_authorization_id_12").show();
      $(".re_remove").attr("required", true);
	  
	  }
	  else
	  {
	  
	  $("#work_authorization_id_12").hide();
       $(".re_remove").removeAttr('required');
      
	  }
	  });
	  </script>
	  
	  </div>
	  </div>
	  <hr>
	  
	  <div class="row">
	  
	  <div class="col-md-12 ">
	  <div class="heading">Work Experience </div>
	  </div></div>
	  
	  <div class="row experience_row">
	  <hr>
	  <div class="col-md-12 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control job_title" name="job_title[]">
	  <label for="form_control_1">Job Title</label>
	  </div>
	  </div>
	  </div>
	  
	  
	  <div class="col-md-12 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control comapnay" name="comapnay[]">
	  <label for="form_control_1">Company</label>
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-md-3 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  
	  <input type="text" id=""  class="form-control demo-1 start_date" name="start_date[]">
	  <label for="form_control_1">Start Date</label>
	  
	  </div>
	  </div>
	  </div>
	  <div class="col-md-3 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control demo-1 end_date" value="" name="end_date[]">
	  <label for="form_control_1">End Date</label>
	  </div>
	  </div>
	  </div>
	  <div class="col-md-3 unit ">
	  
	  <div class="input pt_10">
	  <input type="radio" class="ng-pristine ng-valid current"   value="<?php echo $reg_date; ?>"  name="current[]">   Current 
	  </div>
	  </div>
	  
	  </div>
	  
	  <div class="row experience_row_test">		
	  
	  <div class="col-md-12 ">
	  <span class="btn btn-default btn-lg has-feedback" onClick="experience(this.form);">Add Work Experience</span>
	  <!--<a href="#" > </a>-->
	  </div>
	  
	  
	  </div>
	  <hr>
	  <div class="row">
	  
	  <div class="col-md-12 ">
	  <div class="heading">Skills </div>
	  </div></div>
	  
	  <div class="row Skills_row">
	  <div class="col-md-3 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control" name="skill_name[]">
	  <label for="form_control_1">Skill</label>
	  </div>
	  </div>
	  </div>
	  <div class="col-md-3 unit">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control" name="year_exp[]">
	  <label for="form_control_1">Yrs Exp</label>
	  </div>
	  </div>
	  </div>
	  <div class="col-md-3 unit ">
	  
	  <div class="input">
	  <div class="form-group form-md-line-input form-md-floating-label has-success">
	  <input type="text"  class="form-control" name="last_used[]">
	  <label for="form_control_1">Last Used</label>
	  </div>
	  
	  </div>
	  </div>
	  
	  
	  
	  </div>
	  
	  <div class="row Skills_row_test">
	  <div class="col-md-12 ">
	  <span class="btn btn-default btn-lg has-feedback" onClick="Skills(this.form);">Add More</span>
	  <!--<a href="#" > </a>-->
	  </div>
			   </div>
			   <br />
		<div class="row">        <div class="col-md-12 unit">
	  <input data-automation-id="sign-in-button" class="btn btn-primary btn-lg" name="submit" type="submit" value="Save your profile">
	  </div></div>
	  
	  </form>                 
	  
	  
	  </div></div>
	  </div>
	  
	  <!--<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
	  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
	  <script src="template/js/jquery.mtz.monthpicker.js"></script>
	  <script>
	  $('.demo-1').monthpicker();
	  
	  </script>
	  
	  <script>
	  $(function(){
	  $(".current").click(function() {
	  //  alert("dggd");
	  // alert($("input[name=current]:checked").val());
	  
	  var a1223= $(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
	  //alert(a1223);
	  });
	  });
	  
	  
	  
	  $(function(){
	  $(".demo-1").click(function() {     
	  
	  $(this).addClass("edited");
	  //alert(a1223);
	  });
	  });
	  
	  
	  //	function zip_id(id)
	  //{
	  //	if(id!==''){
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
	  //
	  //}
	  //	}
	  
	  
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
	  
	  
	  
	  
	  
	  
	  
	  //function city_name(name)
	  //{
	  //if(name!==''){
	  ////alert(name);
	  //jQuery.ajax({
	  //url : "view/ajax/get_country_state_city_2.php",
	  //type:"POST",
	  //data: "name="+name,
	  //success:function(data)
	  //{
	  //var res = data.split("||#"); 
	  ////alert(data);
	  //
	  //
	  //$("#postal_code").val(res['0']);
	  //$('#postal_code').addClass("edited");
	  //
	  //$("#country").html(res['1']);
	  ////$('#country').addClass("edited");
	  //
	  //$("#state").html(res['2']);
	  ////$('.state').addClass("edited");
	  //}
	  //});
	  //
	  //}
	  //}
	  
	  
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

