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
	<title>popular Doctors</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Doctors', 'Consulted Patients'],
        <?php
		 
			$fromDateDoc= $_POST['fromDateDoc'];
			$toDateDoc= $_POST['toDateDoc'];
			 
			if($fromDateDoc=="" && $toDateDoc=="")
			{
				$data = popDocsAll();
			}
			else if($fromDateDoc!="" && $toDateDoc!="")
			{
				$data = popDocs($_POST['fromDateDoc'],$_POST['toDateDoc']);
			}
			else
			{
				header('location:populardoctors.php?error=date_null');
			}
		for($i=0;$i!=count($data);$i++)
		{
		 echo "['".$data[$i]['docName']."',".$data[$i]['pat']."],";
		}
         ?>
        ]);

        var options = {
          title: 'Popular Doctors <?php echo " from " .$_POST['fromDateDoc']. " to ". $_POST['toDateDoc'];?>'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));

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
					<button class="button" onclick="location.href='commission.php'"> commission</button>
					<button class="button" onclick="location.href='complainbox.php'"> Complain Box</button>
					<button class="button" onclick="location.href='../php/logout.php'">Logout</button>
		</div>
		<div class="datefordoc">
		<form action="" method="post">
		From <input type="date" id="fromDateDoc" name="fromDateDoc">
		To <input type="date" id="toDateDoc" name="toDateDoc">
		<input type="submit" id="submitForDocs" name="submitForDocs" value="Show">
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