<?php 
if($_SESSION['access_level']== "admin"){
//button for navigating to the 'access level' page
?>
<div>
	
	<form action="user_update_form.php" method="POST">
		<input type="hidden" name="user_id" value='<?php echo $row["user_id"]?>'/>
		<input type="submit" value="Access Level" />
	</form>
</div>
<?php 
;}
?>