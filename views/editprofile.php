<?php
	require_once('../php/session.php');
	require_once('../service/userService.php');
	
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
	<title>Edit Profile</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/registration.js"></script>
</head>
	<body>
	<div class="btn_group">
					<button class="button" onclick="location.href='dashboard.php'">Dashboard</button>
					<button class="button" onclick="location.href='viewprofile.php'"><?php echo $name;?></button>
					<button class="button" onclick="location.href='registration.php'"> Create Admin</button>
					<button class="button" onclick="location.href='approvedoctors.php'"> Approve Doctors</button>
					<button class="button" onclick="location.href='viewdoctors.php'"> View Doctors</button>
					<button class="button" onclick="location.href='viewpatients.php'"> View Patients</button>
					<button class="button" onclick="location.href='populardoctors.php'"> Popular Doctors</button>
					<button class="button" onclick="location.href='populardepartments.php'"> Popular Departments</button>
					<button class="button" onclick="location.href='commission.php'"> commission</button>
					<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
					<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
		</div>
		<div class="profile_table">
			<form action="../php/edited.php" onsubmit="return validate()" method="post">
			<table>
				<tr><td colspan="2"><h3>Personal Information</td></td></tr>
				<tr><td colspan="2" align="center"><sub>Skip any if you do not want to change.</sub></td></tr>
				<tr><td>ID</td><td><input name="id" id="id" value="<?php echo $admin['id'];?>" readonly="readonly"></td></tr>
				
				<tr><td>Name</td><td><input id="name" name="name" type="text" value="<?php echo $name; ?>" onkeyup="keyupName()" onblur="onblurName()"></td></tr>
				<tr><td id="eName" colspan="2" align="center"></td></tr>
				
				<tr><td>Email</td><td><input name="email" id="email" value="<?php echo $admin['email']; ?>" readonly="readonly"></td></tr>
				
				<tr><td>New Password</td><td><input id="password" name="password" type="password" onkeyup="keyupPass()" onblur="onblurPass()"></td>
				</tr><td id="ePass" colspan="2" align="center"></td>
				
				<tr><td>Re-enter Password</td><td><input id="confirmPassword" name="confirmPassword" type="password" onkeyup="keyupConPass()" onblur="onblurConPass()"></td></tr>
				<td id="eConPass" colspan="2" align="center"></td>
				
				<tr><td>Gender</td>
					<td><input name="gender" id="gender" value="<?php if($admin['gender'] == 1){echo "Male";}
																					else if($admin['gender'] == 2){ echo "Female";}
																					else { echo "Others";}
																				?>" readonly="readonly">
					</td>
				</tr>
				
				<tr><td>Date Of Birth</td><td><input id="dob" name="dob" type="date" value="<?php echo $admin['dob']; ?>"></td></tr>
				<td id="eDob" colspan="2" align="center"></td>
				
				<tr><td colspan="2" align="right"><input name="submit" id="done" type="submit" value="Done"></td></tr>
				
				<tr>
					<td colspan="2" align="center">
						<?php
						if (isset($_GET['error']))
						{
							if($_GET['error'] == 'try_again')
							{
								echo "Please try again";
							}
						}
						?>
					</td>
				</tr>
			</table>
			</form>
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