<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Client</title>

<!-- Calling javascript for restricting fields --> 
<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  

</head>

<?php
$link = 1;
$header_page_id = "";
include('Includes/header.php');
?>

<?php
//get clientid from URL
$ClientNum = $_GET['clientNum'];
$page = $_GET['page'];


$results = "";

//if clientNum is not blank, QUERY IT!!!!
if($ClientNum != "")
{
	$results = mysql_query("SELECT * FROM Client_Info WHERE ClientNum = ".$ClientNum.";");
	

	//Extract all the tasty data from the query
	while($row = mysql_fetch_array($results))
	{
		extract ($row);
	
		//and display the tasty data, if ClientNum is blank, go to the bottom of this page
		?>
		<form action="Includes/SubEditClient.php?clientNum=<?php echo($ClientNum); if(page!='') echo("&page=".$page);?>"
        				method="post" input type="submit" name="button2" id="button2" value="Save">
		<br />
		
		<table width="841" border="0">
		  <tr>
			<td>&nbsp;</td>
			<td colspan="4">&nbsp;</td>
			<td><?php help('editClient'); ?></td>
		  </tr>
		  <tr>
			<td width="80">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="87"><input type="submit" name="button2" id="button2" value="Save"  tabindex="-1"/></td>
		
		  
		  </tr>
		  <tr>
			<td width="80">Client</td>
			<td width="270"> <input name="Client_Name" type="text" id="Client_Name" size="45" maxlength="45"
								value="<?php echo($CompanyName);?>"  tabindex="1"/></td>
			<td width="51">&nbsp;</td>
			<td width="82">Active <input type="checkbox" name="Active" id="Active" 
					"<?php if ($ActiveCustomer==1)echo('checked');?>" tabindex="-1"/> </td>
			<td width="245">CofC
				  <input type="checkbox" name="CofC" id="CofC" "<?php if ($CofC==1)echo('checked');?>" tabindex="-1"/></td>
			<td><INPUT TYPE="button" VALUE="Cancel" onClick="history.go(-1);return true;" tabindex="-1" />  </td>
		  </tr>
		  <tr>
			<td>Client ID</td>
			<td><input name="ClientID" type="text" id="ClientID" size="30" value="<?php echo($OldCompanyID);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>Address</td>
			<td> <input name="StreetLine1" type="text"  id="StreetLine1" size="30" maxlength="45"
            			value="<?php echo($StreetLine1);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>Country</td>
			<td><input name="Country" type="text" id="Country" size="30" maxlength="45" value="<?php echo($Country);?>"
            		tabindex="2"/></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input name="StreetLine2" type="text" id="StreetLine2" size="30" maxlength="45"
            			value="<?php echo($StreetLine2);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>Website</td>
			<td><input name="Website" type="text" id="Website" size="30" maxlength="45"
            			value="<?php echo($Website);?>" tabindex="2"/></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input name="StreetLine3" type="text" id="StreetLine3" size="30" maxlength="45"
            			value="<?php echo($StreetLine3);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24">City</td>
			<td><input name="City" type="text" class="char tb" id="City" size="30" maxlength="45"
            		value="<?php echo($City);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24">State</td>
			<td><input name="State" id="State" class="char tb" value="<?php echo($State);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="21">Zip</td>
			<td><input name="Zip" type="text" class="numberonly tb" id="Zip" size="10" maxlength="10"
            			value="<?php echo($Zip);?>" tabindex="1"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24">Terms</td>
			<td><select name="Terms" id="Terms" maxlength="45" value="<?php echo($Terms);?>" tabindex="-1">
			  <option>Cash in Advance</option>
			  <option>Cash on Delivery</option>
			  <option>Deferred Payment</option>
			  <option>Net 10</option>
			  <option>Net 15</option>
			  <option>Net 30</option>
			  <option>Net 60</option>
			</select></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="21">&nbsp;</td>
			<td colspan="3">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="124" valign="top">Notes</td>
			<td colspan="3"><textarea name="Notes" cols="45" rows="8" id="Notes" maxlength="500"
            				value="<?php echo($Notes);?>" tabindex="1"></textarea></td>
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
			<td><input type="reset" value="Clear Form" tabindex="-1" /></td>
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
			<td><input type="submit" name="button2" id="button2" value="Save" tabindex="-1" /></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><INPUT TYPE="button" VALUE="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/> </td>
		  </tr>
		  <tr>
			<td></td>
			<td><input name="Client_Num" type="hidden" id="Client_Num" value="<?php echo($ClientNum);?>" disabled="disabled"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
		</form>
		<br />
		<?php viewClientContacts($ClientNum); ?>
		<br />
		
		<?php
	}
}





/////////////////////////////////////////////////////////////////////////////////////////////


//If not ClientNum is defined, make an empty table

else
{
?>
<br />
<form action="Includes/SubmitNewClient.php<?php if(page!='') echo('?page='.$page);?>" method="post" input type="submit" name="button3" id="button3" value="Save">
<table width="841" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td><?php help('newClient'); ?></td>
  </tr>
  <tr>
    <td width="80">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="87">
    </td>
  
  
  </tr>
  <tr>
    <td width="80">Client</td>
    <td width="270"> <input name="Client_Name"  type="text" id="Client_Name" size="45" maxlength="45" tabindex="1"/></td>
    <td width="51">&nbsp;</td>
    <td width="82">    Active <input type="checkbox" name="Active" id="Active" value = "0" tabindex="-1"/></td>
    <td width="245">
    CofC      <input type="checkbox" name="CofC" id="CofC" value = "0" tabindex="-1"/></td>
    <td><input type="submit" name="button3" id="button3" value="Save"  tabindex="-1" /></td>
  </tr>
  <tr>
    <td>Client ID</td>
    <td><input name="ClientID" type="text" id="ClientID" size="30" maxlength="45" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><INPUT TYPE="button" VALUE="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/> </td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input name="StreetLine1" type="text" class="varchar td" id="StreetLine1" size="30" maxlength="45" tabindex="1" /></td>
    <td>&nbsp;</td>
    <td>Country</td>
    <td><input name="Country" type="text" id="Country" value="USA" maxlength="45" tabindex="2"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="StreetLine2" type="text" class="varchar tb" id="StreetLine2" size="30" maxlength="45" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td>Website</td>
    <td><input name="Website" type="text" id="Website" maxlength="45" tabindex="2"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="StreetLine3" type="text" class="varchar tb" id="StreetLine3" size="30" maxlength="45" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">City</td>
    <td><input name="City" type="text" class="char tb" id="City" size="30" maxlength="45" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">State</td>
    <td><input name="State" id="State" class="char tb" tabindex="1" maxlength="45"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">Zip</td>
    <td><input name="Zip" type="text" class="numberonly tb" id="Zip" size="10" maxlength="10" tabindex="1"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">Terms</td>
    <td><select name="Terms" id="Terms" maxlength="45" >
      <option>Cash in Advance</option>
      <option>Cash on Delivery</option>
      <option>Deferred Payment</option>
      <option>Net 10</option>
      <option>Net 15</option>
      <option>Net 30</option>
      <option>Net 60</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="124" valign="top">Notes</td>
    <td colspan="3"><textarea name="ClientNotes" cols="45" rows="8" id="ClientNotes" maxlength="500" tabindex="1"></textarea></td>
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
    <td><input type="reset" value="Clear Form" tabindex="-1" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button4" id="button5" value="Save" tabindex="-1" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><INPUT TYPE="button" VALUE="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/> </td>
  </tr>
</table>
</form>
<br />
<?php
}
?>



<!-- Script for restricting input in fields -->

<script type="text/javascript">  
 
$('.vcode').click(function(){$(this).next().toggle('slow'); return false;}); 
 
$('.sample1').alphanumeric();
 
$('.varchar').alphanumeric({allow:"., "});
 
$('.characteronly').alpha();

$('.char').alpha({allow:"., -_"});
 
$('.numberonly').numeric();
 
$('.sample5').numeric({allow:"."});
 
$('.sample6').alphanumeric({ichars:'.1a'});
 
 
</script> 

</body>

<?php include('Includes/footer.php'); ?>

</html>