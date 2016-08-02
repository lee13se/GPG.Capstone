<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php include('Includes/header.php'); ?>


<table width="867">
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">Client Information -&gt; <strong><u>Part Information</u></strong> -&gt;Review/Complete Quote</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="138">&nbsp;</td>
    <td width="178">&nbsp;</td>
    <td width="103">&nbsp;</td>
    <td width="282">&nbsp;</td>
    <td><input type="submit" name="Save3" id="Save3" value="Save"></td>
    <td width="63">&nbsp;</td>
  </tr>
  <tr>
    <td>Part Number</td>
    <td><input type="text" name="PartNumber" id="PartNumber"></td>
    <td>
    Parent Part      <input type="checkbox" name="ParentPart" id="ParentPart" /></td>
    <td>&nbsp;</td>
    <td width="63"><a href="ViewPart.htm">Save</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Material</td>
    <td><input type="text" name="Material" id="Material" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">Setup Pay</td>
    <td><input type="text" name="Setup Pay" id="Setup Pay" /></td>
    <td>Base Pay</td>
    <td><input type="text" name="BasePay" id="BasePay" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Operations</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5"><div align="center">
      <table width="694" height="191" border="1">
        <tr>
          <td width="292" height="45">Operation</td>
          <td width="74">Setup Time(s)</td>
          <td width="120">Production Time(s)</td>
          <td width="66">Setup Pay</td>
          <td width="108">Base Pay</td>
        </tr>
        <tr>
          <td height="23"><select name="Operations" id="Operations">
            <option>Wash</option>
            <option>Slug</option>
            <option>Blank</option>
            <option>Hob</option>
            <option>Other....</option>
          </select></td>
          <td><div align="center">
            <input name="SetupTime" type="text" id="SetupTime" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
            <input name="Production Time" type="text" id="Production Time" size="10" maxlength="10" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23"><select name="Operations3" id="Operations3">
            <option>Wash</option>
            <option>Slug</option>
            <option>Blank</option>
            <option>Hob</option>
            <option>Other....</option>
          </select></td>
          <td><div align="center">
            <input name="SetupTime2" type="text" id="SetupTime2" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
            <input name="Production Time2" type="text" id="Production Time2" size="10" maxlength="10" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23"><select name="Operations4" id="Operations4">
            <option>Wash</option>
            <option>Slug</option>
            <option>Blank</option>
            <option>Hob</option>
            <option>Other....</option>
          </select></td>
          <td><div align="center">
            <input name="SetupTime3" type="text" id="SetupTime3" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
            <input name="Production Time3" type="text" id="Production Time3" size="10" maxlength="10" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23"><select name="Operations5" id="Operations5">
            <option>Wash</option>
            <option>Slug</option>
            <option>Blank</option>
            <option>Hob</option>
            <option>Other....</option>
          </select></td>
          <td><div align="center">
            <input name="SetupTime4" type="text" id="SetupTime4" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
            <input name="Production Time4" type="text" id="Production Time4" size="10" maxlength="10" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23"><select name="Operations2" id="Operations2">
            <option>Wash</option>
            <option>Slug</option>
            <option>Blank</option>
            <option>Hob</option>
            <option>Other....</option>
          </select></td>
          <td><div align="center">
            <input name="SetupTime5" type="text" id="SetupTime5" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
            <input name="Production Time5" type="text" id="Production Time5" size="10" maxlength="10" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><input type="submit" name="Save" id="Save" value="Save" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Save2" id="Save2" value="Save" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ViewPart.htm">Save</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="ViewPart.htm">Save</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ViewPart.htm"></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
</html>fo

</body>

<?php include('Includes/footer.php'); ?>

</html>