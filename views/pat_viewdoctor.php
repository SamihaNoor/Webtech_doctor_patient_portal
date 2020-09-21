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
		
		if (isset($_GET['docId']))
		{
			$doctor = getDoc($_GET['docId']);
		}
?>
<html>
<head>
	<title>Doctor's profile</title>
	<link href="../assets/restP.css" rel="stylesheet">
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
			<form action="../php/pat_operations.php?docId=<?=$doctor['docId']?>" method="post" enctype="multipart/form-data">
			<table class="table_docpro">
				<tr>
					<td colspan="10"><h3>Doctor's Information</td></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $doctor['docName']?></td>
					<td><input id="chat" name="chat" type="submit" value="Chat"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $doctor['email']?></td>
					<td><input id="performance" name="performance" type="submit" value="Performance"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php 
								if($doctor['gender']==1) 
									echo "Male";
								else
									echo "Female";
							?>
					</td>
					<td><input id="appointment" name="appointment" type="submit" value="Appointment"></td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><?php echo $doctor['dob']?></td>
					<td><input id="file" name="file[]" type="file" multiple></td>
				</tr>
				<tr>
					<td>Department</td>
					<td><?php echo $doctor['dept']?></td>
					<td><input id="review" name="review" type="submit" value="Send Review"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $doctor['city']?></td>
				</tr>
				<tr>
					<td>Consulting Days</td>
					<td><?php echo $doctor['day']?></td>
					<td></td>
				</tr>
				<tr>
					<td>Consulting Time</td>
					<td><?php echo $doctor['time']?></td>
					<td></td>
				</tr>
				<tr>
					<td>Consulted Patients</td>
					<td><?php echo $doctor['pat_count']?></td>
					<td></td>
				</tr>
			</table>
			
			</form>
		</font>
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