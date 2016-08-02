<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?php

$ClientNum = $_GET['clientNum']; 
$page = $_GET['page'];

?>



</head>

<body>



<?php

 include('Dbconnect.php');
 include('functions.php');

//$ClientNum = $_POST["Client_Num"];
$CompanyName = $_POST["Client_Name"];
$ActiveCustomer = $_POST["Active"];
$CofC = $_POST["CofC"];
$OldClientID = $_POST["ClientID"];
$StreetLine1 =	$_POST["StreetLine1"];
$StreetLine2 = $_POST["StreetLine2"];
$StreetLine3 = $_POST["StreetLine3"];
$Country = $_POST["Country"];
$Website = $_POST["Website"];
$State = $_POST["State"];
$City = $_POST["City"];
$Zip = $_POST["Zip"];
$PaymentTerms = $_POST["Terms"];
$Notes = $_POST["Notes"];
		

if($CofC != NULL)
	$CofC = 1;
else
	$CofC = 0;


//else
//	$CofC = 0;

if($ActiveCustomer == NULL)
	$ActiveCustomer = 0;
else
	$ActiveCustomer = 1;

//echo("clientNum = ".$_GET['clientNum']. "<br /><br />");
//echo("ClientNum = ".$ClientNum. "<br /><br />");


$query= ("
	UPDATE Client_Info 
	SET
		CompanyName = '".$str->$CompanyName."',
		ActiveCustomer = '".$str->$ActiveCustomer."',
		CofC = '".$CofC."',
		OldCompanyID = '".$str->$OldClientID."',
		StreetLine1 = '".$str->$StreetLine1."',
		StreetLine2 = '".$str->$StreetLine2."',
		StreetLine3 = '".$str->$StreetLine3."',
		Country = '".$str->$Country."',
		Website = '".$str->$Website."',
		City = '".$str->$City."',
		State = '".$str->$State."',
		Zip = '".$str->$Zip."',
		PaymentTerms = '".$str->$PaymentTerms."',
		Notes = '".$str->$Notes."'
	WHERE ClientNum = '".$ClientNum."'
	");

echo ("<br><br>");
//echo ($query);
echo ("<br><br>");
//echo ($ClientNum);

$rt=mysql_query($query);
echo mysql_error();
if($rt){echo " Command is successful ";}
else {echo " Command is not successful ";} 


if($page != '')
{
	echo("<meta http-equiv='REFRESH' content='0;url=/".$page.".php?clientNum=".$ClientNum."'>");
	echo("<a href='/".$page.".php?clientNum=".$ClientNum."'> Changes Saved, Click Here To Go Back </a>");
}
else
{
	echo("<meta http-equiv='REFRESH' content='0;url=/EditClient.php?clientNum=".$ClientNum."'>");
	echo("<a href='/newQuote.php?EditClient=".$ClientNum."'> Changes Saved, Click Here To Go Back </a>");
}

?> 
<a href="/ViewPart.php?clientNum=<?php echo($ClientNum);?>">f</a>
</body>
</html>