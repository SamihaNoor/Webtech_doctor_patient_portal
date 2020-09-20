<?php
	require_once('../service/userService.php');
	
	
	if(isset($_POST['appointment']))
	{
		$docId= $_GET['docId'];
		//$patId= $_GET['patId'];
		header('location: ../views/pat_reqAppointment.php?docId='.$docId);
		
	}
	
	if(isset($_POST['reqApp']))
	{
		$reqDate= $_POST['reqDate'];
		//echo $_POST['reqDate'];
		$docId= $_GET['docId'];
		$patId= $_GET['patId'];
		if(empty($reqDate))
		{
			header('location: ../views/pat_reqAppointment.php?error=null&docId='.$docId);
		}
		else
		{
			$req = reqApp($patId,$docId,$reqDate);
			if($req)
			{
				header('location: ../views/pat_viewdoctor.php?docId='.$docId);
			}
			else
			{
				header('location: ../views/pat_reqAppointment.php?docId='.$docId);
			}
		}
	}
	
	if (isset($_GET['docId']) && isset($_GET['date']) && isset($_GET['patId']))
	{
		$status = patCancel($_GET['patId'],$_GET['docId'],$_GET['date']);
		
		if(status)
		{
			header('location: ../views/pat_requestedApp.php?success=cancel');
		}
		else
		{
			header('location: ../views/pat_requestedApp.php?error=try_again');
		}
	}
	
	//send review
	/*if(isset($_POST['review']))
	{
		$count = count($_FILES['file']['name']);
		for($i=0;$i<$count;$i++)
		{
			$filedir = '../review/'.$_FILES['file']['name'][$i];
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $filedir))
			{
				header('location: ../views/dashboard.php');
			}
			else
			{
				header('location: ../views/viewdoctors.php');
			}
		}
	}*/

?>