<?php

	$user = $_POST["username"];
	$password = $_POST["userpswd"];

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager";  

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if(!$con){
		die('Connect Error:'.mysqli_connect_error());
	}

	$sql = "SELECT * From Account WHERE User = '".$user."'";
	$result = mysqli_query($con,$sql);

	if(($result)<1){
		echo 0;
	} else {
		$type = mysqli_fetch_array($result,MYSQLI_NUM);
		if ($type[2] == "1") {
			# code...
			echo 1;
		} elseif ($type[2] == '2') {
			# code...
			echo 2;
		} elseif ($type[2] == '3') {
			echo 3;
		} else {
			echo 0;
		}
	}

	mysqli_close($con);
?>