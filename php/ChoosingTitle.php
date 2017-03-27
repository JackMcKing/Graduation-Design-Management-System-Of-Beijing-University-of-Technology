<?php

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager"; 

   	$Pno = $_POST["Pno"];
   	$Sno = $_POST["Sno"];

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if (!$con) {
		die('Could not connect:'.mysqli_error());
	}

	$sql = "SELECT Score FROM Student WHERE Sno = '".$Sno."'";
	$result = mysqli_query($con,$sql);
	$tempA = mysqli_fetch_array($result,MYSQLI_NUM);

	$sql = "SELECT Mark FROM Title WHERE Pno = '".$Pno."'";
	$result = mysqli_query($con,$sql);
	$tempB = mysqli_fetch_array($result,MYSQLI_NUM);
	// echo $tempA[0];
	// echo 23333333;
	// echo $tempB[0];
	//echo $Sno,$Pno;

	if ($tempA[0] > $tempB[0]) {
		//echo 233;
		$sql = "SELECT Pno FROM SelectionInformation WHERE Sno = '".$Sno."'";
		$result = mysqli_query($con,$sql);
		$temp = mysqli_fetch_array($result,MYSQLI_NUM);
		//var_dump($temp);
		if ($temp[0] == null) {

			$sql = "SELECT Tno FROM Title WHERE Pno = '".$Pno."'";
			$result = mysqli_query($con,$sql);
			$temp = mysqli_fetch_array($result,MYSQLI_NUM);

			//var_dump($temp[0]);

			$sql1 = "INSERT INTO SelectionInformation(Pno,Tno,Sno) VALUES('$Pno','$temp[0]','$Sno')";
			// if (mysqli_query($con,$sql)) {
			// 	# code...
			// 	echo 233;
			// }
			$sql2 = "UPDATE Title SET Mark = '$tempA[0]' WHERE Pno = '".$Pno."'";
			if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2)) {
				echo 1;
			} 
		} else {
			$sql = "SELECT Tno FROM Title WHERE Pno = '".$Pno."'";
			$result = mysqli_query($con,$sql);
			$temp = mysqli_fetch_array($result,MYSQLI_NUM);
			//echo $temp[0];

			$sql4 = "SELECT Pno FROM SelectionInformation WHERE Sno = '".$Sno."'";
			$result = mysqli_query($con,$sql4);
			$tempC = mysqli_fetch_array($result,MYSQLI_NUM);

			//echo $tempC[0];

			$sql5 = "UPDATE Title SET Mark = '0' WHERE Pno = '$tempC[0]'";
			mysqli_query($con,$sql5);
				# code...
				//echo 6666666666666;
		
			$sql1 = "UPDATE SelectionInformation SET Tno = '$temp[0]' WHERE Sno = '".$Sno."'";
			// if (mysqli_query($con,$sql1)) {
			// 		# code...
			// 	echo 55555555555;
			// }
			$sql2 = "UPDATE SelectionInformation SET Pno = '$Pno' WHERE Sno = '".$Sno."'";
			// if (mysqli_query($con,$sql2)) {
			// 		# code...
			// 	echo 55555555555;
			// }
			$sql3 = "UPDATE Title SET Mark = '$tempA[0]' WHERE Pno = '".$Pno."'";
			// if (mysqli_query($con,$sql3)) {
			// 		# code...
			// 	echo 55555555555;
			// }



			if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2) && mysqli_query($con,$sql3)) {
				echo 1;
				} 
			}
		} else {
			echo 0;
	}
	mysqli_close($con);

?>