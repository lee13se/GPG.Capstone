<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Sales Order</title>

<!-- Start script for calendar-->	
	<link rel="stylesheet" href="Includes/jquery/themes/base/jquery.ui.all.css">
	<script src="Includes/jquery/jquery-1.4.3.js"></script>
	<script src="Includes/jquery/jquery.ui.core.js"></script>
	<script src="Includes/jquery/jquery.ui.widget.js"></script>
	<script src="Includes/jquery/jquery.ui.datepicker.js"></script>
    
	<script>
	$(function() {

		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', minDate: "-0d" });
	});
	</script>
<!--End Script for calendar-->

	
</head>



<?php 
$header_page_id = "quote_order";
$header_subpage_id = "new_order";
?>
<?php include('Includes/header.php'); ?>


<?php
$quoteNum = $_POST['quoteNum'];

if($quoteNum == "")
	$quoteNum = $_GET['quoteNum'];

?>

<script language="javascript">
// Last updated 2006-02-21

<!--
// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
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
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

//-->

function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellRight = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellRight.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'Quantity[]';
  el.id = 'Quantity[]';
  el.size = 11;
  el.maxLength = 11;
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  var cellRight = row.insertCell(2);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'Date[]';
  el.id = 'Date[]';
  el.size = 10;
  el.maxLength = 10;
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
 
  var cellRight = row.insertCell(3);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'ShippingM[]';
  el.id = 'ShippingM[]';
  el.size = 20;
  el.maxLength = 45;
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  var cellRight = row.insertCell(4);
  var el = document.createElement('input');
  el.type = 'textarea';
  el.name = 'shipmentNotes[]';
  el.id = 'shipmentNotes[]';
  el.cols = 30;
  el.rows = 2;
  el.maxLength = 500;
  
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
function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
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
else if ((("0123456789.").indexOf(keychar) > -1))
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




<body>



<?php
//if quoteNum is not defined
if($quoteNum == "")
{


?>
    <br />
    <br/> 
      <div align="right">
      <?php help('newOrder'); ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
    </div>  <br />
    <strong>
    Quote Number: </strong>
<form name="input" action="/NewSalesOrder.php" method="post"> <input name="quoteNum" type="text" size="11" maxlength="11" onKeyPress="return numbersonly(this, event)"/>
<input type="submit" value="Get Quote Info" /></form>

    <br/>
      
      <br/>
      
  <?php } //if(quoteNum == "")



//quoteNum is defined
else
{
	?>
           <br />
    
    <h6>
    <?php
	include('Includes/ViewQuote.php');
	printQuote($quoteNum);
	?>	
	</h6>
  	<br />
    <hr />
 
    <h2><strong>Sales Order:</strong></h2>
    <div align="right">
      <?php help('newOrder'); ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
 
	<form name="postOrder" action="/NewSalesOrder2.php?quoteNum=<?php echo $quoteNum; ?>" method="post">
	  <input name="quoteNum2" type="hidden" value="<?php echo $quoteNum; ?>"/>
	  <strong>Date Received: </strong> 
      <input name="dateRecieved" type="text" size="10" maxlength="10" value="<?php echo(date(Y)."-".date(m)."-".date(d));?>"/> YYYY-MM-DD<br />
      </p>
	  <p><strong>Order Notes:</strong></p>
	  <p>
	    <textarea name="orderNotes" cols="60" rows="3"></textarea>
      </p>
      <br />
      <br /> 
	<strong> Cost of Raw Material Per Unit: $</strong><input name="rawMaterialCost" type="text" id="rawMaterialCost" size="10" maxlength="10" onKeyPress="return numbersonlydec(this, event);" />
      <br />
      <br />
	  <p><strong>Enter Shipments:</strong></p>
	  <p><br />
	    
      <p>
	<input type="button" value="Add Row" onclick="addRowToTable();" />
	<input type="button" value="Remove Row" onclick="removeRowFromTable();" /></p>
	<table width="768" border="1" id="tblSample">
      <tr>
      	<td width="5%">&nbsp;&nbsp;&nbsp;</td>
        <td width="15%">Quantity</td>
        <td width="15%">Date YYYY-MM-DD</td>
        <td width="25%">Shipping Method</td>
        <td width="40%">Shipment Notes</td>
      </tr>
      <tr>


      </tr>
      <tr>
        <td>1</td>
        <td><input name="Quantity[]" type="text"
         id="Quantity[]" onkeypress="keyPressTest(event, this);" size="11" maxlength="11" /></td>
         
         


        <td><input name="Date[]" type="text" id="datepicker"  size="10" maxlength="10" /></td>

        <td><input name="ShippingM[]" type="text"
         id="ShippingM[]" onkeypress="keyPressTest(event, this);" size="20" maxlength="45" /></td>

        <td><textarea name="shipmentNotes[]" cols="30" rows="2" id="shipmentNotes[]" onkeypress="keyPressTest(event, this);"></textarea></td>
      </tr>
    </table>
    </p>
    <br />

    	  <p><strong>Select Shipping Address:</strong></p>
      <?php
	  
	  $result = mysql_query("SELECT ClientNum FROM Quote WHERE QuoteNum = ".$quoteNum."") 
                or die(mysql_error()); 
				
		while($row = mysql_fetch_array( $result )) {
			$clientNum = $row['ClientNum'];
		}
		
		//echo ('clientNum = '.$clientNum);
				
      $result = mysql_query("SELECT * FROM Shipping_Address WHERE ClientNum = ".$clientNum."") 
                or die(mysql_error());  
      
	  echo "<table border='1' cellpadding='0'>";
	  $i=0;
	   while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                $shippingAddressID = $row['ShippingAddressID'];
				echo '<tr>';
				echo '<td>';
					echo "<input name='shippingAddress' value=".$shippingAddressID." type='radio'";
					if($i==0)
						echo " checked ";
					echo "/>";
				echo '</td>';
				echo '<td>';
					shippingAddress($shippingAddressID);
				echo '</td>';
                echo '</tr>'; 
				$i++;
        } 

        // close table>
        echo "</table> <br />";
		echo '<a href="editShippingAdd.php?page=NewSalesOrder&clientNum='.$clientNum.'&quoteNum='.$quoteNum.'" ><input type="submit" value="New Shipping Address"/></a>';
	  ?>
<br />
<br />
<br />
    <p>
	  <input type="submit" name="submit" id="Save" value="Submit New Order" />
      
</form>
    <br />
    <br />

<?php
	


} //close the else
?>



<br />
<DIV ID="testdiv1" STYLE="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>
</body>
<?php include('Includes/footer.php'); ?>
</html>
