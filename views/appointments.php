<?php
	
	require_once('../php/session.php');
	require_once('../service/userService_doc.php');
	
	if(isset($_SESSION['type']))
	{
		$type=$_SESSION['type'];
	}
	else if(isset($_COOKIE['type']))
	{
		$type=$_COOKIE['type'];
	}
	if($type==2)
	{
		if(isset($_SESSION['id']))
		{
			$id=$_SESSION['id'];
		}
		else if(isset($_COOKIE['id']))
		{
			$id=$_COOKIE['id'];
		}
		
		$doc = getDoctorProfile($id);
		$name = $doc['docName'];
?>
<html>
<head>
	<title>Dashboard</title>
	<link href="../assets/restP.css" rel="stylesheet">
</head>
	<body>
		<h1 id="h1">Doctor-Patient Portal</h1>
		

			<table class="table_appointments" id="table_appointments">
				<tr>
					<td colspan="10"><h3>Appointments</td></td>
				</tr>
				<tr>
					<td>Patient Name</td>
				
					<td>Date</td>
					<td>Time</td>
					<td></td>
				</tr>	
					<?php
					
					// get pending appointments
					$appointments = getPendingApps($doc['docId']);
					for ($i=0;$i!=count($appointments);$i++) 
					{  ?>
					
						<tr>
							<td><?php
							//echo $appointments[$i]['docId']
									$patients = getPat($appointments[$i]['patId']);
									echo $patients['patName'];
								?>
							</td>
							
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
							<button id="approve" onclick="location.href='../php/doc_operations.php?docId=<?=$appointments[$i]['docId']?>&date=<?=$appointments[$i]['date']?>&patId=<?=$pat['patId']?>'">Approve</button>
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
									if($_GET['success']=='approve')
									{
										echo "Appointment approved";
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
		header('location: login.php');
	}
	else if($type==3)
	{
		header('location: login.php');
	}
?>