<?php 
  include('phpmailer/class.phpmailer.php');

  
//error_reporting(0);
class callfunction{
	
public function SendMailToAdmin($to,$message,$subject)
{
  
 
	$from='contact@techsimba.in';
	$rep_to= 'contact@techsimba.in';
	//$cc_mail = array('shoaib.hashmi@cheshtainfotech.com');
	$mail_member = new PHPMailer();
	$mail_member->Subject =$subject;
	$mail_member->SetFrom($from, 'Techsimba Academy');
	$mail_member->AddReplyTo($rep_to, 'Techsimba Academy');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($message);
	$mail_member->AddAddress($to);
	//foreach($cc_mail as $cc ){
	//
	//$mail_member->AddCc($cc);
	//}
	//$mail_member->AddBcc($Bcc);
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}
}
	
public function SendMailToAdmin_new($to,$message,$subject)
{
  
 
	$from='contact@techsimba.in';
	$rep_to= 'contact@techsimba.in';
	//$cc_mail = array('shoaib.hashmi@cheshtainfotech.com');
	$mail_member = new PHPMailer();
	$mail_member->Subject =$subject;
	$mail_member->SetFrom($from, 'Techsimba Academy');
	$mail_member->AddReplyTo($rep_to, 'Techsimba Academy');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($message);
	$mail_member->AddAddress($to);
	//foreach($cc_mail as $cc ){
	//
	//$mail_member->AddCc($cc);
	//}
	//$mail_member->AddBcc($Bcc);
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}
}


public function SendMailToUser($to,$subject,$message)
{

   
    $from='contact@techsimba.in';
	$rep_to='contact@techsimba.in';
	$mail_member = new PHPMailer();
	$mail_member->Subject =$subject;
		$mail_member->SetFrom($from, 'Techsimba');
	$mail_member->AddReplyTo($rep_to, 'Techsimba');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($message);
	$mail_member->AddAddress($to);
	
	
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}
		
		




}

public function SendMailToAdminOrderDetails($email_admin,$subject_admin,$msg_1)
{
  
 $mail_member = new PHPMailer();

	$mail_member->Subject =$subject_admin;
	//$mail_member->SetFrom($from, 'Paramyoga');
	//$mail_member->AddReplyTo($rep_to, 'Paramyoga');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($msg_1);
	$mail_member->AddAddress($email_admin);
	//$mail_member->AddCc($cc);
	
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}
  
}



public function SendMailToUserOrderDetails($email,$subject,$msg)
{
	
	$from='kewal.sharma@cheshtainfotech.com'; //support@paramyoga.org
	$rep_to='kewal.sharma@cheshtainfotech.com'; //babaom@gmail.com
	 //$cc='';	//omanandji@gmail.com
	//$cc='cit.abhinav@gmail.com';
	$mail_member = new PHPMailer();

	$mail_member->Subject =$subject;
	$mail_member->SetFrom($from, 'Paramyoga');
	$mail_member->AddReplyTo($rep_to, 'Paramyoga');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($msg);
	$mail_member->AddAddress($email);
	//$mail_member->AddCc($cc);
	
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}	
	
}

public function SendMailToPaymentRegistration($to,$subject,$msg)
{

 
	
   $from='support@paramyoga.org';
	  $rep_to='babaom@gmail.com';
	  $cc='omanandji@gmail.com';	
	  //$cc='cit.abhinav@gmail.com';
	$mail_member = new PHPMailer();

	$mail_member->Subject =$subject;
	$mail_member->SetFrom($from,'Paramyoga');
	$mail_member->AddReplyTo($rep_to,'Paramyoga');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($msg);
	$mail_member->AddAddress($to);
	$mail_member->AddCc($cc);
	
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send() ) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}	
	

	
}

public function contactUsMail($email,$subject,$message,$name)
{


      $from='support@paramyoga.org';
	  $rep_to='babaom@gmail.com';
	  $cc='omanandji@gmail.com';	
	  //$cc='cit.abhinav@gmail.com';
	$mail_member = new PHPMailer();
	

	$mail_member->Subject =$subject;
	$mail_member->SetFrom($from,'Paramyoga');
	$mail_member->AddReplyTo($rep_to,'Paramyoga');
	$mail_member->AltBody = "";
	$mail_member->MsgHTML($message);
	$mail_member->AddAddress($email);
	//$mail_member->AddCc($cc);
	
///////////////////////////////////////////////////////////admin mail/////////////////////////////////////////
	
		if(!$mail_member->Send()) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}	
		
	
	
}

public function contactUsMailAdmin($email,$name,$comments,$ip,$contact,$referral_code)
{
    $admin_mail_member = new PHPMailer();
    $date=date('m-d-Y');	
	$subject_admin='Enquiry from '.$name.'.';
	  $from='support@paramyoga.org';
	  $rep_to='babaom@gmail.com';
	// $rep_to='s.hashmi1989@gmail.com';
	  //$cc='omanandji@gmail.com';	
	$msg='<table cellpadding="5" cellspacing="5" border="1" width="100%"><tr bgcolor="#CCCCCC"><td colspan="2" align="center"><b>Contact Inquiry</b></td></tr>';
	
	$msg.='<tr><td><b>Contact Name</b></td><td>'.$name.'</td></tr>';
	$msg.='<tr><td><b>Contact Email</b></td><td>'.$email.'</td></tr>';
	$msg.='<tr><td><b>Contact No</b></td><td>'.$contact.'</td></tr>';
	
	$msg.='<tr><td><b>Message</b></td><td>'.$comments.'</td></tr>';
	$msg.='<tr><td><b>Referral Person / Code</b></td><td>'.$referral_code.'</td></tr>';
	$msg.='<tr><td><b>Ip Address</b></td><td>'.$ip.'</td></tr>';
	$msg.='<tr><td><b>Contact Date</b></td><td>'.$date.'</td></tr>';
	$msg.='</table>';	
	
	$admin_mail_member->Subject =$subject_admin;
	$admin_mail_member->SetFrom($from,'Paramyoga');
	$admin_mail_member->AddReplyTo($rep_to,'Paramyoga');
	$admin_mail_member->AltBody = "";
	$admin_mail_member->MsgHTML($msg);
	$admin_mail_member->AddAddress('babaom@gmail.com');
	
	//$admin_mail_member->AddAddress('cit.manish77@gmail.com');
	
	
		if(!$admin_mail_member->Send()) { //44
		echo "<script>alert('you have an error');</script>";
		}//44
		
		else
		{
		
		  return true;

		}	
   
   	
}


}
?>
<table>
<tr><td colspan="2"></td></tr>
</table>