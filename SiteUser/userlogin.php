<?php
//check for required fields from the form
if ((!isset($_POST["username"])) || (!isset($_POST["password"])) || (!isset($_POST["useremail"]))) {
	header("Location: userlogin.php");
	exit;
}

// connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "H@1amirpur", "authorization");

// create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE 
	username ='".$_POST["username"]."' AND
	password = sha2('".$_POST["password"]."', 256)";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

// get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {
	
	// if authorized, get the values of f_name l_name
	while ($info = mysqli_fetch_Array($result)) {
		$f_name = stripslashes($info['f_name']);
		$l_name = stripslashes($info['l_name']);
		}
	// set authorization
	setcookie("auth", "1", 0, "/", "", 0);
	
	// create display string
	$display_block = "
	<p>".$f_name." ".$l_name." is authorized!</p>
	<p>Authorized Users' Menu:</p>
	<ul>
	<li><a href =\"secretpage.php\">Investor Page</a></li>
	</ul>";
} else {
	// redirect back to login form if not authorized
	header("Location: userlogin.html");
	exit;
}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<?php echo "$display_block"; ?>
</body>
</html>

	
	
