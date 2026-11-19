<?php
if ($_COOKIE["auth"] == "1") {
	$display_block = "<p>You are an authorized user.</p>";
} else {
	// redirect back to login form if not authorized
	header ("userlogin.html");
	exit;
}
?>
<html>
<head>
<title>Secret Page</title>
</head>
<body>
<?php echo "$display_block"; ?>
</body>
</html>

