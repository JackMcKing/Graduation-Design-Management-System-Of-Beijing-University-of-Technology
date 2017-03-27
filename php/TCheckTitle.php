<?php
	$Tno = $_POST["Tno"];

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager";  

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if(!$con){
		die('Connect Error:'.mysqli_connect_error());
	}

	$sql = "SELECT Pno,Ptitle FROM Title WHERE Tno = '".$Tno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_all($result,MYSQLI_ASSOC);


	echo json_encode($temp,JSON_UNESCAPED_UNICODE);
	//echo $json;

	//echo urlencode($json);
	//var_dump($temp[0]);
	//var_dump($json);
	//echo $lalala;
	//echo "hahaahahahahaha''";
	//echo "233333";

	mysqli_close($con);
?>