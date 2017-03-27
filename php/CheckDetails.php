<?php  
	$Pno = $_POST["Pno"];

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager"; 

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if (!$con) {
		die('Could not connect:'.mysqli_error());
	}

	$sql = "SELECT Pdescribe FROM Title WHERE Pno = '".$Pno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_array($result,MYSQLI_NUM);

	echo $temp[0];


	mysqli_close($con);

?>