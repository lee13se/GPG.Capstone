<?php
 include('Includes/Dbconnect.php');
 include('Includes/functions.php');

$EmployeeSuffix = $_POST["EmployeeNameSuffix"];
$EmployeePrefix	= $_POST["EmployeeNamePrefix"];	
$EmployeeFirstName = $_POST["EmployeeFirstName"];
$EmployeeMiddleInt = $_POST["EmployeeMiddleName"];
$EmployeeLast = $_POST["EmployeeLastName"];
$EmployeeActive = $_POST["ActiveEmployee"];

$query= ("INSERT INTO Employee (EmployeeFirstName, EmployeeLastName, EmployeeMiddleName, ActiveEmployee, EmployeeNamePrefix, EmployeeNameSuffix) VALUES ('".$EmployeeFirstName."', '".$EmployeeLast."','".$EmployeeMiddleInt."','".$EmployeeActive."','".$EmployeePrefix."','".$EmployeeSuffix."')");


mysql_query($query);

mysql_close();

header('Location: http://gpg.webritetech.com/ViewActiveEmployees.php');

exit;

?>