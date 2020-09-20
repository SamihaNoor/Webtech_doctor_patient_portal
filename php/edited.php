<?php
	require_once('../php/session.php');
	require_once('../service/userService.php');
	
	/*if(isset($_SESSION['id']))
	{
		$id=$_SESSION['id'];
	}
	else if(isset($_COOKIE['id']))
	{
		$id=$_COOKIE['id'];
	}*/

		if($_POST['submit'])
		{
			$id=$_POST['id'];
			$name=$_POST['name'];
			$newPass=$_POST['password'];
			$rePass=$_POST['confirmPassword'];
			$dob=$_POST['dob'];
			
			if($name=="")
			{
				header('location: ../views/editprofile.php?error=try_again');
			}
			else if($dob=="")
			{
				header('location: ../views/editprofile.php?error=try_again');
			}
			else if($name!="" && $dob!="")
			{
				$r= chng($name,$dob,$id);
				if($r)
				{
					header('location: ../views/viewprofile.php?success=updated');
				}
				else
				{
					header('location: ../views/editprofile.php?error=try_again');
				}
			}
			
			if($newPass!="" && $rePass!="")
			{
				if(!strcmp($newPass,$rePass))
				{
					$r= chngP($newPass,$id);
					if($r)
					{
						header('location: ../views/viewprofile.php?success=updated');
					}
					else
					{
						header('location: ../views/editprofile.php?error=try_again');
					}
				}
				else
				{
					header('location: ../views/editprofile.php?error=try_again');
				}
			}
		}
?>