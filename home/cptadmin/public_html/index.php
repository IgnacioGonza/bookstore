<!DOCTYPE html>
<html>
 <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content "IE=edge">
        <meta name="viewport" content="width"=device_width, initial-scale=1>

        <title>c4ubooks.com</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

        <style>
            
        </style>

    </head>
<body background="images/textbook.jpg">
      
<div class="container">      
<div style=background-color:#800000;>

            <div class="page-header">
                <header style=color:#FFFFFF;>
                    <h1>Bookstore Order System</h1></header>
            </div>
</div>            

<div class="container-fluid" style=background-color:#d8d8c0
;>
<?php include "header_navigation.php"; ?>
<h3> Log In</h3><br />
<form class="form" name="jb3_login" method="post"
action="login.php">
<div class="form-group form-group-lg">
<div class="row">
<div class="col-lg-4">
<label for="userPrimaryEmail"><b>Username:</b></label>
<input class="form-control input-lg" type="text"
name="username" value="" placeholder="Enter your username" />
</div></div><br />
<div class="row">
<div class="col-lg-4">
<label for="userPassword"><b>Enter your password:</b></label>
<input class="form-control input-lg" type="password"
name="password" value="" required="required" />
</div></div><br />
<input class="btn btn-default" type="submit" value="Log In">
<input class="btn btn-default" type="reset" name="reset"
value="Reset">
<a href="register_form.php" class="btn btn-default btn-md" role="button">Register</a>
</form>
</div> <!-- Close form-group -->
<p><a href="forgot_password_form.php" target="_top">Forgot Your
Password?</a></p>

<p style="border:1px solid black;padding:2px;margin:30px; background-color:#800000; color:white;">
                    <em>Bookstore Order System</em> is an application that will enable users to lookup, add, or edit textbook orders. Instructors will be able to order textbooks for their respective courses.</p>

                

                
            


<?php include"footer.php";?>