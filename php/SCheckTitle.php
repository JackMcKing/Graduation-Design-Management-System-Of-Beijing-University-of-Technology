<?php  

	$Sno = $_POST["Sno"];

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager"; 


	$con = mysqli_connect($servername,$username,$password,$dbname);
	if (!$con) {
		die('Could not connect:'.mysqli_error());
	}

	$sql = "SELECT Score FROM Student WHERE Sno = '".$Sno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_array($result,MYSQLI_NUM);

	//echo $temp[0];


	$sql = "SELECT Pno,Ptitle,Tno,Tname FROM Title WHERE Mark < ($temp[0])";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_all($result,MYSQLI_ASSOC);

	//var_dump($temp);


	echo json_encode($temp,JSON_UNESCAPED_UNICODE);

	// $temp = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// echo json_encode($temp,JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>