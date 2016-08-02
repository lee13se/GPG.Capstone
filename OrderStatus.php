<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Sales Order Status</title>

<SCRIPT TYPE="text/javascript">
<!--
// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

//-->
</SCRIPT>


</head>

<?php 
$header_page_id = "production";
$header_subpage_id = "order_status";

include('Includes/header.php'); ?>
<body>
<br />
<?php
$orderNum = ''; 
$orderNum = $_GET['orderNum'];
if($orderNum == '')
	$orderNum = $_POST['orderNum'];

if($orderNum == '')
{
	?>
	<table width="1024" border="0">
	  <tr>
		<td width="143">&nbsp;</td>
		<td width="243">&nbsp;</td>
		<td width="235">&nbsp;</td>
		<td width="192">&nbsp;</td>
		<td width="122"></td>
		<td width="63">&nbsp;</td>
	  </tr>
	  <tr>
        <td><strong>Sales Order:</strong></td>
        <td><form action="/OrderStatus.php">
                <input name="orderNum" type="text" id="ClientName" action="/OrderStatus.php" onKeyPress="return numbersonly(this, event)"/>
             <input type="submit" name="button" id="button" value="Submit" />
        </form></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
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
	
	echo ('<br /><br /><br />');
	
	//get client's name
	$result = mysql_query("SELECT CompanyName
						FROM Client_Info
						WHERE ClientNum = '".$ClientNum."'") 
			or die(mysql_error());  
	
	while($row = mysql_fetch_array( $result ))
	{
		$CompanyName = $row['CompanyName'];
	}
	
	echo "<table width='400' border='0'>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Order Number:</strong><div></td>
		  <td><a href='/NewSalesOrder2.php?orderNum=".$orderNum."'>".$orderNum."</a></td>
		  </tr>");
	echo "<tr>";
	echo ("<td><div align='right'><strong>Client:</strong><div></td>
		  <td><a href='/ViewClient.php?clientNum=".$ClientNum."'>".$CompanyName."</a></td>
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
		  <td><a href='/PartView.php?PartNum=".$PartNum."'>".$oldPartNum."</a></td>");
	echo "</tr>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Quantity Ordered:</strong></div></td>
		  <td>".$QuantityOrdered."</td>");
	echo "</tr>";
	echo "<tr>";
	echo ("<td><div align='right'><strong>Total Price:</strong></div></td>
		  <td>$".($totalprice)."</td>");
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
	echo "<table width='800' border='0'>
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
	
	
	  $result = mysql_query("Select Operation, SUM(QuantityCompleted) AS Totalquantity, MAX(Date) AS Maxdate, Type 
							FROM Production_Log_Line Where SalesOrderNum = $SalesOrderNum 
							GROUP BY Operation, Type") or die(mysql_error());  
					
	// display data in table
	
	echo '<p><b>Production Log</b> | <a href="ViewProductionDetail.php?SalesOrderNum='.$SalesOrderNum.'">View Detail</a></p>';
	
	echo "<table border='0' cellpadding='10'>";
	echo "<tr>
			<th>Type</th>
			<th>Operation</th>
			<th>Quantity Completed</th>
			<th>QuantityRequested</th>
			<th>Date of Most Recient Activity</th>
		</tr>";
	
	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
			if($row['Type'] == 1)
				$Type = 'Setup';
			else
				$Type = 'Production';
			
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td>' . $Type . '</td>';
			echo '<td>' . $row['Operation'] . '</td>';
			echo '<td>' . $row['Totalquantity'] . '</td>';
			echo '<td>' . $QuantityRequested . '</td>';
			echo '<td>' . $row['Maxdate'] . '</td>';
			
			echo "</tr>"; 
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
<?php include('Includes/footer.php'); ?>
</html>