<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}
if(!$_SESSION['validLogin'] === true) {
include"logout.php";
}

else {
require ('config.php');
$access_level = $_SESSION['access_level'];
//echo "Access Level: ".$access_level;
//echo "User Access Granted";
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
