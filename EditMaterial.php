<?php function renderForm($RawMaterialID, $Description, $QuantityFeet, $Location, $LastUpdated, $Description, $Diameter, $Grade, $Cost, $error)
 {
 ?>
<?php
if ($error != '')
 {
 
 
 
 echo "<script>";
 echo "var error='".$error."';"; 
 echo "alert(error)";
 echo "</script>";


}
 ?> 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php 
$link = 1;
$header_page_id = "";
$header_subpage_id = "";
?>
<?php include('Includes/header.php'); ?>
<body>
<p><a href='ViewMaterial.php'>List Inventory</a> | <b>Update Inventory</b><p></p>
<table width="657" border="0">
  <tr>
    <td width="2">&nbsp;</td>
    <td width="252">&nbsp;</td>
    <td width="252">
    </td>
    <td width="130">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td colspan="3">Raw Material Inventory</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form method = "post" action = "" name = "RM"> 
    <input name = "RawMaterial" type = "text" value = "<?php echo $Description;?>"  >
    <input type = "hidden" name = "RawMaterialID" value = "<?php echo $RawMaterialID;?>" />
    
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td><td width="10">
    </tr>
  <tr></td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><table width="661" border="1">
      <tr>
        <td width="158" height="22">Grade</td>
        <td width="144">Diameter(in.)</td>
        <td width="77">Length(ft.)</td>
        <td width="81">Weight(lb.)</td>
        <td width="84">Cost</td>
        <td width="66">Location</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><table width="650" border="1">
      <tr>
     
        <td width="144"><input name = "RawMaterialGrade" type = "text" value = "<?php echo $Grade;?>"  ></td>
        <td width="144"> 
       <input name = "Diameter" type = "text" value = "<?php echo $Diameter;?>"  >
        </td> 
        <td width="77"><input name="Length" type="text" value = "<?php echo $QuantityFeet;?>" id="Length" size="10"/></td>
        <td width="82"><input name="Weight" <?php echo $Weight;?> type="text" id="Weight" size="10" /></td>
        <td width="79"><input name="Cost" value = "<?php echo $Cost;?>" type="text" id="Cost" size="10" /></td>
      
    <td width="84"><input name="Location" value = "<?php echo $Location;?>" type="text" id="Location" size="10" /></td>
      
</table></br>
<input type="submit" name="Update" id="Save" value="Save" />
</form>

<?php include('Includes/footer.php');?>
</body>
</html>
<?php 
 }
 
 
 

 // connect to the database
 
 include('Includes/functions.php');
 include('Includes/Dbconnect.php');
 
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['Update']))
 { 
 // get form data, making sure it is valid
 

$RawMaterialID = $_POST['RawMaterialID'];

  
  
  
 
  
 // check to make sure both fields are entered
 if ($RawMaterialID== '')
 {
 // generate error message
 $error = 'ERROR: Please select a material type!!';
 
 // if either field is blank, display the form again
 renderForm($RawMaterialID, $Description, $QuantityFeet, $Location, $LastUpdated, $Description, $Diameter, $Grade, $Cost, $error);
 }


 
 

else


{
 
$RawMaterialID = $_POST['RawMaterialID'];
$Grade = $_POST['RawMaterialGrade'];
$Diameter = $_POST['Diameter'];
$Description = $_POST['RawMaterial'];
$Weight = $_POST['Weight'];
$Cost = $_POST['Cost'];
$QuantityFeet = $_POST['Length'];

$query= ("UPDATE Raw_Materials SET Cost='$Cost', QuantityFeet = '$QuantityFeet', Grade = '$Grade', Diameter = '$Diameter', Location = '$Location', Description = '$Description' WHERE RawMaterialID='$RawMaterialID'");
 


mysql_query($query) or die (mysql_error()); 
 
//$page = "http://gpg.webritetech.com/ViewMaterial.php";

$page = "http://gpg.webritetech.com/ViewMaterial.php";


echo '<script type="text/javascript">
alert(\'Changes Saved!\');
window.location = "'.$page.'";
</script>';
exit; 

}

 }
 
 
 else
 // if the form hasn't been submitted, display the form
 {
 
if (isset($_GET['RawMaterialID']) && is_numeric($_GET['RawMaterialID']) && $_GET['RawMaterialID'] > 0)
 {
 // query db
 $RawMaterialID = $_GET['RawMaterialID'];
 $result = mysql_query("SELECT * FROM Raw_Materials WHERE RawMaterialID=$RawMaterialID")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $QuantityFeet = $row['QuantityFeet'];
 $Location = $row['Location'];
 $LastUpdated = $row["LastVerified"];
 $Description = $row['Description'];
 $Diameter	= $row["Diameter"];	
 $Grade = $row["Grade"];
$Cost = $row["Cost"];
 
 // show form
 renderForm($RawMaterialID, $Description, $QuantityFeet, $Location, $LastUpdated, $Description, $Diameter, $Grade, $Cost, '');
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