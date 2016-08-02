<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Production Detail</title>
</head>
<?php 
$header_page_id = "inventory";
$header_subpage_id = "fgInventory";

?>


<?php include('Includes/header.php'); ?>


<body>
<?php
/* 
        VIEW.PHP
        Displays all data from 'Employee' table
*/

      
 		//include functions
		include('Includes/functions.php');
$SalesOrderNum = $_GET['SalesOrderNum'];
        
		$result = mysql_query("Select * from Production_Log_Line Where SalesOrderNum = $SalesOrderNum") 
                or die(mysql_error());  
                
        // display data in table
       echo "<p><b>Production Detail</b></p>";
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Type</th><th>Operation</th><th>Quantity Completed</th><th>Date</th><th>Notes</th><th>Employee</th></tr>";
      
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                $EmployeeNum = $row['EmployeeNum'];
				if($row['Type'] == 1)
				  $Type = 'Setup';
				    else
					 $Type = 'Production';
                $query = mysql_query("Select EmployeeFirstName, EmployeeLastName from Employee where EmployeeNum = '$EmployeeNum'") or 							                    die(mysql_error()); 
				
				while ($row2 = mysql_fetch_array($query)){
					$EmployeeFirstName = $row2['EmployeeFirstName'];
					$EmployeeLastName = $row2['EmployeeLastName'];
				 
				// echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $Type . '</td>';
				echo '<td>' . $row['Operation'] . '</td>';
                echo '<td>' . $row['QuantityCompleted'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
				echo '<td>' . $row['Notes'] . '</td>';
				echo '<td>' . $EmployeeFirstName . ' '.$EmployeeLastName.'</td>';

                echo "</tr>"; 
        } 
		}
        // close table>
        echo "</table>";
?>
<input type="button" value="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/>



<?php include('Includes/footer.php'); ?>
</body>
</html>