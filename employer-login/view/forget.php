
<style>
	.error1 {
    color: red;
}
.shift_imag{
    padding-left:50px;
}
.form-module h2{
    color:#0C481A;
}
input[type="submit"]{
   background: #0C481A; 
    }
 .form-module {
   border-top: 5px solid #0C481A;
   
}
.form-module input {
outline: none;
display: block;
width: 100%;
border: 1px solid #d9d9d9;
margin: 0 0 20px;
padding: 10px 15px;
box-sizing: border-box;
font-wieght: 400;
-webkit-transition: 0.3s ease;
transition: 0.3s ease;
font-size: 14px;
}

.txt-center a {
color: #007bff;
}
.txt-center a:hover {
text-decoration: underline;
}
</style>
<div class="row" style="background:#E4F5DD;">
    <br><br>
    <div class="col-md-12">
    
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        <div class="col-md-12 text-center text_img_as header shift_imag">
                <img src="template/images/logo-itCareer.fw__300.png" class="img-responsive">
         </div>
        </div>
        <div class="col-md-4">
        </div>
    
    </div><br>
    
<div class="module form-module ">
<div class="form">
    <h2>FORGOT MY PASSWORD</h2>
<form method="POST" id="passwordform" action="model/forgotpass.php">

	<div class="alert info rounded">
		<i class="fa fa-info-circle"></i> Enter Your Registered Email  <?php echo GetMessage(); ?>
	</div> <br /><br />
	<div><input type="email" name="email" required placeholder="Email" class="balloon " ><label for="name"><i class="fa fa-lock"></i></label>
	</div>

	<input type="submit" name="submit" value="Submit" />

	<p class="txt-center" style="margin-top: 20px;">Remembered your password ? <a href="?page=login">Go Back</a></p>
</form>
</div>
</div>

	


</div>