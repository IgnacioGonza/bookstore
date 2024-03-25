<?php

require_once 'message.php';

$from = 'no_reply <no_reply@c4ubooks.com>';
$to = 'Evan Leindecker <leindeckered@my.gvltec.edu>,
       Rebecca Bowser <bowserra@my.gvltec.edu>';

$subject = 'C4U Order Confirmation';

$body = '<html><body>';
$body .= '<img src="http://i63.tinypic.com/2edz7s4.jpg" alt="c4u_image" />';
$body .= '<h1>Order Confirmation: %orderid%</h1>';
$body .= '<p><strong>Hello, %first_name%!</strong></p>';
$body .= '<p><strong>Please see order details below:</strong></p>';
$body .= '<br>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding ="10">';
$body .= "<tr style='background: #eee;'><td><strong>Username:</strong></td> <td>%username%</td></tr>";
$body .= "<tr><td><strong>Order Date:</strong></td> <td>%current_date%</td></tr>";
$body .= "<tr><td><strong>Course:</strong></td> <td>%course_code%</td></tr>";
$body .= "<tr><td><strong>Book:</strong></td> <td>%book_title%</td></tr>";
$body .= "<tr><td><strong>Quantity:</strong></td> <td>%quantity%</td></tr>";
$body .= "<tr><td><strong>Total:</strong></td> <td>%price%</td></tr>";
$body .= "<tr><td><strong>Address:</strong></td> <td>%address%</td></tr>";
$body .= "<tr><td><strong>City:</strong></td> <td>%city%</td></tr>";
$body .= "<tr><td><strong>Zip:</strong></td> <td>%zip%</td></tr>";
$body .= "<tr><td><strong>Country:</strong></td> <td>%country%</td></tr>";
$body .= "</table>";
$body .='<br>';
$body .='<p><strong>Thank you for shopping with us. If you require additional order information 
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