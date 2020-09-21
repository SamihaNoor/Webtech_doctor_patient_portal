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
	
		$docName=$_GET['docName'];
	
?>
<html>
<head>
	<title>Doctor's Performance</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Date', 'Consulted Patients'],
        <?php
			if(isset($_POST['submitForPats']))
			{
				$fromDateC = $_POST['fromDateC'];
				$toDateC = $_POST['toDateC'];
				
				if(empty($fromDateC) || empty($fromDateC))
				{
					echo "Enter Dates";
				}
				else
				{
					$data = getPatNo($docName,$fromDateC,$toDateC);
					for($i=0;$i!=count($data);$i++)
					{
						echo "['".$data[$i]['date']."',".$data[$i]['pat']."],";
					}
				}
			}
		
        ?>
        ]);

        var options = {
          title: 'Consulted Patients <?php echo " from " .$_POST['fromDateC']. " to ". $_POST['toDateC'];?>'
		  
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart'));

        chart.draw(data, options);
      }
	  </script>
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
		<div class="datefordoc">
		<form action="" method="post">
		From <input type="date" id="fromDateC" name="fromDateC">
		To <input type="date" id="toDateC" name="toDateC">
		<input id="show" type="submit" id="submitC" name="submitForPats" value="Show">
		</form>
		</div>
		<div class="chart_doc" id="chart"></div>
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