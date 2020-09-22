<?php
	require_once('../db/dbConnect.php');

	
// check id & password for login
	function check($userId,$password)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from credentials where userId=".$userId." and password='".$password."'";
		$data= mysqli_query($con,$sql);
		$doctors = mysqli_fetch_assoc($data);
		
		if(count($doctors)>0)
		{
			return $doctors['type'];
		}
		else
		{
			return false;
		}
	}
	
// 	register doctor
	function registerDoctors($name,$email,$password,$gender,$dob,$dept,$city,$day,$time)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql = "INSERT INTO doctors (docName, email, gender, dob,dept,city,day,time) VALUES ('".$name."','".$email."','".$gender."','".$dob."','".$dept."','".$city."','".$day."','".$time."')";
		$res = mysqli_query($con, $sql);
		$result;
		if($res)
		{
			/*$sql= "select id from admins where email='".$email."'";
			$data= mysqli_query($con,$sql);
			$admin = mysqli_fetch_assoc($data);
			$id = $admin['id'];*/
			$id = getId($email);
			$type = 2;
			$status = 0;
			$q = "insert into credentials (userId, password, type, status) values ('".$id."','".$password."','".$type."','".$status."')";
			$result = mysqli_query($con, $q);
		}
		if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
	}

	function getdocId($email)

     {

         $con = dbConnection();
 
        if(!$con)

         {

             echo "DB connection error";

         }


         $sql= "select docId from doctors where email='".$email."'";

         $data= mysqli_query($con,$sql);

         $doctors = mysqli_fetch_assoc($data);

         $id = $doctors['docId'];


         return $id;

     }

	// check unique email

     function getEmail($email)

     {

         $con = dbConnection();
 
        if(!$con)

         {

             echo "DB connection error";

         }


         $sql= "select email from doctors where email like '{$email}'";

         $result = mysqli_query($con, $sql);

         if(mysqli_fetch_assoc($result) > 0) 

         {

             return true;

         }

         else

         {

             return false;

         }

     }

	//get canceled appointment
	function getCanceledApps($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=3;
		$sql="select * from appointments where patId=".$patId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	
	
	//cancel appointment
	
	function patCancel($patId,$docId,$date)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=2;
		$sql="update appointments set status=".$s." where patId=".$patId." and docId=".$docId." and date='".$date."'";
		$result= mysqli_query($con,$sql);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function getDocs($docName)
	{
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
					</tr>";
	}

	$data .= "</table>";

	echo $data;
		
	} */
?>