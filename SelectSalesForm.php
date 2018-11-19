<?php 
 $conn = mysqli_connect("localhost", "root", "", "asna"); 
 $output = ''; 
 $sql = "SELECT * FROM salesorder_13217 ORDER BY OrderNo"; 
 $result = mysqli_query($conn, $sql); 
 $output .= '
 <div class="table-responsive"> 
 <div align="center"> 
 <table class="table table-bordered" border="1" bordercolor="#00CCCC">
	
 <tr> 
 <th width="10%">SerialNo</th>
 <th width="40%">OrderNo</th> 
 <th width="40%">CustomerID</th> 
 <th width="40%">Date</th>
 <th width="40%">SalespersonID</th> 
 <th width="40%">ProductCode</th> 
 <th width="40%">Quantity</th> 
 <th width="40%">Rate</th> 
 <th width="40%">Amount</th> 
 <th width="20%">Delete</th> 
 </tr>'; 
 if(mysqli_num_rows($result) > 0) 
 { 
 while($row = mysqli_fetch_array($result)) 
 { 
 $output .= ' 
 <tr> 
 <td>'.$row["SerialNo"].'</td> 
 <td class="OrderNo" data-id1="'.$row["SerialNo"].'" contenteditable>'.$row["OrderNo"].'</td> 
 <td class="CustomerID" data-id2="'.$row["SerialNo"].'" contenteditable>'.$row["CustomerID"].'</td> 
 <td class="Date" data-id3="'.$row["SerialNo"].'" contenteditable>'.$row["Date"].'</td> 
 <td class="SalespersonID" data-id4="'.$row["SerialNo"].'" contenteditable>'.$row["SalespersonID"].'</td> 
 <td class="ProductCode" data-id5="'.$row["SerialNo"].'" contenteditable>'.$row["ProductCode"].'</td> 
 <td class="Quantity" data-id6="'.$row["SerialNo"].'" contenteditable>'.$row["Quantity"].'</td> 
 <td class="Rate" data-id7="'.$row["SerialNo"].'" contenteditable>'.$row["Rate"].'</td> 
 <td class="Amount" data-id8="'.$row["SerialNo"].'" contenteditable>'.$row["Amount"].'</td> 
 <td><button type="button" name="delete_btn" data-id9="'.$row["SerialNo"].'" class="btn btn-xs btn-danger btn_delete">x</button></td> 
 </tr> 
 '; 
 } 
 $output .= ' 
 <tr> 
 <td></td> 
 <td id="OrderNo" contenteditable></td> 
 <td id="CustomerID" contenteditable></td> 
 <td id="Date" contenteditable></td> 
 <td id="SalespersonID" contenteditable></td> 
 <td id="ProductCode" contenteditable></td> 
 <td id="Quantity" contenteditable></td> 
 <td id="Rate" contenteditable></td> 
 <td id="Amount" contenteditable></td> 
 <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td> 
 </tr> 
 '; 
 } 
 else 
 { 
 $output .= '<tr> 
 <td colspan="4">Data not Found</td> 
 </tr>'; 
 } 
 $output .= '</table> 
 </div>'; 
 echo $output;
?> 