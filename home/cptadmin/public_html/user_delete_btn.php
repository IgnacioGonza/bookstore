<?php 
if($_SESSION['access_level']== "admin"){

?>
<div>
	
	<form action="user_delete_confirm.php" method="POST">
		<input type="hidden" name="user_id" value='<?php echo $row["user_id"]?>'/>
		<input type="submit" value="Delete" />
	</form>
</div>
<?php 
;}
?>