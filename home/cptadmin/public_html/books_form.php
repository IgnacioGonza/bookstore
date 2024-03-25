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

include "header.php";
//Getting the user id from the session
$userid = $_SESSION['user_id'];

require ('config.php');
$user_id = filter_input(INPUT_POST, 'user_id');
$publisher_name = filter_input(INPUT_POST, 'publisher_name');

// Checks to make sure all fields have been filled

if ($publisher_name == null)  {
die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>"); 
}

//Add publisher to Database
$sql = "INSERT INTO publisher (publisherid, publisher_name)
VALUES ('NULL', '$publisher_name')";

$result = $conn->query($sql);

$sql = "SELECT * FROM publisher ORDER BY publisherid DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$publisherid= $row["publisherid"];
		$publisher_name= $row["publisher_name"];
    }
}

$conn->close();


?>


<div class="container-fluid" style=background-color:#d8d8c0;>			
            <div class="table-responsive">
                    
                    <h3><b>Register a new book</b></h3>

					<form action="books.php" method="post">
					<div class="form-group form-group-lg">
					
                    <div class="row">
						<div class="col-lg-4">
						<strong>Title:</strong>
						<input class="form-control input-lg" type="text" name="book_title" placeholder = 'Arguing about Literature'<p id=book_title></p>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">
						<strong>Author:</strong></td>
						<input class="form-control input-lg" type="text" name="book_author" placeholder='Tom Smith'>
						</div>
					</div><br />
											
					<div class="row">
						<div class="col-lg-4">
						<strong>ISBN:</strong>
						<input class="form-control input-lg" type="text" name="book_isbn" placeholder='978-1-4576-0801-8'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Publisher:</strong>
						<input class="form-control input-lg" type="text" name="publisher_name" value='<?php echo $publisher_name ; ?>' readonly="readonly">
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">					
						<strong>Description:</strong>
						<input class="form-control input-lg" type="text" name="book_desc" placeholder='Once upon a time...'>
						</div>
					</div><br />					

					<div class="row">
						<div class="col-lg-4">					
						<strong>Price:</strong>
						<input class="form-control input-lg" type="text" name="book_price" placeholder='35.00'>
						</div>
					</div><br />
					
					<input type="hidden" value='<?php echo $userid ; ?>' name="user_id" />
					<input type="hidden" value='<?php echo $publisherid ; ?>' name="publisherid" />					
					
					<div class="row">
						<div class="col-lg-4">	
						<a href="index.php" class="btn btn-default btn-md" role="button">Back</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
					</div><br /> 						
					</form>
					</div>
    </div>
            
        
    </body
    </div>
    </div>
    
    <?php include "footer.php";?>
