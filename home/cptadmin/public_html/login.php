<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}
require('config.php');
$username_input = filter_input(INPUT_POST, 'username');
$password_input = filter_input(INPUT_POST, 'password');

//echo "Username Input: ".$username_input."<br/>";
//echo "Password Input: ".$password_input."<br/>";

//$username_input = mysqli_escape_string($username_input);



$sql = 'SELECT user_id, username, password, access_level FROM users WHERE username = "'.$username_input.'"';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
        $username = $row["username"];
        $password = $row["password"];
        $access_level = $row["access_level"];
    }
    
    
}
//echo "User ID: ".$user_id."<br/>";
//echo "Username: ".$username."<br/>";
//echo "Password: ".$password."<br/>";
//echo "Access Level: ".$access_level."<br/>";

//<div class="container-fluid">

if ( empty($username) ) {
$pageTitle = "User Name Error";
include "header_navigation.php";
echo "<blockquote>";
echo "<h2>Username: <b>".$username_input. "</b> does not exist. Please try to log in again or create a new
account.</h1>";
echo '<a href="index.php">Please click here to try again</a>';
echo "</blockquote>";
//include "./footer.php";
echo "</div>";
// Destroy the session cookie
session_unset(); // Clear session data
session_destroy(); // Reset session ID
die;
} else if ( $password != $password_input ) {

// Destroy the session cookie
session_unset(); // Clear session data
session_destroy(); // Reset session ID

die ("<html><script language='JavaScript'>alert('Incorrect Password. Try Again.'),history.go(-1)</script></html>"); 
} 

// Populate the session array
$_SESSION['validLogin'] = true;
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $username;
$_SESSION['access_level'] = $access_level;



// Assign correct navigation to logged in user
switch ($access_level) {
case "student":
$_SESSION['validLogin'] = true;
$_SESSION['access_level'] = "student";
$_SESSION['user_id'];
$_SESSION['username'];
header("Location:catalog.php"); 
    exit;
break;

case "instructor":
$_SESSION['validLogin'] = true;
$_SESSION['access_level'] = "instructor";
$_SESSION['user_id'];
$_SESSION['username'];
header("Location:catalog.php"); 
    exit;
break;

case "director":
$_SESSION['validLogin'] = true;
$_SESSION['access_level'] = "director";
$_SESSION['user_id'];
$_SESSION['username'];
header("Location:catalog.php"); 
    exit;
break;

case "depthead":
$_SESSION['validLogin'] = true;
$_SESSION['access_level'] = "depthead";
$_SESSION['user_id'];
$_SESSION['username'];
header("Location:catalog.php"); 
    exit;
break;

case "admin":
$_SESSION['validLogin'] = true;
$_SESSION['access_level'] = "admin";
$_SESSION['user_id'];
$_SESSION['username'];
header("Location:catalog.php"); 
    exit;
break;

case "":
// Destroy the session cookie
session_unset(); // Clear session data
session_destroy(); // Reset session ID

die ("<html><script language='JavaScript'>alert('User Has Not Been Assigned an Access Level! (NOTE: Administrator must assign an access level in order to proceed.)'),history.go(-1)</script></html>"); 
    exit;
break;

default:
header("Location:index.php");
    exit;
}
?>