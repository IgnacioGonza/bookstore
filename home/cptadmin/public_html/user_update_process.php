<?php
//Start Session
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN.');
    window.location.href='http://c4ubooks.com/';
    </script>");
}


require ('config.php');
// Retrieve data from POST array
$user_id = filter_input(INPUT_POST, 'user_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$username = filter_input(INPUT_POST, 'username');
$access_level = filter_input(INPUT_POST, 'access_level');

echo "User Access Level: ".$access_level;


$sql = "
UPDATE users 
SET 
access_level = '$access_level'
WHERE user_id=$user_id";

$conn->query($sql);

?>


<?php 
include "header.php";
//the line below was originally echoed
"user_id".$user_id;
$sql = 'SELECT * FROM users WHERE user_id = "'.$user_id.'"';
$result2 = $conn->query($sql);
?>
<div class="table-responsive">
    <h3><b>Access Level Confirmation</b></h3>
<table class="table">
    
<tr> 
		<th>User ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username</th>
		<th>New Access Level</th>
	</tr>
    
<?php
while($row = $result2->fetch_assoc()) {
	
echo "

    <tr> 
         <td>".$row["user_id"]. "</td>" .
        "<td>".$row["first_name"] . "</td> "  .  
        "<td>".$row["last_name"] . "</td> "  .  
        "<td>".$row["username"] . "</td> "  .  
        "<td>".$row["access_level"] . "</td> " ?> <?php
        
    "</tr>";
    }
   
?>
</table>
</div>

<a href ="user_management_form.php" class="btn btn-default btn-md" 
role="button">Continue</a>



<?php include "footer.php";?>