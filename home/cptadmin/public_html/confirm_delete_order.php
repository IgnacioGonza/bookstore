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

$orderid = filter_input(INPUT_POST, 'orderid');
//echo $orderid;

include "header.php";
?>

                    
                    <h3><b>Confirmation Page</b></h3>
					
				<h4>Are you sure you want to delete record #: <b><?php echo $orderid?>?</b><h4>

				<form action = "delete_order.php" method="post" id="delete_order">
				<input type="hidden" name="orderid" value="<?php echo $orderid; ?>"
				<label>&nbsp;</label>
				<a href="order_details.php" class="btn btn-default btn-md" role="button">Back</a>
				<input type="submit" value="Delete Order">


				</form>

            
        
<?php include "footer.php";?>