<?php
	session_start();
	require_once('../service/userService.php');
		if(isset($_SESSION['status']))
		{
			$email = $_GET['email'];
			$id = getId($email);
			
			?>
			<html>
				<head>
					<title>Registration Completed!</title>
					<link href="../assets/rest2.css" rel="stylesheet">
				</head>
					<body>
								<br><br>
								<h3>Registration Successful!</h3>
								<br><br>
								<h5>Your User Id is <?php echo $id ; ?></h5>
								<br><br>
								<h4>Click <a href="dashboard.php">Here</a> to return to dashboard.</h4>
					</body>
				</html>
		<?php
		}
		else
		{
			//echo "unsuccessful";
			header("location: registration.php");
		}
		?>
