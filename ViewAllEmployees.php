<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View All Employees</title>
</head>

<?php 
$header_page_id = "advanced";
$header_subpage_id = "edit_employees";
?>
<?php include('Includes/header.php'); ?>


<body>
<br  />
<br  />
<br  />
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
        $result = mysql_query("SELECT * FROM Employee") 
                or die(mysql_error());  
                
        // display data in table
        echo "<p><a href='ViewActiveEmployees.php'>View Active</a> | <b>View All</b></p>";
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th><th>Phone Number</th> <th></th> </tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['EmployeeNum'] . '</td>';
                echo '<td>' . $row['EmployeeFirstName'] . '</td>';
                echo '<td>' . $row['EmployeeLastName'] . '</td>';
                echo '<td>' . $row['PhoneNumber'] . '</td>';
				echo '<td><a href="editEmployees.php?EmployeeNum=' . $row['EmployeeNum'] . '"><input type="submit" value="Edit"/></a></td>';
              
                echo "</tr>"; 
        } 

        // close table>
        echo "</table>";
?>
<p><a href="AddEmployee.php">
	<input type="submit" name="NewEmployee" id="NewEmployee" value="New Employee"/></a></p>




</body>
<?php include('Includes/footer.php'); ?>
</html>