<?php
function printQuote($quoteNum)
{
	
	$query = "SELECT *
				FROM Quote
				WHERE QuoteNum = ".$quoteNum;
				
	//echo("<br>".$query."<br>");
	
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		$clientNum = $row['ClientNum'];
		$discount = $row['Discount'];
		$dateCreated = $row['DateCreated'];
		$validUntil = $row['ValidUntil'];
		$notes = $row['Notes'];
		$partNum = $row['PartNum'];
		$quoteNotes = $row['Notes'];
	}
	
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
		$streetLine3 = $row['StreetLine4'];
		$city = $row['City'];
		$state = $row['State'];
		$zip = $row['Zip'];
		$website = $row['Website'];
		$activeClient = $row['ActiveCustomer'];
		$terms = $row['PaymentTerms'];
		$country = $row['Country'];
		$notes = $row['Notes'];
	}
	
		$query = "	SELECT OldPartNum
				FROM Part_Info
				WHERE PartNum = ".$partNum;
				
	//echo(" ".$query."<br>");
	
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		$OldPartNum = $row['OldPartNum'];
	}
	

	echo (' 
		  
		  <strong>Client Info:</strong>
		  	<table width="850" border="0">

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
					<td>'.$city.'</td>
					<td>&nbsp;</td>
					<td><div align="right"></div></td>
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
					<td>'.$zip.'</td>
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
					<td height="40"><div align="right"><strong>Client Notes: </strong></div></td>
					<td colspan="3">'.$notes.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				</table>
				
				<strong>Quote Info:</strong>
				
				
		
				<table width="850" border="0">

				  <tr>
					<td><div align="right"><strong>Quote Number: </strong></div></td>
					<td>
						'.$quoteNum.'
						</form>
					</td>
					<td>&nbsp;</td>
					<td> </td>
					<td>
					</td>
					<td></td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Part Number: </strong></div></td>
					<td>
						'.$OldPartNum.'
					</td>
					<td>&nbsp;</td>
					<td></td>
					<td>
					</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><div align="right"><strong>Date Created: </strong></div></td>
					<td>'.$dateCreated.'</td>
					<td>&nbsp;</td>
					<td><div align="right"><strong>Valid Until: </strong></div></td>
					<td>'.$validUntil.'</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24"><div align="right"><strong>Quote Notes:</strong></div></td>
					<td>'.$quoteNotes.'</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				</table>
				<br />
			');
			
			$query = "SELECT * FROM Quote_Line WHERE QuoteNum = ".$quoteNum." ORDER BY Quantity";
			//echo ($query."<br>");
			
			$result = mysql_query($query) 
                or die(mysql_error());  
				
			echo "<table border='1' cellpadding='10'>
					<tr> <td> Quantity </td>
						<td> Price Per Unit </td>
						<td> Total Price </td>
					</tr>
			";	
			
			while($row = mysql_fetch_array($result))
			{
				$quantity = $row['Quantity'];
				$ppu =  $row['PricePerUnit'];
				echo "<tr>";
                echo '<td>' .$quantity. '</td>';
                echo '<td>$' .number_format($ppu,2). '</td>';
				echo '<td>$' .number_format(($ppu * $quantity), 2). '</td>';
				echo "</tr>";
			}
			echo "</table>";
}
?>