<?php

// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"&&
    $_SESSION['access_level']!= "instructor"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD or DIRECTOR.');
    window.location.href='http://c4ubooks.com';
    </script>");
}
//Getting the user id from the session
$userid = $_SESSION['user_id'];

require ('config.php');

$book_isbn = filter_input(INPUT_POST, 'book_isbn');

$sql = "SELECT * FROM books WHERE book_isbn = '".$book_isbn."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $book_author = $row["book_author"];
        $book_title = $row["book_title"];
        $book_isbn = $row["book_isbn"];
        $publisherid= $row["publisherid"];
        $book_price = $row["book_price"];
        $image = $row["book_image"];
    }
}

$sql = "SELECT * FROM publisher WHERE publisherid = '".$publisherid."'";
$result2 = $conn->query($sql);

if($result2->num_rows > 0){
    while($row = $result2->fetch_assoc()) {
        $publisherid = $row["publisherid"];
        $publisher_name = $row["publisher_name"];
    }
}

?>

<!DOCTYPE html>
<html>
 <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content "IE=edge">
        <meta name="viewport" content="width"=device_width, initial-scale=1>

        <title>c4ubooks.com</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

        <style>
            .jumbotron {
                background-color: #2E2D88;
                color: white;
            }
        </style>

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
                    
                    <h3><b>Create Order</b></h3>

                    
					

<form action="orders.php" method="post">
					<div class="form-group form-group-lg">

                    <div>
                        <img src="images/<?php echo $image ?>" style="width:200px;height:300px;" >
                    </div><br />
                    <div class="row">
						<div class="col-lg-7">
						<strong>Title:</strong>
						<input class="form-control input-lg" type="text" name="book_title" value = '<?php echo $book_title ; ?>' readonly="readonly">
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">
						<strong>Author:</strong></td>
						<input class="form-control input-lg" type="text" name="book_author" value='<?php echo $book_author ; ?>' readonly="readonly">
						</div>
					</div><br />
					<div class="row">
						<div class="col-lg-4">
						<strong>ISBN:</strong>
						<input class="form-control input-lg" type="text" name="book_isbn" value='<?php echo $book_isbn ; ?>' readonly="readonly">
						</div>
					</div><br />
					
					<!-- Provide a List of Publishers or user can type a new one, and associate with a publisher ID-->
					<div class="row">
						<div class="col-lg-4">	
						<strong>Publisher:</strong>
						<input class="form-control input-lg" type="text" name="publisher_name" value='<?php echo $publisher_name ; ?>' readonly="readonly">
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">					
						<strong>Semester:</strong>
						<input class="form-control input-lg" type="text" name="semester" placeholder='Fall 2018'>
						</div>
					</div><br />
					
					<!-- Large button group 
<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control form-control-sm" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div><br />
-->
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Campus Name:</strong>
						<input class="form-control input-lg" type="text" name="campus" placeholder='Barton Campus'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Course Code:</strong>
						<input class="form-control input-lg" type="text" name="course_code" placeholder='IST 278'>
						</div>
					</div><br />
					
				    <!-- Maaybe add a calendar to let the user choose the exact date -->
					<div class="row">
						<div class="col-lg-4">	
						<strong>Course Start Date:</strong>
						<input class="form-control input-lg" type="text" name="course_start" placeholder='2018-08-05'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Name:</strong>
						<input class="form-control input-lg" type="text" name="ship_name" placeholder='Jonathan'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Address:</strong>
						<input class="form-control input-lg" type="text" name="ship_address" placeholder='123 Maple Street'>
						</div>
					</div><br />

					<div class="row">
						<div class="col-lg-4">	
						<strong>City:</strong>
						<input class="form-control input-lg" type="text" name="ship_city" placeholder='Greenville'>
						</div>
					</div><br />

					<div class="row">
						<div class="col-lg-4">	
						<strong>Zip:</strong>
						<input class="form-control input-lg" type="text" name="ship_zip_code" placeholder='12345'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Country:</strong>
						<input class="form-control input-lg" type="text" name="ship_country" placeholder='US'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Quantity:</strong>
						<input class="form-control input-lg" type="text" name="quantity" placeholder='50'>
						</div>
					</div><br />
					<div class="row">
						<div class="col-lg-4">	
						<strong>Comments:</strong>
						<input class="form-control input-lg" type="text" name="comments" placeholder='Write Comments Here...'>
						</div>
					</div><br />
					
					<input type="hidden" value='<?php echo $userid ; ?>' name="user_id" />
					<input type="hidden" value='<?php echo $book_price ; ?>' name="book_price" />
					
					<div class="row">
						<div class="col-lg-4">	
						<a href="catalog.php" class="btn btn-default btn-md" role="button">Back</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
					</div><br /> 						
					</form>
					</div>
  
 </div>

<?php include"footer.php";?>