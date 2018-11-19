<html>
<head>
    <title>Add Data</title>
</head>
 
<body style='background-color: #F5F3EA'>

<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $CustomerID = $_POST['CustomerID'];
    $ShopName = $_POST['ShopName'];
    $CustomerName = $_POST['CustomerName'];
	$ContactNumber = $_POST['ContactNumber'];
    $Address = $_POST['Address'];
    $Area = $_POST['Area'];
    $GeographicalCoordinates = $_POST['GeographicalCoordinates'];
        
    // checking empty fields
    if(empty($CustomerID) || empty($ShopName) || empty($CustomerName)|| empty($ContactNumber) || empty($Address)|| empty($Area) || empty($GeographicalCoordinates)) {                
        if(empty($CustomerID)) {
            echo "<font color='red'>CustomerID field is empty.</font><br/>";
        }
        if(empty($ShopName)) {
            echo "<font color='red'>ShopName field is empty.</font><br/>";
        }
        if(empty($CustomerName)) {
            echo "<font color='red'>CustomerName field is empty.</font><br/>";
        }
        if(empty($ContactNumber)) {
            echo "<font color='red'>ContactNumber field is empty.</font><br/>";
        }
        if(empty($Address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }
        if(empty($Area)) {
            echo "<font color='red'>Area field is empty.</font><br/>";
        }
		if(empty($GeographicalCoordinates)) {
            echo "<font color='red'>GeographicalCoordinates field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Previous Page</a>";
    } 
	else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO customer_13217(CustomerID, ShopName, CustomerName, ContactNumber, Address, Area, GeographicalCoordinates) VALUES('$CustomerID', '$ShopName', '$CustomerName', '$ContactNumber', '$Address', '$Area', '$GeographicalCoordinates')");
        header('location: IndexCustomer.php');
        //display success message
        echo "<font color='green'>Customer added successfully!";
        echo "<br/><a href='IndexCustomer.php'>View Result</a>";
    }
}

?>

</body>
</html>

<html>
<head>
    <title>Add a Customer</title>
</head>
 
<body style='background-color: #56c596'>
    <a href="IndexCustomer.php">Home</a>
    <br/><br/>
 
    <form action="AddCustomer.php" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>Customer ID</td>
                <td><input type="text" name="CustomerID" ></td>
            </tr>
            <tr> 
				<td>Shop Name</td>
                <td><input type="text" name="ShopName" ></td>
            </tr>
            <tr> 
                <td>Customer Name</td>
                <td><input type="text" name="CustomerName" ></td>
            </tr>
            <tr> 
                <td>Contact Number</td>
                <td><input type="text" name="ContactNumber" ></td>
            </tr>
			<tr> 
                <td>Address</td>
                <td><input type="text" name="Address" ></td>
            </tr>
			<tr> 
                <td>Area</td>
                <td><input type="text" name="Area" ></td>
            </tr>
			<tr> 
                <td>Geographical Coordinates</td>
                <td><input type="text" name="GeographicalCoordinates" ></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add Customer"></td>
            </tr>
        </table>
    </form>
</body>
</html>