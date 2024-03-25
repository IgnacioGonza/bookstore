<?php
//Starting Session
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"&&
    $_SESSION['access_level']!= "instructor"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD or DIRECTOR.');
    window.location.href='http://c4ubooks.com';
    </script>");
}

require ('config.php');
require_once 'message.php';
//include "functions.php";

// Retrieve data from POST array
$orderid = filter_input(INPUT_POST, 'orderid');
$user_id = filter_input(INPUT_POST, 'user_id');
$book_isbn = filter_input(INPUT_POST, 'book_isbn');
$semester = filter_input(INPUT_POST, 'semester');
$campus = filter_input(INPUT_POST, 'campus');
$date = filter_input(INPUT_POST, 'date');
$course_code = filter_input(INPUT_POST, 'course_code');
$course_start = filter_input(INPUT_POST, 'course_start');
$quantity = filter_input(INPUT_POST, 'quantity');
$amount = filter_input(INPUT_POST, 'amount');
$ship_name = filter_input(INPUT_POST, 'ship_name');
$ship_address = filter_input(INPUT_POST, 'ship_address');
$ship_city = filter_input(INPUT_POST, 'ship_city');
$ship_zip_code = filter_input(INPUT_POST, 'ship_zip_code');
$ship_country = filter_input(INPUT_POST, 'ship_country');
$original_confirmation_number = filter_input(INPUT_POST, 'confirmation_number');

$confirmation_number = rand(10000,9999999);
/*

//Checking for empty variables
if(empty($orderid)||
    empty($user_id)||
    empty($amount)||
    empty($semester)
){
    die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>");
}

//Checking for valid Numeric variables from POST
numeric($quantity);


//echo "Current Confirmation From POST #: ".$original_confirmation_number."<br>";
//echo "New Confirmation From POST #: ".$confirmation_number."<br>";

/*
echo "$orderid <br />";
echo "$user_id <br />";
echo "$book_isbn <br />";
echo "$amount <br />";
echo "$semester <br />";
echo "$campus <br />";
echo "$course_code <br />";
echo "$course_start <br />";
echo "$quantity <br />";
echo "$date <br />";
echo "$ship_name <br />";
echo "$ship_address <br />";
echo "$ship_city <br />";
echo "$ship_zip_code <br />";
echo "$ship_country <br />"; 
*/




//Fetch Price of Reorder
$sql = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $book_title = $row['book_title'];
        $pricequery = $row["book_price"];
    }
}
//Calculate total price
$amount = $pricequery * $quantity;

//Fetch user info from DB based on currently logged in user
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $email = $row["email"];
    }
}


//Add order to Database
$sql = "INSERT INTO orders (user_id, amount, semester, campus, course_code, course_start, quantity, ship_name, ship_address, ship_city, ship_zip_code, ship_country, book_isbn, confirmation_number)
VALUES ('$user_id', '$amount','$semester', '$campus', '$course_code', '$course_start', '$quantity','$ship_name', '$ship_address', '$ship_city', '$ship_zip_code', '$ship_country', '$book_isbn', '$confirmation_number')";

if ($conn->query($sql) === TRUE) {
    //echo "Your order was submitted successfully, please click <a href= /catalog.php>HERE</a> to return to the catalog";
    include "orders_confirmation.php";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




//Grab the order ID for the original order
$sql = "SELECT * FROM orders WHERE confirmation_number = '$original_confirmation_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ordernumber = $row["orderid"];
    }
}

//Grab the order ID for the new order
$sql = "SELECT * FROM orders WHERE confirmation_number = '$confirmation_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orderid = $row["orderid"];
    }
}

//Grab current date for email confirmation
$updatedate = date("Y-m-d");

//echo "Current Order ID: ".$ordernumber."<br>";
//echo "New Order ID: ".$orderid."<br>";
//echo "Current Confirmation #: ".$original_confirmation_number."<br>";
//echo "New Confirmation #: ".$confirmation_number."<br>";



//Create and send email
$from = 'no_reply <no_reply@c4ubooks.com>';
$to = "Beau Sanders <sandersb@c4ubooks.com>,
       Phillip Cluley <cluleyp@c4ubooks.com>,
       $first_name $last_name <$email>";
       
echo "Name: ".$first_name." ". $last_name;       

$subject = 'C4U Re-Order Confirmation';

$body = '<html><body>';
$body .= '<img src="http://i63.tinypic.com/2edz7s4.jpg" alt="c4u_image" />';
$body .= "<p><h1><strong>Hello, $ship_name!</strong></h1></p>";
$body .= "<p><strong>Order#: $ordernumber has been re-ordered. The new order number is: $orderid</strong></p>";
$body .= "<p><strong>Please see order details below:</strong></p>";
$body .= '<br>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding ="10">';
$body .= "<tr style='background: #eee;'><td><strong>Username:</strong></td> <td>$username</td></tr>";
$body .= "<tr><td><strong>Order Date:</strong></td> <td>$updatedate</td></tr>";
$body .= "<tr><td><strong>Course:</strong></td> <td>$course_code</td></tr>";
$body .= "<tr><td><strong>Book:</strong></td> <td>$book_title</td></tr>";
$body .= "<tr><td><strong>Quantity:</strong></td> <td>$quantity</td></tr>";
$body .= "<tr><td><strong>Price:</strong></td> <td>$$amount</td></tr>";
$body .= "<tr><td><strong>Address:</strong></td> <td>$ship_address</td></tr>";
$body .= "<tr><td><strong>City:</strong></td> <td>$ship_city</td></tr>";
$body .= "<tr><td><strong>Zip:</strong></td> <td>$ship_zip_code</td></tr>";
$body .= "<tr><td><strong>Country:</strong></td> <td>$ship_country</td></tr>";
$body .= "</table>";
$body .= '<br>';
$body .= '<p><strong>Thank you for your continued business. If you require additional order information 
            please visit www.C4UBooks.com or click <a href="http://c4ubooks.com/vieworders.php">here</a>.</strong></p>';
$body .= "</body></html>";

$is_body_html = true;

try {
    send_email($to, $from, $subject, $body, $is_body_html);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}




?>