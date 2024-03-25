<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();

//echo $_SESSION['access_level'];

//$user_id = $_SESSION['user_id'];
}
require ('config.php');

$orderid = filter_input(INPUT_POST, 'orderid');
//$orderid = $_SESSION['orderid'];

//echo $orderid;
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD or DIRECTOR.');
    window.location.href='http://c4ubooks.com';
    </script>");
}

$sql = 'SELECT * FROM orders WHERE orderid = "'.$orderid.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orderid = $row["orderid"];
        $user_id = $row["user_id"];
        $amount = $row["amount"];
        $semester = $row["semester"];
        $course_code = $row["course_code"];
        $course_start = $row["course_start"];
        $quantity = $row["quantity"];
        $date = $row["date"];
        $ship_name = $row["ship_name"];
        $ship_address = $row["ship_address"];
        $ship_city = $row["ship_city"];
        $ship_zip_code = $row["ship_zip_code"];
        $ship_country = $row["ship_country"];
        $book_isbn = $row["book_isbn"];
        $comments = $row['comments'];
        $confirmation_number = $row['confirmation_number'];
        
    }
    
   
    }
     

        /*echo $orderid;
        echo $user_id;
        echo $amount;
        echo $semester;
        echo $course_code;
        echo $course_start;
        echo $date;
        echo $ship_name;
        echo $ship_address;
        echo $ship_city;
        echo $ship_zip_code;
        echo $ship_country;*/

?>

<!DOCTYPE html>
<html>
 <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content "IE=edge">
        <meta name="viewport" content="width"=device_width, initial-scale=1>

        <title>c4ubooks.com</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


    </head>
<div class="container" style=background-color:#000000;>    
<body background="images/textbook.jpg">


            <div style="background-color:#800000;">
            <div class="page-header">
                <header style=color:#FFFFFF;>
                    <h1>Bookstore Order System</h1></header>
<!-------------------------CUSTOM NAVIGATION BAR ----------------------->

     <?php 
     include "navigation_bar.php"; ?>
<!---------------------------------------------------------------------->



</div> 
<div class="container-fluid" style=background-color:#d8d8c0;>			
            <div class="table-responsive">
                <?php include "header_navigation.php"; ?>
					

<form action="edit_orders.php" method="post">
					<div class="form-group form-group-lg">

                    <div class="row">
						<div class="col-lg-4">
						<strong>Order ID:</strong>
						<input class="form-control input-lg" type="text" name="orderid" value = '<?php echo $orderid ; ?>' readonly="readonly">
						<strong>Confirmation Number:</strong>
						<input class="form-control input-lg" type="text" name="confirmation_number" value = '<?php echo $confirmation_number ; ?>' readonly="readonly">
						<strong>User ID:</strong>
						<input class="form-control input-lg" type="text" name="user_id" value = '<?php echo $user_id ; ?>' readonly="readonly">
						<strong>Semester:</strong>
						<input class="form-control input-lg" type="text" name="semester" value = '<?php echo $semester ; ?>'>
						<strong>Course Code:</strong>
						<input class="form-control input-lg" type="text" name="course_code" value = '<?php echo $course_code ; ?>'>
						<strong>CourseStart:</strong>
						<input class="form-control input-lg" type="text" name="course_start" value = '<?php echo $course_start ; ?>'>
						<strong>Quantity:</strong>
						<input class="form-control input-lg" type="text" name="quantity" value = '<?php echo $quantity ; ?>'>
						<strong>Ship Name:</strong>
						<input class="form-control input-lg" type="text" name="ship_name" value = '<?php echo $ship_name ; ?>'readonly="readonly">
						<strong>Ship Address:</strong>
						<input class="form-control input-lg" type="text" name="ship_address" value = '<?php echo $ship_address ; ?>'readonly="readonly">
						<strong>Ship City:</strong>
						<input class="form-control input-lg" type="text" name="ship_city" value = '<?php echo $ship_city ; ?>'readonly="readonly">
						<strong>Ship Zip Code:</strong>
						<input class="form-control input-lg" type="text" name="ship_zip_code" value = '<?php echo $ship_zip_code ; ?>'readonly="readonly">
						<strong>Ship Country:</strong>
						<input class="form-control input-lg" type="text" name="ship_country" value = '<?php echo $ship_country ; ?>'readonly="readonly">
						<strong>Book ISBN:</strong>
						<input class="form-control input-lg" type="text" name="book_isbn" value = '<?php echo $book_isbn ; ?>'readonly="readonly">
						<strong>Comments:</strong>
						<input class="form-control input-lg" type="text" name="comments" value = '<?php echo $comments ; ?>'>
						</div>
					</div><br />
					<input type="hidden" value='<?php echo $user_id ; ?>' name="user_id" />
					<input type="hidden" value='<?php echo $date ; ?>' name="date" />
					
					<div class="row">
						<div class="col-lg-4">	
							<a href="vieworders.php" class="btn btn-default btn-md" role="button">Cancel</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
						</div>
					</form>
					
					</div>
					<div style = "float: left;">
					<!--<form action="order_details.php" method="POST">
		<input type="hidden" name="orderid" value='<?php echo $orderid?>'/>
		<!--<td align = "right"><a href="vieworders.php" class="btn btn-default btn-md" role="button">Cancel</a></td>
		<!--<input class="btn btn-default btn-md" role="button" style = "float: right;" type="submit" value="Back" />
	</form> -->
	</div>
 </div>
 </div>

<?php include"footer.php";?>