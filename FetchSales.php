<?php  
 $conn = mysqli_connect("localhost", "root", "", "asna");  
 $output = ''; 
 $CustomerID = isset($_POST["CustomerID"])?$_POST["CustomerID"]:""; 
 $sql = "SELECT * FROM salesorder_13217 WHERE CustomerID = '$CustomerID' ORDER BY OrderNo";  
 $sql1 = "SELECT * FROM customer_13217 WHERE CustomerID = '$CustomerID'";
 $sql2 = "SELECT SalespersonID FROM salesperson_13217";
 $sql3 = "SELECT ProductCode FROM product_13217";
 $result = mysqli_query($conn, $sql);  
 $result1 = mysqli_query($conn, $sql1);
 $result2 = mysqli_query($conn, $sql2);
 $row = mysqli_fetch_array($result1);
 $output .= '  
	<h3>Invoice</h3>
	<table width="90%" align="center">
	 <tr>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Customer ID</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Shop Name</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Customer Name</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Contact Number</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Address</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Area</th>
	 <th style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Geographical Coordinates</th>
	 </tr>
	<tr>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["CustomerID"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["ShopName"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["CustomerName"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["ContactNumber"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["Address"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["Area"].'</td>
	     <td style="background-color: #DCD1BE; align=left; padding: 20px;">'.$row["GeographicalCoordinates"].'</td>
	</tr>
	</table>
	<h3>Invoice Lines</h3>
        <div class="table-responsive">  
            <table class="table table-bordered">  
                <tr>  
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Order Number</th>  
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Customer ID</th>  
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Date</th> 
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Sales Person ID</th>
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Product Code</th>
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Quantity</th>
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Rate</th>
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Amount</th> 
                     <th width="20%" style="background-color: #856B48; align=center; color: #F5F3EA; padding: 20px;">Action</th>  
                </tr>';  
if(mysqli_num_rows($result) > 0)  
{  
    while($row = mysqli_fetch_array($result))  
    {  
		$result3 = mysqli_query($conn, $sql3);
		$result2 = mysqli_query($conn, $sql2);
        $output .= '  
            <tr>  
            <td class="OrderNo" data-id1="'.$row["OrderNo"].'" contenteditable>'.$row["OrderNo"].'</td>  
            <td>'.$row["CustomerID"].'</td> 
            <td class="Date" data-id3="'.$row["OrderNo"].'" contenteditable>'.$row["Date"].'</td>
            <td>';
		    $output .= '<select class="SalespersonID form-control" data-id4="'.$row["OrderNo"].'">';
			$output .= '<option value="">None</option>';
    		while ($row1 = mysqli_fetch_array($result2)) { 
               	$output .= '<option value="'.$row1["SalespersonID"].'"'.($row["SalespersonID"]==$row1["SalespersonID"]?'selected="selected"':"").'>'.$row1["SalespersonID"].'</option>';                
			}
    		$output .= '</select>
			</td>
               	<td>';
		     	$output .= '<select class="ProductCode form-control" data-id5="'.$row["OrderNo"].'">';
			$output .= '<option value="">None</option>';
    		while ($row2 = mysqli_fetch_array($result3)) { 
               	$output .= '<option value="'.$row2["ProductCode"].'"'.($row["ProductCode"]==$row2["ProductCode"]?'selected="selected"':"").'>'.$row2["ProductCode"].'</option>';                
			}
    			$output .= '</select>
		    </td>
                    <td class="Quantity" data-id6="'.$row["OrderNo"].'" contenteditable>'.$row["Quantity"].'</td>
                    <td class="Rate" data-id7="'.$row["OrderNo"].'" contenteditable>'.$row["Rate"].'</td>
                    <td>'.$row["Amount"].'</td> 
                    <td><button type="button" name="delete_btn" data-id9="'.$row["OrderNo"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>  
                </tr>  
            ';  
        }  
        $output .= '  
            <tr>  
                <td id="OrderNo" contenteditable></td>  
                <td id="CustomerID">'.$_POST["CustomerID"].'</td>  
                <td id="Date" contenteditable></td>  
                <td>';
		$output .= '<select id="SalespersonID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($conn, $sql2);
    	while ($row1 = mysqli_fetch_array($result2)) { 
            $output .= '<option value="'.$row1["SalespersonID"].'">'.$row1["SalespersonID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
        <td>';
		$output .= '<select id="ProductCode" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($conn, $sql3);
    	while ($row2 = mysqli_fetch_array($result3)) { 
            $output .= '<option value="'.$row2["ProductCode"].'">'.$row2["ProductCode"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Insert</button></td>  
            </tvr>  
        ';  
}  
else  
{  
      $output .= '
		<tr>  
                <td id="OrderNo" contenteditable></td>  
                <td id="CustomerID">'.$CustomerID.'</td>  
                <td id="Date" contenteditable></td>  
                <td>';
		$output .= '<select id="SalespersonID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($conn, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                $output .= '<option value="'.$row1["SalespersonID"].'">'.$row1["SalespersonID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="ProductCode" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($conn, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                $output .= '<option value="'.$row2["ProductCode"].'">'.$row2["ProductCode"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Insert</button></td>  
            </tr> 
<tr>  
                        <td colspan="4">Data not Found</td>  
                    </tr>';  
}  
$output .= '</table>  
    </div>';  
echo $output;  
?>
