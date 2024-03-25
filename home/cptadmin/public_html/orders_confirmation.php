<?php
include "header.php";



$sql = 'SELECT * FROM orders WHERE confirmation_number = "'.$confirmation_number.'" ';
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orderid = $row["orderid"];
        $user_id = $row["user_id"];
        $amount = $row["amount"];
        $semester = $row["semester"];
        $campus = $row["campus"];
        $course_code = $row["course_code"];
        $course_start = $row["course_start"];
        $quantity = $row["quantity"];
        $date = $row["date"];
        $ship_name = $row["ship_name"];
        $ship_address = $row["ship_address"];
        $ship_city = $row["ship_city"];
        $ship_zip_code = $row["ship_zip_code"];
        $ship_country = $row["ship_country"];
        $book_isbn = $row["book_isbn"];
        $comments = $row['comments'];
        $confirmation = $row['confirmation_number'];
        
    }
    
   
    }
if ($comments == ""){
    $comments = "No Comments Posted";
}    
    
$sql = 'SELECT * FROM books WHERE book_isbn = "'.$book_isbn.'" ';
$result2 = $conn->query($sql); 

if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
        $book_isbn = $row2["book_isbn"];
        $book_title = $row2["book_title"];
        $book_author = $row2["book_author"];
        }
    }
// WHO IS THE LEAD INSTRUCTOR??
$sql = 'SELECT * FROM users WHERE last_name = "Whaite" ';
$result3 = $conn->query($sql); 

if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
        
        //Adding Names..
        $instructor_name = $row3['first_name']." ". $row3['last_name'];
        $instructor_email = $row3["email"];
        $instructor_phone_number = $row3["phone_number"];
        }
    }
// ACADEMIC PROGRAM DIRECTOR
$sql = 'SELECT * FROM users WHERE last_name = "Sanders" ';
$result4 = $conn->query($sql); 

if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc()) {
        $director_name = $row4['first_name']." ". $row4['last_name'];
        $director_email = $row4["email"];
        $director_phone_number = $row4["phone_number"];
        }
    }
// DEPARTMENT HEAD
$sql = 'SELECT * FROM users WHERE last_name = "Cluley" ';
$result5 = $conn->query($sql); 

if ($result5->num_rows > 0) {
    while($row5 = $result5->fetch_assoc()) {
        $depthead_name = $row5['first_name']." ". $row5['last_name'];
        $depthead_email = $row5["email"];
        $depthead_phone_number = $row5["phone_number"];
        }
    }
$t= time();
$current_time = date("Y-m-d H:i",$t);
//echo "Current Time ".$current_time."</br>";
    
//ORDER STATUS....

//Figuring out the time diff for order status variable
    
$date1=date_create("$current_time");
$date2=date_create($date);
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

$order_status = $diff;


?>

<div class="table-responsive">
                <table class="table table-bordered table-hover" style="overflow-x:auto; background-color:#f2f2f2;">
                    <thead>
                        <tr>
                            <td colspan="15" style="color:#000000;"><h3><b>Confirmation: </b><?php echo $confirmation_number;?></h3></td>
                        </tr>
                    </thead>
                    
                    <tr>
                        <td align="right"><strong>User ID:</strong></td>
                        <td><?php echo $user_id ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Order ID:</strong></td>
                        <td><?php echo $orderid ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Order Date:</strong></td>
                        <td><?php echo $date ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Confirmation Number:</strong></td>
                        <td><?php echo $confirmation_number ?></td>
                    </tr>
                     <tr>
                        <td align="right"><strong>Order Status:</strong></td>
                        <td><?php echo $order_status ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Title:</strong></td>
                        <td><?php echo $book_title ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Author:</strong></td>
                        <td><?php echo $book_author ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Book ISBN:</strong></td>
                        <td><?php echo $book_isbn ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Semester:</strong></td>
                        <td><?php echo $semester ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Campus:</strong></td>
                        <td><?php echo $campus ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Course Code:</strong></td>
                        <td><?php echo $course_code ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Course Start:</strong></td>
                        <td><?php echo $course_start ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Quantity:</strong></td>
                        <td><?php echo $quantity ?></td>
                    </tr>
                     <tr>
                        <td align="right"><strong>Amount:</strong></td>
                        <td><?php echo $amount ?></td>
                    </tr> 
                    <tr>
                        <td align="right"><strong>Shipping Name:</strong></td>
                        <td><?php echo $ship_name ?></td>
                    </tr> 
                    <tr>
                        <td align="right"><strong>Shipping Information:</strong></td>
                        <td><?php echo $ship_address."<br/> ".$ship_city." ".$ship_state." ".$ship_zip_code." ".$ship_country ?></td>
                    </tr> 
                    <tr>
                        <td align="right"><strong>Ship Zip Code:</strong></td>
                        <td><?php echo $ship_zip_code ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Ship Country:</strong></td>
                        <td><?php echo $ship_country ?></td>
                    </tr> 
                    <tr>
                        <td align="right"><strong>Lead Instructor:</strong></td>
                        <td><b>Name: </b><?php echo $instructor_name ?><br/><b>Phone Number:</b> <?php echo $instructor_phone_number."<br/> <b>Email:</b> ".$instructor_email ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Program Director:</strong></td>
                        <td><b>Name: </b><?php echo $director_name ?><br/><b>Phone Number:</b> <?php echo $director_phone_number."<br/> <b>Email:</b> ".$director_email ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Department Head:</strong></td>
                        <td><b>Name: </b><?php echo $depthead_name ?><br/><b>Phone Number:</b> <?php echo $depthead_phone_number."<br/> <b>Email:</b> ".$depthead_email ?></td>
                    </tr>
                    <tr>
                        <td align="right"><strong>Comments:</strong></td>
                        <td><?php echo $comments ?></td>
                    </tr>
                    <tr>
                        <td align = "right"><a href="vieworders.php" class="btn btn-default btn-md" role="button">Back</a></td>
                        <td><?php include"edit_button.php";
                        include"reorder_button.php";
                        include"delete_button.php";?>
                        </td>
                    </tr>
                    
                    
                </table>
                
                
            </div>


<?php include"footer.php"; ?>

?>