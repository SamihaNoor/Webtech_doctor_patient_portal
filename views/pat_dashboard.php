<?php
	
	require_once('../php/session.php');
	require_once('../service/userService.php');
	
	if($_SESSION['type']==3)
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
		
		<div class="table_searchdoc">
		<form action="" method="post">
			<!--<td><input type="text" id="dName" name="dName" onkeyup="keyupDName()"><td>-->
					<select id="department" name="department">
							<option value="">Department</option>
							<option value="Neurology">Neurology</option>
							<option value="Cardiology">Cardiology</option>
							<option value="Urology">Urology</option>
							<option value="Orthopedic">Orthopedic</option>
							
						</select>
					
					<select id="city" name="city">
							<option value="">City</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Sylhet">Sylhet</option>
						</select>
					<input id="showDoc" type="submit" name="submit" value="Show"></td>

			</form>
			</div>
				<?php
				
					if(isset($_POST['submit']))
					{
						//$name= $_POST['dName'];
						$dept = $_POST['department'];
						$city = $_POST['city'];
						if($dept!="" && $city=="")
						{
							$doctors = getDocsByDept($dept);
						}
						else if($dept=="" && $city!="")
						{
							$doctors = getDocByCity($city);
						}
						else if($dept!="" && $city!="")
						{
							$doctors = getDocsByDeptCity($dept,$city);
						}
						/*else if($name!="")
						{
							$doctors = getDocByName($name);
						}*/
						else
						{
							$doctors = getApprovedDocs();
						}?>
			<!--<div class="searchdata" id="searchdata"></div>-->
			<table class="table_viewdocs" id="table_viewdocs">
				<tr>
					<td colspan="10"><h3>List of Doctors</td></td>
				</tr>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Gender</td>
					<td>Department</td>
					<td>City</td>
					<td>Consulting Days</td>
					<td>Consulting Time</td>
					<td>Consulted Patients</td>
					<td><br></td>
				</tr>	
					<?php
					for ($i=0;$i!=count($doctors);$i++) 
					{  ?>
					
						<tr>
							<td><?php echo $doctors[$i]['docName']?></td>
							<td><?php echo $doctors[$i]['email']?></td>
							<td><?php 
									if($doctors[$i]['gender']==1) 
										echo "Male";
									else
										echo "Female";
								?>
							</td>
							<td><?php echo $doctors[$i]['dept']?></td>
							<td><?php echo $doctors[$i]['city']?></td>
							<td><?php echo $doctors[$i]['day']?></td>
							<td><?php echo $doctors[$i]['time']?></td>
							<td><?php echo $doctors[$i]['pat_count']?></td>
							<td>
							<button id="view" onclick="location.href='pat_viewdoctor.php?docId=<?=$doctors[$i]['docId']?>'">View</button>
							</td>
						</tr>
					<?php
					}?>
			</table>
					<?php
					}
					?>
	</body>
</html>

<?php
	}
	else
	{
		header('location: dashboard.php');
	}
?>