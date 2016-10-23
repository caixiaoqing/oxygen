<?php
$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = @trim(stripslashes($_POST['subject'])); 
$message    = @trim(stripslashes($_POST['message'])); 
$to   		= 'support@pst-sg.com';//replace with your email

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: {$name} <{$from}>";
$headers[] = "Reply-To: {$from}";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion();

$send = mail($to, $subject, $message, implode("\r\n", $headers));

if ($send) {
    header("Refresh:2; url=http://pst-sg.com#contact");
    echo "Thank you for contacting us. We will be in touch with you very soon.";
}
else { echo "ERROR! Please go back and try again."; }
die;