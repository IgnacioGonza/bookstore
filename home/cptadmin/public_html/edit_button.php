<?php 
if($_SESSION['access_level']== "admin"||
   $_SESSION['access_level']== "director"||
   $_SESSION['access_level']== "depthead"){

?>
<!--<div> -->
	<form action="edit_orders_form.php" method="POST">
        		<input type="hidden" name="orderid" value='<?php echo $row["orderid"]?>'/>
        		<input type="hidden" name="orderid" value='<?php echo $orderid?>'/>
        		<input type="hidden" name="book_isbn" value='<?php echo $row["book_isbn"]?>'/>
        		<input type="hidden" name="confirmation_number" value='<?php echo $row["confirmation_number"]?>'/>
        		<input  style ="float:left;"class="btn btn-default btn-md" role="button"  type="submit" value="Edit" />
        	</form>
    	
<!--</div> -->
<?php 
;}
?>