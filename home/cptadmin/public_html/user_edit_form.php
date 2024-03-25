<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();

//echo $_SESSION['access_level'];

}
require ('config.php');

$user_id = trim(filter_input(INPUT_POST, 'user_id'));

if($_SESSION['access_level']!= "admin"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN.');
    window.location.href='http://c4ubooks.com';
    </script>");
}

$sql = 'SELECT * FROM users WHERE user_id = "'.$user_id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $username = $row["username"];
        $password = $row["password"];
        $email = $row["email"];
        $phone_number = $row["phone_number"];
        $access_level = $row["access_level"];
        
    }
    
   
    }
     else {
        echo "Failure";
}
        //makes sure the information is being passed
        /*
        echo $user_id;
        echo $first_name;
        echo $last_name;
        echo $username;
        echo $password;
        echo $email;
        echo $phone_number;
        echo $access_level;
        */

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
					

<form action="user_edit_process.php" method="post">
					<div class="form-group form-group-lg">

                    <div class="row">
						<div class="col-lg-4">
						<strong>User ID:</strong>
						<input class="form-control input-lg" type="text" name="user_id" value = '<?php echo $user_id ; ?>' readonly="readonly">
						<strong>First Name:</strong>
						<input class="form-control input-lg" type="text" name="first_name" value = '<?php echo $first_name ; ?>' >
						<strong>Last Name:</strong>
						<input class="form-control input-lg" type="text" name="last_name" value = '<?php echo $last_name ; ?>'>
						<strong>Username:</strong>
						<input class="form-control input-lg" type="text" name="username" value = '<?php echo $username ; ?>'>
						<strong>Password:</strong>
						<input class="form-control input-lg" type="text" name="password" value = '<?php echo $password ; ?>'>
						<strong>Email:</strong>
						<input class="form-control input-lg" type="text" name="email" value = '<?php echo $email ; ?>'>
						<strong>Phone Number:</strong>
						<input class="form-control input-lg" type="text" name="phone_number" value = '<?php echo $phone_number ; ?>'>
						</div>
					</div><br />
					<input type="hidden" value='<?php echo $user_id ; ?>' name="user_id" />
					
					<div class="row">
						<div class="col-lg-4">	
						<a href="user_management_form.php" class="btn btn-default btn-md" role="button">Back</a><input class="btn btn-default btn-md" role="button" type="submit" value="Submit">
						</div>
					</form>
					</div>
 </div>
 </div>

<?php include"footer.php";?>