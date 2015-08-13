<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));
header('Content-type: application/json');

$Recipient = 'joaommonteiro@hotmail.com';

$subject = $_POST['subject'];

if($Recipient) {

	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Subject = $_POST['subject'];
	$Message = $_POST['message'];
	$Category = $_POST['category'];

	$Email_body = "";
	$Email_body .= "DE:\n" . $Name . "\n\n" .
				   "E-MAIL:\n" . $Email . "\n\n" .
				   "ASSUNTO:\n" . $Subject . "\n\n" .
				   "CATEGORIA:\n" . $Category . "\n\n" .
				   "MENSAGEM:\n" . $Message . "\n";

	$Email_headers = "";
	$Email_headers .= 'From: ' . $Name . ' <' . $Email . '>' . "\r\n".
					  "Responder para: " .  $Email . "\r\n";

	$sent = mail($Recipient, $Subject, $Email_body, $Email_headers);

	if ($sent){
		$emailResult = array ('sent'=>'yes');
	} else{
		$emailResult = array ('sent'=>'no');
	}

	echo json_encode($emailResult);

} else {

	$emailResult = array ('sent'=>'no');
	echo json_encode($emailResult);

}
?>
