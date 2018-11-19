<?php
// Create connection to Oracle
echo "<body style = 'background-color:#F5F3EA'>";
echo "<head><title>Assignment#01</title></head>";
$conn = new mysqli("localhost", "root", "");
mysqli_select_db($conn, "asna");
if($conn->connect_error){
   die('Unable to connect to database  . $conn->connect_error . ');
   
}
	$sql = "SELECT * FROM user_13217";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<h1 align='center'><u>User Table</u></h1>";
		
		//Output data of each row
		echo  "<table border='2' align='center'> 
		<tr style='background-color:#6C5634'>
		<th>UserID</th>
		<th>UserName</th>
		<th>Password</th>
		<th>Active</th>
		<th>SalespersonID</th>
		</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>". $row['UserID'] . "</td>";
			echo "<td>". $row['UserName'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo "<td>" . $row['Active'] . "</td>"; 
			echo "<td>" . $row['SalespersonID'] . "</td>";			
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 results";
	}
// Close the Oracle connection
$conn->close();
?>	