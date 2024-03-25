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

$user_id = filter_input(INPUT_POST, 'user_id');
//echo $user_id;

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
<!--Confirmation Page-->

<div class="container-fluid" style=background-color:#d8d8c0;>			
            
            <?php include "header_navigation.php"; ?>
                    
                    <h3><b>Confirmation Page</b></h3>
					
				<p>Are you sure you want to <strong>delete</strong> this user?<p>

				<form action = "user_delete_process.php" method="post" id="user_delete_process">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"
				<label>&nbsp;</label>
				<input type="submit" value="Delete User">
				
				
				<p><b><div class="row">
						<div class="col-lg-4">	
						<a href="user_management_form.php"class="btn btn-default btn-md" role="button">Go Back</a>
						</div>
					  </div>
				</form>
</div>
  </div> 
  </div>          

</body>
</html>
<?php include"footer.php";?>