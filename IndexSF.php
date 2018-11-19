<!DOCTYPE html>
<html>
<head>

    <title>Sales Order</title>
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
 <title>Sales Order</title>  
           <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<ul >
	
	
<li><a class="active" href="Logout.php">Logout</a></li>

<li><a href="IndexCustomer.php">Customer</a></li>

<li><a href="IndexSalesperson.php">Sales Person</a></li>

<li><a href="IndexProduct.php">Product</a></li>

<li><a href="Home.php">Home</a></li>

</ul>
    <div class = "container">  
	<div class = "table-responsive">
	<div class = "page-header">  
	<h1 align = "center">Sales Order Table</h1><br />
	</div>
	<?php
	$host = "localhost";
	$db_name = "asna";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	$stmt = $conn->prepare("select CustomerID from customer_13217");
	$stmt->execute();
	echo "<h3 align='left'>Select Customer ID:</h3>";
	echo "<select id='CustomerID' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
		echo '<option value="'.$row["CustomerID"].'">'.$row["CustomerID"].'</option>';                
		}
    	echo "</select>";
	?>
	<br />
                     <div id="live_data"></div>            
                </div>  
           </div>  
      </body>  
</html>  
<script>  
 $(document).ready(function(){  
	var CustomerID = $('#CustomerID').val();
      $("#CustomerID").change(function(){
       CustomerID = $('#CustomerID').val();
	fetch_data();
      });
      function fetch_data()  
      {  
           $.ajax({  
                url:"FetchSales.php",  
                method:"POST",  
		data:{CustomerID:CustomerID},  
                dataType:"text",
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
			var OrderNo = $('#OrderNo').text();  
			var CustomerID = CustomerID;
			var Date = $('#Date').text();
			var SalespersonID = $('#SalespersonID').val();
			var ProductCode = $('#ProductCode').val();
			var Quantity1 = $('#Quantity').text(); 
			var Ratee = $('#Rate').text();
			var Quantity = parseInt(Quantity1);
			var Rate = parseInt(Ratee);
			var Amount = Quantity*Rate;
			if(OrderNo == '')  
			{  
                alert("Enter Order Number");  
                return false;  
			}    
			if(Date == '')  
			{  
                alert("Enter Date");  
                return false;  
			}   
			if(Quantity == '')  
			{  
                alert("Enter Quantity");  
                return false;  
			}  
			$.ajax({  
                url:"InsertSF.php",  
                method:"POST",  
                data:{OrderNo:OrderNo, CustomerID:CustomerID, Date:Date, SalespersonID:SalespersonID, ProductCode:ProductCode, Quantity:Quantity, Rate:Rate, Amount:Amount},  
                dataType:"text",  
                success:function(data)  
                {  
                    fetch_data();  
                }  
			})  
		});  
		function edit_data(id, text, column_name)  
		{  
			$.ajax({  
                url:"EditSF.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data)
				{  
                    fetch_data();
                }  
			});  
		}  
		$(document).on('blur', '.OrderNo', function(){  
			var id = $(this).data("id1");  
			var OrderNo = $(this).text();  
			edit_data(id, OrderNo, "OrderNo");  
		});   
		$(document).on('blur', '.Date', function(){  
			var id = $(this).data("id3");  
			var Date = $(this).text();  
			edit_data(id, Date, "Date");  
		});  
		$(document).on('blur', '.SalespersonID', function(){  
			var id = $(this).data("id4");  
			var SalespersonID = $(this).val();  
			edit_data(id, SalespersonID, "SalespersonID");  
		});
		$(document).on('blur', '.ProductCode', function(){  
			var id = $(this).data("id5");  
			var ProductCode = $(this).val();  
			edit_data(id, ProductCode, "ProductCode");  
		});  
		$(document).on('blur', '.Quantity', function(){  
			var id = $(this).data("id6");  
			var Quantity = $(this).text();  
			edit_data(id, Quantity, "Quantity");  
		});
		$(document).on('blur', '.Rate', function(){  
			var id = $(this).data("id7");  
			var Rate = $(this).text();  
			edit_data(id, Rate, "Rate");  
		});   
		$(document).on('click', '.btn_delete', function(){  
			var id=$(this).data("id9");  
			if(confirm("Are you sure you want to delete this?"))  
			{  
                $.ajax({  
                    url:"DeleteSF.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data)
					{  
						fetch_data();  
                    }  
                });  
			}  
		});  
});  
</script>
