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
	
	if (isset($_GET['docId']))
	{
		$doctor = getDoc($_GET['docId']);
	}
?>
<html>
<head>
	<title>Terminate</title>
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
				<button class="button" onclick="location.href='commission.php'"> commission</button>
				<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
				<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
			</div>
			<form action="../php/operations.php?" method="post">
			<table class="table_docpro">
				<tr>
					<td colspan="3">Are you sure you want to terminate this doctor?
					<input name="yes" id="yes" type="submit" value="Yes">
					<input name="no" id="no" type="submit" value="No"></td>
					
				</tr>
				<tr>
					<td>ID</td>
					<td><input id="docId" name="docId" value="<?php echo $doctor['docId']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input id="docName" name="docName" value="<?php echo $doctor['docName']?>" readonly="readonly"></td>
					
				</tr>
				<tr>
					<td>Email</td>
					<td><input id="docEmail" name="docEmail" value="<?php echo $doctor['email']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><input id="docGender" name="docGender" value="<?php 
																			if($doctor['gender']==1) 
																				echo "Male";
																			else
																				echo "Female";
																		?>" readonly="readonly">
					
					</td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><input id="docDob" name="docDob" value="<?php echo $doctor['dob']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Department</td>
					<td><input id="dept" name="dept" value="<?php echo $doctor['dept']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input id="city" name="city" value="<?php echo $doctor['city']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Consulting Days</td>
					<td><input id="days" name="days" value="<?php echo $doctor['day']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Consulting Time</td>
					<td><input id="time" name="time" value="<?php echo $doctor['time']?>" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Consulted Patients</td>
					<td><input id="pat_count" name="pat_count" value="<?php echo $doctor['pat_count']?>" readonly="readonly"></td>
				</tr>
			</table>
			
			</form>
		</font>
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