<?php 
if($_SESSION['access_level']== "admin"||
   $_SESSION['access_level']== "director"||
   $_SESSION['access_level']== "depthead"||
   $_SESSION['access_level']== "instructor"){

?>
<div>
	
	<form action="order_details.php" method="POST">
		<input type="hidden" name="orderid" value='<?php echo $row["orderid"]?>'/>
		<input type="submit" value="Details" />
	</form>
</div>
<?php 
;}
?>