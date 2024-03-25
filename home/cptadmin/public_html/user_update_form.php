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


$conn->query($sql);

?>

<?php 
include "header.php";
//echo "user_id".$user_id;
$sql = 'SELECT * FROM users WHERE user_id = "'.$user_id.'"';
$result2 = $conn->query($sql);
// added before div class is added below


?>
<div class="table-responsive">
    <h3><b>Access Level Assignment</b></h3>
<table class="table">
    
<tr> 
		<th>User ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username</th>
		<th>Current Access Level</th>
	</tr>
    
<?php
while($row = $result2->fetch_assoc()) {
	
echo "

    <tr> 
         <td>".$row["user_id"]. "</td>" .
        "<td>".$row["first_name"]. "</td>" .  
        "<td>".$row["last_name"] . "</td> "  .  
        "<td>".$row["username"] . "</td> "  .  
        "<td>".$row["access_level"] . "</td> " ?> <?php
        
    "</tr>";
    }
   
?>
</table>
</div>
          <form action="user_update_process.php" method="post" enctype="multipart/form-data">
          <label for='access_level'>Assign a New Access Level:</label>
            <select name="access_level"><!--access_level instead of access_list for this and label now-->
                <option value="" selected disabled hidden>-Select an Access Level-</option>
            <?php 
            $sql = 'SELECT DISTINCT access_level FROM users';
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" .$row['access_level']."'>" . $row['access_level'] . "</option>";
            }
            ?>
            </select>
            <br>
            

<!--a slightly reworked version of the update and back buttons that seem to return the desired information, enctype is new-->
<!--<form action="user_update_process.php" method="post" enctype="multipart/form-data">-->
		<input type="hidden" value='<?php echo $user_id ; ?>' name="user_id" />
		<input type="submit" value="Update" />
</form>
<a href="user_management_form.php" class="btn btn-default btn-md" role="button">Back</a>
<!--reworked buttons end here-->




<?php include "footer.php";?>