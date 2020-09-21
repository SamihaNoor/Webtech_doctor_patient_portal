<?php
	$host	= "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName	= "projectmid";

	function dbConnection(){
		global $host;
		global $dbName;
		global $dbUser;
		global $dbPass;

		return $con = mysqli_connect($host, $dbUser, $dbPass, $dbName);
	}
?>