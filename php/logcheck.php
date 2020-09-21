<?php
	require_once('../php/session.php');
	require_once('../service/userService.php');
	
	if(isset($_POST['submit']))
	{
		$userId = $_POST['id'];
		$password = $_POST['password'];

		if(empty($userId) || empty($password))
		{
			header('location: ../views/login.php?error=null_value');
		}
		else
		{
			$status = check($userId,$password);
			
			if($status)
			{
				if($status==1)
				{
					$_SESSION['id']=$userId;
					$_SESSION['type']=$status;
					$_SESSION['status']  = "OK";
					if(isset($_POST['rememberme']))
					{
						setcookie('id', $userId, time()+360, '/');
						setcookie('password', $password, time()+360, '/');
						setcookie('type', $status, time()+360, '/');
						setcookie('status', "OK", time()+360, '/');
					}
					header('location: ../views/dashboard.php');
				}
				else if($status==2)
				{
					$_SESSION['id']=$userId;
					$_SESSION['type']=$status;
					$_SESSION['status']  = "OK";
					if(isset($_POST['rememberme']))
					{
						setcookie('id', $userId, time()+360, '/');
						setcookie('password', $password, time()+360, '/');
						setcookie('type', $status, time()+360, '/');
						setcookie('status', "OK", time()+360, '/');
					}
					header('location: ../views/doc_dashboard.php');
				}
				else if($status==3)
				{
					$_SESSION['id']=$userId;
					$_SESSION['type']=$status;
					$_SESSION['status']  = "OK";
					if(isset($_POST['rememberme']))
					{
						setcookie('id', $userId, time()+360, '/');
						setcookie('password', $password, time()+360, '/');
						setcookie('type', $status, time()+360, '/');
						setcookie('status', "OK", time()+360, '/');
					}
					header('location: ../views/pat_dashboard.php');
				}
			}
			else
			{
				header('location: ../views/login.php?error=invalid_user');
			}
		}
	}
	else
	{
		header("location: ../views/login.php");
	}
?>
