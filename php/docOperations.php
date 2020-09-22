<?php
	require_once('../service/userService_doc.php');
	
	
	
	
	if (isset($_GET['docId']) && isset($_GET['date']) && isset($_GET['patId']))
	{
		$status = docApprove($_GET['patId'],$_GET['docId'],$_GET['date']);
		
		if(status)
		{
			header('location: ../views/appointments.php?success=approve');
		}
		else
		{
			header('location: ../views/appointments.php?error=try_again');
		}
	}
	
	
?>