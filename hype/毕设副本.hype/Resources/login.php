<?php
	$servername = "localhost";
	$username = "root";
	$password = "Andrewshizxj123!";
	$dbname = "ProjectManagement";

	$user = $password = "";

	$user = $_POST["username"];
	$password = $_POST["userpwd"];

	$con = mysql_connect($servername,$username,$password,$dbname);
	if(!$con){
		die('Could not connect:'.mysql_error());
	}

	//mysql_select_db('ProjectManagement',$con);

	$result = mysql_query("SELECT password FROM User WHERE UserId = '$user'");
	if ($password == $result) {
		return 1;
	}
	else{
		return 0;
	}

	mysql_close($con);
?>