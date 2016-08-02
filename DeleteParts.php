<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
include('Includes/Dbconnect.php');
include('Includes/functions.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['PartNum']) && is_numeric($_GET['PartNum']))
 {
 // get id value
 $PartNum = $_GET['PartNum'];
 
 // delete the entry
 $result = mysql_query("SET FOREIGN_KEY_CHECKS=0")or die(mysql_error()); 
 
 $result = mysql_query("DELETE FROM Operations WHERE PartNum=$PartNum")
 or die(mysql_error()); 
 
 $result = mysql_query("DELETE FROM Sales_Order WHERE PartNum=$PartNum")
 or die(mysql_error()); 
 
 $result = mysql_query("DELETE FROM Quote WHERE PartNum=$PartNum")
 or die(mysql_error()); 
 
 $result = mysql_query("DELETE FROM Part_Data WHERE PartNum=$PartNum")
 or die(mysql_error()); 
 
 
 $result = mysql_query("DELETE FROM Attached_Files WHERE PartNum=$PartNum")
 or die(mysql_error()); 
 
 $result = mysql_query("DELETE FROM Part_Info WHERE PartNum=$PartNum")
 or die(mysql_error()); 

$result = mysql_query("SET FOREIGN_KEY_CHECKS=1")or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: ViewParts.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: ViewParts.php");
 }
 
?>