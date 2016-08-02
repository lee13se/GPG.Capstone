<?php
$header_page_id = "quote_order";
$header_subpage_id = "new_quote";


$ClientNum = $_GET['clientNum'];
$partNum = $_GET['partNum'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Quote - Enter Part</title>

<script type="text/javascript">
function showResult(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","/Includes/LiveSearch/ViewPartLS.php?q="+str+"&clientNum=<?php echo $ClientNum?>",true);
xmlhttp.send();
}
</script>


</head>

<?php include('Includes/header.php');



if($partNum != '')
{
	$result = mysql_query("SELECT Description
							FROM Raw_Materials
							INNER JOIN Part_Info
							ON Raw_Materials.RawMaterialID=Part_Info.RawMaterialID
							WHERE Part_Info.PartNum=".$partNum) 
                or die(mysql_error());  
	while($row = mysql_fetch_array( $result ))
	{
		$material=$row['Description'];
	}


	$result = mysql_query("SELECT OldPartNum
							  FROM Part_Info
							  WHERE PartNum=".$partNum) 
                or die(mysql_error()); 
				
	while($row = mysql_fetch_array( $result ))
	{
		$oldPartNum=$row['OldPartNum'];
	}

				
				
	$result = mysql_query("SELECT ParentPart
							  FROM Part_Info
							  WHERE PartNum=".$partNum) 
                or die(mysql_error()); 
				
	while($row = mysql_fetch_array( $result ))
	{
		$parentPart=$row['ParentPart'];
	}

}



?>

<!--// load jQuery Plug-ins //-->

    <script type="text/javascript" src="/Includes/jquery/jquery.js"></script>
    <script type="text/javascript">
    </script>
 
 
 </head>




<SCRIPT TYPE="text/javascript">
<!--
// Input mask for numbers only
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

//-->
</SCRIPT>


<script language="javascript">
// Used for Add and Remove rows form the table
function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // Quantity cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow[]';
  el.id = 'txtRow[]';
  el.size = 11;
  el.maxLength = 11;

  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  
}
function keyPressTest(e, obj)
{
	var validateChkb = document.getElementById('chkValidateOnKeyPress');
	if (validateChkb.checked)
	{
		var displayObj = document.getElementById('spanOutput');
		var key;
		if(window.event)
		{
		  key = window.event.keyCode; 
		}
		else if(e.which)
		{
		  key = e.which;
		}
		var objId;
		if (obj != null)
		{
		  objId = obj.id;
		} 
		else
		{
		  objId = this.id;
		}
	displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
	keychar = String.fromCharCode(key);
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
</script>

<body>
<form action="" method="post">
<br /><br /><br />
<table width="1024">
  <tr>
    <td colspan="6"><table>
      <tr>
        <td width="100">&nbsp;</td>
        <td width="200">Client Information&nbsp;&nbsp; --></td>
        <td width="200"><strong>Part Information</strong></td>
        <td width="183">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="115">&nbsp;</td>
    <td width="234">&nbsp;</td>
    <td width="159">&nbsp;</td>
    <td width="231">&nbsp;</td>
    <td width="261"><?php help('newQuotePart'); ?></td>
    
  </tr>
  <tr>
    <td width="115"><div align="right"><strong>Part Number</strong></div></td>
    <td>
    <input "type="text" size="30" onkeyup="showResult(this.value)"  <?php if($oldPartNum != '') echo("value='".$oldPartNum."'"); ?> />
		<div id="livesearch"></div>
   </td>
    <td><div align="right"><strong>Date Created</strong></div></td>
    <td><label>
      <input name="date" type="text" id="date" value="<?php echo(date(Y)."-".date(m)."-".date(d));?>" size="8" maxlength="10" />
    YYYY-MM-DD</label></td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td width="115"><div align="right"><strong>Material</strong></div></td>
    <td><?php echo($material); ?></td>
    <td><div align="right"><strong>Quote Valid Until</strong></div></td>
    <td><label>
      <input name="valid" type="text" id="valid" value="<?php $onemonth = mktime(0,0,0,date("m"),date("d")+30,date("Y"));
echo date("Y-m-d", $onemonth);
?>" size="8" maxlength="10" />
     

    YYYY-MM-DD</label></td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td width="115" height="24"><div align="right"><strong>Parent Part    </strong></div></td>
    <td><?php echo($parentPart); ?></td>
    <td><div align="right"><strong><!-- Discount --></strong></div></td>
    <td><label>
      <input name="discount" type="hidden" id="discount" size="10" maxlength="10"/>
    </label></td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td width="115" height="24"><div align="right"><strong>Notes</strong></div></td>
    <td><label>
      <textarea name="notes" cols="30" rows="5" id="notes" maxlength="500"></textarea>
    </label></td>
    <td><input name="new" type="hidden" id="new" value="1"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td width="115">
    <a href="AddParts.php?clientNum=<?php echo($ClientNum."&page=ViewPart"); ?>" title="Create New Part">
    <input type="submit" name="CreateNewPart[]" id="CreateNewPart[]" value="Create A New Part" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php back(); ?></td>
    <td>&nbsp;</td>
   
  </tr>
</table>
<br />
<br />
<strong> Cost of Raw Material Per Unit: $</strong> <input name="rawMaterialCost" type="text" id="rawMaterialCost" size="10" maxlength="10" onKeyPress="return numbersonlydec(this, event);" />

<p>&nbsp;</p>

<p>
<input type="button" value="Add Row" onclick="addRowToTable();" />
<input type="button" value="Remove Row" onclick="removeRowFromTable();" /></p>
<table border="0" id="tblSample">
  <tr>
  	<td>&nbsp;  </td>
    <td><strong>Quantity</strong></td>		
  </tr>
  <tr>
    <td>1</td>
    <td><input name="txtRow[]" type="text" id="txtRow[]" onKeyPress="return numbersonly(this, event);" size="11" maxlength="11" /></td>
  </tr>
  <tr>
    <td>2</td>
    <td><input name="txtRow[]" type="text" id="txtRow[]" onKeyPress="return numbersonly(this, event);" size="11" maxlength="11" /></td>
  </tr>
  <tr>
    <td>3</td>
    <td><input name="txtRow[]" type="text" id="txtRow[]" onKeyPress="return numbersonly(this, event);" size="11" maxlength="11" /></td>
  </tr>
  <tr>
    <td>4</td>
    <td><input name="txtRow[]" type="text" id="txtRow[]" onKeyPress="return numbersonly(this, event);" size="11" maxlength="11" /></td>
  </tr>
  
</table>
<p>
	  <input type="submit" name="submit" id="Save2" value="Complete Quote"/>
</p>
</form>
<p>&nbsp;</p>
<?php include('Includes/footer.php'); ?>
 	
</body>
</html>










<?php
 // connect to the database
 
 include('Includes/functions.php');
 include('Includes/Dbconnect.php');
 
 $discount = $_POST['discount'];
 $valid = $_POST['valid'];
 $notes = $_POST['notes'];
 $date = $_POST['date'];
 $rawMaterialCost = $_POST['rawMaterialCost'];
 
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 

 // check to make sure both fields are entered
 if ($partNum == '')
 {
 // generate error message
 	$error = 'ERROR: Please fill in a Part Number';
 }
 else if ($ClientNum == '')
 {
	 $error = 'ERROR: Please fill in a Client Name';
 }
 // if either field is blank, display the form again

 else
 {
 

$query= ("INSERT INTO Quote (ClientNum, DateCreated, PartNum, Discount, ValidUntil, Notes) VALUES ('".$ClientNum."','".$date."','".$partNum."','".$discount."','".$valid."','".$notes."')");

echo($query."<br />");

mysql_query($query) or die (mysql_error()); 

$quoteNum = mysql_insert_id();

$txtRow = $_POST[txtRow];
$limit = count($txtRow);
echo "limit = ".$limit."<br />";

//get setup and base pay
$query = "SELECT SetupPay, BasePay
			FROM Part_Info
			Where PartNum = '".$partNum."';
			";
$result = mysql_query($query) or die;
while($row = mysql_fetch_array( $result ))
{
	$setupPay = $row['SetupPay'];
	$basePay = $row['BasePay'];
}
echo "setupPay = ".$setupPay."<br />";
echo "basePay = ".$basePay."<br />";

//get setup and production time for each operation
$query = "SELECT SetupTime, ProductionTime
			FROM Operations
			WHERE PartNum = '".$partNum."';
			";
echo "query = ".$query."<br />";
$result = mysql_query($query) or die;
//$a = 0;

	
	while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
	//$setupTime[a] = $row['SetupTime'];
	//echo "row['SetupTime'] = ".$row['SetupTime']."<br />";
	//$productionTime[a] = $row['ProductionTime'];
	//echo "row['ProductionTime'] = ".$row['ProductionTime']."<br />";



$totalSetupTime = 0;
$totalProductionTime = 0;
//Total the setup and production times
for($i = 0; $i <= $a; $i++)
{
	$totalSetupTime += $resultArray[$i]['SetupTime'];
	echo "setupTime[$i] = ".$resultArray[$i]['SetupTime']."<br />";
	$totalProductionTime += $resultArray[$i]['ProductionTime'];
	echo "productionTime[$i] = ".$resultArray[$i]['ProductionTime']."<br />";
}
echo "totalSetupTime = ".$totalSetupTime."<br />";
echo "totalProductionTime = ".$totalProductionTime	."<br />";


for($i = 0; $i < $limit; $i++){

	$txtRow[$i] = mysql_real_escape_string($txtRow[$i]);	
	//make sure a quantity is entered
	if($txtRow[$i] != '')
	{
		//Find the total cost
		$price = (($setupPay/3600) * $totalSetupTime) + $txtRow[$i] * (($basePay/3600) * $totalProductionTime);
		//Find cost per unit
		$pricePerUnit = ($price/$txtRow[$i])+$rawMaterialCost;
		
		$query= ("INSERT INTO Quote_Line (QuoteNum, Quantity, PricePerUnit)
					VALUES ('".$quoteNum."', '".$txtRow[$i]."', '".$pricePerUnit."')");
	
		if(mysql_query($query))
			   echo "Operation ".$i." successfully inserted.<br/>";
		   else
			   echo "Operation ".$i." encountered an error.<br/>";
	}
}


mysql_close();

echo("success");


echo ("
	  <script type='text/javascript'>
<!--
window.location = '/findQuote.php?quoteNum=".$quoteNum."'
-->
</script>
");

 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 echo("");

 //renderForm('','','','','','','','','');
 }
?> 