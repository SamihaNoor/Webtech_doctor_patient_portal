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
	
	/*if(isset($_POST['reqDate']))
	{
		echo $_POST['reqDate'];
	}*/
?>
<html>
<head>
	<title>Terminate</title>
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
		<table class="table_docproR">
				<tr>
					<td>Name</td>
					<td><?php echo $doctor['docName']?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $doctor['email']?></td>
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
				</tr>
				<tr>
					<td>Department</td>
					<td><?php echo $doctor['dept']?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $doctor['city']?></td>
				</tr>
				<tr>
					<td>Consulting Days</td>
					<td><?php echo $doctor['day']?></td>
				</tr>
				<tr>
					<td>Consulting Time</td>
					<td><?php echo $doctor['time']?></td>
				</tr>
				<tr>
					<td>Consulted Patients</td>
					<td><?php echo $doctor['pat_count']?></td>
				</tr>
			</table>
			
			
			<form action="../php/pat_operations.php?docId=<?=$doctor['docId']?>&patId=<?=$pat['patId']?>" method="post">
			<!--<form action="" method="post">-->
			<table class="appReqTable">
				<tr>
					<td>Choose the prefered date for your appointment</td>
				</tr>
				<tr>
					<td align="right"><input type="date" id="reqDate" name="reqDate"></td>
				</tr>
				<tr>
					<td>Request for appointment?</td>
				</tr>
				<tr>
					<td align="right"><input type="submit" id="reqApp" name="reqApp" value="Yes"></td>
				</tr>
				<tr>
					<td align="center">
						<?php
							if(isset($_GET['error']))
							{
								if($_GET['error']=='null')
								{
									echo "Enter Date";
								}
							}
						?>
					</td>
				</tr>
			</table>
			</form>
			
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