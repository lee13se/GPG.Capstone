<?php

function client($clientNum)
{
	$query = "	SELECT *
				FROM Client_Info
				WHERE ClientNum = ".$clientNum;
				
	//echo(" ".$query."<br>");
	
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		$clientID = $row['OldCompanyID'];
		$companyName = $row['CompanyName'];
		$streetLine1 = $row['StreetLine1'];
		$streetLine2 = $row['StreetLine2'];
		$streetLine3 = $row['StreetLine3'];
		$city = $row['City'];
		$state = $row['State'];
		$zip = $row['Zip'];
		$website = $row['Website'];
		$activeClient = $row['ActiveCustomer'];
		$terms = $row['PaymentTerms'];
		$country = $row['Country'];
		$notes = $row['Notes'];
	}
	
	echo ('
	<table width="850" border="0">
				  <tr>
					<td width="81">&nbsp;</td>
					<td width="232">&nbsp;</td>
					<td width="45">&nbsp;</td>
					<td width="142">&nbsp;</td>
					<td width="205">&nbsp;</td>
					<td width="114">&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Name: </strong></div></td>
					<td>
						'.$companyName.'
						</form>
					</td>
					<td>&nbsp;</td>
					<td>    <div align="right"><strong>Active Customer: </strong></div></td>
					<td><br />');
				if($activeClient == 1) echo("Yes"); else echo("No");
				echo ('
					</td>
					<td></td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Client ID: </strong></div></td>
					<td>
						'.$clientID.'
					</td>
					<td>&nbsp;</td>
					<td><div align="right"><strong>CofC: </strong></div></td>
					<td>');
				if($CofC == '1') echo("Yes"); else echo("No");
				echo ('
					</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Address: </strong></div></td>
					<td>'.$streetLine1.'</td>
					<td>&nbsp;</td>
					<td><div align="right"><strong>Country: </strong></div></td>
					<td>'.$country.'</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"></div></td>
					<td>'.$streetLine2.'</td>
					<td>&nbsp;</td>
					<td><div align="right"><strong>Website: </strong></div></td>
					<td>'.$website.'</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"></div></td>
					<td>'.$streetLine3.'</td>
					<td>&nbsp;</td>
					<td><div align="right"></div></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"></div></td>
					<td>'.$city.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24"><div align="right"><strong>State:</strong></div></td>
					<td>'.$state.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24"><div align="right"><strong>Zip:</strong></div></td>
					<td>'.$zip.'</td>>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24"><div align="right"><strong>Terms: </strong></div></td>
					<td>'.$terms.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="21"><div align="right"></div></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="124"><div align="right"><strong>Client Notes: </strong></div></td>
					<td colspan="3">'.$notes.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				</table> 
				');
}


function shippingAddress($addressID)
{
	$query = "	SELECT *
				FROM Shipping_Address
				WHERE ShippingAddressID = '".$addressID."'";
				
	//echo(" ".$query."<br>");
	
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		$streetLine1 = $row['AddressLine1'];
		$streetLine2 = $row['AddressLine2'];
		$streetLine3 = $row['AddressLine3'];
		$city = $row['City'];
		$state = $row['State'];
		$zip = $row['Zip'];
		$country = $row['Country'];
		$notes = $row['Notes'];
	}
	echo ('
	<table width="850" border="0">
				  <tr>
					<td width="81">&nbsp;</td>
					<td width="232">&nbsp;</td>
					<td width="45">&nbsp;</td>
					<td width="142">&nbsp;</td>
					<td width="205">&nbsp;</td>
					<td width="114">&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Address: </strong></div></td>
					<td>'.$streetLine1.'</td>
					<td>&nbsp;</td>
					<td><div align="right"><strong>Country: </strong></div></td>
					<td>'.$country.'</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"></div></td>
					<td>'.$streetLine2.'</td>
					<td>&nbsp;</td>
					
					<td><div align="right"><strong>City:</strong></div></td>
					<td>'.$city.'</td><td></td>
				  </tr>
				  <tr>
					<td><div align="right"></div></td>
					<td>'.$streetLine3.'</td>
					<td>&nbsp;</td>
					
					<td height="24"><div align="right"><strong>State:</strong></div></td>
					<td>'.$state.'</td><td></td>
				  </tr>
				  <tr>
					<td height="24"><div align="right"><strong>Zip:</strong></div></td>
					<td>'.$zip.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="124"><div align="right"><strong>Address Notes: </strong></div></td>
					<td colspan="3">'.$notes.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				</table> 
				');
}

function salesOrder($salesOrderNum)
{
		  
$result = mysql_query("SELECT *
					FROM Sales_Order
					WHERE SalesOrderNum = ".$orderNum."") 
		or die(mysql_error()); 
		
while($row = mysql_fetch_array( $result )) {
	$SalesOrderNum = $row['SalesOrderNum'];
	$PartNum = $row['PartNum'];
	$QuantityOrdered = $row['QuantityOrdered'];
	$ClientNum = $row['ClientNum'];
	$Notes = $row['Notes'];
	$OrderComplete = $row['OrderComplete'];
	$DateRecieved = $row['DateRecieved'];
}
		
	
	?>
    
  
    
    <?php
}

?>