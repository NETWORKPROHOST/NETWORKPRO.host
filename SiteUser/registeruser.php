<?php

// connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "H@1amirpur", "authorization");

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

//check for required fields from the form
if (!$_POST) {
	$display_block ="
	<form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\">
	
	<p>Enter your First name:<br/>
        <input type=\"text\" name=\"f_name\" required></p>
        
        <p>Enter your Last name:<br/>
        <input type=\"text\" name=\"l_name\" required></p>
        
        <p>Enter your Username:<br/>
        <input type=\"text\" name=\"username\" required></p>
        
        <p>Enter your Email address:<br/>
        <input type=\"email\" name=\"email\" required></p>
        
        <p>Enter your Password:<br/>
        <input type=\"password\" name=\"password\" required></p>
        <p><input type=\"submit\" name=\"submit\" value=\"Register\"></p>
	</form>";
	} else {	

// create and issue the query
$add_sql = "INSERT INTO auth_users (f_name, l_name, email, username, Password) VALUES ('".$_POST["f_name"]."','".$_POST["l_name"]."','".$_POST["username"]."','".$_POST["email"]."',sha2('".$_POST["password"]."', 256))";
$add_result = mysqli_query($mysqli, $add_sql) or die(mysqli_error($mysqli));

	
	// create display string
	$display_block = "
	<p>".$_POST["f_name"]." ".$_POST["l_name"]." is authorized!</p>
	<p>Authorized Users' Menu:</p>
	<ul>
	<li><a href =\"secretpage.php\">Investor Page</a></li>
	</ul>";
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

	
	
