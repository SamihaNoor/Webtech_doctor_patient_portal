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
					//// get approved appointments
					$appointments = getApprovedApps($pat['patId']);
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
							<td><?php if($appointments[$i]['status']==1)
										{
											echo "";
										}
								?>
							</td>
							
							<td>
								<button id="cancel" onclick="location.href='../php/pat_operations.php?docId=<?=$appointments[$i]['docId']?>&date=<?=$appointments[$i]['date']?>&patId=<?=$pat['patId']?>'">Cancel</button>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
							
							</td>
						</tr>
					<?php
					}
					// get canceled appointments
					$appointments = getCanceledApps($pat['patId']);
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
							<td><?php if($appointments[$i]['status']==3)
										{
											echo "Canceled";
										}
								?>
							</td>
							<td>
								<button id="cancel" onclick="location.href='../php/pat_operations.php?docId=<?=$appointments[$i]['docId']?>&date=<?=$appointments[$i]['date']?>&patId=<?=$pat['patId']?>'">Cancel</button>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
							
							</td>
						</tr>
					<?php
					}
					// get rejected appointments
					$appointments = getRejectedApps($pat['patId']);
					for ($i=0;$i!=count($appointments);$i++) 
					{  ?>
					
						<tr>
							<td><?php
							//echo $appointments[$i]['docId']
									$doctor = getDoc($appointments[$i]['docId']);
									echo $doctor['docName'];
								?>
							</td>
							<td><?php echo $doctor['dept'];?></td>
							<td><?php echo $appointments[$i]['date'];?></td>
							<td><?php if($appointments[$i]['time']=="")
										{
											echo "-";
										}
								?>
							</td>
							<td><?php if($appointments[$i]['status']==4)
										{
											echo "Rejected";
										}
								?>
							</td>
							
							<td>
								<button id="cancel" onclick="location.href='../php/pat_operations.php?docId=<?=$appointments[$i]['docId']?>&date=<?=$appointments[$i]['date']?>&patId=<?=$pat['patId']?>'">Cancel</button>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
							
							</td>
						</tr>
					<?php
					}
					// get pending appointments
					$appointments = getPendingApps($pat['patId']);
					for ($i=0;$i!=count($appointments);$i++) 
					{  ?>
					
						<tr>
							<td><?php
							//echo $appointments[$i]['docId']
									$doctor = getDoc($appointments[$i]['docId']);
									echo $doctor['docName'];
								?>
							</td>
							<td><?php echo $doctor['dept'];?></td>
							<td><?php echo $appointments[$i]['date'];?></td>
							<td><?php if($appointments[$i]['time']=="")
										{
											echo "-";
										}
								?>
							</td>
							<td><?php if($appointments[$i]['status']==0)
										{
											echo "Pending";
										}
								?>
							</td>
							
							<td>
							<button id="cancel" onclick="location.href='../php/pat_operations.php?docId=<?=$appointments[$i]['docId']?>&date=<?=$appointments[$i]['date']?>&patId=<?=$pat['patId']?>'">Cancel</button>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
							<?php
								if(isset($_GET['error']))
								{
									if($_GET['error']=='try_again')
									{
										echo "Try Again";
									}
								}
								if(isset($_GET['success']))
								{
									if($_GET['success']=='cancel')
									{
										echo "Appointment canceled";
									}
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