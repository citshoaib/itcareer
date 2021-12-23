 <?php
// retrieve session data
if(!$_SESSION["candidate_email"]){
	  header('location:?page=login');
}
?>
<script>
    function check_email(email) {
       
        if (email!='') {
             //alert(email);
			 $.ajax({
            type: 'POST',      
           url: "view/ajax/check_email.php",
           data:"email="+email,
           async: true,
            success: function(data) {
             if (data!='') {
                
			  $("#email_exist").html(data);
			 
			    $("#submit").hide();	
                          }
						  else
						  {
				// $("#submit").show();
				$("#email_exist").html(data);
							  
						  }
			}
            }) ;
        }
        
        
    }
</script>
<div class="container">
<hr>
</div>

<div class="container content">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Add Consultant</h3>
<form id="theform" name="randform" method="post" action="?page=create" enctype="multipart/form-data">
                        <table width="50%" cellpadding="10" class="table table-striped">
                            <tbody>
							<tr>
							  <td>Email:</td>
							  <td>
							  <input type="email" required="email" id="email" name="email" onchange="check_email(this.value);">
							  <span id="email_exist" style="color: red;"></span>
							  </td>
							</tr>
							<tr>
							  <td>Upload CV:</td>
							  <td><input type="file" required="" title="file" accept=".doc, .docx,.csv"  id="cv" name="cv">
							  Only .doc, .docx  file
							  <div class="Preview"></div>
							  </td>
							</tr>
							<tr id="submit">
							  <td></td>
							  <td>
									
									<input type="submit"  value="Save" class="btn btn-active btn-custom btn-rounded waves-effect waves-light "  id="submit"  name="submit">
							</td></tr>
                        </tbody></table>
					
                    </form>

<script>
			$( document ).ready(function() {
    $('#submit').hide(); 
        });	  
				  
				  
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
			 $("#submit").show();
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
				  



</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
            </div>


</div></div>



    <div class="container">
    </div>
	
					
					

