<?php

require ('config.php');
require_once 'message.php';

//Retrieve user input from post array

$forgotuser = filter_input(INPUT_POST, 'forgotuser');

//Compare input to database and fetch email
$sql = "SELECT * FROM users WHERE username = '$forgotuser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $forgotpassword = $row["password"];
        $forgotemail = $row["email"];
        $forgotfname = $row["first_name"];
        $forgotlname = $row["last_name"];
    }
}

//Verify field is filled
if ($forgotuser == null) {
    die ("<html><script language='JavaScript'>alert('Input not recognized, please try again.'),history.go(-1)</script></html>");
}

//Send password in email
$from = 'no_reply <no_reply@c4ubooks.com>';
$to = "$forgotfname $forgotlname <$forgotemail>";

$subject = 'Password Recovery Request';

$body = '<html><body>';
$body .= '<img src="http://i63.tinypic.com/2edz7s4.jpg" alt="c4u_image" />';
$body .= "<p><h1><strong>Hello, $forgotfname!</strong></h1></p>";
$body .= "<p>Your password is: <strong>$forgotpassword</strong>"; 
$body .= "<p>Please contact your system administrator to change your password. </p>";
$body .= "<br>";
$body .= "<p>Thank you.</p>";
$body .= "</body></html>";

$is_body_html = true;

try {
    send_email($to, $from, $subject, $body, $is_body_html);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}

?>

<html>
    <head>
        <body>
            <p>An email has been sent to the address on file for the user you entered. Please check your inbox and click <a href="index.php">HERE</a> to try again</p>
        </body>
    </head>
</html>