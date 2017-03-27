<?php  
	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager"; 

   	$Pno = $_POST["Pno"];
 //  	$Sno = $_POST["Sno"];

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if (!$con) {
		die('Could not connect:'.mysqli_error());
	}

	//echo '0';

	$sql = "DELETE FROM Title WHERE Pno ='".$Pno."'";
	if(mysqli_query($con, $sql)){
		echo 1;
	} else {
		echo 0;
	}

	//echo 


	mysqli_close($con);
?>