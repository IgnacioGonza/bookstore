<?php
/*
$orderid = 1;
$user_id = 2;
$amount = 40.00;
$semester = "Fall 2008";
$course_code = "IST 278";
$course_start = "2018-08-15";
$quantity = 9;
$date = "2018-07-24 19:31:39";
$updatedate = date("y-m-d");
$ship_name = "Robert Whaite";
$ship_address = "506 S Pleasantburg Dr";
$ship_city = "Greenville";
$ship_zip_code = "29607";
$ship_country = "US";
$book_isbn = 978-1-133-52610-0;
$comments = "Test";

*/


//Checks variable for letters ONLY
function alpha($alpha){
    if (ctype_alpha(str_replace(' ', '', $alpha)) === false ) {
      
        //Error Message
        die ("<html><script language='JavaScript'>alert('ERROR: Please check the letter fields.'),history.go(-1)</script></html>");
    
    
    }
}
//Checks variable for letter ONLY
alpha($ship_name);
alpha($ship_city);
alpha($ship_country);


//Checking for a valid ALPHA NUMERIC variables
function alpha_numeric($alphaNum){
$pattern = '[\-|\s|\.|\,]';
$alpha_numeric1 = preg_replace("$pattern","", $alphaNum);

    //Error Message
    if (!ctype_alnum($alpha_numeric1) === true){
        die ("<html><script language='JavaScript'>alert('ERROR: Please check the alpha numeric fields. Inputs can only contain letters),history.go(-1)</script></html>");
    }
}

//Checks for valid NUMERIC variables
function numeric($num){
$exp = '[\(|\)|-|\. |\s+|:]';
$num = preg_replace("$exp", "",$num);

    if (ctype_digit($num) === false) {
        die ("<html><script language='JavaScript'>alert('ERROR: Please check the numeric fields. Inputs can only contain Numbers.'),history.go(-1)</script></html>");
        
    }
}



//Checking for empty variables

if(empty($orderid)||
    empty($user_id)||
    empty($amount)||
    empty($semester)||
    empty($course_code)||
    empty($course_start)||
    empty($quantity)||
    empty($date)||
    empty($ship_name)||
    empty($ship_address)||
    empty($ship_city)||
    empty($ship_zip_code)||
    empty($ship_country)||
    empty($book_isbn)
){
    die ("<html><script language='JavaScript'>alert('No fields can be empty.'),history.go(-1)</script></html>");
}

//Checking for valid Alpha Numeric variable from POST
alpha_numeric($course_code);
alpha_numeric($ship_address);
alpha_numeric($comments);

//Checking for valid Numeric variables from POST
numeric($orderid);
numeric($user_id);
numeric($course_start);
numeric($quantity);
numeric($amount);
numeric($date);
numeric($ship_zip_code);
numeric($book_isbn);

//Quantity variable must be greater than 0

if($quantity <= 0){
   //Error Message
        die ("<html><script language='JavaScript'>alert('ERROR: Quantity must be greater than zero.'),history.go(-1)</script></html>"); 
}



include "config.php";
$sql = "SELECT * FROM orders ";
$conn->query($sql);
?>