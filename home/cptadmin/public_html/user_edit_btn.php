<?php 
if($_SESSION['access_level']== "admin"){

?>
<div>
	
	<form action="user_edit_form.php" method="POST">
		<input type="hidden" name="user_id" value='<?php echo $row["user_id"]?>'/>
		<input type="submit" value="Edit" />
	</form>
</div>
<?php 
;}
?>