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
 <title>View Part</title>
 </head>
 
 <?php 
$header_page_id = "advanced";
$header_subpage_id = "search_parts";

include('Includes/header.php');

include('Includes/Dbconnect.php');?>
 
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
 
<br /><br /><br />

<table width="1020" border="0" align="left">
  <tr>
    <td align="right"><strong>Part Number: </strong></td>
    <td><?php echo $OldPartNum; ?></td>
    <td align="right"><strong>Rev :</strong></td>
    <td><?php echo $Rev;?></td> 
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><strong>Material: </strong></td>
    <td align="left"><?php echo $Description;?></td> 
    <td align="right"><strong>Grade: </strong></td>
    <td><?php echo $Grade;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Diameter:</strong></div></td>
    <td><?php echo $Diameter;?></td>
    <td align="right"><strong>Inventory Location:</strong></td>
    <td valign="bottom"><?php echo $Location;?> </td>
    <td align="right"><strong>Quantity in Inventory:</strong></td>
    <td valign="bottom"><?php echo $Quantity;?></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Setup Pay: $</strong></div></td>
    <td><?php echo $SetupPay;?>/hour</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Base Pay: $</strong></div></td>
    <td><?php echo $BasePay;?>/hour</td>
    <td align="right"><strong>Notes: </strong></td>
    <td colspan="3" valign="top"><?php echo $PartNotes;?></td>
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
    <td width="200"><strong>Operation</strong></td>
    <td width="150"><strong>Setup Time (seconds)</strong></td>
    <td width="150"><strong>Production Time (seconds)</strong></td>
    <td width="150"><strong>Production Quota</strong></td>
    <td width="200"><strong>Notes</strong></td>
  </tr>


        
		 	<?php
		 
		 	$query = "Select * from Operations where PartNum = '$PartNum'";
		 
		
      		$result = mysql_query($query);
			while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));

		   for($i = 0; $i < count($resultArray); $i++)
		   {
			   ?>
			   <tr>
					<td></td>
				  <td width="200"><?php  echo $resultArray[$i]['OperationName'];?></td>
				  <td width="150"><div align="left"><?php echo $resultArray[$i]['SetupTime'];?></div></td>
				  <td width="150"><div align="left"><?php  echo $resultArray[$i]['ProductionTime'];?></div></td>
				  <td width="150"><?php echo ($ProductionTime * 3600)?></td>
				  <td width="200" colspan="2"><?php echo $resultArray[$i]['Notes'];?></td>
			  </tr>    
          <? } ?>
          
          <tr>
          	<td colspan="6"><?php include('addFile.php'); ?></td>
          </tr>
    </table>
    
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
 	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
 <?php include('Includes/footer.php'); ?>
 
 </body>
 </html>
 
 <?php
}

 // connect to the database
include('Includes/Dbconnect.php');
include('Includes/functions.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit_form']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['PartNum']))
 {
 // get form data, making sure it is valid
 $EmployeeNum = $_POST['EmployeeNum'];
 $EmployeeFirstName = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeFirstName']));
 $EmployeeLastName = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeLastName']));
 
 // check that firstname/lastname fields are both filled in
 if ($EmployeeFirstName == '' || $EmployeeLastName == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($PartNum, $OldPartNum, $RawMaterial, $Rev, $SetupPay, $BasePay, $RawMaterialID, $Description, $Notes, $Location, $Quantity, $Grade, $Diameter, $Cost, $PartNotes, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE Employee SET EmployeeFirstname='$EmployeeFirstName', EmployeeLastName='$EmployeeLastName' WHERE EmployeeNum='$EmployeeNum'")
 or die(mysql_error()); 
 
 
 
 
 // once saved, redirect back to the view page
 header("Location: ViewParts.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
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