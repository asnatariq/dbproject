<html>
<head>
    <title>Add Data</title>
</head>
 
<body style='background-color: #F5F3EA'>

<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $SalespersonID = $_POST['SalespersonID'];
    $Name = $_POST['Name'];
	$ContactNumber = $_POST['ContactNumber'];
    $ListOfCustomers = $_POST['ListOfCustomers'];
        
    // checking empty fields
    if(empty($SalespersonID) || empty($Name) || empty($ContactNumber) || empty($ListOfCustomers)) {                
        if(empty($SalespersonID)) {
            echo "<font color='red'>SalespersonID field is empty.</font><br/>";
        }
        if(empty($Name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($ContactNumber)) {
            echo "<font color='red'>ContactNumber field is empty.</font><br/>";
        }
        if(empty($ListOfCustomers)) {
            echo "<font color='red'>ListOfCustomers field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Previous Page</a>";
    } 
	else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Salesperson_13217(SalespersonID, Name, ContactNumber, ListOfCustomers) 
		VALUES('$SalespersonID', '$Name', '$ContactNumber', '$ListOfCustomers')");
        header('location: IndexSalesperson.php');
        //display success message
        echo "<font color='green'>Salesperson added successfully!";
        echo "<br/><a href='IndexSalesperson.php'>View Result</a>";
    }
}
?>
</body>
</html>

<html>
<head>
    <title>Add a new Sales Person</title>
</head>
 
<body style='background-color: #F5F3EA'>
    <a href="IndexSalesperson.php">Home</a>
    <br/><br/>
 
    <form action="AddSalesperson.php" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>Sales Person ID</td>
                <td><input type="text" name="SalespersonID"></td>
            </tr>
            <tr> 
				<td>Name</td>
                <td><input type="text" name="Name" ></td>
            </tr>
            <tr> 
                <td>Contact Number</td>
                <td><input type="text" name="ContactNumber" ></td>
            </tr>
			<tr> 
                <td>List of Customers</td>
                <td><input type="text" name="ListOfCustomers" ></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add Sales Person"></td>
            </tr>
        </table>
    </form>
</body>
</html>