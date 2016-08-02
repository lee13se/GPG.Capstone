<?php function renderForm($PartNum, $error)
 {
?>

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
xmlhttp.open("GET","/Includes/LiveSearch/FgPartLivesearch.php?q="+str,true);
xmlhttp.send();
}
</script>
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
<title>Finished Goods Inventory</title>
</head>

<?php 
$header_page_id = "inventory";
$header_subpage_id = "fgInventory";
include('Includes/Dbconnect.php');
?>
<?php
include('Includes/header.php'); ?>
<?php 
$partNum = $_GET['partNum'];
if($partNum != ''){

$result = mysql_query("SELECT *
							  FROM Part_Info
							  WHERE PartNum=".$partNum) 
                or die(mysql_error()); 
				
	while($row = mysql_fetch_array( $result ))
	{
		$OldPartNum=$row['OldPartNum'];
		$Location=$row['FgLocation'];
		$QuantityCompleted = $row['FgQuantity'];
	}
}?>

<body>
<p><a href='Viewfginventory.php'>List Inventory</a> | <b>Update Inventory</b><p></p>
<table width="1024" border="0">
  <tr>
    <td width="115">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="276">&nbsp;</td>
    <td width="276">&nbsp;</td>
    <td width="196">&nbsp;</td>
    <td width="91"><?php help('updateFGInvList'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Date</td>
    <td>&nbsp;</td>
  </tr>
  <form method="post" action="" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>   
    <td>&nbsp;</td>
    <td><input name="Date" type="text" id="Date" value="<?php echo(date(Y)."-".date(m)."-".date(d));?>" /></td>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><table width="789" border="1">
        <tr>
          <td width="160">Part Number</td>
          <td width="184">Quantity Complete</td>
          <td width="146">Location</td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><table width="788" border="1">
      <tr>
        <td width="160">
           <input type="text" size="30" onKeyUp="showResult(this.value)" value ="<?php echo $OldPartNum;?>" />
      <div id="livesearch"></div>
        </td>
        <td width="184">
          <input type="text" name="QuantityCompleted" id="QuantityCompleted" value = "<?php echo $QuantityCompleted;?>" />
        </td>
        <td width="148"><input type="text" name="Location" value = "<?php echo $Location;?>" id="Location" /> 
		</td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    	<input type="submit" name="Update" id="updatefinishedgoods" value="update" /></td>
    <td>&nbsp;</td>
  </tr></form>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
<?php include('Includes/footer.php'); ?>
</html>
<?php 

 }
if (isset($_POST['Update']))
 { 
 // get form data, making sure it is valid
 
 $PartNum = $_GET['partNum'];

  
 // check to make sure both fields are entered
 if ($PartNum == '')
 {
 // generate error message
 $error = 'ERROR: Please select a PartNumber!!';
 
 // if either field is blank, display the form again
 renderForm($PartNum, $error);
 }
else

$QuantityCompleted = $_POST['QuantityCompleted'];
 include('Includes/Dbconnect.php');
 $query = "Select * from Part_Info where PartNum = $PartNum";
			echo $query;
			$result = mysql_query($query) or die(mysql_error());
			
			while($row = mysql_fetch_array($result)){


			
            $OldQuantity = $row['FgQuantity'];
            $QuantityCompleted = $_POST['QuantityCompleted']; 
			$QuantityCompleted = $QuantityCompleted + $OldQuantity;
            


			
			}


$Date = $_POST['Date'];
$Location = $_POST['Location'];	

$query= ("UPDATE Part_Info SET FgLocation = '$Location', FgQuantity = '$QuantityCompleted', DateUpdated = '$Date'  WHERE PartNum=$PartNum");
 
 

mysql_query($query) or die (mysql_error()); 
 
$page = "/Viewfginventory.php";


echo '<script type="text/javascript">
//alert(\'Part Inventory Updated!\');
window.location = "'.$page.'";
</script>';

exit; 




}


 
 
 else
 // if the form hasn't been submitted, display the form
 {
 
 renderForm('','');
 }
?> 