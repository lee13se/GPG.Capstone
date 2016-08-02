<!--  Sample HTML Code,
<form action="tableaddrow_nw.html" method="get">
<p>
<input type="button" value="Add" onclick="addRowToTable();" />
<input type="button" value="Remove" onclick="removeRowFromTable();" />
<input type="button" value="Submit" onclick="validateRow(this.form);" />
<input type="checkbox" id="chkValidate" /> Validate Submit
</p>
<p>
<input type="checkbox" id="chkValidateOnKeyPress" checked="checked" /> Display OnKeyPress
<span id="spanOutput" style="border: 1px solid #000; padding: 3px;"> </span>
</p>
<table border="1" id="tblSample">
  <tr>
    <th colspan="3">Sample table</th>
  </tr>
  <tr>
    <td>1</td>
    <td><input type="text" name="txtRow1"
     id="txtRow1" size="40" onkeypress="keyPressTest(event, this);" /></td>
    <td>
    <select name="selRow0">
    <option value="value0">text zero</option>
    <option value="value1">text one</option>
    </select>
    </td>
  </tr>
</table>
</form>
-->

<script>
function addRowToTable(tableName)
{
  var tbl = document.getElementById(tableName);
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  var cellRightSel = row.insertCell(0);
  var sel = document.createElement('select');
  sel.name = 'Operation[]';
  sel.align = 'center';
  sel.options[0] = new Option('');
  sel.options[1] = new Option('');
  cellRightSel.appendChild(sel);
  
   var cellRightSel = row.insertCell(1);
  var check = document.createElement('input');
  check.type = 'checkbox';
  check.name = 'SetupPay[]';
  check.id = 'SetupPay[]';
  check.value = "1";
 cellRightSel.appendChild(check);
  
  
  // right cell
  var cellRight = row.insertCell(2);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'Quantity[]';
  el.id = 'Quantity[]';
  el.size = 10;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell
  var cellRight = row.insertCell(3);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'Hours[]';
  el.id = 'Hours[]';
  el.size = 4;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell
  var cellRight = row.insertCell(4);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'QuantityS[]';
  el.id = 'QuantityS[]';
  el.size = 4;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  
  // right cell
  var cellRight = row.insertCell(5);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'QuotaS[]';
  el.id = 'QuotaS[]';
  el.readOnly = 'readonly';
  el.size = 4;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell
  var cellRight = row.insertCell(5);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'QuotaP';
  el.id = 'QuotaP';
  el.size = 4;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  
  
  
}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}
function removeRowFromTable(tableName)
{
  var tbl = document.getElementById(tableName);
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
function openInNewWindow(frm)
{
  // open a blank window
  var aWindow = window.open('', 'TableAddRowNewWindow',
   'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
   
  // set the target to the blank window
  frm.target = 'TableAddRowNewWindow';
  
  // submit
  frm.submit();
  
}
function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tblSample');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}
</script>