<?php 
include('function.php');
$this_object = new callfunction();	

if(isset($_POST['enquery_submit']))
{  //11
	$msg="<table border=1 width='100%'>
	<tr><td colspan='2'><center><b>logisticswebsites.com</b><br>Date: ". date("d/m/Y")."<br>Online Survey on logisticswebsites.com</center></td></tr><tr><td>Name: </td><td>".$_POST['name']."".$_POST['lname']."</td></tr><tr><td> Company Name:  </td><td>".$_POST['company_name']."</td></tr><tr><td> Country: </td><td>".$_POST['country_name']."</td></tr><tr><td> Website: </td><td>".$_POST['url']."</td></tr>
	<tr><td>Email: </td><td>".$_POST['email']."</td></tr>
	<tr><td> Comment: </td><td>".$_POST['comment']."</td></tr>
	</table>" ;
$this_object->to_send_mail($msg,$email);
}//11


?>

888888888888888888888888888888888888888888888EnquiryForm88888888888888888888888888888888888888888888888888888888888888888888
<form class="cmxform" id="enquery_Form" method="post" action="">

<table width="100%">
		<tr>
		<td  width="35%"><label for="cname">Name <span style="color:#FF0000">*</span></label>
			</td>
		<td width="65%">
			<input id="cname" name="name" class="required" minlength="2" />
		<p>	</p></td>
		
		</tr>
		<tr>
		<td><label for="cemail">E-Mail <span style="color:#FF0000">*</span></label>
			
			</td>
				<td><input id="cemail" type="email" name="email" class="required" /><p></p></td>
		</tr>
		<tr>
		<td><label for="cname">Company / Business Name<span style="color:#FF0000">*</span></label>
			
			</td>
		<td><input id="company_name" name="company_name" class="required" minlength="2" />
		<p></p></td></tr>
		
				<tr>
		<td><label for="countryname">Country</label>
			
		</td>
		<td><input id="country_name" name="country_name" />
		<p></p></td></tr>
		
				<tr>
		<td><label for="curl">Website</label>
			
			</td>
		<td><input id="curl" type="url" name="url" />
		
		<p></p></td></tr>
		
				<tr>
		<td><label for="ccomment">Your question/Enquiry:</label>
			
			</td>
		<td><textarea id="ccomment" name="comment" class=""></textarea>
		<p></p></td></tr>
		
        
       
        
				<tr>
		<td colspan="2"><input class="submit" type="submit" name="enquery_submit" value="Submit"/>
		<p></p></td></tr>
		</table>

</form>
<h3>&nbsp;</h3>
</div>
</body>
</html><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1343313320952494",
    enable_page_level_ads: true
  });
</script>