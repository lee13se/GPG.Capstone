<script type="text/javascript">

function disableField(obj) {
   var textField = document.getElementById("NewMaterial");
   if (obj.value == "New") {
      textField.disabled = false;
   }
   else {
      textField.disabled = true;
   }


}
</script>
<?php function renderForm($RawMaterialID, $error)
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

$header_page_id = "inventory";
$header_subpage_id = "rmInventory";
?>
<?php include('Includes/header.php'); ?>
<body>

<form method="post" action="">
<table width="657" border="0" align="left">
  <tr>
    <td width="2">&nbsp;</td>
    <td width="252">&nbsp;</td>
    <td width="252"><?php help('NewRawMat'); ?></td>
    <td width="130">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Add New Material </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Type
<select name="RawMaterial" onChange="disableField(this)">
        <option value = "," selected></option>
	  <?php  $query = "Select distinct Description from Raw_Materials order by Description";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           
		  echo ("<option value =\"".$row['Description']."\" id =\"".$row['Description']."\">".$row['Description']."</option>\n");
    
			}	
			
	?>
    <option value = "New" id = "New">New</option>
    </select>
    or New    
    <input type="text" name="NewMaterial" id="NewMaterial" disabled = "disabled" ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td><td width="10">
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><table width="611" border="1">
      <tr>
        <td width="111" height="22">Grade</td>
        <td width="45">Diameter(in.)</td>
        <td width="117">Cost</td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><table width="613" border="1">
      <tr>
        <td width="95"><input type="text" name="Grade" id="Grade" /></td>
        <td width="127"><input type="text" name="Diameter" id="Diameter" /></td>
        <td width="133"><input name="Cost" type="text" id="Cost" size="10" ></td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>  
  </tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<input type="submit" name="submit_form" id="Save" value="Save" align="left" >
</form>

<br />
<?php include('Includes/footer.php');?>
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
 

 
 // check to make sure both fields are entered
 if ($RawMaterial = '')
 {
 
 // generate error message
$error = 'ERROR: Please select a material type!!';

 
 
 
 // if either field is blank, display the form again
 renderForm($RawMaterialID, $error);
  
 
 }
 else
 {

$RawMaterial = $_POST['RawMaterial'];
$Grade = $_POST['Grade'];
$Diameter = $_POST['Diameter'];
$Cost = $_POST['Cost']; 
$NewMaterial = $_POST['NewMaterial']; 
 

		if($RawMaterial == 'New')
			$RawMaterial = $NewMaterial;



$query= ("INSERT INTO Raw_Materials (Description, Cost, Grade, Diameter) VALUES ('".$RawMaterial."','".$Cost."','".$Grade."','".$Diameter."')");




mysql_query($query) or die (mysql_error()); 


$page = "http://gpg.webritetech.com/ViewMaterial.php";


echo '<script type="text/javascript">
alert(\'New Material Saved!\');
window.location = "'.$page.'";
</script>';
exit; 
//if(mysql_query($query))
      // echo "Operation ".$i." successfully inserted.<br/>";
 //  else
     //  echo "Operation ".$i." encountered an error.<br/>";
}


 }
 
 else
 // if the form hasn't been submitted, display the form
 {
 
 renderForm('','');
 }
?> 