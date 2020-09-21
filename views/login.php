<?php

	if (isset($_GET['error']))
	{
		
		if($_GET['error'] == 'null_value'){
			echo "Username/Password field can't left empty...";
		}

		if($_GET['error'] == 'invalid_user'){
			$e= $_GET['error'];
			echo $e;
			echo "Invalid username or Password";
		}

		if($_GET['error'] == 'invalid_request'){
			echo "You have to login first...";
		}

	}else if(isset($_GET['success']))
	{
		
		if($_GET['success'] == 'registration_done'){
			echo "Registration Done! Now you can login...";
		}
	}

?>

<html>
<head>
	<title>Login</title>
	<link href="../assets/login.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/login.js"></script>
</head>
<body>
	<table id="t1">
		<tr>
			<td colspan="2"> <p>Please Enter Your UserId and Password.</p></td>
		</tr>
		<tr>
			<td>
			<form action="../php/logcheck.php" onsubmit="return getInfo()" method="post">
				<fieldset>
						<table>
							<tr><td colspan="2"><br></td></tr>
							<tr>
								<td>User Id</td>
								<td><input type="text" id="id" name="id" onkeyup="keyupId()" onblur="fieldId()"></td>
							</tr>
							<tr><td colspan="2" id="eId"></td></tr>
							<tr>
								<td>Password</td>
								<td><input type="password" id="password" name="password" onkeyup="keyupPass()" onblur="fieldPass()"></td>
							</tr>
							<tr><td colspan="2" id="ePass" align="center"></td></tr>
							<tr><td colspan="2" align="left"><input type="checkbox" id="rememberme" name="rememberme" value='1'>Remember Me</td></tr>
							<tr><td colspan="2" id="e"></td></tr>
							<tr>
								<td colspan="2" align="center"><input id="login" type="submit" name="submit" value="Login"></td>
							</tr>
							<tr><td colspan="2" align="center"><sub style="color:white;">Don't have an account?</sub></tr></td>
							<tr><td colspan="2" align="center"><button class="regpat" onclick="location.href='pat_registration.php'">Register as Patient</button></tr></td>
							<tr><td colspan="2" align="center"><sub style="color:white;">or</tr></sub></td>
							<tr><td colspan="2" align="center"><button class="regdoc" onclick="location.href='doc_registration.php'">Register as Doctor</button></tr></td>
						</table>
					</fieldset>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>