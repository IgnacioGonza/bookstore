<?php 
if($_SESSION['access_level']== "admin"){

?>
<!--<div>-->
	
	<form action="confirm_delete_order.php" method="POST">
		<input type="hidden" name="orderid" value='<?php echo $row["orderid"]?>'/>
		<input type="hidden" name="orderid" value='<?php echo $orderid?>'/>
		<input style ="float:left;"class="btn btn-default btn-md" role="button" type="submit" value="Delete" />
	</form>
<!--</div>-->
<?php 
;}
?>