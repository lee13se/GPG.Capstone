<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$header_page_id = "quote_order";
$header_subpage_id = "new_quote";
?>
<?php include('Includes/header.php'); ?>

<SCRIPT language="javascript">
var foo=0;
        function addRow(tableID) {
			for(foo=0; foo<1; foo++)
			{
			
            var table = document.getElementById(tableID);
			
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
			
            var colCount = table.rows[0].cells.length;
			
            for(var i=0; i<colCount; i++) {
				
                var newcell = row.insertCell(i);
				
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
		}//for
		
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
            }catch(e) {
                alert(e);
            }
        }
    </SCRIPT>

<body>

<table width="1024">
  <tr>
    <td colspan="6"><table>
      <tr>
        <td width="100">&nbsp;</td>
        <td width="200">Client Information</td>
        <td width="200">Part Information</td>
        <td width="220"><strong>Review/Complete Order</strong></td>
        <td width="163">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="248">&nbsp;</td>
    <td width="272">&nbsp;</td>
    <td width="276"><input type="submit" name="Create Order" id="Create Order" value="Submit" /></td>
    <td width="18">&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td>Client</td>
    <td>&nbsp;</td>
    <td>Creation Date</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td>Part</td>
    <td>&nbsp;</td>
    <td>Valid Till</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td colspan="3"><table border="1">
      <tr>
        <td width="25">Del</td>
        <td width="150">Quantity</td>
        <td width="150">Price Per Unit</td>
        <td width="150">Total Price</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td colspan="3"><table border="1" id="quantity">
      <tr>
        <td width="25"><input type="checkbox" name="Del1" id="Del1" /></td>
        <td width="150"><input name="quantityvalue1" type="text" id="quantityvalue1" value="1" maxlength="10" /></td>
        <td width="150">$          </td>
        <td width="150">$</td>
      </tr>
      <tr>
        <td><input type="checkbox" name="Del2" id="Del2" /></td>
        <td><input name="quantityvalue2" type="text" id="quantityvalue2" value="10" maxlength="10" /></td>
        <td>$</td>
        <td>$</td>
      </tr>
      <tr>
        <td><input type="checkbox" name="Del3" id="Del3" /></td>
        <td><input name="quantityvalue3" type="text" id="quantityvalue3" value="100" maxlength="10" /></td>
        <td>$</td>
        <td>$</td>
      </tr>
      <tr>
        <td><input type="checkbox" name="Del4" id="Del4" /></td>
        <td><input name="quantityvalue4" type="text" id="quantityvalue4" value="500" maxlength="10" /></td>
        <td>$</td>
        <td>$</td>
      </tr>
      <tr>
        <td><input type="checkbox" name="Del5" id="Del5" /></td>
        <td><input name="quantityvalue5" type="text" id="quantityvalue5" maxlength="10" /></td>
        <td>$</td>
        <td>$</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td colspan="3"><input type="button" name="deletequantity" id="del" value="del" onclick="deleteRow('quantity')"/>      <input type="button" name="addrowquantity" id="add" value="addrow" onclick="addRow('quantity')"/></td>
    <td><input type="reset" name="Clear" id="Clear" value="Reset" /></td>
    <td>&nbsp;</td>
  </tr>
</table>



</body>
<?php include('Includes/footer.php'); ?>
</html>
