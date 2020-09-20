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
	<title>Dashboard</title>
	<link href="../assets/rest2.css" rel="stylesheet">
</head>
	<body>
		<div class="top-bar">
			
			
		</div>
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