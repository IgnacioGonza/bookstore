<?php
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
$user_id = filter_input(INPUT_POST, 'user_id');
$book_isbn = filter_input(INPUT_POST, 'book_isbn');
$book_title = filter_input(INPUT_POST, 'book_title');
$book_price = filter_input(INPUT_POST, 'book_price');
$semester = filter_input(INPUT_POST, 'semester');
$campus = filter_input(INPUT_POST, 'campus');
$course_code = filter_input(INPUT_POST, 'course_code');
$course_start = filter_input(INPUT_POST, 'course_start');
$quantity = filter_input(INPUT_POST, 'quantity');
$ship_name = filter_input(INPUT_POST, 'ship_name');
$ship_address = filter_input(INPUT_POST, 'ship_address');
$ship_city = filter_input(INPUT_POST, 'ship_city');
$ship_zip_code = filter_input(INPUT_POST, 'ship_zip_code');
$ship_country = filter_input(INPUT_POST, 'ship_country');
$comments = filter_input(INPUT_POST, 'comments');
$confirmation_number = rand(10000,9999999);

/*
//Checking for empty variables
if(empty($user_id)||
    empty($amount)||
    empty($semester)||
    empty($course_code)||
    empty($course_start)||
    empty($quantity)||
    empty($ship_name)||
    empty($ship_address)||
    empty($ship_city)||
    empty($ship_zip_code)||
    empty($ship_country)||
    empty($book_isbn)||
    empty($book_title)||
    empty($book_price)||
    empty($campus)
){
    die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-2)</script></html>");
}


//Checks variable for letter ONLY
alpha($ship_name);
alpha($ship_city);
alpha($ship_country);
alphs($campus);

//Checking for valid Alpha Numeric variable from POST
alpha_numeric($course_code);
alpha_numeric($ship_address);
alpha_numeric($comments);

//Checking for valid Numeric variables from POST
numeric($user_id);
numeric($course_start);
numeric($quantity);
numeric($amount);
numeric($ship_zip_code);
numeric($book_isbn);

//Quantity variable must be greater than 0

if($quantity <= 0){
   //Error Message
        die ("<html><script language='JavaScript'>alert('ERROR: Quantity must be greater than zero.'),history.go(-1)</script></html>"); 
}

*/
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

//Fetch price from DB to calculate total price
$sql = "SELECT book_price FROM books WHERE book_isbn = '$book_isbn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pricequery = $row["book_price"];
    }
}
//Calculate total price
$price = $pricequery * $quantity;

/*
echo "$user_id <br />";
echo "$book_isbn <br />";
echo "$semester <br />";
echo "$campus <br />";
echo "$course_code <br />";
echo "$course_start <br />";
echo "$quantity <br />";
echo "$ship_name <br />";
echo "$ship_address <br />";
echo "$ship_city <br />";
echo "$ship_zip_code <br />";
echo "$ship_country <br />"; 
*/

// Error Handlers


// Checks to make sure all fields have been filled

if ($semester == null ||
	$campus == null ||
	$course_code == null ||
	$course_start == null ||
	$quantity == null ||
	$ship_name == null ||
	$ship_address == null ||
	$ship_city == null ||
	$ship_zip_code == null ||
	$ship_country == null )  {


die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>"); 
} 

/*Checking for duplicate confirmation numbers
$sql = 'SELECT confirmation_number FROM orders WHERE confirmation_number = "'.$confirmation_number.'" ';
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
     
     $confirmation_number = rand(10000,9999999);
        
    }
    
    */

//Add order to Database
$sql = "INSERT INTO orders (orderid, user_id, amount, semester, campus, course_code, course_start, quantity, ship_name, ship_address, ship_city, ship_zip_code, ship_country, comments, book_isbn, confirmation_number)
VALUES ('NULL', '$user_id','$price', '$semester', '$campus', '$course_code', '$course_start', '$quantity', '$ship_name', '$ship_address', '$ship_city', '$ship_zip_code', '$ship_country', '$comments', '$book_isbn', '$confirmation_number')";

if ($conn->query($sql) === TRUE) {
    //echo "Your order was submitted successfully, please click <a href= /catalog.php>HERE</a> to return to the catalog";
    include "orders_confirmation.php";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//Grab the order ID for confirmation email
$sql = "SELECT * FROM orders WHERE confirmation_number = '$confirmation_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ordernumber = $row["orderid"];
    }
}

//Grab current date for email confirmation
$date = date("Y-m-d");

//Build email confirmation script
$from = 'no_reply <no_reply@c4ubooks.com>';
$to = "Beau Sanders <sandersb@c4ubooks.com>,
       Phillip Cluley <cluleyp@c4ubooks.com>,
       $first_name $last_name <$email>";

$subject = 'C4U Order Confirmation';

$body = '<html><body>';
$body .= '<img src="http://i63.tinypic.com/2edz7s4.jpg" alt="c4u_image" />';
$body .= "<p><h1><strong>Hello, $ship_name!</strong></h1></p>";
$body .= "<p><h3><strong>Order Number:$ordernumber has been accepted!</strong></h3></p>";
$body .= '<p><strong>Please see order details below:</strong></p>';
$body .= '<br>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding ="10">';
$body .= "<tr style='background: #eee;'><td><strong>Username:</strong></td> <td>$username</td></tr>";
$body .= "<tr><td><strong>Order Date:</strong></td> <td>$date</td></tr>";
$body .= "<tr><td><strong>Course:</strong></td> <td>$course_code</td></tr>";
$body .= "<tr><td><strong>Book:</strong></td> <td>$book_title</td></tr>";
$body .= "<tr><td><strong>Quantity:</strong></td> <td>$quantity</td></tr>";
$body .= "<tr><td><strong>Price:</strong></td> <td>$$price</td></tr>";
$body .= "<tr><td><strong>Address:</strong></td> <td>$ship_address</td></tr>";
$body .= "<tr><td><strong>City:</strong></td> <td>$ship_city</td></tr>";
$body .= "<tr><td><strong>Zip:</strong></td> <td>$ship_zip_code</td></tr>";
$body .= "<tr><td><strong>Country:</strong></td> <td>$ship_country</td></tr>";
$body .= "</table>";
$body .= '<br>';
$body .= '<p><strong>Thank you for shopping with us. If you require additional order information 
            please visit www.C4UBooks.com or click <a href="http://c4ubooks.com/vieworders.php">here</a>.</strong></p>';
$body .= "</body></html>";

$is_body_html = true;

//Verify email addresses are valid and send email
try {
    send_email($to, $from, $subject, $body, $is_body_html);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}

?>