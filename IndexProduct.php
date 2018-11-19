<!DOCTYPE html>
<html>
<head>

    <title>Product</title>
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

<li><a  href="IndexCustomer.php">Customer</a></li>

<li><a href="IndexSalesperson.php">Sales Person</a></li>

<li><a href="IndexUser.php">User</a></li>

<li><a href="Home.php">Home</a></li>

</ul>

</body>
</html>
<?php
//including the database connection file
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM Product_13217 ORDER BY ProductCode"); // mysqli query

echo "<head> 
<title>Homepage</title>

</head>";
echo "<body style='background-color: #F5F3EA'>";

echo "<h1><center> Product Table </center></h1>";    
 
    echo "<table width='80%' border=1 align='center'>";
		echo "<tr style='background-color:#6C5634'>";
        echo "<td><b>Product Code</b></td>";
        echo "<td><b>Brand</b></td>";
		echo "<td><b>Type</b></td>";
        echo "<td><b>Shade</b></td>";
		echo "<td><b>Size</b></td>";
        echo "<td><b>SalesPrice</b></td>";
        echo "<td><b>Action</b></td>";
        echo "</tr>";
 
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$row['ProductCode']."</td>";
            echo "<td>".$row['Brand']."</td>";
   			echo "<td>".$row['Type']."</td>";
            echo "<td>".$row['Shade']."</td>";	
			echo "<td>".$row['Size']."</td>";
            echo "<td>".$row['SalesPrice']."</td>";	
            echo "<td><a href=\"EditProduct.php?ProductCode=$row[ProductCode]\"> Edit</a> | <a href=\"DeleteProduct.php?ProductCode=$row[ProductCode]\" 
			onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }

    echo "</table><br/>";
	echo "<center> <a href='AddProduct.php'>Add a new Product</a> </center>";
echo "</body>";
?>