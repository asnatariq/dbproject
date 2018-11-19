<?php
// add connection to Oracle
echo "<body style = 'background-color:#F5F3EA'>";
echo "<head><title>Assignment#01</title></head>";
$conn = new mysqli("localhost", "root", "");
mysqli_select_db($conn, "asna");
if($conn->connect_error){
   die('Unable to connect to database  . $conn->connect_error . ');
   
}
	$sql = "SELECT * FROM Product_13217";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<h1 align='left'><u>Products Table</u></h1>";
		
		//Output data of each row
		echo  "<table border='2'> 
		<tr style='background-color:#6C5634'>
		<th>ProductCode</th>
		<th>Brand</th>
		<th>Type</th>
		<th>Shade</th>
		<th>Size</th>
		<th>SalesPrice</th>
		</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>". $row['ProductCode'] . "</td>";
			echo "<td>". $row['Brand'] . "</td>";
			echo "<td>" . $row['Type'] . "</td>";
			echo "<td>" . $row['Shade'] . "</td>"; 
			echo "<td>" . $row['Size'] . "</td>";
			echo "<td>" . $row['SalesPrice'] . "</td>"; 			
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