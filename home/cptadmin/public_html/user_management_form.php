<?php
require('config.php');
include "header.php";

$sql = 'SELECT * FROM users';
$result = $conn->query($sql);

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
        
        body {
            
        }
            
        </style>

    </head>
<body background="images/textbook.jpg">
<div class="container-fluid" style=background-color:#d8d8c0;>
<div class=table-responsive>
    <h3><b>User Management</b></h3>
    <table class=table>
        <tr>
            <th> User ID </th>
            <th> Fist Name </th>
            <th> Last Name </th>
            <th> Username </th>
            <th> Password </th>
            <th> Email </th>
            <th> Phone Number </th>
            <th> Access Level </th>
            <th></th>
            <th></th>
        </tr>
        <!--don't mess with code above this-->
        <?php
         while($row = $result->fetch_assoc()) {
         	
             echo "
             
        <tr> 
             <td>" . $row["user_id"] . "</td> " . 
             "<td>" . $row["first_name"]. "</td>" .
             "<td>" . $row["last_name"]. "</td>" .
             "<td>" . $row["username"]. "</td>" .
             "<td>" . $row["password"]. "</td>" .  
             "<td>" . $row["email"] . "</td> " .
             "<td>" . $row["phone_number"] . "</td> " .
             "<td>" . $row["access_level"]. "</td>" ?>
             <td><?php include "user_access_btn.php";
             include "user_edit_btn.php";
             include "user_delete_btn.php"?>
             </td>
        <?php
        
    "</tr>";
    }
?>
</table>

</div>



 </div>

<?php include"footer.php";?>
