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
	<title>Personal Profile</title>
	<link href="../assets/restP.css" rel="stylesheet">
</head>
	<body>
		<h1 id="h1">Doctor-Patient Portal</h1>
		<?phpif (isset($_GET['success']))
	{
		if($_GET['success'] == 'updated')
		{
			echo "Profile updated";
		}
	}?>
		<div class="btn_group">
					<button class="button" onclick="location.href='pat_dashboard.php'">Dashboard</button>
					<button class="button" onclick="location.href='pat_viewprofile.php'"><?php echo $name;?></button>
					<button class="button" onclick="location.href='pat_requestedApp.php'">Appointments</button>
					<button class="button" onclick="location.href='pat_populardoctors.php'"> Popular Doctors</button>
					<button class="button" onclick="location.href='pat_populardepartments.php'"> Popular Departments</button>
					<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
		</div>
		
			
		<div class="profile_table">
			<table border= "1">
				<tr>
					<td><h3>Personal Information</td></td>
					<td align="right"><button id="edit" class="edit" onclick="location.href='pat_editprofile.php'">Edit</button></td>
				<tr>
					<td>ID</td>
					<td><?php echo $pat['patId']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $pat['patEmail']; ?></td>
				</tr>
				<tr>
					<td>Contact No.</td>
					<td><?php echo $pat['patContact']; ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php if($pat['patGender'] == 1){echo "Male";}
											 else if($pat['gender'] == 2){ echo "Female";}
											 else { echo "Others";}
										?>
					</td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><?php echo $pat['patDob']; ?></td>
				</tr>
			</table>
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