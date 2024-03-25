<?php
//echo $_SESSION['access_level'];
//echo $_SESSION['user_id'];

$access_level = $_SESSION['access_level'];
//$access_level = "student";
//$access_level = "instructor";
//$access_level = "director";
//$access_level = "admin";

//echo $access_level;

  // Assign correct navigation capabilities to logged in user
  
switch ($access_level) {
case "student": ?>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          
          <ul class="nav navbar-nav">
            
              <li><a href="catalog.php">View Catalog</a></li>                
              <li><a href="about.php">About</a></li>
              <li><a href="logout.php"><b>Log Out (</b>  <em><b>User:</b> <?php echo $_SESSION['username'] ?> <b>Access Level:</b> <?php echo $_SESSION['access_level'] ?>)</em></a></li>
        </ul>
        </div>
      </nav>
</div>
<?php ;

break;

case "instructor":
?>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            
              <li><a href="catalog.php">View Catalog</a></li>
             <ul class="nav navbar-nav">
                <li><a href="vieworders.php">View Orders</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="logout.php"><b>Log Out (</b>  <em><b>User:</b> <?php echo $_SESSION['username'] ?> <b>Access Level:</b> <?php echo $_SESSION['access_level'] ?>)</em></a></li>
             </ul>
             
        </div>
      </nav>
</div>
<?php ;
break;

case "director":

case "depthead":
?>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            
              <li><a href="catalog.php">View Catalog</a></li>
             <ul class="nav navbar-nav">
                <li><a href="vieworders.php">View Orders</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="logout.php"><b>Log Out (</b>  <em><b>User:</b> <?php echo $_SESSION['username'] ?> <b>Access Level:</b> <?php echo $_SESSION['access_level'] ?>)</em></a></li>
             </ul>
        </div>
      </nav>
</div>
<?php ;

break;

case "admin":
?>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          
          <ul class="nav navbar-nav">
            
              <li><a href="catalog.php">View Catalog</a></li>
              <li><a href="vieworders.php">View Orders</a></li>
              <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="register_form.php">Add User</a></li>
                <li><a href="user_management_form.php">View & Manage</a></li>
              </ul>
          </ul>
              
              <li><a href="about.php">About</a></li>
              <li><a href="logout.php"><b>Log Out (</b>  <em><b>User:</b> <?php echo $_SESSION['username'] ?> <b>Access Level:</b> <?php echo $_SESSION['access_level'] ?>)</em></a></li>
            </div>
      </nav>
</div>
<?php ;
break;

case "":
?>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
              <li><a href="about.php">About</a></li>
              
        </div>
      </nav>
</div>
<?php ;
break;

default:

?>

<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header"> 
            <a class="navbar-brand" href="index.php">Home</a>
            <ul class="nav navbar-nav">
            <li><a href="about.php">About</a></li>
            </ul>
            
          </div>
</nav>
<?php ;

}

?> 
 
 
 

