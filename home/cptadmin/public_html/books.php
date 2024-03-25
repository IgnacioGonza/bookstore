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

// Retrieve data from POST array
$user_id = filter_input(INPUT_POST, 'user_id');
$book_title = filter_input(INPUT_POST, 'book_title');
$book_author = filter_input(INPUT_POST, 'book_author');
$book_isbn = filter_input(INPUT_POST, 'book_isbn');
$publisherid = filter_input(INPUT_POST, 'publisherid');
$book_desc = filter_input(INPUT_POST, 'book_desc');
$book_price = filter_input(INPUT_POST, 'book_price');

$price = number_format($book_price, 2);

// Error Handlers

// Checks to make sure all fields have been filled

if ($book_title == null || 
    $book_author == null ||
    $book_desc == null ||
    $book_isbn == null || 
    $price == null)  {


die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>"); 
} 

// Checks to make sure the author only conatins letters
if (ctype_alpha(str_replace(' ', '', $book_author)) === false) {
  
    die ("<html><script language='JavaScript'>alert('Please check the book Author field. It can only contain letters.'),history.go(-1)</script></html>");  

}

//Add book to Database
$sql = "INSERT INTO books (book_isbn, book_title, book_author, book_image, book_desc, book_price, publisherid)
VALUES ('$book_isbn', '$book_title', '$book_author', 'imagepending.jpg', '$book_desc', '$price', '$publisherid')";

if ($conn->query($sql) === TRUE) {
    echo '<a href="catalog.php">New book added successfully</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>