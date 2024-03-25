<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}
?>


<!DOCTYPE html>
    <html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div class="container" style=background-color:#000000;;>    
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
                    
                    <h3><b>Register New User</b></h3>

                    <div class="form-group form-group-lg">
                    <form action="register.php" method="post">
					
					
                    <div class="row">
						<div class="col-lg-4">
						<strong>First Name:</strong>
						<input class="form-control input-lg" type="text" name="first_name" placeholder = 'John'<p id=first_name></p>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">
						<strong>Last Name:</strong></td>
						<input class="form-control input-lg" type="text" name="last_name" placeholder='Smith'>
						</div>
					</div><br />	
						
					<div class="row">
						<div class="col-lg-4">
						<strong>Username:</strong>
						<input class="form-control input-lg" type="text" name="username" placeholder='JohnSmith123'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Password:</strong>
						<input class="form-control input-lg" type="password" name="password" placeholder='JohnSmith123'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">					
						<strong>Email:</strong>
						<input class="form-control input-lg" type="text" name="email" placeholder='johnsmith@gmail.com'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
						<strong>Phone Number:</strong>
						<input class="form-control input-lg" type="text" name="phone_number" placeholder='8645551234'>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-lg-4">	
							<a href="http://c4ubooks.com/" class="btn btn-default btn-md" role="button">Back</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
						</div>
						
						
						
						
						</form>
						
					</div>
					
 </div>
 
 
 

<?php include"footer.php";?>