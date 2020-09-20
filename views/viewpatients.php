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
	<!--<script type="text/javascript" src="../assets/js.js"></script>-->
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
		
		<div class="table_searchpat">
		<form action="" method="post">
			<td><input type="text" id="pName" name="pName" onkeyup="keyupDName()"><td>
				<input id="searchDoc" type="submit" name="submit" value="Show">
			</td>

			</form>
			</div>
				<?php
				
					if(isset($_POST['submit']))
					{
						$name= $_POST['pName'];
						if($name!="")
						{
							$patients = getPatByName($name);
						}
						else
						{
							$patients = getAllPatients();
						}?>
			<!--<div class="searchdata" id="searchdata"></div>-->
			<table class="table_viewpats" id="table_viewpats">
				<tr>
					<td colspan="10"><h3>List of Patients</td></td>
				</tr>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Contact</td>
					<td>Date Of Birth</td>
					<td>Gender</td>
					<td><br></td>
				</tr>	
					<?php
					for ($i=0;$i!=count($patients);$i++) 
					{  ?>
					
						<tr>
							<td><?php echo $patients[$i]['patId']?></td>
							<td><?php echo $patients[$i]['patName']?></td>
							<td><?php echo $patients[$i]['patEmail']?></td>
							<td><?php echo $patients[$i]['patContact']?></td>
							<td><?php echo $patients[$i]['patDob']?></td>
							<td><?php 
									if($patients[$i]['patGender']==1) 
										echo "Male";
									else
										echo "Female";
								?>
							</td>
							<td>
							<button id="button" onclick="location.href='viewpatient.php?patId=<?=$patients[$i]['patId']?>'">View</button>
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