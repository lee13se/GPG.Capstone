<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Shipping Address</title>

<script>
function numbersonlydec(myfield, e, dec)
{

var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
	(key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789-").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return true;
   }
else
   return false;
}
</script>


</head>

<?php 
$header_page_id = "";
$header_subpage_id = "";
$link = 1;
?>
<?php include('Includes/header.php'); ?>


<?php
$page = $_GET['page'];
$clientNum = $_GET['clientNum'];

if($page == "NewSalesOrder")
	$quoteNum = $_GET['quoteNum'];
	
?>

<body>
<br />
<br />
<br />
<form name="input" action="" method="post">
<table width="841" border="0">
  <tr>
    <td width="80">&nbsp;</td>
    <td width="270">&nbsp;</td>
    <td width="51">&nbsp;</td>
    <td width="82">&nbsp;</td>
    <td width="245"><?php help('addShipAdd'); ?></td>
    <td></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Address:</strong></div></td>
    <td> <input name="StreetLine1" type="text"  id="StreetLine1" size="30" maxlength="45" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td height="24"><div align="right"><strong>City:</strong></div></td>
    <td><input name="City" type="text" class="char tb" id="City" size="30" maxlength="45" tabindex="4"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="StreetLine2" type="text" id="StreetLine2" size="30" maxlength="45" tabindex="2"/></td>
    <td>&nbsp;</td>
    <td height="24"><div align="right"><strong>State:</strong></div></td>
    <td><input name="State" id="State" class="char tb" tabindex="5"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="StreetLine3" type="text" id="StreetLine3" size="30" maxlength="45" tabindex="3"/></td>
    <td>&nbsp;</td>
    <td height="21"><div align="right"><strong>Zip:</strong></div></td>
    <td><input name="Zip" type="text" onKeyPress="return numbersonlydec(this, event);" id="Zip" size="10" maxlength="10" tabindex="6"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24"><div align="right"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Country:</strong></div></td>
    <td><input name="Country" type="text" id="Country" size="30" maxlength="45" tabindex="7" value="USA"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Address Notes:</strong></div></td>
    <td><textarea name="notes" id="notes" cols="45" rows="5" tabindex="8" maxlength="500"></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Update" id="Update" value="Save" tabindex="9" /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="page" value="<? echo $page;?>" /></td>
    <td><input type="hidden" name="clientNum" value="<? echo $clientNum;?>" /></td>
    <td><input type="hidden" name="quoteNum" value="<? echo $quoteNum;?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="/ViewClient.php?clientNum=<?php echo $clientNum?>"<INPUT TYPE="button" VALUE="Cancel" onClick="history.go(-1);return true;" tabindex="10"/> </a></td>
  </tr>
</table>
</form>
<?php include("Includes/footer.php"); ?>
</body>
</html>
<?php
// connect to the database

include('Includes/functions.php');
include('Includes/Dbconnect.php');


// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['Update']))
{ 

	$page = $_GET['page'];
	$clientNum = $_GET['clientNum'];
	
	if($page == "NewSalesOrder")
		$quoteNum = $_GET['quoteNum'];
	
	$StreetLine1 = $_POST['StreetLine1'];
	$StreetLine2 = $_POST['StreetLine2'];
	$StreetLine3 = $_POST['StreetLine3'];
	$City = $_POST['City'];
	$State = $_POST['State'];
	$Zip = $_POST['Zip'];
	$Country = $_POST['Country'];
	$Notes = $_POST['notes'];
	

	$query = ("
			  INSERT INTO Shipping_Address (ClientNum, AddressLine1, AddressLine2, AddressLine3, City, State, Zip, Country, Notes)
			  VALUES ('".$clientNum."','".$StreetLine1."','".$StreetLine2."','".$StreetLine3."','".$City."','".$State."','".$Zip."','".$Country."','".$Notes."')
			  ");
	
	echo $query.'<br />';
	
	mysql_query($query) or die(mysql_error());
	
	mysql_close;
	
	if($page == 'NewSalesOrder')
		echo '<script type="text/javascript">
			<!--
			window.location = "/NewSalesOrder.php?quoteNum='.$quoteNum.'"
			//-->
			</script>';
	else
		echo '<script type="text/javascript">
			<!--
			window.location = "/ViewClient.php?clientNum='.$clientNum.'"
			//-->
			</script>';
	
	
}
else
{
	echo "";
	//renderForm('','','','','','','');
}

//include("Includes/footer.php");
?>


