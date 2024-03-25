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
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$phone_number = filter_input(INPUT_POST, 'phone_number');


//Updates User Information in Database
$sql = "
UPDATE users 
SET 
first_name = '$first_name', 
last_name = '$last_name', 
username = '$username',
password = '$password',
email = '$email',
phone_number = '$phone_number'
WHERE user_id=$user_id";
$conn->query($sql);

?>

<?php 
include "header.php";
//echo "user_id".$user_id;
$sql = 'SELECT * FROM users WHERE user_id = "'.$user_id.'"';
$result2 = $conn->query($sql);
?>
<div class="table-responsive">
    <h3><b>Confirmation Page</b></h3>
<table class="table">
    
    <tr> 
		<th>User_ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Phone Number</th>
		<th></th>
		<th></th>
	</tr>
    
<?php
while($row = $result2->fetch_assoc()) {
	
echo "<tr> 
         <td>".$row["user_id"]. "</td>" .
        "<td>".$row["first_name"]. "</td>" .  
        "<td>".$row["last_name"] . "</td> "  .  
        "<td>".$row["username"] . "</td> "  .  
        "<td>".$row["password"] . "</td> "  .  
        "<td>".$row["email"] . "</td> "  .
        "<td>".$row["phone_number"] . "</td> " ?>
        <td> <?php include"user_edit_btn.php"; ?></td>  <?php ?>
        <td> <?php include"user_delete_btn.php"; ?></td>  <?php
        
    "</tr>";
    }
   
?>
</table>
</div>
<?php include "footer.php";?>