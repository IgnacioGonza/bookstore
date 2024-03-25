<?php

// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}

if($_SESSION['access_level']!= "admin"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN');
    window.location.href='http://c4ubooks.com/';
    </script>");
}

$book_isbn = filter_input(INPUT_POST, 'book_isbn');

require ('config.php');

$sql = "SELECT book_isbn FROM orders WHERE book_isbn='".$book_isbn."'";

$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
echo ("<script LANGUAGE='JavaScript'>
    window.alert('The selected book cannot be deleted, because is currently linked to 1 or more orders.');
    window.location.href='http://c4ubooks.com/catalog.php';
    </script>");
}


include "header.php";

?>

                    <h3><b>Confirmation Page</b></h3>
					
				<h4>Are you sure you want to delete book #: <b><?php echo $book_isbn?>?</b><h4>

				<form action = "delete_book.php" method="post" id="delete_book">
				<input type="hidden" name="book_isbn" value="<?php echo $book_isbn; ?>"
				<label>&nbsp;</label>
				<a href="catalog.php" class="btn btn-default btn-md" role="button">Back</a>
				<input class="btn btn-default btn-md" type="submit" value="Delete Book">


				</form>

            
        
<?php include "footer.php";?>