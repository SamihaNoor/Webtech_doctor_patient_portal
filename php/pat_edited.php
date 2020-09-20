<?php
	require_once('../php/session.php');
	require_once('../service/userService.php');
	
	if(isset($_SESSION['id']))
	{
		$id=$_SESSION['id'];
	}
	else if(isset($_COOKIE['id']))
	{
		$id=$_COOKIE['id'];
	}

		if($_POST['submit'])
		{
			$name=$_POST['name'];
			$contact=$_POST['contact'];
			$newPass=$_POST['password'];
			$rePass=$_POST['confirmPassword'];
			$dob=$_POST['dob'];
			
			echo $name;
			echo $contact;
			echo $dob;
			echo $id;
			
			
			if($name=="")
			{
				header('location: ../views/pat_editprofile.php?error=try_again');
			}
			else if($dob=="")
			{
				header('location: ../views/pat_editprofile.php?error=try_again');
			}
			else if($contact=="")
			{
				header('location: ../views/pat_editprofile.php?error=try_again');
			}
			else if($name!="" && $dob!="" && $contact!="")
			{
				$r= chngPatInfo($name,$dob,$contact,$id);
				if($r)
				{
					header('location: ../views/pat_viewprofile.php?success=updated');
				}
				else
				{
					header('location: ../views/pat_editprofile.php?error=try_again');
				}
			}
			
			if($newPass!="" && $rePass!="")
					{
						if(!strcmp($newPass,$rePass))
						{
							$re= chngP($newPass,$id);
							if($re)
							{
								header('location: ../views/pat_viewprofile.php?success=updated');
							}
							else
							{
								header('location: ../views/pat_editprofile.php?error=try_again');
							}
						}
						else
						{
							header('location: ../views/pat_editprofile.php?error=try_again');
						}
					}
		}
?>