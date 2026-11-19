<!DOCTYPE html>
<?php
// 1. Run authentication BEFORE any HTML is output
if (isset($_COOKIE["auth"]) && $_COOKIE["auth"] === "1") {
    $display_block = "<p>You are an authorized user.</p>";
} else {
    header("Location: userlogin.html");
    exit;
}
?>
<html>
<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TYGNFK4STQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TYGNFK4STQ');
</script>

<meta charset="Western Eurpean (ISO)">
<title>Invest With Us</title>
<meta name="viewport" content-"width=device-width">
<style type="text/css" media="screen">
header 	{ text-align:left;
	background-color: #055; color:white; }
header h1 { margin: 0; }
header h1 { color: #FFFF00; font-size: 250%; }


#main 	{ background-color: #055;
	padding: 0 12em 2em 0;
	position: relative; }
#address { z-index: 0; background-color: white; padding: 1em 5em; }


#sidebar { position: absolute; width: 10em;
	right: 1em; top: 5em; }
#sidebar h3 { font-size: 100%; color: white; margin: 0;
	font-weight: normal; padding: 0 0.125em 0.25em;
	background-color: #404; }
#sidebar ul { margin: 0 0 1em 0;
	background-color: white;
	border: 2px solid #404;
	border-top: 0;
	padding: 0.125em 0.25em; }
#sidebar li { font-size: 85%;
	display: block; padding: 0.125em 0; }
#sidebar li a:link, #sidebar li a:visited
	{ text-decoration: none; color: #055; }
#sidebar li a:hover { color: #404; }


footer { background-color: #404; color:white;
	padding: 0.5em 5em; }
footer p { margin: 0em; font-size: 85%; }
footer p a:link, footer p a:visited 
	{ color: #DDDD00; }


a:visited { color: purple;  }
a:hover { color: red;}


.outer { padding: 20px;
	 margin: 40px;
	 background-color: white;
	}
.address {
	z-index: 0;
	background-color: white;
	padding: 1em 5em; 
	border: 3px solid black;
	margin-left: auto;
	margin-right: auto;
	width: 50%;
	}

</style>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2044392458395607"


     crossorigin="anonymous">
</script>
</head>
<body style="background-color:#aaaaaa; font-family: Verdana;">
<script>
        function validateAccountNumbers(event) {
            const accountNumber = document.getElementById("accountNumber").value.trim();
            const confirmAccountNumber = document.getElementById("confirmAccountNumber").value.trim();
            const errorMsg = document.getElementById("errorMsg");

            errorMsg.textContent = "";

            if (!accountNumber || !confirmAccountNumber) {
                errorMsg.textContent = "Both account number fields are required.";
                event.preventDefault();
                return false;
            }

            const accountRegex = /^\d+$/;
            if (!accountRegex.test(accountNumber) || !accountRegex.test(confirmAccountNumber)) {
                errorMsg.textContent = "Account numbers must contain only digits.";
                event.preventDefault();
                return false;
            }

            if (accountNumber !== confirmAccountNumber) {
                errorMsg.textContent = "Account numbers do not match.";
                event.preventDefault();
                return false;
            }

            return true;
        }
    </script>

<header>
<h1>Invest with us:</h1>
<hr align="left";></hr>
</header>
<div id="main">
        <p>NetworkPro welcomes you to invest with it in various assets under one head. Invest in emerging markets, new technologies with NetworkPro's deployed Algorithmic Trading setups.</p>
        <?php echo $display_block; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateAccountNumbers(event);">
            <p>
                <label for="name1"><strong>Enter Full Name:</strong></label><br>
                <input type="text" id="name1" name="name1" size="30" maxlength="50" required>
            </p>
            <p>
                <label for="accountNumber"><strong>Enter Account Number:</strong></label><br>
                <input type="text" id="accountNumber" name="accountNumber" size="25" maxlength="50" required>
            </p>
            <p>
                <label for="confirmAccountNumber"><strong>Re-enter Account Number:</strong></label><br>
                <input type="text" id="confirmAccountNumber" name="confirmAccountNumber" size="25" maxlength="50" required><br>
                <span id="errorMsg" style="color: #ffcccc; font-weight: bold;" class="error"></span>
            </p>
            <p>
                <label for="IFSC"><strong>Enter IFSC No.:</strong></label><br>
                <input type="text" id="IFSC" name="IFSC" size="25" maxlength="25">
            </p>
            <p>
                <label for="swift"><strong>Enter Swift Code (in case of international payment):</strong></label><br>
                <input type="text" id="swift" name="swift" size="25" maxlength="25">
            </p>
            <p>
                <label for="amount"><strong>Enter Amount to be invested:</strong></label><br>
                <input type="number" id="amount" name="amount" min="1" step="any" required>
            </p>
            <p>
                <label for="email"><strong>E-mail address:</strong></label><br>
                <input type="email" id="email" name="email" required>
            </p>
            <p>
                <label for="tel"><strong>Phone number for communication:</strong></label><br>
                <input type="tel" id="tel" name="tel" required>
            </p>

            <input type="hidden" name="event_time_mm" value="<?php echo time(); ?>">
            <button type="submit" name="submit">Invest</button>
        </form> 

<address class="address">
	<strong>Date of Incorporation: </strong>30/10/2024,<br>
	NetworkPro, Sole Proprietorship,<br>
	UDYAM Reg. No.: UDYAM-HP-03-0011566,<br>
	Micro Enterprise, <br>
	<strong>Address:</strong> H.No. 449, W.No.1,<br>
	Krishna Nagar, Hamirpur (H.P.) <br>
	India. <strong>Pin:</strong> 177001<br>
	<a href="mailto:ashishsharma248@outlook.com">ashishsharma248@outlook.com<a><br>
	<strong>SMS at: </strong>
	<a href="SMS:+919418024872">+919418024872</a>
</address>
</div>

<aside id="sidebar">
	<h3>Artificial Learning Users</h3>
	<ul>
		<li><a href="..\..\Downloads\Pkg Download.html">Al Users</a></li>
	</ul>
	<h3>NetworkPro Projects</h3>
	<ul>
		<li><a href="..\..\Downloads\Pkg Download.html">Al Users</a></li>
		<li><a href="..\CertRSAPay.html">Cert RSA</a></li>
		<li><a href="..\CredManagerPay.html">Credential Manager</a></li>
		<li><a href="..\..\Drivers\Drivers.html">Drivers</a></li>
		
	</ul>
	
	<h3>Contact Us</h3>
	<ul>
		<li><a href="..\ContactUs\Contact.html">Contact Us</a></li>
		<li><a href="..\ContactUs\feedback.html">Feedback</a></li>
	</ul>
	
</aside>
<footer>
	<p align="center"><a href="..\..\index.html">Home Page</a><br></br>
	<a href="..\Donations.html">Donations</a>   
	    <a href="..\COntactUs\Contact.html">Contact</a></p>

</footer> <!-- footer -->
</div>
</body>
</html>
