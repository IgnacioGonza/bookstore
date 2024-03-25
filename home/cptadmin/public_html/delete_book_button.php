<?php 
if($_SESSION['access_level']== "admin"){

?>
<!--<div>-->
	
	<form action="confirm_delete_book.php" method="POST">
		<input type="hidden" name="book_isbn" value='<?php echo $row["book_isbn"]?>'/>
		<input type="hidden" name="book_isbn" value='<?php echo $book_isbn?>'/>
		<input style = "float: left;" type="submit" value="Delete" />
	</form>
<!--</div>-->
<?php 
;}
?>