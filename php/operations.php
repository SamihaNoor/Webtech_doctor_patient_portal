<?php
	require_once('../service/userService.php');
	
	//approve doc
		if (isset($_GET['docId']))
		{
			$status = approve($_GET['docId']);
			
			if(status)
			{
				header('location: ../views/approvedoctors.php');
			}
			else
			{
				header('location: ../views/dashboard.php');
			}
		}

	
	//chat doctor admin
	if(isset($_POST['chat']))
	{
		$docId= $_POST['docId'];
		header('location: ../views/chatDocAdmin.php?docId='.$docId);
	}
	
	//chat Patient admin
	if(isset($_POST['chatPatient']))
	{
		$patId= $_GET['patId'];
		header('location: ../views/chatPatAdmin.php?patId='.$patId);
	}
	
	//doctor's consulted patients 
	if(isset($_POST['performance']))
	{
		$docName= $_POST['docName'];
		header('location: ../views/doctorsPerf.php?docName='.$docName);
		
	}
	
	if(isset($_POST['terminate']))
	{
		$docId= $_POST['docId'];
		
		header('location: ../views/terminateDoc.php?docId='.$docId);
		
	}
	
	if(isset($_POST['yes']))
	{
		$docId= $_POST['docId'];
		$doc = terminate($docId);
		header('location: ../views/dashboard.php');
		
	}
	
	if(isset($_POST['no']))
	{
		$docId= $_POST['docId'];
		
		header('location: ../views/viewdoctor.php?docId='.$docId);
		
	}
	
	//seen complains
	
	if (isset($_GET['id']))
		{
			$status = seen($_GET['id']);
			
			if(status)
			{
				header('location: ../views/complainbox.php');
			}
			else
			{
				header('location: ../views/dashboard.php');
			}
		}
	
	//send review
	if(isset($_POST['review']))
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
	}

?>