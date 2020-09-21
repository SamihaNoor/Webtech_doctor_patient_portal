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
	
		if (isset($_GET['patId']))
		{
			$patId = $_GET['patId'];
		}
?>
<html>
<head>
	<title>Chat Patient</title>
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
				<div class="table_chat">
					<div class="msgBox">
						<?php
						
							$data = getMsgP($id,$patId);
							for($i=0;$i!=count($data);$i++)
							{?>
						
								<p><?php echo $name;?></p>
								<p><?php echo $data[$i]['msg']; ?></p>
								
							<?php
							}
							
							
							?>
							
							<?php
							if(isset($_POST['send']))
							{
								$msg = $_POST['msg'];
								$val = sendMsgP($id,$patId,$msg);
								if($val)
								{
									echo $name; echo "<br>";
									echo $msg;
								}
								else
								{
									echo "error";
								}
							}
						?>
					</div>
						<form action="" method="post">
							<input id="msg" name="msg" type="text" placeholder="Type your message">
							<input id="send" name="send" type="submit" value="Send">
						</form>
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