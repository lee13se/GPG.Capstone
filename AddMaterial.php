<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($EmployeeFirstName, $EmployeeLastName, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 
 


 <?php 
$header_page_id = "advanced";
$header_subpage_id = "edit_employees";
?>
 
 <?php
$link = 1;
$header_page_id = "";
include('Includes/header.php');
?>
 
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 

 

 
 </body>
 <?php include('Includes/footer.php'); ?>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('Includes/Dbconnect.php');
 include('Includes/functions.php');
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $EmployeeFirstName = $_POST['EmployeeFirstName'];
 $EmployeeLastName = $_POST['EmployeeLastName'];
 
 // check to make sure both fields are entered
 if ($EmployeeFirstName == '' || $EmployeeLastName == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($EmployeeFirstName, $EmployeeLastName, $error);
 }
 else
 {
 
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

 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?> 