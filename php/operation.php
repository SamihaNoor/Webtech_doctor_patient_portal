<?php
	
	
	
	
	
	/*require_once('../db/db.php');
	$dName = $_POST['dName'];

		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
	$status=1;
	$sql= "select * from doctors where status=".$status." and docName like '%{$dName}%'";

	$result = mysqli_query($con, $sql);

	$data = "<table border=1 align=center> 
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Gender</td>
					<td>Date Of Birth</td>
					<td>Department</td>
					<td>City</td>
					<td></td>
				</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
			$data .= "<tr>
							<td>{$row['docId']}</td>
							<td>{$row['docName']}</td>
							<td>{$row['email']}</td>
							<td>{$row['gender']}</td>
							<td>{$row['dob']}</td>
							<td>{$row['dept']}</td>
							<td>{$row['city']}</td>
							<td><button name='view' type='button' onclick='location.href=../views/viewdoctor.php?docId={$row['docId']}'>VIEW</td>
					</tr>";
	}

	$data .= "</table>";

	echo $data;*/
?>