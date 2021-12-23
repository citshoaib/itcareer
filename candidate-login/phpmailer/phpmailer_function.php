<?php
require_once('phpmailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
        // SMTP account password

       
function send_email($source_file,$name,$to_email){
   
$mail  = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug = 1; //
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl"; // enable SMTP authentication
$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "shashmi.cit@gmail.com"; // SMTP account username
$mail->Password   = "shoaib@7728";

//$file_content= file_get_contents('email_format_files/registration_confirmation_user.txt');
//$explode_contet=explode("#",$file_content);
//$subject=$explode_contet[0];
$body="aaaa";//$explode_contet[1];



$mail->SetFrom('shashmi.cit@gmail.com', 'Shoaib Hashmi');

$mail->AddReplyTo("shashmi.cit@gmail.com","Shoaib Hashmi");

$mail->Subject    = $subject;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$signature="Thanks and Regrds";
 
$mail->MsgHTML($body."<br>".$signature);

$address = "s.hashmi1989@gmail.com";
$mail->AddAddress($address, "John Doe");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
}









?>
    