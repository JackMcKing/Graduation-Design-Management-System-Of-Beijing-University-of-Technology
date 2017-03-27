 <?php 

 	$servername = "127.0.0.1";
	$username = "root";
	$password = "Andrew123";
	$dbname = "GraduateManager";

   	$Pno = $_POST["Pno"];
   	$Tno = $_POST["Tno"];
   	$Ptitle = $_POST["Ptitle"];
   	$Pdescribe = $_POST["Pdescribe"];
	
	$con = mysqli_connect($servername,$username,$password,$dbname);
	if(!$con){
		die('Connect Error:'.mysqli_connect_error());
	}





	// $sql = "SELECT Pstatus FROM Teacher WHERE Tno = '".$Tno."'";
	// $result = mysqli_query($con,$sql);
	// $temp[] = mysqli_fetch_array($result,MYSQLI_NUM);
	// if($temp[0]==0){
	// 	echo  4;
	// 	exit();
	// }



	
	$sql = "SELECT Pno FROM Title WHERE Tno = '".$Tno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_all($result,MYSQLI_NUM);
	//echo ($temp[0]);
	foreach ($temp as  $value) {
		# code...
		foreach ($value as  $A) {
			# code...
			if ($A == $Pno) {
				# code...
				echo 5;
				exit();
			}
		}
	}








	

	//echo $hehe[0];

	$sql = "SELECT Pno FROM Title WHERE Tno = '".$Tno."'";
	$result = mysqli_query($con,$sql);
	$temp = mysqli_fetch_all($result,MYSQLI_NUM);
	if (count($temp) > 5) {
		echo 2;
		exit();
	} else {
	// $sql = "INSERT INTO Title (Pno, Tno, Ptitle,Pdescribe)VALUES ('John', 'Doe', 'john@example.com','qwerf')";
		$sql = "SELECT Tname FROM Teacher WHERE Tno = '".$Tno."'";
		$result = mysqli_query($con,$sql);
		$hehe = mysqli_fetch_array($result,MYSQLI_NUM); 

		$sql = "INSERT INTO Title(Pno,Tno,Ptitle,Pdescribe,Mark,Tname) VALUES($Pno,$Tno,'$Ptitle','$Pdescribe','0','$hehe[0]')";
		if (mysqli_query($con,$sql)) {
			echo 1;
		} else {
			echo 0;
		}
	}
	mysqli_close($con)
 ?>