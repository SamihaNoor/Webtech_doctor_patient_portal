<?php
	require_once('../db/db.php');

	// get profile
	
	function getProfile($id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select * from admins where id=".$id."";
		$data= mysqli_query($con,$sql);
		$admin = mysqli_fetch_assoc($data);
		
		return $admin;
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
	
	//change patient info 
	function chngPatInfo($name,$dob,$contact,$id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql = "update patients set patName='".$name."',patDob='".$dob."',patContact=".$contact." where patId=".$id."";
		$r = mysqli_query($con, $sql);
		
		if($r)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//get admin Id
	function getId($email)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select id from admins where email='".$email."'";
		$data= mysqli_query($con,$sql);
		$admin = mysqli_fetch_assoc($data);
		$id = $admin['id'];
		
		return $id;
	}
	
// 	register admin
	function registerAdmin($name,$email,$password,$gender,$dob)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql = "INSERT INTO admins (name, email, gender, dob) VALUES ('".$name."','".$email."','".$gender."','".$dob."')";
		$res = mysqli_query($con, $sql);
		$result;
		if($res)
		{
			/*$sql= "select id from admins where email='".$email."'";
			$data= mysqli_query($con,$sql);
			$admin = mysqli_fetch_assoc($data);
			$id = $admin['id'];*/
			$id = getId($email);
			$type = 1;
			$status = 1;
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
	
	// register Patient
	function registerPatient($name,$email,$contact,$password,$gender,$dob)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql = "INSERT INTO patients (patName, patEmail, patContact, patDob, patGender) VALUES ('".$name."','".$email."',".$contact.",'".$dob."',".$gender.")";
		$res = mysqli_query($con, $sql);
		$result;
		if($res)
		{
			/*$sql= "select id from admins where email='".$email."'";
			$data= mysqli_query($con,$sql);
			$admin = mysqli_fetch_assoc($data);
			$id = $admin['id'];*/
			$id = getPatId($email);
			$type = 3;
			$status = 1;
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
	
// check unique email
	function getEmail($email)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select email from admins where email like '{$email}'";
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
	function getEmailPatient($email)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql= "select patEmail from patients where patEmail like '{$email}'";
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
	
// check id & password for login
	function check($userId,$password)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$status=1;
		$sql= "select * from credentials where userId=".$userId." and password='".$password."' and status=".$status."";
		$data= mysqli_query($con,$sql);
		$admin = mysqli_fetch_assoc($data);
		
		if(count($admin)>0)
		{
			return $admin['type'];
		}
		else
		{
			return false;
		}
	}
	
//get still unapproved doctors
function getDoctors()
{
	$con = dbConnection();
	if(!$con)
	{
		echo "DB connection error";
	}
	
	$status=0;
	$sql= "select * from doctors where status=".$status."";
	$data= mysqli_query($con,$sql);
	$doctors = [];

	while($row = mysqli_fetch_assoc($data)){
		array_push($doctors, $row);
	}

	return $doctors;
}
//chat pat admin
//send msg
function sendMsgP($adId,$patId,$msg)
{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "INSERT INTO chats_pats_admins (adId, patId, msg) VALUES (".$adId.",".$patId.",'".$msg."')";
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

function getMsgP($adId,$patId)
{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql="select * from chats_pats_admins where adId=".$adId." and patId=".$patId."";
	$data= mysqli_query($con,$sql);
	$msgs = [];

	while($row = mysqli_fetch_assoc($data)){
		array_push($msgs, $row);
	}

	return $msgs;
}

//chat doc admin
//send msg
function sendMsg($adId,$docId,$msg)
{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "INSERT INTO chats_docs_admins (adId, docId, msg) VALUES (".$adId.",".$docId.",'".$msg."')";
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

function getMsg($adId,$docId)
{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql="select * from chats_docs_admins where adId=".$adId." and docId=".$docId."";
	$data= mysqli_query($con,$sql);
	$msgs = [];

	while($row = mysqli_fetch_assoc($data)){
		array_push($msgs, $row);
	}

	return $msgs;
}


//terminate doctor
	function terminate($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=2;
		$sql = "update doctors set status=".$s." where docId=".$docId."";
		$result= mysqli_query($con,$sql);
		if($result)
		{
			$sql = "update credentials set status=".$s." where userId=".$docId."";
			$r= mysqli_query($con,$sql);
		
			if($r)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	//approve doctocs
	function approve($docId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=1;
		$sql = "update doctors set status=".$s." where docId=".$docId."";
		$result= mysqli_query($con,$sql);
		if($result)
		{
			$sql = "update credentials set status=".$s." where userId=".$docId."";
			$r= mysqli_query($con,$sql);
		
			if($r)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	// view approved doctors
	function getApprovedDocs()
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where status=".$status."";
		$data= mysqli_query($con,$sql);
		$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
	}
	
	// search doctors by city and department
	function getDocsByDeptCity($dept,$city)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where status=".$status." and dept='".$dept."' and city='".$city."'";
		$data= mysqli_query($con,$sql);
		$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
	}
	//get doctors by dept
	function getDocsByDept($dept)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where status=".$status." and dept='".$dept."'";
		$data= mysqli_query($con,$sql);
		$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
	}
	//get doc by CITY
	function getDocByCity($city)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=1;
		$sql= "select * from doctors where status=".$status." and city='".$city."'";
		$data= mysqli_query($con,$sql);
		$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
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
	
	//popular doctors
	function popDocs($fromDate,$toDate)
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT docName, sum(pat_count) pat FROM pop_docs where date between '".$fromDate."' and '".$toDate."' group by docName";
    $data = mysqli_query($con,$sql);
	$doctors = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($doctors, $row);
		}

		return $doctors;
	}
	//popular department
	function val($fromDate,$toDate)
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT department, sum(pat_count) pat FROM pop_dept where date between '".$fromDate."' and '".$toDate."' group by department";
    $data = mysqli_query($con,$sql);
	$depts = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($depts, $row);
		}

		return $depts;
	}
	//popular departmet all
	function popDeptsAll()
	{
		$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT department, sum(pat_count) pat FROM pop_dept group by department";
    $data = mysqli_query($con,$sql);
	$depts = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($depts, $row);
		}

		return $depts;
	}
	//all department commission
	function allDeptCom($fromDate,$toDate)
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT department, sum(commission) commission FROM commissions where date between '".$fromDate."' and '".$toDate."' group by department";
    $data = mysqli_query($con,$sql);
	$depts = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($depts, $row);
		}

		return $depts;
	}
	// commission by department
	function comByDept($department,$fromDateCom,$toDateCom)
	{
	$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT date, sum(commission) commission FROM commissions where department='".$department."' and date between '".$fromDateCom."' and '".$toDateCom."' group by date";
    $data = mysqli_query($con,$sql);
	$vals = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($vals, $row);
		}

		return $vals;
	}
	
	
	//commission by date
	function comByDate($fromDateCom,$toDateCom)
	{
		$con = dbConnection();

	if(!$con)
	{
		echo "DB connection error";
	}
	$sql = "SELECT date, sum(commission) commission FROM commissions where date between '".$fromDateCom."' and '".$toDateCom."' group by date";
    $data = mysqli_query($con,$sql);
	$vals = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($vals, $row);
		}

		return $vals;
	}
	// change admin's name & dob
	function chng($name,$dob,$id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql = "update admins set name='".$name."',dob='".$dob."' where id=".$id."";
		$r = mysqli_query($con, $sql);
		
		if($r)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// change admin's password
	function chngP($newPass,$id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		
		$sql ="update credentials set password='".$newPass."' where userId=".$id."";
		$r = mysqli_query($con, $sql);
		
		if($r)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// view complains
	function getComplains()
	{
		$con = dbConnection();
		if(!$con)
		{
			echo "DB connection error";
		}
		
		$status=0;
		$sql= "select * from complainbox where status=".$status."";
		$data= mysqli_query($con,$sql);
		$complains = [];

		while($row = mysqli_fetch_assoc($data)){
			array_push($complains, $row);
		}

		return $complains;
	}
	
	//seen complains
	function  seen($id)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=1;
		$sql = "update complainbox set status=".$s." where id=".$id."";
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
	
	// req appointment
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
	function getPendingApps($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=0;
		$sql="select * from appointments where patId=".$patId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
	}
	
	//get approved appointment
	function getApprovedApps($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=1;
		$sql="select * from appointments where patId=".$patId." and status=".$s."";
		$result= mysqli_query($con,$sql);
		$appointments = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($appointments, $row);
		}

		return $appointments;
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
	//get rejected appointment
	function getRejectedApps($patId)
	{
		$con = dbConnection();

		if(!$con)
		{
			echo "DB connection error";
		}
		$s=4;
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
		
	}
?>