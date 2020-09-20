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
	<title>Personal Profile</title>
	<link href="../assets/rest2.css" rel="stylesheet">
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
			<table>
				<tr>
					<td><h3>Personal Information</td></td>
					<td align="right"><button id="edit" class="edit" onclick="location.href='editprofile.php'">Edit</button></td>
				<tr>
					<td>ID</td>
					<td><?php echo $admin['id']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $admin['email']; ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php if($admin['gender'] == 1){echo "Male";}
											 else if($admin['gender'] == 2){ echo "Female";}
											 else { echo "Others";}
										?>
					</td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><?php echo $admin['dob']; ?></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<?php
						if (isset($_GET['success']))
						{
							if($_GET['success'] == 'updated')
							{
								echo "Profile updated";
							}
						}
						?>
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