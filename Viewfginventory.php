<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Finished Goods Inventory</title>
</head>
<?php 
$header_page_id = "inventory";
$header_subpage_id = "fgInventory";

?>


<?php include('Includes/header.php'); ?>


<body>

<div align="right">
  <?php help('FGInvList'); ?>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
  
  
  <?php
/* 
VIEW.PHP
Displays all data from 'Employee' table
*/

      
//include functions
include('Includes/functions.php');

// get results from database
$result = mysql_query("Select * from Part_Info, Raw_Materials
					  WHERE Part_Info.RawMaterialID = Raw_Materials.RawMaterialID AND Part_Info.FgQuantity <> 0
					  order by Part_Info.OldPartNum, Raw_Materials.Description") 
		or die(mysql_error());  
		
// display data in table
echo "<p><b>List Inventory</b> | <a href='fgInventory.php'>Update Inventory</a><p></p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>Part Number</th> <th>Location</th> <th>Quantity</th><th>Last Updated</th><th></th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['OldPartNum'] . '</td>';
		echo '<td>' . $row['FgLocation'] . '</td>';
		echo '<td>' . $row['FgQuantity'] . '</td>';
		echo '<td>' . $row['DateUpdated'] . '</td>';
		echo '<td><a href="EditParts.php?PartNum=' . $row['PartNum'] . '&RawMaterialID='.$row['RawMaterialID'].'">Edit</a></td>';
		echo "</tr>"; 
} 

// close table>
echo "</table>";
?>

<p><a href="AddParts.php">Add a New Part</a></p>



<?php include('Includes/footer.php'); ?>
</body>
</html>