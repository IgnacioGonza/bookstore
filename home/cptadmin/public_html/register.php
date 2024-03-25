<?php

if(session_id() == '') {
session_start();
}


require ('config.php');
// Retrieve data from POST array
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$phone_number = filter_input(INPUT_POST, 'phone_number');
$access_level = "student";

/*echo "$first_name <br />";
echo "$last_name <br />";
echo "$password <br />";
echo "$email <br />";
echo "$phone_number <br />";*/

// Error Handlers


// Checks to make sure all fields have been filled

if ($first_name == null || 
    $last_name == null ||
    $username == null ||
    $password == null || 
    $email == null || 
    $phone_number == null)  {


die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>"); 
} 

// Checks to make sure the "FIRST" and "LAST" name fields only contain letters
if (ctype_alpha(str_replace(' ', '', $first_name)) === false || 
ctype_alpha(str_replace(' ', '', $last_name))=== false) {
  
    die ("<html><script language='JavaScript'>alert('Please check the First and Last name fields. These fields can only contain letters.'),history.go(-1)</script></html>");  

}
//Checks for valid email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die ("<html><script language='JavaScript'>alert('Please type in a valid Email Address.'),history.go(-1)</script></html>"); 
}

// Checks for valid phone number

$formattedPhoneExp = '[\(|\)|-|\. |\s+]';
$phone_number = preg_replace("$formattedPhoneExp", "",$phone_number);

//Checks to makes sure phone number contains only integers
if(!filter_var($phone_number, FILTER_VALIDATE_INT)){

    die ("<html><script language='JavaScript'>alert('Invalid Phone Number format. Phone Number can only contain numbers.'),history.go(-1)</script></html>"); 
}

//Checks to make sure phone number is 10 digits long
if(strlen($phone_number) != 10){
    
    die ("<html><script language='JavaScript'>alert('Phone Number must contain 10 digits.'),history.go(-1)</script></html>"); 
}


//Add User to Database
$sql = "INSERT INTO users (user_id, first_name, last_name, username, password, email, phone_number, access_level)
VALUES ('NULL', '$first_name', '$last_name', '$username', '$password', '$email', '$phone_number', '$access_level')";

if ($conn->query($sql) === TRUE) {
    echo '<a href="index.php">New user created successfully - please click  to login</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>