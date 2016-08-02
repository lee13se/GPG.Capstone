<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php echo"<h1>Production Traveler</h1>";?>
<?php include('Includes/Dbconnect.php');?>
<?php
$orderNum = ''; 

$orderNum = $_GET['orderNum'];
if($orderNum == '')
	$orderNum = $_POST['orderNum'];

if($orderNum == '')
{
	?>
	
	<?php
	/**
	//post yummy data
	
	//$shippingAddressID = $_POST['shippingAddress'];
	//$quantityOrderd = $_POST['quantityOrderd'];
	$dateRecieved = $_POST['dateRecieved'];
	$orderNotes = $_POST['orderNotes'];
	$quoteNum = $_POST['quoteNum'];
	$Quantity = $_POST['Quantity'];
	$Date = $_POST['Date'];
	$ShippingM = $_POST['ShippingM'];
	$shipmentNotes = $_POST['shipmentNotes'];
	$shippingAddress = $_POST['shippingAddress'];
	$rawMaterialCost = $_POST['rawMaterialCost'];
	
	//echo('shippingAddressID = '.$shippingAddressID.'<br/>');
	//echo('quantityOrderd = '.$quantityOrderd.'<br/>');
	//echo('<br/>dateRecieved = '.$dateRecieved.'<br/><br/>');
	//echo('orderNotes = '.$orderNotes.'<br/><br/>');
	
	//if($shippingAddressID == '')
	//	echo "Please select a shipping address";
	//else if($quantityOrderd == '')
	//	echo "Please enter a quantity";
	
	
	 // connect to the database
	 
	 include('Includes/functions.php');
	 include('Includes/Dbconnect.php');
	 
	 
	 
	if($dateRecieved == '')
		echo "Please enter a date";
	
	else
	{
		
		$query = ("SELECT ClientNum, PartNum
				  FROM Quote
				  WHERE QuoteNum = '".$quoteNum."'");
		
		
		//echo ("query = ".$query."<br/><br/>");
		$result = mysql_query($query) or die (mysql_error());
		while($row = mysql_fetch_array($result)){
			$ClientNum = $row['ClientNum'];
			$PartNum = $row['PartNum'];
		}
		
		
		$ClientNum = mysql_real_escape_string($ClientNum);
		$dateRecieved = mysql_real_escape_string($dateRecieved);
		$PartNum = mysql_real_escape_string($PartNum);
		$orderNotes = mysql_real_escape_string($orderNotes);		
		
		$query= ("INSERT INTO Sales_Order (ClientNum, DateRecieved, PartNum, Notes)
						VALUES ('".$ClientNum."','".$dateRecieved."','".$PartNum."','".$orderNotes."')");
	
	
		//echo ("query = ".$query."<br/><br/>");
		mysql_query($query) or die (mysql_error());
		
		$orderNum = mysql_insert_id();
		
		
		$quantity = 0;
	
		$limit = count($Quantity);
		//echo ("limit = ".$limit."<br/><br/>");
		
		for( $i = 0; $i < $limit; $i++)
		{
		
			$Quantity[$i] = mysql_real_escape_string($Quantity[$i]);
			$Date[$i] = mysql_real_escape_string($Date[$i]);
			$ShippingM[$i] = mysql_real_escape_string($ShippingM[$i]);
			$shipmentNotes[$i] = mysql_real_escape_string($shipmentNotes[$i]);
		
			
			$query= ("INSERT INTO Shipping_Log
					 	(SalesOrderNum, QuantityRequested, DateRequested, ShippingMethod, Notes, ShippingAddressID)
						VALUES('".$orderNum."', '".$Quantity[$i]."', '".$Date[$i]."', '".$ShippingM[$i]."', '".$shipmentNotes[$i]."', '".$shippingAddress."')");
		
			
			//echo ("query = ".$query."<br/><br/>");
		
			$quantity = $quantity + $Quantity[$i];
			//echo ("quantity = ".$quantity."<br/><br/>");
			
			$query = mysql_query($query);
			//if($query)
			//	  echo "Operation ".$i." successfully inserted.<br/>";
			//   else
			//	  echo "Operation ".$i." encountered an error.<br/>";
		
		}
	
	
		$query= ("UPDATE Sales_Order 
					SET QuantityOrdered = '".$quantity."'
					WHERE SalesOrderNum = ".$orderNum." ");
		
		mysql_query($query) or die (mysql_error());
		
		
				//get setup and base pay
		$query = "SELECT SetupPay, BasePay
					FROM Part_Info
					Where PartNum = '".$PartNum."';
					";
		$result = mysql_query($query) or die;
		while($row = mysql_fetch_array( $result ))
		{
			$setupPay = $row['SetupPay'];
			$basePay = $row['BasePay'];
		}
		echo "setupPay = ".$setupPay."<br />";
		echo "basePay = ".$basePay."<br />";
		
		//get setup and production time for each operation
		$query = "SELECT SetupTime, ProductionTime
					FROM Operations
					WHERE PartNum = '".$PartNum."';
					";
		echo "query = ".$query."<br />";
		$result = mysql_query($query) or die;
		//$a = 0;
		
			
			while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
			//$setupTime[a] = $row['SetupTime'];
			echo "row['SetupTime'] = ".$row['SetupTime']."<br />";
			//$productionTime[a] = $row['ProductionTime'];
			echo "row['ProductionTime'] = ".$row['ProductionTime']."<br />";
		
		
		
		$totalSetupTime = 0;
		$totalProductionTime = 0;
		//Total the setup and production times
		for($i = 0; $i <= $a; $i++)
		{
			$totalSetupTime += $resultArray[$i]['SetupTime'];
			//echo "setupTime[$i] = ".$resultArray[$i]['SetupTime']."<br />";
			$totalProductionTime += $resultArray[$i]['ProductionTime'];
			//echo "productionTime[$i] = ".$resultArray[$i]['ProductionTime']."<br />";
		}
		echo "totalSetupTime = ".$totalSetupTime."<br />";
		echo "totalProductionTime = ".$totalProductionTime	."<br />";
		
		$price = (($setupPay/3600) * $totalSetupTime) + $quantity * (($basePay/3600) * $totalProductionTime);
		//Find cost per unit
		$pricePerUnit = ($price/$quantity)+$rawMaterialCost;
		
		
		$query= ("UPDATE Sales_Order 
					SET PricePerUnit = '".$pricePerUnit."'
					WHERE SalesOrderNum = ".$orderNum." ");
		
		mysql_query($query) or die (mysql_error());
		
	
		//echo ("query = ".$query."<br/>");
		
		header("Location: /NewSalesOrder2.php?orderNum=".$orderNum);
	} **/
}

else
{
	//include 'Includes/Print.php'
	//salesOrder($orderNum);
	
	//echo ('orderNum = '.$orderNum.'<br />');
	
	
	//get sales order info
	
	$result = mysql_query("SELECT *
						FROM Sales_Order
						WHERE SalesOrderNum = '".$orderNum."'") 
			or die(mysql_error()); 
			
	while($row = mysql_fetch_array($result))
	{
		$SalesOrderNum = $row['SalesOrderNum'];
		$PartNum = $row['PartNum'];
		$QuantityOrdered = $row['QuantityOrdered'];
		$ClientNum = $row['ClientNum'];
		$Notes = $row['Notes'];
		$OrderComplete = $row['OrderComplete'];
		$DateRecieved = $row['DateRecieved'];
		$pricePerUnit = $row['PricePerUnit'];
	}
	

	//get client's name
	$result = mysql_query("SELECT CompanyName
						FROM Client_Info
						WHERE ClientNum = '".$ClientNum."'") 
			or die(mysql_error());  
	
	while($row = mysql_fetch_array( $result ))
	{
		$CompanyName = $row['CompanyName'];
	}
	
	echo "<table width='400' border='1'>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Order Number:</strong><div></td>
		  <td>".$orderNum."</a></td>
		  </tr>");
	echo "<tr>";
	echo ("<td><div align='right'><strong>Client:</strong><div></td>
		  <td>".$ClientNum." ".$CompanyName."</a></td>
		  </tr>");
	
	
	//get part number
	$result = mysql_query("SELECT OldPartNum
						FROM Part_Info
						WHERE PartNum = '".$PartNum."'") 
			or die(mysql_error());  
	
	$totalprice = $QuantityOrdered * $pricePerUnit;
	$totalprice = number_format($totalprice,2);
	while($row = mysql_fetch_array( $result ))
	{
		$oldPartNum = $row['OldPartNum'];
	}
	echo "<tr>";
	echo ("<td><div align='right'><strong>Part Number:</strong></div></td>
		  <td>".$oldPartNum."</td>");
	echo "</tr>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Quantity Ordered:</strong></div></td>
		  <td>".$QuantityOrdered."</td>");
	echo "</tr>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Date Recieved:</strong></div></td>
		  <td>".$DateRecieved."</td>");
	echo "</tr>";
	echo "</table>";
	
	echo "<br /><strong>Order Notes: </strong>".$Notes;
	
	//get shipping Logs
	$result = mysql_query("SELECT *
						FROM Shipping_Log
						WHERE SalesOrderNum = '".$SalesOrderNum."'
						ORDER BY 'DateRequested'") 
			or die(mysql_error());  
	
	echo ('<br /><br /><br /><strong>Shipping Dates:</strong><br /><br />');
	echo "<table width='800' border='1'>
			<tr>
			<td><strong>Date Requested &nbsp;&nbsp;</strong></td>
			<td><strong>Quantity Requested &nbsp;&nbsp;</strong></td>
			<td><strong>Shipping Method &nbsp;&nbsp;</strong></td>
			<td><strong>Shipment Notes &nbsp;&nbsp;</strong></td>
			</tr>";
	while($row = mysql_fetch_array( $result ))
	{
		$ShippingAddressID = $row['ShippingAddressID'];
		$DateRequested = $row['DateRequested'];
		$QuantityRequested = $row['QuantityRequested'];
		$ShippingMethod = $row['ShippingMethod'];
		$Notes = $row['Notes'];
		
		echo('<tr>
			 <td>'.$DateRequested.'</td>
			 <td>'.$QuantityRequested.'</td>
			 <td>'.$ShippingMethod.'</td>
			 <td>'.$Notes.'</td>
			 </tr>');
	}
	echo "</table>
	<br /><br />
	
	";
	
	
	  $result = mysql_query("Select OperationName, SetupTime, Quota
							FROM Operations, Part_Info Where Part_Info.PartNum = $PartNum Group By OperationName 
						     ") or die(mysql_error());  
					
	// display data in table
	
	
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr>
			<th>Number</th>
			<th>Operation Description</th>
			<th>QTY Req</th>
			<th>Quota/Hr</th>
			<th>QTY Complete</th>
			<th>Hours</th>
			<th>Initials</th>
		    <th>Date</th>
			<th>Notes</th>
			<th>Setup</th>
		</tr>";
	
	// loop through results of database query, displaying them in the table
	  $i = 1;
	while($row = mysql_fetch_array( $result )) {
			if($row['Type'] == 1)
				$Type = 'Setup';
			else
				$Type = 'Production';
			
			
			
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td>' . $i. '</td>';
			echo '<td>' . $row['OperationName'] . '</td>';
			echo '<td>' . $QuantityRequested  . '</td>';
			echo '<td>' . $row['Quota'] . '</td>';
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "</tr>"; 
	     $i++;
	    
	
	} 
	
	// close table>
	echo "</table>";

}
?>


    <br />
    <br />

<br />
<DIV ID="testdiv1" STYLE="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>
</body>

</html>