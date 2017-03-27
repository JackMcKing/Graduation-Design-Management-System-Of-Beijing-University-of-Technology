<?php

	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager"; 

	$GLOBALS[0] = $result = $_POST["Score"];
   	$GLOBALS[1] =$Tno = $_POST["Tno"];
   	$GLOBALS[2] =$Sno = $_POST["Sno"];

	 $con = mysqli_connect($servername,$username,$password,$dbname);
	if (!$con) {
		die('Could not connect:'.mysqli_error());
	}

	




	function Presults($con) {
		//$con = mysqli_connect($servername,$username,$password,$dbname);
		$sql = "UPDATE Score SET Presults = $GLOBALS[0] WHERE Sno = $GLOBALS[2]";
		 if(mysqli_query($con,$sql)){
		echo 1;
	}
		
	}
 	
 	function TAresults($con) {
 		$sql = "UPDATE Score SET TAresults = $GLOBALS[0] WHERE Sno = $GLOBALS[2]";
		if (mysqli_query($con,$sql)) {
			echo 2;
		}
 	}

 	function TBresults($con) {
 		$sql = "UPDATE Score SET TBresults = $GLOBALS[0] WHERE Sno = $GLOBALS[2]";
		if (mysqli_query($con,$sql)) {
			echo 2;
		}
 	}

 	function SumTresults($con) {
 		$sql = "SELECT TAresults From Score WHERE Sno = $GLOBALS[2]";
 		$result = mysqli_query($con,$sql);
 		$temp = mysqli_fetch_array($result,MYSQLI_NUM);
 		$Tresult = $temp[0] + $GLOBALS[0];

 		$sql = "UPDATE Score SET Tresults = '$Tresults' WHERE Sno = $GLOBALS[2]";
 		mysqli_query($con,$sql);
 			# code...
 		//	echo 3;

 	}

 	function SumResult($con) {
 		$Score1 = mysqli_query($con,"SELECT Presults FROM Score WHERE Sno = $GLOBALS[2]");
 		$tempA = mysqli_fetch_array($Score1,MYSQLI_NUM);
		$Score2 = mysqli_query($con,"SELECT Tresults FROM Score WHERE Sno = $GLOBALS[2]");
		$tempB = mysqli_fetch_array($Score2,MYSQLI_NUM);
		$Score3 = mysqli_query($con,"SELECT Rresults FROM Score WHERE Sno = $GLOBALS[2]");
		$tempC = mysqli_fetch_array($Score3,MYSQLI_NUM);

		if ($Score1 != null && $Score2 != null && $Score3 != null) {
			$TotalScore = $tempA[0]*0.2 + $tempB[0]*0.2 + $tempC[0]*0.6 ;
			$sql = "UPDATE Score SET Score = $TotalScore WHERE Sno = $GLOBALS[2]";
			mysqli_query($con,$sql);
		//	echo 4;
		}
 	}
 	





 	$sql = "SELECT Tno From SelectionInformation WHERE Sno = '".$Sno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_array($result,MYSQLI_NUM);

	
	//echo $Tno;
	//echo $temp[0];

	if ($temp[0] == $Tno) {
		//echo 233;
		// $sql = "UPDATE Score SET Presults = '$Score' WHERE Sno = '".$Sno."'";
		// if (mysqli_query($con,$sql)) {
		// 	echo 1;
		// }
		Presults($con);
		SumResult($con);
	} else {

		$sql = "SELECT TAresults From Score WHERE Sno = '".$Sno."'";
		$result = mysqli_query($con,$sql);
		$temp = mysqli_fetch_array($result,MYSQLI_NUM);

		if ($temp[0] == null) {
			TAresults($con);
			SumResult($con);
		} else {
			TBresults($con);
			SumTresults($con);
			SumResult($con);
		}
	}

	mysqli_close($con);
?>