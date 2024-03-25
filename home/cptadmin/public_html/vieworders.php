<?php
//Start Session
if(session_id() == '') {
session_start();
}

//Checking if user has the correct access level to view webpage.
if($_SESSION['access_level']!= "admin"&&
    $_SESSION['access_level']!= "depthead"&&
    $_SESSION['access_level']!= "director"&&
    $_SESSION['access_level']!= "instructor"){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Restricted Access. User Level must be ADMIN, DEPTARTMENT HEAD, DIRECTOR or INSTRUCTOR.');
    window.location.href='http://c4ubooks.com';
    </script>");
}
//$_SESSION['access_level'] = "instructor";
include "header.php";

if ($_SESSION['access_level']== "instructor")
{
$sql = 'SELECT * FROM orders WHERE user_id = "'.$_SESSION['user_id'].'" ORDER BY date DESC';
$result = $conn->query($sql);    
}
else {
$sql = "SELECT * FROM orders ORDER BY date DESC";
$result = $conn->query($sql);
}
?>
<div class="table-responsive">
    <h3><b>Orders</b></h3>
<table class="table">
    
<tr> 
    <th>Order_ID</th>
    <th>User_ID</th>
    <th>Amount</th>
    <!--<th>Semester</th>
    <th>Campus</th>
    <th>Course Code</th>
    <th>Course Start</th>
    <th>Quantity</th>-->
    <th>Date Ordered</th>
    <th>Order Status</th>
    <th>Ship Name</th>
    <th>Ship Address</th>
    <th>Ship City</th>
    <th>Ship Zip Code</th>
    <th>Ship Country</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
    
<?php
$t= time();
$current_time = date("Y-m-d H:i",$t);
//echo "Current Time ".$current_time."</br>";
while($row = $result->fetch_assoc()) {
    
//ORDER STATUS....

//Figuring out the time diff for order status variable
    
$date1=date_create("$current_time");
$date2=date_create($row["date"]);
$diff=date_diff($date1,$date2);
$diff = $diff->format("%a");
//echo "Difference". $diff;

//Assinging a Value to the $diff variable depending on how many days the order has been in the system

//Orders less than 1 day
if ($diff <1){
$diff="Pending";
}
//Orders less than 2 days
elseif ($diff <2){
$diff="Processing" ;   
}
//Orders less than 3 days
elseif ($diff <3){
$diff="Shipped";
}
//Orders 3 days or more
elseif ($diff >=3){
$diff="Delivered";
}
else{
$diff = "N/A";
}    

echo "<tr> 
         <td>".$row["orderid"]. "</td>" .
        "<td>".$row["user_id"]. "</td>" .  
        "<td>$".$row["amount"] . "</td> "  .  
        /*"<td>".$row["semester"] . "</td> "  . 
        "<td>".$row["campus"] . "</td> "  .
        "<td>".$row["course_code"] . "</td> "  .  
        "<td>".$row["course_start"] . "</td> "  .
        "<td>".$row["quantity"] . "</td> "  . */
        "<td>".$row["date"] . "</td> "  .
        "<td>".$diff. "</td> "  .
        "<td>".$row["ship_name"] . "</td> "  .
        "<td>".$row["ship_address"] . "</td> "  .
        "<td>".$row["ship_city"] . "</td> "  .
        "<td>".$row["ship_zip_code"] . "</td> "  .
        "<td>".$row["ship_country"] . "</td>" ?>
        <td> <?php 
        include"order_details_button.php";
        //include"edit_button.php";
        //include"reorder_button.php";
        //include"delete_button.php";?></td>  <?php
        
    "</tr>";
    }
?>
</table>
</div>

<?php
include "footer.php";
?>