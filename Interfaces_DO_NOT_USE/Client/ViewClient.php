<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Information</title>
</head>

<?php
include('Dbconnect.php');

$ClientID = $_GET['clientid']; 
$results = "";

if($ClientID != "")
{
	$results = mysql_query("SELECT * FROM Client_Info WHERE ClientNum = ".$ClientID.";");
	
	//extract ($results);
}

while($row = mysql_fetch_array($results))
{
	extract ($row);
?>

<body>
<table width="850" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><strong><u>Client Information</u></strong>-&gt;Part Information -&gt; Review/Complete Quote</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="75">&nbsp;</td>
    <td width="241">&nbsp;</td>
    <td width="46">&nbsp;</td>
    <td width="142">&nbsp;</td>
    <td width="209">&nbsp;</td>
    <td width="111"><input type="submit" name="button2" id="button2" value="Part Information" /></td>
  </tr>
  <tr>
    <td>Client</td>
    <td><?php echo($CompanyName);?></td>
    <td>&nbsp;</td>
    <td>    Active Customer: <?php if($CofC == 1){ echo("Yes");} else {echo("No");}?> </td>
    <td>
    CofC: &nbsp;     <?php if($CofC == 1){ echo("Yes");} else {echo("No");}?> </td>
    <td><a href="../Part/ViewPart.htm">Part Information</a></td>
  </tr>
  <tr>
    <td>Client ID:</td>
    <td><?php echo($OldCompanyID);?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo($StreetLine1);?></td>
    <td>&nbsp;</td>
    <td>Country: </td>
    <td><?php echo($Country); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo($StreetLine3); ?></td>
    <td>&nbsp;</td>
    <td>Website</td>
    <td><?php echo($Website); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo($City); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><?php echo($State); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><?php echo($Zip); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">Terms:</td>
    <td><?php echo($PaymentTerms); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="124">Notes:</td>
    <td colspan="3"><?php echo($Notes); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="CreateNewClient" id="CreateNewClient" value="New/Edit" />
    <a href="EditClient.htm" title="Create New Client"></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="EditClient.htm" title="Create New Client">New/Edit</a></td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="46">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php } ?>
</body>
</html>