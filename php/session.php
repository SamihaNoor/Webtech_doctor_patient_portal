<?php
	session_start();

	if(isset($_SESSION['status']))
	{
		
	}
	else if(isset($_COOKIE['status']))
	{
		
	}
	else
	{
		header('location: ../views/index.php');
	}
?>
