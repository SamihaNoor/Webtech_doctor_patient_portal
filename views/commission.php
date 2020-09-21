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
	<title>Commission</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Department', 'Commission'],
         <?php
		
			if(isset($_POST['submitForCom']))
			{
				$fromDateCom = $_POST['fromDateCom'];
				$toDateCom = $_POST['toDateCom'];
				$department = $_POST['department'];
				
				
				if($department!="" && $fromDateCom!="" && $toDateCom!="")
				{
					if($department=="ALL")
					{
						$data = allDeptCom($fromDateCom,$toDateCom);
						for($i=0;$i!=count($data);$i++)
						{
							echo "['".$data[$i]['department']."',".$data[$i]['commission']."],";
						}
					}
					else
					{
						$data = comByDept($department,$fromDateCom,$toDateCom);
						for($i=0;$i!=count($data);$i++)
						{
							echo "['".$data[$i]['date']."',".$data[$i]['commission']."],";
						}
					}
				}
				else if($department=="" && $fromDateCom!="" && $toDateCom!="")
				{
						$data = comByDate($fromDateCom,$toDateCom);
						for($i=0;$i!=count($data);$i++)
						{
							echo "['".$data[$i]['date']."',".$data[$i]['commission']."],";
						}
				}
				else
				{
					header('location:commission.php?error=date_null');
				}
			}
			
         ?>
        ]);

        var options = {
		title:  '<?php echo $_POST['department']. " Commissions from " .$_POST['fromDateCom']. " to ". $_POST['toDateCom'];?>'
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart'));

        chart.draw(data, options);
      }
	  </script>
</head>
	<body>
		<h1 id="h1">Doctor-Patient Portal</h1>
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
		<div class="dateforcom">
		<form action="" method="post">
		<select id="department" name="department">
							<option value="">Department</option>
							<option value="Neurology">Neurology</option>
							<option value="Cardiology">Cardiology</option>
							<option value="ALL">ALL</option>
		</select>
		From <input type="date" id="fromDateCom" name="fromDateCom">
		To <input type="date" id="toDateCom" name="toDateCom">
		<input type="submit" id="submitForCom" name="submitForCom" value="Show">
		</form>
		<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']=="date_null")
			{
				echo "You must enter Dates";
			}
		}
	?>
		</div>
		<div class="chart_comm" id="chart"></div>
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