<?php
	require_once('../php/session.php');
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
	if(isset($_SESSION['type']))
	{
		$type=$_SESSION['type'];
	}
	else if(isset($_COOKIE['type']))
	{
		$type=$_COOKIE['type'];
	}
	if($type==1)
	{
		if(isset($_SESSION['id']))
		{
			$id=$_SESSION['id'];
		}
		else if(isset($_COOKIE['id']))
		{
			$id=$_COOKIE['id'];
		}
		
		$admin = getProfile($id);
		$name = $admin['name'];
?>
<html>
<head>
	<title>REGISTRATION</title>
	<link href="../assets/registration.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/registration.js"></script>
</head>
	<body>
	<div class="btn_group">
					<button class="button" onclick="location.href='dashboard.php'">Dashboard</button>
					<button class="button" name="profile" onclick="location.href='viewprofile.php'"><?php echo $name;?></button>
					<button class="button" onclick="location.href='registration.php'"> Create Admin</button>
					<button class="button" onclick="location.href='approvedoctors.php'"> Approve Doctors</button>
					<button class="button" onclick="location.href='viewdoctors.php'"> View Doctors</button>
					<button class="button" onclick="location.href='viewpatients.php'"> View Patients</button>
					<button class="button" onclick="location.href='populardoctors.php'"> Popular Doctors</button>
					<button class="button" onclick="location.href='populardepartments.php'"> Popular Departments</button>
					<button class="button" onclick="location.href='commission.php'"> commission</button>
					<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
					<button class="button" name="logout" onclick="location.href='../php/logout.php'">Logout</button>
		</div>
		<div class="table">
		<table>
				<tr>
					<td> <p>Please Enter Information To Register.</p></td>
				</tr>
				<tr>
					<td>
						<form name="registration_form" action="../php/regcheck.php" onsubmit="return register()" method="post">
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
										</tr>
										<tr><td colspan="2" id="eEmail"></td></tr>										
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
	}
	else if($type==3)
	{
		header('location: pat_dashboard.php');
	}
	else if($type==2)
	{
		header('location: doc_dashboard.php');
	}
?>