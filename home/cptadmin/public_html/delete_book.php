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
$book_isbn = (filter_input(INPUT_POST, 'book_isbn'));


echo "$book_isbn <br />";


//Delete book from Database
$sql = "DELETE FROM books WHERE book_isbn='".$book_isbn."'";

if ($conn->query($sql) === TRUE) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Book Successfully Deleted');
    window.location.href='http://c4ubooks.com/catalog.php';
    </script>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>