<?php
//Start Session
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
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD, DIRECTOR, INSTRUCTOR OR STUDENT.');
    window.location.href='http://c4ubooks.com/';
    </script>");
}
   include "header.php";
   $sql = "SELECT* FROM books";
   $result = $conn->query($sql);
   
   
   ?>
<div class=table-responsive>
    <h3><b>Catalog</b></h3>
    <table class=table>
        <tr>
            <th></th>
            <th> ISBN:</th>
            <th> Author </th>
            <th> Title </th>
            <th> Description </th>
            <th> Price </th>
            <?php if($access_level !== student){
            echo '<th>	<form action="books_publisher_form.php" method="POST">
		            <input type="submit" value="Add Book" /></form></th>';
            }
            ?>
            
        </tr>
        <?php
         while($row = $result->fetch_assoc()) {
         	
             echo "
             
                 <tr>
                  <td><img src='images/".$row["book_image"]."' style='width:100px; height:135px;'></td>" .
                 "<td>" . $row["book_isbn"]. "</td>" .
                 "<td>" . $row["book_author"]. "</td>" .  
                 "<td>" . $row["book_title"] . "</td> " . 
                 "<td>" . $row["book_desc"] . "</td> " .
                 "<td>$" . $row["book_price"]. "</td> 
             
                ";
             ?> 
             
            
            <?php
             
             if($_SESSION['access_level'] != "student"){
                 echo '
                  
                 <td> <form action = "orders_form_process.php" method="post" id="book_isbn">
                     	  <input type="hidden" name="book_isbn" value=' . $row["book_isbn"]. '>
                     	  <input type="submit" value="Create Order">
                     	  </form> </td>' ; 
                if($_SESSION['access_level'] !="instructor"){
                echo '
                     	  
                 <td> <form action = "confirm_delete_book.php" method="post" id="book_isbn">
                     	  <input type="hidden" name="book_isbn" value=' . $row["book_isbn"]. '>
                     	  <input type="submit" value="Delete">
                     	  </form> </td>
                     	  
                    ';
                }
                echo '
                     	  
                ';
             }
            
            ?>     
                 
            <?php
            
            echo '
                 	  
            </tr>
             
             ';
         }
         
         ?>
    </table>
</div>
<?php include "footer.php";?>