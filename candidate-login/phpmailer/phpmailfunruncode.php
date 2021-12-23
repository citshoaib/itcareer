
require_once('phpmailer/function.php');

if($insert){
            $this_object = new callfunction();  
            $msg = "true";

            $to       = $email;
            $subject  =   "Thank you for contact with us...!";
            $message = "\n";
            $message.=  "Dear  <b>".$name."&nbsp;&nbsp;</b><br><br>";
            $message.='Many thanks for your kind interest.<br>';
            $message.='Our team will contact you soon.<br><br>';
            $message.='With Kind Regards<br>';
            $message.='Support Team<br>';
            $message.='Techsimba.in<br>';
            $message.='<a href="http://techsimba.in/">www.techsimba.in</a><br> +91-96859-71959';
            $this_object->SendMailToUser($to,$subject,$message);

            $to = "cit.shoaibm2019@gmail.com";
            $subject  =   "Contact Enquiry";
            $message = 'Dear Administrator,'. "<br/><br/>";
            $message.= 'Please check the below details'. "<br/><br/>";
            $message.=  "<strong>Name :- </strong>".$name."<br/>";
            $message.=  "<strong>Email :- </strong>".$email."<br/>";
            $message.=  "<strong>Contact Number :- </strong>".$contact."<br/>";
            $message.='Thanks & Regards,'."<br/>".' Techsimba ';
            $this_object->SendMailToAdmin($to,$message,$subject);
            }