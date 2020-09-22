<?php

	require_once('../service/userService_doc.php');
	$email = $_GET['email'];
	$id = getdocId($email);
	
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
						<h5>Your User Id is <?php echo $id ; ?> Your request has been forwarded to admin. Please wait for next 72hours for the approval. </h5>
						<br><br>
						<h4>Click <a href="index.php">Here</a> to Login.</h4>
			</body>
		</html>
		<?php
		
		?>
