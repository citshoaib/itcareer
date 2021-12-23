<?php 

include('phpmailer/class.phpmailer.php');
class callfunction{

 public function  to_send_mail_member($msg_member,$email)
 {
// include('phpmailer/class.phpmailer.php');
 	$from="info@miteshthacker.com";
	$mail_member = new PHPMailer();

	 $body=$msg_member;
	$mail_member->Subject ="Membership Expiry Notification";
	$mail_member->SetFrom($from, 'miteshthacker.com');
	$mail_member->AddReplyTo($from, 'miteshthacker.com');
	$mail_member->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail_member->MsgHTML($body);
	
$mail_member->AddAddress($email);
$mail_member->Send();
}
public function  to_send_mail_admin($msg_admin,$email)
 {

$from="info@miteshthacker.com";
$mail = new PHPMailer();

	 $body=$msg_admin;
	 $mail->Subject ="Membership Expiry Notification";
	$mail->SetFrom($from, 'miteshthacker.com');
	$mail->AddReplyTo($from, 'miteshthacker.com');
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->MsgHTML($body);
	 $email;
$mail->AddAddress($email);
$mail->Send();

}


}