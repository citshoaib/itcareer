<?php 


class callfunction{

 public function  to_send_mail($msg_member,$email)
 {
 include('phpmailer/class.phpmailer.php');
 	$from="info@miteshthacker.com";
	$mail_member = new PHPMailer();

	 $body=$msg_member;
	$mail_member->Subject ="Reset Password For MiteshThacker.com";
	$mail_member->SetFrom($from, 'MiteshThacker.com');
	$mail_member->AddReplyTo($from, 'MiteshThacker.com');
	$mail_member->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail_member->MsgHTML($body);
	
$mail_member->AddAddress($email);
$mail_member->Send();
	$location="../MMS/?page=login";
redirect($location);

}


}