

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find An Existing Order</title>

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



<!-- Used for live search -->
<script type="text/javascript">
function showResult(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","/Includes/LiveSearch/ExistingOrderClient.php?q="+str,true);
xmlhttp.send();
}
</script>
<!-- End Script used for live search -->

<?php 
$header_page_id = "quote_order";
$header_subpage_id = "find_order";
?>
<!--headings-->



</head>

<?php include('Includes/header.php');


//get clientid from URL
$ClientNum = $_GET['clientNum']; 
$results = "";

//if clientNum is not blank, QUERY IT!!!!
if($ClientNum != "")
{
	$results = mysql_query("SELECT * FROM Client_Info WHERE ClientNum = ".$ClientNum.";");
	
	
	//Extract all the tasty data from the query
	while($row = mysql_fetch_array($results))
	{
		extract ($row);
		
		//and display the tasty data, if ClientNum is blank, go to the bottom of this page
	?>
	
	
	
	<body>
	<br/>
	<br/>
	<br/>
	<Strong>Client: <?php echo $CompanyName;?></Strong>
	<table border="1">
	  <tr>
		<td><Strong>Sales Order</Strong></td>
		<td><Strong>Date Received</Strong></td>
		<td><Strong>Part</Strong></td>
		<td><Strong>Quantity</Strong></td>
		<td><Strong>Price/Unit</Strong></td>
		<td><Strong>Total Charge</Strong></td>
	  </tr>  
	  <?php 	
		$query = ("Select * from Sales_Order where ClientNum = '$ClientNum' and OrderComplete = '0'");
			   
			   $result = mysql_query($query) or die ('Error: '.mysql_error ());
			  
			   while($row = mysql_fetch_array($result)){
				$SalesOrderNum = $row['SalesOrderNum'];
				$DateRecieved = $row['DateRecieved'];
				$PartNum = $row['PartNum'];
				$QuantityOrdered = $row['QuantityOrdered'];
				$PricePerUnit = number_format ($row['PricePerUnit'], 2);
				$Total = number_format ($PricePerUnit * $QuantityOrdered, 2);
				
						
				echo "<tr>
					 <td>
					 <a href= '/NewSalesOrder2.php?orderNum=".$SalesOrderNum."'>
					 ".$SalesOrderNum."
					 </td></a>
					 
					 <td>".$DateRecieved."</td>
					 <td>".$PartNum."</td>
					 <td>".$QuantityOrdered."</td>
					 <td>$".$PricePerUnit."</td>
					 <td>$".$Total."</td>
						</tr>";
			 
			   }
	
		
		?> 
	
	</table>
	
	
	
	
	
	

<!--First Screen that the user sees-->
<?php }
}

//if ClientNum is not defined, present this to the user.
else
{  ?>
<table width="1024" border="0">
  <tr>
    <td width="143">&nbsp;</td>
    <td width="243">&nbsp;</td>
    <td width="235">&nbsp;</td>
    <td width="192">&nbsp;</td>
    <td width="122"><?php help('existingOrder'); ?></td>
    <td width="63">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Sales Order:</strong></td>
    <td><form action="/NewSalesOrder2.php">
    		<input name="orderNum" type="text" id="ClientName" action="/NewSalesOrder.php" onKeyPress="return numbersonly(this, event)"/>
   		 <input type="submit" name="button" id="button" value="Submit" />
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Client:</strong></td>
    <td> <form>
        <input name="ClientName" type="text" id="ClientName" value="<?php echo($CompanyName);?>" onkeyup="showResult(this.value)" />
		<div id="livesearch"></div>
        </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="192">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>



<?php 
}
?>
</body>
<?php include('Includes/footer.php'); ?>
</html>