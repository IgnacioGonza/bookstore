<?php
//Start Session
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD or DIRECTOR.');
    window.location.href='http://c4ubooks.com/';
    </script>");
}

require ('config.php');
require_once 'message.php';

//include "functions.php";

// Retrieve data from POST array
$orderid = filter_input(INPUT_POST, 'orderid');
$user_id = filter_input(INPUT_POST, 'user_id');
$amount = filter_input(INPUT_POST, 'amount');
$semester = filter_input(INPUT_POST, 'semester');
$course_code = filter_input(INPUT_POST, 'course_code');
$course_start = filter_input(INPUT_POST, 'course_start');
$quantity = filter_input(INPUT_POST, 'quantity');
$date = filter_input(INPUT_POST, 'date');
$updatedate = date("Y-m-d");
$ship_name = filter_input(INPUT_POST, 'ship_name');
$ship_address = filter_input(INPUT_POST, 'ship_address');
$ship_city = filter_input(INPUT_POST, 'ship_city');
$ship_zip_code = filter_input(INPUT_POST, 'ship_zip_code');
$ship_country = filter_input(INPUT_POST, 'ship_country');
$book_isbn = filter_input(INPUT_POST, 'book_isbn');
$comments = filter_input(INPUT_POST, 'comments');
$confirmation_number = filter_input(INPUT_POST, 'confirmation_number');

/*

//Checking for empty variables
if(empty($orderid)||
    empty($user_id)||
    empty($amount)||
    empty($semester)||
    empty($course_code)||
    empty($course_start)||
    empty($quantity)||
    empty($date)||
    empty($ship_name)||
    empty($ship_address)||
    empty($ship_city)||
    empty($ship_zip_code)||
    empty($ship_country)||
    empty($book_isbn)
){
    die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>");
}


//Checks variable for letter ONLY
alpha($ship_name);
alpha($ship_city);
alpha($ship_country);

//Checking for valid Alpha Numeric variable from POST
alpha_numeric($course_code);
alpha_numeric($ship_address);
alpha_numeric($comments);

//Checking for valid Numeric variables from POST
numeric($orderid);
numeric($user_id);
numeric($course_start);
numeric($quantity);
numeric($amount);
numeric($date);
numeric($ship_zip_code);
numeric($book_isbn);

//Quantity variable must be greater than 0

if($quantity <= 0){
   //Error Message
        die ("<html><script language='JavaScript'>alert('ERROR: Quantity must be greater than zero.'),history.go(-1)</script></html>"); 
}

*/

//Fetch user info from DB based on original ordering user
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
$sql = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pricequery = $row["book_price"];
        $book_title = $row["book_title"];
    }

//Calculate total price
$price = $pricequery * $quantity;

/*echo "$orderid <br />";
echo "$user_id <br />";
echo "$amount <br />";
echo "$semester <br />";
echo "$course_code <br />";
echo "$course_start <br />";
echo "$date <br />";
echo "$ship_name <br />";
echo "$ship_address <br />";
echo "$ship_city <br />";
echo "$ship_zip_code <br />";
echo "$ship_country <br />";
echo "$book_isbn <br />";*/

//echo "Book Price: ".$pricequery."<br/>";
//echo "Quantity: ".$quantity."<br/>";
//echo "Price: ".$price."<br/>";
//echo "ISBN: ".$book_isbn."<br/>";
//echo "Result: ".$result."<br/>";

//Send Confirmation Email
$from = 'no_reply <no_reply@c4ubooks.com>';
$to = "Beau Sanders <sandersb@c4ubooks.com>,
       Phillip Cluley <cluleyp@c4ubooks.com>,
       $first_name $last_name <$email>";

$subject = 'C4U Order Modification';

$body = '<html><body>';
$body .= '<img src="http://i63.tinypic.com/2edz7s4.jpg" alt="c4u_image" />';
$body .= "<p><h1><strong>Hello, $ship_name!</strong></h1></p>";
$body .= "<p><strong>Order ID: $orderid has been modified. Please see updated order details below:</strong></p>";
$body .= '<br>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding ="10">';
$body .= "<tr style='background: #eee;'><td><strong>User:</strong></td> <td>$username</td></tr>";
$body .= "<tr><td><strong>Order Modification:</strong></td> <td>$updatedate</td></tr>";
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

try {
    send_email($to, $from, $subject, $body, $is_body_html);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}


//Edit Orders
$sql = "
UPDATE orders 
SET amount = '$price', 
    semester = '$semester', 
    course_code = '$course_code', 
    course_start = '$course_start', 
    quantity = '$quantity', 
    ship_name = '$ship_name', 
    ship_address = '$ship_address', 
    ship_city = '$ship_city', 
    ship_zip_code = '$ship_zip_code', 
    ship_country = '$ship_country' , 
    book_isbn = '$book_isbn',
    comments = '$comments'
WHERE orderid=$orderid";

if ($conn->query($sql) === TRUE) {
    //echo "Your order was submitted successfully, please click <a href= /catalog.php>HERE</a> to return to the catalog";
    include "orders_confirmation.php";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

//$conn->close();

?>