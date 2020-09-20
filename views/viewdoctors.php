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
	<title>View Doctors</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="../assets/js.js"></script>
</head>
	<body>
		
		<div class="btn_group">
					<button class="button" onclick="location.href='dashboard.php'">Dashboard</button>
					<button class="button" name="profile" onclick="location.href='viewprofile.php'"><?php echo $name;?></button>
					<button class="button" onclick="location.href='registration.php'"> Create Admin</button>
					<button class="button" onclick="location.href='approvedoctors.php'"> Approve Doctors</button>
					<button class="button" onclick="location.href='viewdoctors.php'"> View Doctors</button>
					<button class="button" onclick="location.href='viewpatients.php'"> View Patients</button>
					<button class="button" onclick="location.href='populardoctors.php'"> Popular Doctors</button>
					<button class="button" onclick="location.href='populardepartments.php'"> Popular Departments</button>
					<button class="button" onclick="location.href='commission.php'"> commission</button>
					<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
					<button class="button" name="logout" onclick="location.href='../php/logout.php'">Logout</button>
		</div>
		
		<div class="table_searchdoc">
		<form action="" method="post">
			<td><input type="text" id="dName" name="dName" onkeyup="keyupDName()"><td>
					<select id="department" name="department">
							<option value="">Department</option>
							<option value="Neurology">Neurology</option>
							<option value="Cardiology">Cardiology</option>
						</select>
					
					<select id="city" name="city">
							<option value="">City</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Sylhet">Sylhet</option>
						</select>
					<input id="searchDoc" type="submit" name="submit" value="Show"></td>

			</form>
			</div>
				<?php
				
					if(isset($_POST['submit']))
					{
						$name= $_POST['dName'];
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
						else if($name!="")
						{
							$doctors = getDocByName($name);
						}
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
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Gender</td>
					<td>Date Of Birth</td>
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
							<td><?php echo $doctors[$i]['day']?></td>
							<td><?php echo $doctors[$i]['time']?></td>
							<td><?php echo $doctors[$i]['pat_count']?></td>
							<td>
							<button id="button" onclick="location.href='viewdoctor.php?docId=<?=$doctors[$i]['docId']?>'">View</button>
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
	else if($type==3)
	{
		header('location: pat_dashboard.php');
	}
	else if($type==2)
	{
		header('location: doc_dashboard.php');
	}
?>