<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Client</title>
</head>

<body text='#CC0000'>
<table width="841" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><strong><u>Cleint Information</u></strong> -&gt; Part Information -&gt; Review/Complete Quote</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="80">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="87"><form action="process.php" method="post" input type="submit" name="button2" id="button2" value="Save" /></td>
  
  
  </tr>
  <tr>
    <td width="80">Client</td>
    <td width="270"> <input name="Client_Name" type="text" id="Client_Name" size="40" maxlength="40" /></td>
    <td width="51">&nbsp;</td>
    <td width="82">    Active <input type="checkbox" name="Active" id="Active" value = "0" /></td>
    <td width="245">
    CofC      <input type="checkbox" name="CofC" id="CofC" value = "0" /></td>
    <td><a href="ViewClient.html">Save</a></td>
  </tr>
  <tr>
    <td>Client ID</td>
    <td><input name="ClientID" type="text" id="ClientID" size="30" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input name="StreenLine1" type="text" id="StreenLine1" size="30" /></td>
    <td>&nbsp;</td>
    <td>Country</td>
    <td><input name="Country" type="text" id="Country" value="USA" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="StreetLine2" type="text" id="StreetLine2" size="30" /></td>
    <td>&nbsp;</td>
    <td>Website</td>
    <td><input name="Website" type="text" id="Website" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="City" type="text" id="City" size="30" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><select name="State" id="State">
      <option>MO</option>
      <option>IL</option>
      <option>AR</option>
      <option>NY</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><input name="Zip" type="text" id="Zip" size="8" maxlength="6" /></td>
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
    <td height="24">Terms</td>
    <td><select name="Terms" id="Terms">
      <option>Cash in Advance</option>
      <option>Cash on Delivery</option>
      <option>Deferred Payment</option>
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
    <td colspan="3"><textarea name="ClientNotes" cols="45" rows="8" id="ClientNotes"></textarea></td>
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
    <td><input type="submit" name="button" id="button3" value="Save" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="ViewClient.html">Save</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>