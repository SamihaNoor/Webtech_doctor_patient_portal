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
	
		if (isset($_GET['patId']))
		{
			$patient = getPat($_GET['patId']);
		}
?>
<html>
<head>
	<title>Patient's profile</title>
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
			<form action="../php/operations.php?docId=<?=$patient['patId']?>" method="post" enctype="multipart/form-data">
			<table class="table_patpro" border="1">
				<tr>
					<td colspan="2"><h3>Patient's Information</td></td>
				</tr>
				<tr>
					<td>ID</td>
					<td><?php echo $patient['patId']?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $patient['patName']?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $patient['patEmail']?></td>
				</tr>
				<tr>
					<td>Contact No.</td>
					<td><?php echo $patient['patContact']?></td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><?php echo $patient['patDob']?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php 
								if($patient['patGender']==1) 
									echo "Male";
								else
									echo "Female";
							?>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input id="chat" name="chat" type="submit" value="Chat"></td>
				</tr>
			</table>
			</form>
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