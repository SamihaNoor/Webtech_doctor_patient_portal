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
	if($type==3)
	{
		if(isset($_SESSION['id']))
		{
			$id=$_SESSION['id'];
		}
		else if(isset($_COOKIE['id']))
		{
			$id=$_COOKIE['id'];
		}
		
		$pat = getPatProfile($id);
		$name = $pat['patName'];
?>
<html>
<head>
	<title>Edit Profile</title>
	<link href="../assets/restP.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/registration.js"></script>
</head>
	<body>
	<h1 id="h1">Doctor-Patient Portal</h1>
	<div class="btn_group">
					<button class="button" onclick="location.href='pat_dashboard.php'">Dashboard</button>
					<button class="button" onclick="location.href='pat_viewprofile.php'"><?php echo $name;?></button>
					<button class="button" onclick="location.href='pat_requestedApp.php'">Appointments</button>
					<button class="button" onclick="location.href='pat_history.php'">History</button>
					<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
	</div>
	<?php
	if (isset($_GET['error']))
	{
		if($_GET['error'] == 'try_again')
		{
			echo "Please try again";
		}
	}
	?>
		<div class="profile_table">
			<form action="../php/pat_edited.php" onsubmit="return validateP()" method="post">
			<table>
				<tr><td colspan="2" align="center"><h3>Personal Information</td></td></tr>
				<tr><td colspan="2" align="center"><sub>Skip any if you do not want to change.</sub></td></tr>
				<tr><td>ID</td><td><?php echo $pat['patId'];?></td></tr>
				
				<tr><td>Name</td><td><input id="name" name="name" type="text" value="<?php echo $name; ?>" onkeyup="keyupName()" onblur="onblurName()"></td></tr>
				<tr><td id="eName" colspan="2" align="center"></td></tr>
				
				<tr><td>Email</td><td><?php echo $pat['patEmail']; ?></td></tr>
				<tr><td>Contact No.</td><td><input id="contact" name="contact" type="text" value="<?php echo $pat['patContact']; ?>" onkeyup="onkeyupContact()"></td></tr>
				<tr><td id="eContact" colspan="2" align="center"></td></tr>
				
				<tr><td>New Password</td><td><input id="password" name="password" type="password" onkeyup="keyupPass()" onblur="onblurPass()"></td>
				</tr><td id="ePass" colspan="2" align="center"></td>
				
				<tr><td>Re-enter Password</td><td><input id="confirmPassword" name="confirmPassword" type="password" onkeyup="keyupConPass()" onblur="onblurConPass()"></td></tr>
				<td id="eConPass" colspan="2" align="center"></td>
				
				<tr><td>Gender</td><td><?php if($pat['patGender'] == 1){echo "Male";}
											 else if($pat['Gender'] == 2){ echo "Female";}
											 else { echo "Others";}
										?></td>
				</tr>
				
				<tr><td>Date Of Birth</td><td><input id="dob" name="dob" type="date" value="<?php echo $pat['patDob']; ?>"></td></tr>
				<td id="eDob" colspan="2" align="center"></td>
				
				<tr><td colspan="2" align="center"><input id="done" name="submit" type="submit" value="Done"></td></tr>
			</table>
			</form>
			</div>
	</body>
</html>

<?php
	}
	else if($type==1)
	{
		header('location: dashboard.php');
	}
	else if($type==2)
	{
		header('location: doc_dashboard.php');
	}
?>