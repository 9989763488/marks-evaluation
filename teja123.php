<html>
<head>
<title>world</title>
<style>
input[type=submit]
	{
		width:100;
		height:40;
	}	
	input[type=button]
	{
		width:100;
		height:40;
	}	
</style></head>
<body>
<script>
function result(){
			var myNodelist = document.querySelectorAll("tr");
			for(var i=1;i<=myNodelist.length;i++){
				var sum=0;
				var myNode = myNodelist[i].querySelectorAll("td");
				for(j=3;j<myNode.length-1;j++){
					var my=myNode[j].querySelectorAll("input");
					sum=sum+parseInt(my[0].value);
				}
				var my1=myNode[j].querySelectorAll("input");
				my1[0].value=Math.round(sum/4);
				}
		}
</script>
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
	$n=count($_POST['total1']);
	while($i<$n){
		$total1=$_POST['total1'][$i];
		$sno=$_POST['SNO'][$i];
		$v=$_POST['hi'];
		$a=$_POST['haii'];
		$p=$_POST['w1'];
		if ($p=="1"){
		$sql="update ".$a." set WEEK1='$total1',date1='$v' where SNO='$sno' LIMIT 1";
		$result=$conn->query($sql);
		}
		if ($p=="2"){
		$sql="update ".$a." set WEEK2='$total1',date2='$v' where SNO='$sno' LIMIT 1";
		$result=$conn->query($sql);
		}
		if ($p=="3"){
		$sql="update ".$a." set WEEK3='$total1',date3='$v' where SNO='$sno' LIMIT 1";
		$result=$conn->query($sql);
		}
		if ($p=="4"){
		$sql="update ".$a." set WEEK4='$total1',date4='$v' where SNO='$sno' LIMIT 1";
		$result=$conn->query($sql);
		}
		++$i;
	}
	if($result){
	echo "<script> alert('updated successfully')</script>";
	}
	
	
	
	
	$sql="select * from ".$a."";
	$result=$conn->query($sql);
	$j=0;
	echo "<form method='post' action='swini.php'>";
	echo "<input type='hidden' name='teja' value=".$a.">";
	echo "<h1></h1>";
	echo "<table border='2' width='100%' align='center' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>REGNO</th>";
	echo "<th>NAME</th>";
	echo "<th>WEEK1</th>";
	echo "<th>WEEK2</th>";
	echo "<th>WEEK3</th>";
	echo "<th>WEEK4</th>";
	echo "<th>AVERAGE</th></tr>";
	if($result->num_rows> 0){
		while($row=$result->fetch_assoc()){
			echo "<tr><td>{$row['SNO']}<input type='hidden' name='SNO[$j]' value='{$row['SNO']}'></td>";
			echo "<td>".$row['REGNO']."</td><td>".$row['NAME']."</td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value=".$row['WEEK1']." readonly></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value=".$row['WEEK2']." readonly></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value=".$row['WEEK3']." readonly></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value=".$row['WEEK4']." readonly></td>";
			echo "<td><input type='number' name='average[$j]' onkeypress='result()'></td></tr>";	
			++$j;
 		}
	}
	echo "</table>";
	echo "<br>";
	echo "<table align='center'>";
	echo "<tr><td>";
	echo "<input type='submit' style='position:absolute;left:700px;' value='submit'>";
echo "</form>";
echo "</td>";
echo "<td>";
echo "<input type='button' style='position:absolute;left:500px;' onClick='result()' value='sum'>";
echo "</td></tr></table>";
?>
</body>
</html>