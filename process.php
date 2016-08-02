<?php
 include('Dbconnect.php');
 include('functions.php');

$CompanyName = $_POST["Client_Name"];
$ActiveCustomer = $_POST["Active"];
$CofC = $_POST["CofC"];
$ClientNum = $_POST["Client_ID"];
$StreetLine1 =	$_POST["StreetLine1"];
$StreetLine2 = $_POST["StreetLine2"];
$Country = $_POST["Country"];
$Website = $_POST["Website"];
$State = $_POST["State"];
$Zip = $_POST["Zip"];
$PaymentTerms = $_POST["Terms"];
$Notes = $_POST["ClientNotes"];
		





$query= ("INSERT INTO Client_Info (CompanyName, ActiveCustomer, CofC, ClientNum, StreetLine1, StreetLine2, Country, Website, State, Zip, PaymentTerms, Notes) VALUES ('".$str->$CompanyName."', '".$str->$ActiveCustomer."','".$str->$CofC."','".$str->$ClientNum."','".$str->$StreetLine1."','".$str->$StreetLine2."','".$str->$Country."','".$str->$Website."','".$str->$State."','".$str->$Zip."','".$str->$PaymentTerms."','".$str->$Notes."' )");

echo ("<br><br>");
echo ($query);
mysql_query($query);


?>