<?php
// MAKE SURE THE $_SESSION ARRAY IS RUNNING
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"&&
    $_SESSION['access_level']!= "instructor"&&
    $_SESSION['access_level']!= "student"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD or DIRECTOR.');
    window.location.href='http://c4ubooks.com';
    </script>");
}
require ('config.php');

$sql = "SELECT book_author, book_desc, book_isbn, book_title FROM books";
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
                    
                    <h3><b>Make a New Order</b></h3>

                    
					
<table class="table">
	<tr> 
		<th> ISBN:</th>
		<th> Author </th>
		<th> Title </th>
	</tr>
    
<?php
while($row = $result->fetch_assoc()) {
	
    echo "<tr> <td>" . $row["book_isbn"]. "</td>" ."<td>". $row["book_author"]. 
			 "</td>" .  "<td>" . $row["book_title"] . "</td> " . 
"<td> <form action = 'orders_form_process.php' method='post' id='book_isbn'>
	  <input type='hidden' name='book_isbn' value='" . $row["book_isbn"]. "'>
	  <input type='submit' value='Make Order'>
	  </form> 
</td></tr>";
    }
?>
</table>


					</div>
    </div>
            
        
    </body
    </div>
	</div>

</html>

</body>
</html>