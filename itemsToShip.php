
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shipments Due</title>

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
$header_page_id = "shipping";
$header_subpage_id = "shipments_due";
//how many days out to look for shipments	
$future = $_POST['future'];
if($future == '')
	$future = 7; 

include('Includes/header.php');?>
<br />
<br />
<br />
<body>

<? //display today's data and future date ?>
<strong>Report generated on:</strong>&nbsp;<?php echo date('l, jS \of F Y'); ?><br />
<form action="itemsToShip.php" method="post" name="outlook">
<strong>Looking for shipments due for the next &nbsp;</strong>
	<input name="future" type="text" size="2" maxlength="3" onKeyPress="return numbersonly(this, event)" value="<? echo $future;?>"/>
    <strong> days.</strong>&nbsp;&nbsp;
    <input name="sub" type="submit" value="Update" /><br /></form>
<strong>Showing shipments due until:</strong>&nbsp;
<?php echo (date('jS \of F Y', mktime(0, 0, 0, date("m"), date("d")+$future, date("Y"))));?>
<br /><br />

<?php
$today = date('Ymd');
$futureDay = date('Ymd', mktime(0, 0, 0, date("m"), date("d")+$future, date("Y")));


?>

<table width="800" border="0">
  <tr>
    <th scope="col"><strong>Date Requested</strong></th>
    <th scope="col"><strong>Order Number</strong></th>
    <th scope="col"><strong>Quantity Ordered</strong></th>
    <th scope="col"><strong>Shipping Method</strong></th>
  </tr>

    <?php
    	$query = ("
				  SELECT *
				  FROM (
						SELECT Shipping_Log.ShippingLogID, Shipping_Log.DateRequested, Shipping_Log.QuantityRequested, 
								Shipping_Log.SalesOrderNum, Shipping_Log.ShippingMethod, 
								SUM(COALESCE(Boxes_Shipped.Quantity, 0)) AS TotalQuantity
						FROM Shipping_Log
						FULL JOIN Boxes_Shipped
							ON Shipping_Log.ShippingLogID = Boxes_Shipped.ShippingLogID
						GROUP BY Shipping_Log.ShippingLogID, Shipping_Log.DateRequested, Shipping_Log.QuantityRequested,
									Shipping_Log.SalesOrderNum, Shipping_Log.ShippingMethod
						) AS TEMP
				WHERE (TEMP.DateRequested >= ".$today." AND TEMP.DateRequested <= ".$futureDay.")
				OR (TEMP.DateRequested < ".$today." AND TEMP.QuantityRequested < TotalQuantity)
                ORDER BY TEMP.DateRequested ASC;
				");
			
		$result = mysql_query($query) or die(mysql_error());
		
		while($row = mysql_fetch_array( $result ))
		{
			//echo "quantity = ".$row['TEMP.TotalQuantity']." ";
			//echo "ShippingLogID = ".$row['TEMP.ShippingLogID']."<br />";
			echo "<tr>";
				echo "<td>".$row['TEMP.DateRequested']."</td>";
				echo "<td>".$row['TEMP.SalesOrderNum']."</td>";
				echo "<td>".$row['TEMP.TotalQuantity']."</td>";
				echo "<td>".$row['TEMP.ShippingMethod']."</td>";
			echo "</tr>";
		}
    ?>
</table>
</body>
<br />
<?php include('Includes/footer.php'); ?>
</html>
