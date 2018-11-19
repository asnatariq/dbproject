<!DOCTYPE html>
<html>
<head>

    <title>User</title>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #6C5634;
	}

	li {
		float: right;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

/* Change the link color to #111 (black) on hover */
	li a:hover {
		background-color: #856B48;
	}
	</style>
</head>
<body style='background-color: #F5F3EA' align='center'>

<ul >
	
	
<li><a class="active" href="Logout.php">Logout</a></li>

<li><a href="IndexSF.php">Sales Order</a></li>

<li><a href="IndexCustomer.php">Customer</a></li>

<li><a href="IndexSalesperson.php">Sales Person</a></li>

<li><a href="IndexProduct.php">Product</a></li>

<li><a href="Home.php">Home</a></li>

</ul>

</body>
</html>
<?php
//including the database connection file
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM user_13217 WHERE UserID<>'asna'"); // mysqli query
$result1 = mysqli_query($mysqli, "SELECT * FROM user_13217 WHERE UserID='asna'");
echo "<head> 
<title>Homepage</title>

</head>";
echo "<body style='background-color: #F5F3EA'>";

echo "<h1><center> User Table </center></h1>";    
 
    echo "<table width='80%' border=1 align='center'>";
		echo "<tr style='background-color:#6C5634'>";
        echo "<td><b>User ID</b></td>";
        echo "<td><b>User Name</b></td>";
		echo "<td><b>Password</b></td>";
        echo "<td><b>Active</b></td>";
		echo "<td><b>Sales Person ID</b></td>";
		echo "<td><b>Action</b></td>";
        echo "</tr>";
	$row1 = mysqli_fetch_array($result1);
		echo "<tr>";
        echo "<td>".$row1['UserID']."</td>";
        echo "<td>".$row1['UserName']."</td>";
   		echo "<td>".$row1['Password']."</td>";
        echo "<td>".$row1['Active']."</td>";	
		echo "<td>".$row1['SalespersonID']."</td>";
			
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$row['UserID']."</td>";
            echo "<td>".$row['UserName']."</td>";
   			echo "<td>".$row['Password']."</td>";
            echo "<td>".$row['Active']."</td>";	
			echo "<td>".$row['SalespersonID']."</td>";
      	
            echo "<td><a href=\"EditUser.php?UserID=$row[UserID]\"> Edit</a> | <a href=\"DeleteUser.php?UserID=$row[UserID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }

    echo "</table><br/>";
	echo "<center> <a href='AddUser.php'>Add a new User</a> </center>";
echo "</body>";
?>