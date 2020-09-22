<?php
	require_once('../db/dbConnect.php');


	// get doctor profile
	
	function getDoctorProfile($id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from doctors where docId=".$id."";
		$data= mysqli_query($con,$sql);
		$doctors = mysqli_fetch_assoc($data);
		
		return $doctors;
	}
	//get patient profile
	function getPatProfile($id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from patients where patId=".$id."";
		$data= mysqli_query($con,$sql);
		$pat = mysqli_fetch_assoc($data);
		
		return $pat;
	}

	
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
/// get all patients
	function getAllPatients()
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from patients";
		$data= mysqli_query($con,$sql);
		$patients = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($patients, $row);
		}

		return $patients;
	}
	
	//get Patients by name
	function getPatByName($name)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from patients where patName like '%".$name."%'";
		$data= mysqli_query($con,$sql);
		$patients = [];

		while($row = mysqli_fetch_assoc($data))
		{
			array_push($patients, $row);
		}

		return $patients;
	}
	
	//get Patient's information
	function getPat($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}

		$sql= "select * from patients where patId=".$patId."";
		$data= mysqli_query($con,$sql);
		$patient = mysqli_fetch_assoc($data);

		return $patient;
	}
	
	//get doc by Name
	function getDocByName($name)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where status=".$status." and docName like '%".$name."%'";
		$data= mysqli_query($con,$sql);
		$doctors = [];

		while($row = mysqli_fetch_assoc($data))
		{
			array_push($doctors, $row);
		}

		return $doctors;
	}
	//get Doctor's information
	function getDoc($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where docId=".$docId."";
		$data= mysqli_query($con,$sql);
		$doctor = mysqli_fetch_assoc($data);

		return $doctor;
	}
	
	//consulted pat 
	function getPatNo($docName,$fromDateC,$toDateC)
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql= "SELECT date, sum(pat_count) pat FROM pop_docs where docName='".$docName."' and date between '".$fromDateC."' and '".$toDateC."' group by date";
    $data = mysqli_query($con,$sql);

	$pats = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($pats, $row);
		}

		return $pats;
	}
	
	function popDocsAll()
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT docName, sum(pat_count) pat FROM pop_docs group by docName";
    $data = mysqli_query($con,$sql);
	$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
	}
	function getPatId($email)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select patId from patients where patEmail='".$email."'";
		$data= mysqli_query($con,$sql);
		$pat = mysqli_fetch_assoc($data);
		$id = $pat['patId'];
		
		return $id;
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

	function reqApp($patId,$docId,$reqDate)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$s=0;
		$sql = "insert into appointments (patId, docId, date, status) values (".$patId.",".$docId.",'".$reqDate."',".$s.")";
		//INSERT INTO `appointments`(`patId`, `docId`, `date`, `status`) VALUES (50001,8001,"2020-09-07",0)
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
	
	//get pending appointment
	function getPendingApps($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=0;
		$sql="select * from appointments where docId=".$docId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	function getHistory($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=5;
		$sql="select * from appointments where patId=".$patId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	//get approved appointment
	function getApprovedApps($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=1;
		$sql="select * from appointments where docId=".$docId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	//get canceled appointment
	function getCanceledApps($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=2;
		$sql="select * from appointments where docId=".$docId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	//get rejected appointment
	function getRejectedApps($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=4;
		$sql="select * from appointments where docId=".$docId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	
	//cancel appointment
	
	function docCancel($patId,$docId,$date)
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
		
	}
?>
