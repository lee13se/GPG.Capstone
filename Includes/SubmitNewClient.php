<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>



<?php

 include('Dbconnect.php');
 include('functions.php');

$page = $_GET[page];



$CompanyName = $_POST["Client_Name"];
$ActiveCustomer = $_POST["Active"];
$CofC = $_POST["CofC"];
$Client_ID = $_POST["ClientID"];
$StreetLine1 = $_POST["StreetLine1"];
$StreetLine2 = $_POST["StreetLine2"];
$StreetLine3 = $_POST["StreetLine3"];
$Country = $_POST["Country"];
$Website = $_POST["Website"];
$State = $_POST["State"];
$Zip = $_POST["Zip"];
$City = $_POST["City"];
$PaymentTerms = $_POST["Terms"];
$Notes = $_POST["ClientNotes"];


$query= ("INSERT INTO Client_Info (CompanyName, ActiveCustomer, CofC, ClientNum, StreetLine1, StreetLine2,
								   StreetLine3, Country, Website, State, Zip, PaymentTerms, Notes, OldCompanyID, City)
		VALUES (
				'".$str->$CompanyName."',
				'".$str->$ActiveCustomer."',
				'".$str->$CofC."',
				'".$str->$ClientNum."',
				'".$str->$StreetLine1."',
				'".$str->$StreetLine2."',
				'".$str->$StreetLine3."',
				'".$str->$Country."',
				'".$str->$Website."',
				'".$str->$State."',
				'".$str->$Zip."',
				'".$str->$PaymentTerms."',
				'".$str->$Notes."',
				'".$str->$Client_ID."',
				'".$str->$City."'
				)");

echo ("<br><br>");
echo ($query);
mysql_query($query) or die(mysql_error());
//$result = mysql_query("SELECT LAST_INSERT_ID();");

//while($row = mysql_fetch_array($results))
	$ClientNum = mysql_insert_id();
	

?>



<?php
if($page == '')
{
	header("Location: /ViewClient.php?clientNum=".$ClientNum."");
	echo "<a href='/ViewClient.php?clientNum=".$ClientNum."'> Go Back </a>";
}

else
{
	header("Location: /".$page.".php?clientNum=".$ClientNum."");
	echo "<a href='/".$page.".php?clientNum=".$ClientNum."'> Go Back </a>";
}


?>

</body>
</html>