<?php
	
	/*$hostname="localhost:3306";
	$dbusername="cptadmin_dbadmin";
	$dbpassword="P4ssword!";
	$dbname="cptadmin_C4UDB";

	mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysql_select_db($dbname);
 */


    $servername = "localhost:3306";
	$dbusername="cptadmin_dbadmin";
	$dbpassword="P4ssword!";
	$dbname="cptadmin_C4UDB";

// Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

// Check connection
if ($conn->connect_error) {
    
    die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
} 

?>