<?php ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Error</title>

	</head>
	
	<body>
	<main>
	<center>
		<h1> Data Entry Error</h1>
		<h2> Error message: <?php echo $error_message; ?></h2>
		<p>
		<form> 
		<input type="button" value="Go back" onclick = "history.back()"></form>
		</p>
	</center>
	</main>
	</body

</html>
