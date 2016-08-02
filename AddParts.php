<script type="text/javascript">

function disableField1(obj) {
   var textField = document.getElementById("NewOperation1");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}


function disableField2(obj) {
   var textField = document.getElementById("NewOperation2");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField3(obj) {
   var textField = document.getElementById("NewOperation3");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField4(obj) {
   var textField = document.getElementById("NewOperation4");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}


function disableField5(obj) {
   var textField = document.getElementById("NewOperation5");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}


function disableField6(obj) {
   var textField = document.getElementById("NewOperation6");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField7(obj) {
   var textField = document.getElementById("NewOperation7");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField8(obj) {
   var textField = document.getElementById("NewOperation8");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField9(obj) {
   var textField = document.getElementById("NewOperation9");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField10(obj) {
   var textField = document.getElementById("NewOperation10");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}
function disableField11(obj) {
   var textField = document.getElementById("NewOperation11");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}function disableField12(obj) {
   var textField = document.getElementById("NewOperation12");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}function disableField13(obj) {
   var textField = document.getElementById("NewOperation13");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}
function disableField14(obj) {
   var textField = document.getElementById("NewOperation14");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

function disableField15(obj) {
   var textField = document.getElementById("NewOperation15");
   if (obj.value == "_Other") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}

</script>

<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/


 
 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($PartNum, $OldPartNum, $ParentPart, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $error)
{
?>
 
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Add Part</title>
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
 

 <table width="1000" align="left" border="0">
  <tr>
    <td width="100">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php help('newFGInv'); ?></td>    
  </tr>
 
  <tr><form method = "post" action = "" name = "myform"> 
    <?php 
	$OldPartNum = $_POST['OldPartNum'];
 $Rev = $_POST['Rev'];
 $SetupPay = $_POST['SetupPay'];
 $BasePay = $_POST['BasePay'];
 $ProductionTime = $_POST['ProductionTime'];
 $SetupTime = $_POST['SetupTime'];
 
$Notes = $_POST['Notes'];
 $Quantity	= $_POST['Quantity'];
$Location	= $_POST['Location'];	
$PartNotes = $_POST['PartNotes'];	
	
	?>
    <td><strong>Part Number:</strong></td>
    <td><input type="hidden" name="PartNum" id="PartNum" value = "<?php echo $PartNum;?>" />
      
      <input type="text" name="OldPartNum" id="OldPartNum" value = "<?php echo $OldPartNum; ?>"  /> 
      
    </td>
    <td align = "right"><strong>Rev:</strong></td>
    <td><input name="Rev" type="text" id="Rev" value = "<?php echo $Rev;?>" size="3"  /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Material:</strong></div></td>
    <td>
    <select name = "RawMaterial" onChange = "this.form.submit()" >
      <option selected=""></option>
	  <?php  
	  		
			$Description = $_POST['RawMaterial'];
			
			if (isset($Description)){
			
			echo ("<option value =\"".$Description."\" id =\"".$Description."\"selected>".$Description."</option>\n");	
		
		
		}
			
			
		else{
			$query = "Select distinct Description from Raw_Materials order by Description";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            
		echo ("<option value =\"".$row['Description']."\" id =\"".$row['Description']."\">".$row['Description']."</option>\n");
		  
		}
			}
		
		
	?>
  </select>
   
     <strong>Grade:</strong><select name = "Grade" onChange = "this.form.submit()" >
  <option selected=""></option>
  <?php  
	  		
			$Grade = $_POST['Grade'];
			if ($Grade != 0){
			
			echo ("<option value =\"".$Grade."\" id =\"".$Grade."\"selected>".$Grade."</option>\n");	
		
		
		}
			
			
		else{
			$query = "Select distinct Grade from Raw_Materials where Description = '$Description' order by Grade";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            
		echo ("<option value =\"".$row['Grade']."\" id =\"".$row['Grade']."\">".$row['Grade']."</option>\n");
		  
		}
			}
		
		
	?>
</select></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24"><div align="right"><strong>Diameter:</strong></div></td>
    <td>   
	  <select name="Diameter" id="Diameter">
      <option selected=""></option>
         <?php  
	  		
			
			
			if (!isset($Grade)){
			
			echo ("<option value =\"".$Diameter."\" id =\"".$Diameter."\"selected>".$Diameter."</option>\n");	
		}
			
			
		else{
			$query = "Select distinct Diameter from Raw_Materials where Description = '$Description' and Grade = '$Grade' order by Diameter";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            
		echo ("<option value =\"".$row['Diameter']."\" id =\"".$row['Diameter']."\">".$row['Diameter']."</option>\n");
		  
		}
			}
        
        ?>
        </select>
      </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" align="right"><strong>Setup Pay:</strong></div></td>
    <td valign="bottom"><input name="SetupPay" type="text" id="SetupPay" value="<?php echo $SetupPay;?>" size="10" ></td>
    <td align="right" valign="top"><strong>
     Part Notes: </strong></td>
    <td><textarea name="PartNotes" id="Notes" rows="3" cols="45" value = "<?php echo $PartNotes;?>"></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="right"><strong>Base Pay:</strong></div></td>
    <td valign="top"><input name="BasePay" type="text" id="BasePay" value = "<?php echo $BasePay;?>" size="10" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="4"><div align="left">
      <table width="" height="51" border="1">
        <tr>
          <td width="200" valign="top"><strong>Operation</strong></td>
          <td width="100" valign="top" align="center"><strong>Setup Time<br/>(s)</strong></td>
          <td width="150" valign="top" align="center"><strong>Production Time<br/>(s)</strong></td>
          <td width="350" valign="top"><strong>Notes</strong></td>
          </tr>
        </table>
     <td>&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">
         <table width="" height="32" border="1" id="OperationTable" name = "OperationTable"align = "left">
        <tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField1(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation1" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField2(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation2" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td></tr>
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField3(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation3" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField4(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation4" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField5(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation5" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField6(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation6" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField7(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation7" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField8(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation8" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField9(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation9" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField10(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation10" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField11(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation11" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
		<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField12(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation12" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField13(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation13" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr>
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField14(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation14" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	<tr>
         <td width="200" height="">
          <select name = "Operation[]" onchange="disableField15(this)" > 
		  <option value = "" selected></option>
		  
		  	<?php
	  
	  
	  			$query = "select distinct OperationName from Operations ORDER BY OperationName";
				$result = mysql_query($query) or die(mysql_error());
				
				while($row = mysql_fetch_array($result)){
				
				echo ("<option value =\"".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");		
				
		
	  			}
	?>
            </select>
            <label>
              <input type="text" name="NewOperation[]" id="NewOperation15" size="12" disabled = "disabled">
            </label>
          <td width="100"><div align="center">
            <input name="SetupTime[]" type="text" id="SetupTime[]" size="10" maxlength="15"  >
          </div></td>
          <td width="150"><div align="center">
            <input name="ProductionTime[]" type="text" id="ProductionTime[]" size="10" maxlength="15"  >
          </div></td>
          
          <td width="350"><label>
            <input name="Notes[]" type="text" id="Notes[]" size="45">
          </label></td>
      </tr> 
      	
      	
      
      	
          
      	
              
      </table>
   </tr>
    </div>
  <tr>
    <td>&nbsp;</td>
   <td><input type="button" value="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/></td>
    <td><input type="submit" name="submit_form" id="Save2" value="Save" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </form>
  </tr>
</table>
 

 
 
 
 <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
 <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
 <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
 <?php include('Includes/footer.php'); ?>
 </body>
 </html>


 <?php 
 }
 
 
 

 // connect to the database
 
 include('Includes/functions.php');
 include('Includes/Dbconnect.php');
 
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit_form']))
 { 
 // get form data, making sure it is valid
 

  
  
  $OldPartNum = $_POST['OldPartNum'];
 // check to make sure both fields are entered
 if ($OldPartNum == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
renderForm($PartNum, $OldPartNum, $ParentPart, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $error);
 }
 else
 {
 
 
 
$Grade = $_POST['Grade'];
$Diameter = $_POST['Diameter'];
$RawMaterial = $_POST['RawMaterial'];

 $query = "Select * from Raw_Materials where Description = '$RawMaterial' and Grade = '$Grade' and Diameter = '$Diameter'";
			echo $query;
			$result = mysql_query($query) or die(mysql_error());
			echo $query;
			while($row = mysql_fetch_array($result)){


			 $RawMaterialID = $row['RawMaterialID'];
 
			}
 
 $ParentPart = $_POST['ParentPart'];
 $Rev = $_POST['Rev'];
 $SetupPay = $_POST['SetupPay'];
 $BasePay = $_POST['BasePay'];
 $ProductionTime = $_POST['ProductionTime'];
 $SetupTime = $_POST['SetupTime'];
 $page = $_POST['page'];
$PartNotes = $_POST['PartNotes'];
$Location = $_POST['Location'];
$Quantity = $_POST['Quantity'];



$query= ("INSERT INTO Part_Info (OldPartNum, ParentPart, RawMaterialID, Rev, SetupPay, BasePay, Notes, FgQuantity, FgLocation) VALUES ('".$OldPartNum."','".$ParentPart."','".$RawMaterialID."','".$Rev."', '".$SetupPay."' ,'".$BasePay."','".$PartNotes."','".$Quantity."','".$Location."')");

echo $query;

mysql_query($query) or die (mysql_error()); 

$PartNum = mysql_insert_id();
$Operation = $_POST['Operation'];
$NewOperation = $_POST['NewOperation'];
$Notes = $_POST['Notes'];
$limit = count($Operation);


for( $i = 0; $i < $limit; $i++){

$ProductionTime[$i] = mysql_real_escape_string($ProductionTime[$i]);
$SetupTime[$i] = mysql_real_escape_string($SetupTime[$i]);
$Operation[$i] = mysql_real_escape_string($Operation[$i]);
$NewOperation[$i] = mysql_real_escape_string($NewOperation[$i]);
$Notes[$i] = mysql_real_escape_string($Notes[$i]);

  
    
  if($Operation[$i] != ""){

		if($Operation[$i] == "_Other")

			$Operation[$i] = $NewOperation[$i];	
		
	
$query= ("INSERT INTO Operations (OperationName, SetupTime, ProductionTime, PartNum, Notes) VALUES ('".$Operation[$i]."', '".$SetupTime[$i]."','".$ProductionTime[$i]."','".$PartNum."','".$Notes[$i]."')");

//echo($query);
mysql_query($query) or die (mysql_error());


//if(mysql_query($query))
  //     echo "Operation ".$i." successfully inserted.<br/>";
   //else
	//  echo "Operation ".$i." encountered an error.<br/>";
}
}

mysql_close();

$partNum = $PartNum;
$clientNum = $_GET['clientNum'];
$page = $_GET['page'];

if($page == '')
echo '<script type="text/javascript">
alert(\'New Part Saved!\');
window.location = "http://gpg.webritetech.com/PartView.php?PartNum='.$partNum.'";
</script>';

else

header("Location:".$page.".php?clientNum=".$clientNum."&partNum=".$partNum."");

 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 
 renderForm('','','','','','','','','');
 }
?> 