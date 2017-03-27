<?php

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager";  

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if(!$con){
		die('Connect Error:'.mysqli_connect_error());
	}

   	$Sno = $_POST["Sno"];


	// $sql = "SELECT Sstatus FROM Student WHERE Sno = '".$Sno."'";
	// $result = mysqli_query($con,$sql);
	// $temp[] = mysqli_fetch_array($result,MYSQLI_NUM);
	// if($temp[0]==0){
	// 	echo  4;
	// 	exit();
	// }

						
	$sql = "SELECT Tresults,Presults,Rresults,Score FROM Score WHERE Sno = '".$Sno."'";
	$result = mysqli_query($con,$sql);
	//echo $result;
	$temp = mysqli_fetch_all($result,MYSQLI_ASSOC);

	echo json_encode($temp,JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>