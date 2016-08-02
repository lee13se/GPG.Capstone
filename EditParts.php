<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/


 
 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($PartNum, $OldPartNum, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $Description, $Notes, $Location, $Quantity, $Grade, $Diameter, $Cost,$PartNotes, $error){
 
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Part</title>
 
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


 </head>
 <?php 
$header_page_id = "advanced";
$header_subpage_id = "search_parts";
?>
 <?php
$link = 1;
$header_page_id = "";
include('Includes/header.php');
?>
 <?php include('Includes/Dbconnect.php');?>
 
 
 
 	<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
	<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 
 
 
 echo "<script>";
 echo "var error='".$error."';"; 
 echo "alert(error)";
 echo "</script>";


}
 ?> 
 

  <table width="1024" align="left">
  <tr>
    <td width="150">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td><? help('editFGInvn');?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Part Number: </strong></td>
    <form method = "post" action = "" name = "RM">
    <td>
    	<input type="hidden" name="PartNum" id="PartNum" value = "<?php echo $PartNum;?>" >      
		<input type="text" name="OldPartNum" id="OldPartNum" value = "<?php echo $OldPartNum; ?>" > 
      Rev
		<input name="Rev" type="text" class="weight tb" id="Rev" value = "<?php echo $Rev;?>" size="3" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Material: </strong></td>
    <td> 
    <select name = "Description" >
      
	  <?php  
			
				//$Descriptioin = $_POST['Description'];					
			
	     
			$query = "Select distinct Description from Raw_Materials order by Description";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result))
			{
            	if($Description == $row['Description'])
				 echo ("<option value =\"".$Description."\" id =\"".$Description."\"selected>".$Description."</option>\n");	
				else
					echo ("<option value =\"".$row['Description']."\" id =\"".$row['Description']."\">".$row['Description'].
										"</option>\n");
		  }
		
	?>
  </select>
  
     <strong>Grade: </strong> 
        <select name = "Grade">
      
	 <?php  
	  		
				
		
		
			$query = "Select distinct Grade from Raw_Materials order by Grade";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            
		
		
		if($Grade == $row['Grade'])
		     echo ("<option value =\"".$Grade."\" id =\"".$Grade."\"selected>".$Grade."</option>\n");		
		    else
				echo ("<option value =\"".$row['Grade']."\" id =\"".$row['Grade']."\">".$row['Grade']."</option>\n");
		  
		
			
			
			
			}
		
		
	?>
  </select></td>
    
    <td align="right"><strong>Quantity: </strong></td>
    <td><?php echo $Quantity;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Diameter: </strong></td>
    <td> 
    	<select name = "Diameter">
      
	  	<?php  
	  		
			

			$query = "Select distinct Diameter from Raw_Materials order by Diameter";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            
			if($Diameter == $row['Diameter'])
		     echo ("<option value =\"".$Diameter."\" id =\"".$Diameter."\"selected>".$Diameter."</option>\n");		
		    	else
					echo ("<option value =\"".$row['Diameter']."\" id =\"".$row['Diameter']."\">".$row['Diameter']."</option>\n");
		  
		}
			
        
        ?>
  		</select>
	</td>
    <td align="right"><strong>Location: </strong></td>
    <td><?php echo $Location;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Setup Pay: </strong></td>
    <td><input name="SetupPay" type="text" id="SetupPay" class="weight tb"value="<?php echo $SetupPay;?>" size="10" ></td>
    <td align="right"><strong>Notes: </strong></td>
    <td><input type="textarea" name="PartNotes" id="Notes" align = "left" value = "<?php echo $PartNotes;?>"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Base Pay: </strong></td>
    <td><input name="BasePay" type="text" id="BasePay" class="weight tb" value="<?php echo $BasePay;?>" size="10" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="left">
      <table width="" height="" border="1">
        <tr>
          <td width="200"><strong>Operation</strong></td>
          <td width="150"><strong>Setup Time Seconds</strong></td>
          <td width="150" align="center"><strong>Production Time Seconds</strong></td>
          <td width="150" align="center"><strong>Production Quota</strong></td>
          <td width="200"><strong>Notes</strong></td>
         </tr>
      </table>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
       <table width="" height="" border="1" id="OperationTable" name = "OperationTable"align = "left">
         <tr><?php
		 
		 $query = "Select * from Operations where PartNum = '$PartNum'";
		 
		
       $result = mysql_query($query);
			while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));

		 
		 
		 ?>
			<input type = "hidden" value = "<?php  echo $resultArray[0]['OperationLineId'];?>"name = "OperationLineID[]">         
          <td width="200">
          		<input name="Operation[]" type = "text" id="Operation[]" value="<?php  echo $resultArray[0]['OperationName'];?>">
          <td width="150">
          	<div align="center">
            	<input name="SetupTime[]" class="weight tb" type="text" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[0]['SetupTime'];?>" >
          	</div>
          </td>
          <td width="150">
          	<div align="left">
            	<input name="ProductionTime[]" class="weight tb" type="text" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[0]['ProductionTime'];?> >
          	</div>
          </td>
          <td width="150">
          	<label>
            	<input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          	</label>
          </td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[0]['Notes'];?>" size="20">
          </label></td>
          </tr>    
      <tr>
      	  <input type = "hidden" value = "<?php  echo $resultArray[1]['OperationLineId'];?>"name = "OperationLineID[]">
          <td width="200"><input name="Operation[]" id="Operation[]" type = "text" value = "<?php  echo $resultArray[1]['OperationName'];?>"></td>
          <td width="150"><div align="center">
            <input name="SetupTime[]" type="text" class="weight tb" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[1]['SetupTime'];?>" >
          </div></td>
          <td width="150"><div align="left">
            <input name="ProductionTime[]" type="text" class="weight tb" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[1]['ProductionTime'];?> >
          </div></td>
          <td width="150"><label>
            <input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          </label></td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[1]['Notes'];?>" size="20">
          </label></td>
          </tr>    
      <tr>
          <input type = "hidden" value = "<?php  echo $resultArray[2]['OperationLineId'];?>"name = "OperationLineID[]">
          <td width="200" height="26"><input name="Operation[]" type = "text" id="Operation[]" value="<?php  echo $resultArray[2]['OperationName'];?>"></td>
          <td width="150"><div align="center">
            <input name="SetupTime[]" type="text" class="weight tb" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[2]['SetupTime'];?>" >
          </div></td>
          <td width="150"><div align="left">
            <input name="ProductionTime[]" type="text" class="weight tb" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[2]['ProductionTime'];?> >
          </div></td>
          <td width="150"><label>
            <input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          </label></td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[2]['Notes'];?>" size="20">
          </label></td>
          </tr>    
      <tr>
          <input type = "hidden" value = "<?php  echo $resultArray[3]['OperationLineId'];?>"name = "OperationLineID[]">
          <td width="200" height="26"><input name="Operation[]" type = "text" id="Operation[]" value="<?php  echo $resultArray[3]['OperationName'];?>"></td>
          <td width="150"><div align="center">
            <input name="SetupTime[]" type="text" class="weight tb" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[3]['SetupTime'];?>" >
          </div></td>
          <td width="150"><div align="left">
            <input name="ProductionTime[]" type="text" class="weight tb" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[3]['ProductionTime'];?> >
          </div></td>
          <td width="150"><label>
            <input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          </label></td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[3]['Notes'];?>" size="20">
          </label></td>
          </tr>    
      <tr>
           <input type = "hidden" value = "<?php  echo $resultArray[4]['OperationLineId'];?>"name = "OperationLineID[]" >
          <td width="200" height="26">
          <input name="Operation[]" id="Operation[]" type = "text" value = "<? echo $resultArray[4]['OperationName']; ?>"></td>
          <td width="150"><div align="center">
            <input name="SetupTime[]" type="text" class="weight tb" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[4]['SetupTime'];?>" >
          </div></td>
          <td width="150"><div align="left">
            <input name="ProductionTime[]" type="text" class="weight tb" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[4]['ProductionTime'];?> >
          </div></td>
          <td width="150"><label>
            <input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          </label></td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[4]['Notes'];?>" size="20">
          </label></td>
          </tr>    
      <tr>
           <input type = "hidden" value = "<?php  echo $resultArray[5]['OperationLineId'];?>" name = "OperationLineID[]">
          <td width="200" height="26"><input name="Operation[]" id="Operation[]" type = "text" value = "<?php  echo $resultArray[5]['OperationName'];?>"></td>
          <td width="150"><div align="center">
            <input name="SetupTime[]" type="text" class="weight tb" id="SetupTime[]" size="15" maxlength="15" value = "<?php echo $resultArray[5]['SetupTime'];?>" >
          </div></td>
          <td width="150"><div align="left">
            <input name="ProductionTime[]" type="text" class="weight tb" id="ProductionTime[]" size="15" maxlength="15" value = <?php  echo $resultArray[5]['ProductionTime'];?> >
          </div></td>
          <td width="150"><label>
            <input name="ProductionQuota[]" type="text" id="ProductionQuota[]" size="15" maxlength="15"readonly="readonly" onFocus="this.blur();">
          </label></td>
          <td width="200"><label>
            <input name="Notes[]" type="text" id="Notes[]" value="<?php echo $resultArray[5]['Notes'];?>" size="20">
          </label></td>
          </tr>  
          </table>
         
       <td>&nbsp;</td>
       <td>&nbsp;</td>  
      
   </tr>
    </div>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="Add Row" onClick="addRowToTable('OperationTable');" /></td>
    <td><input type="button" value="Remove Row" onClick="removeRowFromTable('OperationTable');"/></td>
    <td align="right"><input type="submit" name="submit_form" id="Save2" value="Save" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="ViewParts.php"><input type="button" value="Cancel" tabindex="-1"/></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
    </form>
 </table><br />
<br />
 <?php include('addFile.php'); ?>

 <script type="text/javascript"> 
 
 
 
$('.vcode').click(function(){$(this).next().toggle('slow'); return false;});
 
 
 
$('.sample1').alphanumeric();
 
$('.sample2').alphanumeric({allow:"., "});
 
$('.characteronly').alpha();

$('.char').alpha({allow:"., -_"});
 
$('.sample4').numeric();
 
$('.ordernumber').numeric({allow:"- ."});
 
$('.sample6').alphanumeric({ichars:'.1a'});

$('.trackingnumber').alphanumeric();

$('.quantity').numeric();

$('.weight').numeric({allow:"."});
 
</script> 
 
 </body>
 <?php include('Includes/footer.php'); ?>
 </html>
 

 <?php
 

 }

 // connect to the database
include('Includes/Dbconnect.php');
include('Includes/functions.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit_form']))
 { 
 // get form data, making sure it is valid
 

  
  $PartNum = $_GET['PartNum'];
  $OldPartNum = $_POST['OldPartNum'];
 // check to make sure both fields are entered
 if ($OldPartNum == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
renderForm($PartNum, $OldPartNum, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $Description, $Notes, $Location, $Quantity, $Grade, $Diameter, $Cost,$PartNotes, $error);
 }
 else
 {
 
 
 
$Grade = $_POST['Grade'];
$Diameter = $_POST['Diameter'];
$Description = $_POST['Description'];

 $query = "Select * from Raw_Materials where Description = '$Description' and Grade = '$Grade' and Diameter = '$Diameter'";
			echo $query;
			$result = mysql_query($query) or die(mysql_error());
			while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
			
 $RawMaterialID = $resultArray[0]['RawMaterialID'];
 $Rev = $_POST['Rev'];
 $SetupPay = $_POST['SetupPay'];
 $BasePay = $_POST['BasePay'];
 $ProductionTime = $_POST['ProductionTime'];
 $SetupTime = $_POST['SetupTime'];
 $page = $_POST['page'];
$PartNotes = $_POST['PartNotes'];
$Location = $_POST['Location'];
$Quantity = $_POST['Quantity'];



$query= ("UPDATE Part_Info SET OldPartNum = '$OldPartNum', RawMaterialID = '$RawMaterialID',  Rev = '$Rev', SetupPay = '$SetupPay', BasePay = '$BasePay', Notes = '$PartNotes' , FgQuantity = '$Quantity', FgLocation = '$Location' WHERE PartNum='$PartNum'");

echo $query;

mysql_query($query) or die (mysql_error()); 


$Operation = $_POST['Operation'];
$NewOperation = $_POST['NewOperation'];
$Notes = $_POST['Notes'];
$OperationLineID = $_POST['OperationLineID'];

$limit = count($Operation);


for( $i = 0; $i < $limit; $i++){

$ProductionTime[$i] = mysql_real_escape_string($ProductionTime[$i]);
$SetupTime[$i] = mysql_real_escape_string($SetupTime[$i]);
$Operation[$i] = mysql_real_escape_string($Operation[$i]);
$NewOperation[$i] = mysql_real_escape_string($NewOperation[$i]);
$Notes[$i] = mysql_real_escape_string($Notes[$i]);
$OperationLineID[$i] = mysql_real_escape_string($OperationLineID[$i]);
  
    
  if($Operation[$i] != ""){	
		
	$query = ("INSERT INTO Operations SET OperationLineId = '".$OperationLineID[$i]."', OperationName = '".$Operation[$i]."', SetupTime = '".$SetupTime[$i]."' , ProductionTime = '".$ProductionTime[$i]."' , Notes = '".$Notes[$i]."', PartNum ='".$PartNum."'  ON DUPLICATE KEY UPDATE OperationName = '".$Operation[$i]."', SetupTime = '".$SetupTime[$i]."' , ProductionTime = '".$ProductionTime[$i]."' , Notes = '".$Notes[$i]."'");

echo($query);
mysql_query($query) or die (mysql_error());


//if(mysql_query($query))
  //     echo "Operation ".$i." successfully inserted.<br/>";
   //else
//} echo "Operation ".$i." encountered an error.<br/>";
}
}
mysql_close();

echo '<script type="text/javascript">
alert(\'Part Changes Saved!\');
window.location = "http://gpg.webritetech.com/PartView.php?PartNum='.$PartNum.'";
</script>';

 
 
 }
 }

 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['PartNum']) && is_numeric($_GET['PartNum']) && $_GET['PartNum'] > 0)
 {
 // query db
 $PartNum = $_GET['PartNum'];
 
 
 
$result = mysql_query("SELECT * FROM Part_Info WHERE PartNum = '$PartNum'")
 or die(mysql_error()); 
 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 $RawMaterialID = $row['RawMaterialID'];
 // get data from db

 $OldPartNum = $row['OldPartNum'];
 $Rev = $row['Rev'];
 $BasePay	= $row['BasePay'];	
 $SetupPay = $row['SetupPay'];
 $PartNotes = $row['Notes'];
 $Location = $row['FgLocation'];
 $Quantity = $row['FgQuantity'];
 $RawMaterialID = $row['RawMaterialID'];
 // show form
 
  
  
$result = mysql_query("SELECT * FROM Raw_Materials WHERE RawMaterialID = '$RawMaterialID'")
 or die(mysql_error()); 
 
$row = mysql_fetch_array($result);

if($row)
 {
$Description = $row['Description'];
$Grade = $row['Grade'];
$Diameter = $row['Diameter'];
 
}  
  
  
  
  
  
  
  renderForm($PartNum, $OldPartNum, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $Description, $Notes, $Location, $Quantity, $Grade, $Diameter, $Cost,$PartNotes, $error);


 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>