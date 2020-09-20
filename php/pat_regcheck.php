<?php
		require_once('../service/userService.php');
		
		$status=getEmailPatient($_POST['email']);
		
		if($status)
		{
			echo "Existing Email";
		}
		else
		{
			echo "Okay";
		}
		
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$password = $_POST['password'];
		$conPass = $_POST['confirmPassword'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$id;
		
		if(empty($name) || empty($password) || empty($email) || empty($contact) || empty($conPass) || empty($gender) || empty($dob))
		{
			header('location: ../views/login.php?error=null');
		}
		else if(empty($name) || empty($password) || empty($email) || empty($contact) || empty($conPass) || empty($gender) || empty($dob))
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
			
			if($contact=="")
			{
				header('location: ../views/login.php?error=null_contact');
			}
			else
			{
				if(strlen($contact)!=9)
				{
					header('location: ../views/login.php?error=invalid_contact');
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
		}
		
		$status = registerPatient($name,$email,$contact,$password,$gender,$dob);
		
		if(status)
		{
			header("location: ../views/pat_regcom.php?email=".$email);
		}
		else
		{
			header("location: ../views/pat_registration.php?error=invalid");
		}
	}
	/*else
	{
		header("location: dashboard.php");
	}*/
?>