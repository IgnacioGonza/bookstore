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
    window.location.href='http://c4ubooks.com/catalog.php';
    </script>");
}

include "header.php";

//Getting the user id from the session
$userid = $_SESSION['user_id'];

?>

<div class="container-fluid" style=background-color:#d8d8c0;>			
            <div class="table-responsive">
                    
                    <h3><b>Register new Publisher</b></h3>

<form action="books_form.php" method="post">
					<div class="form-group form-group-lg">
										
					<div class="row">
						<div class="col-lg-4">	
						<strong>Publisher Name:</strong>
						<input class="form-control input-lg" type="text" name="publisher_name" placeholder='Cengage Learning'>
						</div>
					</div><br />
					
					<input type="hidden" value='<?php echo $userid ; ?>' name="user_id" />
					
					<div class="row">
						<div class="col-lg-4">	
						<a href="catalog.php" class="btn btn-default btn-md" role="button">Back</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
					</div><br /> 						
					</form>
					</div>
    </div>
    </div>
            
        
  <?php include "footer.php"?>