<html>
<head>
    <title>Add Data</title>
</head>
 
<body style='background-color: #F5F3EA'>

<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $ProductCode = $_POST['ProductCode'];
    $Brand = $_POST['Brand'];
	$Type = $_POST['Type'];
    $Shade = $_POST['Shade'];
	$Size = $_POST['Size'];
    $SalesPrice = $_POST['SalesPrice'];
        
    // checking empty fields
    if(empty($ProductCode) || empty($Brand) || empty($Type) || empty($Shade) || empty($Size) || empty($SalesPrice)) {                
        if(empty($ProductCode)) {
            echo "<font color='red'>Product Code field is empty.</font><br/>";
        }
        
        if(empty($Brand)) {
            echo "<font color='red'>Brand field is empty.</font><br/>";
        }
        if(empty($Type)) {
            echo "<font color='red'>Type field is empty.</font><br/>";
        }
        if(empty($Shade)) {
            echo "<font color='red'>Shade field is empty.</font><br/>";
        }
		if(empty($Size)) {
            echo "<font color='red'>Size field is empty.</font><br/>";
        }
        if(empty($SalesPrice)) {
            echo "<font color='red'>SalesPrice field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Previous Page</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Product_13217(ProductCode, Brand, Type, Shade, Size, SalesPrice) VALUES('$ProductCode', '$Brand', '$Type', '$Shade', '$Size', '$SalesPrice')");
         header('location: IndexProduct.php');
        //display success message
        echo "<font color='green'>Product added successfully!";
        
    }
}
?>
</body>
</html>

<html>
<head>
    <title>Add Product</title>
</head>
 
<body style='background-color: Beige'>
    <a href="IndexProduct.php">Home</a>
    <br/><br/>
 
    <form action="AddProduct.php" method="post" name="form1">
        <table width="25%" border="0">
			<tr> 
				<td>Product Code</td>
                <td><input type="text" name="ProductCode"></td>
            </tr>
            <tr> 
				<td>Brand</td>
                <td><input type="text" name="Brand" ></td>
            </tr>
            <tr> 
                <td>Type</td>
                <td><input type="text" name="Type" ></td>
            </tr>
			<tr> 
                <td>Shade</td>
                <td><input type="text" name="Shade" ></td>
            </tr>
				<td>Size</td>
                <td><input type="text" name="Size" ></td>
            </tr>
			<tr> 
                <td>Sales Price</td>
                <td><input type="number_format" name="SalesPrice" ></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add Product"></td>
            </tr>
        </table>
    </form>
</body>
</html>