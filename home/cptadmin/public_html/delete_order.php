<?php

if(session_id() == '') {
session_start();
}
require ('config.php');

if($_SESSION['access_level']!= "admin"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN');
    window.location.href='http://c4ubooks.com/';
    </script>");
}

// Retrieve data from POST array
$orderid = (filter_input(INPUT_POST, 'orderid'));


/*
echo "$orderid <br />";
*/


//Delete order from Database
$sql = "DELETE FROM orders WHERE orderid='".$orderid."'";

if ($conn->query($sql) === TRUE) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Order Successfully Deleted');
    window.location.href='http://c4ubooks.com/vieworders.php';
    </script>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>