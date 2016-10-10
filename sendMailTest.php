<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';                       	 // Specify main and backup server
$mail->SMTPAuth = true;                               	 // Enable SMTP authentication
$mail->Username = '[gmailAddress]';             	       // SMTP username
$mail->Password = '[password]';                         // SMTP password
$mail->SMTPSecure = 'tls';                               // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                       // Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom($mail->Username, '[Firstname Lastname]');// Set who the message is to be sent from
$mail->addReplyTo($mail->Username, '[Firstname Lastname]'); // Set an alternative reply-to address
$mail->addAddress($mail->Username);		 // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(false);                                  // Set email format to HTML
 
$mail->Subject = 'Your ip has changed!';
$mail->Body    = 'Your new ip is: '.$argv[1];
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo "Message could not be sent.";
   echo "Mailer Error: " . $mail->ErrorInfo . "\n";
   exit;
}
 
echo "Message has been sent\n";
