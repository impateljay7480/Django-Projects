<?php 

require_once '../mailer/class.phpmailer.php';
/* creates object */
$mail = new PHPMailer(true);
$mailid = $email;
$eno =$epicid;
$subject = "Pi Weather";
$text_message = "Hello";
$message = "Thank You For Contacting <b> PI WEATHER </b> We will Contact you soon... ";

try
{
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = '465';
$mail->AddAddress($mailid);
$mail->Username ="piweather182@gmail.com";
$mail->Password ="Piweather@182";
$mail->SetFrom('piweather182@gmail.com','JAY PATEL');
$mail->AddReplyTo("piweather182@gmail.com","JAY PATEL");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{
echo "Thank you for register u got a notification through the mail you provide";
}
}
catch(phpmailerException $ex)
{
$msg = "
".$ex->errorMessage()."
";
}
require_once '../mailer/class.phpmailer.php';
/* creates object */

$mail = new PHPMailer(true);
$mailid= "pateljay1612@gmail.com";
$mailid1 = $email;
$subject = "QUERY";
$text_message = "Hello";
$message = "New User Registered Query ".$mailid1.".</br>


             <a style=\"color: blue; \"><b> $message1 </b></a>";

try
{
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = '465';
$mail->AddAddress($mailid);
$mail->Username ="piweather182@gmail.com";
$mail->Password ="Piweather@182";
$mail->SetFrom('piweather182@gmail.com','JAY');
$mail->AddReplyTo("piweather182@gmail.com","JAY");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{
echo "You have a new user";
}
}
catch(phpmailerException $ex)
{
$msg = "
".$ex->errorMessage()."
";
}
?>