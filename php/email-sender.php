<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));
header('Content-type: application/json');

$Recipient = 'joaommonteiro@hotmail.com'; // <-- Set your email here

$subject = $_POST['subject'];

if($Recipient) {

	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Subject = $_POST['subject'];
	$Message = $_POST['message'];
	$Category = $_POST['category'];

	$Email_body = "";
	$Email_body .= "De: " . $Name . "\n" .
				   "E-mail: " . $Email . "\n" .
				   "Assunto: " . $Subject . "\n" .
				   "Categoria: " . $Category . "\n" .
				   "Mensagem: " . $Message . "\n";

	$Email_headers = "";
	$Email_headers .= 'De: ' . $Name . ' <' . $Email . '>' . "\r\n".
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
