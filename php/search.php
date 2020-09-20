<?php
		require_once('../service/userService.php');
		
		$status=getDocs($_POST['docName']);
		
		if($status)
		{
			echo "Existing email";
		}
		else
		{
			echo "Okay";
		}
?>