<!DOCTYPE html>
<html>
<head>

    <title>Sales Person</title>
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

<li><a href="IndexProduct.php">Product</a></li>

<li><a href="IndexUser.php">User</a></li>

<li><a href="Home.php">Home</a></li>

</ul>

</body>
</html>
<?php
//including the database connection file
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Salesperson_13217 ORDER BY SalespersonID"); // mysqli query

echo "<head> 
<title>Homepage</title>

</head>";
echo "<body style='background-color: #F5F3EA'>";

echo "<h1><center> Sales Person Table </center></h1>";    
 
    echo "<table width='80%' border=1 align='center'>";
		echo "<tr style='background-color:#6C5634'>";
        echo "<td><b>Sales Person ID</b></td>";
        echo "<td><b>Name</b></td>";
		echo "<td><b>Contact Number</b></td>";
        echo "<td><b>List of Customers</b></td>";
        echo "<td><b>Action</b></td>";
        echo "</tr>";
 
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$row['SalespersonID']."</td>";
            echo "<td>".$row['Name']."</td>";
   			echo "<td>".$row['ContactNumber']."</td>";
            echo "<td>".$row['ListOfCustomers']."</td>";				
            echo "<td><a href=\"EditSalesperson.php?SalespersonID=$row[SalespersonID]\"> Edit</a> | <a href=\"DeleteSalesperson.php?SalespersonID=$row[SalespersonID]\" 
			onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }

    echo "</table><br/>";
	echo "<center> <a href='AddSalesperson.php'>Add a new Salesperson</a> </center>";
echo "</body>";
?>