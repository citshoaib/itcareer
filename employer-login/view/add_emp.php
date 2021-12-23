  <script>
  $(function() {
    $( "#joining_date" ).datepicker();
  });
  </script>
 <?php
// continue the session
session_start();
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
?>
<script language="javascript" type="text/javascript">
function randomString() {
	var chars = "0123456789";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	document.randform.randomfield.value = randomstring;
}
</script>
<script>
  $( document ).ready(function() {
   $("#operator").hide();
});
	
  function drop_down(value) {
	if (value=='operator') {
    $("#operator").show();
    }
	else
	{
	  $("#operator").hide();
	  
	}
   //alert(value);
  }
  
</script>


<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">ADD Employee</h3>
           <a href=""></a>
           
			<form action="model/add_emp_model.php" method="post" name="randform" id="theform">
                        <table width="50%" cellpadding="10" class="table table-striped" >
                            <tr>
							  <td>Name:</td>
							  <td><input type="text" name="name" id="name" pattern="[a-zA-Z]+" title='Name' required></td>
							</tr>
							
							<tr>
							  <td>Contact No.:</td>
							  <td><input type="tel" name="contact" id="contact" pattern='[0-9]{10,10}' title='Phone Numbers only 10 Degit ' required></td>
							</tr>
							<tr>
							  <td>Email:</td>
							  <td><input type="email" name="email"  id="email" required="email"></td>
							</tr>
							<tr>
							  <td>Address:</td>
							  <td><input type="text" name="address" id="address" required></td>
							</tr>
                            <tr>
							  <td>Department:</td>
							  <td>
								<select name="department" onchange="drop_down(this.value)">
								  <option value="">Select Type ...</option>
								  <option value="TL">Team Leader</option>
								  <option value="operator">Operator</option>
								  
								</select>
								<!--<input type="text" name="department" id="department" required>--></td>
							</tr>
							<tr id="operator">
							  <td>Team Leader:</td>
							  <td>
								<select name="TL_id" >
								  <option value="">Select TL ...</option>
								  <?php $select_tl=mysql_query("SELECT * FROM `sedna_user_registration_tbl` WHERE department='TL'");
								  while($fetch_TL=mysql_fetch_array($select_tl))
								  {
								  ?>
								  <option value="<?php echo $fetch_TL['id']; ?>"><?php echo $fetch_TL['name']; ?></option>
								 <?php
								  }
								 ?>
								  
								</select>
								<!--<input type="text" name="department" id="department" required>--></td>
							</tr>
                            <tr>
							  <td>Joining_date:</td>
							  <td><input type="text" name="joining_date" id="joining_date" required ></td>
							</tr>
							<tr>
							  <td>User password:</td>
							  <td>
                                   <input type="text" name="randomfield" value="" id="randomfield" pattern='[0-9]{8,8}' required>&nbsp;&nbsp;
							       <input type="button" value="Generate ID" onClick="randomString();">&nbsp;
							  </td>
							    
							</tr>
							<tr>
							  <td></td>
							  <td><input name="submit" type="submit" class="btn btn-wuxia btn-large btn-primary" value="Save"</td>
							</tr>
                        </table>
					
                    </form>
                        
				
										
							      
                        
                        
                        
                        
            
            </div>


</div></div>



    <div class="container">
    </div>
            

