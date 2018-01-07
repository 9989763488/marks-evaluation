<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="test";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$i=0;
	$n=count($_POST['average']);
	$sai=$_POST['teja'];
	while($i<$n){
		$sum=$_POST['average'][$i];
		$no=$_POST['SNO'][$i];
		$sql="update ".$sai." set AVERAGE='$sum' where SNO='$no' LIMIT 1";
		$result=$conn->query($sql);
		++$i;
		}
		
		
	$sql="select * from ".$sai."";
	$result=$conn->query($sql);
	echo "<h1></h1>";
	echo "<table border='2' width='100%' align='center' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>REGNO</th>";
	echo "<th>NAME</th>";
	echo "<th>WEEK1</th>";
	echo "<th>date1</th>";
	echo "<th>WEEK2</th>";
	echo "<th>date2</th>";
	echo "<th>WEEK3</th>";
	echo "<th>date3</th>";
	echo "<th>WEEK4</th>";
	echo "<th>date4</th>";
	echo "<th>STATUS</th>";
	echo "<th>AVERAGE</th></tr>";
	if($result->num_rows> 0){
		while($row=$result->fetch_assoc()){
			echo "<tr><td>".$row['SNO']."</td><td>".$row['REGNO']."</td><td>".$row['NAME']."</td><td>".$row['WEEK1']."</td><td>".$row['date1']."</td><td>".$row['WEEK2']."</td><td>".$row['date2']."</td><td>".$row['WEEK3']."</td><td>".$row['date3']."</td><td>".$row['WEEK4']."</td><td>".$row['date4']."</td><td>".$row['ATTENDANCE']."</td><td>".$row['AVERAGE']."</td></tr>";
			}
		}
?>