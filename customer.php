<?php
// add connection to Oracle
echo "<body style = 'background-color:#F5F3EA'>";
echo "<head><title>Assignment#01</title></head>";
$conn = new mysqli("localhost", "root", "");
mysqli_select_db($conn, "asna");
if($conn->connect_error) {
   die('Unable to connect to database  . $conn->connect_error . ');
   
}
$sql = "SELECT * FROM CUSTOMER_13217";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<h1 align='left'><u>Customer Table</u></h1>";
		
	//Output data of each row
	echo  "<table border='2'> 
	<tr style='background-color:#6C5634;'>
	<th>CustomerID</th>
	<th>ShopName</th>
	<th>CustomerName</th>
	<th>ContactNumber</th>
	<th>Address</th>
	<th>Area</th>
	<th>GeographicalCoordinates</th> 
	</tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $row['CustomerID'] . "</td>";
		echo "<td>". $row['ShopName'] . "</td>";
		echo "<td>" . $row['CustomerName'] . "</td>";
		echo "<td>" . $row['ContactNumber'] . "</td>";
		echo "<td>" . $row['Address'] . "</td>";
		echo "<td>" . $row['Area'] . "</td>";
		echo "<td>" . $row['GeographicalCoordinates'] . "</td>";                  
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