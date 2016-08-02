<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<?php

$ClientNum = $_GET['clientNum']; 

 include('Includes/Dbconnect.php');
 include('Includes/functions.php');

$NamePrefix = $_POST["NamePrefix"];
$ContactFirstName = $_POST["ContactFirstName"];
$ContactMiddleName = $_POST["ContactMiddleName"];
$ContactLastName = $_POST["ContactLastName"];
$NameSuffix =	$_POST["NameSuffix"];
$ContactEmail = $_POST["ContactEmail"];
$ContactPhone = $_POST["ContactPhone"];
$ContactExt = $_POST["ContactExt"];
$ContactFax = $_POST["ContactFax"];
$ContactNotes = $_POST["ContactNotes"];
		

//echo("clientNum = ".$_GET['clientNum']. "<br /><br />");
//echo("ClientNum = ".$ClientNum. "<br /><br />");


$query= ("
	INSERT INTO Client_Contact 
		(
			ClientNum,
			NamePrefix,
			ContactFirstName,
			ContactMiddleName,
			ContactLastName,
			NameSuffix,
			ContactEmail,
			ContactPhone,
			ContactExt,
			ContactFax,
			ContactNotes)
	VALUES (
		'".$str->$ClientNum.		"',
		'".$str->$NamePrefix.		"',
		'".$str->$ContactFirstName.	"',
		'".$str->$ContactMiddleName."',
		'".$str->$ContactLastName.	"',
		'".$str->$NameSuffix.		"',
		'".$str->$ContactEmail.		"',
		'".$str->$ContactPhone.		"',
		'".$str->$ContactExt.		"',
		'".$str->$ContactFax.		"',
		'".$str->$ContactNotes.		"')
	");

echo ("<br><br>");
echo ($query);
echo ("<br><br>");
//echo ($ClientNum);

$rt=mysql_query($query);
echo mysql_error();
if($rt){echo " Command is successful <br />";}
else {echo " Command is not successful <br />";} 



	echo("<meta http-equiv='REFRESH' content='0;url=/ClientContacts.php?clientNum=".$ClientNum."'>");
	echo("<a href='/ClientContacts.php?clientNum=".$ClientNum."'> Changes Saved, Click Here To Go Back </a>");


?> 
<a href="/ClientContacts.php?clientNum=<?php echo($ClientNum);?>">Click Here to go back.</a>
</body>
</html>