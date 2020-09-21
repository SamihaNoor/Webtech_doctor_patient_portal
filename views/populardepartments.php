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
	
	if(isset($_POST['submitForDept']))
	{
		$fromDateDept= $_POST['fromDateDept'];
		$toDateDept= $_POST['toDateDept'];
			 
		if($fromDateDept=="" && $toDateDept=="")
		{
			$data = popDeptsAll();
		}
		else if($fromDateDept!="" && $toDateDept!="")
		{
			$data = val($fromDateDept,$toDateDept);
		}
		else
		{
			header('location:populardepartments.php?error=date_null');
		}
	
		//echo $data;
	}
?>
<html>
<head>
	<title>popular Department</title>
	<link href="../assets/rest2.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Department', 'Consulted Patients'],
         <?php
		 
		  for($i=0;$i!=count($data);$i++)
		  {
			  echo "['".$data[$i]['department']."',".$data[$i]['pat']."],";
		  }
         ?>
        ]);

        var options = {
		title: 'Popular Departments<?php echo " from " .$_POST['fromDateDept']. " to ". $_POST['toDateDept'];?>'
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
		<div class="datefordept">
		<form action="" method="post">
		From <input type="date" id="fromDateDept" name="fromDateDept">
		To <input type="date" id="toDateDept" name="toDateDept">
		<input type="submit" id="submitForDept" name="submitForDept" value="Show">
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
		<div class="chart_dept" id="chart"></div>
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