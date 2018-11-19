<!DOCTYPE html>
<html>
<head>

    <title>Home Page</title>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #6C5634;
		text-align: center;
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

/* Change the link color on hover */
	li a:hover {
		background-color: #856B48;
	}
	h1 {
		font-size: 20px;
		text-align:'left';
	}
	
	</style>
</head>

<body style='background-color: #F5F3EA'>

<ul >
	
<li><a class="active" href="Logout.php">Logout</a></li>

<li><a href="IndexSF.php">Sales Order</a></li>

<li><a href="IndexCustomer.php">Customer</a></li>

<li><a href="IndexSalesperson.php">Sales Person</a></li>

<li><a href="IndexProduct.php">Product</a></li>

<li><a href="IndexUser.php">User</a></li>

</ul>

<h1> Login Successful! Welcome </h1> 

</body>



</html>