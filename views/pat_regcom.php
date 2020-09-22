<?php

	require_once('../service/userService.php');
	$email = $_GET['email'];
	$id = getPatId($email);
	
	?>
	<html>
		<head>
			<title>Registration Completed!</title>
			<link href="../assets/restP.css" rel="stylesheet">
		</head>
			<h1 id="h1">Doctor-Patient Portal</h1>
			<body align="center">
						<br><br>
						<h3>Registration Successful!</h3>
						<br><br>
						<h5>Your User Id is <?php echo $id ; ?></h5>
						<br><br>
						<h4>Click <a href="login.php">Here</a> to Login.</h4>
			</body>
		</html>
		<?php
		
		?>
