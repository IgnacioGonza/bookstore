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
$user_id = (filter_input(INPUT_POST, 'user_id'));

//Delete user from Database
$sql = "DELETE FROM users WHERE user_id='".$user_id."'";

if ($conn->query($sql) === TRUE) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('User Successfully Deleted');
    window.location.href='http://c4ubooks.com/user_management_form.php';
    </script>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>