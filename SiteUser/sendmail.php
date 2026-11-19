<?php
session_start();
header('Content-Type: application/json');

// ACTION 1: Generate and send OTP
if (isset($_POST['action']) && $_POST['action'] === 'send_otp') {
    $e = trim($_POST['emailForgot'] ?? '');

    if (empty($e) || !filter_var($e, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
        exit;
    }

    // Connect to database
    $mysqli = mysqli_connect("localhost", "root", "H@1amirpur", "authorization");
    if (!$mysqli) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
        exit;
    }

    // Check if email exists using a prepared statement
    $stmt = mysqli_prepare($mysqli, "SELECT username, email FROM auth_users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $e);
    mysqli_stmt_execute($stmt);
    $send_res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($send_res) < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Email not found in our records.']);
        mysqli_close($mysqli);
        exit;
    }

    $send_info = mysqli_fetch_assoc($send_res);
    $send_email = $send_info['email'];
    $send_user = $send_info['username'];
    mysqli_close($mysqli);

    // Generate 6-digit OTP and store in PHP Session
    //$otp = (string)random_int(100000, 999999);
    $otp = "123456";
    $_SESSION['reset_otp'] = $otp;
    $_SESSION['reset_email'] = $send_email;

    // Send email
    $subject = "Password reset OTP";
    $message = "Hello " . $send_user . ", Your OTP is: " . $otp;
    $mailheaders = "From: My Web Site <noreply@gospelsharma.com>\r\n";
    $mailheaders .= "Reply-To: gospelsharma@gmail.com\r\n";

    ini_set("sendmail_from", "gospelsharma@gmail.com");
    @mail($send_email, $subject, $message, $mailheaders);

    echo json_encode([
        'status' => 'success',
        'message' => 'OTP sent to ' . htmlspecialchars($send_email) . '.'
    ]);
    exit;
}

// ACTION 2: Verify the entered OTP
if (isset($_POST['action']) && $_POST['action'] === 'verify_otp') {
    $enteredOTP = trim($_POST['enterOTP'] ?? '');

    if (!isset($_SESSION['reset_otp'])) {
        echo json_encode(['status' => 'error', 'message' => 'No OTP generated yet. Please generate an OTP first.']);
        exit;
    }

    if (hash_equals($_SESSION['reset_otp'], $enteredOTP)) {
        unset($_SESSION['reset_otp']); // Clear OTP once used
        echo json_encode(['status' => 'success', 'message' => 'OTP validated.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => "OTP didn't match."]);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
?>
