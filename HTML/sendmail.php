<html>
<head>
<title>Sending mail from the form in Listing</title>
</head>
<body>
<?php
echo "<p>Thankyou, <b>".$_POST["name"]."</b>, for your message!</p>";
echo "<p>Your e-mail address is: <b>".$_POST["email"]."</b>.</p>";
echo "<p>Your message was:<br />";
echo $_POST["message"]."</p>";
//start building the mail string
$msg = "Name:	".$_POST["name"]."\n";
$msg .="E-mail: ".$_POST["email"]."\n";
$msg .= "Message:	".$_POST["message"]."\n";
//set up the mail
$recipient = "gospelsharma@gmail.com";
$subject = "Form Submission Results";
$mailheaders = "From: My Web Site <defaultwww.networkpro.host> \n";
$mailheaders .= "Reply-To: ".$_POST["email"];
//send the mail
ini_set("sendmail_from", "gospelsharma@gmail.com");
?>
</body>
</html>
