<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
include('Includes/Dbconnect.php');
include('Includes/functions.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['EmployeeNum']) && is_numeric($_GET['EmployeeNum']))
 {
 // get id value
 $EmployeeNum = $_GET['EmployeeNum'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM Employee WHERE EmployeeNum=$EmployeeNum")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: ViewActiveEmployees.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: ViewActiveEmployees.php");
 }
 
?>