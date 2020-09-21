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
	<title>Approve Doctors</title>
	<link href="../assets/rest2.css" rel="stylesheet">
</head>
	<body>
		<h1 id="h1">Doctor-Patient Portal</h1>
			<div class="btn_group">
				<button class="button" onclick="location.href='dashboard.php'">Dashboard</button>
				<button class="button" onclick="location.href='viewprofile.php'"><?php echo $name;?></button>
				<button class="button" onclick="location.href='registration.php'"> Create Admin</button>
				<button class="button" onclick="location.href='approvedoctors.php'"> Approve Doctors</button>
				<button class="button" onclick="location.href='viewdoctors.php'"> View Doctors</button>
				<button class="button" onclick="location.href='viewpatients.php'"> View Patients</button>
				<button class="button" onclick="location.href='populardoctors.php'"> Popular Doctors</button>
				<button class="button" onclick="location.href='populardepartments.php'"> Popular Departments</button>
				<button class="button" onclick="location.href='commission.php'"> Commission</button>
				<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
				<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
			</div>
		<div>
			<table class="approvetable">
				<tr>
					<td colspan="10"><h3>List of Doctors</td></td>
				</tr>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Gender</td>
					<td>Date Of Birth</td>
					<td>Department</td>
					<td>City</td>
					<td><br></td>
				</tr>
				
				<?php
					$doctors = getDoctors();
					
					
					for ($i=0;$i!=count($doctors);$i++) 
					{  ?>
					
					<tr>
						<td><?php echo $doctors[$i]['docId']?></td>
						<td><?php echo $doctors[$i]['docName']?></td>
						<td><?php echo $doctors[$i]['email']?></td>
						<td><?php 
								if($doctors[$i]['gender']==1) 
									echo "Male";
								else
									echo "Female";
							?>
						</td>
						<td><?php echo $doctors[$i]['dob']?></td>
						<td><?php echo $doctors[$i]['dept']?></td>
						<td><?php echo $doctors[$i]['city']?></td>
						<td>
						<button id="button" onclick="location.href='../php/operations.php?docId=<?=$doctors[$i]['docId']?>'"> Approve</button>
						</td>
					</tr>
					<?php
					}
					?>
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