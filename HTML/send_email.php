<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	
	$to="ashishsharma248@outlook.com";
	$subject = "New Lottery Form Submission";
	$headers= "Form:" . $email . "\r\n";
	$headers .="Reply-To: " . $email . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	$email_body = "<h2>Lottery Form Submission</h2>";
	$email_body .= "<p><strong>Name:</strong> " . $name . "</p>";
	$email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
	$email_body .= "<p><strong>Telephone:</strong> " . $tel . "</p>";

if(mail($to, $subject, $email_body, $headers)) {
		echo "Email sent successfully!";
	}
	else { 
		echo "Error sending email.";
	}
}
else {
	echo "Invalid request method.";
}
?> 
