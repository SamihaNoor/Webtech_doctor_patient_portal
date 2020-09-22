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
	<title>Dashboard</title>
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

			<table class="table_appointments" id="table_appointments">
				<tr>
					<td colspan="10"><h3>Appointments</td></td>
				</tr>
				<tr>
					<td>Doctor Name</td>
					<td>Department</td>
					<td>Date</td>
					<td>Time</td>
					<td></td>
				</tr>	
					<?php
					//// 
					$appointments = getHistory($pat['patId']);
					for ($i=0;$i!=count($appointments);$i++) 
					{  ?>
					
						<tr>
							<td><?php
									$doctor = getDoc($appointments[$i]['docId']);
									echo $doctor['docName'];
								?>
							</td>
							<td><?php echo $doctor['dept'];?></td>
							<td><?php echo $appointments[$i]['date'];?></td>
							<td><?php if($appointments[$i]['time']!="")
										{
											echo $appointments[$i]['time'];
										}
								?>
							</td>
						</tr>
					<?php
					}
					?>
					
			</table>
					<?php
					
					?>
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