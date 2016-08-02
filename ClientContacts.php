
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Contacts</title>

<!--Script for Input Masks -->
 	<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
	<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  
<!--End Script for Input Masks-->




</head>

<body>

<?php

function close()
{
	echo "<a href='JavaScript:window.close()'><INPUT TYPE='button' VALUE='Close Window'></a> ";
}
function back()
{
	echo "<INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'> ";
}


include ("Includes/functions.php");
include ("Includes/Dbconnect.php");
$clientNum = '';
$clientNum = $_GET['clientNum'];
$newContact = '0';
$newContact = $_GET['newContact'];

//if clientNum == -1, make a new client contact
if($newContact == '1' && $clientNum != '')
{?>
<form action="ClientContacts2.php?clientNum=<?php echo($clientNum);?>" method="post" input type="submit" name="button2" id="button2" value="Save">
    <table width="841" border="0">
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"><strong><u>New Client Contact:</u></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="64">&nbsp;</td>
        <td>Prefix</td>
        <td>First Name</td>
        <td>Middle Name</td>
        <td>Last Name</td>
        <td width="345">        Suffix</td>
      
      </tr>
      <tr>
        <td width="64"><div align="right"><strong>Name:</strong></div></td>
        <td width="46"> <input name="NamePrefix" class="name tb" type="text" id="NamePrefix" size="5" maxlength="40" /></td>
        <td width="120"><input name="ContactFirstName" class="name tb" type="text" id="ContactFirstName" size="20" maxlength="40" /></td>
        <td width="120"><input name="ContactMiddleName" class="name tb" type="text" id="ContactMiddleName" size="20" maxlength="40" /></td>
        <td width="120"><input name="ContactLastName" class="name tb" type="text" id="ContactLastName" size="20" maxlength="40" /></td>
        <td><input name="NameSuffix" type="text" class="name tb" id="NameSuffix" size="5" maxlength="40" /></td>
      </tr>
      <tr>
        <td><input type="hidden" value="<?php echo $clientNum; ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="right"><strong> Email:</strong></div></td>
        <td><input name="ContactEmail" class="email tb" type="text" id="ContactEmail" size="20" maxlength="40" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="right"><strong>Phone:</strong></div></td>
        <td><input name="ContactPhone" class="phonenumber tb" type="text" id="ContactPhone" size="20" maxlength="40" /></td>
        <td><div align="right"><strong>Extension:</strong></div></td>
        <td><input name="ContactExt" class="phonenumber tb" type="text" id="ContactExt" size="20" maxlength="40" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="24" colspan="2"><div align="right"><strong>Fax:</strong></div></td>
        <td><input name="ContactFax" class="phonenumber tb" type="text" id="ContactFax" size="20" maxlength="40" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="24" colspan="2"><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21"><div align="right"></div></td>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="124" valign="top"><div align="right"><strong>Contact Notes:</strong></div></td>
        <td colspan="3"><textarea name="ContactNotes" cols="45" rows="8" id="ContactNotes"></textarea></td>
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
        <td><input type="reset" name="Reset" id="button" value="Clear" /></td>
        <td>&nbsp;</td>
        <td><?php back(); ?></td>
        <td>&nbsp;</td>
        <td><input type="submit" name="button2" id="button2" value="Save" /></td>
      </tr>
    </table>
    </form>

<?php
}
//make sure client num is defined
else if($clientNum != '')
{
	$query = ("
			 	SELECT CompanyName
				FROM Client_Info
				WHERE ClientNum = '".$clientNum."'
			  ");
	
	$results = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($results))
	{
		extract ($row);
	}

	
	$query = ("
			 	SELECT *
				FROM Client_Contact
				WHERE ClientNum = '".$clientNum."'
			  ");
	
	$results = mysql_query($query) or die(mysql_error());
	
	
	?>
    <strong>Contacts for:</strong> <?php echo $CompanyName; ?><br /><hr />
    <table width="800" border="0">
    <tr>
        <td width="64"></td>
        <td width="120"></td>
        <td width="120"></td>
        <td width="120"></td>
        <td width="120"></td>
        <td width="345"></td>
        </tr>
     <tr>
     <?php
     while($row = mysql_fetch_array($results))
	{
		extract ($row);
		 ?>
		   <td width="64"><strong>Name:</strong></td>
		   <td colspan="5"><?php echo $NamePrefix; ?>&nbsp;
		   					<?php echo $ContactFirstName; ?>&nbsp;
							<?php echo $ContactMiddleName; ?>&nbsp;
							<?php echo $ContactLastName; ?>&nbsp;
							<?php echo $NameSuffix; ?></td>
		  </tr>
		  <tr>
			<td colspan="2"><div align="right"><strong> Email:</strong></div></td>
			<td><?php echo $ContactEmail; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="2"><div align="right"><strong>Phone:</strong></div></td>
			<td><?php echo $ContactPhone; ?></td>
			<td><div align="right"><strong>Extension:</strong></div></td>
			<td><?php echo $ContactExt; ?></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24" colspan="2"><div align="right"><strong>Fax:</strong></div></td>
			<td><?php echo $ContactFax; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td valign="top"><div align="right"><strong>Contact Notes:</strong></div></td>
			<td colspan="5"><?php echo $ContactNotes; ?></td>
		  </tr>
          <tr>
          	<td colspan="6"><hr /></td>
          </tr>
	<?php } //while ?>
	</table>
    <br />
    <br />
	<a href="ClientContacts.php?clientNum=<?php echo $clientNum; ?>&newContact=1">
	<input name="newContact" type="button" value="New Contact" /></a>
<?php
	close();
}
else
{
	echo "Client Number is not defined, error.<br />";
	close();
}

?>

<!--Script for input masks-->

<script type="text/javascript"> 
 
 
 
$('.vcode').click(function(){$(this).next().toggle('slow'); return false;});
 
 
 
$('.characteronly').alpha();

$('.char').alpha({allow:"., -_"});
 
$('.ordernumber').alphanumeric({allow:"- ."});
 
$('.trackingnumber').alphanumeric();

$('.name').alpha({allow:"-"});

$('.quantity').numeric();

$('.weight').numeric({allow:"."});

$('.phonenumber').numeric();

$('.email').alphanumeric({allow:"@.-_"});

$('.pay').numeric({allow:"."});
 
$('.time').numeric({allow:"."});
 
</script> 

<!--End Script for Input Masks -->


</body>
</html>