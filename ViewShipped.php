<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Boxes Shipped</title>
</head>

<?php 
$header_page_id = "reports";
$header_subpage_id = "view_shipped";
?>
<?php include('Includes/header.php'); ?>


<body>

<?php

        // connect to the database
        //include('Includes/Dbconnect.php');
 		//include functions
		//include('Includes/functions.php');

        // get results from database
		$query = "SELECT Boxes_Shipped.TrackingNumber AS TrackingNumber, Boxes_Shipped.Weight AS Weight,
							  			Boxes_Shipped.Quantity AS Quantity, Shipping_Log.SalesOrderNum AS SalesOrderNum
							  FROM Boxes_Shipped
							  LEFT JOIN Shipping_Log
							  ON Shipping_Log.ShippingLogID = Boxes_Shipped.ShippingLogID
							  ;";
		// echo $query."<br>";					  
							  
        $result = mysql_query($query) 
                or die(mysql_error());  
                
        // display data in table
       
       echo "<br /><br />";
		
        echo "<table border='0' cellpadding='10'>";
        echo "<tr>
				<th>Tracking Number</th>
				<th>Sales Order Number</th>
				<th>Quantity</th>
				<th>Weight</th>
			</tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
					echo '<td><a href="http://www.google.com/search?q='.$row['TrackingNumber'] .'" target="_blank" >'
								.$row['TrackingNumber'] .'</a></td>';
					echo '<td><a href="/NewSalesOrder2.php?orderNum='.$row['SalesOrderNum'] .'">'
							.$row['SalesOrderNum'] . '</td>';
					echo '<td>' .$row['Quantity'] . '</td>';
					echo '<td>' .$row['Weight'] . '</td>';
             echo '</tr>'; 
        } 

        // close table>
        echo "</table>";
?>
<p></p>



<?php include('Includes/footer.php'); ?>
</body>
</html>