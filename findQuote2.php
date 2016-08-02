<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Quotes</title>
<?php 
$header_page_id = "quote_order";
$header_subpage_id = "find_quote";
?>

<?php include('Includes/header.php');


//get clientid from URL
$ClientNum = $_GET['clientNum']; 


if($ClientNum == "")
	$ClientNum = $_GET['clientNum'];
	
$results = "";

if($ClientNum != "")
{
	$results = mysql_query("SELECT * 
						    FROM Quote
							WHERE ClientNum = ".$ClientNum.";");
	

	//Extract all the tasty data from the query
	while($row = mysql_fetch_array($results))
	{
		extract ($row);
	}
		//and display the tasty data, if ClientNum is blank, go to the bottom of this page
		
}
		?>


</head>
<body>
<br/>
<br/>
<table>
	<tr>
    	<td width="150"><Strong>Current Quotes</Strong></td>
        <td><a href="/findQuoteAll.php?clientNum=<?php echo $ClientNum;?>"><strong>All Quotes</strong></a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
	</tr>
</table>
<br />

<table border="0">
  <tr>
    <td width="100"><strong>Quote</strong></td>
    <td width="150"><strong>Date Created</strong></td>
    <td width="150"><strong>Valid Until</strong></td>
    <td width="150"><strong>Part Number</strong></td>
    <td width="150"><strong>Quantity</strong></td>
    <td width="150"><strong>Price/Unit</strong></td>
    <td width=""><strong>Total</strong></td>
  </tr>
  <br />
   <?php 	
	$query = ("Select * 
			  
			  from 
			  
			  	Quote 
			where 
			
			ClientNum = '$ClientNum' 
				and
			ValidUntil >= CURDATE()");
	       
		   $result = mysql_query($query) or die ('Error: '.mysql_error ());
		  
		   while($row = mysql_fetch_array($result)){
			$QuoteNum = $row['QuoteNum'];
			$DateCreated = $row['DateCreated'];
			$ValidUntil = $row['ValidUntil'];
			$PartNum = $row['PartNum'];
			//$PricePerUnit = number_format ($row['PricePerUnit'], 2);
			//$Total = number_format ($PricePerUnit * $QuantityOrdered, 2);
			
					
			echo "<tr>
   				 <td>
				 <a href= '/findQuote.php?quoteNum=".$QuoteNum."'>
				 ".$QuoteNum."
                 </td></a>
				 <td>".$DateCreated."</td>
				 <td>".$ValidUntil."</td>
				 <td>".$PartNum."</td>
				 <td>";
				 
				 	$query2 = ("Select * from Quote_Line where QuoteNum = '$QuoteNum'");
					
					$result2 = mysql_query($query2) or die ('Error: '.mysql_error ());
						
						while($row2 = mysql_fetch_array($result2))
						{
							$Quantity = $row2['Quantity'];
							$PricePerUnit = number_format ($row2['PricePerUnit'], 2);
							$TotalPrice = number_format ($PricePerUnit * $Quantity, 2);
							
							if($Quantity != "")
							{
							
						echo	"
									".$Quantity."</td>
									<td>$".$PricePerUnit."</td>
									<td>$".$TotalPrice."</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
								";
							}
						}
					echo "</td>
						
					
					</tr>";
		 
		   }

	
	?> 
  
</table>



</body>
<?php include('Includes/footer.php'); ?>
</html>