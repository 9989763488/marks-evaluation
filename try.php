<html>
<head>
	<title>hello world</title>
	<style>
		table,th,tr{
			align:center;
			border-collapse:collapse;
		}
	input[type=button]
	{
		width:100;
		height:40;
	}		
	input[type=submit]
	{
		width:100;
		height:40;
	}		
	</style>
<head>
<body style="background-color:lightblue;">
<center><h1 >Name Of The Laboratory:<?php echo $_POST["sel"]; ?></h1>
</center>
<h3>DATE:<?php echo $_POST["date"];?></h3>
<?php $r=$_POST["date"];
$w=$_POST["week"];
$t= $_POST["sel"];
?>
<h3>SECTION:<?php echo $_POST["sec"];?></h3>
<h3>WEEK:<?php echo $_POST["week"];?></h3>
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="test";
	$i=0;
	$z=array();
	$conn= new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql="select * from ".$t."";
	$result=$conn->query($sql);
	echo "<form method='post' action='teja123.php'>";
	echo "<input type='hidden' name='hi' value=".$r.">";
	echo "<input type='hidden' name='haii' value=".$t.">";
	echo "<input type='hidden' name='w1' value=".$w.">";
	echo "<table border='3' width='80%' align='center' >";
	echo "<tr>
			<th rowspan='2'>SNO</th>
			<th rowspan='2'>REGNO</th>
			<th rowspan='2'>NAME OF THE STUDENT</th>
			<th colspan='5'>MARKS</th>
		</tr>
		<tr>
			<th>1<br>(ATT)</th>
			<th>2<br>(OB)</th>
			<th>3<br>(PE)</th>
			<th>4<br>(RC&VI)</th>
			<th>Total</th>
		</tr>";
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo "<tr><td>{$row['SNO']}<input type='hidden' name='SNO[$i]' value='{$row['SNO']}'></td>";
			echo "<td>".$row['REGNO']."</td><td>".$row['NAME']."</td>";
				if($row["ATTENDANCE"]=='A'){
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' readonly onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' readonly onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' readonly onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' readonly onchange='result()'></td>";
			echo "<td><input type='text' name='total1[$i]' readonly></td></tr>";
			++$i;
			}
			else{
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' onchange='result()'></td>";
			echo "<td><input type='number' pattern='[0-9]{1}' max='5' value='0' onchange='result()'></td>";
			echo "<td><input type='text' name='total1[$i]'></td></tr>";
			++$i;
			}
		}
	}
	echo "</table>";
	echo "<br>";
	echo "<br>";
	echo "<input type='submit' style='position:absolute;left:700px;' value='submit'>";
	echo "</form>";
?>
	<script>
		function result(){
			var myNodelist = document.querySelectorAll("tr");
			for(var i=2;i<=myNodelist.length;i++){
				var sum=0;
				var myNode = myNodelist[i].querySelectorAll("td");
				for(j=3;j<myNode.length-1;j++){
					var my=myNode[j].querySelectorAll("input");
					sum=sum+parseInt(my[0].value);
				}
				var my1=myNode[j].querySelectorAll("input");
				my1[0].value=sum;
			}
		}
	</script>
	<br>
	<br>
	<br>
	<br>
	<table border="0" width="100%" >
	 <tr>
		<th>1.ATTENDANCE(3 MARKS)</th>
		<th>2.OBSERVATION(2 MARKS)</th>
		<th>3.PROGRAM EXECUTION(5 MARKS)</th>
		<th>4.VIVA& RECORDS(5 MARKS)</th>
	</tr>
	</table>
	<br>
	</body>
</html>		