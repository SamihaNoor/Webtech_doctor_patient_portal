<?php

	require_once('../service/userService.php');
	if (isset($_GET['error']))
	{
		if($_GET['error'] == 'null')
		{
			echo "Fill the form first";
		}
		
		if($_GET['error'] == 'null_name')
		{
			echo "name cannot be null";
		}

		if($_GET['error'] == 'name_letter')
		{
			echo "Name must start with a letter";
		}

		if($_GET['error'] == 'name_word')
		{
			echo "Name must be at least two words";
		}
		if($_GET['error'] == 'null_email')
		{
			echo "email cannot be null";
		}

		if($_GET['error'] == 'email_notvalid')
		{
			echo "Enter Your Email properly";
		}

		if($_GET['error'] == 'null_password')
		{
			echo "Password cannot be null";
		}
		if($_GET['error'] == 'notmatched')
		{
			echo "Password did not match";
		}
		if($_GET['error'] == 'null_gender')
		{
			echo "Gender cannot be empty";
		}
		if($_GET['error'] == 'null_dob')
		{
			echo "Date of Birth cannot be empty";
		}
	}

?>
<html>
<head>
	<title>REGISTRATION</title>
	<link href="../assets/registration.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/registration.js"></script>
</head>
	<body>
		<div class="pat_registration">
		<table>
				<tr>
					<td>Please Enter Information To Register.</td>
				</tr>
				<tr>
					<td>
						<form name="registration_form" action="../php/pat_regcheck.php" onsubmit="return registerPatient()" method="post">
							<fieldset>
									<table>
										<tr>
											<td>Name</td>
											<td><input type="text" id="name" name="name" onkeyup="keyupName()" onblur="onblurName()"></td>
										</tr>
										<tr><td colspan="2" id="eName" align="center"></td></tr>
										<tr>
											<td>Email</td>
											<td><input id="email" name="email" type="text" onkeyup="keyupEmail()" onblur="onblurEmail()"><abbr title="hint:sample@example.com"> ?</abbr></td>
											<tr><td colspan="2" id="eEmail" align="center"></td></tr>
										</tr>
										<tr>
											<td>Contact</td>
											<td><input id="contact" name="contact" type="text" onkeyup="keyupContact()" onblur="onblurContact()"></td>
										</tr>
										<tr><td colspan="2" id="eContact"></td></tr>							
										<tr>
											<td>Password</td>
											<td><input id="password" name="password" type="password" onkeyup="keyupPass()" onblur="onblurPass()"></td>	
										</tr>
										<tr><td colspan="2" id="ePass"></td></tr>
										<tr>
											<td>Confirm Password</td>
											<td><input id="confirmPassword" name="confirmPassword" type="password" onkeyup="keyupConPass()" onblur="onblurConPass()"></td>
										</tr>		
										<tr><td colspan="2" id="eConPass"></td></tr>
										<tr>
											<td>Gender</td>
											<td>
									
												<input name="gender" type="radio" value="1" onclick="onclickGender()">Male
												<input name="gender" type="radio" value="2" onclick="onclickGender()">Female
												<input name="gender" type="radio" value="3" onclick="onclickGender()">Other
											</td>
											
										</tr>
										<tr><td colspan="2" id="eGender"></td></tr>
										<tr>
											<td>Date of Birth</td>
											<td>
												<input id="dob" name="dob" type="date" onkeyup="keyupDob()" onblur="onblurDob()">
											</td>
										</tr>		
										<tr><td colspan="2" id="eDob"></td></tr>
										<tr>
											<td colspan="2" align="center">
												<input id="registration" type="submit" name="submit" value="Register">
												<input id="reset" name ="reset" type="reset" value="Reset">
											</td>
										</tr>
									</table>
							</fieldset>
						</form>
					</td>
				</tr>
		</table>
		</div>
	</body>
</html>
<?php
?>