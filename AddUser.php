<html>
<head>
    <title>Add Data</title>
</head>
 
<body style='background-color: #F5F3EA'>

<?php
//including the database connection file
include_once("Config.php");
 
if(isset($_POST['Submit'])) {    
    $UserID = $_POST['UserID'];
    $UserName = $_POST['UserName'];
	$Password = $_POST['Password'];
    $Active = $_POST['Active'];
	$SalespersonID = $_POST['SalespersonID'];
       
	
    // checking empty fields
    if(empty($UserID) || empty($UserName) || empty($Password)) {                
        if(empty($UserID)) {
            echo "<font color='red'>User ID field is empty.</font><br/>";
        }
        if(empty($UserName)) {
            echo "<font color='red'>User Name field is empty.</font><br/>";
        }
        if(empty($Password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Previous Page</a>";
    } 
	else { 
        // if all the fields are filled (not empty)             
        //insert data to database
		if(empty($SalespersonID)) {
			$q = "INSERT INTO User_13217(UserID, UserName, Password, Active, SalespersonID) VALUES('$UserID', '$UserName', '$Password', 'No', NULL)";
		}
		else {
			$q = "INSERT INTO User_13217(UserID, UserName, Password, Active, SalespersonID) VALUES('$UserID', '$UserName', '$Password', 'No', '$SalespersonID')";
		}
       
		mysqli_query($mysqli, $q);
		$_SESSION['UserID'] = $UserID;
		$_SESSION['success'] = "You are now logged in!";
        header('location: IndexUser.php');
        //display success message
        echo "<font color='green'>User added successfully!";
    }
}
?>
</body>
</html>

<html>
<head>
    <title>Add User</title>
</head>
 
<body style='background-color: #F5F3EA'>
    <a href="Home.php">Home</a>
    <br/><br/>
 
    <form action="AddUser.php" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>User ID</td>
                <td><input type=text name="UserID"></td>
            </tr>
            <tr> 
				<td>User Name</td>
                <td><input type=text name="UserName" ></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type=password name="Password" ></td>
            </tr>
				<td>SalespersonID</td>
                <td><input type=text name="SalespersonID" ></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add User"></td>
            </tr>
        </table>
    </form>
</body>
</html>