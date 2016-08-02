<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Raw Materials</title>
</head>

<?php 
$header_page_id = "inventory";
$header_subpage_id = "rm_inventory";
?>
<?php include('Includes/header.php'); ?>


<body>
<?php
/* 
        VIEW.PHP
        Displays all data from 'Employee' table
*/

        // connect to the database
        include('Includes/Dbconnect.php');
 		//include functions
		include('Includes/functions.php');

        // get results from database
        $result = mysql_query("SELECT * FROM Raw_Materials ORDER BY Description") 
                or die(mysql_error());  
                
        // display data in table
        echo "<p><b>List Inventory</b> | <a href='rmInventory.php'>Update Inventory</a><p></p>";
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
				<th>Type</th>
				<th>Grade</th>
				<th>Diameter</th>
				<th>Quantity(ft.)</th>
				<th>Cost(lb.)</th>
				<th>Last Updated</th>
				<th>"; help('RawInvList'); echo"</th>
				</tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['Description'] . '</td>';
                echo '<td>' . $row['Grade'] . '</td>';
                echo '<td>' . $row['Diameter'] . '</td>';
				echo '<td>' . $row['QuantityFeet'] . '</td>';
                echo '<td>' . $row['Cost'] . '</td>';
				echo '<td>' . $row['LastVerified'] . '</td>';
				echo '<td><a href="EditMaterial.php?RawMaterialID=' . $row['RawMaterialID'] . '">Edit</td>';
             echo '</tr>'; 
        } 

        // close table>
        echo "</table>";
?>
<p><a href="AddNewMaterial.php">Add a New Material</a></p>



<?php include('Includes/footer.php'); ?>
</body>
</html>