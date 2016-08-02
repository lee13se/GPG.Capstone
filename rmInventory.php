 <?php function renderForm($RawMaterial, $Grade, $Diameter, $error)
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
<p><a href='ViewMaterial.php'>List Inventory</a> | <b>Update Inventory</b>
<table width="657" border="0">
<tr>
  <td width="2"><p>&nbsp;</p></td>
  </tr>
<td>&nbsp;</td>
    <form method = "post" action = "" name = "RM"> 
    <td> 
    Material Type
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
  </td>
    <td>Date<input type="text" name="Date" id="Date" value = "<?php echo(date(Y)."-".date(m)."-".date(d));?>" /></td> 
    </tr>
  <tr>
	<td></td>
    <td></td>
    <td></td>
    <td><?php help('UpRawMat'); ?></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><table width="611" border="1">
      <tr>
        <td width="110" height="22">Grade</td>
        <td width="158">Diameter(in.)</td>
        <td width="164">Length(ft.)</td>
        <td width="151">Cost</td>
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
     
        <td width="108"><select name="RawMaterialGrade" id="RawMaterialGrade" onChange = "this.form.submit()">
        <option selected=""></option>
         <?php  
	  		
			$Grade = $_POST['RawMaterialGrade'];
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
        <td width="163"> 
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
        <td width="162"><input name="Length" type="text" id="Length" size="10"/></td>
        <td width="152"><input name="Cost" type="text" id="Cost" size="10" /></td>
        </table></br>
<input type="submit" name="Update" id="Save" value="Update" />
    <input type="button" align = "right" value="Cancel" onclick="history.go(-1);return true;" tabindex="-1"/>
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
 

$RawMaterial = $_POST['RawMaterial'];

  
  
  
 
  
 // check to make sure both fields are entered
 if ($RawMaterial== '')
 {
 // generate error message
 $error = 'ERROR: Please select a material type!!';
 
 // if either field is blank, display the form again
 renderForm($RawMaterial, $Grade, $Diameter, $error);
 }


 
 

else


{
 
$Grade = $_POST['RawMaterialGrade'];
$Diameter = $_POST['Diameter'];
$RawMaterial = $_POST['RawMaterial'];
 
 $query = "Select * from Raw_Materials where Description = '$RawMaterial' and Grade = '$Grade' and Diameter = '$Diameter'";
			//echo $query;
			$result = mysql_query($query) or die(mysql_error());
			
			while($row = mysql_fetch_array($result)){


			 $RawMaterialID = $row['RawMaterialID'];
            $OldLength = $row['QuantityFeet'];
            $Length = $_POST['Length']; 
			$Length = $Length + $OldLength;
           


			
			}
$Date = $_POST['Date'];
$Weight = $_POST['Weight'];
$Cost = $_POST['Cost'];

$query= ("UPDATE Raw_Materials SET Cost='$Cost', QuantityFeet = '$Length', LastVerified='$Date' WHERE RawMaterialID='$RawMaterialID'");
 
 

mysql_query($query) or die (mysql_error()); 
 
$page = "http://gpg.webritetech.com/ViewMaterial.php";

echo '<script type="text/javascript">
alert(\'Material Inventory Updated!\');
window.location = "'.$page.'";
</script>';
exit; 



}

 }
 
 
 else
 // if the form hasn't been submitted, display the form
 {
 
 renderForm('','','','');
 }
?> 