<?php
		require_once('../service/userService_doc.php');
		
		$status=getEmail($_POST['email']);
		
		if($status)
		{
			echo "Existing email";
		}
		else
		{
			echo "Okay";
		} 
		
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$conPass = $_POST['confirmPassword'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$dept = $_POST['dept'];
		$city = $_POST['city'];
		$day = $_POST['day'];
		$time = $_POST['time'];
		$id;
		
		if(empty($name) || empty($password) || empty($email) || empty($conPass) || empty($gender) || empty($dob))
		{
			header('location: ../views/login.php?error=null');
		}
		else if(empty($name) || empty($password) || empty($email) || empty($conPass) || empty($gender) || empty($dob))
		{
			if($name == "")
			{
				header('location: ../views/login.php?error=null_name');
			}
			else
			{
				if(($name[0] < 'a' || $name[0] > 'z') && ($name[0] < 'A' || $name[0] > 'Z'))
				{
					header('location: ../views/login.php?error=name_letter');
				}
				else if(str_word_count($name)<2)
				{
					header('location: ../views/login.php?error=name_word');
				}
			}
			
			if($email == "")
			{
				header('location: ../views/login.php?error=null_email');
			}
			else
			{
				if(strpos($email,"@") || (strpos($email,"@") && strpos($email,"@") && strpos($email,"@"))) 
				{
					header('location: ../views/login.php?error=email_notvalid');
				}
			}
			if($password == "")
			{
				header('location: ../views/login.php?error=null_password');
			}
			else
			{
				/*if(strlen($password)<4)
				{
					header('location: ../views/login.php?error=weak');
				}
				else if(strlen($password)<6)
				{
					header('location: ../views/login.php?error=moderate');
				}
				else
				{
					header('location: ../views/login.php?error=strong');
				}*/
			}
			if($conPass == "")
			{
				header('location: ../views/login.php?error=null_conpass');
			}
			else
			{
				if($conPass!=$password)
				{
					header('location: ../views/login.php?error=notmatched');
				}
			}
			if($gender== "" )
			{
				header('location: ../views/login.php?error=null_gender');
			}
			if($dob == "")
			{
				header('location: ../views/login.php?error=null_dob');
			}
			if($dept == "")
			{
				header('location: ../views/login.php?error=null_dept');
			}
			if($city == "")
			{
				header('location: ../views/login.php?error=null_city');
			}
			if($day == "")
			{
				header('location: ../views/login.php?error=null_day');
			}
			if($time == "")
			{
				header('location: ../views/login.php?error=null_time');
			}
		}
		
		$status = registerDoctors($name,$email,$password,$gender,$dob, $dept, $city, $day, $time);
		
		if(status)
		{
			header("location: ../views/docregcom.php");
		}
		else
		{
			header("location: ../views/registration.php?error=invalid");
		}
	}
	/*else
	{
		header("location: dashboard.php");
	}*/
?>