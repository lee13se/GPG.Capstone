<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View All Parts</title>

<?php 
$header_page_id = "advanced";
$header_subpage_id = "search_parts";
?>


<?php include('Includes/header.php'); ?>

</head>



<body>
<br />
<br />
<br />
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
        $result = mysql_query("Select * from Part_Info, Raw_Materials where Part_Info.RawMaterialID = Raw_Materials.RawMaterialID order by Part_Info.OldPartNum, Raw_Materials.Description") 
                or die(mysql_error());  
                
        // display data in table
        echo "<p></p><a href='searchParts.php'>Search Parts</a> | <b>List Parts</b><p></p>";
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>Part Number</th> <th>Material</th> <th>Setup Pay</th><th>Base Pay</th><th></th>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><a href="/PartView.php?PartNum='.$row['PartNum'].'">' . $row['OldPartNum'] . '</a></td>';
                echo '<td>' . $row['Description'] . '</td>';
                echo '<td>' . $row['SetupPay'] . '</td>';
                echo '<td>' . $row['BasePay'] . '</td>';
				echo '<td><a href="EditParts.php?PartNum=' . $row['PartNum'] . '&RawMaterialID='.$row['RawMaterialID'].'"><input type="submit" value="Edit"/></a></td>';
                echo "</tr>"; 
        } 

        // close table>
        echo "</table>";
?>
<p><a href="AddParts.php">
	<input type="submit" name="addnewpart" id"addnewpart" value="Add Part" /></a></p>




</body>
<?php include('Includes/footer.php'); ?>
</html>